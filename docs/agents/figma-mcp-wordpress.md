# Figma MCP 実装ルール（このテンプレート用）

[figma-mcp.md](./figma-mcp.md)（正本ガイド）の手順を、このWordPressテンプレートで実行するときの具体ルール。ガイドの「案件側のルールファイル」にあたる。ガイドと本ファイルの両方を読んでから作業する。

- 案件固有の情報（FigmaのURL、ページ構成）は [docs/project/](../project/README.md) を見る。FigmaのURLは [site-info.md](../project/site-info.md) の「デザインデータ」。
- ガイドの手順・ルールを変える場合は `figma-mcp.md` を、このテンプレートでの当てはめ方を変える場合は本ファイルを更新する。

## デザイン幅（案件ごとに設定）

FigmaのアートボードのSP幅・PC幅は、`src/theme.json` の次の2値で設定する。PC幅は1440pxとは限らないため、**着手前にFigmaのフレーム幅を確認し、違えば書き換える**。

```json
"typography": {
  "fluid": { "minViewportWidth": "375px", "maxViewportWidth": "1440px" }
}
```

この2値は次の3か所で使われる。

| 使われる場所 | 内容                                                                           |
| ------------ | ------------------------------------------------------------------------------ |
| SCSS         | `$design-width-sp` / `$design-width-pc`（自動生成）と `fluid()` 関数の補間範囲 |
| WordPress    | theme.json の fluid font size の補間範囲                                       |
| 検証         | Playwright MCP でスクショを撮る幅（この2値 + 768px）                           |

## デザイントークンの取り込み（theme.json）

色・フォント・フォントサイズ・余白は `src/theme.json` が正。SCSSに直接値を書かない。

1. 対象フレームで `get_variable_defs` を実行し、変数（色・フォント等）を取得する。変数が取れない場合は `get_design_context` / スクショの値から拾う。
2. `src/theme.json` に追加・更新する。

   | Figmaの値          | theme.json の場所                        | SCSSで使う変数                                 |
   | ------------------ | ---------------------------------------- | ---------------------------------------------- |
   | 色                 | `settings.color.palette`                 | `$color-{slug}` / `map.get($colors, "{slug}")` |
   | フォントファミリー | `settings.typography.fontFamilies`       | `$font-{slug}`                                 |
   | フォントサイズ     | `settings.typography.fontSizes`          | `$font-size-{slug}`                            |
   | 余白               | `settings.spacing.spacingSizes`          | `$spacing-{slug}`                              |
   | コンテンツ幅       | `settings.layout.contentSize / wideSize` | `$content-size` / `$wide-size`                 |

   - slug は省略しない kebab-case（`primary-background` ○ / `primary-bg` ×）。
   - fontSizes の `fluid` は必ず `false` か `{ "min": "..px", "max": "..px" }` を明示する（省略するとWordPressが独自に補間するためSCSSと値がずれる）。

3. `npm run theme-json`（`npm start` 中なら自動）で `src/assets/scss/global/_theme-json.scss` が再生成される。このファイルは直接編集しない。
4. body・リンク等のサイト全体スタイルは theme.json の `styles` で指定する（`foundation/_base.scss` に書かない）。

## 実装先

| 実装するもの               | 置き場所                                                                                  |
| -------------------------- | ----------------------------------------------------------------------------------------- |
| 固定ページのテンプレート   | `src/pages/page-{slug}.php`（先頭に `Template Name:`）                                    |
| トップページ               | `src/front-page.php`                                                                      |
| 複数ページで使うHTMLパーツ | `src/template-parts/`                                                                     |
| ページ固有のスタイル       | `src/assets/scss/page/_{slug}.scss` を作り `main.scss` に `@use` を追記                   |
| 再利用するパーツのスタイル | `object/component/`（`c-*`）、`object/project/`（`p-*`）。分類は [flocss.md](./flocss.md) |
| 画像                       | `src/assets/img/{ページ名}/`（共通は `common/`）。Figmaからは `download_assets` で取得    |

セクションのクラス名は、FigmaのセクションフレームのSP/PC共通の名前（例 `03_feature`）から番号を除いた英単語にする（例 `p-front-feature` や `.feature` ブロック）。

## 既存の部品（新規に書く前に必ず確認）

ガイドの「既存テンプレートを優先する」は、このテンプレートでは次を指す。

| 種類           | 既存の部品                                                                                                                        |
| -------------- | --------------------------------------------------------------------------------------------------------------------------------- |
| Layout         | `l-header`, `l-footer`, `l-page`, `l-main`                                                                                        |
| Component      | `c-button`（`--small`/`--large`/`--outlined`/`--rounded`）, `c-button-wrapper`, `c-input`, `c-select`, `c-radio`, `c-menu-icon`   |
| Project        | `p-container`（`--sm`/`--lg`）, `p-section-title`, `p-article-card`, `p-breadcrumb`, `p-pagination`, `p-form`, `p-editor-content` |
| Utility        | `u-hide-up-{xs,sm,md,lg,xl}`, `u-hide-down-{xs,sm,md,lg,xl}`                                                                      |
| template-parts | `page-header.php`, `breadcrumb.php`                                                                                               |
| Mixin / 関数   | `container()`, `media-up()`, `media-down()`, `hover()`, `fluid()`                                                                 |

## 差分の種類と実装方針（このテンプレートでの書き方）

ガイドの「差分の種類 → 実装方針」表を、このテンプレートでは次のように書く。モバイルファースト（`media-up` で上書き）が基本。

| 差分の種類                 | 書き方                                                                                          |
| -------------------------- | ----------------------------------------------------------------------------------------------- |
| 数値の差（フォント・余白） | `font-size: fluid(28px, 48px);` のように `fluid(SPの値, PCの値)` を使う。clamp() を手書きしない |
| カラム数の変化             | `display: grid` をベースに `@include media-up(md)` で `grid-template-columns` を切替            |
| 並び順が変わる             | `order` または `grid-template-areas` を `media-up` 内で切替                                     |
| 片方にしかない要素         | `u-hide-up-md`（SPのみ表示）/ `u-hide-down-md`（PCのみ表示）                                    |
| 画像の切り抜きが違う       | `<picture>` + `<source media="(min-width: 768px)">`、または `object-position`                   |
| デザインにない中間幅       | まず `fluid()` の補間で対応し、崩れる箇所だけ `media-up(md)` 等を追加                           |

- ブレークポイントは `global/_variable.scss` の `$breakpoint-up` / `$breakpoint-down`（xs 425 / sm 554 / md 768 / lg 992 / xl 1200）。
- 横幅の制御は `container()` mixin か `p-container` を使い、`position: absolute` でレイアウトを再現しない（装飾の重ね合わせのみ可）。
- 色・フォントは生成変数（`$color-*`, `$font-*`, `$font-size-*`）を使い、Figmaの値を直書きしない。theme.json にない値が出てきたら、追加するか近い既存値に寄せるかを中間仕様の「判断が必要な点」に書く。

## 検証（Playwright MCP）

1. `npm start` でローカル環境を起動する（Browsersync: `http://localhost:3000`、WordPress直: `http://localhost:9000`）。
2. Playwright MCP で対象ページを開き、ウィンドウ幅を「SPデザイン幅」「768px」「PCデザイン幅」（theme.json の fluid 設定値）にしてそれぞれフルページのスクショを撮る。
3. Figma の `get_screenshot` と並べて比較し、ずれ（余白・フォントサイズ・折り返し・並び順）を修正する。2〜3周を目安にする。
4. 最後に [AGENTS.md](../../AGENTS.md) の lint コマンドを実行する。
