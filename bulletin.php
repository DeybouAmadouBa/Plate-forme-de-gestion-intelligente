<?php
require 'vendor/autoload.php';
require 'config/database.php';

// Sécurité
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

// Récupérer étudiant (sécurisé)
$stmt = $conn->prepare("SELECT * FROM etudiants WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$etudiant = $result->fetch_assoc();

if (!$etudiant) {
    die("Étudiant non trouvé");
}

$nom = $etudiant['nom'] . " " . $etudiant['prenom'];
$classe = $etudiant['classe'];

// Récupérer notes
$stmt2 = $conn->prepare("SELECT * FROM notes WHERE etudiant_id = ?");
$stmt2->bind_param("i", $id);
$stmt2->execute();
$result2 = $stmt2->get_result();

$notes = [];
while ($row = $result2->fetch_assoc()) {
    $notes[] = $row;
}

// Calcul moyenne
$total = 0;
foreach ($notes as $n) {
    $total += $n['note'];
}
$moyenne = count($notes) > 0 ? $total / count($notes) : 0;

// Mention + appréciation
if ($moyenne >= 16) {
    $mention = "Très Bien";
    $appreciation = "Excellent travail";
} elseif ($moyenne >= 14) {
    $mention = "Bien";
    $appreciation = "Bon travail";
} elseif ($moyenne >= 12) {
    $mention = "Assez Bien";
    $appreciation = "Peut mieux faire";
} else {
    $mention = "Passable";
    $appreciation = "Insuffisant";
}

// PDF
$pdf = new TCPDF();
$pdf->SetCreator('Gestion scolaire');
$pdf->SetAuthor('Plateforme');
$pdf->SetTitle('Bulletin de notes');

$pdf->AddPage();

// HTML DESIGN
$html = "
<h1 style='text-align:center;'>📘 Bulletin de notes</h1>
<hr>

<p><strong>Nom :</strong> $nom</p>
<p><strong>Classe :</strong> $classe</p>

<br>

<table border='1' cellpadding='8'>
<tr style='background-color:#f2f2f2;'>
<th width='70%'>Matière</th>
<th width='30%'>Note</th>
</tr>
";

foreach ($notes as $n) {
    $html .= "
    <tr>
        <td>{$n['matiere']}</td>
        <td>{$n['note']}</td>
    </tr>";
}

$html .= "
</table>

<br>

<h3>Moyenne : $moyenne</h3>
<h3>Mention : $mention</h3>
<p><strong>Appréciation :</strong> $appreciation</p>

<br><br>

<p>Signature du responsable :</p>
";

// Générer PDF
$pdf->writeHTML($html);

// Afficher
$pdf->Output('bulletin.pdf', 'I');