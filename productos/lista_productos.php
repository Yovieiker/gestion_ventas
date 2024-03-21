<?php
require_once '../db/conexion_db.php';

$sql = "SELECT p.id_producto, p.nombre, p.precio, c.nombre AS nombre_categoria
        FROM productos p
        INNER JOIN categorias c ON p.id_categoria = c.id_categoria";
$resultado = $conn->query($sql);
?>

<h2>Lista de productos</h2>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoría</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["precio"] . "</td>";
                echo "<td>" . $row["nombre_categoria"] . "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron productos.</td></tr>";
        }
        ?>
    </tbody>
</table>