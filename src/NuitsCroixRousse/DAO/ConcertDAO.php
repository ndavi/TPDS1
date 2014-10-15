<?php

namespace NuitsCroixRousse\DAO;

use NuitsCroixRousse\Domain\Concert;

class ConcertDAO extends DAO {

    /**
     * @var NuitsCroixRousse\DAO\GenreDAO
     */
    private $genreDAO;

    public function setGenreDAO($genreDAO) {
        $this->genreDAO = $genreDAO;
    }

    /**
     * Retourne la liste de tous les concerts, trié par date.
     *
     * @return array La liste des concerts.
     */
    public function findAll() {
        $sql = "select * from t_concert order by conc_date";
        $result = $this->getDb()->fetchAll($sql);

        // Converts query result to an array of domain objects
        $concerts = array();
        foreach ($result as $row) {
            $concertId = $row['conc_id'];
            $concerts[$concertId] = $this->buildDomainObject($row);
        }
        return $concerts;
    }

    /**
     * Returns la liste de tous les concerts triés par date
     *
     * @param integer $genreId l'id du genre.
     *
     * @return array La liste des concerts par famille.
     */
    public function findAllByGenre($genreId) {
        $sql = "select * from t_concert where gen_id=? order by conc_date";
        $result = $this->getDb()->fetchAll($sql, array($genreId));

        // Convert query result to an array of domain objects
        $concerts = array();
        foreach ($result as $row) {
            $concertId = $row['conc_id'];
            $concerts[$concertId] = $this->buildDomainObject($row);
        }
        return $concerts;
    }

    /**
     * Returns le concert correspondant à l'id
     *
     * @param integer $id, l'id du concert
     *
     * @return \NuitsCroixRousse\Domain\Concert|Jette une exception si aucun id trouvé
     */
    public function find($id) {
        $sql = "select * from t_concert where conc_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Par de concert trouvé pour l'id " . $id);
    }

    /**
     * Crée une instance de la classe concert depuis une requête de la BDD
     *
     * @param array $row la ligne contenant les données.
     *
     * @return \NuitsCroixRousse\Domain\Concert
     */
    protected function buildDomainObject($row) {
        $genreId = $row['gen_id'];
        $genre = $this->genreDAO->find($genreId);

        $concert = new Concert();
        $concert->setId($row['conc_id']);
        $concert->setArtist($row['conc_artist']);
        $concert->setDate(new \DateTime($row['conc_date']));
        $concert->setPlace($row['conc_place']);
        $concert->setDescription($row['conc_description']);
        $concert->setPrix($row['conc_price']);
        $concert->setGenre($genre);
        return $concert;
    }

}
