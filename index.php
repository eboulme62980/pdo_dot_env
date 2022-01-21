<?php
require 'vendor/autoload.php';
require "env/loadEnv.php";

use Config\Database;

$dbConnection = new Database();
$dbConnection->getConnection();

if ($dbConnection) {
    echo 'réussite de la connexion';
} else {
    echo 'échec de la connexion';
}


