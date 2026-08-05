# 圖片放呢度

網頁全部 `<img>` 都指向呢個資料夾。未有圖之前，位置會顯示灰色框加檔名，
放咗正確檔名嘅圖入去就自動出返。**唔使改 HTML**，只要檔名夾得返。

## 分類 slug（全站統一，改嘅話三個地方要一齊改）

| slug | 中文 | 出現喺 |
|---|---|---|
| `wedding` | 婚禮攝錄 | services.html / portfolio.html / index.html |
| `commercial` | 商業廣告 | 同上 |
| `aerial` | 航拍 | 同上 |
| `corporate` | 企業 · 海外業務會議 | 同上 |
| `travel` | 旅遊宣傳 | 同上 |
| `portrait` | 人像 | 同上 |

## 需要嘅檔案

```
images/
├── hero.jpg              橫向，最少 2400px 闊（首頁大圖，唔 lazy load，壓細啲）
├── about.jpg             直度 3:4（首頁 About）
├── about-team.jpg        直度 3:4（About 頁人物相）
├── process-01.jpg        直度 4:5（合作流程 01-03）
├── process-02.jpg
├── process-03.jpg
├── work-01.jpg … work-06.jpg    直度 3:4（首頁 Featured Work，六個分類各一張）
│
├── services/             直度 3:4 —— 服務頁同首頁服務卡共用
│   ├── wedding.jpg
│   ├── commercial.jpg
│   ├── aerial.jpg
│   ├── corporate.jpg
│   ├── travel.jpg
│   └── portrait.jpg
│
└── portfolio/            直度 3:4 —— 作品集
    ├── wedding-01.jpg … wedding-03.jpg
    ├── commercial-01.jpg … commercial-03.jpg
    ├── aerial-01.jpg, aerial-02.jpg
    ├── corporate-01.jpg … corporate-03.jpg
    ├── travel-01.jpg, travel-02.jpg
    └── portrait-01.jpg, portrait-02.jpg
```

## 加多啲作品

去 [portfolio.html](../portfolio.html) 複製一個 `.card`，改三樣嘢：
`data-cat`（必須係上面六個 slug 之一）、圖片路徑、標題。篩選功能自動接手。

## 出圖建議

- 長邊 2000–2400px，JPEG quality 80，每張最好 300KB 以下。
- 航拍片同宣傳片可以擺 YouTube / Vimeo，用 `<iframe>` 嵌入；純相集唔使。

批次壓縮（有 ImageMagick 嘅話）：

```sh
magick mogrify -resize 2400x2400\> -quality 80 *.jpg
```
