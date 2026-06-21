<?php
include "Menu.php";
include "db.php";

$message = "";

if(isset($_POST['etudiant_id'])){

    $etudiant_id = $_POST['etudiant_id'];
    $date_absence = $_POST['date_absence'];
    $motif = $_POST['motif'];

    $sql = "INSERT INTO absences
            (etudiant_id, date_absence, motif)
            VALUES
            ('$etudiant_id', '$date_absence', '$motif')";

    if(mysqli_query($conn, $sql)){
        $message = "Absence enregistrée avec succès";
    } else {
        $message = "Erreur : " . mysqli_error($conn);
    }
}

$etudiants = mysqli_query($conn, "SELECT * FROM etudiants ORDER BY nom ASC");
?><!DOCTYPE html><html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une absence</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body><div class="container-fluid mt-4" style="margin-left:280px;width:calc(100% - 300px);"><h2>📅 Ajouter une absence</h2>

<?php if($message != ""){ ?>
    <div class="alert alert-info">
        <?= $message; ?>
    </div>
<?php } ?>

<form method="POST">

    <div class="mb-3">
        <label class="form-label">Étudiant</label>

        <select name="etudiant_id"
                class="form-control"
                required>

            <option value="">
                -- Choisir un étudiant --
            </option>

            <?php while($e = mysqli_fetch_assoc($etudiants)){ ?>

<option value="<?php echo $e['id']; ?>">
    <?php echo $e['nom']." ".$e['prenom']; ?>
</option>

            <?php } ?>

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Date d'absence</label>

        <input type="date"
               name="date_absence"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Motif</label>

        <textarea name="motif"
                  class="form-control"
                  rows="4"
                  placeholder="Saisir le motif de l'absence"></textarea>
    </div>

    <button type="submit"
            class="btn btn-primary">
        Enregistrer
    </button>

    <a href="list_abcence.php"
       class="btn btn-secondary">
        Voir les absences
    </a>

</form>

</div><?php include "footer.php"; ?></body>
</html>