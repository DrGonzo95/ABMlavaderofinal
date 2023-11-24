<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $serviceId = $_GET['id'];

    // Actualizar el estado del servicio a 'Activo'
    $queryActivateService = "UPDATE Servicios SET Estado = 'Activo' WHERE ID = $serviceId";
    $resultActivateService = mysqli_query($conexion, $queryActivateService);

    if ($resultActivateService) {
        // Redirigir a services.php después de activar el servicio
        header("Location: services.php");
        exit();
    } else {
        echo "Error al activar el servicio. Por favor, inténtelo de nuevo.";
    }
} else {
    echo "ID de servicio no proporcionado.";
}
?>
