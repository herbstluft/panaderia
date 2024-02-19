<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;


if(isset($_GET['id'])){
  $id_producto = $_GET['id'];
  $sql_product = "select * from productos inner join img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto";
$producto = $db->seleccionarDatos($sql_product);




}

session_start();

if (isset($_SESSION['user'])) {
  $id = $_SESSION['user'];
}

?>

  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<style>
    .pd-wrap {
  padding: 40px 0;
  font-family: 'Poppins', sans-serif;
}
.heading-section {
  text-align: center;
  margin-bottom: 20px;
}
.sub-heading {
  font-family: 'Poppins', sans-serif;
    font-size: 12px;
    display: block;
    font-weight: 600;
    color: #2e9ca1;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.heading-section h2 {
  font-size: 32px;
    font-weight: 500;
    padding-top: 10px;
    padding-bottom: 15px;
  font-family: 'Poppins', sans-serif;
}
.user-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    position: relative;
  min-width: 80px;
  background-size: 100%;
}
.carousel-testimonial .item {
  padding: 30px 10px;
}
.quote {
  position: absolute;
    top: -23px;
    color: #2e9da1;
    font-size: 27px;
}
.name {
  margin-bottom: 0;
    line-height: 14px;
    font-size: 17px;
    font-weight: 500;
}
.position {
  color: #adadad;
  font-size: 14px;
}
.owl-nav button {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  outline: none;
  height: 25px;
}
.owl-nav button svg {
  width: 25px;
  height: 25px;
}
.owl-nav button.owl-prev {
  left: 25px;
}
.owl-nav button.owl-next {
  right: 25px;
}
.owl-nav button span {
  font-size: 45px;
}
.product-thumb .item img {
  height: 100px;
}
.product-name {
  font-size: 22px;
  font-weight: 500;
  line-height: 22px;
  margin-bottom: 4px;
}
.product-price-discount {
  font-size: 22px;
    font-weight: 400;
    padding: 10px 0;
    clear: both;
}
.product-price-discount span.line-through {
  text-decoration: line-through;
    margin-left: 10px;
    font-size: 14px;
    vertical-align: middle;
    color: #a5a5a5;
}
.display-flex {
  display: flex;
}
.align-center {
  align-items: center;
}
.product-info {
  width: 100%;
}
.reviews-counter {
    font-size: 13px;
}
.reviews-counter span {
  vertical-align: -2px;
}
.rate {
    float: left;
    padding: 0 10px 0 0;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float: right;
    width: 15px;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 21px;
    color:#ccc;
  margin-bottom: 0;
  line-height: 21px;
}
.rate:not(:checked) > label:before {
    content: '\2605';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.product-dtl p {
  font-size: 14px;
  line-height: 24px;
  color: #7a7a7a;
}
.product-dtl .form-control {
  font-size: 15px;
}
.product-dtl label {
  line-height: 16px;
  font-size: 15px;
}
.form-control:focus {
  outline: none;
  box-shadow: none;
}
.product-count {
  margin-top: 15px; 
}
.product-count .qtyminus,
.product-count .qtyplus {
  width: 34px;
    height: 34px;
    background: #ffff;
    text-align: center;
    font-size: 19px;
    line-height: 36px;
    color: #fff;
    cursor: pointer;
}
.product-count .qtyminus {
  border-radius: 3px 0 0 3px; 
}
.product-count .qtyplus {
  border-radius: 0 3px 3px 0; 
}
.product-count .qty {
  width: 60px;
  text-align: center;
}
.round-black-btn {
  border-radius: 4px;
    background: #212529;
    color: #fff;
    padding: 7px 45px;
    display: inline-block;
    margin-top: 20px;
    border: solid 2px #212529; 
    transition: all 0.5s ease-in-out 0s;
}
.round-black-btn:hover,
.round-black-btn:focus {
  background: transparent;
  color: #212529;
  text-decoration: none;
}

.product-info-tabs {
  margin-top: 25px; 
}
.product-info-tabs .nav-tabs {
  border-bottom: 2px solid #d8d8d8;
}
.product-info-tabs .nav-tabs .nav-item {
  margin-bottom: 0;
}
.product-info-tabs .nav-tabs .nav-link {
  border: none; 
  border-bottom: 2px solid transparent;
  color: #323232;
}
.product-info-tabs .nav-tabs .nav-item .nav-link:hover {
  border: none; 
}
.product-info-tabs .nav-tabs .nav-item.show .nav-link, 
.product-info-tabs .nav-tabs .nav-link.active, 
.product-info-tabs .nav-tabs .nav-link.active:hover {
  border: none; 
  border-bottom: 2px solid #d8d8d8;
  font-weight: bold;
}
.product-info-tabs .tab-content .tab-pane {
  padding: 30px 20px;
  font-size: 15px;
  line-height: 24px;
  color: #7a7a7a;
}
.review-form .form-group {
  clear: both;
}
.mb-20 {
  margin-bottom: 20px;
}

.review-form .rate {
  float: none;
  display: inline-block;
}
.review-heading {
  font-size: 24px;
    font-weight: 600;
    line-height: 24px;
    margin-bottom: 6px;
    text-transform: uppercase;
    color: #000;
}
.review-form .form-control {
  font-size: 14px;
}
.review-form input.form-control {
  height: 40px;
}
.review-form textarea.form-control {
  resize: none;
}
.review-form .round-black-btn {
  text-transform: uppercase;
  cursor: pointer;
}
</style>




<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"><div class="pd-wrap">
  <!-- Vendor CSS Files -->
  <link href="/panaderia/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/panaderia/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/panaderia/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/panaderia/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/panaderia/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/panaderia/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/panaderia/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/panaderia/assets/css/style.css" rel="stylesheet">


  
    
<?php include('../../../templates/navbar.php'); ?>
  
<br><br><br>  
  <div class="container">
          <div class="heading-section">
              <h2>Detalle De Producto</h2>
          </div>
          

          <?php 
foreach($producto as $producto){
  $nombre = $producto['nom_producto'];
  $precio = $producto['precio'];
  $descripcion = $producto['descripcion'];
  $existencia = $producto['existencia'];
  $imagen = $producto['nombre_imagen'];
              ?>

          <div class="row">
            <div class="col-md-6">
              <div id="slider" class="product-slider">
            <div class="item">
                <img style="border-radius:10px; width:100%; margin-bottom:20px;" src="/panaderia/assets/img/images_product/<?php echo $imagen; ?> " />
            </div>
          </div>
        

            </div>

            <div class="col-md-6">
              <div class="product-dtl">
                <div class="product-info">
                  <div class="product-name"><?php echo $nombre?></div>
                 
                  <div class="product-price-discount"><span><?php echo "$ ". number_format($precio,2); ?></span></div>
                </div>
                <p><?php echo $descripcion?></p>
                <div class="row">
                  <div class="col-md-6">
                    <label for="size">Existencia</label>
                <select id="size" name="size" class="form-control" style="background:#28251f;color:white; outline:none; border:1px solid #cda45e"  aria-label="Disabled select example" disabled>
                  <option><?php echo $existencia. " Panes"?></option>
               
                </select>
                  </div>
                 <br><br><br><br>
                <div class="product-count">
                  <label for="size">Cantidad</label>
                  <form action="#" class="display-flex">
                  
                  <input type="text" style="background:#28251f; border-radius:5px; color:white; outline:none; border:0px " name="quantity" value="1" class="qty">
                  
              </form>

              <br>
  <center>              <button type="button" class="btn btn-warning">Añadir al carrito</button>  </center>
            </div>
              </div>
            </div>
          </div>


          <?php
  }
?>




          <div class="product-info-tabs" style="margin-top:40px">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Opciones De Entrega</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab" style="color:white">
<h2 style="color:#cda45e">Opciones de Entrega</h2>
<p><b>Opción 1: Recoger en Tienda </b></p>
<p>Si decides elegir la opción "En Tienda" al comprar tu pan a través de nuestra página, te ofrecemos la conveniencia de recoger tu pedido directamente en nuestra tienda. Después de realizar la compra, podrás pasarte por nuestro establecimiento en el horario que mejor se adapte a ti. Esta alternativa es ideal para aquellos que prefieren una recogida rápida y desean disfrutar de la frescura de nuestros productos en el mismo día.</p>
      
<br>

<p><b>Opcion 2: Servicio a Domicilio</b></p>
<p>Para quienes buscan aún más comodidad, hemos habilitado la opción "Servicio a Domicilio". Al seleccionar esta alternativa, nos encargaremos de llevar el pan directamente a la puerta de tu hogar sin costo adicional. Disfruta de la máxima conveniencia y ahorra tiempo, permitiéndonos encargarnos de la entrega para que puedas relajarte y disfrutar de nuestros deliciosos productos en la comodidad de tu casa.</p></div>
  
        </div>
      </div>
      
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

  <?php include('../../../templates/footer.php'); ?>
  

</body>
</html>