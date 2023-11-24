<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $vehicle_id = $_GET['id'];

    // Actualiza el estado del vehículo a 'Inactivo' en lugar de borrarlo
    $query = "UPDATE Vehiculos SET Estado = 'Inactivo' WHERE ID = $vehicle_id";

    if (mysqli_query($conexion, $query)) {
        header("Location: vehicles.php"); // Redirige a la página de vehículos después de la actualización
        exit;
    } else {
        echo "Error al cambiar el estado del vehículo: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros de URL inválidos.";
}

mysqli_close($conexion);
?>
