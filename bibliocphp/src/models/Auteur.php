<?php
namespace models;

class Auteur {

    private int $id;
    private string $firstname;
    private string $lastname;

    public function __construct(int $id, string $firstname, string $lastname) {

        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

    }

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

}