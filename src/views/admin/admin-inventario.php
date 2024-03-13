<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;
?>

<?php
if (isset($_GET['id'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

    </head>

    <body>



    <?php
}
    ?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <form action="">
                    <div class="d-flex flex-column">
                        <label for="">Agregue una imagen</label>
                        <input type="file" />
                    </div>

                    <div>

                    </div>
                </form>
            </div>


            <?php
            $queryProducto = "SELECT p.*, ip.nombre_imagen
                                          FROM productos p
                                          INNER JOIN img_productos ip
                                          ON p.id_producto = ip.id_producto";
            $producto = $db->ejecutarConsulta($queryProducto);
            ?>
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Existencia</th>
                            <th>Estado</th>
                            <th class="badge text-wrap" style="width: 120px; line-height: 18px;">Editar datos del renglón</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($producto as $prodConsulta) {
                        ?>
                            <tr>
                                <td>
                                    <img src="/panaderia/assets/img/images_product/<?php echo $prodConsulta['nombre_imagen']; ?>" alt="">
                                </td>
                                <td> <?php echo $prodConsulta['nom_producto']; ?> </td>
                                <td class="text-center"> <?php echo $prodConsulta['precio']; ?> </td>
                                <td> <?php echo $prodConsulta['descripcion']; ?> </td>
                                <td class="text-center"> <?php echo $prodConsulta['existencia']; ?> </td>
                                <td class="text-center"> <?php echo $prodConsulta['estado']; ?> </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Launch static backdrop modal
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>