<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php');
    exit();
}




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = $pdo->prepare("DELETE FROM productos WHERE id = :id");
    $query->execute(['id' => $id]);

    header('Location: gestionar_producto.php');
    exit();
}

$query = $pdo->query("SELECT * FROM productos");
$productos = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="containerproduct">
        <table>
        <div class="header-title">Productos Existentes</div> 
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td>
                            <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a>
                            <a href="gestionar_producto.php?delete=<?php echo $producto['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este producto?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="agregar_producto.php" id="btn-add">Agregar Producto</a>
    <a href="admin.php" id="btn-regresar">Regresar</a>
    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>
