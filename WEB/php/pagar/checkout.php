<?php

    require '../../../loginUsus/database.php';

    session_start();

    $numCarrito = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $numCarrito = count($_SESSION['carrito']['productos']);
    }

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    print_r($_SESSION);

    $db = new Database();

    //array que guarda los productos de la sesión
    $lista_carrito = array();

    if ($productos != null){ //de cada producto recorremos los valores y contamos con cantidad cuántos productos hay del mismo
        foreach ($productos as $clave => $cantidad){
            $sql = $db->connect()->prepare("SELECT id_producto, nombre, categoria, img, $cantidad AS cantidad FROM products WHERE id_producto=? AND estado=1");
            $sql->execute([$clave]);
            $lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="../../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <title>Caja</title>
</head>
<body>
    <main>

        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>ID</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($lista_carrito == null){

                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';

                        }else{

                            $total=0;
                            foreach($lista_carrito as $producto){

                                $id = $producto['id_producto'];
                                $nombre = $producto['nombre'];
                                $categoria = $producto['categoria'];
                                $img = $producto['img'];
                                // $cantidad = $producto['cantidad'];

                            ?>
                        <tr>

                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $categoria; ?></td>
                            <td><?php echo $id; ?></td>
                            <td>
                                <input type="number" min="1" max="10" step="1" value="<?php echo
                                $cantidad ?>" size="5" id="cantidad_<?php echo $id; ?>"onchange="actualizaCantidad(this.value, <?php echo $id; ?>)">
                            </td>
                            <td>
                                <img src="<?php echo '../../img/'.$img; ?>" alt="">
                            </td>
                            <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>

                        </tr>

                        <?php } ?>
                    
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <!-- Función Actualizar -->

        <script>
            function actualizaCantidad(cantidad, id){

                let url='actualizarCantidad.php'

                let formData = new FormData()
                formData.append('action', 'agregar')
                formData.append('id', id)
                formData.append('cantidad', cantidad)

                fetch(url,{

                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                    
                }).then(response=>response.json())
                .then (data =>{
                    if(data.ok){
                        console.log("funciona")
                    }
                })

            }
        </script>

        <!-- si el carrito tiene productos -->
        <?php if ($lista_carrito != null){ ?> 
            <section class="boton-contenedor">
                <article>
                    <a href="pago.php">Realizar pago</a>
                </article>
            </section>
        <?php } ?>

    </main>

    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" role="dialog" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el producto de la lista?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar Producto</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Función eliminar -->

    <script>

        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event){
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina') 
            buttonElimina.value = id
        })

        function eliminar(){

            let botonEliminarId = document.getElementById("btn-elimina").value

            // let id = botonEliminarId.value

            let url='actualizarCantidad.php'

            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('id', botonEliminarId)

            fetch(url,{

                method: 'POST',
                body: formData,
                mode: 'cors'
                
            }).then(response=>response.json())
            .then (data =>{
                if(data.ok){
                    location.reload()
                }
            })

        }
    </script>
</body>
</html>