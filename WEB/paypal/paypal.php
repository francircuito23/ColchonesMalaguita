<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal</title>
    <link rel="stylesheet" href="css/paypal.css">
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

                document.body.appendChild(divOpaco).appendChild(divCancel);

                // divOpaco.className = "opaco";

                document.body.style.backgroundColor = "rgba(117, 106, 106, 0.644)";

                divCancel.textContent = "Pago cancelado";

                divCancel.className = "cancelado";

            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>