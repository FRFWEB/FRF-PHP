<?php
/* 
DEVELOPER BY: FRANCISCO GARCIA
DATE: 07-03-2021
*/

include 'functions.php';
$conexion = generateConexion('localhost',null,'frfphp','root','');
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$result = generateCrud("INSERT INTO users VALUES('','$name','$email','$message')",$conexion,'create','success');
echo $result;
?>