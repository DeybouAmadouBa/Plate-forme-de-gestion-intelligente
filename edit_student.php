<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM etudiants WHERE id=$id");
$etudiant = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $classe = $_POST['classe'];
    $email = $_POST['email'];

    $sql = "UPDATE etudiants SET
            matricule='$matricule',
            nom='$nom',
            prenom='$prenom',
            sexe='$sexe',
            classe='$classe',
            email='$email'
            WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        header("Location: list_student.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier Étudiant</title>
</head>
<body>

<h2>Modifier Étudiant</h2>

<form method="post">

    <input type="text" name="matricule" value="<?= $etudiant['matricule'] ?>" required><br><br>

    <input type="text" name="nom" value="<?= $etudiant['nom'] ?>" required><br><br>

    <input type="text" name="prenom" value="<?= $etudiant['prenom'] ?>" required><br><br>

    <select name="sexe" required>
        <option value="Masculin" <?= $etudiant['sexe']=="Masculin"?"selected":"" ?>>Masculin</option>
        <option value="Féminin" <?= $etudiant['sexe']=="Féminin"?"selected":"" ?>>Féminin</option>
    </select><br><br>

    <input type="text" name="classe" value="<?= $etudiant['classe'] ?>" required><br><br>

    <input type="email" name="email" value="<?= $etudiant['email'] ?>" required><br><br>

    <button type="submit" name="update">Mettre à jour</button>

</form>

</body>
</html>