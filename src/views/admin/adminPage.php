<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;

session_start();

$db = new Database;

if (isset($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios 
            INNER JOIN personas 
            ON personas.id_persona=usuarios.id_persona 
            WHERE usuarios.id_usuario  = '$id' AND usuarios.tipo_usuario = 0 ";
    $info_user = $db->seleccionarDatos($sql);
    foreach ($info_user as $usuario) {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Adiminstrador</title>
            <!-- plugins:css -->
            <link rel="stylesheet" href="../../../assets/vendor/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="../../../assets/vendor/css/vendor.bundle.base.css">
            <!-- endinject -->
            <!-- Layout styles -->
            <link rel="stylesheet" href="../../../assets/vendor/css/style.css">
            <!-- End layout styles -->

            <!-- Material Symbols Icons Google -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

            <!-- Agrega un script para inicializar el gráfico usando JSDelivr -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        </head>

        <body>
            <div class="container-scroller">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                        <a class="sidebar-brand brand-logo text-center text-light text-decoration-none p-0" href="index.html"> El <span class="text-warning fw-bold">pan</span> machin</a>
                    </div>
                    <ul class="nav">
                        <li class="nav-item profile">
                            <div class="profile-desc">
                                <div class="profile-pic">
                                    <div class="count-indicator">
                                        <img class="img-xs rounded-circle " src="../../../assets/img/profile.webp" alt="">
                                        <span class="count bg-success"></span>
                                    </div>
                                    <div class="profile-name">
                                        <h5 class="mb-0 font-weight-normal"> <?php echo $usuario['nombre']; ?> </h5>
                                        <span>Administrador</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-category">
                            <span class="nav-link">Navigation</span>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link d-flex gap-3" href="index.html">
                                <span class="material-symbols-outlined" style="color: #50AB65;">
                                    point_of_sale
                                </span>
                                <span class="menu-title">Ventas</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link d-flex gap-3" href="index.html">
                                <span class="material-symbols-outlined" style="color: #3058AD;">
                                    inventory_2
                                </span>
                                <span class="menu-title">Inventario</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- partial -->
                <div class="container-fluid page-body-wrapper">
                    <!-- partial:partials/_navbar.html -->
                    <nav class="navbar p-0 fixed-top d-flex flex-row">
                        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo-mini text-center p-0" href="index.html"><span class="text-warning fw-bold">P</span></a>
                        </div>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center btn-menu text-secondary" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-format-line-spacing"></span>
                        </button>
                        <div class="navbar-menu-wrapper flex-grow d-flex align-items-center justify-content-end">
                            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                                <span class="mdi mdi-menu"></span>
                            </button>
                            <ul class="navbar-nav navbar-nav-right">

                                <li class="nav-item dropdown">
                                    <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                        <div class="navbar-profile">
                                            <img class="img-xs rounded-circle" src="../../../assets/img/profile.webp" alt="">
                                            <p class="mb-0 d-none d-sm-block navbar-profile-name"> <?php echo $usuario['nombre']; ?> </p>
                                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                        <h6 class="p-3 mb-0">Profile</h6>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item preview-item">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-dark rounded-circle">
                                                    <i class="mdi mdi-settings text-success"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content">
                                                <p class="preview-subject mb-1">Settings</p>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item preview-item">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-dark rounded-circle">
                                                    <i class="mdi mdi-logout text-danger"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content">
                                                <p class="preview-subject mb-1">Log out</p>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <p class="p-3 mb-0 text-center">Advanced settings</p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </nav>
                    <!-- partial -->
                    <div class="main-panel">
                        <div class="content-wrapper">
                            <div class="grilla">
                                <div class="card-1">
                                    <?php include('../../../graphics/ganancias-totales/ganancias-meses.php') ?>
                                </div>
                                <div class="card-2">
                                    <?php include('../../../graphics/ganancias-totales/ganancias-dia.php') ?>
                                </div>
                                <div class="card-3">
                                    <?php include('../../../graphics/ganancias-totales/ganancias-totales.php') ?>
                                </div>
                            </div>
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial -->
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- Carga de ajax -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="../../../assets/vendor/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="../../../assets/vendor/chart.js/Chart.min.js"></script>
            <script src="../../../assets/vendor/progressbar.js/progressbar.min.js"></script>
            <script src="../../../assets/js/jquery.cookie.js" type="text/javascript"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="../../../assets/js/off-canvas.js"></script>
            <script src="../../../assets/js/hoverable-collapse.js"></script>
            <script src="../../../assets/js/misc.js"></script>
            <script src="../../../assets/js/settings.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="../../../assets/js/dashboard.js"></script>
            <!-- End custom js for this page -->

        </body>

        </html>
<?php
    }
}
?>