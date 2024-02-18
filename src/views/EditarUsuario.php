<?php
   session_start();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <meta content="" name="description">
  <meta content="" name="keywords">

 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="cpu.svg" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/panaderia/assets/css/configuracion.css" rel="stylesheet">

    <style>
      #input{
        background:transparent;
        color:white;
        margin:15px;
        width:400px;
      }
      form
      {
        backdrop-filter: blur(5px);
        border-radius 10px;
        align-items:center;
        justify-content:center;

      }

      #guardar{
        background-color:orange;
        border:none;
        margin:15px;
        border-radius:5px;
      }

      #guardar:hover {
        cursor: pointer;
      }

      /* Al hacer click en el botón */
      #guardar:active {
        transform: scale(0.9);
      }

    </style>
    
</head>
<body>
    
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+52 871-642-2929</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span>  Lunes-Sabado: 08:00 AM - 18:00 PM</span></i>
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
  <header id="header" class="fixed-top d-flex align-items-cente">
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
       use MyApp\data\Database;
       require("../../vendor/autoload.php");
       $db = new Database;

      if(isset($_SESSION['user'])){
       $id = $_SESSION['user'];
        $sql="select * from usuarios inner join personas on personas.id_persona=usuarios.id_persona where usuarios.id_usuario  = $id ";
        $info_user = $db->seleccionarDatos($sql);


foreach($info_user as $user)
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
        <img class="avatar-img rounded-circle shadow" src="/panaderia/assets/img/profile.webp" style="width:32px; heigth:32px"  alt="avatar">
      </div>
      <div>
        <a class="h6 mt-2 mt-sm-0" href="#"><?php echo $user['nombre'] ?></a>
        <p class="small m-0"><?php echo $user['correo'] ?></p>
      </div>
    </div>
  </li>

  <!-- Links -->
  <li> <hr class="dropdown-divider"></li>
  <li><a class="dropdown-item" href="#">
  <svg style="margin-right:5px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
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
  <li><a class="dropdown-item" href="/panaderia/src/views/configuracion.php"><i class="bi bi-gear fa-fw me-2"></i>Configuracion</a></li>
  <li><a class="dropdown-item bg-danger-soft-hover" href="/panaderia/src/scripts/logout.php"><i class="bi bi-power fa-fw me-2"></i>Cerrar sesión</a></li>



</ul>
</li>

&ensp; &ensp; 

<?php
      }
      else{


          
      echo '<a href="/panaderia/src/views/user/registrar.php" class="book-a-table-btn scrollto d-none d-lg-flex">Crear Cuenta</a>';

      
      }
      ?>

    </div>
  </header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
       


      <?php

      
        $id= $_SESSION['user'];
        $id_usuario = $_SESSION['user'];
        $phone = $_SESSION['user_phone'];
        $password = $_SESSION['user_password'];
        $nombre_usuario= $_SESSION['user_name'];
        $correo_usuario= $_SESSION['correo'];
        $apellido_persona= $_SESSION['apellido'];
    
      ?>



    <form action="ProcesarEditar.php" method="post">
        <h1>Información de usuario</h1>
        <div><h3>ID</h3><input class="form-control" id="input" type="text" name="id" value="<?php echo $id; ?>" readonly></div>
        <div><h3>Telefono</h3><input class="form-control"  id="input" type="text" name="telefono" value="<?php echo $phone; ?>" ></div>
        <div><h3>Nombre</h3><input  class="form-control"  id="input" type="text" name="nombre" value="<?php echo $nombre_usuario; ?>" > </div>
        <div><h3>Apellido</h3><input  class="form-control"  id="input" type="text"  name="apellido" value="<?php echo $apellido_persona; ?>" > </div>
        <div><h3>Correo</h3><input  class="form-control"  id="input" type="text"  name="correo" value="<?php echo $correo_usuario; ?>" > </div>
        <div><h3>Contraseña</h3><input class="form-control" type="password" id="contrasena" name="contrasena" value="<?php echo $password; ?>"> </div>
        <input type="checkbox" id="mostrar_contrasena"> Mostrar contraseña
        <input type="submit" name="guardar" id="guardar" value="Guardar cambios">

    </form>

    <script>
      document.getElementById('mostrar_contrasena').addEventListener('change', function () {
          var contrasenaInput = document.getElementById('contrasena');
          if (this.checked) {
              contrasenaInput.type = 'text';
          } else {
              contrasenaInput.type = 'password';
        }
      });
</script>


    
</body>
 <!-- Vendor JS Files -->
 <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</html>
</html>