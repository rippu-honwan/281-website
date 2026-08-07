# 圖片

檔名就係身份 —— HTML 直接引用呢個資料夾嘅檔名，同一張相可以喺多處出現而唔使複製。
未有嘅檔案會喺網頁上顯示灰框加檔名，擺返張相入去就自動出返，**唔使改 HTML**。

## 已上載（2026-08-08 由 Google Drive 取得）

來源：[281 Production 相片資料夾](https://drive.google.com/drive/folders/1jdmnIQK5Fwf-MLocwaA1omTFQvyMU7mW)
全部經 Drive 縮圖端點取 2400px 版本，再用 `sips` 壓縮。

| 檔名 | 內容 | 用喺邊 |
|---|---|---|
| `aerial-01.jpg` | 啟德體育園日落（火燒雲） | 首頁 About、Services 航拍、Portfolio |
| `aerial-02.jpg` | 維港＋啟德日落全景 | **首頁 Hero**、Portfolio |
| `aerial-03.jpg` | 啟德・維港黃昏 | 首頁 Featured、Portfolio |
| `aerial-04.jpg` | 啟德體育園夜景近攝 | 首頁 Featured、Portfolio |
| `aerial-05.jpg` | 維港夜色高空俯瞰 | 首頁 Featured、Portfolio |
| `travel-01.jpg` | 西班牙 Segovia 城堡＋熱氣球 | 首頁 Featured、About 頁、Services 旅遊、Portfolio |
| `portrait-01.jpg` | 深藍西裝形象照 | 首頁 Featured、Portfolio |
| `portrait-02.jpg` | 灰西裝眼鏡形象照 | Portfolio |
| `portrait-03.jpg` | 百葉窗光影人像 | 首頁 Featured、Portfolio |
| `portrait-04.jpg` | 淺灰西裝形象照 | Services 人像、Portfolio |
| `portrait-05.jpg` | BB 團體照（有 281 watermark） | Portfolio |

**冇用嘅一張**：Drive 人像資料夾入面嘅 `1425419_582209695185515_237210522_o.jpg`
係 3×3 樣板拼圖，仲打咗大 watermark「281PRODUCTION COPYRIGHT © 2013」，唔適合放上網。

## Logo（來源：Drive `281Logo` 資料夾）

| 檔名 | 內容 | 用喺邊 |
|---|---|---|
| `logo-lockup-dark.png` | 橫向 lockup，深墨色＋品牌紅 | 內頁 header、全站 footer |
| `logo-lockup-light.png` | 橫向 lockup，白色＋品牌紅 | 首頁 header（浮喺 hero 上） |
| `logo-mark-512.png` | 相機 mark 方形 | favicon |
| `logo-mark-180.png` | 同上細版 | apple-touch-icon |
| `logo-yatjai.png` | 「一製作」書法 | footer 點綴 |

Drive 原檔冇橫向深色版，`logo-lockup-dark.png` 係由白色版轉色生成
（白 → `#1b1917`，品牌紅像素保留）。日後有官方深色版就直接覆蓋同名檔案。

首頁 header 靠 body 嘅 `.nav-solid` class 切換白／深版本，捲過 hero 就轉。

## 重要：分類 slug 全站統一

`wedding` / `commercial` / `aerial` / `corporate` / `travel` / `portrait`

Services 頁六項齊全；Portfolio 頁而家只開咗有相嘅三個（aerial / portrait / travel）。

## 仲未有相，需要補

```
images/
├── wedding-01.jpg      婚禮 —— 首頁服務預覽、Services 頁（直度 4:5）
├── commercial-01.jpg   商業廣告 —— 同上
├── corporate-01.jpg    企業/海外會議 —— 同上
├── process-01.jpg      合作流程 01：查詢傾偈（About 頁，直度 4:5）
├── process-02.jpg      合作流程 02：拍攝當日
└── process-03.jpg      合作流程 03：剪接交片
```

補齊之後，Portfolio 頁再加返對應嘅 filter 掣同 `.card`（HTML 入面有註解教點加）。

## 出圖建議

- 長邊 2000–2400px，JPEG quality 75–80，每張最好 1.5MB 以下。
- 直度相用 3:4 或 4:5；橫度相用 3:2。`.card` / `.work-item` 嘅 `--ar` 要跟住改。

批次壓縮（macOS 內置 sips，唔使裝嘢）：

```sh
sips -Z 2400 -s format jpeg -s formatOptions 78 *.jpg
```
