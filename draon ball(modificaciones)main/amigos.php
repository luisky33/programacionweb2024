<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard - amigoslista</title>
</head>
<body>
    <div class="dashboard-main">
        <h1>gestiona tus amigos</h1>
        <div class="buttons-container">
         
            <form action="amigoslista.php" method="get">
                <button type="submit">lista de amigos</button>
            </form>

            <!-- Botón para mostrar la lista de personajes -->
            <form action="soplicitud.php" method="get">
                <button type="submit">solicitud de amistad</button>
            </form>

            <!-- Botón para regresar a la página principal del dashboard -->
            <form action="dashboard.php" method="get">
                <button type="submit">Regresar</button>
            </form>
        </div>
    </div>
</body>
</html>
