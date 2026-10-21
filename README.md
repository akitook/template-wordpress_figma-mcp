# WP TEMPLATE

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->

- [command](#command)
- [開発環境構築手順](#%E9%96%8B%E7%99%BA%E7%92%B0%E5%A2%83%E6%A7%8B%E7%AF%89%E6%89%8B%E9%A0%86)
  - [wordpressをサブディレクトリに置く場合](#wordpress%E3%82%92%E3%82%B5%E3%83%96%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%81%AB%E7%BD%AE%E3%81%8F%E5%A0%B4%E5%90%88)
  - [環境構築途中で不具合があったとき](#%E7%92%B0%E5%A2%83%E6%A7%8B%E7%AF%89%E9%80%94%E4%B8%AD%E3%81%A7%E4%B8%8D%E5%85%B7%E5%90%88%E3%81%8C%E3%81%82%E3%81%A3%E3%81%9F%E3%81%A8%E3%81%8D)
- [仕様説明](#%E4%BB%95%E6%A7%98%E8%AA%AC%E6%98%8E)
  - [開発について](#%E9%96%8B%E7%99%BA%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)
  - [CSS(SCSS)について](#cssscss%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)
  - [JSについて](#js%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)
  - [その他](#%E3%81%9D%E3%81%AE%E4%BB%96)
- [ファイル構成](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E6%A7%8B%E6%88%90)
  - [ページテンプレート](#%E3%83%9A%E3%83%BC%E3%82%B8%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88)
  - [バックエンド](#%E3%83%90%E3%83%83%E3%82%AF%E3%82%A8%E3%83%B3%E3%83%89)
  - [フロントエンド](#%E3%83%95%E3%83%AD%E3%83%B3%E3%83%88%E3%82%A8%E3%83%B3%E3%83%89)
    - [package.json](#packagejson)
    - [vite.config.mjs](#viteconfigmjs)
    - [「eslint.config.mjs、.stylelintrc」](#eslintconfigmjsstylelintrc)
- [wordmoveの利用方法](#wordmove%E3%81%AE%E5%88%A9%E7%94%A8%E6%96%B9%E6%B3%95)
  - [準備](#%E6%BA%96%E5%82%99)
  - [wordmoveコンテナにログイン&セットアップ](#wordmove%E3%82%B3%E3%83%B3%E3%83%86%E3%83%8A%E3%81%AB%E3%83%AD%E3%82%B0%E3%82%A4%E3%83%B3%E3%82%BB%E3%83%83%E3%83%88%E3%82%A2%E3%83%83%E3%83%97)
  - [ローカルサーバーからリモートサーバーへpush](#%E3%83%AD%E3%83%BC%E3%82%AB%E3%83%AB%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%81%8B%E3%82%89%E3%83%AA%E3%83%A2%E3%83%BC%E3%83%88%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%81%B8push)
- [SCSSの構成について](#scss%E3%81%AE%E6%A7%8B%E6%88%90%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)
  - [ComponentとProjectで迷ったとき](#component%E3%81%A8project%E3%81%A7%E8%BF%B7%E3%81%A3%E3%81%9F%E3%81%A8%E3%81%8D)
    - [Object - Component](#object---component)
    - [Object - Project](#object---project)
  - [その他ルール](#%E3%81%9D%E3%81%AE%E4%BB%96%E3%83%AB%E3%83%BC%E3%83%AB)
    - [ファイル名、クラス名なるべくは省略しない](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E5%90%8D%E3%82%AF%E3%83%A9%E3%82%B9%E5%90%8D%E3%81%AA%E3%82%8B%E3%81%B9%E3%81%8F%E3%81%AF%E7%9C%81%E7%95%A5%E3%81%97%E3%81%AA%E3%81%84)
- [NotoSansについて](#notosans%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## command
初回にpackage.jsonに記述されているモジュールをインストール。
package.jsonを変更したときも.
```
npm install
```
開発時の基本コマンド。 Vite、Browsersync、Dockerが同時に立ち上がる。

```
npm start
```

npm startで起動後Ctrl + CでVite、Browsersyncは停止するが、Dockerは立ち上がったままなので以下のコマンドで停止できる
```
npm stop
```

本番用のビルドされたファイルが、distディレクトリに出力される。
```
npm run build
```

Docker内のWordPressを再インストールし直す。Dockerの起動に失敗し、壊れた際などに使用。
```
npm run docker-rebuild
```

wordmoveコンテナにログイン
```
npm run login:wordmove
```




## 開発環境構築手順
1.  ローカルにファイルを設置 i) ii)いずれかの方法で行う

	i) このリポジトリのgithubページの緑のボタン[Use this template]から任意のプロジェクトのリポジトリを作成し、clone。

	ii) DOWNLOAD ZIPから、このリポジトリのファイルをダウンロード
			ZIPファイルを解凍し、解凍されたフォルダを英数字で任意のプロジェクトの名前に設定する。例）new_project

2. .env.sampleファイルをコピーして.envにリネーム。.env内のPROJECT_NAME, THEME_NAME, WORDPRESS_DIRを変更

3. package.jsonのprelogin:wordmove, login:wordmoveにある[.envで設定したPROJECT_NAME]を変更

4. src/style.cssを書き換えて、テーマ名などを変更

5. ターミナルを開いて、プロジェクトのディレクトリを参照する。
npm install でセットアップ
npm start ※インストール時は「http://localhost:9000/」でアクセス

### wordpressをサブディレクトリに置く場合
1. [開発環境構築手順]の2で、WORDPRESS_DIRにサブディレクトリ名を設定(ex: wp)。リモートサーバーのパスも同様の設定にする。あとは[開発環境構築手順]の2,3,4,5は同様。

2. `npm install`, `npm start`後、public/サブディレクトリ】/index.php, .htaccessの2つのファイルをpublic/直下にコピー。

3. public/index.phpの内容をサブディレクトリ用に修正
```
// 変更前
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
// 変更後
require( dirname( __FILE__ ) . '/[サブディレクトリ名]/wp-blog-header.php' );
```

4. wordpress管理画面でパーマリンク設定を保存。（何も修正せずに保存でOK）

### 環境構築途中で不具合があったとき
上から順に確認。全てリセット＆削除したい場合は4から。
1. 起動が遅い場合があるので2~3分待ってみる。

Ctr + Cでdocker-composeを停止後それぞれの順番で確認 & `npm start`
2. .envの内容が正しいか確認
- .envファイルはルート（.env.sampleと同じディレクトリ）に置いているか
- .envで設定している変数で=の後ろにスペース等余計な文字がが入っていないか。
3. dockerのコンテナを停止＆削除

	`$ docker-compose down`

4. dockerのコンテナを停止＆削除かつボリュームを削除

<span style="color: red;">**注意** コンテナ内のDBのデータ等すべて消えます。リセットしたいときだけ使用してください。</span>

`$ docker-compose down -v`

## 仕様説明

### 開発について
npm start時に、srcファイルにあるテーマファイルが、publicフォルダにコンパイル・コピーされます。
テーマ編集はsrcファイルで行なってください。

### CSS(SCSS)について
基本動作としてAutoprefixer（CSSのプロパティにベンダープレフィクス付与）を実行してくれます。
メディアクエリ指定は、SCSSのミックスインを使って（@include media）で指定を想定しています。

### JSについて
src/assets/js/main.js はViteによるコンパイルが実行されます。
src/assets/js/plugins/ にあるjsはコンパイルされずpublicの同様のフォルダにコピーが出力されます。

### その他
・初期ビルドのphp.ini設定は500Mに設定しています。
・WordPressヘルプがファイルに入っています。

## ファイル構成
### ページテンプレート
- 汎用ページ(page.php)
- 汎用アーカイブ(archive.php)
- トップページ(front-page.php)
- about (page-about.php)
- news (index.php): 通常投稿
- column(archive-column.php): カスタム投稿
- contact(page-contact.php, page-contact-confirm.php, page-contact-complete.php): yubinbango.js, mwwpform使用想定

### バックエンド
docker-compose.yml … Dockerの設定ファイル

### フロントエンド
#### package.json
プラグインなどのモジュール、コマンドを管理しているファイル

#### vite.config.mjs
ビルドツールであるViteの設定ファイル。SCSS・JSのコンパイル設定、出力先ディレクトリの制御、autoprefixerの設定を管理する。

#### 「eslint.config.mjs、.stylelintrc」
CSSとJavaScriptを監視し、コードの保守性を保つlinterの設定ファイル。
- `eslint.config.mjs`: ESLint v9 Flat Config形式のJavaScript Linter設定
- `.stylelintrc`: 「stylelint-config-recess-order」によってCSSのプロパティを自動で並び替え

linterの詳細、VS CODEでのセットアップについては以下のURLを参照。

https://paper.dropbox.com/doc/VSCode--BR1V0B3B_sNvvn1eLH1I4~XuAQ-Evxym5xKuMDO3xbZyI0bd


## wordmoveの利用方法
wordmoveを利用してリモートサーバーとssh接続し、データの同期が可能です。

### 準備

1. リモートサーバーのssh接続環境を整える(xserverの場合: https://www.xserver.ne.jp/manual/man_server_ssh.php)

2. .envにリモートサーバーの情報を記述。(stagingとproductionの2つ環境を設定できるので適宜。) WORDPRESS_DIRにディレクトリ名を設定している場合、リモートサーバー側も同様にサブディレクトリの設定にする。

3. 秘密鍵をPC内の.sshディレクトリ（~/.ssh/）、またはwordmove/.sshディレクトリに設置。init.shに秘密鍵の名前を記述。（デフォルトではheteml.pemが設定してあります）

### wordmoveコンテナにログイン&セットアップ

1. wordmoveコンテナにログイン（ログインディレクトリ: /home/wordmove）

`$ npm run login:wordmove`

2. ログイン後以下のコマンドを実行。実行するとシェルスクリプトでssh鍵、エンコーディングの設定を行う。

`$ . init.sh`


### ローカルサーバーからリモートサーバーへpush

 movefile.ymlがあるディレクトリ(/home/wordmove)にてwordmoveコマンドを実行。

<div style="color: red;">**注意** コマンド一発でWordPressファイル, DBが同期できてしまうので必ず同期内容を確認してからコマンドを入力してください。</div>
<div style="color: red;">複数人で開発する場合、DBのpushを行うと上書きされるため復元先のデータが削除されてしまいます。また他メンバーとの整合姓がとれなくなる場合があります。基本的にDBはpullのみ、pushを行う場合は必ず他メンバーの確認を取ってから行ってください。</div>


### よく使うwordmoveコマンド

ローカルのthemeファイルを開発サーバー(staging)に同期
```
$ wordmove push --themes -e staging
```

開発サーバー(staging)のDBをローカルに同期

```
$ wordmove pull --db -e staging
```

開発サーバー(staging)の全てをローカルに同期

```
$ wordmove pull --all -e staging
```

コマンド・オプションの詳細に関しては以下を参照

https://github.com/welaika/wordmove/wiki/Usage-and-flags-explained

## SCSSの構成について

src/assets/scss/main.scss は Vite によるコンパイルが実行されます。 src/css/ にある css はコンパイルされず public の同様のフォルダにコピーが出力されます。
src/scss/以下のフォルダは[FLOCSS](https://github.com/hiloki/flocss)の設計をもとに構成されています。

FLOCSS
[https://github.com/hiloki/flocss](https://github.com/hiloki/flocss)

なおページ特有の CSS については/src/scss/page 以下に配置しています。

### ComponentとProjectで迷ったとき
Layout, Object(Component, Project, Utility)どれにするか迷ったときは参考にしてください。正直きっちりした正解はないので、プロジェクト内で整合性がとれていればOK。

こちらがとてもわかりやすい
FLOCSSを使ったCSS設計での悩みどころと解決案[https://qiita.com/uggds/items/d904b2f9a103c37a25fa]

#### Object - Component
BootStrapのComponent[https://getbootstrap.com/docs/5.1/components/accordion/]のように、再利用できる存在。c-button, c-grid, c-input等。marginは使用せず、あくまでパーツとして使う。

#### Object - Project
いくつかのComponentの集合体。.p-container, p-card等。

### その他ルール
#### ファイル名、クラス名なるべくは省略しない
誰が見てもわかるようにファイル名、クラス名なるべくは省略しない
txtやbtnもNG。自分で言葉を作らないこと。
ただし、Utilityはクラス名が長くなりがちなので省略可とし、ファイル名は省略しないことで誰が見てもわかるようにする。

## NotoSansについて
src/fonts 内にサブセット化した Noto Sans が入っています。使用しない場合は削除してください。

## local環境でもメールが送信できるようにする
参考サイト：
https://qiita.com/tegnike/items/44e9f328f082bb0952ad

使用するライブラリ：
mailcatcher

１）docker-compose.yml に下記を追記する

  mailcatcher:
    image: schickling/mailcatcher
    ports:
      - "1080:1080"
      - "1025:1025"

上記を記入して立ち上げると、http://localhost:1080/ のWeb画面上で送信されたメールを確認できるようになります。

２）Wordpressにプラグイン「WP Mail SMTP by WPForms」を導入
下記のように設定する

SMTPホスト：mailcatcher（docker-composeで設定したコンテナ名）
暗号化：なし
SMTPポート：1025（docker-composeで設定した値）
TLS自動化：無効

３）contactform7などのフォームツールを実装、送信確認
