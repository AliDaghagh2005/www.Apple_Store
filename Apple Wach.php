<?php
session_start();

// بررسی اینکه آیا سبد خرید وجود دارد یا خیر
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// افزودن محصول به سبد خرید
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $_SESSION['cart'][] = ['product' => $product, 'price' => $price];
}

// حذف محصول از سبد خرید
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // تنظیم مجدد ایندکس‌ها
}

// محاسبه مجموع قیمت سبد خرید
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'];
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه Apple Watch - فروشگاه اپل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .product-card { border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 30px; }
        .product-card img { width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px; }
        .product-card .card-body { padding: 15px; text-align: center; }
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
                <li class="nav-item"><a class="nav-link" href="Mak Book.php" target="_blank">Mak Book</a></li>
                <li class="nav-item"><a class="nav-link" href="iPad.php">iPad</a></li>
                <li class="nav-item"><a class="nav-link" href="iPhone.php">iPhone</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- اسلایدر -->
<div id="appleWatchSlider" class="carousel slide mt-5 pt-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/Apple.Wache/88.webp" class="d-block w-100" alt="Apple Watch Series 8">
        </div>
        <div class="carousel-item">
            <img src="img/Apple.Wache/.....jpg" class="d-block w-100" alt="Apple Watch Ultra">
        </div>
        <div class="carousel-item">
            <img src="img/Apple.Wache/9.webp" class="d-block w-100" alt="Apple Watch SE">
        </div>
    </div>
    <a class="carousel-control-prev" href="#appleWatchSlider" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#appleWatchSlider" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<!-- بخش محصولات -->
<div class="container my-5">
    <div class="row">
        <!-- کارت محصول 1 -->
        <div class="col-md-4">
            <div class="card product-card">
                <img src="img/Apple.Wache/سری 8.webp" class="card-img-top" alt="Apple Watch Series 8">
                <div class="card-body">
                    <h5 class="card-title">Apple Watch Series 8</h5>
                    <p class="card-text">سری 8 با طراحی جدید و ویژگی‌های پیشرفته.</p>
                    <form action="Apple Wach.php" method="POST">
                        <input type="hidden" name="product" value="Apple Watch Series 8">
                        <input type="hidden" name="price" value="12000000">
                        <button type="submit" class="btn btn-success">اضافه کردن به سبد خرید</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- کارت محصول 2 -->
        <div class="col-md-4">
            <div class="card product-card">
                <img src="img/Apple.Wache/اپل واچ سسری 1 الترا.png" class="card-img-top" alt="Apple Watch Ultra">
                <div class="card-body">
                    <h5 class="card-title">Apple Watch Ultra</h5>
                    <p class="card-text">Apple Watch Ultra با ویژگی‌های مقاومتی برای ورزشکاران حرفه‌ای.</p>
                    <form action="Apple Wach.php" method="POST">
                        <input type="hidden" name="product" value="Apple Watch Ultra">
                        <input type="hidden" name="price" value="15000000">
                        <button type="submit" class="btn btn-success">اضافه کردن به سبد خرید</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- کارت محصول 3 -->
        <div class="col-md-4">
            <div class="card product-card">
                <img src="img/Apple.Wache/s.se.jpg" class="card-img-top" alt="Apple Watch SE">
                <div class="card-body">
                    <h5 class="card-title">Apple Watch SE</h5>
                    <p class="card-text">Apple Watch SE با ویژگی‌های عالی و قیمت مناسب.</p>
                    <form action="Apple Wach.php" method="POST">
                        <input type="hidden" name="product" value="Apple Watch SE">
                        <input type="hidden" name="price" value="8000000">
                        <button type="submit" class="btn btn-success">اضافه کردن به سبد خرید</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- نمایش سبد خرید -->
<div class="container my-5">
    <h2>سبد خرید شما</h2>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                <li>
                    <?= htmlspecialchars($item['product']) ?> - قیمت: <?= number_format($item['price']) ?> تومان
                    <a href="cart.php?remove=<?= $index ?>" class="btn btn-danger btn-sm">حذف</a>
                </li>
            <?php endforeach; ?>
            <p>مجموع: <?= number_format($totalPrice) ?> تومان</p>
            <a href="checkout.php" class="btn btn-primary">ادامه پرداخت</a>
        <?php else: ?>
            <p>سبد خرید شما خالی است.</p>
        <?php endif; ?>
    </ul>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2024 فروشگاه اپل. تمامی حقوق محفوظ است.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
