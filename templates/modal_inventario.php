<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $queryProducto = "SELECT p.*, ip.nombre_imagen
                        FROM productos p
                        INNER JOIN img_productos ip
                        ON p.id_producto = ip.id_producto
                        WHERE id = $id";
    $producto = $db->ejecutarConsulta($queryProducto);
    foreach ($producto as $prodConsulta) {
        include_once('../../../templates/modal_inventario.php');
    }
}
