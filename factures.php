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
<title>Mes Factures</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-4" style="margin-left:280px;width:calc(100% - 300px);">
    <h2>💳 Mes Factures</h2>

    <div class="alert alert-info">
        Module Facturation en cours de développement.
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N° Facture</th>
                <th>Étudiant</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>FAC-001</td>
                <td>BA DEYBOU AMADOU</td>
                <td>50 000 FCFA</td>
                <td><span class="badge bg-success">Payée</span></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
