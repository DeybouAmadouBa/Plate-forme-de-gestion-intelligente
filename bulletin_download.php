<?php
require 'vendor/autoload.php';
require 'config/database.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

// récupérer données (copie de bulletin.php)
$stmt = $conn->prepare("SELECT * FROM etudiants WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$etudiant = $stmt->get_result()->fetch_assoc();

$stmt2 = $conn->prepare("SELECT * FROM notes WHERE etudiant_id = ?");
$stmt2->bind_param("i", $id);
$stmt2->execute();
$result2 = $stmt2->get_result();

$notes = [];
while ($row = $result2->fetch_assoc()) {
    $notes[] = $row;
}

// moyenne
$total = 0;
foreach ($notes as $n) {
    $total += $n['note'];
}
$moyenne = count($notes) ? $total / count($notes) : 0;

// PDF
$pdf = new TCPDF();
$pdf->AddPage();

$html = "<h1>Bulletin</h1>";
$html .= "<p>".$etudiant['nom']." ".$etudiant['prenom']."</p>";

$pdf->writeHTML($html);

// 👉 Télécharger directement
$pdf->Output('bulletin_'.$id.'.pdf', 'D');