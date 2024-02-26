<?php
// Requerir la clase Database
use MyApp\data\Database;

// Requerir el autoload de Composer
require("../../../vendor/autoload.php");

// Iniciar la sesión
session_start();

// Obtener el ID de usuario de la sesión
$id_usuario = $_SESSION['id_usuario'];

// Verificar si se recibieron los datos esperados por POST
if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    // Obtener el ID del producto y la nueva cantidad desde el formulario
    $id_producto = $_POST['id_producto'];
    $nuevaCantidad = $_POST['cantidad'];

    // Crear una instancia de la clase Database
    $db = new Database;

    // Actualizar la cantidad del producto en la base de datos
    $sql_actualizar_cantidad = "UPDATE detalle_orden SET cantidad = $nuevaCantidad WHERE id_usuario = $id_usuario AND id_producto = $id_producto";
    $success = $db->ejecutarConsulta($sql_actualizar_cantidad);

    // Enviar una respuesta JSON indicando si la actualización fue exitosa
    echo json_encode(array('success' => $success));
} else {
    // Si no se recibieron los datos esperados, enviar una respuesta de error
    echo json_encode(array('success' => false, 'message' => 'No se recibieron los datos esperados'));
}
?>
