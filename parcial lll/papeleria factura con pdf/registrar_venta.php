<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Ventas</title>
    <link rel="stylesheet" href="styles.css">
    <style>
     
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
            position: relative;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Registrar Ventas</h2>


    <form id="ventaForm" method="POST">
        <label for="producto">Producto:</label>
        <select name="producto_id" required>
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" min="1" required>

        <button type="submit">Vender</button>
    </form>


    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">×</span>
            <h3>Factura de Compra</h3>
            <p><strong>Producto:</strong> <span id="producto"></span></p>
            <p><strong>Cantidad:</strong> <span id="cantidad"></span></p>
            <p><strong>Total:</strong> $<span id="total"></span></p>
        </div>
    </div>

    <script>
      
        document.getElementById('ventaForm').addEventListener('submit', function(event) {
            event.preventDefault(); 

         
            const formData = new FormData(this);

            fetch('ventas.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error); 
                } else {
                    
                    document.getElementById('producto').innerText = data.producto;
                    document.getElementById('cantidad').innerText = data.cantidad;
                    document.getElementById('total').innerText = data.total.toFixed(2);

                    document.getElementById('modal').style.display = 'flex';
                }
            })
            .catch(error => console.error('Error:', error));
        });

      
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
    <footer class="footer">
        Autores: Luis Antoniomeza Robles y Joel Alejandro Gutiérrez Moreno.
    </footer>
</body>
</html>
