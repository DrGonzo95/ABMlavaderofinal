<?php
include 'db_connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $serviceId = $_GET['id'];

    // Actualiza el estado del servicio a 'Inactivo'
    $query = "UPDATE Servicios SET Estado = 'Inactivo' WHERE ID = $serviceId";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        echo "El servicio se ha dado de baja correctamente.";
    } else {
        echo "Error al dar de baja el servicio: " . mysqli_error($conexion);
    }
} else {
    echo "ID de servicio no válido.";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);

// Redirige a services.php después de procesar la solicitud
header("Location: services.php");
exit();
?>
