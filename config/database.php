<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'prueba_user';

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}
?>