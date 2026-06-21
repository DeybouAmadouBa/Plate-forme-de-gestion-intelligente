<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "db.php";

/* récupérer les annonces */
$sql = "SELECT * FROM annonces ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Annonces</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    background:#f4f7fb;
}

/* HEADER */
.header{
    background:linear-gradient(135deg,#005bea,#00c6fb);
    color:white;
    padding:25px;
    text-align:center;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.header h1{
    font-size:32px;
}

.header p{
    margin-top:8px;
    font-size:15px;
}

/* CONTENU */
.container{
    width:90%;
    max-width:1000px;
    margin:30px auto;
}

/* CARTE */
.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

/* TITRE */
.section-title{
    font-size:24px;
    margin-bottom:20px;
    color:#333;
    border-left:6px solid #005bea;
    padding-left:10px;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#005bea;
    color:white;
    padding:15px;
    text-align:left;
}

table td{
    padding:15px;
    border-bottom:1px solid #ddd;
}

table tr:hover{
    background:#f1f7ff;
}

/* AUCUNE ANNONCE */
.empty{
    text-align:center;
    padding:40px;
    color:#777;
    font-size:18px;
}

/* BADGE */
.badge{
    background:#00c853;
    color:white;
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
}
</style>

</head>
<body>

<div class="header">
    <h1>📢 Divers / Annonces</h1>
    <p>Plateforme de gestion scolaire intelligente</p>
</div>

<div class="container">

    <div class="card">

        <div class="section-title">
            Liste des annonces
        </div>

        <?php
        if($result->num_rows > 0){
        ?>

        <table>
            <tr>
                <th>Titre</th>
                <th>Annonce</th>
                <th>Date</th>
            </tr>

            <?php
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td>
                    <span class="badge">
                        <?= $row['titre']; ?>
                    </span>
                </td>

                <td>
                    <?= $row['message']; ?>
                </td>

                <td>
                    <?= $row['date_annonce']; ?>
                </td>
            </tr>
            <?php
            }
            ?>

        </table>

        <?php
        } else {
            echo "<div class='empty'>📭 Aucune annonce affichée pour le moment</div>";
        }
        ?>

    </div>

</div>

</body>
</html>