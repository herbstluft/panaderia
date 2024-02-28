<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;

// Aquí se hace la consulta para obtener las ventas totales ordenadas por mes
$sql_ventas_mes = "SELECT do.id_do, SUM(do.cantidad) AS total_cantidad, p.nom_producto, p.precio, SUM(do.cantidad * p.precio) AS total_precio,
               YEAR(do.fecha_detalle) AS anio, MONTH(do.fecha_detalle) AS mes, DAY(do.fecha_detalle) AS dia
               FROM detalle_orden do
               JOIN productos p 
               ON do.id_producto = p.id_producto 
               WHERE do.estatus = 2
               GROUP BY do.id_do, p.nom_producto, p.precio, mes";

$ventas = $db->seleccionarDatos($sql_ventas_mes);

$labels = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

$datos_meses = array_fill_keys($labels, 0);

foreach ($ventas as $v_meses) {
    $mes = $labels[$v_meses['mes'] - 1]; // Resta 1 por cómo funcionan los índices del array
    $datos_meses[$mes] += $v_meses['total_precio'];
}

echo json_encode(['labels' => array_values($labels), 'datos_meses' => array_values($datos_meses)]);
