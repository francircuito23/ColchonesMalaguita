<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crearCuenta.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Registrate!</title>
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="post">
                    <div class="login__field">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="name" class="login__input" placeholder="Nombre Usuario">
                    </div>
                    <div class="login__field">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <ion-icon name="lock-open-outline"></ion-icon>
                        <input type="password" name="password" class="login__input" placeholder="Contraseña">
                    </div>
                    <button name="register" type="submit" class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>			
                </form>
                <div class="social-login">
                    <h3>log in via</h3>
                    <div class="social-icons">
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    <?php 
        include("../php/registrar.php");
    ?>
</body>
</html>