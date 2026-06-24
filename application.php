<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Applications UVS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f6f9;
}

/* SIDEBAR SIMPLE */
.sidebar{
    width:240px;
    height:100vh;
    background:#1e1e2f;
    position:fixed;
    padding:20px;
    color:white;
}

.sidebar a{
    display:block;
    color:white;
    padding:10px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#343a40;
}

/* MAIN */
.main{
    margin-left:240px;
    padding:20px;
}

/* CARD APP */
.card-app{
    background:white;
    padding:20px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card-app:hover{
    transform:scale(1.05);
}

.card-app img{
    width:60px;
    margin-bottom:10px;
}

/* FOOTER */
.footer{
    margin-top:40px;
    text-align:center;
    padding:15px;
    background:#0d6efd;
    color:white;
    border-radius:10px;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>🎓 UVS</h4>
    <a href="index.php">Dashboard</a>
    <a href="applications.php">Applications</a>
    <a href="annonces.php">Annonces</a>
    <a href="logout.php">Déconnexion</a>
</div>

<!-- MAIN -->
<div class="main">

<h3>📚 Applications éducatives</h3>

<div class="row g-3">

    <!-- MOODLE -->
    <div class="col-md-3">
        <a href="https://moodle.org" target="_blank" style="text-decoration:none;color:black;">
            <div class="card-app">
                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968672.png">
                <h5>Moodle</h5>
                <p>Cours en ligne</p>
            </div>
        </a>
    </div>

    <!-- OPEN BOOK -->
    <div class="col-md-3">
        <a href="https://openbook.org" target="_blank" style="text-decoration:none;color:black;">
            <div class="card-app">
                <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png">
                <h5>Open Book</h5>
                <p>Ressources éducatives</p>
            </div>
        </a>
    </div>
bb   bbb  
    <!-- ÉRUDIT -->
    <div class="col-md-3">
        <a href="https://www.erudit.org" target="_blank" style="text-decoration:none;color:black;">
            <div class="card-app">
                <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png">
                <h5>Érudit</h5>
                <p>Revues scientifiques</p>
            </div>
        </a>
    </div>

    <!-- AJOL -->
    <div class="col-md-3">
        <a href="https://www.ajol.info" target="_blank" style="text-decoration:none;color:black;">
            <div class="card-app">
                <img src="https://cdn-icons-png.flaticon.com/512/942/942748.png">
                <h5>AJOL</h5>
                <p>Journaux africains</p>
            </div>
        </a>
    </div>

</div>

<!-- SENJOB -->
<div class="card-app mt-4">

    <a href="https://www.senjob.com" target="_blank" style="text-decoration:none;color:black;">

        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

        <h5>Senjob</h5>
        <p>Moteur d'emploi & stages</p>

    </a>

    <div class="mt-3">
        <p><b>Scanner QR Code</b></p>

        <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://www.senjob.com">
    </div>

</div>

<!-- FOOTER -->
<div class="footer">
Ministère de l'Enseignement Supérieur - UN-CHK - © 2026
</div>

</div>

</body>
</html>