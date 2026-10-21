# Figma MCP 実装ルール（このテンプレート用）

[figma-mcp.md](./figma-mcp.md)（正本ガイド）の手順を、このWordPressテンプレートで実行するときの具体ルール。ガイドの「案件側のルールファイル」にあたる。ガイドと本ファイルの両方を読んでから作業する。

- 案件固有の情報（FigmaのURL、ページ構成）は [docs/project/](../project/README.md) を見る。ページごとのFigmaフレーム（PC/SP/TAB）は [sitemap.md](../project/sitemap.md) の「デザインデータ（Figma）」、Figmaファイル自体のURLは [site-info.md](../project/site-info.md) の「デザインデータ」。
- ガイドの手順・ルールを変える場合は `figma-mcp.md` を、このテンプレートでの当てはめ方を変える場合は本ファイルを更新する。

## 案件開始の流れ

| #   | 作業                                                                                                                                                                                             | 担当                     |
| --- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------ |
| 0   | 環境構築（`.env`、`src/style.css`、`npm install`、`npm start`、WordPressのインストール、テーマの有効化）。[README](../../README.md) の「開発環境構築手順」                                       | ユーザー                 |
| 1   | [docs/project/](../project/README.md) の `site-info.md` / `sitemap.md` をサンプルから案件の内容に置き換える。不明な値は `要確認` のままでよい                                                    | ユーザー（AIの下書き可） |
| 2a  | sitemap.md から、カスタム投稿・タクソノミーの登録（`src/functions/register_post_taxonomy.php`）と、ページテンプレートの雛形を作る                                                                | AI                       |
| 2b  | sitemap.md から、固定ページの作成（テンプレート・親ページの割り当て）、タームの登録、パーマリンク設定（`/%postname%/`）を WP-CLI（`npm run wp -- <コマンド>`）で行い、全URLが200になるか確認する | AI                       |
| 3a  | `/mcp` でFigmaを認証し、Playwright MCP（`.mcp.json`）の利用を許可する                                                                                                                            | ユーザー                 |
| 3b  | 下の「セットアップ」（デザイン幅の確定、Figmaリンクの記入）                                                                                                                                      | AI（幅の確定はユーザー） |
| 3c  | 下の「デザイントークンの取り込み」                                                                                                                                                               | AI                       |
| 4   | 共通部分（header/footer）→ 各ページをセクション単位で実装する                                                                                                                                    | AI＋ユーザー確認         |

- Figmaに sitemap.md にないページがありそうなら、3bを2より先に行い、sitemap.md を直してから2に進む。
- 3b・3cは全ページのリンクがそろっていなくても、代表ページのフレームとFigmaの変数があれば実施できる。

## セットアップ（案件開始時に1回）

デザイン幅（PC/SP/TAB）は案件ごとに異なる。最初のFigma実装の前に次を行い、[site-info.md](../project/site-info.md) の「デザインデータ」が `要確認` のままなら実装に進まない。

1. FigmaファイルのURLをユーザーに確認し、site-info.md に記入する。
2. PC/SP/TABのフレーム幅を確認する。代表ページのフレームを `get_metadata` で取得して幅を読み取り、「PC 1440px / SP 375px / TAB なし」のようにユーザーに提示して確定してもらう（推測で確定しない）。
3. 確定した幅を site-info.md に記入する（TABのデザインがない場合は `-`）。
4. PC/SPの幅を `src/theme.json` の `settings.typography.fluid` に反映する（下の「デザイン幅」）。
5. 分かる範囲で [sitemap.md](../project/sitemap.md) の「デザインデータ（Figma）」表を埋める。残りは `要確認` のままでよい。

ページによってフレーム幅が site-info.md の値と違う場合は、そのまま進めずユーザーに確認する。

## 対象ページのデザインデータとパターンの選択

作業開始時に [sitemap.md](../project/sitemap.md) の「デザインデータ（Figma）」表で、対象ページのPC/SP/TABのリンクを確認し、次のように進め方を決める。ユーザーがプロンプトでURLを渡していない場合も、この表のリンクを使う。

| 表の状態           | 進め方                                                                                                    |
| ------------------ | --------------------------------------------------------------------------------------------------------- |
| PCとSPがある       | ガイドのパターン1（PC＋SPからレスポンシブ実装）                                                           |
| PCのみ（SPが `-`） | ガイドのパターン2（PCからSPを生成）。生成したSPは人の確認を待つ                                           |
| TABがない（`-`）   | 中間幅は `fluid()` の補間で対応し、崩れる箇所だけブレークポイントを追加                                   |
| TABがある          | TABのフレームも `get_metadata` / `get_screenshot` で取得して差分表に列を追加し、検証時にTAB幅でも比較する |
| `要確認` / 空欄    | 推測で進めず、ユーザーにリンクを確認する                                                                  |

## 制作途中のリンク追加・デザイン修正

FigmaのURLは制作途中で追加・差し替えが頻繁に起こる。sitemap.md の表が古い可能性を前提に、次のように扱う。

| 起きたこと                                                      | 対応                                                                                                                                                           |
| --------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| プロンプトのURLが表と違う / 表にない                            | プロンプトのURLを優先して作業し、同じ作業の中で表を更新する。更新したことをユーザーに報告する                                                                  |
| 新しいページのフレームが追加された                              | sitemap.md の「ページ一覧」と「デザインデータ」の両方に行を追加する                                                                                            |
| 同じURLのままデザインが修正された                               | 「更新メモ」に記録する。実装済みのページなら、修正されたセクションだけ `get_screenshot` を取り直して差分表を作り、変更箇所だけ直す（ページ全体を作り直さない） |
| PCのみだったページにSPが追加された                              | パターン2で生成済みのSPを、追加されたSPデザインと比較して修正する（パターン1の差分表を作る）                                                                   |
| TABが追加された                                                 | site-info.md のTAB幅を確認・記入し、TAB幅での検証を追加する                                                                                                    |
| リンク切れ（`get_metadata` が失敗する、フレームが見つからない） | 似たフレームを推測で使わず、ユーザーに正しいリンクを確認する                                                                                                   |

反映が終わったら「更新メモ」を `反映済み` にする。

## デザイン幅（案件ごとに設定）

確定したデザイン幅の記録は [site-info.md](../project/site-info.md)。そのうちSP幅・PC幅は、ビルドで使うため `src/theme.json` の次の2値にも設定する（初期値の375px / 1440pxはあくまで仮）。

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
| 検証         | Playwright MCP でスクショを撮る幅（この2値 + TAB幅。TABがなければ768px）       |

## デザイントークンの取り込み（theme.json）

色・フォント・フォントサイズ・余白は `src/theme.json` が正。SCSSに直接値を書かない。

1. 対象フレームで `get_variable_defs` を実行し、変数（色・フォント等）を取得する。変数が取れない場合は `get_design_context` / スクショの値から拾う。
2. `src/theme.json` に追加・更新する。

   | Figmaの値                                            | theme.json の場所                        | SCSSで使う変数                                 |
   | ---------------------------------------------------- | ---------------------------------------- | ---------------------------------------------- |
   | 色                                                   | `settings.color.palette`                 | `$color-{slug}` / `map.get($colors, "{slug}")` |
   | フォントファミリー                                   | `settings.typography.fontFamilies`       | `$font-{slug}`                                 |
   | フォントサイズ                                       | `settings.typography.fontSizes`          | `$font-size-{slug}`                            |
   | 余白                                                 | `settings.spacing.spacingSizes`          | `$spacing-{slug}`                              |
   | コンテンツ幅                                         | `settings.layout.contentSize / wideSize` | `$content-size` / `$wide-size`                 |
   | テキストスタイル（サイズ・行間・字間・太さのセット） | `settings.custom.textStyles`             | `@include text-style("{name}")`                |

   - slug は省略しない kebab-case（`primary-background` ○ / `primary-bg` ×）。
   - textStyles の `fontFamily` / `fontSize` はスラッグで指定する。SPとPCで値が違うプロパティは `{ "sp": "1.6", "pc": "1.8" }` と書くと、`media-up(md)` で切り替わる。Figmaの letterSpacing（%）は `em` に換算する（10 → `0.1em`）。
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
2. Playwright MCP で対象ページを開き、[site-info.md](../project/site-info.md) のデザイン幅（SP・TAB・PC）でそれぞれフルページのスクショを撮る。TABが `-` の場合は768pxで撮る（Figmaとの比較はせず、崩れがないかだけ確認する）。
3. Figma の `get_screenshot` と並べて比較し、ずれ（余白・フォントサイズ・折り返し・並び順）を修正する。2〜3周を目安にする。
4. 最後に [AGENTS.md](../../AGENTS.md) の lint コマンドを実行する。
