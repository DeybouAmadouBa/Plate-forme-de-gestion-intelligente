<?php
include "db.php";

$id = (int)$_GET['id'];

$sql = "DELETE FROM emploi_temps WHERE id=$id";

if(mysqli_query($conn, $sql)){
    header("Location: liste_emploi.php");
    exit();
}
?>