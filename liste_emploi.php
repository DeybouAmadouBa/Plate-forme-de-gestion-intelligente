<?php
include "Menu.php";
include "db.php";

$sql = "SELECT * FROM emploi_temps ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?><!DOCTYPE html><html>
<head>
<meta charset="UTF-8">
<title>Liste Emploi du Temps</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><div class="container-fluid mt-4" style="margin-left:280px; width:calc(100% - 300px);"><h2>📋 Emploi du Temps</h2><a href="add_emploi.php"
class="btn btn-primary mb-3">
Ajouter
</a>

<table class="table table-bordered table-striped"><thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>Date création</th>
    <th>Actions</th>
</tr>
</thead><tbody><?php while($row = mysqli_fetch_assoc($result)){ ?><tr><td><?= $row['id']; ?></td>
<td><?= $row['titre']; ?></td>
<td><?= $row['description']; ?></td>
<td><?= $row['date_creation']; ?></td><td><a href="edit_emploi.php?id=<?= $row['id']; ?>"
class="btn btn-warning btn-sm">
Modifier
</a>

<a href="delete_emploi.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer cet élément ?')">
Supprimer
</a>

</td></tr><?php } ?></tbody></table></div><?php include "footer.php"; ?></body>
</html>