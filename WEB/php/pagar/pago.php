<?php

    require '../../../loginUsus/database.php';
    require '../configCarro.php';

    $numCarrito = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $numCarrito = count($_SESSION['carrito']['productos']);
    }

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    print_r($_SESSION);

    $db = new Database();

    //array que guarda los productos de la sesión
    $lista_carrito = array();

    if ($productos != null){ //de cada producto recorremos los valores y contamos con cantidad cuántos productos hay del mismo
        foreach ($productos as $clave => $cantidad){
            $sql = $db->connect()->prepare("SELECT id_producto, nombre, categoria, img, $cantidad AS cantidad FROM products WHERE id_producto=? AND estado=1");
            $sql->execute([$clave]);
            $lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC);
        }
    }else{
        header('Location: ../../html/home.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../paypal/paypal.css">
    <title>Pago</title>
    <script src="https://js.monei.com/v1/monei.js"></script>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="pago.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="../../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>

    <main>

        <div class="container">

            <div class="row">
                <div class="col-6">
                    <h4>Detalles del pago</h4>
                    <div id="paypal-button-container"></div>
                </div>

                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if($lista_carrito == null){

                                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';

                                }else{

                                    $total=10;
                                    foreach($lista_carrito as $producto){

                                        $id = $producto['id_producto'];
                                        $nombre = $producto['nombre'];
                                        $categoria = $producto['categoria'];
                                        $img = $producto['img'];
                                        // $cantidad = $producto['cantidad'];

                                    ?>
                                <tr>

                                    <td><img src="<?php echo '../../img/'.$img; ?>" alt=""> <?php echo $nombre; ?></td>
                                    <td class="text-end">
                                        10€
                                    </td>

                                </tr>

                                <?php } ?>

                                <tr>
                                    <td colspan="2" class="h2 text-end total"> TOTAL
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="h2 text-end">
                                        <p class="h3 text-end total-precio" id="total"><?php echo number_format($total, 2, '.', ','); ?> <?php echo MONEDA; ?></p>
                                    </td>
                                </tr>
                            
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- si el carrito tiene productos -->
        <?php if ($lista_carrito != null){ ?> 
            <section class="boton-contenedor">
                <article>
                    <a href="pago.php">Realizar pago</a>
                </article>
            </section>
        <?php } ?>

    </main>

    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

    <!-- Botones paypal -->

    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(datos, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            // meter en el valor el precio total de todo lo que vaya a comprar en el carrito
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },

            onApprove: function(datos, actions){
                let URL = 'capturaCompra.php';
                actions.order.capture().then(function (detalles){

                    console.log(detalles);

                    let url = 'capturaCompra.php';

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    }).then(function(response){
                        //información de pago confirmado
                    })
                });
            },

            onCancel: function(datos){
                //alert("Pago cancelado");
                var divCancel = document.createElement("div");
                var divOpaco = document.createElement("div");
                var titulo = document.createElement("h2");
                var texto = document.createElement("p");
                var botonAceptar = document.createElement("button");
                
                titulo.textContent = "Pago Cancelado";
                texto.textContent = "Su pago ha sido cancelado";
                botonAceptar.textContent = "Aceptar";

                document.body.appendChild(divOpaco).appendChild(divCancel).appendChild(titulo);
                
                divCancel.appendChild(texto);
                divCancel.appendChild(botonAceptar);

                divOpaco.className = "opaco";
                divCancel.className = "cancelado";

                botonAceptar.addEventListener('click', () => {
                    document.body.removeChild(divOpaco);

                    while(divOpaco.hasChildNodes){
                        divOpaco.removeChild(divOpaco.firstChild);
                    }
                    
                });

            }
        }).render('#paypal-button-container');

    </script>

    <!-- Api Monei Botón Bizum -->
    
    <?php

        require_once('../../../vendor/autoload.php');

        $monei = new Monei\MoneiClient('pk_test_dadf79fff60c992455e0ec14710ffc47');
        $monei->payments->create([
            'amount' => 110, // 1.10 EUR
            'orderId' => '14379133960355',
            'currency' => 'EUR',
            'paymentToken' => '7cc38b08ff471ccd313ad62b23b9f362b107560b',
            'callbackUrl' => 'https://example.com/checkout/callback',
            'completeUrl' => 'https://example.com/checkout/complete'
        ]);

        print_r($monei);

    ?>
    
    <form action="https://secure.monei.com/payments/358d8e15-3ff8-4445-a306-fab/confirm" method="post"id="payment-form">
        <div id="bizum_container">
            <script>
                var bizum = monei.Bizum({
                    paymentId: '358d8e15-3ff8-4445-a306-fab',
                    amount: 0.1,
                    onSubmit(result) {
                        if (result.error) {
                        // Inform the user if there was an error.
                        } else {
                        // Confirm payment using the token.
                            moneiTokenHandler(result.token);
                        }
                    },
                    onError(error) {
                        console.log(error);
                    },
                
                });

                // render Component on the page
                bizum.render('#bizum_container');
            </script>
        </div>
    </form>

    <script>
        // Confirm the payment
        function moneiTokenHandler(token) {
            var paymentForm = document.getElementById('payment-form');
            // Insert the token ID into the form so it gets submitted to the server
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentToken');
            hiddenInput.setAttribute('value', token);
            paymentForm.appendChild(hiddenInput);

            // Submit the form
            paymentForm.submit();
        }
    </script>

</body>
</html>

