<!DOCTYPE html>
<html>
<head>
    <title>Error de inicio de sesión</title>
    <!-- Agrega enlaces a las bibliotecas de Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

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
            border-radius: 10px;
            /* Agrega esquinas redondeadas al formulario si lo deseas */
        }
        
        h1 {
            color: rgb(0, 0, 0);
            /* Cambia el color del encabezado si es necesario para que sea legible en la imagen de fondo */
        }
    </style>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Error de inicio de sesión</h1>
                        <p class="card-text">
                            <?php
                            // Muestra el mensaje de error si está definido
                            if (isset($_SESSION['error_message'])) {
                                echo $_SESSION['error_message'];
                                // Limpia la variable de sesión después de mostrar el mensaje
                                unset($_SESSION['error_message']);
                            } else {
                                echo "Se produjo un error de inicio de sesión.";
                            }
                            ?>
                        </p>
                        <p class="card-text">
                            <a href="login.html" class="btn btn-primary">Volver a Iniciar Sesión</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
