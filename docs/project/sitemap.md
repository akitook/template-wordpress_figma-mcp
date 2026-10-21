# サイトマップ

[docs/project/README.md](./README.md) から参照される、サイト構造の一覧。ページの追加、リンク作成、URL・スラッグ、ページごとのFigmaフレームを確認するときに読む。

**ページ・投稿タイプ・タクソノミーを変更したら、同じコミットでこのファイルを更新する。**

## 全体構造

```mermaid
graph TD
  top["Top /"]
  top --> about["About /about/"]
  top --> plan["Plan /plan/"]
  plan --> muni["Muni /plan/muni/"]
  plan --> awai["Awai /plan/awai/"]
  plan --> utsushiki["Utsushiki /plan/utsushiki/"]
  top --> works["Works /works/"]
  top --> news["News /news/"]
  top --> faq["FAQ /faq/"]
  top --> contact["Contact /contact/"]
  contact --> confirm["確認 /contact/confirm/"]
  contact --> complete["完了 /contact/complete/"]
  top --> privacy["Privacy Policy /privacy-policy/"]
```

## ページ一覧

- **種別**: `フロント` / `固定ページ` / `CPTアーカイブ` / `CPTシングル` / `タクソノミーアーカイブ`
- **テンプレート**: 固定ページは `src/pages/page-*.php` の `Template Name` を管理画面で選んで適用する（スラッグでは自動で決まらない）。

| ページ名         | URL                          | スラッグ         | 種別                   | 親        | テンプレート                                            |
| ---------------- | ---------------------------- | ---------------- | ---------------------- | --------- | ------------------------------------------------------- |
| Top              | `/`                          | -                | フロント               | -         | `front-page.php`                                        |
| About            | `/about/`                    | `about`          | 固定ページ             | -         | `pages/page-about.php`                                  |
| Plan             | `/plan/`                     | `plan`           | 固定ページ             | -         | `pages/page-plan.php`                                   |
| Muni             | `/plan/muni/`                | `muni`           | 固定ページ             | Plan      | `pages/page-plan-muni.php`                              |
| Awai             | `/plan/awai/`                | `awai`           | 固定ページ             | Plan      | `pages/page-plan-awai.php`                              |
| Utsushiki        | `/plan/utsushiki/`           | `utsushiki`      | 固定ページ             | Plan      | `pages/page-plan-utsushiki.php`                         |
| Works一覧        | `/works/`                    | -                | CPTアーカイブ          | -         | `archive-works.php`                                     |
| Works詳細        | `/works/{post-slug}/`        | -                | CPTシングル            | Works一覧 | `single-works.php`                                      |
| News一覧         | `/news/`                     | -                | CPTアーカイブ          | -         | `archive-news.php`                                      |
| News詳細         | `/news/{post-slug}/`         | -                | CPTシングル            | News一覧  | `single-news.php`                                       |
| Newsカテゴリー   | `/news/newscat/{term-slug}/` | -                | タクソノミーアーカイブ | News一覧  | `taxonomy-newscat.php`（`archive-news.php` を読み込む） |
| FAQ              | `/faq/`                      | `faq`            | 固定ページ             | -         | -                                                       |
| Contact          | `/contact/`                  | `contact`        | 固定ページ             | -         | `pages/page-contact.php`                                |
| お問い合わせ確認 | `/contact/confirm/`          | `confirm`        | 固定ページ             | Contact   | `pages/page-contact-confirm.php`                        |
| お問い合わせ完了 | `/contact/complete/`         | `complete`       | 固定ページ             | Contact   | `pages/page-contact-complete.php`                       |
| Privacy Policy   | `/privacy-policy/`           | `privacy-policy` | 固定ページ             | -         | `pages/page-privacy.php`                                |
| UIコンポーネント | `/components/`               | `components`     | 固定ページ             | -         | `pages/page-components.php`                             |

## デザインデータ（Figma）

ページごとのFigmaフレームへのリンク。Figma MCPで実装するときは、ここでPC/SP/TABのどれがあるかを確認してから進める（[figma-mcp-wordpress.md](../agents/figma-mcp-wordpress.md)）。

- リンクはページ単位のフレーム（`node-id` 付きURL）。セクション単位のリンクは書かない（`get_metadata` で取得する）。
- そのデザインがない場合は `-`、未確認の場合は `要確認` と書く。
- ページ名は上の「ページ一覧」と揃える。Figmaファイル自体のURLは [site-info.md](./site-info.md) の「デザインデータ」に書く。
- 制作途中でリンクの追加・差し替えやデザインの修正があったら、その作業の中でこの表を更新し、「更新メモ」に `YYYY-MM-DD 内容（未反映 / 反映済み）` を書く。古いメモは実装に反映したら消してよい。

記入例: `[PC](https://www.figma.com/design/xxxx/yyyy?node-id=1-2)`

| ページ名         | PC                                                                                                                                            | SP                                                                                                                                             | TAB                                                                                                                                            | 更新メモ |
| ---------------- | --------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- | -------- |
| Top              | https://www.figma.com/design/QYRwbwI06HPnJ7ccMcEyR2/K_Knot%EF%BC%88%E3%83%8E%E3%83%83%E3%83%88%EF%BC%89?node-id=8039-658&t=1rjjAscQRdlKcR9R-4 | https://www.figma.com/design/QYRwbwI06HPnJ7ccMcEyR2/K_Knot%EF%BC%88%E3%83%8E%E3%83%83%E3%83%88%EF%BC%89?node-id=8047-1596&t=1rjjAscQRdlKcR9R-4 | https://www.figma.com/design/QYRwbwI06HPnJ7ccMcEyR2/K_Knot%EF%BC%88%E3%83%8E%E3%83%83%E3%83%88%EF%BC%89?node-id=8542-6519&t=1rjjAscQRdlKcR9R-4 | -        |
| About            | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Plan             | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Muni             | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Awai             | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Utsushiki        | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Works一覧        | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Works詳細        | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| News一覧         | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| News詳細         | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| FAQ              | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Contact          | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| お問い合わせ確認 | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| お問い合わせ完了 | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |
| Privacy Policy   | 要確認                                                                                                                                        | 要確認                                                                                                                                         | 要確認                                                                                                                                         | -        |

## カスタム投稿タイプ

登録: `src/functions/register_post_taxonomy.php`

| post_type | 名称  | アーカイブURL | タクソノミー                                                              | 内容     |
| --------- | ----- | ------------- | ------------------------------------------------------------------------- | -------- |
| `news`    | News  | `/news/`      | `newscat`                                                                 | お知らせ |
| `works`   | Works | `/works/`     | `works_plan`, `works_area`, `works_guests`, `works_season`, `works_venue` | 施工事例 |

## カスタムタクソノミー

| taxonomy       | 名称       | 対象    | 階層 | URL                          |
| -------------- | ---------- | ------- | ---- | ---------------------------- |
| `newscat`      | カテゴリー | `news`  | あり | `/news/newscat/{term-slug}/` |
| `works_plan`   | プラン     | `works` | あり | -                            |
| `works_area`   | エリア     | `works` | あり | -                            |
| `works_guests` | 人数       | `works` | あり | -                            |
| `works_season` | 季節       | `works` | あり | -                            |
| `works_venue`  | 会場       | `works` | あり | -                            |

- `works_*` はWorks一覧の絞り込み用（`src/functions/custom_works_filter.php`）。`rewrite => false` のためタームアーカイブのURLは生成せず、`/works/?works_area=tokyo,osaka` のようにクエリパラメータで絞り込む。
- 一覧ページのフィルターの表示順は `works_taxonomies()`（`src/functions/register_post_taxonomy.php`）の並び順。

### ターム

| taxonomy  | ターム名 | スラッグ |
| --------- | -------- | -------- |
| `newscat` | お知らせ | news     |
| `newscat` | イベント | event    |
| `newscat` | レポート | report   |

`works_*` のタームは未登録。管理画面で追加したらここに追記する。
