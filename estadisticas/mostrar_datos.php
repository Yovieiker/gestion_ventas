<?php

require_once '../db/conexion_db.php';

// Recibir id del vendedor para hacer las consultas
$idVendedor = $_POST['vendedor'];

// Mostrar cantidad de ventas realizadas por el vendedor en la tabla ventas

$sql = "SELECT COUNT(*) AS cantidad_ventas FROM ventas WHERE id_vendedor =$idVendedor";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h2>Cantidad de Ventas</h2>";
    echo "<table class='table table-striped table-hover'>
        <tr>
            <th>Cantidad de Ventas</th>
        </tr>";
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['cantidad_ventas'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron ventas</p>";
}

// Mostrar los productos más vendidos de cada vendedor en la tabla productos_venta

$sql = "SELECT productos.nombre, SUM(productos_venta.cantidad) AS cantidad_vendida 
        FROM productos_venta 
        INNER JOIN productos ON productos_venta.id_producto = productos.id_producto 
        INNER JOIN ventas ON productos_venta.id_venta = ventas.id_venta 
        WHERE ventas.id_vendedor = $idVendedor 
        GROUP BY productos_venta.id_producto 
        ORDER BY cantidad_vendida DESC";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h2>Productos Más Vendidos</h2>";
    echo "<table class='table table-striped table-hover'>
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

// Mostrar el total de ventas realizadas por cada vendedor

$sql = "SELECT SUM(ventas.total) AS total_ventas FROM ventas WHERE id_vendedor = $idVendedor";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h2>Total de Ventas</h2>";
    echo "<table class='table table-striped table-hover'>
        <tr>
            <th>Total de Ventas</th>
        </tr>";
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['total_ventas'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron ventas</p>";
}

?>