<?php
namespace src\repositories;

use src\lib\Database;
use src\models\Author;

class AuthorRepo {

    public function getAll(): array {

        $statement = Database::get()->prepare("SELECT id, firstname, lastname FROM author LIMIT 10");
        $statement->execute();
        $authors = [];

        while ($row = $statement->fetch()) {
            $author = new Author($row['id'], $row['firstname'], $row['lastname']);
            $authors[] = $author;
        }

        return  $authors;

    }

    public function get($id): Author {

        $statement = Database::get()->prepare("SELECT id, firstname, lastname FROM author WHERE id = ?");
        $statement->execute([$id]);
        $row = $statement->fetch();
        $author = new Author($row['id'], $row['firstname'], $row['lastname']);

        return  $author;

    }

    public function create($firstname, $lastname): void {

        $statement = Database::get()->prepare("INSERT INTO author(firstname,lastname) VALUES(?, ?)");
        $statement->execute([$firstname, $lastname]);

    }

    public function modify($id, $firstname, $lastname): void {

        $statement = Database::get()->prepare("UPDATE author SET firstname = ?, lastname = ? WHERE id = ?");
        $statement->execute([$firstname, $lastname, $id]);

    }

    public function delete($id): void {

        $statement = Database::get()->prepare("DELETE FROM author WHERE id = ?");
        $statement->execute([$id]);

    }

    public function getAllContainsFirstname($firstname): array {

        $statement = Database::get()->prepare("SELECT id, firstname, lastname FROM author WHERE firstname LIKE ? LIMIT 10");
        $statement->execute([$firstname."%"]);
        $authors = [];

        while ($row = $statement->fetch()) {
            $author = new Author($row['id'], $row['firstname'], $row['lastname']);
            $authors[] = $author;
        }

        return  $authors;

    }

}