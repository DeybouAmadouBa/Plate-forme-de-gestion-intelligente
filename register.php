<?php
include "db.php";

$message = "";

if(isset($_POST['email'])){

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO utilisateurs(nom,email,password)
            VALUES('$nom','$email','$password')";

    if(mysqli_query($conn, $sql)){
        $message = "Inscription réussie !";
    }else{
        $message = "Erreur : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>

<h1>Créer un compte</h1>

<p><?php echo $message; ?></p>

<form method="post">
    <input type="text" name="nom" placeholder="Nom" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Mot de passe" required><br><br>

    <button type="submit">S'inscrire</button>
</form>

</body>
</html>
