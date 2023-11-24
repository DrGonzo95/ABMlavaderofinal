<?php
include 'db_connection.php';

// Verifica si se proporcionó un ID válido a través del parámetro GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $vehicleId = $_GET['id'];

    // Realiza la actualización del estado del vehículo
    $updateQuery = "UPDATE Vehiculos SET Estado = 'Activo' WHERE ID = $vehicleId";
    if (mysqli_query($conexion, $updateQuery)) {
        echo "Vehículo activado correctamente.";
    } else {
        echo "Error al activar el vehículo: " . mysqli_error($conexion);
    }
} else {
    echo "ID de vehículo no válido.";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);

// Redirige a la página de vehículos después de activar el vehículo
header("Location: vehicles.php");
exit();
?>
