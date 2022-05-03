<?php
  require '../php/conexion.php';
  require '../../loginUsus/database.php';

  // Codigo Carrito

  session_start();

  $id = isset($_GET['id']) ? $GET['id'] : '';

  //script para que se guarde el número de productos en el carrito en la sesión
  $numCarrito = 0;
  if(isset($_SESSION['carrito']['productos'])){
    $numCarrito = count($_SESSION['carrito']['productos']);
  }

  print_r($_SESSION);

  // if($id == ''){
  //   echo 'Error al realizar la petición';
  //   exit;
  // }
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
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/home.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
    
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
            <li><a href="carrito.php"><ion-icon name="cart-outline"></ion-icon><span id="numero_carrito" class="badge bg-secondary"><?php echo $numCarrito; ?></span></a></li>
            
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

        $queryProductos = mysqli_query($conn, "SELECT id_producto, nombre, categoria, img, estado FROM `products` WHERE categoria = 'colchones' AND estado = 1");

        $queryAttrProductos = mysqli_query($conn, "SELECT DISTINCT p.*, a.id_producto, a.precio, a.altura, a.ancho, a.descripcion from atributos_productos a inner join products p on a.id_producto = p.id_producto where p.estado = 1");

        $datosAtrr = mysqli_fetch_array($queryAttrProductos);

      ?>

      <div class="productos__reales">
          <div id="contCarruselBackground"></div>
            <div class="container">
                <div class="cards-wrapper owl-carousel">
                    <!-- Aquí iría el PHP para hacer las card dinámicas, en función de lo que devuelva la base de datos -->    
                    <?php
                      $resultado = mysqli_num_rows($queryProductos);
                      
                        if($resultado > 0){
                          while($datos = mysqli_fetch_array($queryProductos)){
                            
                    ?>
                    <div class="productos__reales-colchones">
                      <div class="productos__reales-colchones-imagen">
                        <!-- codigo php -->
                        <a href="producto.php?id=<?php echo $datos['id_producto'];?>">
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
                                echo number_format($datosPrecios[$i]['precio'], 2, '.', ',');  
                              }
                              
                            }
                          
                          }      
                        ?>
                        €
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
            </div>
      </div>
      
      <!-- Query almohadas -->
      <?php

        $queryAlmohadas = mysqli_query($conn, "SELECT id_producto, nombre, categoria, img, estado FROM `products` WHERE categoria = 'almohadas' AND estado = 1");

      ?>

      <div style="display: none;" class="productos__reales">
        <?php
          $resultado = mysqli_num_rows($queryAlmohadas);
          
            if($resultado > 0){
              while($datosAlmohadas = mysqli_fetch_array($queryAlmohadas)){
                
        ?>
        <div class="productos__reales-almohadas">
          <div class="productos__reales-almohadas-imagen">
            <a href="producto.php?id=<?php echo $datosAlmohadas['id_producto'];?>">
              <div class="imagen__almohada">
                <?php
                  
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

              // Codigo Mostrar Productos
              $queryPrecios = mysqli_query($conn, "SELECT id_producto, precio FROM atributos_productos");
              
              while($datosPrecios = mysqli_fetch_array($queryPrecios)){
                
                $datosPrecios = mysqli_fetch_all($queryPrecios, MYSQLI_ASSOC);

                // print_r($datosPrecios);

                $coma="-";
                $precioIcono = "€";

                for ($i=0; $i < 4 ; $i++) {

                  if(($datosPrecios[$i]['precio'] == 172.99) || ($datosPrecios[$i]['precio'] == 199.99)){
                    echo $coma;
                    $coma = substr_replace($coma, "", -1);
                    
                  }
                  else{
                    echo number_format($datosPrecios[$i]['precio'], 2, '.', ',');  
                    
                  }
                  
                }
              
              }      
            ?>
            €
            </span>
          </div>
          <div class="productos__reales-almohadas-titulo">
            <!-- codigo php -->
            <h1><?php echo $datosAlmohadas['nombre']; ?></h1>
          </div>
          <div class="d-grid gap-3col-10 mx-auto">
            <button class="btn btn-outline-primary"type="button" onclick="addProducto(<?php echo $datosAlmohadas['id_producto']; ?>)">Agregar al carrito</button>
          </div>
        </div>          
        <?php
      
          }
            } 

        ?>
      </div>

    </section>
    
    <section class="video">
      
      <div class="video__titulo">
        <h1 data-aos="fade-up">Experiencia de Relax única</h1>
      </div>

      <video src="../videos/colchonsito.mp4" muted loop autoplay></video>

    </section>
    
    <?php include './html/php/footer.php';?>

  </main>

  <script>
    AOS.init();
  </script>

</body>
</html>