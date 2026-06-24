<?php
include "Menu.php";
include "db.php";

if(!isset($_GET['id'])){
    die("ID manquant");
}

$id = (int)$_GET['id'];

$sql = "SELECT * FROM absences WHERE id = $id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    die("Absence introuvable");
}

$absence = mysqli_fetch_assoc($result);

if(isset($_POST['modifier'])){

    $date_absence = $_POST['date_absence'];
    $motif = $_POST['motif'];

    $update = "UPDATE absences
               SET date_absence='$date_absence',
                   motif='$motif'
               WHERE id=$id";

    if(mysqli_query($conn, $update)){
        header("Location: list_abcence.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier Absence</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>✏️ Modifier une absence</h2>

    <form method="post">

        <label>Date</label>
        <input type="date"
               name="date_absence"
               class="form-control"
               value="<?= $absence['date_absence']; ?>"
               required>

        <br>

        <label>Motif</label>
        <textarea name="motif"
                  class="form-control"
                  rows="4"
                  required><?= $absence['motif']; ?></textarea>

        <br>

        <button type="submit"
                name="modifier"
                class="btn btn-warning">
            Modifier
        </button>

        <a href="list_abcence.php"
           class="btn btn-secondary">
           Retour
        </a>

    </form>

</div>

</body>
</html>