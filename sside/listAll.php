<?php
$db = new SQLite3("srxfu.db");
$result=  $db->query("SELECT * FROM srxs;");
while($row = $result->fetchArray()){
	echo "
			<tr>
				 <td><a href=''>".$row["srx"]."</a></td>".
				"<td>".$row["name"]."</td>".
				"<td>".$row["lastName"]."</td>".
				"<td>".$row["email"]."</td>".
				"<td>".$row["status"]."</td>".
				"<td>".$row["descr"]."</td>
				";			
}

$db->close();
?>
