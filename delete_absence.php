<?php
include "db.php";

if(!isset($_GET['id'])){
    die("ID manquant");
}

$id = (int)$_GET['id'];

$sql = "DELETE FROM absences WHERE id = $id";

if(mysqli_query($conn, $sql)){
    header("Location: list_abcence.php");
    exit();
}else{
    echo "Erreur : " . mysqli_error($conn);
}
?>