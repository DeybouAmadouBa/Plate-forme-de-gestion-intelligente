<?php
include "db.php";

$data = $conn->query("SELECT * FROM emploi_temps ORDER BY id DESC");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<h2>📅 Emploi du temps</h2>

<table class="table table-bordered table-hover">

    <thead class="table-dark">
        <tr>
            <th>Jour</th>
            <th>Heure</th>
            <th>Matière</th>
        </tr>
    </thead>

    <tbody>

    <?php while($row = $data->fetch_assoc()){ ?>

        <tr>
            <td><?= $row['jour'] ?></td>
            <td><?= $row['heure'] ?></td>
            <td><?= $row['matiere'] ?></td>
        </tr>

    <?php } ?>

    </tbody>

</table>

</div>