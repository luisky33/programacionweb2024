<?php
$host = 'localhost';
$db = 'papeleria';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

  
    $query = "SELECT nombre, precio, stock FROM productos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $producto_id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        echo json_encode(["error" => "Producto no encontrado"]);
        exit;
    }

  
    if ($producto['stock'] < $cantidad) {
        echo json_encode(["error" => "Stock insuficiente"]);
        exit;
    }

  
    $total = $producto['precio'] * $cantidad;

  
    $query = "INSERT INTO ventas (producto_id, vendedor_id, cantidad, total) VALUES (:producto_id, :vendedor_id, :cantidad, :total)";
    $stmt = $pdo->prepare($query);
    $vendedor_id = 1; 
  
    if ($stmt->execute(['producto_id' => $producto_id, 'vendedor_id' => $vendedor_id, 'cantidad' => $cantidad, 'total' => $total])) {
      
        $nuevo_stock = $producto['stock'] - $cantidad;
        $update_query = "UPDATE productos SET stock = :stock WHERE id = :id";
        $update_stmt = $pdo->prepare($update_query);
        $update_stmt->execute(['stock' => $nuevo_stock, 'id' => $producto_id]);

    
        
        
        echo "<div class='tablavender'>";
        echo "GRACIAS POR COMPRAR";
        echo "<table border='2'>";
        echo "<tr><td>Producto</td><td>{$producto['nombre']}</td></tr>";
        echo "<tr><td>Precio Unitario</td><td>\${$producto['precio']}</td></tr>";
        echo "<tr><td>Cantidad</td><td>{$cantidad}</td></tr>";
        echo "<tr><td>Total</td><td>\${$total}</td></tr>";
        echo "</table>";
        echo "</Div>";
       
    } else {
        echo json_encode(["error" => "Error al registrar la venta"]);
    }
} else {
    echo json_encode(["error" => "no permitido"]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<a href="Gestionar_ventas.php" id="btn-regresar">Regresar</a>
<footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>
