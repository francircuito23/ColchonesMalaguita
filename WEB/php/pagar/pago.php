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

</body>
</html>