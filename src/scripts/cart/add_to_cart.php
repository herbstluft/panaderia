<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    session_start();

    if(isset($_POST['id_producto']) && isset($_POST['cantidad'])){
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $id_usuario = $_SESSION['user'];


        //verificar si no existe un carrito del usuario
        $sql="select * from orden where id_usuario=$id_usuario";
        $response = $db->seleccionarDatos($sql);

        //si esta vacio no hay un carrito creado y se crea uno
        if(empty($response)){
            $sql_add_cart_new = "INSERT INTO `orden` (`fecha`, `id_usuario`) VALUES (current_timestamp(), $id_usuario)";
            $db->ejecutarConsulta($sql_add_cart_new);

             //verificar si no existe un carrito del usuario
            $sql="select * from orden where id_usuario=$id_usuario";
            $response2 = $db->seleccionarDatos($sql);

            //sacar el id de la orden
            foreach($response2 as $id)
            $id_orden = $id['id_orden'];

            $sql_insert_to_cart = "INSERT INTO `detalle_orden` (`id_producto`, `cantidad`, `id_usuario`, `estatus`, `fecha_detalle`, `id_orden`) VALUES ($id_producto, $cantidad, $id_usuario, 0, current_timestamp(), $id_orden)";
            $db->ejecutarConsulta($sql_insert_to_cart);

        }
        else{
              //sacar el id de la orden
              foreach($response as $id)
              $id_orden = $id['id_orden'];

              //verificar si existe el producto en el carrito
              $sql = "SELECT * from detalle_orden WHERE id_producto = $id_producto";
              $response_exist = $db->seleccionarDatos($sql);

              //si no existe ese producto, agregar
              if(empty($response_exist)){
              $sql_insert_to_cart = "INSERT INTO `detalle_orden` (`id_producto`, `cantidad`, `id_usuario`, `estatus`, `fecha_detalle`, `id_orden`) VALUES ($id_producto, $cantidad, $id_usuario, 0, current_timestamp(), $id_orden)";
              $db->ejecutarConsulta($sql_insert_to_cart);
              }
              //si existe hacer un incremento
              else{
                foreach($response_exist as $cant)
                $cantidad_actual = $cant['cantidad'];
                $nueva_cantidad = $cantidad_actual + $cantidad;
                
                $sql_update_cantidad = "UPDATE `detalle_orden` SET `cantidad` = '$nueva_cantidad' WHERE `detalle_orden`.`id_do` = $id_producto;";
                $db->ejecutarConsulta($sql_update_cantidad);
              }
  
              
        }
    }
?>