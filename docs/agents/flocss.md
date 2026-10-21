# SCSS設計ガイド（FLOCSS）

[AGENTS.md](../../AGENTS.md) の「SCSS（FLOCSS）」の詳細版。新しいSCSSファイルを追加する場所や、Component/Projectの分類に迷ったときに参照する。

## ディレクトリ構成

```
src/assets/scss/
├── main.scss              # エントリーポイント（Viteでコンパイル）
├── foundation/            # リセットCSS、ベーススタイル
│   ├── _base.scss
│   └── _ress.scss         # リセットCSS（Lint/Prettier対象外）
├── global/                # 変数・mixinなどプロジェクト全体で使う定義
│   ├── _variable.scss
│   └── _mixin.scss        # @include media などのメディアクエリmixin
├── layout/                 # ヘッダー・フッターなどページ共通の骨組み
│   ├── _l-header.scss
│   ├── _l-footer.scss
│   └── _l-page.scss
├── object/
│   ├── component/          # 再利用可能なパーツ（c-*）
│   ├── project/             # componentの組み合わせ（p-*）
│   └── utility/             # 汎用ユーティリティ
└── page/                    # ページ固有のスタイル
```

## Component と Project の使い分け

正直なところ厳密な正解はなく、プロジェクト内で一貫していればよい。迷ったときの目安:

### Object - Component（`c-*`）

- Bootstrapのcomponentのように、単体で再利用できるパーツ。例: `c-button`, `c-grid`, `c-input`。
- **marginは使用しない**。あくまでパーツとして扱い、配置や余白はComponentを使う側（ProjectやLayout）で制御する。
- 単体で完結し、他のComponentへの依存を持たせない。

### Object - Project（`p-*`）

- 複数のComponentを組み合わせた、特定の文脈を持つ構成要素。例: `p-article-card`, `p-form`, `p-pagination`。
- ページやセクション固有の見た目・余白の調整はここで行う。

### ページ固有のスタイル

- 特定のページでしか使わないスタイルは `page/` 配下に、ページ名に対応するファイルとして追加する（例: `page/_about.scss` → `about`ページ）。
- Component/Projectとして再利用できそうなスタイルをページ固有ファイルに書かない。汎用性があるなら `object/` に格上げする。

参考: [FLOCSSを使ったCSS設計での悩みどころと解決案](https://qiita.com/uggds/items/d904b2f9a103c37a25fa)、[FLOCSS本家リポジトリ](https://github.com/hiloki/flocss)

## 命名規則

- ファイル名・クラス名は省略しない。誰が読んでも意味が分かる名前にする。
  - NG例: `txt`, `btn`
  - OK例: `text`, `button`
- 独自の略語・造語を作らない。
- 例外: utilityクラスの**クラス名**は長くなりがちなため省略可。ただしutilityの**ファイル名**は省略しない。

## 単位

`.stylelintrc` の `unit-allowed-list` で許可されている単位のみ使用する: `em`, `rem`, `s`, `px`, `%`, `deg`, `vw`, `vh`, `fr`, `cqw`。
