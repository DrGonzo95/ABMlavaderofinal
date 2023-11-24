<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Servicios</title>
</head>
<body>
    <h1>Gestión de Servicios</h1>

    <?php
    session_start(); // Inicia la sesión
    include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

    if (isset($_SESSION['rol'])) {
        $rol = $_SESSION['rol'];

        // Verifica el rol del usuario y muestra u oculta el formulario de alta de servicios
        if ($rol === 'Administrador') {
            echo '<h2>Alta de Servicio</h2>';
            echo '<form method="post" action="add_service.php">';
            echo 'Nombre: <input type="text" name="nombre" required><br>';
            echo 'Precio: <input type="text" name="precio" required><br>';
            echo '<input type="submit" value="Agregar Servicio">';
            echo '</form>';
        } else {
            echo '<p>No tiene permiso para registrar nuevos servicios.</p>';
        }

        // Aquí puedes agregar una tabla para mostrar los servicios existentes
        echo '<h2>Servicios Registrados</h2>';
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Nombre</th>';
        echo '<th>Precio</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';

        // Realiza una consulta para obtener los servicios desde la base de datos
        $query = "SELECT * FROM Servicios";
        $result = mysqli_query($conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['Nombre'] . '</td>';
                echo '<td>' . $row['Precio'] . '</td>';
                // Puedes agregar enlaces o botones para editar o eliminar servicios aquí
                echo '<td><a href="edit_service.php?id=' . $row['ID'] . '">Editar</a> | <a href="delete_service.php?id=' . $row['ID'] . '">Eliminar</a></td>';
                echo '</tr>';
            }
        } else {
            echo "No se encontraron servicios en la base de datos.";
        }
    } else {
        echo "Debe iniciar sesión para acceder a esta página.";
    }
    ?>
    </table>
</body>
</html>
