<?php
session_start();
use MyApp\data\Database;
require("../../vendor/autoload.php");
$db = new Database;

if(isset($_POST['guardar']))
{
    if(strlen($_POST['nombre']) >=1 &&
    strlen($_POST['apellido']) >=1 &&
    strlen($_POST['correo']) >=1 &&
    strlen($_POST['telefono']) >=1 &&
    strlen($_POST['contrasena']) >=1)
    
   // Asume que tienes un ID de usuario para saber qué fila actualizar
   $id= $_SESSION['user'];

   // Sanitiza las entradas
   $nombre = $db->sanitize($_POST['nombre']);
   $apellido = $db->sanitize($_POST['apellido']);
   $correo = $db->sanitize($_POST['correo']);
   $telefono = $db->sanitize($_POST['telefono']);
   $contrasena = ($_POST['contrasena']);

   // Obtiene la contraseña original del usuario
   $sql_original = "SELECT contrasena FROM usuarios WHERE id_persona = $id";
   $resultado = $db->ejecutarConsulta($sql_original);
   $contrasena_original = $resultado->fetchColumn();

   // Hash de la contraseña
   $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

   // Crea la consulta SQL para la tabla 'usuarios'
   $sql_usuarios = "UPDATE usuarios SET telefono = '$telefono', contrasena = '$contrasena_hash' WHERE id_persona = $id";
   // Crea la consulta SQL para la tabla 'personas'
   $sql_personas = "UPDATE personas SET nombre = '$nombre', apellido = '$apellido', correo = '$correo' WHERE id_persona = $id";

   // Ejecuta las consultas
   $resultadousuarios=$db->ejecutarConsulta($sql_usuarios);
   $resultadopersonas=$db->ejecutarConsulta($sql_personas);

   // Comprueba si la contraseña ha cambiado
   $contrasena_cambiada = password_verify($contrasena, $contrasena_original);

   // Si la contraseña se actualizó correctamente y ha cambiado, entonces destruye la sesión
   if($resultadousuarios && $contrasena_cambiada) {
    header("Location: /panaderia/index.php");

   } else if ($resultadousuarios && $resultadopersonas) {
       header("Location: /panaderia/index.php");
       session_destroy();
       header("Location: /panaderia/src/views/user/login.php"); // Redirige al usuario a la página de inicio de sesión
   } else {
       echo '<script type="text/javascript">';
       echo 'alert("Tus datos NO se registraron");';
       echo '</script>';  
   }
}
?>
