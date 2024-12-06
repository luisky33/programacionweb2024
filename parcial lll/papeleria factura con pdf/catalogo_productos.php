<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}


$query = $pdo->query("SELECT * FROM productos");
$productos = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="header-title">Catálogo de Productos<div>
    <table class="tablaproducto">

      
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($producto['precio'], 2)); ?></td>
                    <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="vendedor.php" id="btn-regresar">Regresar</a>
    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>