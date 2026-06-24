<?php
require('fpdf.php');

$conn = new mysqli("localhost", "root", "", "gestion_scolaire");

$id = (int) $_GET['id'];

/* étudiant */
$etudiant = $conn->query("SELECT * FROM etudiants WHERE id=$id")->fetch_assoc();

$notes = $conn->query("SELECT * FROM notes WHERE etudiant_id=$id");

$pdf = new FPDF();
$pdf->AddPage();

# =========================
# 🎨 COULEUR EN-TÊTE
# =========================
$pdf->SetFillColor(30, 144, 255); // bleu
$pdf->SetTextColor(255, 255, 255); // blanc
$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,12,'BULLETIN DE NOTES',1,1,'C',true);

$pdf->Ln(5);

# =========================
# 👨‍🎓 INFO ÉTUDIANT
# =========================
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);

$pdf->Cell(190,10,"Nom: ".$etudiant['nom'],0,1);

$pdf->Ln(5);

# =========================
# 📊 TABLEAU AVEC BORDURES
# =========================
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(220,220,220); // gris clair

$pdf->Cell(95,10,'Matiere',1,0,'C',true);
$pdf->Cell(95,10,'Note',1,1,'C',true);

$pdf->SetFont('Arial','',12);

$total = 0;
$nb = 0;

while($row = $notes->fetch_assoc()){

    if (!empty($row['matiere'])) {

        $pdf->Cell(95,10,$row['matiere'],1,0,'C');
        $pdf->Cell(95,10,$row['note'],1,1,'C');

        $total += $row['note'];
        $nb++;
    }
}
# =========================
# 📈 MOYENNE + APPRÉCIATION
# =========================
$moyenne = ($nb > 0) ? $total / $nb : 0;

if ($moyenne >= 16) $app = "Excellent";
elseif ($moyenne >= 14) $app = "Tres bien";
elseif ($moyenne >= 12) $app = "Bien";
elseif ($moyenne >= 10) $app = "Passable";
else $app = "Insuffisant";

$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,"Moyenne: ".round($moyenne,2),1,1,'C');

$pdf->Cell(190,10,"Appreciation: ".$app,1,1,'C');

$pdf->Output();
?>