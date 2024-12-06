<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php');
    exit();
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $query->execute(['id' => $id]);

    header('Location: Gestionar_usuarios.php');
    exit();
}


$query = $pdo->query("SELECT * FROM users");
$usuarios = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="header-title"><h1>Gestionar Usuarios</h1>
    <table>
        
        <thead>
            <tr>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['rol']; ?></td>
                    <td>
                        <a href="Gestionar_usuarios.php?delete=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="agregar_usuario.php" id="btn-add">agregar usuario</a>
    <a href="admin.php" id="btn-regresar">Regresar</a>

    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>