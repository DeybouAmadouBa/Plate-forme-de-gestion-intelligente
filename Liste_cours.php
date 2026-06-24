<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">📚 Mes cours</h2>

    <div class="row">

        <?php
        $sql = "SELECT * FROM cours ORDER BY date_creation DESC";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
        ?>

        <div class="col-md-4 mb-3">
            <div class="card shadow p-3">

                <h5>📘 <?php echo $row['titre']; ?></h5>

                <p><?php echo $row['description']; ?></p>

                <small class="text-muted">
                    <?php echo $row['date_creation']; ?>
                </small>

            </div>
        </div>

        <?php } ?>  <!-- ✅ IMPORTANT: fermeture du while -->

    </div>

</div>

</body>
</html>
