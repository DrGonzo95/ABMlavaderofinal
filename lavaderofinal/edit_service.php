<!DOCTYPE html>
<html>

<head>
    <title>Editar Servicio</title>
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

       <!-- Agrega un estilo personalizado -->
       <style>

        html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        }

        body {
            /* background-color: #f2f2f2; */
            text-align: center;
            padding: 50px;
            background-image: linear-gradient(#FFFFFF, rgb(255, 122, 89));
        }
        
        .login-form {
            max-width: 300px;
            margin: 0 auto;
        }
    </style>

<body>

    <div class="container">
        <h1 class="mt-4">Editar Servicio</h1>

        <?php
        include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recupera los datos del formulario
            $service_id = $_POST['id'];
            $tipoServicioID = $_POST['tipo_servicio'];
            $tipoVehiculo = $_POST['tipo_vehiculo'];

            

            // Obtén el nombre del tipo de servicio
            $queryTipoServicio = "SELECT Nombre FROM tiposervicio WHERE ID = $tipoServicioID";
            $resultTipoServicio = mysqli_query($conexion, $queryTipoServicio);
            $rowTipoServicio = mysqli_fetch_assoc($resultTipoServicio);
            $tipoServicioNombre = $rowTipoServicio['Nombre'];

            // Prepara la consulta SQL para actualizar los datos del servicio
            $query = "UPDATE Servicios SET TipoServicio = '$tipoServicioNombre', TipoVehiculo = '$tipoVehiculo' WHERE ID = $service_id";

            // Ejecuta la consulta
            if (mysqli_query($conexion, $query)) {
                // Los datos del servicio se actualizaron con éxito, redirige al usuario a la página de servicios
                header("Location: services.php");
                exit; // Asegúrate de salir del script para evitar cualquier otra salida
            } else {
                echo "Error al actualizar el servicio: " . mysqli_error($conexion);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $service_id = $_GET['id'];

            // Realiza una consulta para obtener los datos del servicio específico
            $query = "SELECT * FROM Servicios WHERE ID = $service_id";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                // Fetch available  tipo_servicio
                $queryTipoServicio = "SELECT * FROM tiposervicio";
                $resultTipoServicio = mysqli_query($conexion, $queryTipoServicio);

                // Fetch available  tipo_vehiculo
                $queryTipoVehiculo = "SELECT * FROM tipovehiculo";
                $resultTipoVehiculo = mysqli_query($conexion, $queryTipoVehiculo);

                // Muestra un formulario con los datos del servicio para su edición
                echo '<div class="row mt-4">';
                echo '<div class="col-md-6">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">Editar Servicio</h2>';
                echo '<form method="post" action="edit_service.php">';
                echo '<input type="hidden" name="id" value="' . $row['ID'] . '">';

                //  tipo_servicio
                echo '<div class="mb-3">';
                echo '<label for="tipo_servicio" class="form-label">Tipo de Servicio:</label>';
                echo '<select name="tipo_servicio" class="form-control">';
                while ($rowTipoServicio = mysqli_fetch_assoc($resultTipoServicio)) {
                    $selected = ($rowTipoServicio['ID'] == $row['TipoServicio']) ? 'selected' : '';
                    echo '<option value="' . $rowTipoServicio['ID'] . '" ' . $selected . '>' . $rowTipoServicio['Nombre'] . '</option>';
                }
                echo '</select>';
                echo '</div>';

                //  tipo_vehiculo
                echo '<div class="mb-3">';
                echo '<label for="tipo_vehiculo" class="form-label">Tipo de Vehículo:</label>';
                echo '<select name="tipo_vehiculo" class="form-control">';
                while ($rowTipoVehiculo = mysqli_fetch_assoc($resultTipoVehiculo)) {
                    $selected = ($rowTipoVehiculo['tipo'] == $row['TipoVehiculo']) ? 'selected' : '';
                    echo '<option value="' . $rowTipoVehiculo['tipo'] . '" ' . $selected . '>' . $rowTipoVehiculo['tipo'] . '</option>';
                }
                echo '</select>';
                echo '</div>';

                echo '<div class="mb-3">';
                echo '<button type="submit" class="btn btn-primary">Actualizar Servicio</button>';
                echo '</div>';
                echo '</form>';
                // menu principal
                echo '<a href="services.php" class="btn btn-secondary">Volver atrás</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "No se encontró el servicio especificado.";
            }
        } else {
            echo "Parámetros de URL inválidos.";
        }
        ?>
    </div>
</body>

</html>
