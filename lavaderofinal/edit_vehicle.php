<!DOCTYPE html>
<html>
<head>
    <title>Editar Vehículo</title>
    <!-- Vincula Bootstrap (CDN) -->
    <!-- Agrega enlaces a las bibliotecas de Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
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
    <div class="container mt-5">
        <h1 class="mt-4">Editar Vehículo</h1>

        <?php
            include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
                $vehicle_id = $_GET['id'];

                // Realiza una consulta para obtener los datos del vehículo específico
                $query = "SELECT * FROM Vehiculos WHERE ID = $vehicle_id";
                $result = mysqli_query($conexion, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    // Muestra un formulario con los datos del vehículo para su edición
                    echo '<div class="row mt-4">';
                    echo '<div class="col-md-6">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h2 class="card-title">Editar Vehículo</h2>';
                    echo '<form method="post" action="update_vehicle.php">';
                    echo '<input type="hidden" name="id" value="' . $row['ID'] . '">';
                    echo '<div class="mb-3">';
                    echo '<label for="marca" class="form-label">Marca:</label>';
                    echo '<input type="text" name="marca" id="marca" class="form-control" value="' . $row['Marca'] . '" required pattern="[a-zA-Z]+" title="Solo se permite texto en este campo" maxlength="20">';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="modelo" class="form-label">Modelo:</label>';
                    echo '<input type="text" name="modelo" id="modelo" class="form-control" value="' . $row['Modelo'] . '" required pattern="[a-zA-Z0-9]+" title="Solo se permite texto y números en este campo" maxlength="20">';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="ano" class="form-label">Año:</label>';
                    echo '<input type="text" name="ano" id="ano" class="form-control" value="' . $row['Año'] . '" required pattern="^(19[2-9]\d|20\d{2})$" title="Año debe tener 4 dígitos y ser mayor a 1900" maxlength="4">';
                    echo '</div>';
                    echo '<div class="mb-3">';                                                                                        
                    echo '<label for="placa" class="form-label">Placa:</label>';
                    echo '<input type="text" name="placa" id="placa" class="form-control" value="' . $row['Placa'] . '" required pattern="^([a-zA-Z]{3}\d{3})|([a-zA-Z]{2}\d{3}[a-zA-Z]{2})|(\d{6})$" title="Formato inválido de placa">';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<button type="submit" class="btn btn-primary">Actualizar Vehículo</button>';
                    // Agrega el botón "Volver Atrás" para regresar a la página anterior
                    echo '<a href="vehicles.php" class="btn btn-secondary">Volver Atrás</a>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo "No se encontró el vehículo especificado.";
                }
            } else {
                echo "Parámetros de URL inválidos.";
            }

            // Cierra la conexión a la base de datos
            mysqli_close($conexion);
        ?>
    </div>
</body>
</html>
