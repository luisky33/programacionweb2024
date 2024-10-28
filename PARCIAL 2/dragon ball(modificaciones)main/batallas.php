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
    <title>Dashboard - Personajes</title>
</head>
<body>
    <div class="dashboard-main">
        <h1>gestiona tus batallas</h1>
        <div class="buttons-container">
         
            <form action="vercombates.php" method="get">
                <button type="submit">combates</button>
            </form>

            <!-- Botón para mostrar la lista de personajes -->
            <form action="personajesbatallas.php" method="get">
                <button type="submit">presonajes usados</button>
            </form>

            <!-- Botón para regresar a la página principal del dashboard -->
            <form action="dashboard.php" method="get">
                <button type="submit">Regresar</button>
            </form>
        </div>
    </div>
</body>
</html>
