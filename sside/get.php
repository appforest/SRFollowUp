<?php
$nombre = $_GET['a'];
$apellido = $_GET['b'];
$email = $_GET['c'];
$caso = $_GET['d'];
$estado = $_GET['e'];
$descr = $_GET['f'];

$bd = new SQLite3("casos.db");
$resultado=  $bd->query("SELECT * FROM casostm;");
while($fila = $resultado->fetchArray()){
	echo "
			<tr>
				<td>".$fila["nombre"]."</td>".
				"<td>".$fila["apellido"]."</td>".
				"<td>".$fila["email"]."</td>".
				"<td>".$fila["caso"]."</td>".
				"<td>".$fila["estado"]."</td>".
				"<td>".$fila["descr"]."</td>";

//buscar: $resultado=  $bd->query("SELECT * FROM casostm WHERE email='ema@il.co';");				
}

$bd->close();
?>