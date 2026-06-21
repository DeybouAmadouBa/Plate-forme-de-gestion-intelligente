<?php
require 'vendor/autoload.php';

$pdf = new \TCPDF();
$pdf->AddPage();
$pdf->Write(0, 'Hello World PDF');

// chemin absolu (IMPORTANT)
$pdf->Output(__DIR__ . '/test.pdf', 'F');

echo "PDF généré";
