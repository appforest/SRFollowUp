<?php
$d_id = $_GET['d_id'];

$db = new SQLite3("srxfu.db");
$delete=  $db->query("DELETE FROM srxs WHERE id='$d_id';");
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