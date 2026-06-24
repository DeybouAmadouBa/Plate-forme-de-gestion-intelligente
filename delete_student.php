<?php
include "db.php";

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $sql = "DELETE FROM etudiants WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("Location: list_student.php");
        exit();
    }else{
        echo "Erreur : " . mysqli_error($conn);
    }
}else{
    echo "ID introuvable";
}
?>