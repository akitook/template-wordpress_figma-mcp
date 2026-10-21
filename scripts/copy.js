// PHP・画像・フォント等の静的ファイルをテーマディレクトリへコピー
// cpx2 (cpx のメンテナンス継続フォーク) を使用
require('dotenv').config()
const cpx = require('cpx2')

const isWatch = process.argv.includes('--watch')
const isProduction = process.argv.includes('--production')

const themeName = process.env.THEME_NAME
const wordpressDir = process.env.WORDPRESS_DIR

let outputPath = `public/wp-content/themes/${themeName}`
if (wordpressDir) {
  outputPath = `public/${wordpressDir}/wp-content/themes/${themeName}`
}
if (isProduction) {
  outputPath = 'dist'
}

const source =
  'src/**/*.{html,php,css,json,png,jpg,gif,svg,ico,woff,woff2,eot,ttf,txt,md,pdf,webm,mp4}'

if (isWatch) {
  cpx.watch(source, outputPath)
} else {
  cpx.copy(source, outputPath, (err) => {
    if (err) console.error(err)
  })
}
