# 上線步驟（GoDaddy）

## 一、上傳前要改嘅三樣嘢

### 1. 收通知嘅 email — [`contact.php`](contact.php) 最頂兩行

```php
$TO   = 'hello@281production.com';    // 改成你真正睇嘅信箱
$FROM = 'website@281production.com';  // 必須用自己域名，唔好用 gmail
```

`$FROM` 用 Gmail / Yahoo 之類外部地址會令 SPF 對唔上，信會跌落垃圾箱。
喺 GoDaddy cPanel 開一個 `website@你嘅域名` 就得，唔使真係有人用。

### 2. WhatsApp 號碼 — 出現喺 6 版頁面

一句搞掂（`852` 之後接你 8 位數字）：

```sh
sed -i '' 's/85200000000/85298765432/g' *.html
```

### 3. Contact 頁其餘聯絡資料 — [`contact.html`](contact.html)

搜 `TODO` 逐個換：email 顯示文字、Instagram handle、Studio 地址。
冇 studio 就直接刪走 `<dt>Studio</dt>` 同下面嗰行 `<dd>`。

## 二、上傳

用 cPanel File Manager 或者 FTP，將**除咗以下嘅所有嘢**放入 `public_html/`：

```
唔使上傳：.git/  .github/  .gitignore  DEPLOY.md  images/README.md  scripts/
```

`.htaccess` 記得一齊上傳（File Manager 要開「顯示隱藏檔案」先見到）。

## 三、上線後即刻測一次

1. 開 `你嘅域名/contact.html`，填表 → 撳 Send
2. 應該跳去 `thanks.html`
3. 檢查 `$TO` 個信箱有冇收到「[網站查詢] …」
4. **順手睇下垃圾箱** —— 第一封好有機會入咗去，喺信箱設定「唔係垃圾」就以後正常

收唔到信？睇下 cPanel 有冇 `281-enquiries.csv`（喺 `public_html` 上一層）。
有紀錄但冇收到信 = 寄信有問題；連紀錄都冇 = PHP 冇跑起，確認個檔真係叫 `contact.php`
而且 hosting plan 有 PHP（Website Builder 方案係冇嘅）。

## 四、查詢紀錄

每次提交都會**先寫落 `281-enquiries.csv` 再寄信**，所以就算 email 出問題都唔會丟單。

- 位置：`public_html` 上一層（瀏覽器掂唔到）
- 萬一上一層唔可寫，會 fallback 寫喺 `public_html`，`.htaccess` 會擋住外界讀取
- 用 cPanel File Manager 下載，Excel / Numbers 直接開得（UTF-8）

**呢個檔含客戶姓名電話，唔可以放入 git，亦唔可以放去任何公開位置。**
`.gitignore` 已經擋咗 `*.csv`。

## 五、防 spam

表單有個隱藏欄位 `website`，真人睇唔到、bot 會填 —— 填咗就靜靜擋走，唔會寄信亦唔會入紀錄。
Header injection 亦已經處理（換行字元剷走）。

如果日後 spam 多到煩，再加 Cloudflare Turnstile（免費）。而家唔需要。

## 六、順便清理

`.github/workflows/jekyll-docker.yml` 係死嘅 —— 冇 `_config.yml`、冇 Jekyll 內容、
build 完亦冇 deploy step。而家部署去 GoDaddy，呢個 workflow 完全用唔著，可以刪。
