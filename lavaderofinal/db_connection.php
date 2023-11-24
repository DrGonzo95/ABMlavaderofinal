<?php
$host = "localhost"; // Cambia esto por la dirección de tu servidor MySQL
$usuario = "root"; // Cambia esto por el nombre de usuario de MySQL
$contrasena = ""; // Cambia esto por la contraseña de MySQL
$base_datos = "db_lavadero"; // Cambia esto por el nombre de la base de datos

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
