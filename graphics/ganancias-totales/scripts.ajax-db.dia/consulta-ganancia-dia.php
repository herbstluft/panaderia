<?php

use MyApp\data\Database;

require("../../../vendor/autoload.php");
$db = new Database;

// Consulta para obtener las ventas diarias de la semana actual
$sql_ventas_dia = "SELECT DATE(fecha_detalle) AS fecha,
                   SUM(cantidad * precio) AS total_ventas
                   FROM detalle_orden do
                   JOIN productos p ON do.id_producto = p.id_producto
                   WHERE YEARWEEK(fecha_detalle, 1) = YEARWEEK(NOW(), 1)
                   AND do.estatus = 2
                   GROUP BY DATE(fecha_detalle)
                   ORDER BY DATE(fecha_detalle)";

$ventas_dia = $db->seleccionarDatos($sql_ventas_dia);

// Datos para mostrar los días de la semana en el gráfico
$labels_dia = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

// Inicializar un array para almacenar los totales de ventas por día
$datos_dia = array_fill_keys($labels_dia, 0);

// Llenar el array con los totales de ventas correspondientes
foreach ($ventas_dia as $v_dia) {
    // Obtener el día de la semana correspondiente a la fecha
    $dia_semana = date('w', strtotime($v_dia['fecha']));

    // Asignar el total de ventas al día correspondiente
    $datos_dia[$labels_dia[$dia_semana]] = $v_dia['total_ventas'];
}

echo json_encode(['labels_dias' => array_values($labels_dia), 'datos_dias' => array_values($datos_dia)]);
