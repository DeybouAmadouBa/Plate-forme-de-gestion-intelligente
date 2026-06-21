<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
include "Menu.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Module</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid mt-4" style="margin-left:280px;width:calc(100% - 300px);">
<h2>Module</h2>

<div class="alert alert-info">
Ce module est disponible pour les futures versions de UN-DAB.
</div>

</div>
</body>
</html>
