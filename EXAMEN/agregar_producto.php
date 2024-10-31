<?php

require_once 'db.php'; 

if (isset($_POST['add_product'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query = $pdo->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)");
    $query->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'stock' => $stock]);

    header('Location: catalogo_productos.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    

<div class="register-container">
<form method="POST">
    <p class="pagrega">AGREGAR PRODUCTO</p>
    <input type="text" name="nombre" placeholder="Nombre del producto" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <input type="number" name="precio" step="0.01" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <button type="submit" name="add_product">Agregar Producto</button>
</form>
</div>
<footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
    </body>
</html>