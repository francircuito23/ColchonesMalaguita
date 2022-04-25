<?php
  require '../php/conexion.php';
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
              echo '<img src="../img/'.$imgs[$i].'"/ alt="colchon-X" class="fadeCarruselHiddenImages">';

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

        $queryProductos = mysqli_query($conn, "SELECT * FROM products where estado = 1");

        $queryAttrProductos = mysqli_query($conn, "SELECT DISTINCT a.id_producto, a.precio, a.altura, a.ancho, a.descripcion from atributos_productos a inner join products p where p.estado = 1;");

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
            <p><?php echo $datos['descripcion']; ?></p>
          </div>
          <div class="productos__reales-colchones-medidas">
            <label for="">Elegir medida:</label>
            <select>
              <!-- codigo php -->
              <option value="1"><?php echo $datos['altura']; ?>x<?php echo $datos['ancho']; ?></option>
              <option value="2"><?php echo $datos['altura']; ?>x<?php echo $datos['ancho']; ?></option>
              <option value="3"><?php echo $datos['altura']; ?>x<?php echo $datos['ancho']; ?></option>
            </select>
          </div>
          <div class="productos__reales-colchones-precio">
            <!-- codigo php -->
            <span><?php echo $datos['precio']; ?></span>
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

    </section>

  </main>

</body>
</html>