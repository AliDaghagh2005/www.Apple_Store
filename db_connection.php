<?php
$servername = "localhost"; // یا نام سرور دیتابیس شما
$username = "root"; // نام کاربری دیتابیس
$password = ""; // رمز عبور دیتابیس (در صورت وجود)
$dbname = "apple_store"; // نام دیتابیس شما

// اتصال به دیتابیس
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تنظیم رفتار خطا
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "اتصال موفقیت‌آمیز بود";
} catch (PDOException $e) {
    echo "اتصال به دیتابیس انجام نشد: " . $e->getMessage();
}
?>

