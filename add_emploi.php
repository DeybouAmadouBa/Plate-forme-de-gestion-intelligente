<?php
include "Menu.php";
include "db.php";

$message = "";

if(isset($_POST['titre'])){

    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $sql = "INSERT INTO emploi_temps(titre, description)
            VALUES('$titre', '$description')";

    if(mysqli_query($conn, $sql)){
        $message = "Emploi du temps ajouté avec succès";
    }else{
        $message = mysqli_error($conn);
    }
}
?><!DOCTYPE html><html>
<head>
<meta charset="UTF-8">
<title>Ajouter Emploi du Temps</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><div class="container mt-4"><h2>📅 Ajouter un cours</h2><?php if($message!=""){ ?><div class="alert alert-success">
    <?= $message ?>
</div>
<?php } ?><form method="post"><div class="mb-3">
<label>Titre</label>
<input type="text"
       name="titre"
       class="form-control"
       required>
</div><div class="mb-3">
<label>Description</label>
<textarea name="description"
          class="form-control"
          rows="4"></textarea>
</div><button class="btn btn-primary">
    Enregistrer
</button><a href="liste_emploi.php"
class="btn btn-secondary">
Voir la liste
</a>

</form></div><?php include "footer.php"; ?></body>
</html>