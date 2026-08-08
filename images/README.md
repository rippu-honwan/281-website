# 圖片

檔名就係身份 —— HTML 直接引用呢個資料夾嘅檔名，同一張相可以喺多處出現而唔使複製。
未有嘅檔案會喺網頁上顯示灰框加檔名，擺返張相入去就自動出返，**唔使改 HTML**。

**六個分類全部有真作品，網站已經冇任何灰框 placeholder。**

## 分類 slug 全站統一

`wedding` / `commercial` / `aerial` / `corporate` / `travel` / `portrait`

Services 頁六項齊全；Portfolio 頁六個 filter 全開，共 29 張作品。

## 作品相

### 婚禮 Wedding（求婚拍攝 2023，來源：Facebook）

| 檔名 | 內容 | 比例 | 用喺邊 |
| --- | --- | --- | --- |
| `wedding-01.jpg` | 摩洛哥花磚背景情侶對望 | 3:2 | Services 婚禮、首頁 Featured、首頁服務預覽（預設）、Portfolio |
| `wedding-02.jpg` | 紅玫瑰中嘅鑽石戒指特寫 | 2:1 | Portfolio |
| `wedding-03.jpg` | 求婚拍攝現場，攝影師工作中 | 3:2 | About 合作流程 02、Portfolio |
| `wedding-04.jpg` | 金色鳥籠求婚場景 | 3:2 | Portfolio |

### 商業廣告 Commercial（Student of the Year 2023，來源：Facebook）

| 檔名 | 內容 | 比例 | 用喺邊 |
| --- | --- | --- | --- |
| `commercial-01.jpg` | 芭蕾舞排練 | 3:2 | Services 商業、首頁 Featured、Portfolio |
| `commercial-02.jpg` | 學生戶外討論 | 3:2 | About 合作流程 01、Portfolio |
| `commercial-03.jpg` | 校園團體照 | 3:2 | Portfolio |
| `commercial-04.jpg` | 學生人像 | 3:2 | Portfolio |

### 航拍 Aerial（香港，來源：Google Drive）

| 檔名 | 內容 | 比例 | 用喺邊 |
| --- | --- | --- | --- |
| `aerial-01.jpg` | 啟德體育園日落（火燒雲） | 3:2 | Services 航拍、首頁 About、Portfolio |
| `aerial-02.jpg` | 維港＋啟德日落全景 | 3:2 | **首頁 Hero**、Portfolio |
| `aerial-03.jpg` | 啟德・維港黃昏 | 3:2 | 首頁 Featured、Portfolio |
| `aerial-04.jpg` | 啟德體育園夜景近攝 | 3:2 | Portfolio |
| `aerial-05.jpg` | 維港夜色高空俯瞰 | 3:2 | Portfolio |

### 企業 · 演出紀錄 Corporate（來源：Facebook）

| 檔名 | 內容 | 比例 | 用喺邊 |
| --- | --- | --- | --- |
| `corporate-01.jpg` | 朱亦兵鄭慧大提琴鋼琴之夜謝幕（香港金融大會堂） | 3:2 | Services 企業、首頁 Featured、Portfolio |
| `corporate-02.jpg` | 竹韻小集中樂團舞台全景 | 2:1 | Portfolio |

### 旅遊 Travel

| 檔名 | 內容 | 比例 | 用喺邊 |
| --- | --- | --- | --- |
| `travel-01.jpg` | 西班牙 Segovia 城堡＋熱氣球（航拍，Drive） | 2:3 | About 頁、Portfolio |
| `travel-02.jpg` | 札幌索朗祭紅衣鼓手（FB） | 3:2 | Portfolio |
| `travel-03.jpg` | 札幌索朗祭太鼓（FB） | 3:2 | Portfolio |
| `travel-04.jpg` | 札幌索朗祭群舞（FB） | 3:2 | Portfolio |
| `travel-05.jpg` | 札幌索朗祭紅衣斗笠舞者（FB） | 2:3 | Services 旅遊、首頁 Featured、首頁服務預覽、Portfolio |

### 人像 Portrait

| 檔名 | 內容 | 比例 | 用喺邊 |
| --- | --- | --- | --- |
| `portrait-01.jpg` | 深藍西裝形象照（Drive） | 2:3 | Portfolio |
| `portrait-02.jpg` | 灰西裝眼鏡形象照（Drive） | 2:3 | Portfolio |
| `portrait-03.jpg` | 百葉窗光影人像（Drive） | 2:3 | Portfolio |
| `portrait-04.jpg` | 淺灰西裝形象照（Drive） | 2:3 | Services 人像、首頁服務預覽、Portfolio |
| `portrait-05.jpg` | BB 團體照，有 281 watermark（Drive） | 3:2 | Portfolio |
| `portrait-06.jpg` | 竹韻小集揚琴樂師，紅色場景（FB） | 3:2 | Portfolio |
| `portrait-07.jpg` | 竹韻小集琵琶樂師，中式門框（FB） | 2:3 | 首頁 Featured、About 合作流程 03、Portfolio |
| `portrait-08.jpg` | 竹韻小集笛樂師，竹林（FB） | 3:2 | Portfolio |
| `portrait-09.jpg` | 竹韻小集琵琶樂師，中式椅（FB） | 2:3 | Portfolio |

## Logo（來源：Drive `281Logo` 資料夾）

| 檔名 | 內容 | 用喺邊 |
| --- | --- | --- |
| `logo-lockup-dark.png` | 橫向 lockup，深墨色＋品牌紅 | 內頁 header、全站 footer |
| `logo-lockup-light.png` | 橫向 lockup，白色＋品牌紅 | 首頁 header（浮喺 hero 上） |
| `logo-mark-512.png` | 相機 mark 方形 | favicon |
| `logo-mark-180.png` | 同上細版 | apple-touch-icon |
| `logo-yatjai.png` | 「一製作」書法 | footer 點綴 |

Drive 原檔冇橫向深色版，`logo-lockup-dark.png` 係由白色版轉色生成
（白 → `#1b1917`，品牌紅像素保留）。日後有官方深色版就直接覆蓋同名檔案。

首頁 header 靠 body 嘅 `.nav-solid` class 切換白／深版本，捲過 hero 就轉。

## 來源記錄

- **Google Drive**（2026-08-08）：[281 Production 相片資料夾](https://drive.google.com/drive/folders/1jdmnIQK5Fwf-MLocwaA1omTFQvyMU7mW)
  —— 航拍 5 張、Segovia 1 張、商務人像 5 張、logo 5 個。經 Drive 縮圖端點取 2400px 再用 `sips` 壓縮。
- **Facebook**（2026-08-08）：18 張，原本喺 `images/fb/`，已改名搬入 `images/`。
  貼文 ID、日期、原始尺寸記錄喺 [`fb/_manifest.json`](fb/_manifest.json)。

**棄用**：Drive 人像資料夾嘅 `1425419_582209695185515_237210522_o.jpg` 係 3×3 樣板拼圖，
打咗大 watermark「281PRODUCTION COPYRIGHT © 2013」，唔適合放上網。

## 加新作品

去 [portfolio.html](../portfolio.html) 複製一個 `.card`，改四樣：
`data-cat`（六個 slug 之一）、圖片路徑、`--ar`（橫度 `3/2`、超闊 `2/1`、直度 `2/3`）、標題。
篩選功能自動接手。

## 出圖建議

- 長邊 1440–2400px，JPEG quality 75–80，每張最好 1.5MB 以下。
- `--ar` 一定要跟返相嘅實際比例，唔係就會 crop 到主體唔見。

批次壓縮（macOS 內置 sips，唔使裝嘢）：

```sh
sips -Z 2400 -s format jpeg -s formatOptions 78 *.jpg
```
