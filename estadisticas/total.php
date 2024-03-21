<?php

require_once '../db/conexion_db.php';

$sql = "SELECT SUM(total) AS total_ventas FROM ventas";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  $row = $resultado->fetch_assoc();
  $totalVentas = $row["total_ventas"];
  echo '<div class="card  mb-4" style="width: 18rem;">
  <div class="card-body">
      <h5 class="card-title">Total</h5>
      <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">$' . $totalVentas . '</span>
  </div>
</div>';
} else {
  echo "No se encontraron ventas.";
}
//sacar total de cantidad productos vendido

$sql = "SELECT SUM(cantidad) AS total_productos FROM productos_venta";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  $row = $resultado->fetch_assoc();
  $totalProductos = $row["total_productos"];
  $porcentaje = ($totalProductos / 500) * 100;
  $porcentaje_redondeado = round($porcentaje);
  echo '<div class="card mb-2 " style="width: 18rem;">
  <div class="card-body">
      <h5 class="card-title">Productos vendidos</h5>
      <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">' . $totalProductos . '</span><br>
      <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">Meta 500 productos</span><br>

      <div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: '.$porcentaje_redondeado.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'.$porcentaje_redondeado.'%</div>
</div>
  </div>
</div>
';
}
?>