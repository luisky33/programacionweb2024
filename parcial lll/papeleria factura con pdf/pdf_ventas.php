<?php
require('fpdf186/fpdf.php');

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


$query = "SELECT v.cantidad, v.total, p.nombre, p.precio 
          FROM ventas v 
          JOIN productos p ON v.producto_id = p.id 
          ORDER BY v.id DESC LIMIT 1";
$stmt = $pdo->query($query);
$venta = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$venta) {
    die("No se encontraron ventas recientes.");
}


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);


$pdf->Cell(190, 10, 'Factura de Compra', 0, 1, 'C');
$pdf->Ln(10);


$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(80, 10, 'Producto', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Precio Unitario', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Cantidad', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Total', 1, 1, 'C', true);


$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 10, $venta['nombre'], 1, 0, 'C');
$pdf->Cell(40, 10, '$' . number_format($venta['precio'], 2), 1, 0, 'C');
$pdf->Cell(30, 10, $venta['cantidad'], 1, 0, 'C');
$pdf->Cell(40, 10, '$' . number_format($venta['total'], 2), 1, 1, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Gracias por su compra', 0, 1, 'C');


$pdf->Output('I', 'Factura_' . time() . '.pdf');
?>