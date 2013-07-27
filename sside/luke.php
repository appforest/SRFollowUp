<?php
$s_caso = $_GET['s_caso'];

$bd = new SQLite3("casos.db");
$resultado=  $bd->query("SELECT * FROM casostm WHERE caso=$s_caso;");
while($fila = $resultado->fetchArray()){
	echo "
			<tr>
				<td>".$fila["nombre"]."</td>".
				"<td>".$fila["apellido"]."</td>".
				"<td>".$fila["email"]."</td>".
				"<td>".$fila["caso"]."</td>".
				"<td>".$fila["estado"]."</td>".
				"<td>".$fila["descr"]."</td>";	
}

$bd->close();
?>