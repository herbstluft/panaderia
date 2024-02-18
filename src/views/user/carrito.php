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

    <style>
        @media (min-width: 768px) {
            .border-md-end {
                border-right: 1px solid #ffff;
                /* Cambia esto al estilo y color que desees */
            }
        }
    </style>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>+52 871-642-2929</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span> Lunes-Sabado: 08:00 AM - 18:00 PM</span></i>
            </div>

            <div class="languages d-none d-md-flex align-items-center">
                <ul>
                    <li>En</li>
                    <li><a href="#">De</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="/panaderia/index.php">El Pan Machin</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="/panaderia/index.php#hero">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#about">Acerca</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#menu">Menu</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#specials">Menu detallado</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#events">Ofertas</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#chefs">Chefs</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#gallery">Galeria</a></li>
                    <li><a class="nav-link scrollto" href="/panaderia/index.php#contact">Contacto</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


            <?php
            if (isset($_SESSION['user'])) {
                $id = $_SESSION['user'];
                $sql = "select * from usuarios inner join personas on personas.id_persona=usuarios.id_persona where usuarios.id_usuario  = $id ";
                $info_user = $db->seleccionarDatos($sql);


                foreach ($info_user as $user)
            ?>



                <li class=" nav-link nav-item ms-3 dropdown">
                    <!-- Avatar -->
                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar-img rounded-2" src="/panaderia/assets/img/profile.webp" style="width:32px; heigth:32px" alt="avatar">
                    </a>

                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <li class="px-3 mb-3">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class="avatar-img rounded-circle shadow" src="/panaderia/assets/img/profile.webp" style="width:32px; heigth:32px" alt="avatar">
                                </div>
                                <div>
                                    <a class="h6 mt-2 mt-sm-0" href="#"><?php echo $user['nombre'] ?></a>
                                    <p class="small m-0"><?php echo $user['correo'] ?></p>
                                </div>
                            </div>
                        </li>

                        <!-- Links -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../panaderia/src/views/user/carrito.php">
                                <svg style="margin-right:5px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg>
                                Mi carrito

                                <button type="button" style="background:none" class="btn position-relative">

                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        99+
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </a></li>




                        <li><a class="dropdown-item" href="#"><i class="bi bi-bookmark-check fa-fw me-2"></i>Mis pedidos</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-heart fa-fw me-2"></i>Mis Compras</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Configuracion</a></li>
                        <li><a class="dropdown-item bg-danger-soft-hover" href="/panaderia/src/scripts/logout.php"><i class="bi bi-power fa-fw me-2"></i>Cerrar sesión</a></li>



                    </ul>
                </li>

                &ensp; &ensp;

            <?php
            } else {



                echo '<a href="/panaderia/src/views/user/registrar.php" class="book-a-table-btn scrollto d-none d-lg-flex">Crear Cuenta</a>';
            }
            ?>

        </div>
    </header><!-- End Header -->

    <main class="container p-5">
        <article class="w-100 h-100 row flex-md-row flex-sm-column">
            <section class="col-md-8 border-md-end col-sm-12">
                <div class="border-bottom">
                    <h4 class="text-warning p-2">Carrito</h4>
                </div>
                <div class="m-auto h-100 d-flex justify-content-center">
                    <?php
                    $sql_carrito = "SELECT 'img_productos.*', 'productos.*', 'detalle_orden.*', 'orden.*'
                                FROM detalle_orden 
                                INNER JOIN orden ON detalle_orden.id_usuario = orden.id_usuario
                                INNER JOIN productos ON detalle_orden.id_producto = productos.id_producto 
                                INNER JOIN img_productos ON productos.id_producto = img_productos.id_producto";
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
            <section class="col-md-4 col-sm-12">
                <div class="h-100 card bg-transparent border p-2 ms-md-4">
                    <div class="card-body">
                        <h4 class="card-title text-warning border-bottom ps-3 pb-4">Total del carrito</h4>
                        <?php
                        if (empty($carrito_all)) {
                        ?>
                            <div class="text-light d-flex justify-content-between my-2 p-2">
                                <span>Número de órden:</span>
                                <span>0</span>
                            </div>
                            <div class="text-light d-flex justify-content-between my-2 p-2">
                                <span>Tipo de entrega:</span>
                                <span>-</span>
                            </div>
                            <div class="text-light d-flex justify-content-between my-2 p-2">
                                <span>Fecha de emisión:</span>
                                <span>-</span>
                            </div>
                            <div class="text-light d-flex justify-content-between border-top my-2 p-2 mt-4">
                                <span>Total:</span>
                                <span>0</span>
                            </div>
                            <form action="">
                                <button class="w-100 rounded-2 bg-warning text-light opacity-50" disabled style="cursor: pointer;">Pagar</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
        </article>
    </main>

    <!-- ======= Footer ======= -->
    <footer id=" footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <b>
                                <h3>El Pan Machin</h3>
                            </b>
                            <p>
                                José López Portillo esquina con Irapuato #10 Colonia 5 de febrero<br><br>
                                <strong>Telefono:</strong> +52 871-642-2929 <br>
                                <strong>Correo:</strong> info@example.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Acerca</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Menu</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Menu Detallado</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Ofertas</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <br>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Chefs</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Galeria</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Contacto </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">TecnoCode </a></li>

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>ElPanMachin</span></strong>. Todos los derechos reservados
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
                Desarrollado por <a href="https://bootstrapmade.com/">TecnoCode</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

<!-- Vendor JS Files -->
<script src="../../../assets/vendor/aos/aos.js"></script>
<script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../../../assets/js/main.js"></script>

</html>