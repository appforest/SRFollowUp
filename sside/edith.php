<?php
$nombre = $_GET['a_e'];
$apellido = $_GET['b_e'];
$email = $_GET['c_e'];
$caso = $_GET['d_e'];
$estado = $_GET['e_e'];
$descr = $_GET['f_e'];

$bd = new SQLite3("casos.db");
//revisar con qué variable entran (WHERE...)
$bd->exec("UPDATE casostm SET (id, nombre, apellido, email, caso, estado, descr) VALUES(NULL, '$nombre', '$apellido', '$email', '$caso', '$estado', '$descr') WHERE caso='6549873214';");

$bd->close();
?>