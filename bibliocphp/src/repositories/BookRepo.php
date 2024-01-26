<?php
namespace src\repositories;

use src\lib\Database;
use src\models\Book;

class BookRepo {

    public function getAll(): array {

        $statement = Database::get()->prepare("SELECT id, title, resume, author_id FROM book LIMIT 10");
        $statement->execute();
        $books = [];

        while ($row = $statement->fetch()) {
            $book = new Book($row['id'], $row['title'], $row['resume'], $row['author_id']);
            $books[] = $book;
        }

        return  $books;

    }

    public function get($id): Book {

        $statement = Database::get()->prepare("SELECT id, title, resume, author_id FROM book WHERE id = ?");
        $statement->execute([$id]);
        $row = $statement->fetch();
        $book = new Book($row['id'], $row['title'], $row['resume'], $row['author_id']);

        return  $book;

    }

    public function create($title, $resume, $author_id): void {

        $statement = Database::get()->prepare("INSERT INTO book(title, resume, author_id) VALUES(?, ?, ?)");
        $statement->execute([$title, $resume, $author_id]);

    }

    public function modify($id, $title, $resume, $author_id): void {

        $statement = Database::get()->prepare("UPDATE book SET title = ?, resume = ?, author_id = ? WHERE id = ?");
        $statement->execute([$title, $resume, $author_id, $id]);

    }

    public function delete($id): void {

        $statement = Database::get()->prepare("DELETE FROM book WHERE id = ?");
        $statement->execute([$id]);

    }

    public function getAllContainsTitle($title): array {

        $statement = Database::get()->prepare("SELECT id, title, resume, author_id FROM book WHERE title LIKE ? LIMIT 10");
        $statement->execute([$title."%"]);
        $books = [];

        while ($row = $statement->fetch()) {
            $book = new Book($row['id'], $row['title'], $row['resume'], $row['author_id']);
            $books[] = $book;
        }

        return  $books;

    }

}