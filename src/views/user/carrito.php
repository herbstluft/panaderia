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


</head>

<body>


    <?php include('../../../templates/navbar.php'); ?>
    <br>

    <main class="container p-5">
        <article class="w-100 h-100 row flex-md-row flex-sm-column">
            <section class="col-md-8 border-md-end col-sm-12">
                <div class="border-bottom">
                    <h4 class="text-warning p-2">Carrito</h4>
                </div>
                <div class="m-auto h-100 d-flex justify-content-center">
                    <?php
                    if (isset($_POST['id_usuario'])) {
                        $id_usuario = $_POST['usuario'];
                        $sql_carrito = "SELECT do.*, p.*, ip.*
                                    FROM detalle_orden do
                                    JOIN productos p ON do.id_producto = p.id_producto
                                    LEFT JOIN img_productos ip ON p.id_producto = ip.id_producto
                                    WHERE do.id_usuario = $id_usuario";
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
                                        <th></th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        foreach ($carrito_all as $producto) {
                                        ?>
                                            <td> <?php $producto['nombre_imagen'] ?> </td>
                                            <td> <?php $producto['producto'] ?> </td>
                                            <td> <?php $producto['precio'] ?> </td>
                                            <td> <?php $producto['cantidad'] ?> </td>
                                            <td> <?php $producto['subtotal'] ?> </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                    <?php
                        }
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

    <?php include('../../../templates/footer.php'); ?>

</body>


</html>