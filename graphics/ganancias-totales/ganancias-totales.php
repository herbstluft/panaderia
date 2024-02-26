<?php
$sql_ventas_totales = "SELECT SUM(do.cantidad * p.precio) as ventasTotales
                       FROM detalle_orden do
                       JOIN productos p
                       ON do.id_do = p.id_producto
                       WHERE do.estatus = 2";
$ventas_totales = $db->seleccionarDatos($sql_ventas_totales);

foreach ($ventas_totales as $ventasTotales) {
?>

    <div class="h-100 card position-relative bg-transparent">
        <div class="card-body p-0">
            <div class="card-title position-absolute m-0 p-3 h4">Ganancias totales</div>
            <div class="card-text w-100 h-100 d-flex justify-content-center align-items-center fs-2">
                <span class="text-success me-2">$</span> <?php echo ' ' . $ventasTotales['ventasTotales']; ?>
            </div>
        </div>
    </div>
<?php
}
?>