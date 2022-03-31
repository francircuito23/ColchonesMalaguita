<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal</title>
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
                            value: 999
                        }
                    }]
                });
            },
            onCancel: function(datos){
                alert("Pago cancelado");
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>