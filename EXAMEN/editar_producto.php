<?php
session_start();
include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

 
    $query = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
    $query->execute(['id' => $id]);
    $producto = $query->fetch();

 
    if (!$producto) {
        die('Producto no encontrado.');
    }
} else {
    die('ID de producto no especificado.');
}


if (isset($_POST['add_stock'])) {
    $cantidad_a_agregar = $_POST['stock'];

    
    $nuevo_stock = $producto['stock'] + $cantidad_a_agregar;
    $query = $pdo->prepare("UPDATE productos SET stock = :stock WHERE id = :id");
    $query->execute(['stock' => $nuevo_stock, 'id' => $id]);

    header('Location: gestionar_producto.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Stock</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    background-image: url('backgrounds/fondo4.jpg');
    
    background-size: cover; 
    background-position: center;
    background-repeat: no-repeat; 
    background-attachment: scroll;

    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
        #btn-regresar {
    position: fixed;
    bottom: 20px;
    left: 20px;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}
.containerproduct{

    
background-color: #052743;
width: 250%;
max-width: 700px;
padding: 20px;
border-radius: 10px;
box-shadow: 0 16px 16px rgba(232, 182, 127 );
text-align: center;
color: azure;
}

.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #03ddff;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    font-size: 14px;
}
    </style>
</head>
<body>
<div class="containerproduct">
    <h3><?php echo $producto['nombre']; ?></h3>
    <p>Stock actual: <?php echo $producto['stock']; ?></p> 

    <form method="POST">
        <input type="number" name="stock" placeholder="Cantidad de stock a agregar" required>
        <button type="submit" name="add_stock">Agregar Stock</button>
    </form>
</div>
    
    <a href="gestionar_producto.php" id="btn-regresar">Regresar</a>
    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>
