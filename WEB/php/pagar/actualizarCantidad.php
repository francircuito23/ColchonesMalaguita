<?php 

    session_start();

    //si existe el id del producto creamos una sesion de carrito
    //y le vamos sumando 1 si existe

    if(isset($_POST['action'])){

        $action = $_POST['action'];

        $id = isset($_POST['id']) ? $_POST['id'] : 0;

        if ($action == 'agregar'){
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
            $_SESSION['carrito']['productos'][$id] = $cantidad;
            $datos['ok'] = true;
        }
        else{
            $datos['ok'] = eliminar($id);
        }
        // else{
        //     $datos['ok'] = false;
        // }

        // $datos['ok'] = true;

    }else{
        $datos['ok'] = false;
    }

    echo json_encode($datos);

    function eliminar($id){

        if ($id > 0){

            if (isset($_SESSION['carrito']['productos'][$id])){
                
                unset($_SESSION['carrito']['productos'][$id]);
                
                return true;

            }else{
                return false;
            }
        }
    }

    //hacer función o lo que sea para que cambie el precio y lo que tenga que cambiar

?>