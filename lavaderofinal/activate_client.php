<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Actualiza el estado del cliente a "Activo"
    $query = "UPDATE Clientes SET Estado = 'Activo' WHERE ID = $client_id";

    if (mysqli_query($conexion, $query)) {
        // El cliente se activó con éxito, redirige al usuario a la página de clientes
        header("Location: clients.php");
        exit;
    } else {
        echo "Error al dar de alta al cliente: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros de URL inválidos.";
}

mysqli_close($conexion);
?>
