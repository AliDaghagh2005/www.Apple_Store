<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>درباره ما - فروشگاه اپل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* استایل نوار منو */
        .navbar {
            background-color: #343a40;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ddd !important;
        }

        /* پس‌زمینه برای بخش درباره ما */
        .about-section {
            background-image: url('img/Home/پس زمنه اپلل.webp'); /* آدرس تصویر پس‌زمینه */
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: #fff;
            text-align: center;
        }

        /* استفاده از container برای ساختار مرتب */
        .about-section .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* عنوان بخش درباره ما */
        .about-section h1 {
            font-size: 3rem;
            font-weight: bold;
            transition: transform 0.3s ease;
            cursor: pointer;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* پس‌زمینه رنگی و نیمه‌شفاف */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .about-section h1:hover {
            transform: scale(1.2); /* بزرگ شدن در هاور */
        }

        /* پاراگراف‌ها با فاصله و پس‌زمینه */
        .about-section p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-top: 20px;
            transition: transform 0.3s ease;
            cursor: pointer;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.5); /* پس‌زمینه رنگی و نیمه‌شفاف */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .about-section p:hover {
            transform: scale(1.1); /* بزرگ شدن در هاور */
        }

        /* استایل دکمه‌ها */
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* استایل فوتر */
        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 15px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* واکنش‌گرایی برای موبایل‌ها */
        @media (max-width: 768px) {
            .about-section h1 {
                font-size: 2rem;
            }

            .about-section p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- نوار منو -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Apple Store</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Frequently asked questions.php">Questions</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="features.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="MakBook.php">MakBook</a></li>
                <li class="nav-item"><a class="nav-link" href="iPad.php">iPad</a></li>
                <li class="nav-item"><a class="nav-link" href="iPhone.php">iPhone</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- بخش درباره ما -->
<div class="about-section">
    <div class="container">
        <h1>درباره فروشگاه اپل</h1>
        <p>فروشگاه اپل یک برند معتبر و پیشرو در ارائه محصولات با کیفیت بالا از جمله MacBook، iPhone، iPad و سایر محصولات فناوری است. ما در اینجا تمام تلاش خود را می‌کنیم تا محصولات اپل را با بهترین قیمت و خدمات به مشتریان عزیز ارائه دهیم.</p>
        <p>با ما تجربه خرید آنلاین راحت و لذت‌بخش را داشته باشید. تیم ما در فروشگاه اپل همیشه آماده است تا به شما کمک کند و نیازهای شما را برآورده سازد.</p>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>

<!-- فوتر -->
<footer>
    <p>© 2024 فروشگاه اپل. تمامی حقوق محفوظ است.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
