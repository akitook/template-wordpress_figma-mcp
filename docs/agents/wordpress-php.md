# WordPress / PHP 実装ガイド

[AGENTS.md](../../AGENTS.md) の「PHP / WordPress」の詳細版。カスタム投稿タイプ、フォーム処理、DBクエリなど、PHP側の実装をするときに参照する。

**このリポジトリにはPHPCS/WPCS/Composerによる自動チェックは存在しない。** 以下はCLIやCIで強制されないガイドラインであり、既存コード（`src/functions/` 配下）との一貫性を優先しつつ、新規実装の指針として使う。

## 既存の構成パターン

- `src/functions.php` が `src/functions/` 配下の各ファイルを読み込む構成。
- `src/functions/` は機能単位でファイルを分割する（例: `custom_acf.php`, `register_post_taxonomy.php`, `register_style_script.php`, `custom_pagination.php`）。新機能を追加する際もこの粒度に合わせる。
- テンプレートファイルはWordPressのテンプレート階層に従う（`page.php`, `archive.php`, `single.php`, `front-page.php` など）。ページ固有テンプレートは `src/pages/page-*.php`、共通パーツは `src/template-parts/` に置く。

## 推奨プラクティス

- コア/プラグインファイルを直接編集せず、フック（アクション・フィルター）で拡張する。
- テーマ機能の追加は `functions.php`／`functions/` 配下に実装する。
- データの出力時はエスケープ関数（`esc_html()`, `esc_attr()`, `esc_url()` など）、入力時はサニタイズ関数（`sanitize_text_field()` など）を使う。
- フォーム送信・AJAX処理にはnonce検証（`wp_nonce_field()` / `check_admin_referer()` / `wp_verify_nonce()`）を実装する。
- DBに直接クエリを書く場合は `$wpdb` を使い、値の埋め込みは必ず `prepare()` を通す。
- アセットの読み込みは `wp_enqueue_script()` / `wp_enqueue_style()` を使う（`<script>`/`<link>` を直接埋め込まない）。
- カスタム投稿タイプ・タクソノミーの登録は既存の `register_post_taxonomy.php` / `register_thumbnails.php` のパターンに倣う。
- 翻訳可能な文字列はi18n関数（`__()`, `_e()` など）でラップする。
- ページネーションは `paginate_links()` を使う（既存実装: `custom_pagination.php`）。

## 参考: WordPress一般のベストプラクティス

- WordPressのユーザーロール・権限システムを尊重する（独自の権限チェックを作り込まない）。
- 繰り返し使う値のキャッシュにはTransients APIを検討する。
- 長時間処理はリクエスト内で完結させず、`wp_cron()` によるバックグラウンド実行を検討する。
- 設定値の保存はOptions APIを使う（独自テーブルを安易に作らない）。
