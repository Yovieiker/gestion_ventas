<?php 

require_once '../db/conexion_db.php';

$sql = "SELECT * FROM vendedores";
$resultado = $conn->query($sql);


//mostrar lista de vendedores un table

echo "<table class='table table-striped table-bordered table-hover'>
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>

</tr>
</thead>";

while($fila = $resultado->fetch_assoc()){ 
    
    echo "<tr>
    <td>".$fila['id_vendedor']."</td>
    <td>".$fila['nombre']."</td>
    
    </tr>";

}



?>