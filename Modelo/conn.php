<?php

$mysqli = new mysqli('localhost', 'root', '', 'video_tienda');

if($mysqli->connect_error){

    die('Error en la conexion' . $mysqli->connect_error);

}

$db_host= 'localhost';
$db_user= 'root';
$db_pass= '';
$db_database= 'video_tienda';

$conn = mysql_connect($db_host, $db_user, $db_pass) or die('Database Connection Error');

mysql_select_db($db_database, $conn);

?>