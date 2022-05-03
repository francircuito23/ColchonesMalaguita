<?php

    $numCarrito = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }

    session_start();
    $producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <title>Caja</title>
</head>
<body>
    <main>
        <!-- si el carrito tiene productos -->
        <section class="boton-contenedor">
            <article>
                <a href="pago.php">Realizar pago</a>
            </article>
        </section>

    </main>
</body>
</html>