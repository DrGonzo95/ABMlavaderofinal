<?php
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $tipoVehiculo = $_POST['tipo_vehiculo'];
    $tipoServicioId = $_POST['tipo_servicio'];

    // Fetch the service name and price from the database
    $queryTipoServicio = "SELECT Nombre, Precio FROM tiposervicio WHERE ID = ?";
    $stmtTipoServicio = mysqli_prepare($conexion, $queryTipoServicio);
    mysqli_stmt_bind_param($stmtTipoServicio, "i", $tipoServicioId);
    mysqli_stmt_execute($stmtTipoServicio);
    $resultTipoServicio = mysqli_stmt_get_result($stmtTipoServicio);

    // Check if the query was successful
    if ($resultTipoServicio) {
        $rowTipoServicio = mysqli_fetch_assoc($resultTipoServicio);
        $tipoServicio = $rowTipoServicio['Nombre'];
        $precioServicio = $rowTipoServicio['Precio'];

        // Fetch the price from the database based on the selected vehicle type
        $queryTipoVehiculo = "SELECT precio FROM tipovehiculo WHERE tipo = ?";
        $stmtTipoVehiculo = mysqli_prepare($conexion, $queryTipoVehiculo);
        mysqli_stmt_bind_param($stmtTipoVehiculo, "s", $tipoVehiculo);
        mysqli_stmt_execute($stmtTipoVehiculo);
        $resultTipoVehiculo = mysqli_stmt_get_result($stmtTipoVehiculo);

        // Check if the query was successful
        if ($resultTipoVehiculo) {
            $rowTipoVehiculo = mysqli_fetch_assoc($resultTipoVehiculo);

            // Calculate the total price
            $totalPrice = $rowTipoVehiculo['precio'] * $precioServicio;

            // Use the selected service and vehicle type names for the service name
            $serviceName = "$tipoServicio $tipoVehiculo";

            // Insert the new service into the database using prepared statements
            $queryInsertService = "INSERT INTO servicios (Nombre, TipoVehiculo, TipoServicio, Precio) VALUES (?, ?, ?, ?)";
            $stmtInsertService = mysqli_prepare($conexion, $queryInsertService);
            mysqli_stmt_bind_param($stmtInsertService, "sssd", $serviceName, $tipoVehiculo, $tipoServicio, $totalPrice);
            $resultInsertService = mysqli_stmt_execute($stmtInsertService);

            if ($resultInsertService) {
                // Redirect back to services.php after successful insertion
                header("Location: services.php");
                exit();
            } else {
                echo "Error al agregar el servicio. Por favor, inténtelo de nuevo.";
            }
        } else {
            // Handle errors if the query fails
            echo "Error al obtener el precio del tipo de vehículo de la base de datos.";
        }
    } else {
        // Handle errors if the query fails
        echo "Error al obtener el nombre y precio del servicio de la base de datos.";
    }
} else {
    // Handle the case where the form is not submitted
    echo "Acceso no autorizado.";
}
?>
