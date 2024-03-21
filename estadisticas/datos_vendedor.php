<?php
        require_once '../db/conexion_db.php';

        // Consultar los vendedores desde la base de datos
        $sql = "SELECT id_vendedor, nombre FROM vendedores";
        $resultado = $conn->query($sql);
        
        ?>




<select class="form-select  mb-3" name="vendedor" id="vendedorSelect" require>
    <option value="">Seleccionar vendedor</option>

    <?php
            while ($row = $resultado->fetch_assoc()) {
                $idVendedor = $row['id_vendedor'];
                $nombreVendedor = $row['nombre'];

                echo "<option value='$idVendedor'>$nombreVendedor</option>";
            }
            ?>
</select>

<div class="d-grid gap-2 col-12 mx-auto mt-4">
    <button class="btn btn-outline-dark" id="abrir-modal-btn">Mostrar información</button>
</div>