<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Avant Menu<br>";

include "Menu.php";

echo "Après Menu<br>";

include "db.php";

echo "Après DB<br>";
?>