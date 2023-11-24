<?php
// Inicia la sesión (asegúrate de que esto esté presente en todas las páginas)
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión o a donde desees
header("Location: login.html");
exit;
?>
