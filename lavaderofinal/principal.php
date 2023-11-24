



<!DOCTYPE html>
<html>

<head>
    <title>Página Principal</title>
    <!-- Vincula Bootstrap (CDN) -->
    <!-- Agrega enlaces a las bibliotecas de Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Agrega un estilo personalizado -->
        <style>
        body {
            background: url('fondo2.jpg') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
            padding: 50px;
            margin: 0;
            height: 100vh;
            color: white;
            /* Cambia el color del texto si es necesario para que sea legible en la imagen de fondo */
        }
        
        .login-form {
            max-width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            /* Agrega un fondo semitransparente para que el formulario sea legible */
            padding: 20px;
            border-radius: 40px;
            /* Agrega esquinas redondeadas al formulario si lo deseas */
        }
        
        h1 {
            color: rgb(0, 0, 0);
            /* Cambia el color del encabezado si es necesario para que sea legible en la imagen de fondo */
        }
        </style>
</head>




<body style="background-color: #f8f9fa;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Bienvenido a la Página Principal</h1>
                        <p class="card-text">Esta es la página principal de tu aplicación de lavadero de autos.</p>
                        <p class="card-text">Desde aquí, puedes acceder a las diferentes secciones de la aplicación:</p>
                        <table class="table text-center">
                            <tbody>
                                <tr>
                                    <td><a class="btn btn-primary" href="vehicles.php">Gestión de Vehículos</a></td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-primary" href="clients.php">Gestión de Clientes</a></td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-primary" href="services.php">Gestión de Servicios</a></td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-danger" href="logout.php">Cerrar Sesión</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
