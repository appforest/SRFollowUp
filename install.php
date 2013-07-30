<?php
$db=new SQLite3("sside/srxfu.db");
echo "Database Created...<br>";
$db->query('CREATE TABLE IF NOT EXISTS srxs (id int, name text, email text, lastName text, srx text, status text, descr text)');
echo "Database Table Created...<br>
<h3>You can close this window now, but remember to <em>erase this file</em> (install.php) so you won't overwrite the database records.</h3>";
?>