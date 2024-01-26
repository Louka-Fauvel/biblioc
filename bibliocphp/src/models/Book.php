<?php
namespace src\models;

class Book {

    private int $id;
    private string $title;
    private string $resume;
    private int $author_id;

    public function __construct(int $id, string $title, string $resume, int $author_id) {

        $this->id = $id;
        $this->title = $title;
        $this->resume = $resume;
        $this->author_id = $author_id;

    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getResume() {
        return $this->resume;
    }

    public function getAuthor_id() {
        return $this->author_id;
    }

}