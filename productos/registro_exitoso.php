<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro Exitoso</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand active" href="../index.php">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
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
        <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="card  text-center border-success">
                <div class="card-header">
                    Registro exitoso
                </div>
                <div class="card-body">
                    <h5 class="card-title">Se ha agregado correctamente</h5>
                    <p class="card-text">El registro fue agregado con exitoso</p>
                    <a href="../productos/formProductos.php" class="btn btn-outline-primary">Realizar otro registro</a>
                    <a href="../index.php" class="btn btn-outline-secondary">Inicio</a>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>