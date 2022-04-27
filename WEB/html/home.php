<?php
  require '../php/conexion.php';
  require '../../loginUsus/database.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/css//bootstrap.min.css"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/home.js"></script>
    <title>Hipnos Bed</title>
</head>
<body>

  <main>

    <section class="header">
      <header>
        <div class='header__titulo'>
          <h1>Hipnos Bed</h1>
        </div>
        <nav>
          <ul class="header__nav">
            <li><a href="#">Colchones</a></li>
            <li><a href="#">Almohada</a></li>
            <li><a href="#">Somier</a></li>
            <li><a href="#">Accesorios</a></li>
          </ul>
        </nav>
        <div class="header__icons">
          <ul class="header__nav__icons">
            <li><a href="#"><ion-icon name="search-outline"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="person-outline"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="cart-outline"></ion-icon></a></li>
          </ul>
        </div>
        <div class="header__icons__redes">
          <ul class="header__nav__redes">
            <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
          </ul>
        </div>
      </header>
    </section>

    <section class="carrusel">
      <article class="carrusel__imgs">
        <a href="">

        <?php 
            //Escaneo el directorrio de las imagenes
            $imgs=array_slice(scandir("../img/"), 2);

            //Imprimo 
            //Img que se muestra
            // echo("<img src="./img/fadeCarrusel/".$imgs[0]."" alt="bannersCarrusel">");
            echo '<img src="../img/'.$imgs[0].'"/ alt="colchon-1" class=".carrusel__img-1">';

            for ($i=0; $i < count($imgs) ; $i++) { 
              //Imgs por las que alterna el js
              // echo("<img src="./img/fadeCarrusel/".$imgs[$i]."" alt="bannersCarrusel" class="fadeCarruselHiddenImages">"); 
              echo '<img src="../img/'.$imgs[$i].'"/ alt="colchon-'.$i.'" class="fadeCarruselHiddenImages">';

            }
        ?> 
        <!-- <img class=".carrusel__img-1" src="../img/matelas-hastens-800x312.png" alt="colchon-1">
        <img class="fadeCarruselHiddenImages" src="../img/colchon1.jpg" alt="colchon-1">
        <img class="fadeCarruselHiddenImages" src="../img/colchon2.jpg" alt="colchon-3">
        <img class="fadeCarruselHiddenImages" src="../img/colchon3.webp" alt="colchon-4">
        <img class="fadeCarruselHiddenImages" src="../img/matelas-hastens-800x312.png" alt="colchon-1"> -->
        
        </a>
        <!-- <a href="">
          <img class="carrusel__img-1" src="../img/colchon1.jpg" alt="colchon-2">
        </a>
        <a href="">
          <img class="carrusel__img-1" src="../img/colchon2.jpg" alt="colchon-3">
        </a>
        <a href="">
          <img class="carrusel__img-1" src="../img/colchon3.webp" alt="colchon-4">
        </a> -->
      </article>
    </section>

    <section class="productos">
      <div class="productos__titulo">
        <h1>PRODUCTOS HIPNOS</h1>
      </div>
      <div class="productos__botones">
        <!-- <input type="button" value="Colchones Hipnos"> -->
        <a href="">Colchones Hipnos</a>
        <!-- <input type="button" value="Almohadas Hipnos"> -->
        <a href="">Almohadas Hipnos</a>
      </div>

      <div class="productos__header">
        <div class="productos__header-producto">
          <span class="productos__header-producto-titulo">
            Colchones
            <span class="productos__header-producto-titulo-cantidad">
              <!-- cantidad de los productos actuales -->
            </span>
          </span>
        </div>
        <div class="productos__header-producto">
          <span class="productos__header-producto-titulo">
            Almohadas
            <span class="productos__header-producto-titulo-cantidad">
              <!-- cantidad de los productos actuales -->
            </span>
          </span>
        </div>
        <div class="productos__header-producto">
          <span class="productos__header-producto-titulo">
            Somier
            <span class="productos__header-producto-titulo-cantidad">
              <!-- cantidad de los productos actuales -->
            </span>
          </span>
        </div>
        <div class="productos__header-producto">
          <span class="productos__header-producto-titulo">
            Accesorios
            <span class="productos__header-producto-titulo-cantidad">
              <!-- cantidad de los productos actuales -->
            </span>
          </span>
        </div>
      </div>

      <?php

        $queryProductos = mysqli_query($conn, "SELECT nombre, categoria, img, estado FROM `products` WHERE categoria = 'colchones' AND estado = 1");

        $queryAttrProductos = mysqli_query($conn, "SELECT DISTINCT p.*, a.id_producto, a.precio, a.altura, a.ancho, a.descripcion from atributos_productos a inner join products p on a.id_producto = p.id_producto where p.estado = 1");

        $datosAtrr = mysqli_fetch_array($queryAttrProductos);

      ?>

      <div class="productos__reales">
        <?php
          $resultado = mysqli_num_rows($queryProductos);
          
            if($resultado > 0){
              while($datos = mysqli_fetch_array($queryProductos)){
                
        ?>
        <div class="productos__reales-colchones">
          <div class="productos__reales-colchones-imagen">
            <a href="">
              <div class="imagen__colchon">
                <?php

                  // $idProducto = $datos['id_producto'];
                  

                  if($datos['img'] == null){

                    $datos['img'] = "default-placeholder.png";

                  }

                
                ?>
                <!-- codigo php -->
                <img src="<?php echo '../img/'.$datos['img']; ?>" alt="">
              </div>
            </a>
          </div>
          <div class="productos__reales-colchones-descripcion">
            <!-- codigo php -->
            <p>
            <?php
              
          
            ?>
            </p>
          </div>
          <div class="productos__reales-colchones-precio">
            <!-- codigo php -->
            <span>
            <?php
              $queryPrecios = mysqli_query($conn, "SELECT id_producto, precio FROM atributos_productos");
              
              while($datosPrecios = mysqli_fetch_array($queryPrecios)){
                
                $datosPrecios = mysqli_fetch_all($queryPrecios, MYSQLI_ASSOC);

                // print_r($datosPrecios);

                $valuesInsert="-";

                for ($i=0; $i < 4 ; $i++) {

                  if(($datosPrecios[$i]['precio'] == 172.99) || ($datosPrecios[$i]['precio'] == 199.99)){
                    echo $valuesInsert;
                    $valuesInsert = substr_replace($valuesInsert, "", -1);
                  }
                  else{
                    echo $datosPrecios[$i]['precio']; 
                  }
                  
                }
              
              }      
            ?>
            </span>
          </div>
          <div class="productos__reales-colchones-titulo">
            <!-- codigo php -->
            <h1><?php echo $datos['nombre']; ?></h1> 
          </div>
        </div>          
        <?php
      
          }
            } 

        ?>
      </div>

      <?php

        $queryAlmohadas = mysqli_query($conn, "SELECT nombre, categoria, img, estado FROM `products` WHERE categoria = 'almohadas' AND estado = 1");

      ?>

      <div style="display: none;" class="productos__reales">
        <?php
          $resultado = mysqli_num_rows($queryAlmohadas);
          
            if($resultado > 0){
              while($datosAlmohadas = mysqli_fetch_array($queryAlmohadas)){
                
        ?>
        <div class="productos__reales-almohadas">
          <div class="productos__reales-almohadas-imagen">
            <a href="">
              <div class="imagen__almohada">
                <?php

                  // $idProducto = $datos['id_producto'];
                  

                  if($datosAlmohadas['img'] == null){

                    $datosAlmohadas['img'] = "default-placeholder.png";

                  }

                
                ?>
                <!-- codigo php -->
                <img src="<?php echo '../img/'.$datosAlmohadas['img']; ?>" alt="">
              </div>
            </a>
          </div>
          <div class="productos__reales-almohadas-descripcion">
            <!-- codigo php -->
            <p>
            <?php
              
          
            ?>
            </p>
          </div>
          <div class="productos__reales-almohadas-precio">
            <!-- codigo php -->
            <span>
            <?php
              $queryPrecios = mysqli_query($conn, "SELECT id_producto, precio FROM atributos_productos");
              
              while($datosPrecios = mysqli_fetch_array($queryPrecios)){
                
                $datosPrecios = mysqli_fetch_all($queryPrecios, MYSQLI_ASSOC);

                // print_r($datosPrecios);

                $valuesInsert="-";

                for ($i=0; $i < 4 ; $i++) {

                  if(($datosPrecios[$i]['precio'] == 172.99) || ($datosPrecios[$i]['precio'] == 199.99)){
                    echo $valuesInsert;
                    $valuesInsert = substr_replace($valuesInsert, "", -1);
                  }
                  else{
                    echo $datosPrecios[$i]['precio']; 
                  }
                  
                }
              
              }      
            ?>
            </span>
          </div>
          <div class="productos__reales-almohadas-titulo">
            <!-- codigo php -->
            <h1><?php echo $datosAlmohadas['nombre']; ?></h1>
          </div>
        </div>          
        <?php
      
          }
            } 

        ?>
      </div>

    </section>

    <?php include './html/php/footer.php';?>

  </main>

</body>
</html>