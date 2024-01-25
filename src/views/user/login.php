<?php 
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database;

 $sql = "SELECT * from usuarios";
 $users=$db->seleccionarDatos($sql);
 

 //verificar el login

     
 if($_POST){
  extract($_POST);
        $consulta_hash="Select * from usuarios inner join
        personas on personas.id_persona=usuarios.id_persona 
        where usuarios.telefono='$phone'";
        $date_person=$db->seleccionarDatos($consulta_hash);
        
        foreach ($date_person as $decrypted)
        $password_hash= $decrypted['contrasena'];
    
        $id_usuario=$decrypted['id_usuario'];
        

      if(password_verify($password,$password_hash)){
       
       if($decrypted['tipo_usuario']==0){
         session_start();
         $_SESSION['admin']=$id_usuario;
         header("Location: /src/views/admin/index.php");
       }
       elseif($decrypted['tipo_usuario']==1){
         session_start();
        $_SESSION['user']=$id_usuario;
        header("Location:hola.php");
        
      }
      
     }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EL Pan Maachin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- Template Main CSS File -->
  <link href="../../../assets/css/style.css" rel="stylesheet">

</head>

<style>

.brand-wrapper {
  padding-top: 7px;
  padding-bottom: 8px; }
  .brand-wrapper .logo {
    height: 125px; }

.login-section-wrapper {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  padding: 68px 100px;
  background-color: #0c0b09; }
  @media (max-width: 991px) {
    .login-section-wrapper {
      padding-left: 50px;
      padding-right: 50px; } }
  @media (max-width: 575px) {
    .login-section-wrapper {
      padding-top: 20px;
      padding-bottom: 20px;
      min-height: 100vh; } }

.login-wrapper {
  width: 80%;
  max-width: 100%;
  padding-top: 24px;
  padding-bottom: 24px; }
  @media (max-width: 575px) {
    .login-wrapper {
      width: 100%; } }
  .login-wrapper label {
    font-size: 14px;
    font-weight: bold;
    color: #b0adad; }
  .login-wrapper .form-control {
    border: none;
    background:#0c0b09;    border-bottom: 1px solid #cda45e;
    border-radius: 0;
    padding: 9px 5px;
    min-height: 40px;
    color:white;
    font-size: 18px;
    font-weight: normal; }
    .login-wrapper .form-control::-webkit-input-placeholder {
      color: #b0adad; }
    .login-wrapper .form-control::-moz-placeholder {
      color: #b0adad; }
    .login-wrapper .form-control:-ms-input-placeholder {
      color: #b0adad; }
    .login-wrapper .form-control::-ms-input-placeholder {
      color: #b0adad; }
    .login-wrapper .form-control::placeholder {
      color: #b0adad; }
  .login-wrapper .login-btn {
    padding: 13px 20px;
    border-color: #cda45e;
    border:1px solid;
    
    border-radius: 10px;
    font-size: 20px;
    font-weight: bold;
    color: #cda45e;
    margin-bottom: 14px; }
    .login-wrapper .login-btn:hover {
      border: 1px solid #cda45e;
      background-color: #fff;
      color: #fdbb28; }
  .login-wrapper a.forgot-password-link {
    color: #080808;
    font-size: 14px;
    text-decoration: underline;
    display: inline-block;
    margin-bottom: 54px; }
    @media (max-width: 575px) {
      .login-wrapper a.forgot-password-link {
        margin-bottom: 16px; } }
  .login-wrapper-footer-text {
    font-size: 16px;
    color: #fff;
    margin-bottom: 0; }

.login-title {
  font-size: 30px;
  color: #fff;
  font-weight: bold;
  margin-bottom: 25px; }

.login-img {
  width: 100%;
  height: 100vh;
  -o-object-fit: cover;
     object-fit: cover;
  -o-object-position: left;
     object-position: left; }

/*# sourceMappingURL=login.css.map */

</style>
<body>
  
  
<?php include('../../../templates/navbar.php'); ?>





<main>
    <div class="container-fluid">
      <div class="row">


        <div class="col-sm-7 login-section-wrapper">
        <center>
        <div class="brand-wrapper"><br><br>
            <img src="https://www.zarla.com/images/zarla-dulce-pan-1x1-2400x2400-20210604-b78c7qwmgxkt764xw4rh.png?crop=1:1,smart&width=250&dpr=2" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Iniciar Sesion</h1>
            <form action="" method="post">
              <div class="form-group">
                <label for="email">Numero de Telefono</label>
                <input type="number" name="phone" id="number" class="form-control" placeholder="Numero de telefono">
              </div>
              
              <div class="form-group mb-4">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña">
              </div>
              
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Iniciar Sesion">
            </form>

            <?php
    if($_POST){

             if(!password_verify($password,$password_hash)) { 
                 echo  "<div class='alert alert-danger text-center' role='alert' style='margin-left:10%; margin-top:-2%; margin-bottom:7%; margin-right:10%;'>
                 Contraseña o numero incorrecto.
               </div>";  
               }
        
              }
      
         
         ?> 

            <a href="#!" class="forgot-password-link">Olvido su contraseña?</a>
            <p class="login-wrapper-footer-text">No tiene una cuenta? <a href="/panaderia/src/views/user/registrar.php" class="t" style="color: #cda45e">Registrese aqui!</a></p>
          </div>
        </center>
        </div>

        
        <div class="col-sm-5 px-0 d-none d-sm-block">
          <img src="w.jpeg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>



  <!-- Vendor JS Files -->
  <script src="../../../assets/vendor/aos/aos.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
</body>

