<?php
require_once '../db/conexion_db.php';
// Consultar los productos desde la base de datos
$sql = "SELECT id_producto, nombre, precio, id_categoria FROM productos";
$resultado = $conn->query($sql);
?>

<select class="form-select" name="producto" id="productoSelect">
    <option value="">Seleccione un producto</option>
    <?php
while ($row = $resultado->fetch_assoc()) {
  $idProducto = $row['id_producto'];
  $nombreProducto = $row['nombre'];
  $precioProducto = $row['precio'];
  $idCategoria = $row['id_categoria'];

  // Obtener la categoría del producto
  $sqlCategoria = "SELECT nombre FROM categorias WHERE id_categoria = $idCategoria";
  $resultadoCategoria = $conn->query($sqlCategoria);
  $rowCategoria = $resultadoCategoria->fetch_assoc();
  $categoriaProducto = $rowCategoria['nombre'];

  echo "<option value='$idProducto' data-categoria='$categoriaProducto' data-precio='$precioProducto'>$nombreProducto </option>";
}
?>
</select>