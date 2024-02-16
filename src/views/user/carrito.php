<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");

$db = new Database;

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carrito de compras</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../../../assets/svg/shopping-cart.svg" type="image/x-icon">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
</head>

<body>

    <?php include('../../../templates/navbar.php'); ?>

    <main class="container position-absolute top-50 start-50 translate-middle">
        <article class="row d-flex">
            <section class="col-8 border-end">
                <h4 class="text-warning border-bottom p-4">Carrito</h4>
                <div class="d-flex justify-content-center">
                    <?php
                    $sql_carrito = "SELECT 'img_productos', 'productos', 'detalle_orden' 
                                FROM detalle_orden 
                                INNER JOIN productos ON detalle_orden.id_producto = productos.id_producto 
                                INNER JOIN img_productos ON img_productos.id_producto = productos.id_producto";
                    $carrto_all = $db->seleccionarDatos($sql_carrito);

                    if (empty($carrto_all)) {
                    ?>

                        <div class="d-flex align-items-center gap-3" style="opacity: 30%;">
                            <img src="../../../assets/img/oops.png" alt="" width="72px">
                            <span>No has agregado <br> nada a tu carrito</span>
                        </div>
                    <?php
                    } else {
                    ?>
                        <table class="table table-dark text-end">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                    <td>Cantidad</td>
                                    <td>Subtotal</td>
                                </tr>
                            </thead>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </section>
            <section class="col-4">

            </section>
        </article>
    </main>

</body>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</html>