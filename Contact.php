<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تماس با ما - فروشگاه اپل</title>
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

        /* بخش تماس با ما */
        .contact-section {
            background-color: #f8f9fa;
            padding: 50px 0;
            color: #333;
        }

        /* فرم تماس */
        .contact-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .contact-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

        /* نقشه گوگل */
        .google-map {
            margin-top: 50px;
            height: 400px;
            border: 0;
            width: 100%;
        }

        /* اطلاعات تماس شرکت */
        .company-info {
            background-color: #fff;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .company-info i {
            font-size: 24px;
            margin: 10px;
            color: #007bff;
        }

        .company-info a {
            color: #007bff;
            text-decoration: none;
        }

        /* واکنش‌گرایی */
        @media (max-width: 768px) {
            .contact-form {
                padding: 20px;
            }

            .google-map {
                height: 300px;
            }

            .company-info {
                margin-top: 30px;
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

<!-- بخش تماس با ما -->
<div class="contact-section">
    <div class="container">
        <h1 class="text-center">تماس با ما</h1>
        
        <!-- فرم تماس -->
        <div class="contact-form">
            <h3>لطفاً اطلاعات خود را وارد کنید:</h3>
            <form id="contactForm" action="submit_contact.php" method="POST" onsubmit="return validateForm()">
                <input type="text" name="name" id="name" placeholder="نام شما" required>
                <input type="email" name="email" id="email" placeholder="ایمیل شما" required>
                <textarea name="message" id="message" placeholder="پیام شما" rows="5" required></textarea>
                <button type="submit">ارسال پیام</button>
            </form>
            <p id="confirmationMessage" style="display:none; color: green; text-align: center;">اطلاعات شما ثبت شد.</p>
        </div>

        <!-- نقشه گوگل -->
        <h3 class="text-center mt-5">موقعیت مکانی ما</h3>
        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12675.69922401388!2d51.3890!3d35.6892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f9f9c7c8706b0af%3A0x3f9c3c61e0c8da42!2sTehran!5e0!3m2!1sen!2s!4v1599195862055!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<!-- اطلاعات تماس شرکت -->
<div class="company-info">
    <h3>اطلاعات تماس</h3>
    <p>تلفن: <a href="tel:+98214567890">+98 21 4567 890</a></p>
    <p>ایمیل: <a href="mailto:info@applestore.com">info@applestore.com</a></p>
    <p>آدرس: تهران، خیابان ولی‌عصر، فروشگاه اپل</p>
    <div>
        <a href="https://www.instagram.com/applestore" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com/applestore" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/applestore" target="_blank"><i class="fab fa-facebook"></i></a>
    </div>
</div>

<!-- فوتر -->
<footer>
    <p>© 2024 فروشگاه اپل. تمامی حقوق محفوظ است.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- آیکون‌ها -->
<script>
    function validateForm() {
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var message = document.getElementById("message").value;
        var confirmationMessage = document.getElementById("confirmationMessage");

        // بررسی فارسی بودن نام
        if (/[\u0600-\u06FF]/.test(name)) {
            alert("لطفاً زبان خود را تغییر دهید (نام باید به زبان لاتین باشد).");
            return false;
        }

        // بررسی فارسی بودن ایمیل
        if (/[\u0600-\u06FF]/.test(email)) {
            alert("لطفاً زبان خود را تغییر دهید (ایمیل باید به زبان لاتین باشد).");
            return false;
        }

        // وقتی فرم ارسال می‌شود
        confirmationMessage.style.display = 'block';
        return false;  // جلوگیری از ارسال واقعی فرم برای آزمایش
    }
</script>
</body>
</html>
