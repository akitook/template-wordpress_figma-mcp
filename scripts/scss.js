// SCSSをコンパイルしてテーマディレクトリへ出力
// sass + postcss (autoprefixer) を使用
require("dotenv").config();
const sass = require("sass");
const postcss = require("postcss");
const autoprefixer = require("autoprefixer");
const fs = require("fs");
const path = require("path");
const themeJson = require("./theme-json");

const isWatch = process.argv.includes("--watch");
const isProduction = process.argv.includes("--production");

const themeName = process.env.THEME_NAME;
const wordpressDir = process.env.WORDPRESS_DIR;

let outputPath = `public/wp-content/themes/${themeName}`;
if (wordpressDir) {
  outputPath = `public/${wordpressDir}/wp-content/themes/${themeName}`;
}
if (isProduction) {
  outputPath = "dist";
}

const inputFile = path.resolve("src/assets/scss/main.scss");
const outputFile = path.resolve(`${outputPath}/assets/css/main.css`);

async function compile() {
  try {
    // theme.json → _theme-json.scss を先に生成
    themeJson.generate();
    const result = sass.compile(inputFile, {
      style: isProduction ? "compressed" : "expanded",
      loadPaths: ["node_modules"],
    });
    const postcssResult = await postcss([autoprefixer()]).process(result.css, {
      from: inputFile,
      to: outputFile,
    });
    fs.mkdirSync(path.dirname(outputFile), { recursive: true });
    fs.writeFileSync(outputFile, postcssResult.css);
    console.log(`[scss] compiled → ${outputFile}`);
  } catch (err) {
    console.error("[scss] Error:", err.message);
  }
}

compile();

if (isWatch) {
  const chokidar = require("chokidar");
  chokidar
    .watch(["src/assets/scss/**/*.scss", "src/theme.json"], {
      ignoreInitial: true,
    })
    .on("all", compile);
}
