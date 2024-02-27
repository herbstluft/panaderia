<?php
// ... (Tu código anterior)

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

?>

<!-- Este script dibuja la gráfica de las ventas que se hicieron en los días de la semana -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuración de datos para el gráfico de barras de días de la semana
        var ctx = document.getElementById('ventas_dia_semana').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels_dia) ?>,
                datasets: [{
                    label: 'Ventas de esta semana',
                    data: <?= json_encode(array_values($datos_dia)) ?>,
                    backgroundColor: 'rgba(180, 0, 212, 0.2)',
                    borderColor: 'rgba(144, 0, 170, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false, // Desactiva el ajuste automático del aspecto
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Días de la Semana'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Ventas'
                        }
                    }
                }
            }
        });

    });
</script>

<div class="responsive-dia">
    <canvas style="overflow-x: auto;" id="ventas_dia_semana"></canvas>
</div>