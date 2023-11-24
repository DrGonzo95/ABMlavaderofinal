<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Vehículos</title>
    <!-- Vincula Bootstrap (CDN) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .inactive-table {
            display: none;
        }
    </style>
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
        $(document).ready(function(){
            $("#toggleInactiveTable").click(function(){
                $("#inactiveTable").toggle();
            });
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mt-4">Gestión de Vehículos</h1>
    
   <!-- Formulario para agregar nuevos vehículos -->
   <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Agregar Nuevo Vehículo</h2>
                        <form method="post" action="add_vehicle.php">
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca:</label>
                                <input type="text" name="marca" id="marca" class="form-control" required pattern="[a-zA-Z]+" title="Solo se permite texto en este campo" maxlength="20">
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo:</label>
                                <input type="text" name="modelo" id="modelo" class="form-control" required pattern="[a-zA-Z0-9]+" title="Solo se permite texto y números en este campo" maxlength="20">
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Año:</label>
                                <input type="text" name="ano" id="ano" class="form-control" required pattern="^19[2-9]\d$|^20\d{2}$" title="Año debe tener 4 dígitos y ser mayor a 1900">
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa:</label>
                                <input type="text" name="placa" id="placa" class="form-control" required pattern="^([a-zA-Z]{3}\d{3})|([a-zA-Z]{2}\d{3}[a-zA-Z]{2})|(\d{6})$" title="Formato inválido de placa">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Agregar Vehículo</button>
                            </div>
                            <div class="mb-3">
                                <button id="toggleInactiveTable" class="btn btn-secondary mt-3">Mostrar Vehículos Dados de Baja</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Tabla para mostrar los vehículos activos -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Vehículos Activos</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Placa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db_connection.php';

                                // Realiza la consulta para obtener los vehículos activos desde la base de datos
                                $query = "SELECT * FROM Vehiculos WHERE Estado = 'Activo'";
                                $result = mysqli_query($conexion, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['ID'] . '</td>';
                                        echo '<td>' . $row['Marca'] . '</td>';
                                        echo '<td>' . $row['Modelo'] . '</td>';
                                        echo '<td>' . $row['Año'] . '</td>';
                                        echo '<td>' . $row['Placa'] . '</td>';
                                        echo '<td><a href="edit_vehicle.php?id=' . $row['ID'] . '" class="btn btn-warning">Editar</a> | <a href="delete_vehicle.php?id=' . $row['ID'] . '" class="btn btn-danger">Eliminar</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<p>No se encontraron vehículos activos en la base de datos.</p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla para mostrar los vehículos inactivos (inicialmente oculta) -->
        <div class="row mt-4 inactive-table" id="inactiveTable">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Vehículos Dados De Baja</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Placa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Realiza la consulta para obtener los vehículos inactivos desde la base de datos
                                $queryInactive = "SELECT * FROM Vehiculos WHERE Estado = 'Inactivo'";
                                $resultInactive = mysqli_query($conexion, $queryInactive);

                                if (mysqli_num_rows($resultInactive) > 0) {
                                    while ($rowInactive = mysqli_fetch_assoc($resultInactive)) {
                                        echo '<tr>';
                                        echo '<td>' . $rowInactive['ID'] . '</td>';
                                        echo '<td>' . $rowInactive['Marca'] . '</td>';
                                        echo '<td>' . $rowInactive['Modelo'] . '</td>';
                                        echo '<td>' . $rowInactive['Año'] . '</td>';
                                        echo '<td>' . $rowInactive['Placa'] . '</td>';
                                        echo '<td> <a href="activate_vehicle.php?id=' . $rowInactive['ID'] . '" class="btn btn-success">Dar de Alta</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<p>No se encontraron vehículos inactivos en la base de datos.</p>";
                                }

                                // Cierra la conexión a la base de datos
                                mysqli_close($conexion);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
