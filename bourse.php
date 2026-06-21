<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
include "Menu.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ma Bourse</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-4" style="margin-left:280px;width:calc(100% - 300px);">
    <h2>🎓 Ma Bourse</h2>

    <div class="alert alert-success">
        Informations relatives aux bourses étudiantes.
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Type de bourse</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>BA DEYBOU AMADOU</td>
                <td>Bourse d'excellence</td>
                <td>35 000 FCFA</td>
                <td><span class="badge bg-success">Validée</span></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
