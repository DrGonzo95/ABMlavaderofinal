<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Servicios</title>
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       <!-- Agrega un estilo personalizado -->
       <style>
        body {
            //background-color: #f2f2f2;
            text-align: center;
            padding: 50px;           
            background-image: linear-gradient(#FFFFFF, rgb(255, 122, 89));
        
        }
        
        .login-form {
            max-width: 300px;
            margin: 0 auto;
        }
    </style>
    <script>
        // JavaScript function to calculate the price based on selected service and vehicle type
        function calculatePrice() {
            var selectedService = document.getElementById("tipo_servicio").value;
            var selectedVehicleType = document.getElementById("tipo_vehiculo").value;

            // Fetch the prices from the database using AJAX
            $.ajax({
                type: "POST",
                url: "get_prices.php",
                data: { service_id: selectedService, vehicle_type: selectedVehicleType },
                success: function (data) {
                    var prices = JSON.parse(data);
                    var servicePrice = prices.service_price;
                    var vehicleTypePrice = prices.vehicle_type_price;

                    // Calculate and set the total price
                    var totalPrice = servicePrice * vehicleTypePrice;
                    document.getElementById("precio").value = totalPrice.toFixed(2);
                }
            });
        }

        // JavaScript function to toggle visibility of the inactive services table
        $(document).ready(function () {
            $("#toggleInactiveTable").click(function () {
                $("#inactiveTable").toggle();
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Gestión de Servicios</h1>

        <?php
        session_start();
        include 'db_connection.php';

        function createBackButton()
        {
           // echo '<a href="principal.php" class="btn btn-primary mt-3">Volver al Menú Principal</a>';
        }

        if (isset($_SESSION['rol'])) {
            $rol = $_SESSION['rol'];

            if ($rol === 'Administrador') {
                echo '<div class="row mt-4">';
                echo '<div class="col-md-6">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">Alta de Servicio</h2>';
                echo '<form method="post" action="add_service.php">';

                // Modified code to include dropdown for vehicle type
                echo '<div class="mb-3">';
                echo '<label for="tipo_vehiculo" class="form-label">Tipo de Vehículo:</label>';
                echo '<select name="tipo_vehiculo" id="tipo_vehiculo" class="form-control" onchange="calculatePrice()" required>';

                // Fetch vehicle types from the database and populate the dropdown
                $queryTipoVehiculo = "SELECT * FROM tipovehiculo";
                $resultTipoVehiculo = mysqli_query($conexion, $queryTipoVehiculo);

                while ($rowTipoVehiculo = mysqli_fetch_assoc($resultTipoVehiculo)) {
                    echo '<option value="' . $rowTipoVehiculo['tipo'] . '">' . $rowTipoVehiculo['tipo'] . '</option>';
                }

                echo '</select>';
                echo '</div>';

                // Modified code to include dropdown for service type
                echo '<div class="mb-3">';
                echo '<label for="tipo_servicio" class="form-label">Tipo de Servicio:</label>';
                echo '<select name="tipo_servicio" id="tipo_servicio" class="form-control" onchange="calculatePrice()" required>';

                // Fetch service types from the new 'tiposervicio' table and populate the dropdown
                $queryTipoServicio = "SELECT * FROM tiposervicio";
                $resultTipoServicio = mysqli_query($conexion, $queryTipoServicio);

                while ($rowTipoServicio = mysqli_fetch_assoc($resultTipoServicio)) {
                    echo '<option value="' . $rowTipoServicio['ID'] . '">' . $rowTipoServicio['Nombre'] . '</option>';
                }

                echo '</select>';
                echo '</div>';

                echo '<div class="mb-3">';
                //echo '<label for="precio" class="form-label">Precio:</label>';
                //echo '<input type="text" name="precio" id="precio" class="form-control" readonly required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<button type="submit" class="btn btn-success">Agregar Servicio</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                createBackButton();
            } else {
                echo '<p>No tiene permiso para registrar nuevos servicios.</p>';
                createBackButton();
            }

            echo '<div class="row mt-4">';
            echo '<div class="col-md-12">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title">Servicios Registrados</h2>';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Tipo de Vehículo</th>';
            echo '<th>Tipo de Servicio</th>';
            echo '<th>Precio</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $query = "SELECT * FROM Servicios WHERE Estado = 'Activo'";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['ID'] . '</td>';
                    echo '<td>' . $row['TipoVehiculo'] . '</td>';
                    echo '<td>' . $row['TipoServicio'] . '</td>';
                    echo '<td>' . $row['Precio'] . '</td>';
                    echo '<td>';
                    echo '<a href="edit_service.php?id=' . $row['ID'] . '" class="btn btn-warning">Editar</a>';
                    echo '<a href="deactivate_service.php?id=' . $row['ID'] . '" class="btn btn-danger ml-2">Dar de Baja</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo "No se encontraron servicios activos en la base de datos.";
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<button id="toggleInactiveTable" class="btn btn-secondary mt-3">Mostrar Servicios Dados de Baja</button>';

            echo '<div class="row mt-4" id="inactiveTable" style="display:none;">';
            echo '<div class="col-md-12">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title">Servicios Dados De Baja</h2>';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Tipo de Vehículo</th>';
            echo '<th>Tipo de Servicio</th>';
            echo '<th>Precio</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $queryInactive = "SELECT * FROM Servicios WHERE Estado = 'Inactivo'";
            $resultInactive = mysqli_query($conexion, $queryInactive);

            if (mysqli_num_rows($resultInactive) > 0) {
                while ($rowInactive = mysqli_fetch_assoc($resultInactive)) {
                    echo '<tr>';
                    echo '<td>' . $rowInactive['ID'] . '</td>';
                    echo '<td>' . $rowInactive['TipoVehiculo'] . '</td>';
                    echo '<td>' . $rowInactive['TipoServicio'] . '</td>';
                    echo '<td>' . $rowInactive['Precio'] . '</td>';
                    echo '<td><a href="activate_service.php?id=' . $rowInactive['ID'] . '" class="btn btn-success">Activar</a></td>';
                    echo '</tr>';
                }
            } else {
                echo "<p>No se encontraron servicios inactivos en la base de datos.</p>";
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "Debe iniciar sesión para acceder a esta página.";
            createBackButton();
        }
        ?>

        <!-- Botón para volver al menú principal -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="btn btn-primary" href="principal.php">Volver al Menú Principal</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
