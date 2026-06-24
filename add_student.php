<?php
include "db.php";

$message = "";

if(isset($_POST['nom'])){

    $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $classe = mysqli_real_escape_string($conn, $_POST['classe']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO etudiants
    (matricule, nom, prenom, sexe, classe, email)
    VALUES
    ('$matricule','$nom','$prenom','$sexe','$classe','$email')";

    if(mysqli_query($conn, $sql)){
        $message = "Étudiant ajouté avec succès";
    } else {
        $message = "Erreur : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Étudiant</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            padding:30px;
        }

        .container{
            max-width:600px;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }

        button{
            background:#0d6efd;
            color:white;
            border:none;
            padding:12px;
            width:100%;
            cursor:pointer;
        }

        button:hover{
            background:#0b5ed7;
        }

        .message{
            text-align:center;
            color:green;
            font-weight:bold;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Ajouter un étudiant</h2>

    <?php if($message != ""){ ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">

        <label>Matricule</label>
        <input type="text" name="matricule" required>

        <label>Nom</label>
        <input type="text" name="nom" required>

        <label>Prénom</label>
        <input type="text" name="prenom" required>

        <label>Sexe</label>
        <select name="sexe" required>
            <option value="">Choisir</option>
            <option value="Masculin">Masculin</option>
            <option value="Féminin">Féminin</option>
        </select>

        <label>Classe</label>
        <input type="text" name="classe" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit">Ajouter</button>

    </form>

</div>

</body>
</html>