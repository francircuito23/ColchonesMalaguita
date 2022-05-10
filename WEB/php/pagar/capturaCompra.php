<?php

    require '../configCarro.php';
    require '../../../loginUsus/database.php';

    $db = new Database();
    $con = $db->connect();

    $json = file_get_contents('php://input');

    $datos = json_decode($json, true);

    print_r($datos);

    if(is_array($datos)){

        $id_transaccion = $datos['detalles']['id'];
        $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
        $status = $datos['detalles']['status'];
        $fecha = $datos['detalles']['update_time'];
        $fechaNueva = date('Y-m-d H:i:s', strtotime($fecha));
        $email = $datos['detalles']['payer']['email_address'];
        $id_cliente = $datos['detalles']['payer']['payer_id'];

        $sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?)");

        $sql->execute([$id_transaccion, $fechaNueva, $status, $email, $id_cliente, $total]);
        $id = $con->lastInsertId();

        //detalles de la compra (lo que compró el cliente)
        
        if($id > 0){

            //consultamos como queramos (normalmente comprobamos si existe productos en el carrito en la sesión actual) 
            //y le damos el valor al array productos para ver si hay productos en el carrito

            $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

            //seleccionamos y añadimos a la tabla los detalles de la compra los productos que ha comprado

            if($productos != null){

                foreach ($productos as $clave => $cantidad){

                    // añadir precio y medida a la consulta
                    $sql = $con->prepare("SELECT id_producto, nombre FROM products WHERE id_producto=? AND estado=1"); 
                    
                    $sql->execute([$clave]);

                    $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                    $precio = $row_prod['precio'];
                    $descuento = $row_prod['descuento'];
                    $precio_desc = $precio - (($precio * $descuento) / 100);

                    $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES (?,?,?,?,?)");

                    $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad]);
                }
                //incluir la ruta para enviar el mail
                //include 'rutamail';
            }
            unset($_SESSION['carrito']);
        }


    }

?>