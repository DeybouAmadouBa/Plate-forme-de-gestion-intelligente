<?php

$conn = mysqli_connect(
    "localhost",
    "gestion_user",
    "MonMotDePasse123",
    "gestion_scolaire"
);

if(!$conn){
    die("Erreur connexion : " . mysqli_connect_error());
}

?>
