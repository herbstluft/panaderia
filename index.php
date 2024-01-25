<?php 
 use MyApp\data\Database;
 require("vendor/autoload.php");
 $db = new Database;

 $sql = "SELECT * from usuarios";
 $users=$db->seleccionarDatos($sql);


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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  
<?php include('templates/navbar.php'); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Bienvenidos a <span>El Pan Machin</span></h1>
          <h2>Calidad que se siente en cada pedazo de nuestro pan, una experiencia que va más allá de lo común. Descubre el arte de saborear con nosotros.</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Hacer pedido</a>
            <a href="/panaderia/src/views/user/login.php" class="btn-book animated fadeInUp scrollto">Inicie Sesion</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="https://imgs.search.brave.com/I0Qu99mfoMflnaphgPVor-GJcORJWaQ2o9MbqauwdV8/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/Zm90by1ncmF0aXMv/cGFuZXMtaGFtYnVy/Z3Vlc2FfMjMtMjE0/ODU3NTQzNS5qcGc_/c2l6ZT02MjYmZXh0/PWpwZw" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Del horno a tu mesa, donde cada bocado es una obra maestra de calidad y pasión.</h3>
            <p class="fst-italic">
              Con devoción artesanal, presentamos desde nuestro horno hasta tu mesa, bocados que son auténticas obras maestras: una sinfonía de calidad y pasión que deleitará tus sentidos con cada mordisco.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i><b> Artesanía Excepcional:</b> Destacamos por nuestra dedicación artesanal, garantizando panes de calidad superior en cada bocado.</li>
              <li><i class="bi bi-check-circle"></i> <b>Innovación Deliciosa:</b> Sorprendemos con una variedad única de panes, desde lo clásico hasta creaciones innovadoras, para una experiencia culinaria excepcional.</li>
              <li><i class="bi bi-check-circle"></i> <b>Compromiso Sostenible:</b> Nos enorgullece ser una panadería comprometida con prácticas sostenibles, ofreciendo delicias que respetan tanto tu paladar como el medio ambiente.</li>
            </ul>
            <p>
              Nos esforzamos diariamente por convertirnos en la panadería de elección, donde la pasión por la excelencia culinaria se fusiona con la innovación sostenible. Nuestra meta es ser reconocidos como referentes en la creación de experiencias gastronómicas únicas, dejando una huella positiva en cada cliente que disfrute de nuestros panes artesanales y sienta la autenticidad de nuestra dedicación en cada deliciosa pieza.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>¿Por qué nosotros?</h2>
          <p>¿Por qué elegir nuestra panaderia?</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Creatividad Constante</h4>
              <p>Descubre nuevas delicias en cada visita, ya que nos dedicamos a innovar y crear panes únicos que reflejan nuestra pasión por la creatividad gastronómica.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Ofertas Especiales</h4>
              <p> Permítenos sorprenderte con promociones exclusivas y ofertas especiales, diseñadas para brindarte más valor y hacer que tu experiencia con nosotros sea aún más gratificante.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Frescura Diaria</h4>
              <p> Nuestro compromiso con la frescura es constante. Cada día, te ofrecemos panes recién horneados que capturan la esencia de la autenticidad y la calidad.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Consulta nuestro Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Todo</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-starters">
            <img src="https://tofuu.getjusto.com/orioneat-prod/D2avzku7x6H4pLN3S-hamburguesa-con-tocino.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pan Para Hamburguesa</a><span> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
              </svg></span>
            </div>
            <div class="menu-ingredients">
              Esponjoso con la Excelencia de Harinas Finas, Levadura Fresca, Aceite de Oliva y un Toque de Miel.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="https://procinsa.net/wp-content/uploads/2022/11/hot-dog.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pan Para Hot Dog</a><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
              </svg></span>
            </div>
            <div class="menu-ingredients">
              La Base Perfecta para Tu Explosión de Sabores, Hecho con Esmero y Sabor Inigualable.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="https://donpan.mx/wp-content/uploads/2023/11/Dogo-Especial-Mixto.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pan Para Cocodrilo</a><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
              </svg></span>
            </div>
            <div class="menu-ingredients">
              Crujiente por Fuera, Tierno por Dentro, una Experiencia Única de Harinas Premium y Técnicas Artesanales.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="https://elcuadernodemisrecetas.com/wp-content/uploads/pan-baguette-frances-2.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pan Baguette</a><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
              </svg></span>
            </div>
            <div class="menu-ingredients">
              La Elegancia del Pan Crujiente por Fuera, Suave por Dentro, Hecho con las Mejores Harinas para una Experiencia Auténtica.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgSwoudvoCrNEl38bWoWZr_7apXrG0z7UsC6jfPdtW1ZwwgfUH94x6-iqFOwmJESfIlPo&usqp=CAU" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pan Brioche</a><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
              </svg></span>
            </div>
            <div class="menu-ingredients">
              Delicadeza en Cada Mordisco, la Fusión Perfecta de Mantequilla, Huevos y Harinas Selectas para un Placer Dulce y Esponjoso.
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Detalles</h2>
          <p>Menu Detallado</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Hamburguesa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Cocodrilo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Hotdog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Baguette</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Brioche</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Descubre el Toque Perfecto</h3>
                    <p>Sumérgete en la excelencia culinaria con nuestro Pan de Hamburguesa, elaborado con la mezcla perfecta de harinas selectas y una cuidadosa fermentación. </p> <p>Experimenta la suavidad y elasticidad que añadirá un toque único a cada hamburguesa. ¡Eleva tus creaciones a un nivel superior y haz de cada bocado una experiencia inolvidable con nuestro pan artesanal para hamburguesa!</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="https://4.bp.blogspot.com/-L2zRS_hY9No/UbKbL6LUXaI/AAAAAAAAA3c/QsnUm5Fvozc/s1600/Hamburguesa.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Conquista el Sabor con Nuestro Pan de Cocodrilo Único</h3>
                    <p> Experimenta la emoción culinaria con nuestro Pan de Cocodrilo, una deliciosa fusión de crujiente exterior y ternura interior. Elaborado con harinas de calidad superior, cada bocado es una aventura gastronómica. </p>
                    <p>Descubre la audacia de los sabores y texturas con este pan singular, diseñado para destacar y elevar tus creaciones a un nivel inigualable. ¡Deja que la magia comience con nuestro pan de cocodrilo!</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="https://png.pngtree.com/png-vector/20231014/ourmid/pngtree-sesamesprinkled-hot-dog-bun-isolated-on-white-loaf-png-image_10286340.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Nuestro Pan Especial Transforma Cada Bocado</h3>
                    <p> Eleva la experiencia de tus hot dogs con nuestro Pan Especial, diseñado para la perfección. Con una textura suave por dentro y una ligera crujencia por fuera, este pan resalta los sabores de cada ingrediente.</p> <p>Disfruta de hot dogs como nunca antes con nuestro pan único, añadiendo un toque de distinción a tu indulgencia culinaria. ¡Descubre el placer de un hot dog excepcional con nuestro pan especializado!</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="https://png.pngtree.com/png-clipart/20230409/ourmid/pngtree-hot-dog-grill-with-mustard-isolated-png-image_6696315.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Elegancia y Sabor en Cada Delicioso Bocado</h3>
                    <p>Sumérgete en la sofisticación de nuestra Baguette Artesanal, cuidadosamente elaborada para deleitar tu paladar. Con una corteza crujiente y una miga suave, este pan es la elección perfecta para aquellos que aprecian la autenticidad de la panadería francesa. </p>
                    <p>Acompaña tus comidas con la distinción de nuestra Baguette, un símbolo de excelencia en cada bocado. ¡Descubre la elegancia del pan artesanal con nuestra Baguette excepcional!</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="https://static.vecteezy.com/system/resources/previews/009/693/053/original/baguette-bread-cutout-file-png.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3> La Delicia Suave que Transforma tus Momentos Dulces</h3>
                    <p>Disfruta de momentos irresistibles con nuestro Pan Brioche, una mezcla única de suavidad y sabor indulgente. Elaborado con mantequilla de alta calidad y huevos frescos, este pan te transportará a la perfección de la repostería francesa.</p>
                    <p>Con cada bocado, experimentarás la textura esponjosa y la dulzura sutil que hacen del Pan Brioche una elección excepcional para tus delicias favoritas. ¡Deleita tu paladar con la exquisitez de nuestro Brioche artesanal!





                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="https://www.ciemsafoodservice.com/wp-content/uploads/2020/10/FP-FR021_-_bollito-brioche.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Ofertas</h2>
          <p>Aprovecha nuestras ofertas al maximo.</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-birthday.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>$189</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-private.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>$290</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-custom.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>$99</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonios</h2>
          <p>Lo que dicen de nosotros</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeria</h2>
          <p>Algunas fotos de nuestros productos</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Master Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Patissier</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>Cook</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Visitanos</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d437.1288625450455!2d-103.40364231888316!3d25.502119017402084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1706028851245!5m2!1ses!2smx"  style="border:0; width: 100%; height: 550px;"  allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Direccion:</h4>
                <p>José López Portillo esquina con Irapuato #10 Colonia 5 de febrero</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Horario:</h4>
                <p>
                  <b>Domicilio</b> <br>
                  Mnday-Saturday:<br>
                  11:00 AM - 2300 PM <br><br>

                  <b>Horario Tienda</b>
                  Monday-Saturday: <br>
                  11:00 AM- 23:00 PM

                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Correo Electronico:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefono:</h4>
                <p>+52 871-642-2929</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
           <center><h3> Redacte su opinion</h3></center> <br>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Asunto" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <select class="form-select" aria-label="Default select example" style="background-color: transparent; color: #ada694; margin-top: 2px; border-color: #ada6949d;">
                    <option value="1">Queja</option>
                    <option value="2">Sugerencia</option>
                  </select>
                </div>
              </div>

              
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Mensaje" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar Opinion</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
             <b> <h3>El Pan Machin</h3></b>
              <p>
                José López Portillo esquina con Irapuato #10 Colonia 5 de febrero<br><br>
                <strong>Telefono:</strong> +52 871-642-2929                <br>
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>