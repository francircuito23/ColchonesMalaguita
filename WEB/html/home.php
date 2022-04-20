<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
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
          <ul class="header__nav">
            <li><a href="#"><ion-icon name="search-outline"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="person-outline"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="cart-outline"></ion-icon></a></li>
          </ul>
        </div>
        <div class="header__icons__redes">
          <ul class="header__nav">
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
          <img class="carrusel__img-1" src="../img/matelas-hastens-800x312.png" alt="colchon-1">
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
      
      <div class="productos__reales">
        <div class="productos__reales-colchones">
          <div class="productos__reales-colchones-imagen">
            <a href="">
              <div class="imagen_colchon">
                <img src="" alt="">
              </div>
            </a>
          </div>
        </div>
        <div class="productos__reales-colchones-titulo">
          <h1>Colchonsito 1</h1>
        </div>
        <div class="productos__reales-colchones">

        </div>
        <div class="productos__reales-colchones">

        </div>
        <div class="productos__reales-colchones">

        </div>
      </div>

    </section>

  </main>

</body>
</html>