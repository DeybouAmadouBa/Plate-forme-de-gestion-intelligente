<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
    header("Location:login.php");
    exit();
}

if(isset($_POST['ajouter'])){

    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $file = $_FILES['fichier']['name'];
    $tmp = $_FILES['fichier']['tmp_name'];

    move_uploaded_file($tmp, "uploads/".$file);

    $sql = "INSERT INTO cours (titre, description, fichier)
            VALUES ('$titre', '$description', '$file')";

    $conn->query($sql);

    echo "<div class='alert alert-success'>Cours ajouté ✔</div>";
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<h2>📚 Ajouter un cours</h2>

<form method="POST" enctype="multipart/form-data" class="card p-4 shadow">

    <input type="text" name="titre" class="form-control mb-2" placeholder="Titre du cours" required>

    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

    <input type="file" name="fichier" class="form-control mb-3" required>

    <button name="ajouter" class="btn btn-primary">
        ➕ Ajouter cours
    </button>

</form>

</div>