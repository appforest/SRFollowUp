<?php
$name = $_GET['a'];
$lastName = $_GET['b'];
$email = $_GET['c'];
$srx = $_GET['d'];
$status = $_GET['e'];
$descr = $_GET['f'];

$db = new SQLite3("srxfu.db");
$db->exec("INSERT INTO srxs (id, name, lastName, email, srx, status, descr) VALUES(NULL, '$name', '$lastName', '$email', '$srx', '$status', '$descr')");
$result=  $db->query("SELECT * FROM srxs;");
while($row = $result->fetchArray()){
	echo "
			<tr>
				 <td><a href=''>".$row["srx"]."</a></td>".
				"<td>".$row["name"]."</td>".
				"<td>".$row["lastName"]."</td>".
				"<td>".$row["email"]."</td>".
				"<td>".$row["status"]."</td>".
				"<td>".$row["descr"]."</td>";			
}

$db->close();
?>