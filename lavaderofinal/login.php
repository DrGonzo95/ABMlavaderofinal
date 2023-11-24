<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <?php
    session_start(); // Inicia la sesión
    include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recupera los datos del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Consulta la base de datos para verificar las credenciales del usuario
        $query = "SELECT * FROM Usuarios WHERE nombre = '$username' AND Contraseña = '$password'";
        $result = mysqli_query($conexion, $query);

        if (mysqli_num_rows($result) == 1) {
            // Las credenciales son válidas, obtén el rol del usuario
            $row = mysqli_fetch_assoc($result);
            $rol = $row['Rol'];

            // Almacena el rol en una variable de sesión
            $_SESSION['rol'] = $rol;

            // Redirige según el rol del usuario
            header("Location: principal.php");
            
        } else {
            echo "Credenciales incorrectas. Por favor, intente nuevamente.";
            header("Location: error.php");
            //header("Location: login.html");
        }
    }
    ?>

    <form id="login-form" method="post" action="login.php">
        <label>Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
