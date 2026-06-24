<?php
include "db.php";

if(isset($_POST['save'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cours = $_POST['cours'];
    $heure = $_POST['heure'];
    $section = $_POST['section'];

    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    $dossier = "uploads/professeurs/";

    if(!file_exists($dossier)){
        mkdir($dossier, 0777, true);
    }

    move_uploaded_file($tmp, $dossier.$photo);

     $sql ="INSERT INTO professeurs(nom, prenom, photo, cours, heure_cours, section)
VALUES('$nom','$prenom','$photo','$cours','$heure','$section')";
    if(mysqli_query($conn,$sql)){
        header("Location: professeurs.php");
        exit();
    }else{
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter Professeur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>➕ Ajouter un Professeur</h2>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>

        <input type="text" name="prenom" class="form-control mb-2" placeholder="Prénom" required>

        <input type="text" name="cours" class="form-control mb-2" placeholder="Cours" required>

        <input type="text" name="heure" class="form-control mb-2" placeholder="Heure du cours" required>

        <input type="text" name="section" class="form-control mb-2" placeholder="Section" required>

        <input type="file" name="photo" class="form-control mb-3" required>

        <button type="submit" name="save" class="btn btn-primary">
            Ajouter
        </button>

        <a href="professeurs.php" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

</body>
</html>