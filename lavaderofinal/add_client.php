<!DOCTYPE html>
<html>
<head>
    <title>Alta de Cliente</title>
</head>
<body>
    <h1>Alta de Cliente</h1>

    <?php
    include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recupera los datos del formulario
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        // Aquí puedes agregar validaciones de datos, como comprobar que los campos no estén vacíos

        // Prepara la consulta SQL para insertar el nuevo cliente en la base de datos
        $query = "INSERT INTO Clientes (Nombre, DNI, Telefono, Email) VALUES ('$nombre', '$dni', '$telefono', '$email')";

        // Ejecuta la consulta
        if (mysqli_query($conexion, $query)) {
            // El cliente se agregó con éxito, puedes redirigir al usuario a la página de clientes o mostrar un mensaje de éxito
            header("Location: clients.php");
        } else {
            // Si ocurrió un error en la consulta, muestra un mensaje de error
            echo "Error al agregar el cliente: " . mysqli_error($conexion);
        }
    }
    ?>

    <!-- Aquí puedes agregar el formulario para dar de alta un nuevo cliente -->
</body>
</html>
