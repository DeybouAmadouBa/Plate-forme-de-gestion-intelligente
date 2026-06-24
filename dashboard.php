<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "db.php";


/* 🔍 filtre professeur */
$prof_id = isset($_GET['prof']) ? $_GET['prof'] : 0;

/* liste professeurs */
$profs = $conn->query("SELECT * FROM professeurs");

/* requête notes */
if($prof_id != 0){
    $sql = "SELECT e.nom, e.prenom, n.note
            FROM notes n
            JOIN etudiants e ON n.etudiant_id = e.id
            WHERE n.professeur_id = $prof_id";
}else{
    $sql = "SELECT e.nom, e.prenom, n.note
            FROM notes n
            JOIN etudiants e ON n.etudiant_id = e.id";
}

$result_notes = $conn->query($sql);

/* courbe data */
$labels = [];
$values = [];

$total = 0;
$count = 0;

while($row = $result_notes->fetch_assoc()){
    $labels[] = $row['nom'].' '.$row['prenom'];
    $values[] = $row['note'];

    $total += $row['note'];
    $count++;
}

$moyenne = ($count > 0) ? $total / $count : 0;

/* 👨🎓 étudiants */
$sql1 = "SELECT COUNT(*) as total FROM etudiants";
$etudiants = $conn->query($sql1)->fetch_assoc()['total'];

/* 📌 absences */
$sql2 = "SELECT COUNT(*) as total FROM absences";
$absences = $conn->query($sql2)->fetch_assoc()['total'];

/* 📚 cours */
$sql3 = "SELECT * FROM cours ORDER BY id DESC LIMIT 6";
$result = $conn->query($sql3);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

<?php include 'scroll_buttons.php'; ?>
body{
    margin:0;
    font-family: Arial;
    background:#f4f6f9;
}

/* SIDEBAR */

.sidebar{
    width:250px;
    height:100vh;
    background:#1e1e2f;
    position:fixed;
    color:white;
    padding-top:20px;
}

.sidebar h3{
    color:white;
    margin-bottom:20px;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#343a40;
}
.dropdown-container{
    display:none;
    background:#2c2c3e;

    max-height:180px;
    overflow-y:auto;

    border-left:3px solid #0d6efd;
}

/* SCROLL BAR */

.dropdown-container::-webkit-scrollbar{
    width:6px;
}

.dropdown-container::-webkit-scrollbar-thumb{
    background:#888;
    border-radius:10px;
}

.dropdown-container::-webkit-scrollbar-thumb:hover{
    background:#555;
}
/* MAIN */

.main{
    margin-left:250px;
    padding:20px;
}

/* CARDS */

.card-box{
    padding:20px;
    border-radius:10px;
    color:white;
}

/* MENU DEROULANT */

.dropdown-btn{
    padding:15px;
    width:100%;
    border:none;
    background:none;
    color:white;
    text-align:left;
    cursor:pointer;
    font-size:16px;
}

.dropdown-btn:hover{
    background:#343a40;
}
.dropdown-container a{
    padding-left:35px;
    font-size:15px;
}

/* MENU DEROULANT AVEC SCROLL */

.dropdown-container{
    display:none;
    background:#2c2c3e;

    max-height:250px;   /* hauteur max */
    overflow-y:auto;    /* scroll vertical */
}

/* STYLE DE LA BARRE */

.dropdown-container::-webkit-scrollbar{
    width:6px;
}

.dropdown-container::-webkit-scrollbar-thumb{
    background:#888;
    border-radius:10px;
}

.dropdown-container::-webkit-scrollbar-thumb:hover{
    background:#555;
}

</style>

<!-- SIDEBAR -->
<div class="sidebar">

    <!-- LOGO + NOM -->
    <div class="text-center mb-3">

        <svg width="60" height="60" viewBox="0 0 64 64">
            <circle cx="32" cy="32" r="30" fill="#0b2a5b"/>
            <path d="M16 22C22 20 26 22 32 26C38 22 42 20 48 22V44C42 42 38 44 32 48C26 44 22 42 16 44V22Z"
                  fill="white"/>
            <circle cx="32" cy="18" r="4" fill="#f1c40f"/>
        </svg>

        <h4 style="color:white; margin-top:10px;">
            UN-DAB<br><small>Université Numérique Deybou Amadou Ba</small>
        </h4>

    </div>
    
<!-- DASHBOARD -->
    <a href="index.php">
        <i class="fa fa-home"></i> Dashboard
    </a>
    
<!-- SCOLARITE -->

<button class="dropdown-btn">
    <i class="fa fa-school"></i> Scolarité
</button>

<div class="dropdown-container">

    <a href="list_student.php">
        📝 Mes inscriptions
    </a>

    <a href="factures.php">💳 Mes factures</a>

    <a href="bourse.php">🎓 Ma bourse</a>

    <a href="rendez_vous.php">📅 Mes rendez-vous</a>
    <a href="list_absence.php">
        📌 Mes absences
    </a>

    <a href="add_note.php">
        📝 Mes notes
    </a>

</div>
<!-- FORMATION -->
<button class="dropdown-btn">
    <i class="fa fa-book"></i> Formation
</button>

<div class="dropdown-container">

    <a href="Liste_cours.php">
        📚 Mes cours
    </a>

    <a href="liste_emploi.php">
        📅 Emploi du temps
    </a>

    <a href="classes_virtuelles.php">
        🎥 Classes virtuelles
    </a>

    <a href="plateforme_formation.php">
        🧑🏫 Plateforme de formation
    </a>

    <a href="demandes.php">
        📩 Mes demandes
    </a>

    <a href="add_biblio.php">➕ Ajouter cours</a>
<a href="bibliotheque.php">📚 Bibliothèque</a>
</div>
<!-- PEDAGOGIQUE -->
<button class="dropdown-btn">
    <i class="fa fa-graduation-cap"></i> Pédagogique
</button>

<div class="dropdown-container">

    <a href="notes.php">📝 Mes notes</a>

    <a href="add_note.php">➕ Ajouter note</a>

    <a href="inscriptions.php">🎓 Mes inscriptions</a>

    <a href="demandes.php">📩 Mes demandes</a>

    <a href="rendez_vous.php">📅 Mes rendez-vous</a>

</div>
<!-- INSERTIONS -->
<button class="dropdown-btn">
    <i class="fa fa-graduation-cap"></i> Insertions
</button>

<div class="dropdown-container">

    <a href="documents.php"> Mes documents</a>

    <a href="annuaire.php"> Annuaire</a>
<a href="voir_aux_questions.php"> Voir aux questions</a>
 <a href="liens_utiles.php">Liens utiles</a>
 <a href="demandes.php">📩 Mes demandes</a>
 <a href="cv_et_lettre_de_motivation.php">Cv et lettre de motivation </a>
 <a href="recensement.php">recensement </a>
</div>

<!-- OUTILS COLLABORATIFS -->
<button class="dropdown-btn">
    <i class="fa fa-cloud"></i> Outils collaboratifs
</button>

<div class="dropdown-container">

    <a href="g_suite.php">
        📧 G-Suite
    </a>

</div>
<!-- MUTUELLES DE SANTE-->
<button class="dropdown-btn">
    <i class="fa fa-cloud"></i>Mutuelles de santé
</button>

<div class="dropdown-container">

    <a href="adhesion.php">
    Mes adhésions
</a>

</div>
<!--DIVERS-->
<button class="dropdown-btn">
    <i class="fa fa-cloud"></i>Divers
</button>

<div class="dropdown-container">

    <a href="annonces.php">
    Annonces
</a>
<a href="mes_services_communaute.php">
    mes services à la communauté
</a>


</div>
   <!-- DECONNEXION -->
    <a href="logout.php">
        <i class="fa fa-sign-out"></i> Déconnexion
    </a>

</div>
<!-- MAIN -->
<div class="main">

    <h2>📊 Dashboard</h2>
    
<div class="d-flex gap-3 mb-3">
<a href="applications.php" class="btn btn-danger shadow">Applications</a>
    <a href="add_absence.php" class="btn btn-danger shadow">
        ➕ Absence
    </a>

    <a href="add_cour.php" class="btn btn-primary shadow">
        ➕ Cours
    </a>
<a href="add_emploi.php" class="btn btn-primary shadow">
    ➕ Ajouter emploi du temps
</a>

</div>
    <div class="col-md-4">
    <a href="professeurs.php" style="text-decoration:none;">
        <div class="card p-4 text-center">
            <h4>👨‍🏫 Professeurs</h4>
        </div>
    </a>
    
</div>

    <!-- 🖼️ BANNER -->
    <div class="container mb-4">
        <img src="images/banner.jpg" class="img-fluid rounded shadow">
    </div>

    <!-- 📊 STATS -->
    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card-box bg-primary text-center">
                <h4>👨🎓 Étudiants</h4>
                <h2><?= $etudiants ?></h2>
            </div>
        </div>

        <div class="col-md-6">

    <a href="list_absence.php" style="text-decoration:none;">

        <div class="card-box bg-danger text-center">

            <h4>📌 Absences</h4>

            <h2><?= $absences ?></h2>

            <p style="color:white;">
                Voir les absences
            </p>

        </div>

    </a>

</div>

    </div>

    <!-- 📊 GRAPH -->
<div class="mt-5">
    <h4>📊 Statistiques avancées</h4>

    <div class="row">

        <div class="col-md-6">
            <div class="card p-3 shadow">
                <h6 class="text-center">Diagramme en bandes</h6>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3 shadow">
                <h6 class="text-center">Diagramme tiroir d’ordre (horizontal)</h6>
                <canvas id="horizontalChart"></canvas>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card p-3 shadow">
                <h6 class="text-center">Diagramme circulaire</h6>
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card p-3 shadow">
                <h6 class="text-center">Diagramme semi-circulaire</h6>
                <canvas id="halfChart"></canvas>
            </div>
        </div>

    </div>
</div>
<form method="GET" class="mb-3">

    <label>🔍 Filtrer par professeur :</label>

    <select name="prof" class="form-select" onchange="this.form.submit()">

        <option value="0">Tous les professeurs</option>

        <?php while($p = $profs->fetch_assoc()){ ?>

            <option value="<?= $p['id'] ?>"
                <?= ($prof_id == $p['id']) ? 'selected' : '' ?>>

                <?= $p['nom'].' '.$p['prenom'] ?>

            </option>

        <?php } ?>

    </select>

</form>
<div class="card p-3 text-center bg-success text-white mb-3">
    <h5>📊 Moyenne de la classe</h5>
    <h2><?= round($moyenne, 2) ?>/20</h2>
</div>
<div class="card p-3 shadow mt-4">
    <h5 class="text-center">📈 Courbe des notes par étudiant</h5>
    <canvas id="notesChart"></canvas>
</div>
    <!-- 📚 COURS -->
    <div class="container mt-5">

        <h3>📚 Derniers cours</h3>

        <div class="row">

        <?php if($result && $result->num_rows > 0){ ?>

            <?php while($row = $result->fetch_assoc()){ ?>

                <div class="col-md-4">
                    <div class="card p-3 shadow mb-3">

                        <h5><?= $row['titre'] ?></h5>
                        <p><?= $row['description'] ?></p>

                        <a href="uploads/<?= $row['fichier'] ?>" target="_blank" class="btn btn-primary btn-sm">
                            📄 Voir cours
                        </a>

                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>

            <p>Aucun cours disponible 📚</p>

        <?php } ?>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = ['Étudiants', 'Absences'];
const dataValues = [<?= $etudiants ?>, <?= $absences ?>];

/* 📊 BAR CHART */
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Statistiques',
            data: dataValues,
            backgroundColor: ['#0d6efd', '#dc3545']
        }]
    }
});

/* 📊 HORIZONTAL BAR */
new Chart(document.getElementById('horizontalChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Statistiques',
            data: dataValues,
            backgroundColor: ['#198754', '#ffc107']
        }]
    },
    options: {
        indexAxis: 'y'
    }
});

/* 🥧 PIE CHART */
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: dataValues,
            backgroundColor: ['#0d6efd', '#dc3545']
        }]
    }
});

/* 🍩 SEMI DOUGHNUT */
new Chart(document.getElementById('halfChart'), {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: dataValues,
            backgroundColor: ['#6610f2', '#fd7e14']
        }]
    },
    options: {
        rotation: -90,
        circumference: 180
    }
});
new Chart(document.getElementById('notesChart'), {
    type: 'line',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Notes',
            data: <?= json_encode($values) ?>,
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,0.2)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 20
            }
        }
    }
});
</script>
<script>

/* MENU DEROULANT */

var dropdown = document.getElementsByClassName("dropdown-btn");

for (var i = 0; i < dropdown.length; i++) {

    dropdown[i].addEventListener("click", function() {

        this.classList.toggle("active");

        var dropdownContent = this.nextElementSibling;

        if (dropdownContent.style.display === "block") {

            dropdownContent.style.display = "none";

        } else {

            dropdownContent.style.display = "block";

        }

    });

}

</script>
