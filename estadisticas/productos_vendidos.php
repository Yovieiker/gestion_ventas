<?php

//mostrar lista de los productos mas vendidos por orden

require_once '../db/conexion_db.php';

$sql = "SELECT productos.nombre, SUM(productos_venta.cantidad) AS cantidad_vendida 
        FROM productos_venta 
        INNER JOIN productos ON productos_venta.id_producto = productos.id_producto 
        INNER JOIN ventas ON productos_venta.id_venta = ventas.id_venta 
        GROUP BY productos_venta.id_producto 
        ORDER BY cantidad_vendida DESC";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h2>Productos Más Vendidos</h2>";
    echo "<table  class=' table-bordered table table-striped table-hover'>
        <tr>
            <th>Producto</th>
            <th>Cantidad Vendida</th>
        </tr>";
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['cantidad_vendida'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron ventas</p>";
}
?>