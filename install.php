<?php
$db=new SQLite3("sside/srxfu.db");
echo "Database Created...<br>";
$db->query('CREATE TABLE IF NOT EXISTS srxs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name text, email text, lastName text, srx text, status text, descr text)');
echo "Database Table Created...<br>
<h3>You can close this window now, or <a href='index.html'>click here</a> to go to Service Request Follo Up app.</h3>";
?>