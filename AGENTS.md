# AGENTS.md

このリポジトリでAIコーディングエージェントが作業する際に守るべきルール。

## プロジェクト概要

クラシックなWordPressテーマ（ブロックテーマ/FSEではない）。Vite + Docker + wordmoveで構成された開発テンプレート。詳細な環境構築手順・wordmoveの使い方は [README.md](./README.md) を参照。

## 絶対厳守: 編集対象は `src/` のみ

- テーマの実装は必ず `src/` 配下で行う。
- `public/`（開発時のビルド先。WordPress本体を含む）と `dist/`（本番ビルド出力）は生成物。**直接編集しない**。`npm start`/`npm run build` 実行時に `src/` の内容がコンパイル・コピーされる。

## 開発コマンド

```
npm install       # 依存関係インストール（初回・package.json変更時）
npm start         # Vite watch + scss watch + copy watch + Browsersync + Docker を並列起動
npm stop          # npm start停止後、立ち上がったままのDockerを停止
npm run build     # 本番用ビルドをdist/に出力
npm run wp -- <コマンド>  # WP-CLI（固定ページ・タームの作成など。Docker起動中に使う）
```

詳細は [README.md](./README.md) の `開発環境構築手順` / `wordmoveの利用方法` を参照。

## コード変更後に必ず実行するコマンド

`lint`/`format`/`test` のnpm scriptは定義されていない（エディタのformat-on-save運用のみ）。JS/SCSSを変更したら、コミット前に以下を手動で実行し、エラーがないことを確認する。

```
npx eslint <変更したファイル or ディレクトリ>
npx stylelint "src/assets/scss/**/*.scss"
npx prettier --check <変更したファイル>   # 崩れていれば --write で整形
```

- ESLint設定: `eslint.config.mjs`（ESLint v9 flat config）。`public/`, `dist/`, `node_modules/`, `scripts/`, `src/assets/js/plugins/`, `vite.config.mjs`, `bs-config.js` は対象外。
- Stylelint設定: `.stylelintrc`（`stylelint-config-standard-scss` + `stylelint-config-recess-order`）。`_ress.scss` は対象外。
- Prettier設定ファイルは無し（デフォルトルールで整形）。`_ress.scss` と `js/plugins/*.js` は対象外（`.prettierignore`）。

## JavaScript

- Vite の実バンドル対象は `src/assets/js/main.js` のみ。`src/assets/js/plugins/` 配下は Lint・バンドル対象外でそのまま `public/`/`dist/` にコピーされる（外部ライブラリの素置き用）。
- ESLintルール: `no-var: error`（`var` 禁止、`let`/`const` を使う）、`semi: always`（セミコロン必須）。
- `jQuery`/`$` はグローバル扱い（`window.jQuery` として外部化）。import不要。

## SCSS（FLOCSS）

- `src/assets/scss/` は [FLOCSS](https://github.com/hiloki/flocss) 設計に準拠: `foundation/` `global/` `layout/` `object/{component,project,utility}/` `page/`。
- ページ固有のスタイルは `page/` 配下に追加する。
- メディアクエリは `global/_mixin.scss` の `@include media-up(md)` / `@include media-down(md)` を使う（モバイルファースト＝`media-up` が基本）。
- SPとPCの間で数値を補間する場合は `fluid(SPの値, PCの値)` 関数を使い、`clamp()` を手書きしない。
- 詳細な設計判断（component vs project の使い分けなど）は [docs/agents/flocss.md](./docs/agents/flocss.md) を参照。

### 命名規則（重要）

- ファイル名・クラス名は**省略しない**。誰が見ても分かる名前にする。`txt` や `btn` のような省略はNG。独自の略語も作らない。
- 例外: utilityクラスの**クラス名のみ**省略可（名前が長くなりがちなため）。utilityの**ファイル名**は省略しない。
- Object - Component（`c-*`）: 再利用可能なパーツ（例: `c-button`）。**marginは使用しない**。あくまで単体のパーツとして扱う。
- Object - Project（`p-*`）: 複数のComponentを組み合わせた構成要素（例: `p-card`）。

## デザイントークン（theme.json）

- 色・フォントファミリー・フォントサイズ・余白・コンテンツ幅・サイト全体スタイル（body・リンク等）は **`src/theme.json` が正**。
- SCSSでは `scripts/theme-json.js` が生成する変数（`$color-*`, `$font-*`, `$font-size-*`, `$spacing-*`, `$design-width-sp/pc` など）を使う。色やフォントサイズをSCSSに直書きしない。新しい値が必要なら theme.json に追加する。
- `src/assets/scss/global/_theme-json.scss` は自動生成ファイル。**直接編集しない**（`npm start` 中は theme.json の保存で自動再生成、単体では `npm run theme-json`）。
- body・リンクの基本スタイルは theme.json の `styles` に書く（`foundation/_base.scss` に重複して書かない）。

## Figma MCP での実装

FigmaデザインからのコーディングはFigma MCPを使い、[docs/agents/figma-mcp.md](./docs/agents/figma-mcp.md)（手順の正本）と [docs/agents/figma-mcp-wordpress.md](./docs/agents/figma-mcp-wordpress.md)（このテンプレートでの当てはめ方）に従う。要点:

- Figmaの生成コードはそのまま使わず、メタデータとスクショから仕様を読み取る。`position: absolute` でレイアウトを再現しない。
- セクション単位で処理し、中間仕様（差分表）を出力したら**一度止まって承認を待つ**。
- デザイン幅（PC/SP/TAB）は案件ごとに異なる。最初の実装前にユーザーに確認して `docs/project/site-info.md` に記録し、PC/SPは theme.json の `settings.typography.fluid` に反映する。
- ページごとのFigmaリンクは `docs/project/sitemap.md` の「デザインデータ（Figma）」表を使う。制作途中でURLが追加・変更されたら、その作業の中で表を更新する。
- 既存の部品（`c-button`, `p-container` など）を優先して使う。
- 実装後は Playwright MCP（`.mcp.json`）でSP幅・768px・PC幅のスクショを撮り、Figmaと比較して修正する。

## PHP / WordPress

- このリポジトリに **PHPCS/WPCS/Composerによる自動チェックは存在しない**（`composer.json`なし）。PHPの整形・検証はエディタ拡張（intelephense）に依存しており、CIやCLIでの強制はされていない。
- 既存の `functions/` 配下は機能ごとにファイルを分割する構成（`custom_acf.php`, `register_post_taxonomy.php` など）。新しい機能を追加する場合もこの粒度に合わせてファイルを分割する。
- WordPressのフック（アクション・フィルター）を優先し、コア/プラグインファイルの直接編集は避ける。
- 一般的なWordPress/PHPのベストプラクティス（サニタイズ、nonce検証、`$wpdb`/`prepare()`、`wp_enqueue_*` など）は強制ではないが推奨。詳細は [docs/agents/wordpress-php.md](./docs/agents/wordpress-php.md) を参照。

## 詳細情報（必要なときだけ参照）

普段の作業では上記で十分。以下は特定の作業をするときだけ読む。

| ドキュメント | 参照するタイミング |
| --- | --- |
| [docs/agents/figma-mcp.md](./docs/agents/figma-mcp.md) / [docs/agents/figma-mcp-wordpress.md](./docs/agents/figma-mcp-wordpress.md) | FigmaデザインをMCP経由で実装するとき |
| [docs/project/](./docs/project/README.md) | ページ構成・URL・サイト名・FigmaのURLなど案件固有の情報が必要なとき |
| [docs/agents/flocss.md](./docs/agents/flocss.md) | SCSSの新規ファイル追加やComponent/Projectの分類に迷ったとき |
| [docs/agents/wordpress-php.md](./docs/agents/wordpress-php.md) | PHP側でカスタム投稿タイプ、フォーム処理、DBクエリなどを実装するとき |
| [README.md](./README.md) の `wordmoveの利用方法` | ステージング/本番環境への同期・デプロイをするとき |
| [README.md](./README.md) の `開発環境構築手順` | Docker/環境変数まわりのセットアップやトラブルシューティングをするとき |
