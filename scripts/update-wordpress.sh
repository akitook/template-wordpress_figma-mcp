#!/bin/sh
# npm start 時に、WordPress本体を .env の WORDPRESS_CORE_VERSION に揃える（WP-CLIコンテナで実行）
# 未指定の場合は何もしない。失敗しても npm start は止めない
docker compose run --rm -T wpcli sh -c '
  if [ -z "$WORDPRESS_CORE_VERSION" ]; then
    echo "[update-wordpress] WORDPRESS_CORE_VERSION が未指定のためスキップしました"
    exit 0
  fi

  # WordPressコンテナが本体とwp-config.phpを配置し終えるまで待つ
  i=0
  while [ ! -f wp-config.php ] && [ $i -lt 60 ]; do sleep 1; i=$((i + 1)); done

  current=$(wp core version 2>/dev/null)
  if [ "$current" = "$WORDPRESS_CORE_VERSION" ]; then
    echo "[update-wordpress] WordPress $current"
    exit 0
  fi

  if wp core is-installed 2>/dev/null; then
    # --force は指定バージョンが現在より古い場合（ダウングレード）にも必要。DBはダウングレードされないので注意
    wp core update --version="$WORDPRESS_CORE_VERSION" --locale=ja --force --quiet && wp core update-db --quiet
  else
    # インストール前はファイルだけ指定バージョンに置き換える
    wp core download --version="$WORDPRESS_CORE_VERSION" --locale=ja --force --skip-content --quiet
  fi
  echo "[update-wordpress] WordPress $current → $(wp core version)"
' || echo "[update-wordpress] WordPressのバージョン合わせをスキップしました"
