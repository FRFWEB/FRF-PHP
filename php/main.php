<?php
include 'functions.php';
$conexion = generateConexion('localhost',null,'frfphp','root','');
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$result = generateCrud("INSERT INTO users VALUES('','$name','$email','$message')",$conexion,'create','success');
echo $result;
//echo $name.' - '.$email.' - '.$message;

/* 

INSERT INTO `users`(`id_user`, `user`, `email`, `message`) VALUES ([value-1],[value-2],[value-3],[value-4])
*/
?>