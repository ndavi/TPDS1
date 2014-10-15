<?php

namespace NuitsCroixRousse\Domain;

class Genre {

    /**
     * Genre ID
     *
     * @var integer
     */
    private $id;

    /**
     * Nom du genre.
     *
     * @var string
     */
    private $name;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
