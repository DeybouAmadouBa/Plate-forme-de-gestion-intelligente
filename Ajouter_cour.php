<?php
include "db.php";

if(isset($_POST['ajouter'])){

    $professeur_id = $_POST['professeur_id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    // Upload PDF
    $fichier = $_FILES['fichier']['name'];
    $tmp = $_FILES['fichier']['tmp_name'];

    move_uploaded_file($tmp, "uploads/".$fichier);

    $sql = "INSERT INTO cours(professeur_id, titre, description, fichier)
            VALUES('$professeur_id','$titre','$description','$fichier')";

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

    <h2 class="text-center mb-4">➕ Ajouter un cours</h2>

    <div class="card p-4 shadow">

        <form method="POST" enctype="multipart/form-data">

            <input type="number"
                   name="professeur_id"
                   class="form-control mb-3"
                   placeholder="ID Professeur"
                   required>

            <input type="text"
                   name="titre"
                   class="form-control mb-3"
                   placeholder="Titre du cours"
                   required>

            <textarea name="description"
                      class="form-control mb-3"
                      placeholder="Description du cours"
                      required></textarea>

            <input type="file"
                   name="fichier"
                   class="form-control mb-3"
                   required>

            <button class="btn btn-success" name="ajouter">
                Ajouter
            </button>

        </form>

    </div>

</div>

</body>
</html>