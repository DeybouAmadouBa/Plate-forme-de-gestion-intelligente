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
<title>Mes Rendez-vous</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-4" style="margin-left:280px;width:calc(100% - 300px);">
    <h2>📅 Mes Rendez-vous</h2>

    <div class="alert alert-primary">
        Gestion des rendez-vous étudiants.
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Objet</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>25/06/2026</td>
                <td>10:00</td>
                <td>Entretien pédagogique</td>
                <td><span class="badge bg-success">Confirmé</span></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
