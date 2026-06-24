<?php
session_start();
include "menu.php";
include "db.php";

// Vérifier login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Recherche
$search = "";
if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM etudiants
            WHERE nom LIKE '%$search%'
            OR prenom LIKE '%$search%'
            OR classe LIKE '%$search%'
            OR email LIKE '%$search%'
            OR matricule LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM etudiants";
}

$result = $conn->query($sql);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<h2 class="mb-4 text-center">🎓 Liste des étudiants</h2>

<!-- Recherche -->
<form method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-10">
            <input type="text"
                   name="search"
                   value="<?= htmlspecialchars($search) ?>"
                   class="form-control"
                   placeholder="🔍 Rechercher un étudiant">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                Rechercher
            </button>
        </div>
    </div>
</form>

<!-- Tableau -->
<div class="card shadow">
<div class="card-body">

<table class="table table-striped table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Classe</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    <?php if($result->num_rows > 0){ ?>
        <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['matricule']; ?></td>
                <td><?= $row['nom']; ?></td>
                <td><?= $row['prenom']; ?></td>
                <td><?= $row['sexe']; ?></td>
                <td><?= $row['classe']; ?></td>
                <td><?= $row['email']; ?></td>

                <td>
                    <a href="edit_student.php?id=<?= $row['id']; ?>"
                       class="btn btn-warning btn-sm">✏️</a>

                    <a href="delete_student.php?id=<?= $row['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Supprimer cet étudiant ?')">🗑️</a>

                    <a href="bulletin.php?id=<?= $row['id']; ?>"
                       class="btn btn-success btn-sm">📄</a>

                    <a href="bulletin_download.php?id=<?= $row['id']; ?>"
                       class="btn btn-primary btn-sm">⬇️</a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="8">Aucun étudiant trouvé</td>
        </tr>
    <?php } ?>

    </tbody>
</table>

</div>
</div>

</div>

<?php include "footer.php"; ?>