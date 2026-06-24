<?php
include "db.php";

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM professeurs WHERE id=$id");
$prof = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cours = $_POST['cours'];
    $heure = $_POST['heure'];
    $section = $_POST['section'];

    $sql = "UPDATE professeurs SET
            nom='$nom',
            prenom='$prenom',
            cours='$cours',
            heure_cours='$heure',
            section='$section'
            WHERE id=$id";

    if(mysqli_query($conn,$sql)){
        header("Location: professeurs.php");
        exit();
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier Professeur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>✏️ Modifier Professeur</h2>

<form method="post">

<input type="text"
       name="nom"
       value="<?= $prof['nom']; ?>"
       class="form-control mb-2"
       required>

<input type="text"
       name="prenom"
       value="<?= $prof['prenom']; ?>"
       class="form-control mb-2"
       required>

<input type="text"
       name="cours"
       value="<?= $prof['cours']; ?>"
       class="form-control mb-2"
       required>

<input type="text"
       name="heure"
       value="<?= $prof['heure_cours']; ?>"
       class="form-control mb-2"
       required>

<input type="text"
       name="section"
       value="<?= $prof['section']; ?>"
       class="form-control mb-3"
       required>

<button type="submit"
        name="update"
        class="btn btn-warning">
    Mettre à jour
</button>

</form>

</div>

</body>
</html>