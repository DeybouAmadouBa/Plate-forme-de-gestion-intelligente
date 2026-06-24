<?php
include "Menu.php";
include "db.php";

$sql = "SELECT a.id, e.nom, e.prenom, a.date_absence, a.motif
        FROM absences a
        JOIN etudiants e ON a.etudiant_id = e.id
        ORDER BY a.date_absence DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste des absences</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-4" style="margin-left:280px;width:calc(100% - 300px);">
<h2>📋 Liste des absences</h2>

<a href="add_absence.php" class="btn btn-primary mb-3">Ajouter une absence</a>

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

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['nom']." ".$row['prenom']; ?></td>
<td><?php echo $row['date_absence']; ?></td>
<td><?php echo $row['motif']; ?></td>
<td>
<a href="edit_absence.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
<a href="delete_absence.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer cette absence ?')">Supprimer</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>
</div>

</body>
</html>
