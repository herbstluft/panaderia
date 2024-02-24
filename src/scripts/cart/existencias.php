<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;
session_start();

if ($_POST['id_producto']) {
    $id_producto = $_POST['id_producto'];
    // Consulta SQL para obtener la existencia del producto
    $sql = "SELECT existencia FROM productos WHERE id_producto = $id_producto";
    $res_existencia = $db->seleccionarDatos($sql);

    // Si obtienes solo un resultado, lo devuelves directamente
    if ($res_existencia) {
        $existencia = $res_existencia[0]['existencia'];
        // Devolver la existencia en formato JSON
        echo json_encode($existencia);
    }
}
?>
