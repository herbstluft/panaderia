
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
  <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Configuracion</a></li>
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