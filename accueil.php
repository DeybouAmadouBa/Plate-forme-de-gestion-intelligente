<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title><strong>UN-DAB</strong><br><small>Université Numérique Deybou Amadou Ba</small> - Université Numérique Deybou Amadou Ba</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* 🌟 BACKGROUND */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
    url("images/accueil.jpg") no-repeat center center/cover;
    height: 100vh;
}

/* 🧭 NAVBAR */
.navbar {
    background: rgba(11,42,91,0.9);
}

/* 🏠 HERO */
.hero {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 80px 8%;
    color: white;
}

/* TEXTE */
.hero-text {
    max-width: 50%;
}

.hero-text h1 {
    font-size: 50px;
    font-weight: bold;
}

.hero-text p {
    font-size: 18px;
    margin-top: 15px;
}

/* BUTTONS */
.btn-custom {
    padding: 10px 20px;
    border-radius: 25px;
    margin-right: 10px;
}

/* IMAGE */
.hero-img img {
    width: 450px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}

/* FEATURE */
.features {
    background: white;
    padding: 60px 8%;
    text-align: center;
}

.feature-box {
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.feature-box:hover {
    transform: translateY(-10px);
}

footer {
    background: #0b2a5b;
    color: white;
    text-align: center;
    padding: 15px;
    margin-top: 40px;
}

</style>

</head>

<body>

<!-- 🧭 NAVBAR -->
<nav class="navbar navbar-dark px-4">
    
    <!-- LOGO -->
    <span class="navbar-brand d-flex align-items-center">
        <svg width="40" height="40" viewBox="0 0 64 64" class="me-2">
            <circle cx="32" cy="32" r="30" fill="#1e5aa8"/>
            <path d="M16 22C22 20 26 22 32 26C38 22 42 20 48 22V44C42 42 38 44 32 48C26 44 22 42 16 44V22Z"
                  fill="white"/>
            <circle cx="32" cy="18" r="4" fill="#f1c40f"/>
        </svg>

        <strong>UN-DAB</strong><br><small>Université Numérique Deybou Amadou Ba</small>
    </span>

    <div>
        <a href="login.php" class="btn btn-outline-light btn-sm">Connexion</a>
        <a href="register.php" class="btn btn-warning btn-sm">Inscription</a>
    </div>
</nav>

<!-- 🏠 HERO -->
<section class="hero">

    <div class="hero-text">
        <h1>Bienvenue à l'UN-DAB</h1>
        <h3>Université Numérique Deybou Amadou Ba</h3>
        <p>
            L'UN-DAB (Université Numérique Deybou Amadou Ba) est une plateforme intelligente de gestion scolaire permettant la gestion des étudiants, des professeurs, des notes, des absences et des emplois du temps dans un environnement numérique moderne.
        </p>

        <a href="login.php" class="btn btn-light btn-custom">Se connecter</a>
        <a href="register.php" class="btn btn-warning btn-custom">Créer un compte</a>
    </div>

    <div class="hero-img">
        <img src="images/accueil.jpg.jpg" alt="UVS">
    </div>

</section>

<!-- 🌟 FEATURES -->
<section class="features">

    <h2 class="mb-5">Nos fonctionnalités</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="feature-box">
                📚 <h5>Cours en ligne</h5>
                <p>Accédez à tous vos cours facilement.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box">
                🎥 <h5>Classes virtuelles</h5>
                <p>Suivez les cours en direct avec les professeurs.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box">
                📊 <h5>Suivi académique</h5>
                <p>Consultez vos notes et votre progression.</p>
            </div>
        </div>

    </div>

</section>

<!-- FOOTER -->
<footer>
    © 2026 UN-DAB – Université Numérique Deybou Amadou Ba
</footer>

</body>
</html>