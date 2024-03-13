<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;

$sql_ventas_totales = "SELECT SUM(do.cantidad * p.precio) as ventasTotales
                       FROM detalle_orden do
                       JOIN productos p
                       ON do.id_do = p.id_producto
                       WHERE do.estatus = 2";
$ventas_totales = $db->seleccionarDatos($sql_ventas_totales);

$resultado_ventas;

foreach ($ventas_totales as $ventas) {
    $resultado_ventas = $ventas['ventasTotales'];
}

echo  json_encode(['ventasTotales' =>  $resultado_ventas]);
