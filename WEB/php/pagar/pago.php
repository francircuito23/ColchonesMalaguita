<?php

    require '../configCarro.php';
    $total = 1;
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
</head>
<body>
    
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
    

    <div id="paypal-button-container"></div>

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







    
    <?php

        require_once('../../../vendor/autoload.php');

        $monei = new Monei\MoneiClient('pk_test_2c322110-b178-4fdc-8b1b-d6a375eac42b');
        $monei->payments->create([
        'amount' => 110,
        'currency' => 'EUR',
        'orderId' => '14379133960355',
        'description' => 'Test Shop - #14379133960355',
        'customer' => [
            'email' => 'john.doe@microapps.com'
        ],
        'callbackUrl' => 'https://example.com/checkout/callback'
        ]);

    ?>
    
    <form action="https://secure.monei.com/payments/af6029f80f5fc73a8ad2753eea0b1be0/confirm" method="post"id="payment-form">
        <div id="bizum_container">
            <script>
                var bizum = monei.Bizum({
                    paymentId: 'af6029f80f5fc73a8ad2753eea0b1be0',
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
                bizum.render('#bizum');
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

