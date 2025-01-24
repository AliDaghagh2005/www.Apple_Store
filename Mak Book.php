<?php
session_start();

// بررسی سبد خرید در صورت عدم وجود
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// افزودن محصول به سبد خرید
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'], $_POST['price'])) {
    $product = htmlspecialchars($_POST['product']);
    $price = floatval($_POST['price']);
    $_SESSION['cart'][] = ['product' => $product, 'price' => $price];
}

// حذف محصول از سبد خرید
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $index = intval($_GET['remove']);
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // تنظیم مجدد ایندکس‌ها
    }
}

// محاسبه مجموع قیمت سبد خرید
$totalPrice = array_reduce($_SESSION['cart'], function ($carry, $item) {
    return $carry + $item['price'];
}, 0);
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه MacBook - فروشگاه اپل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .product-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .product-card .card-body {
            padding: 15px;
            text-align: center;
        }
        .product-card .btn {
            margin: 5px;
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
                <li class="nav-item"><a class="nav-link" href="MacBook.php">MacBook</a></li>
                <li class="nav-item"><a class="nav-link" href="iPad.php">iPad</a></li>
                <li class="nav-item"><a class="nav-link" href="iPhone.php">iPhone</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- اسلایدر -->
<div id="macbookSlider" class="carousel slide mt-5 pt-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/mak book/209761342022291882075320316792855224862251.jpg" class="d-block w-100" alt="MacBook Pro">
        </div>
        <div class="carousel-item">
            <img src="img/mak book/cover-768x432.jpg" class="d-block w-100" alt="MacBook Air">
        </div>
        <div class="carousel-item">
            <img src="img/mak book/GVNHVh3E6FPR.jpg" class="d-block w-100" alt="MacBook M2">
        </div>
    </div>
    <a class="carousel-control-prev" href="#macbookSlider" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#macbookSlider" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<!-- بخش محصولات -->
<div class="container my-5">
    <div class="row">
        <?php
        $products = [
            ['name' => 'MacBook Pro', 'price' => 45000000, 'img' => 'img/mak book/راهنمای-خرید-مک-بوک.jpg'],
            ['name' => 'MacBook Air', 'price' => 35000000, 'img' => 'img/mak book/مک-بوک-پرو-16-اینچی،-بهترین-در-ویرایش-عکس.webp'],
            ['name' => 'MacBook M2', 'price' => 50000000, 'img' => 'img/mak book/DSCF4297.0.jpg']
        ];
        foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="<?= $product['img'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text">قیمت: <?= number_format($product['price']) ?> تومان</p>
                        <form action="" method="POST">
                            <input type="hidden" name="product" value="<?= $product['name'] ?>">
                            <input type="hidden" name="price" value="<?= $product['price'] ?>">
                            <button type="submit" class="btn btn-success">اضافه کردن به سبد خرید</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
                    <a href="MacBook.php?remove=<?= $index ?>" class="btn btn-danger btn-sm"></a>
                </li>
            <?php endforeach; ?>
            <p>مجموع: <?= number_format($totalPrice) ?> تومان</p>
            <a href="checkout.php" class="btn btn-primary">ادامه پرداخت</a>
        <?php else: ?>
            <p>سبد خرید شما خالی است.</p>
        <?php endif; ?>
    </ul>
</div>

<!-- فوتر -->
<footer class="bg-dark text-white text-center py-3">
    <p>© 2024 فروشگاه اپل. تمامی حقوق محفوظ است.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
