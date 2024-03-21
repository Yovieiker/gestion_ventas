<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<head>
    <title>Registro de Venta</title>
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
                            href="./ventas/registro_ventas_formulario.php">Venta</a>
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
    <div class="container my-3">
        <div class="d-none alert alert-danger alert-dismissible fade show" id="alert" role="alert">
            <strong>Te faltan datos</strong> Rellene los campos requeridos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="d-flex justify-content-center">
            <h1>Registro de Venta</h1>
        </div>
        <form class="row g-3  needs-validation" action="guardar_venta.php" method="post">
            <div>

                <h2>Información del vendedor</h2>
                <?php include 'vendedores.php'; ?>
                <h2>Información del Cliente</h2>
                <div class="d-flex">
                    <div class="col-md-3 ">
                        <label>Nombre: </label>
                        <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" required>
                    </div>
                    <div class="col-md-3 ms-2">
                        <label>Cédula/RIF: </label>
                        <input type="text" class="form-control" name="cedula_rif_cliente" id="cedula_rif_cliente"
                            required>
                    </div>
                    <div class="col-md-3 mx-2">
                        <label>Teléfono: </label>
                        <input type="text" class="form-control" name="telefono_cliente" id="telefono_cliente" required>
                        <br>
                    </div>
                    <div class="col-md-3">
                        <label>Dirección: </label>
                        <input type="text" class="form-control" name="direccion_cliente" required>
                    </div>
                </div>

            </div>
            <h2>Productos</h2>

            <div class="d-flex">
                <div class="col-md-3 ">
                    <label>Producto: </label>
                    <?php include 'productos.php'; ?>
                </div>
                <div class="col-md-3 ms-2">
                    <label>Categoría: </label>
                    <input type="text" class="form-control" id="categoria_producto" name="categoria_producto" readonly>
                </div>

                <div class="col-md-3 mx-2">
                    <label>Precio: </label>
                    <input type="text" class="form-control" id="precio_producto" name="precio_producto" readonly>
                </div>
                <div class="col-md-3">
                    <label>Cantidad: </label>
                    <input type="number" class="form-control" name="cantidad_producto" required>
                </div>


            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button id="agregarProducto" class="btn btn-primary" type="button">Agregar producto</button>
            </div>

            <div>

                <h2>Lista de Productos</h2>
                <table class="table table-striped table-hover" id="tablaProductos">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <input type="hidden" id="datos-productos" name="datos-productos" readonly value="" required>

            </div>
            <div class="col-md-2 offset-md-10">
                <h4>Subtotal</h4>
                <input type="text" class="form-control" id="subtotal" name="subtotal" readonly value="0">
                <h4>iva </h4>
                <input type="text" class="form-control" id="iva" name="iva" readonly value="0">
                <h4>Total </h4>
                <input type="text" class="form-control" id="total" name="total" readonly value="0">

            </div>


            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" id="registrarVentaBtn" type="submit">Registrar venta</button>

            </div>
        </form>

    </div>
    <script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="../js/calcular_total.js">
    </script>
    <script src="../js/validar.js">

    </script>

</body>

</html>