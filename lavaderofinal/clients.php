<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Clientes</title>
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .inactive-table {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#toggleInactiveTable").click(function(){
                $("#inactiveTable").toggle();
            });
        });
    </script>
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
</head>

<body>
    <div class="container mt-5">
        <h1 class="mt-4">Gestión de Clientes</h1>

        <!-- Formulario para dar de alta un nuevo cliente -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Alta de Cliente</h2>
                        <form method="post" action="add_client.php">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required pattern="[A-Za-zÁ-Úá-ú\s]{2,50}" title="Nombre debe contener solo letras y espacios, con longitud entre 2 y 50 caracteres. No se permiten números ni caracteres especiales.">
                        </div>
                            <div class="form-group">
                                <label for="dni">DNI:</label>
                                <input type="text" name="dni" id="dni" class="form-control" required pattern="\d{7,8}" title="DNI debe tener 7 u 8 dígitos">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" name="telefono" id="telefono" class="form-control" pattern="[0-9]{10}" title="Teléfono debe contener 10 dígitos numéricos">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" maxlength="50">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" onclick="return confirm('¿Estás seguro de agregar este cliente?')">Agregar Cliente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla para mostrar los clientes activos -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Clientes Activos</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db_connection.php';

                                // Realiza la consulta para obtener los clientes activos desde la base de datos
                                $queryActive = "SELECT * FROM Clientes WHERE Estado = 'Activo'";
                                $resultActive = mysqli_query($conexion, $queryActive);

                                // Muestra la tabla de clientes activos
                                if (mysqli_num_rows($resultActive) > 0) {
                                    while ($rowActive = mysqli_fetch_assoc($resultActive)) {
                                        echo '<tr>';
                                        echo '<td>' . $rowActive['ID'] . '</td>';
                                        echo '<td>' . $rowActive['Nombre'] . '</td>';
                                        echo '<td>' . $rowActive['DNI'] . '</td>';
                                        echo '<td>' . $rowActive['Telefono'] . '</td>';
                                        echo '<td>' . $rowActive['Email'] . '</td>';
                                        // Puedes agregar enlaces o botones para editar o eliminar clientes aquí
                                        echo '<td><a href="edit_client.php?id=' . $rowActive['ID'] . '" class="btn btn-warning">Editar</a> | <a href="delete_client.php?id=' . $rowActive['ID'] . '" class="btn btn-danger">Eliminar</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<p>No se encontraron clientes activos en la base de datos.</p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón para mostrar/ocultar la tabla de clientes inactivos -->
        <button id="toggleInactiveTable" class="btn btn-secondary mt-3">Mostrar Clientes Inactivos</button>

        <!-- Tabla para mostrar los clientes inactivos (inicialmente oculta) -->
        <div class="row mt-4 inactive-table" id="inactiveTable">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Clientes Inactivos</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Realiza la consulta para obtener los clientes inactivos desde la base de datos
                                $queryInactive = "SELECT * FROM Clientes WHERE Estado = 'Inactivo'";
                                $resultInactive = mysqli_query($conexion, $queryInactive);

                                // Muestra la tabla de clientes inactivos
                                if (mysqli_num_rows($resultInactive) > 0) {
                                    while ($rowInactive = mysqli_fetch_assoc($resultInactive)) {
                                        echo '<tr>';
                                        echo '<td>' . $rowInactive['ID'] . '</td>';
                                        echo '<td>' . $rowInactive['Nombre'] . '</td>';
                                        echo '<td>' . $rowInactive['DNI'] . '</td>';
                                        echo '<td>' . $rowInactive['Telefono'] . '</td>';
                                        echo '<td>' . $rowInactive['Email'] . '</td>';
                                        // Botón para dar de alta nuevamente al cliente
                                        echo '<td><a href="activate_client.php?id=' . $rowInactive['ID'] . '" class="btn btn-success">Dar de Alta</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<p>No se encontraron clientes inactivos en la base de datos.</p>";
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
