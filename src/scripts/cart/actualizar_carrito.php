<?php
use MyApp\data\Database;

require("../../../vendor/autoload.php");

$db = new Database;

session_start();

$id_usuario = $_SESSION['id_usuario'];

$sql_carrito = "SELECT detalle_orden.*, productos.*, ip.*
                FROM detalle_orden
                JOIN productos ON detalle_orden.id_producto = productos.id_producto
                LEFT JOIN img_productos ip ON productos.id_producto = ip.id_producto
                WHERE detalle_orden.id_usuario = '$id_usuario'";
$carrito_all = $db->seleccionarDatos($sql_carrito);

if (empty($carrito_all)) {
    // Si el carrito está vacío, imprimir el mensaje correspondiente
    $html = '
    <div class="d-flex align-items-center gap-3 colspan-5" style="background:transparent;">
                <img src="../../../assets/img/oops.png" alt="" style="background:transparent" width="72px">
                <span style="background:transparent; color:white">No has agregado <br> nada a tu carrito</span>
            </div>';
    $totalHtml = ''; // Dejar el total vacío si no hay elementos en el carrito
} else {
    // Si el carrito no está vacío, generar el HTML para la tabla y el total
    $html = '';
    foreach ($carrito_all as $producto) {
        $html .= '<tr data-id="' . $producto['id_producto'] . '">';
        $html .= '<td style="background:transparent"><img style="width:80px; border-radius:20px; heigth:auto" src="/panaderia/assets/img/images_product/' . $producto['nombre_imagen'] . '" alt=""></td>';
        $html .= '<td style="background:transparent; color:white">' . $producto['nom_producto'] . '<hr style="opacity:0.1; color:white"></td>';
        $html .= '<td style="background:transparent; color:white">' . "$" . number_format($producto['precio'], 2, ',', '.') . '</td>';
        $html .= '<td style="background:transparent; color:white"><input style="background:transparent;color:white; border:none; outline:none; text-align:center" type="number" value="' . $producto['cantidad'] . '"  min="1" required></td>';
        $html .= '<td style="background:transparent; color:white"><button type="button" class="btn btn-danger">Eliminar</button></td>';
        $html .= '</tr>';
    }

    $total = 0;
    foreach ($carrito_all as $producto) {
        $total += $producto['cantidad'] * $producto['precio'];
        $num_orden = $producto['id_orden'];
    }

    $totalHtml = '<h4 class="card-title text-warning border-bottom ps-3 pb-4">Total del carrito</h4>';
    $totalHtml .= '<div class="text-light d-flex justify-content-between my-2 p-2">';
    $totalHtml .= '<span>Número de órden:</span>';
    $totalHtml .= '<span>' . ((!empty($num_orden)) ?  $num_orden : '-') . '</span>';
    $totalHtml .= '</div>';
    $totalHtml .= '<div class="text-light d-flex justify-content-between my-2 p-2">';
    $totalHtml .= '<span>Tipo de entrega:</span>';
    $totalHtml .= '<span>' . ((!empty($tipo_entrega)) ? $tipo_entrega : 'Por definir') . '</span>';
    $totalHtml .= '</div>';
    $totalHtml .= '<div class="text-light d-flex justify-content-between my-2 p-2">';
    $totalHtml .= '<span>Fecha de emisión:</span>';
    $totalHtml .= '<span>' . ((!empty($fecha_emision)) ? $fecha_emision : '0-0-0000') . '</span>';
    $totalHtml .= '</div>';
    $totalHtml .= '<br>';
    $totalHtml .= '<div class="text-light d-flex justify-content-between border-top my-2 p-2 mt-4">';
    $totalHtml .= '<span>Total:</span>';
    $totalHtml .= '<span> $' . ((!empty($total)) ? number_format($total, 2, ',', '.') : '$9.00') . '</span>';
    $totalHtml .= '</div>';
}

echo json_encode(['carrito' => $html, 'total' => $totalHtml]);
?>
