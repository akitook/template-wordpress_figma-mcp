# サイト基本情報

[docs/project/README.md](./README.md) から参照される、サイト名・連絡先・外部サービスなどの基本情報。連絡先やSNSリンクを書くとき、meta/OGPを設定するときに読む。

## 基本情報 設定例

| 項目         | 値                         |
| ------------ | -------------------------- |
| サイト名     | Knot total wedding produce |
| 略称         | Knot                       |
| 電話 / FAX   | 082-555-1122               |
| メール       | info@knotwedding.jp        |
| 本番ドメイン | https://knotwedding.jp/    |

## 外部サービス

| サービス         | URL / ID                                        |
| ---------------- | ----------------------------------------------- |
| Instagram        | https://www.instagram.com/knot_wedding_produce/ |
| LINE             | https://lin.ee/v2aOlLW                          |
| Adobe Fonts      | kitId `vcw1irq`                                 |
| Google Analytics | 要確認                                          |

## ブランド用語

| 正式表記  | 読み     | 備考     |
| --------- | -------- | -------- |
| Muni      | むに     | プラン名 |
| Awai      | あわい   | プラン名 |
| Utsushiki | うつしき | プラン名 |

## meta / OGP

| 項目             | 値     |
| ---------------- | ------ |
| meta description | 要確認 |
| OGP画像          | 要確認 |

## デザインデータ

| 項目           | 値                                                   |
| -------------- | ---------------------------------------------------- |
| Figma ファイル | https://www.figma.com/design/QYRwbwI06HPnJ7ccMcEyR2/ |
| PCデザイン幅   | 1920px                                               |
| SPデザイン幅   | 375px                                                |
| TABデザイン幅  | 1280px                                               |

- デザイン幅はFigmaのフレーム幅。案件によって異なるため、セットアップ時に確認して記入する（TABのデザインがない場合は `-`）。手順は [figma-mcp-wordpress.md](../agents/figma-mcp-wordpress.md) の「セットアップ」。
- PC/SPの幅は `src/theme.json` の `settings.typography.fluid`（`maxViewportWidth` / `minViewportWidth`）と必ず一致させる。
- ページごとのフレーム（PC/SP/TAB）のリンクは [sitemap.md](./sitemap.md) の「デザインデータ（Figma）」に書く。
