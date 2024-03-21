<?php
require_once '../db/conexion_db.php';


// Consultar los vendedores desde la base de datos

$sql = "SELECT id_vendedor, nombre FROM vendedores";
$resultado = $conn->query($sql);

?>

<select class="form-select" name="vendedor" id="vendedorSelect">
    <option value="">Seleccionar vendedor</option>

    <?php
    while ($row = $resultado->fetch_assoc()) {
        $idVendedor = $row['id_vendedor'];
        $nombreVendedor = $row['nombre'];

        echo "<option value='$idVendedor'>$nombreVendedor</option>";
    }
    ?>
</select>