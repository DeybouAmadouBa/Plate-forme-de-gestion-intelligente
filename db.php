<?php
$conn = mysqli_connect(
    "localhost",
    "gestion_user",
    "123456",
    "gestion_scolaire"
);

if (!$conn) {
    die("Erreur connexion : " . mysqli_connect_error());
}
?>