<?php
include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $service_id = $_GET['id'];

    // Realiza una consulta para eliminar el servicio específico
    $query = "DELETE FROM Servicios WHERE ID = $service_id";

    if (mysqli_query($conexion, $query)) {
        // El servicio se eliminó con éxito, puedes redirigir al usuario a la página de servicios o mostrar un mensaje de éxito
        header("Location: services.php");
    } else {
        echo "Error al eliminar el servicio: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros de URL inválidos.";
}
?>
