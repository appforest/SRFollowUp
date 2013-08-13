<?php
$name = $_GET['a'];
$lastName = $_GET['b'];
$email = $_GET['c'];
$srx = $_GET['d'];
$status = $_GET['e'];
$descr = $_GET['f'];
$recordId= $_GET['recordId'];

$db = new SQLite3("srxfu.db");
$db->exec("UPDATE srxs SET name='$name', lastName='$lastName', email='$email', srx='$srx', status='$status', descr='$descr' WHERE id='$recordId'");
$result=  $db->query("SELECT * FROM srxs;");
while($row = $result->fetchArray()){
	echo "
			<tr>
				 <td>".$row["srx"]."</td>".
				"<td>".$row["name"]."</td>".
				"<td>".$row["lastName"]."</td>".
				"<td>".$row["email"]."</td>".
				"<td>".$row["status"]."</td>".
				"<td>".$row["descr"]."</td>".		
				"<td><a onclick=\"editSrx('".$row['id']."');\" href='javascript:;' class='link' data-reveal-id='modalEdit'><span>Edit</span></a></td>".
				"<td><a onclick=\"deleteSrx('".$row['id']."');\" href='javascript:;' class='link'><span>Delete</span></a></td>";			
}

$db->close();
?>