#!/bin/bash
# 由自己公司 Facebook 專頁下載已上載嘅相／片到 images/fb/
# 用法: FB_PAGE_ID=xxx FB_TOKEN=xxx ./scripts/fetch-fb-media.sh [photos|videos]
set -euo pipefail

: "${FB_PAGE_ID:?請設定 FB_PAGE_ID}"
: "${FB_TOKEN:?請設定 FB_TOKEN (Page Access Token)}"

KIND="${1:-photos}"
API="${FB_API_VERSION:-v21.0}"
OUT="$(cd "$(dirname "$0")/.." && pwd)/images/fb"
mkdir -p "$OUT"

if [ "$KIND" = "videos" ]; then
  url="https://graph.facebook.com/$API/$FB_PAGE_ID/videos?fields=source,created_time&limit=50&access_token=$FB_TOKEN"
  pick='.data[] | select(.source) | "\(.created_time[0:10])-\(.id)\t\(.source)"'
  ext=mp4
else
  # images[0] = 最大尺寸
  url="https://graph.facebook.com/$API/$FB_PAGE_ID/photos?type=uploaded&fields=images,created_time&limit=100&access_token=$FB_TOKEN"
  pick='.data[] | "\(.created_time[0:10])-\(.id)\t\(.images[0].source)"'
  ext=jpg
fi

while [ -n "$url" ]; do
  json=$(curl -sS "$url")
  if echo "$json" | jq -e 'has("error")' >/dev/null; then
    echo "$json" | jq '.error' >&2
    exit 1
  fi
  echo "$json" | jq -r "$pick" | while IFS=$'\t' read -r name src; do
    f="$OUT/$name.$ext"
    if [ -f "$f" ]; then
      echo "skip $name.$ext"
    else
      curl -sSL -o "$f" "$src" && echo "✓ $name.$ext"
    fi
  done
  url=$(echo "$json" | jq -r '.paging.next // ""')
done

echo "完成 → $OUT"
