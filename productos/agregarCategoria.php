<?php

require_once '../db/conexion_db.php';
$categoriaNueva = $_POST['categoria_nueva'];


//validar que no exista la categoria
$sqlCategoria = "SELECT nombre FROM categorias WHERE nombre = '$categoriaNueva'";
$resultadoCategoria = $conn->query($sqlCategoria);
if ($resultadoCategoria->num_rows > 0) {
    echo "La categoria ya existe";
    exit;
}

//insertar nueva categoria
$sqlInsertCategoria = "INSERT INTO categorias (nombre) VALUES ('$categoriaNueva')";
if ($conn->query($sqlInsertCategoria) === FALSE) {
    echo "Error al insertar la categoria: " . $conn->error;
    exit;
}


header("Location: registro_exitoso.php");

?>