<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand " href="../index.php">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="../ventas/registro_ventas_formulario.php">Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../productos/formProductos.php">Registro productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../estadisticas/estadistica.php">Estadisticas</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">

        <h2>Registrar categoria</h2>
        <form class="row g-3" action=" agregarCategoria.php" method="POST">
            <div class="input-group mb-3">
                <input class="form-control" type="text" placeholder="Ingresa nombre de la categoria"
                    name="categoria_nueva" id="categoria_nueva" required>
                <button class="btn btn-outline-secondary" type="submit">Guardar Categoria</button>

            </div>

        </form>


        <h2>Registrar producto</h2>
        <form class="row g-3" action="agregarProducto.php" method="POST">
            <div class="d-flex">
                <div class="col-md-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" required>
                </div>
                <div class="col-md-3 mx-4">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio_producto" id="precio_producto" required
                        min="0">
                </div>
                <div class="col-md-3">
                    <label for="categoria">Categoría</label>
                    <select class="form-select" name=categoria_producto>
                        <option value="">Seleccione una categoria</option>
                        <?php 
                 require_once '../db/conexion_db.php';
    $sql = "SELECT id_categoria, nombre FROM categorias";
    $resultado = $conn->query($sql);

    while ($row = $resultado->fetch_assoc()) {
        $idCategoria = $row['id_categoria'];
        $nombreCategoria = $row['nombre'];

        echo "<option  name=categoria_producto  value='$idCategoria' required >$nombreCategoria <br>";
    }
    
    
    ?>
                    </select>
                </div>

            </div>

            <div class="col-md-3 ">
                <label class="form-check-label" for="descuento">Descuento</label>
                <input class="form-check-input" type="checkbox" name="descuento_producto" id="descuento_producto">
            </div>


            <button class="btn btn-outline-primary" type="submit">Guardar Producto</button>
        </form>
        <div class="modal fade" id="exitoModal" tabindex="-1" role="dialog" aria-labelledby="exitoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exitoModalLabel">Registro Exitoso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>El producto se ha agregado exitosamente.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = '../productos/productos.php';">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include "lista_productos.php"; ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="../js/validar.js"></script>
</body>

</html>