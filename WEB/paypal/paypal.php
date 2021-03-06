<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal</title>
    <link rel="stylesheet" href="paypal.css">
    <script src="https://www.paypal.com/sdk/js?client-id=Ae26Wo0DGc-aTnLARCnJWud5tdWqHeRD4_rT5DthyDSeNh6ypkC5-hNB1LxCyJspBY8Q46GA4hU37lF9&currency=EUR"></script>
</head>
<body>
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
                            value: 1000000
                        }
                    }]
                });
            },

            onApprove: function(datos, actions){
                actions.order.capture().then(function (detalles){

                    
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