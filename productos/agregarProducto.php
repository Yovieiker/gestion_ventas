<?php
require_once '../db/conexion_db.php';



//agregar nuevo producto

$nombreProducto = $_POST['nombre_producto'];
$categoriaProducto = $_POST['categoria_producto'];
$precioProducto = $_POST['precio_producto'];
$descuento = isset($_POST['descuento_producto']) ? 1 : 0;

//insertar producto

$sqlInsertProducto = "INSERT INTO productos (nombre, id_categoria, precio, descuento) VALUES ('$nombreProducto', $categoriaProducto, $precioProducto, $descuento)";
if ($conn->query($sqlInsertProducto) === FALSE) {
    echo "Error al insertar el producto: " . $conn->error;
} 


//redireaccionar

header("Location: registro_exitoso.php");



?>