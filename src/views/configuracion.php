<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;
session_start();

// Ahora puedes usar $datos_usuarios y $datos_personas para mostrar los datos del usuario en tu página
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configuracion</title>


  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="cpu.svg" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="/panaderia/assets/css/configuracion.css" rel="stylesheet">

</head>

<style>
  body {
    display: flex;
  }

  input[type="submit"] {
    background-color: orange;
    color: black;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    border-radius 10px;
  }


  .form-control {
    border: none;
    background: #0c0b09;
    border-bottom: 1px solid #cda45e;
    border-radius: 0;
    padding: 9px 5px;
    min-height: 40px;
    color: white;
    font-size: 18px;
    margin: 15px;

    font-weight: normal;
  }

  .login-wrapper .form-control::-webkit-input-placeholder {
    color: #b0adad;
  }

  .login-wrapper .form-control::-moz-placeholder {
    color: #b0adad;
  }

  .login-wrapper .form-control:-ms-input-placeholder {
    color: #b0adad;
  }

  .login-wrapper .form-control::-ms-input-placeholder {
    color: #b0adad;
  }

  .login-wrapper .form-control::placeholder {
    color: #b0adad;
  }

  form {
    background: #0c0b09;
    border-bottom: 1px solid #cda45e;
    border-radius: 10px;
    padding: 20px;
    margin: 50px;
  }

  h3 {
    margin: 15px;
    padding-top: 40px;

  }

  body {
    margin-top: 260px;
    /* Ajusta este valor al tamaño de tu navbar */

  }
</style>

<body>
  <?php include('../../templates/navbar.php');  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">

          <?php

          $sql_usuarios = "SELECT * FROM usuarios WHERE id_usuario = $id";
          $sql_personas = "SELECT * FROM personas WHERE id_persona = $id";

          // Ejecuta las consultas
          $resultadousuarios = $db->ejecutarConsulta($sql_usuarios);
          $resultadopersonas = $db->ejecutarConsulta($sql_personas);

          // Obtiene los datos del usuario
          $datos_usuarios = $resultadousuarios->fetch(PDO::FETCH_ASSOC);
          $datos_personas = $resultadopersonas->fetch(PDO::FETCH_ASSOC);

          $id = $_SESSION['user'];
          $id_usuario = $_SESSION['user'];
          $phone = $_SESSION['user_phone'];
          $password = $_SESSION['user_password'];
          $nombre_usuario = $_SESSION['user_name'];
          $correo_usuario = $_SESSION['correo'];
          $apellido_persona = $_SESSION['apellido'];

          ?>



          <form action="EditarUsuario.php" method="post">
            <h1>Información de usuario</h1>
            <div>
              <h3>ID</h3><input class="form-control" type="text" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div>
              <h3>Telefono</h3><input class="form-control" type="text" name="id" value="<?php echo isset($datos_usuarios['telefono']) ? $datos_usuarios['telefono'] : ''; ?>" readonly>
            </div>
            <div>
              <h3>Nombre</h3><input class="form-control" type="text" name="nombre" value="<?php echo isset($datos_personas['nombre']) ? $datos_personas['nombre'] : ''; ?>" readonly>
            </div>
            <div>
              <h3>Apellido</h3><input class="form-control" type="text" name="apellido" value="<?php echo isset($datos_personas['apellido']) ? $datos_personas['apellido'] : ''; ?>" readonly>
            </div>
            <div>
              <h3>Correo</h3><input class="form-control" type="text" name="correo" value="<?php echo isset($datos_personas['correo']) ? $datos_personas['correo'] : ''; ?>" readonly>
            </div>
            <div>
              <h3>Contraseña</h3><input class="form-control" type="password" id="contrasena" name="contrasena" value="<?php echo isset($datos_usuarios['contrasena']) ? $datos_usuarios['contrasena'] : ''; ?>" readonly>
            </div>

            <input type="checkbox" id="mostrar_contrasena"> Mostrar contraseña
            <input type="submit" href="EditarUsuario.php" value="Editar informacion">
          </form>


          <script>
            document.getElementById('mostrar_contrasena').addEventListener('change', function() {
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>