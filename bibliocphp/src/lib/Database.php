<?php
namespace lib;

use PDO;
use PDOException;

class Database {

    private $database;

    public function getDatabase() {

        try {

            $this->database = new PDO('mysql:host=localhost;dbname=biblioc;charset=utf8', 'root', '');
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            echo "Erreur de connexion : " . $e->getMessage();

        }

        return $this->database;

    }

}