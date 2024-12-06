<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'vendedor') {
    header('Location: index.php');
    exit();
}

if (isset($_POST['vender'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    

    $query = $pdo->prepare("SELECT precio FROM productos WHERE id = :id");
    $query->execute(['id' => $producto_id]);
    $producto = $query->fetch();
    $total = $producto['precio'] * $cantidad;

    $query = $pdo->prepare("INSERT INTO ventas (producto_id, vendedor_id, cantidad, total) VALUES (:producto_id, :vendedor_id, :cantidad, :total)");
    $query->execute(['producto_id' => $producto_id, 'vendedor_id' => $_SESSION['user_id'], 'cantidad' => $cantidad, 'total' => $total]);


    $query = $pdo->prepare("UPDATE productos SET stock = stock - :cantidad WHERE id = :id");
    $query->execute(['cantidad' => $cantidad, 'id' => $producto_id]);

    header('Location: ventas.php');
    exit();
}


$query = $pdo->query("SELECT * FROM productos WHERE stock > 0");
$productos = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title class="tituloventas">Registrar Ventas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="ventascont">
    
    <form method="POST" action="ventas.php">
    <div class="ventasre">Vender</div>
    <label for="producto">Producto:</label>
    <select name="producto_id" required>
        <?php foreach ($productos as $producto): ?>
            <option value="<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" min="1" required>

    <button type="submit" name="vender">Vender</button>
</form>
</div>
    <a href="vendedor.php" id="btn-regresar">Regresar</a>
    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>