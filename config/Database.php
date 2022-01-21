<?php
namespace Config;

use Exception;
use PDO;

/**
 * Classe concernant la base de données.
 * Gère la connexion à la base de données
 */
class Database
{
    private $dbConnection = null;

    /**
     * Connexion à la base de données
     * Retourne l'instance PDO de la base de données si réussie
     */
    private function setConnection()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];

        try {
            $this->dbConnection = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbConnection;
        } catch (Exception $errorConnection) {
            die('Erreur de connexion à la base de données : ' . $errorConnection->getMessage());
        }
    }

    /**
     * Renvoie la connexion si elle est établie, sinon établie la connexion
     * et la renvoie.
     */
    public function getConnection()
    {
        if ($this->dbConnection === null) {
            return $this->setConnection();
        }

        return $this->dbConnection;
    }
}

$dbConnection = new Database();
$dbConnection->getConnection();