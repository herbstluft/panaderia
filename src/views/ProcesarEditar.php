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
    
   $id= $_SESSION['user'];

   $nombre = $db->sanitize($_POST['nombre']);
   $apellido = $db->sanitize($_POST['apellido']);
   $correo = $db->sanitize($_POST['correo']);
   $telefono = $db->sanitize($_POST['telefono']);
   $contrasena = ($_POST['contrasena']);

   $sql_original = "SELECT contrasena FROM usuarios WHERE id_persona = $id";
   $resultado = $db->ejecutarConsulta($sql_original);
   $contrasena_original = $resultado->fetchColumn();


   $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);


   $sql_usuarios = "UPDATE usuarios SET telefono = '$telefono', contrasena = '$contrasena_hash' WHERE id_persona = $id";

   $sql_personas = "UPDATE personas SET nombre = '$nombre', apellido = '$apellido', correo = '$correo' WHERE id_persona = $id";


   $resultadousuarios=$db->ejecutarConsulta($sql_usuarios);

   $resultadopersonas=$db->ejecutarConsulta($sql_personas);


   $contrasena_cambiada = password_verify($contrasena, $contrasena_original);
   

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
