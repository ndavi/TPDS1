<?php

namespace NuitsCroixRousse\Domain;

class Concert {

    /**
     * Id du concert.
     *
     * @var integer
     */
    private $id;

    /**
     * Nom de l'artiste
     *
     * @var string
     */
    private $artist;

    /**
     * Date du concert
     *
     * @var \DateTime
     */
    private $date;

    /**
     * Place du concert
     *
     * @var string
     */
    private $place;

    /**
     * Description du concert
     *
     * @var string
     */
    private $description;

    /**
     * Prix du concert
     *
     * @var string
     */
    private $prix;

    /**
     * Genre
     *
     * @var NuitsCroixRousse\Domain\Genre
     */
    private $genre;

    public function getDate() {
        return $this->date;
    }

    public function setDate(\DateTime $date) {
        $this->date = $date;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getId() {
        return $this->id;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function getPlace() {
        return $this->place;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setArtist($artist) {
        $this->artist = $artist;
    }

    public function setPlace($place) {
        $this->place = $place;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

}
