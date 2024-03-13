<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;

$sql_ventas_recientes = "SELECT p.nombre, DATE(do.fecha_detalle) AS fecha
                         FROM detalle_orden do
                         JOIN usuarios u
                         ON u.id_usuario = do.id_usuario
                         JOIN personas p
                         ON p.id_persona = u.id_persona
                         WHERE do.estatus = 2
                         ORDER BY fecha_detalle DESC";

$consulta_ventas_recientes = $db->seleccionarDatos($sql_ventas_recientes);

$resultado_ventas_recientes = array();

foreach ($consulta_ventas_recientes as $ventas_recientes) {
    $venta = array(
        'nombre' => $ventas_recientes['nombre'],
        'fecha' => $ventas_recientes['fecha']
    );
    $resultado_ventas_recientes[] = $venta;
}

echo json_encode(($resultado_ventas_recientes));
