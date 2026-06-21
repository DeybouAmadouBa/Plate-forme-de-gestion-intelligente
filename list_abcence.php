<?php
include "Menu.php";
include "db.php";

$sql = "SELECT
            absences.id,
            absences.date_absence,
            absences.motif,
            etudiants.nom,
            etudiants.prenom
        FROM absences
        INNER JOIN etudiants
        ON absences.etudiant_id = etudiants.id";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Erreur SQL : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Liste des absences</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>📋 Liste des absences</h2>

<a href="add_absence.php"
   class="btn btn-primary mb-3">
   Ajouter une absence
</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Étudiant</th>
    <th>Date</th>
    <th>Motif</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>

<?php if(mysqli_num_rows($result) > 0){ ?>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td>
<?= $row['nom']; ?>
<?= $row['prenom']; ?>
</td>

<td><?= $row['date_absence']; ?></td>

<td><?= $row['motif']; ?></td>

<td>

<a href="edit_absence.php?id=<?= $row['id']; ?>"
   class="btn btn-warning btn-sm">
   Modifier
</a>

<a href="delete_absence.php?id=<?= $row['id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Voulez-vous supprimer cette absence ?')">
   Supprimer
</a>

</td>

</tr>

<?php } ?>

<?php } else { ?>

<tr>
<td colspan="5" class="text-center">
Aucune absence enregistrée
</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "footer.php"; ?>

</body>
</html>