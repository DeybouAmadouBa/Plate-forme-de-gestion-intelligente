<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Début<br>";

require 'config/database.php';

echo "Après connexion<br>";

if ($conn) {
    echo "Connexion OK";
} else {
    echo "Erreur connexion";
}
