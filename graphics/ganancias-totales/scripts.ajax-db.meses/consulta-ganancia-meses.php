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

echo json_encode($ventas);
