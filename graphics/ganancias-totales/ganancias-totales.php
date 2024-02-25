<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

// Hacer la consulta para obtener la fecha de venta y el monto total de las ventas
$sql_ventas = "SELECT do.id_do, SUM(do.cantidad) AS total_cantidad, p.nom_producto, p.precio, SUM(do.cantidad * p.precio) AS total_precio,
               YEAR(do.fecha_detalle) AS anio, MONTH(do.fecha_detalle) AS mes, DAY(do.fecha_detalle) AS dia
               FROM detalle_orden do
               JOIN productos p 
               ON do.id_producto = p.id_producto 
               WHERE do.estatus = 2
               GROUP BY do.id_do, p.nom_producto, p.precio, anio, mes, dia";

$ventas = $db->seleccionarDatos($sql_ventas);

// Se crea un array para después pasarle los datos de la consulta
$datos = array();
$datos[] = array('Date', 'Sales');

// Se pasan los datos de la consulta a los índices del array
foreach ($ventas as $ventas_totales) {
    $datos[] = array($ventas_totales['anio'] . '-' . $ventas_totales['mes'] . '-' . $ventas_totales['dia'], $ventas_totales['total_precio']);
}

// El array se convierte en formato JSON para poder leerlo desde el script para poder rellenar la gráfica
echo json_encode($datos);

exit();
