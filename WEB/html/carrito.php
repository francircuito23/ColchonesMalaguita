<?php 

    session_start();

    //si existe el id del producto creamos una sesion de carrito
    //y le vamos sumando 1 si existe

    if(isset($_POST['id'])){
        $id = $_POST['id'];

            if(isset($_SESSION['carrito']['productos'][$id])){
                $_SESSION['carrito']['productos'][$id] += 1;
            }
            else{
                $_SESSION['carrito']['productos'][$id] = 1;

            }

        $datos['numero']=count($_SESSION['carrito']['productos'][$id]);
        $datos['ok'] = true;

    }else{
        $datos['ok'] = false;
    }
    
    echo json_encode($datos);

?>