<?php
include "db.php";

$message = "";

$etudiants = mysqli_query($conn, "SELECT * FROM etudiants");

if(isset($_POST['save'])){

    $etudiant_id = $_POST['etudiant_id'];
    $matiere = $_POST['matiere'];
    $note = $_POST['note'];

    $sql = "INSERT INTO notes(etudiant_id, matiere, note)
            VALUES('$etudiant_id','$matiere','$note')";

    if(mysqli_query($conn,$sql)){
        $message = "Note ajoutée avec succès";
    }else{
        $message = mysqli_error($conn);
    }
}
?><!DOCTYPE html><html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter une note</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><div class="container mt-5"><h2>➕ Ajouter une note</h2><?php if($message!=""){ ?><div class="alert alert-info">
<?= $message ?>
</div>
<?php } ?><form method="POST"><label>Étudiant</label>

<select name="etudiant_id" class="form-control mb-3" required><option value="">Choisir un étudiant</option><?php while($e=mysqli_fetch_assoc($etudiants)){ ?><option value="<?= $e['id']; ?>">
<?= $e['nom']; ?> <?= $e['prenom']; ?>
</option><?php } ?></select><input type="text"
name="matiere"
placeholder="Matière"
class="form-control mb-3"
required>

<input type="number"
step="0.01"
min="0"
max="20"
name="note"
placeholder="Note sur 20"
class="form-control mb-3"
required>

<button type="submit"
name="save"
class="btn btn-primary">
Ajouter
</button>

</form></div></body>
</html>