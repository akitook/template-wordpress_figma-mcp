import { defineConfig, loadEnv } from "vite";
import autoprefixer from "autoprefixer";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), "");
  const themeName = env.THEME_NAME;
  const wordpressDir = env.WORDPRESS_DIR;

  let outputPath = `public/wp-content/themes/${themeName}`;
  if (wordpressDir) {
    outputPath = `public/${wordpressDir}/wp-content/themes/${themeName}`;
  }
  if (mode === "production") {
    outputPath = "dist";
  }

  return {
    // Vite デフォルトの public/ コピーを無効化（出力先が public/ 配下のため）
    publicDir: false,
    build: {
      outDir: path.resolve(__dirname, outputPath),
      emptyOutDir: false,
      minify: mode === "production",
      rollupOptions: {
        // WordPress が提供する jQuery をグローバルとして使用
        external: ["jquery"],
        input: path.resolve(__dirname, "src/assets/js/main.js"),
        output: {
          format: "iife",
          // WordPress は noConflict のためグローバルは jQuery。ID が解決パスになる場合も拾う
          globals(id) {
            if (id === "jquery" || /[/\\]jquery[/\\]/.test(id)) {
              return "jQuery";
            }
            return id;
          },
          entryFileNames: "assets/js/[name].js",
          chunkFileNames: "assets/js/[name].js",
          assetFileNames: (assetInfo) => {
            if (assetInfo.name?.endsWith(".css")) {
              return "assets/css/[name][extname]";
            }
            return "assets/[name][extname]";
          },
        },
      },
    },
    css: {
      postcss: {
        plugins: [autoprefixer()],
      },
    },
  };
});
