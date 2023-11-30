<?php
namespace repository;

use lib\Database;
use models\Auteur;

class AuteurRepo {

    public Database $database;

    public function getAll(): array {

        $statement = $this->database->getDatabase()->prepare("SELECT id, firstname, lastname FROM auteur LIMIT 10");
        $statement->execute();
        $auteurs = [];

        while ($row = $statement->fetch()) {
            $auteur = new Auteur($row['id'], $row['firstname'], $row['lastname']);
            $auteurs[] = $auteur;
        }

        return  $auteurs;

    }

    public function get($id): Auteur {

        $statement = $this->database->getDatabase()->prepare("SELECT id, firstname, lastname FROM auteur WHERE id = ?");
        $statement->execute([$id]);
        $row = $statement->fetch();
        $auteur = new Auteur($row['id'], $row['firstname'], $row['lastname']);

        return  $auteur;

    }

    public function create($firstname, $lastname): void {

        $statement = $this->database->getDatabase()->prepare("INSERT INTO auteur(firstname,lastname) VALUES(?, ?)");
        $statement->execute([$firstname, $lastname]);

    }

    public function modify($id, $firstname, $lastname): void {

        $statement = $this->database->getDatabase()->prepare("UPDATE auteur SET firstname = ?, lastname = ? WHERE id = ?");
        $statement->execute([$firstname, $lastname, $id]);

    }

    public function delete($id): void {

        $statement = $this->database->getDatabase()->prepare("DELETE FROM auteur WHERE id = ?");
        $statement->execute([$id]);

    }

}