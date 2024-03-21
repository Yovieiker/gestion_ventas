<?php

require_once '../db/conexion_db.php';

// Obtener los datos del formulario
$nombreCliente = $_POST['nombre_cliente'];
$cedulaRifCliente = $_POST['cedula_rif_cliente'];
$telefonoCliente = $_POST['telefono_cliente'];
$direccionCliente = $_POST['direccion_cliente'];
$cantidades = $_POST['cantidad_producto'];
$productos = $_POST['datos-productos'];
$idVendedor = $_POST['vendedor'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];

$impuesto = 0;


if ($cedulaRifCliente) {
    // Verificar si el cliente ya está registrado
    $sqlVerificarCliente = "SELECT id_cliente FROM clientes WHERE cedula_rif = '$cedulaRifCliente'";
    $resultadoVerificarCliente = $conn->query($sqlVerificarCliente);

    if ($resultadoVerificarCliente->num_rows > 0) {
        // El cliente ya está registrado, obtener su ID
        $idCliente = $resultadoVerificarCliente->fetch_assoc()['id_cliente'];
    } else {
         // Insertar el cliente en la tabla "clientes"
    $sqlInsertCliente = "INSERT INTO clientes (nombre, cedula_rif, telefono, direccion) VALUES ('$nombreCliente', '$cedulaRifCliente', '$telefonoCliente', '$direccionCliente')";
    if ($conn->query($sqlInsertCliente) === FALSE) {
        echo "Error al insertar el cliente: " . $conn->error;
        exit;
    }

    // Obtener el ID del cliente insertado
    $idCliente = $conn->insert_id;
    }
} else{
  echo "cliente no registrado";
}

// Continúa con la inserción de la venta utilizando el ID del cliente
$fechaVenta = date('Y-m-d');

$sqlInsertVenta = "INSERT INTO ventas (id_cliente, id_vendedor, fecha, subtotal, impuesto, total) VALUES ($idCliente, $idVendedor, '$fechaVenta', $subtotal, $impuesto, 0)";
if ($conn->query($sqlInsertVenta) === FALSE) {
    echo "Error al insertar la venta: " . $conn->error;
    exit;
}

// Obtener el ID de la venta insertada
$idVenta = $conn->insert_id;

$impuesto = $subtotal * 0.16; 
$total = $subtotal + $impuesto;

// Actualizar el total de la venta
$sqlUpdateVenta = "UPDATE ventas SET subtotal = $subtotal, impuesto = $impuesto, total = $total WHERE id_venta = $idVenta";
if ($conn->query($sqlUpdateVenta) === FALSE) {
    echo "Error al actualizar el total de la venta: " . $conn->error;
    exit;
}

// Insertar los productos seleccionados en la tabla "productos_venta"
if ($productos !== null) {
  $productos = json_decode($productos, true);

  foreach ($productos as $producto) {
    $id_producto = $producto['id_producto'];
    $cantidad = $producto['cantidad'];
    $subtotal = $producto['subtotal'];

    // Insertar el producto en la tabla "productos_venta"
    $sqlInsertProducto = "INSERT INTO productos_venta (id_venta, id_producto, cantidad, subtotal) VALUES ($idVenta, $id_producto, $cantidad, $subtotal)";
    if ($conn->query($sqlInsertProducto) === FALSE) {
      echo "Error al insertar el producto: " . $conn->error;
      exit;
    }
    
  }
  // Enviar una respuesta de éxito al cliente
  $response = array('success' => true);
  echo json_encode($response);
} else {
  // Enviar una respuesta de error al cliente
  $response = array('success' => false, 'error' => 'Datos incorrectos');
  echo json_encode($response);
}


$conn->close();

// Redireccionar o mostrar un mensaje de éxito
header('Location: venta_exitosa.php');
?>