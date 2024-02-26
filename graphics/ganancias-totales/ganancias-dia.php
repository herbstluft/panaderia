<?php
// ... (Tu código anterior)

// Aquí se hace la consulta para obtener las ventas totales por día de la semana
$sql_ventas_dia = "SELECT 
                      DATE(fecha_detalle) AS fecha,
                      SUM(cantidad) AS ventas_totales
                  FROM detalle_orden
                  WHERE WEEK(fecha_detalle) = WEEK(NOW())
                  AND estatus = 2
                  GROUP BY DATE(fecha_detalle)";

$ventas_dia = $db->seleccionarDatos($sql_ventas_dia);

// Datos para mostrar las fechas y días de la semana en el gráfico
$labels_fecha = array_column($ventas_dia, 'fecha');
$datos_ventas = array_column($ventas_dia, 'ventas_totales');
?>

<!-- Este script dibuja la gráfica de las ventas que se hicieron en los días de la semana -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuración de datos para el gráfico de días de la semana y fechas
        var ctx = document.getElementById('ventas_dia_semana').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels_fecha) ?>,
                datasets: [{
                    label: 'Ventas',
                    data: <?= json_encode($datos_ventas) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
                            text: 'Fechas'
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

<div class="responsive">
    <canvas style="overflow-x: auto;" id="ventas_dia_semana"></canvas>
</div>