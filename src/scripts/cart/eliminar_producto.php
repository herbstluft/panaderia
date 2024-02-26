<?php
// Requerir la clase Database
use MyApp\data\Database;

// Requerir el autoload de Composer
require("../../../vendor/autoload.php");

// Iniciar la sesión
session_start();

// Obtener el ID de usuario de la sesión
$id_usuario = $_SESSION['id_usuario'];

// Verificar si se recibió el ID del producto esperado por POST
if (isset($_POST['id_producto'])) {
    // Obtener el ID del producto desde el formulario
    $id_producto = $_POST['id_producto'];

    // Crear una instancia de la clase Database
    $db = new Database;

    // Eliminar el producto del carrito en la base de datos
    $sql_eliminar_producto = "DELETE FROM detalle_orden WHERE id_usuario = $id_usuario AND id_producto = $id_producto";
    $success = $db->ejecutarConsulta($sql_eliminar_producto);

    // Enviar una respuesta JSON indicando si la eliminación fue exitosa
    echo json_encode(array('success' => $success));
} else {
    // Si no se recibió el ID del producto esperado, enviar una respuesta de error
    echo json_encode(array('success' => false, 'message' => 'No se recibió el ID del producto'));
}
?>
