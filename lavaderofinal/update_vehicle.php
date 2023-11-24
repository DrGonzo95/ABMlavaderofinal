<?php
include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera los datos del formulario
    $vehicle_id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];

    // Aquí puedes agregar validaciones de datos, como comprobar que los campos no estén vacíos

    // Prepara la consulta SQL para actualizar los datos del vehículo
    $query = "UPDATE Vehiculos SET Marca = '$marca', Modelo = '$modelo', Año = '$ano', Placa = '$placa' WHERE ID = $vehicle_id";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $query)) {
        // Los datos del vehículo se actualizaron con éxito, puedes redirigir al usuario a la página de vehículos o mostrar un mensaje de éxito
        header("Location: vehicles.php");
    } else {
        // Si ocurrió un error en la consulta, muestra un mensaje de error
        echo "Error al actualizar el vehículo: " . mysqli_error($conexion);
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
