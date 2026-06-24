<?php
include "db.php";

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    mysqli_query(
        $conn,
        "DELETE FROM professeurs WHERE id=$id"
    );

    header("Location: professeurs.php");
    exit();
}
?>