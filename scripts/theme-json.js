// src/theme.json の設定値をSCSS変数に変換して _theme-json.scss を生成
// theme.json が正。生成ファイルは直接編集しない
const fs = require("fs");
const path = require("path");

const inputFile = path.resolve("src/theme.json");
const outputFile = path.resolve("src/assets/scss/global/_theme-json.scss");

// "375px" → 375
function toPixelNumber(value) {
  const match = String(value).match(/^(-?[\d.]+)px$/);
  if (!match) {
    throw new Error(`px単位で指定してください: ${value}`);
  }
  return Number(match[1]);
}

function round(value) {
  return Math.round(value * 10000) / 10000;
}

// デザイン幅(SP〜PC)の間で min〜max を線形補間する clamp()
function fluidClamp(min, max, designWidthSp, designWidthPc) {
  const minPixel = toPixelNumber(min);
  const maxPixel = toPixelNumber(max);
  const slope = (maxPixel - minPixel) / (designWidthPc - designWidthSp);
  const intercept = minPixel - slope * designWidthSp;
  return `clamp(${minPixel}px, ${round(intercept)}px + ${round(slope * 100)}vw, ${maxPixel}px)`;
}

function variableBlock(prefix, mapName, entries) {
  if (entries.length === 0) {
    return "";
  }
  const variables = entries
    .map(([slug, value]) => `$${prefix}-${slug}: ${value};`)
    .join("\n");
  const mapItems = entries
    .map(([slug, value]) => `  "${slug}": (${value}),`)
    .join("\n");
  return `${variables}\n$${mapName}: (\n${mapItems}\n);\n`;
}

// fontSize → font-size
function toKebabCase(value) {
  return value.replace(/[A-Z]/g, (letter) => `-${letter.toLowerCase()}`);
}

// settings.custom.textStyles → $text-styles マップ
// fontFamily / fontSize はスラッグで指定し、生成済みの値に置き換える
// { "sp": .., "pc": .. } の値は text-style mixin でブレークポイントにより切り替える
function textStylesBlock(textStyles, fontFamilies, fontSizes) {
  const presets = {
    fontFamily: Object.fromEntries(fontFamilies),
    fontSize: Object.fromEntries(fontSizes),
  };
  const resolve = (property, value) => {
    if (!presets[property]) {
      return value;
    }
    if (!(value in presets[property])) {
      throw new Error(`textStyles: ${property} "${value}" が未定義です`);
    }
    return `(${presets[property][value]})`;
  };
  const styles = Object.entries(textStyles).map(([name, style]) => {
    const properties = Object.entries(style).map(([property, value]) => {
      const sassValue =
        value && typeof value === "object"
          ? `("sp": ${resolve(property, value.sp)}, "pc": ${resolve(property, value.pc)})`
          : resolve(property, value);
      return `    "${toKebabCase(property)}": ${sassValue},`;
    });
    return `  "${name}": (\n${properties.join("\n")}\n  ),`;
  });
  return `$text-styles: (\n${styles.join("\n")}\n);\n`;
}

function generate() {
  const themeJson = JSON.parse(fs.readFileSync(inputFile, "utf8"));
  const settings = themeJson.settings || {};
  const typography = settings.typography || {};
  const fluid = typography.fluid || {};

  const designWidthSp = toPixelNumber(fluid.minViewportWidth || "375px");
  const designWidthPc = toPixelNumber(fluid.maxViewportWidth || "1440px");

  const colors = (settings.color?.palette || []).map((item) => [
    item.slug,
    item.color,
  ]);
  const fontFamilies = (typography.fontFamilies || []).map((item) => [
    item.slug,
    item.fontFamily,
  ]);
  const fontSizes = (typography.fontSizes || []).map((item) => {
    if (item.fluid && typeof item.fluid === "object") {
      return [
        item.slug,
        fluidClamp(
          item.fluid.min,
          item.fluid.max,
          designWidthSp,
          designWidthPc,
        ),
      ];
    }
    return [item.slug, item.size];
  });
  const spacingSizes = (settings.spacing?.spacingSizes || []).map((item) => [
    item.slug,
    item.size,
  ]);

  const textStyles = settings.custom?.textStyles || {};

  const layout = settings.layout || {};
  const layoutBlock = [
    layout.contentSize && `$content-size: ${layout.contentSize};`,
    layout.wideSize && `$wide-size: ${layout.wideSize};`,
  ]
    .filter(Boolean)
    .join("\n");

  const output = [
    "// ==========================================================================",
    "// 自動生成ファイル（scripts/theme-json.js）。直接編集しないこと",
    "// 値を変更する場合は src/theme.json を編集する",
    "// ==========================================================================",
    "",
    "// デザイン幅（settings.typography.fluid の min/maxViewportWidth）",
    `$design-width-sp: ${designWidthSp};`,
    `$design-width-pc: ${designWidthPc};`,
    "",
    "// color（settings.color.palette）",
    variableBlock("color", "colors", colors),
    "// font-family（settings.typography.fontFamilies）",
    variableBlock("font", "font-families", fontFamilies),
    "// font-size（settings.typography.fontSizes）",
    variableBlock("font-size", "font-sizes", fontSizes),
    "// spacing（settings.spacing.spacingSizes）",
    variableBlock("spacing", "spacing-sizes", spacingSizes),
    "// layout（settings.layout）",
    layoutBlock,
    "",
    '// text-style（settings.custom.textStyles）。@include text-style("title-large") で使う',
    textStylesBlock(textStyles, fontFamilies, fontSizes),
  ].join("\n");

  // 内容が変わらない場合は書き込まない（watchの無限ループ防止）
  const current = fs.existsSync(outputFile)
    ? fs.readFileSync(outputFile, "utf8")
    : "";
  if (current !== output) {
    fs.writeFileSync(outputFile, output);
    console.log(`[theme-json] generated → ${outputFile}`);
  }
}

module.exports = { generate };

if (require.main === module) {
  generate();
}
