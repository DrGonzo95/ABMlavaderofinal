<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Actualiza el estado del cliente a 'Inactivo' en lugar de borrarlo
    $query = "UPDATE Clientes SET Estado = 'Inactivo' WHERE ID = $client_id";

    if (mysqli_query($conexion, $query)) {
        header("Location: clients.php"); // Redirige a la página de clientes después de la actualización
        exit;
    } else {
        echo "Error al cambiar el estado del cliente: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros de URL inválidos.";
}

mysqli_close($conexion);
?>
