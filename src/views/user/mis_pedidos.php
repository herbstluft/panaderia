<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");

$db = new Database;

session_start();
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Mis pedidos</title>
    <!-- Favicons -->
    <link rel="icon" href="../../../assets/svg/shopping-cart.svg" type="image/x-icon">
    <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/mis-pedidos.css">
</head>

<body class="vh-100">
    <?php include('../../../templates/navbar.php'); ?>

    <section class="p-0 h-75">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-sm-6 col-md-6 col-lg-3 align-self-center">
                    <div class="food-card">
                        <div class="food-card_img">
                            <img src="../../../assets/img/hero-bg.jpg" alt="">
                        </div>
                        <div class="food-card_content">
                            <div class="food-card_title-section">
                                <a href="#!" class="food-card_author text-success fw-bold">Burger</a>
                                <a href="#!" class="food-card_title">Double Cheese Potato Burger</a>
                            </div>
                            <div class="food-card_bottom-section">
                                <div class="space-between">
                                    <div>
                                        <span class="fa fa-fire"></span> 220 - 280 Kcal
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('../../../templates/footer.php'); ?>

</body>

</html>