<?php include "menu.php"; ?>
<?php include "db.php"; ?>

<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:login.php");
    exit();
}
?>

<?php

if(isset($_POST['ajouter'])){

    $student_id = $_POST['student_id'];
    $matiere = $_POST['matiere'];
    $note = $_POST['note'];

    mysqli_query($conn,
    "INSERT INTO notes(student_id, matiere, note)
     VALUES('$student_id', '$matiere', '$note')");

    echo "<div class='alert alert-success'>Note ajoutée ✔</div>";
}

/* 👇 IMPORTANT : bonne variable */
$students = mysqli_query($conn, "SELECT * FROM etudiants");
?>

<h2>Ajouter Note</h2>

<form method="POST">

<!-- 👇 CORRECTION ICI -->
<select name="student_id" class="form-control mb-3" required>

    <option value="">-- Choisir étudiant --</option>

    <?php while($row = mysqli_fetch_assoc($students)){ ?>

        <option value="<?= $row['id'] ?>">
            <?= $row['nom'] ?> <?= $row['prenom'] ?>
        </option>

    <?php } ?>

</select>

<input type="text"
       name="matiere"
       placeholder="Matière"
       class="form-control mb-3">

<input type="number"
       step="0.01"
       name="note"
       placeholder="Note"
       class="form-control mb-3">

<button name="ajouter" class="btn btn-primary">
Ajouter
</button>

</form>

<?php include "footer.php"; ?>