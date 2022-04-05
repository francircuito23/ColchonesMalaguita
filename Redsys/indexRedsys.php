<?php
    if ($_POST['submitPayment']) {
        include "api/apiRedsys.php";  
        $miObj = new RedsysAPI;
    
        $amount = $_POST['amount'];    
        $url_tpv = 'https://sis-t.redsys.es:25443/sis/realizarPago';
        $version = "HMAC_SHA256_V1"; 
        $clave = 'TU CLAVE DE COMERCIO'; //poner la clave SHA-256 facilitada por el banco
        $name = 'TU NOMBRE DE COMERCIO';
        $code = 'TU CODIGO DE COMERCIO';
        $terminal = '1';
        $order = date('ymdHis');
        $amount = $amount * 100;
        $currency = '978';
        $consumerlng = '001';
        $transactionType = '0';
        $urlMerchant = 'http://your-domain.com/';
        $urlweb_ok = 'http://your-domain.com/tpv_ok.php';
        $urlweb_ko = 'http://your-domain.com/tpv_ko.php';
        $bizum = "z";
    
        $miObj->setParameter("DS_MERCHANT_AMOUNT", $amount);
        $miObj->setParameter("DS_MERCHANT_CURRENCY", $currency);
        $miObj->setParameter("DS_MERCHANT_ORDER", $order);
        $miObj->setParameter("DS_MERCHANT_MERCHANTCODE", $code);
        $miObj->setParameter("DS_MERCHANT_TERMINAL", $terminal);
        $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $transactionType);
        $miObj->setParameter("DS_MERCHANT_MERCHANTURL", $urlMerchant);
        $miObj->setParameter("DS_MERCHANT_URLOK", $urlweb_ok);      
        $miObj->setParameter("DS_MERCHANT_URLKO", $urlweb_ko);
        $miObj->setParameter("DS_MERCHANT_MERCHANTNAME", $name); 
        $miObj->setParameter("DS_MERCHANT_CONSUMERLANGUAGE", $consumerlng);    
        $miObj->setParameter("DS_MERCHANT_PAYMETHODS", $bizum);    
    
        $params = $miObj->createMerchantParameters();
        $signature = $miObj->createMerchantSignature($clave);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redsys</title>
</head>
<body>
    <form id="realizarPago" action="<?php echo $url_tpv; ?>" method="post">
    Ds_Merchant_SignatureVersion<input type='text' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
    Ds_Merchant_MerchantParameters<input type='text' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
    Ds_Merchant_Signature<input type='text' name='Ds_Signature' value='<?php echo $signature; ?>'>
    <label for="amount">Cantidad</label>
    <input type="text" id="amount" name="amount" class="form-control" placeholder="Por ejemplo: 50.00">
    <input class="btn btn-lg btn-primary btn-block" name="submitPayment" type="submit" value="Pagar">
    </form>

    <script>
        $(document).ready(function () {
            $("#realizarPago").submit();
        });
    </script>

    <!-- <form class="form-amount" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="post">
        <div class="form-group">

        </div>
        <input class="btn btn-lg btn-primary btn-block" name="submitPayment" type="submit" value="Pagar">
    </form> -->
</body>
</html>