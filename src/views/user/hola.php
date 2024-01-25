<?php 
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database;

 $sql = "SELECT * from usuarios";
 $users=$db->seleccionarDatos($sql);
 
session_start();

$id=$_SESSION['user'];

$sql="select * from personas inner join usuarios on usuarios.id_persona=personas.id_persona where usuarios.id_usuario=$id";
$res=$db->seleccionarDatos($sql);


foreach($res as $info){

    echo "Bienvenido cosita hermosa bien hecha llamada ". $info['nombre']. ":w";
}

?>
