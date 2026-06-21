<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM professeurs");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste des Professeurs</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h2>👨‍🏫 Liste des Professeurs</h2>

<a href="Ajouter _proffesseur.php" class="btn btn-primary mb-3">
➕ Ajouter un professeur
</a>

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Photo</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Cours</th>
    <th>Heure</th>
    <th>Section</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td>
<?php if(!empty($row['photo'])){ ?>
<img src="uploads/professeurs/<?= $row['photo']; ?>"
     width="60"
     height="60">
<?php } ?>
</td>

<td><?= $row['nom']; ?></td>
<td><?= $row['prenom']; ?></td>
<td><?= $row['cours']; ?></td>
<td><?= $row['heure_cours']; ?></td>
<td><?= $row['section']; ?></td>

<td>

<a href="edit_professeur.php?id=<?= $row['id']; ?>"
   class="btn btn-warning btn-sm">
   Modifier
</a>

<a href="delete_professeur.php?id=<?= $row['id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Supprimer ce professeur ?')">
   Supprimer
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>