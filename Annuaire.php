<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Annuaire des entreprises</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { background: #f8f9fa; }
        .table-container { margin: 40px auto; max-width: 1200px; }
        h2 i { margin-right: 8px; }
        .entreprise-phrase { font-style: italic; color: #6c757d; font-size: 0.9em; margin-top: 4px; }
    </style>
</head>
<body>
<div class="container table-container">
    <h2 class="mb-4"><i class="fas fa-address-book text-primary"></i>Annuaire des entreprises</h2>
    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Domaine</th>
                            <th>Entreprise</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Site web</th>
                            <th>Région</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $annuaire = [
                            [
                                "domaine" => "Informatique / Cloud",
                                "entreprise" => "CloudTech Solutions",
                                "adresse" => "15 Rue de l'Innovation, 75011 Paris",
                                "telephone" => "+33 1 44 55 66 77",
                                "url" => "https://cloudtech.fr",
                                "region" => "Île-de-France",
                                "phrase" => "Pionnière du cloud hybride, CloudTech accompagne les PME dans leur transformation numérique."
                            ],
                            [
                                "domaine" => "Abbatage, tranformation et conservation des viande",
                                "entreprise" => "Société de Gestions des Abbatoires du Sénégal (SOGAS)",
                                "adresse" => "Km 9 Boulevard du CENTENAIRE DE LA COMMUNE DE DAKAR B.P. 14 DAKAR",
                                "telephone" => "771212575",
                                "url" => "https://biosaveur.com",
                                "region" => "Occitanie",
                                "phrase" => "Producteur local de fruits et légumes biologiques, livrés en circuits courts."
                            ],
                            [
                                "domaine" => "Transport & Logistique",
                                "entreprise" => "Rapide Express",
                                "adresse" => "12 Rue du Commerce, 69002 Lyon",
                                "telephone" => "+33 4 78 91 01 23",
                                "url" => "https://rapide-express.fr",
                                "region" => "Auvergne-Rhône-Alpes",
                                "phrase" => "Spécialiste du transport frigorifique, Rapide Express garantit une chaîne du froid irréprochable."
                            ],
                            [
                                "domaine" => "Énergie Renouvelable",
                                "entreprise" => "Soleil Vert",
                                "adresse" => "3 Avenue du Solaire, 13001 Marseille",
                                "telephone" => "+33 4 91 12 34 56",
                                "url" => "https://soleilvert-energie.fr",
                                "region" => "Provence-Alpes-Côte d'Azur",
                                "phrase" => "Installateur de panneaux photovolta