<?php
include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera los datos del formulario
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];

    // Aquí puedes agregar validaciones de datos, como comprobar que los campos no estén vacíos

    // Prepara la consulta SQL para insertar el nuevo vehículo en la base de datos
    $query = "INSERT INTO Vehiculos (Marca, Modelo, Año, Placa) VALUES ('$marca', '$modelo', '$ano', '$placa')";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $query)) {
        // El vehículo se agregó con éxito, puedes redirigir al usuario a la página de vehículos o mostrar un mensaje de éxito
        header("Location: vehicles.php");
    } else {
        // Si ocurrió un error en la consulta, muestra un mensaje de error
        echo "Error al agregar el vehículo: " . mysqli_error($conexion);
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
