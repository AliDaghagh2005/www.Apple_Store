<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه موبایل اپل</title>
    <!-- لینک بوت‌استرپ نسخه 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- لینک فایل CSS سفارشی -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* استایل برای بخش بنر اصلی با تصویر پس‌زمینه لوگوی اپل */
        #home {
            background-image: url('img/Home/photo_2024-11-30_12-37-05.jpg'); /* جایگزین با مسیر فایل لوگوی اپل */
            background-size: cover; /* اندازه تصویر به کل بخش */
            background-repeat: no-repeat; /* از تکرار تصویر جلوگیری می‌کند */
            background-position: center; /* تصویر را در وسط قرار می‌دهد */
            height: 100vh; /* ارتفاع بخش به اندازه کل صفحه */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>

    <!-- نوار منو -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#home">Apple Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Frequently asked questions.php" target="_blank">Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Apple wach.php" target="_blank">Apple Watch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Mak Book.php" target="_blank">Mak Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="iPad.php">iPad</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="iPhone.php" target="_blank">iPhone</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- اسکریپت‌های بوت‌استرپ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- بخش بنر اصلی -->
<header id="home" class="jumbotron jumbotron-fluid text-center">
    <div class="container">
    </div>
</header>

<!-- فوتر -->
<footer class="bg-dark text-white text-center py-3">
    <p>© 2024 فروشگاه اپل. تمامی حقوق محفوظ است.</p>
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>