<?php
include 'db.php';

if (isset($_POST['register'])) { 
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $checkEmail = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $checkEmail->execute(['email' => $email]);
    
    if ($checkEmail->rowCount() > 0) {
        $error = "El correo ya está registrado.";
    } else {
      
        $query = $pdo->prepare("INSERT INTO users (rol, email, password, avatar) VALUES (:rol, :email, :password, :avatar)");
        $query->execute(['rol' => $rol, 'email' => $email, 'password' => $password, 'avatar' => $avatar]);

        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro - Torneo de Artes Marciales</title>
</head>
<body>
    <div class="register-container">
        <h2>Registrarse</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="rol">Tipo de usuario:</label>
            <select id="rol" name="rol" required>
                <option value="" disabled selected>Seleccione el tipo</option>
                <option value="admin">Admin</option>
                <option value="vendedor">Vendedor</option>
            </select>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="register">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
    </div>
    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>