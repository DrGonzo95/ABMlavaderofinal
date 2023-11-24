<?php
include 'db_connection.php';

// Check if the POST data is set
if (isset($_POST['service_id']) && isset($_POST['vehicle_type'])) {
    // Get the service and vehicle type IDs from the POST data
    $serviceID = $_POST['service_id'];
    $vehicleType = $_POST['vehicle_type'];

    // Fetch service price from the database
    $queryService = "SELECT Precio FROM servicios WHERE ID = $serviceID";
    $resultService = mysqli_query($conexion, $queryService);

    // Fetch vehicle type price from the database
    $queryVehicleType = "SELECT precio FROM tipovehiculo WHERE tipo = '$vehicleType'";
    $resultVehicleType = mysqli_query($conexion, $queryVehicleType);

    // Check if both queries were successful
    if ($resultService && $resultVehicleType) {
        $rowService = mysqli_fetch_assoc($resultService);
        $rowVehicleType = mysqli_fetch_assoc($resultVehicleType);

        // Prepare and return the prices as JSON
        $prices = [
            'service_price' => $rowService['Precio'],
            'vehicle_type_price' => $rowVehicleType['precio']
        ];

        echo json_encode($prices);
    } else {
        // Handle errors if queries fail
        echo "Error fetching prices from the database.";
    }
} else {
    // Handle the case where POST data is not set
    echo "Invalid request.";
}
?>
