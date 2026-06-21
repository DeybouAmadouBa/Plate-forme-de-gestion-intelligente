<?php
include "db.php";

if(isset($_POST['ajouter'])){

    $titre = $_POST['titre'];

    $file = $_FILES['fichier']['name'];
    $tmp = $_FILES['fichier']['tmp_name'];

    $chemin = "uploads/" . $file;

    move_uploaded_file($tmp, $chemin);

    $sql = "INSERT INTO bibliotheque (titre, fichier) VALUES ('$titre', '$file')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">➕ Ajouter un cours (PDF)</h2>

    <div class="card p-4 shadow">

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="titre" class="form-control mb-3" placeholder="Titre du cours" required>

            <input type="file" name="fichier" class="form-control mb-3" required>

            <button class="btn btn-success" name="ajouter">Uploader</button>

        </form>

    </div>

</div>

</body>
</html>