<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carrito de compras</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="/panaderia/assets/img/favicon.png" rel="icon">
    <link href="/panaderia/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/panaderia/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/panaderia/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/panaderia/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/panaderia/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/panaderia/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/panaderia/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="/panaderia/assets/css/style.css" rel="stylesheet">

    <style>
        .fixed-top {
            position: static;
        }

        @media (min-width: 768px) {
            .border-md-end {
                border-right: 1px solid #dee2e6;
            }
        }
    </style>

</head>

<body>

    <audio id="notificationSound" src="/panaderia/assets/audio/notificacion.mp3"></audio>

    <?php include('../../../templates/navbar.php'); ?>
    <br>

    <main class="container p-1">
        <article class="w-100 h-100 row flex-md-row flex-sm-column">
            <section class="col-md-8 border-md-end col-sm-12">
                <div class="border-bottom">
                    <h2 class="text-warning p-2">Carrito</h2>
                </div>
                <div class="m-auto h-100 d-flex justify-content-center">

                    <div class="table-responsive w-100">
                        <table id="carrito-table" class="table text-center text-middle table-borderless" style="border-radius:20px; background: transparent;">
                            <thead>
                                <tr>
                                    <th style="background:transparent; color:white; padding:25px">Imagen </th>
                                    <th style="background:transparent; color:white; padding:25px">Producto</th>
                                    <th style="background:transparent; color:white; padding:25px">Precio</th>
                                    <th style="background:transparent; color:white; padding:25px">Cantidad</th>
                                    <th style="background:transparent; color:white; padding:25px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="col-md-4 col-sm-12" style="margin-top:-60px">
                <div class="h-100 card bg-transparent border p-2 ms-md-4">
                    <div class="card-body" id="total-section">
                        <!-- Aquí se cargará el contenido del total del carrito -->
                    </div>
                </div>
            </section>
        </article>
    </main>

    <?php include('../../../templates/footer.php'); ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="/panaderia/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="/panaderia/assets/vendor/aos/aos.js"></script>
    <script src="/panaderia/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/panaderia/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/panaderia/assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            var timer; // Variable para almacenar el temporizador

            // Función para actualizar la cantidad del producto
            function actualizarCantidad(id_producto, cantidad) {
                $.ajax({
                    url: '../../scripts/cart/actualizar_cantidad.php', // Reemplaza 'actualizar_cantidad.php' con la ruta correcta
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id_producto: id_producto,
                        cantidad: cantidad
                    },
                    success: function(response) {
                        if (response.success) {
                            // Si la actualización fue exitosa, volver a cargar el carrito
                            actualizarCarrito();
                            // Obtener la hora actual
                            var now = new Date();

                            // Formatear la hora actual como "HH:MM"
                            var hours = now.getHours();
                            var minutes = now.getMinutes();
                            var time = hours + ':' + (minutes < 10 ? '0' : '') + minutes;
                            var audio = document.getElementById("notificationSound");

                            // Mostrar un toast si la respuesta es exitosa
                            var toast = `
<div class="toast-container position-fixed bottom-0 end-0 p-3  start-50 translate-middle-x">
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius:20px">
<div class="toast-header" style="border-radius:10px 10px 0px 0px;">
<svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#0fb856" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
<strong class="me-auto">Notificacion</strong>
<small>${time}</small>
<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body text-center" style="color:#545454">
<p> La cantidad ha sido actualizada correctamente. </p>
</div>
</div>
</div>`;
                            $('body').append(toast); // Agregar el toast al cuerpo del documento
                            $('.toast').toast('show'); // Mostrar el toast

                            // Reproducir el sonido de notificación
                            audio.play();
                        } else {
                            // Si hubo un error, mostrar un mensaje de error o tomar otra acción
                            console.log(response.message);
                        }
                    }
                });
            }
            // Script para evitar que se ingrese 0 en el campo de cantidad al presionar "Enter"
            $('#carrito-table').on('keypress', 'input[type="number"]', function(event) {
                if (event.which === 13) { // Verificar si la tecla presionada es "Enter"
                    var cantidad = $(this).val();
                    if (cantidad <= 0) {
                        $(this).css('color', 'red'); // Cambiar el color del texto a rojo
                        if (!$(this).closest('tr').find('.error-message')
                            .length) { // Verificar si no existe un mensaje de error previo
                            $(this).after(
                                '<br><span class="error-message" style="color: red;">La cantidad debe ser mayor a 0.</span>'
                            ); // Mostrar mensaje de error solo si no hay uno previo
                        }
                    } else {
                        $(this).css('color', 'white'); // Restaurar el color del texto a blanco
                        $(this).closest('tr').find('.error-message')
                            .remove(); // Eliminar mensaje de error si la cantidad es válida
                        var id_producto = $(this).closest('tr').data('id');
                        actualizarCantidad(id_producto,
                            cantidad); // Llamar a la función para actualizar la cantidad
                    }
                }
            });

            // Evento de inicio de escritura en el campo de cantidad
            $('#carrito-table').on('focus', 'input[type="number"]', function() {
                // Detener el temporizador de actualización
                clearInterval(timer);
            });

            // Evento de fin de escritura en el campo de cantidad
            $('#carrito-table').on('blur', 'input[type="number"]', function() {
                // Reanudar el temporizador de actualización después de 5 segundos
                timer = setInterval(actualizarCarrito, 5000);
            });

            // Función para eliminar un producto del carrito
            function eliminarProducto(id_producto) {
                $.ajax({
                    url: '../../scripts/cart/eliminar_producto.php', // Reemplaza 'eliminar_producto.php' con la ruta correcta
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id_producto: id_producto
                    },
                    success: function(response) {
                        if (response.success) {
                            // Si la eliminación fue exitosa, volver a cargar el carrito
                            actualizarCarrito();
                            var audio = document.getElementById("notificationSound");
                            // Obtener la hora actual
                            var now = new Date();

                            // Formatear la hora actual como "HH:MM"
                            var hours = now.getHours();
                            var minutes = now.getMinutes();
                            var time = hours + ':' + (minutes < 10 ? '0' : '') + minutes;

                            // Mostrar un toast si la respuesta es exitosa
                            var toast = `
<div class="toast-container position-fixed bottom-0 end-0 p-3  start-50 translate-middle-x">
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius:20px">
<div class="toast-header" style="border-radius:10px 10px 0px 0px;">
<svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#0fb856" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
<strong class="me-auto">Notificacion</strong>
<small>${time}</small>
<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body text-center" style="color:#545454">
Producto elimando correctamente.
</div>
</div>
</div>`;
                            $('body').append(toast); // Agregar el toast al cuerpo del documento
                            $('.toast').toast('show'); // Mostrar el toast

                            // Reproducir el sonido de notificación
                            audio.play();
                        } else {
                            // Si hubo un error, mostrar un mensaje de error o tomar otra acción
                            console.log(response.message);
                        }
                    }
                });
            }

            // Evento de clic en el botón de eliminar
            $('#carrito-table').on('click', 'button.btn-danger', function() {
                var id_producto = $(this).closest('tr').data('id');
                eliminarProducto(id_producto);
            });

            // Función para actualizar el carrito
            function actualizarCarrito() {
                $.ajax({
                    url: '../../scripts/cart/actualizar_carrito.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#carrito-table tbody').html(data.carrito);
                        $('#total-section').html(data.total);
                    }
                });
            }

            // Actualizar el carrito inicialmente
            actualizarCarrito();

            // Iniciar el temporizador de actualización del carrito cada 5 segundos
            timer = setInterval(actualizarCarrito, 5000);
        });
    </script>

</body>

</html>