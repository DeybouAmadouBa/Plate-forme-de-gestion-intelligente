<?php
include "Menu.php";
include "db.php";

$id = (int)$_GET['id'];

$sql = "SELECT * FROM emploi_temps WHERE id=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['modifier'])){

    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $update = "UPDATE emploi_temps
               SET titre='$titre',
                   description='$description'
               WHERE id=$id";

    if(mysqli_query($conn, $update)){
        header("Location: liste_emploi.php");
        exit();
    }
}
?><!DOCTYPE html><html>
<head>
<meta charset="UTF-8">
<title>Modifier Emploi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><div class="container mt-4"><h2>✏️ Modifier</h2><form method="post"><input type="text"
name="titre"
class="form-control"
value="<?= $data['titre']; ?>"
required>

<br><textarea name="description"
          class="form-control"
          rows="4"><?= $data['description']; ?></textarea><br><button class="btn btn-warning"
name="modifier">
Modifier
</button>

</form></div></body>
</html>