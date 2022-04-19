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

