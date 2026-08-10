<?php
// 281 Production — 查詢表單處理
// 放喺 GoDaddy shared hosting（cPanel / Apache / PHP 8）就用得，唔使裝任何嘢。

// ══════════════════════════════════════════════════════════
//  設定：只需要改呢兩行
// ══════════════════════════════════════════════════════════
$TO   = 'hello@281production.com';    // 收通知嘅信箱
$FROM = 'website@281production.com';  // 寄件人。必須用你自己域名嘅地址，
                                      // 唔好用 gmail —— 用外部地址做 From
                                      // 會 SPF 對唔上，直接跌落垃圾箱。
// ══════════════════════════════════════════════════════════

date_default_timezone_set('Asia/Hong_Kong');

// 直接開個 URL 冇 POST 嘢，掉返 contact 頁
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: contact.html');
    exit;
}

// Honeypot：表單有個隱藏欄位叫 website，真人唔會見到亦唔會填。
// 有填 = bot。靜靜當成功，唔好話俾佢知被擋。
if (trim((string)($_POST['website'] ?? '')) !== '') {
    header('Location: thanks.html');
    exit;
}

$get = fn(string $k): string => trim((string)($_POST[$k] ?? ''));

$name    = $get('name');
$email   = $get('email');
$phone   = $get('phone');
$service = $get('service');
$date    = $get('date');
$message = $get('message');

// 必填檢查
if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contact.html?error=invalid');
    exit;
}

// 防 email header injection：任何會出現喺 header 嘅值，換行一律剷走
$noBreaks = fn(string $s): string => str_replace(["\r", "\n"], ' ', $s);
$name  = $noBreaks($name);
$email = $noBreaks($email);

// ponytail: 先寫落 CSV 再寄信 —— 就算信入咗垃圾箱或者 mail() 失敗，
// 查詢都唔會丟。要換做寫入資料庫嘅話再算，而家一個 CSV 已經夠。
// 寫喺 public_html 上一層，咁條 CSV 唔會俾人由瀏覽器直接打開。
$logDir  = is_writable(dirname(__DIR__)) ? dirname(__DIR__) : __DIR__;
$logFile = $logDir . '/281-enquiries.csv';
if ($fh = @fopen($logFile, 'a')) {
    if (@filesize($logFile) === 0) {
        @fputcsv($fh, ['時間', '稱呼', 'Email', '電話', '服務', '日期', '內容', 'IP']);
    }
    @fputcsv($fh, [
        date('Y-m-d H:i:s'), $name, $email, $phone, $service, $date, $message,
        $_SERVER['REMOTE_ADDR'] ?? '?',
    ]);
    @fclose($fh);
}

$body = "281 Production 網站收到新查詢\n"
      . str_repeat('─', 34) . "\n\n"
      . "稱呼　：{$name}\n"
      . "Email ：{$email}\n"
      . '電話　：' . ($phone   !== '' ? $phone   : '—') . "\n"
      . '服務　：' . ($service !== '' ? $service : '—') . "\n"
      . '日期　：' . ($date    !== '' ? $date    : '—') . "\n\n"
      . "場地 / 想講嘅嘢：\n"
      . ($message !== '' ? $message : '—') . "\n\n"
      . str_repeat('─', 34) . "\n"
      . '送出時間：' . date('Y-m-d H:i') . " (HKT)\n"
      . '來源 IP　：' . ($_SERVER['REMOTE_ADDR'] ?? '?') . "\n\n"
      . "直接撳「回覆」就會覆到客戶個 email。\n";

$subject = '[網站查詢] ' . $name . ' — ' . ($service !== '' ? $service : '未指定服務');
if (function_exists('mb_encode_mimeheader')) {
    // 中文 subject 要 MIME 編碼，唔係啲信箱會顯示成亂碼
    $subject = mb_encode_mimeheader($subject, 'UTF-8', 'B');
}

$headers = implode("\r\n", [
    "From: 281 Production <{$FROM}>",
    "Reply-To: {$name} <{$email}>",   // 撳回覆 = 直接覆客戶
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: 281-website',
]);

$sent = @mail($TO, $subject, $body, $headers, '-f' . $FROM);

header('Location: ' . ($sent ? 'thanks.html' : 'contact.html?error=send'));
