<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
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
        <div class="d-none alert alert-danger alert-dismissible fade show" id="alert" role="alert">
            <strong>Selecciona un vendedor</strong> Debes seleccionar un vendedor.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="d-flex">
            <div class="col-md-6">
                <h2>Total de ventas</h2>
                <?php include "total.php";?>

            </div>
            <div class="col-md-4">

                <div>
                    <h2>Ver datos del vendedor</h2>
                    <?php include "datos_vendedor.php" ?>
                </div>
                <div>

                </div>
            </div>
        </div>
        <div>

            <?php include "productos_vendidos.php"; ?>
        </div>

    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="../js/modal.js">

    </script>


</body>

</html>