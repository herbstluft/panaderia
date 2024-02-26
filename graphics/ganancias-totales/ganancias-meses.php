<?php

// Aquí se hace la consulta para obtener las ventas totales ordenadas por mes
$sql_ventas_mes = "SELECT do.id_do, SUM(do.cantidad) AS total_cantidad, p.nom_producto, p.precio, SUM(do.cantidad * p.precio) AS total_precio,
               YEAR(do.fecha_detalle) AS anio, MONTH(do.fecha_detalle) AS mes, DAY(do.fecha_detalle) AS dia
               FROM detalle_orden do
               JOIN productos p 
               ON do.id_producto = p.id_producto 
               WHERE do.estatus = 2
               GROUP BY do.id_do, p.nom_producto, p.precio, mes";

$ventas = $db->seleccionarDatos($sql_ventas_mes);

// Datos para mostrar los meses en el gráfic
$labels = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

// Inicializar un array para almacenar los totales de ventas por mes
$datos_meses = array_fill_keys($labels, 0);

// Llenar el array con los totales de ventas correspondientes
foreach ($ventas as $v_meses) {
    $mes = $labels[$v_meses['mes'] - 1]; // Resta 1 por cómo funcionan los índices del array
    $datos_meses[$mes] += $v_meses['total_precio'];
}
?>

<!-- Este script dibuja la gráfica de las ventas que se hicieron en los 12 meses -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuración de datos para el gráfico
        var ctx = document.getElementById('ventas_meses').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Total Ventas',
                    data: <?= json_encode(array_values($datos_meses)) ?>,
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
                            text: 'Meses'
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
    <canvas style="overflow-x: auto;" id="ventas_meses"></canvas>
</div>