<?php include "menu.php"; ?>
<?php include "db.php"; ?>
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:login.php");
}
?>
<h2 class="mb-4">Liste des Notes</h2>

<?php

$sql = "SELECT notes.id,
students.nom,
students.prenom,
notes.matiere,
notes.note

FROM notes

INNER JOIN students
ON notes.student_id = students.id";

$result = mysqli_query($conn, $sql);

?>

<table class="table table-bordered table-striped">

    <tr class="table-dark">

        <th>ID</th>
        <th>Étudiant</th>
        <th>Matière</th>
        <th>Note</th>
        <th>Actions</th>

    </tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

    <td><?= $row['id'] ?></td>

    <td>
        <?= $row['nom'] ?> <?= $row['prenom'] ?>
    </td>

    <td><?= $row['matiere'] ?></td>

    <td>
        <span class="badge bg-success">
            <?= $row['note'] ?>
        </span>
    </td>

    <td>

        <a href="delete_note.php?id=<?= $row['id'] ?>"
        class="btn btn-danger btn-sm">

            Supprimer

        </a>

    </td>

</tr>

<?php } ?>

</table>

<?php include "footer.php"; ?>