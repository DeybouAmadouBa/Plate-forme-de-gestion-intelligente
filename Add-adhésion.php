<?php
session_start();
include "db.php";

// Exemple de données (remplace par ta requête SQL si tu as une table)
$adhesions = [
    [
        "annee_scolaire" => "2025-2026",
        "montant" => 25000,
        "date_creation" => "2025-09-01",
        "date_mise_a_jour" => "2025-09-10",
        "etat" => "Actif"
    ],
    [
        "annee_scolaire" => "2024-2025",
        "montant" => 20000,
        "date_creation" => "2024-09-01",
        "date_mise_a_jour" => "2024-10-05",
        "etat" => "Terminé"
    ]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Adhésions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Liste des adhésions</h3>

        <!-- Bouton vert -->
        <a href="add_adhesion.php" class="btn btn-success">
            + Nouvelle adhésion
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Année scolaire</th>
                        <th>Montant</th>
                        <th>Date création</th>
                        <th>Date mise à jour</th>
                        <th>État</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($adhesions as $a): ?>
                        <tr>
                            <td><?= $a["annee_scolaire"] ?></td>
                            <td><?= $a["montant"] ?> FCFA</td>
                            <td><?= $a["date_creation"] ?></td>
                            <td><?= $a["date_mise_a_jour"] ?></td>
                            <td>
                                <?php if ($a["etat"] == "Actif"): ?>
                                    <span class="badge bg-success">Actif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Terminé</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>