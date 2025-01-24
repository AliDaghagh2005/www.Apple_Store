<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $_SESSION['cart'][] = ['product' => $product, 'price' => $price];
}

if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    $removedProductPrice = $_SESSION['cart'][$index]['price'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

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
    <title>سبد خرید</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/cart.css">
    <style>
        /* استایل برای نوار منو */
        nav.navbar {
            background-color: #343a40;
        }
        nav.navbar .navbar-brand {
            color: #fff;
        }
        nav.navbar .navbar-nav .nav-link {
            color: #fff;
        }
        /* استایل سبد خرید */
        .cart-items ul {
            list-style-type: none;
            padding: 0;
        }
        .cart-items li {
            padding: 15px;
            background-color: #f8f9fa;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s ease-in-out;
        }
        .cart-items li:hover {
            transform: scale(1.05);
        }
        .cart-items li .remove-btn {
            position: absolute;
            top: 5px;
            left: 5px;
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .cart-items p {
            color: #dc3545;
        }
        .cart-items button {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .cart-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .cart-container h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .total-price {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 20px;
        }
        .cart-container .total-price {
            color: #007bff;
        }
        .search-container input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 10px 0;
        }
        .product-popup {
            display: none;
            position: absolute;
            top: 40px;
            left: 0;
            right: 0;
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            max-height: 300px;
            overflow-y: scroll;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .product-popup ul {
            list-style-type: none;
            padding: 0;
        }
        .product-popup li {
            margin: 5px 0;
        }
        .product-popup li a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        .product-popup li a:hover {
            color: #0056b3;
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
                <li class="nav-item"><a class="nav-link" href="Mak Book.php" target="_blank">Mak Book</a></li>
                <li class="nav-item"><a class="nav-link" href="iPad.php">iPad</a></li>
                <li class="nav-item"><a class="nav-link" href="iPhone.php">iPhone</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="cart-container">
        <h1>سبد خرید شما</h1>

        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchProduct()" placeholder="جستجو کنید..." />
        </div>

        <!-- پنجره پاپ‌آپ محصولات -->
        <div class="product-popup" id="appleWatchPopup">
            <h3>مدل‌های اپل واچ</h3>
            <ul>
                <li><a href="#">Apple Watch Series 7</a></li>
                <li><a href="#">Apple Watch SE</a></li>
                <li><a href="#">Apple Watch Ultra</a></li>
                <li><a href="#">Apple Watch Series 6</a></li>
            </ul>
        </div>

        <!-- اقلام سبد خرید -->
        <div class="cart-items">
            <h2>اقلام موجود در سبد خرید</h2>
            <?php if (!empty($_SESSION['cart'])): ?>
                <ul>
                    <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                        <li>
                            <?= htmlspecialchars($item['product']) ?> - قیمت: <?= number_format($item['price']) ?> تومان
                            <a href="cart.php?remove=<?= $index ?>" class="remove-btn">حذف</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="total-price">مجموع: <?= number_format($totalPrice) ?> تومان</p>
                <a href="checkout.php" class="btn btn-primary">ادامه پرداخت</a>
            <?php else: ?>
                <p>سبد خرید شما خالی است.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Apple Store. تمامی حقوق محفوظ است.</p>
    </footer>

    <script>
        function searchProduct() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toUpperCase();
            var popup = document.getElementById('appleWatchPopup');
            var items = popup.getElementsByTagName('li');

            for (var i = 0; i < items.length; i++) {
                var a = items[i].getElementsByTagName('a')[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        }
    </script>

</body>
</html>

