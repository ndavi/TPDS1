<?php

namespace NuitsCroixRousse\DAO;

use NuitsCroixRousse\Domain\Genre;

class GenreDAO extends DAO {

    /**
     * Returns la liste de tous les gens triés par nom
     *
     * @return array La liste de tous les genres
     */
    public function findAll() {
        $sql = "select * from t_genre order by gen_name";
        $result = $this->getDb()->fetchAll($sql);

        $genres = array();
        foreach ($result as $row) {
            $genreId = $row['gen_id'];
            $genres[$genreId] = $this->buildDomainObject($row);
        }
        return $genres;
    }

    /**
     * Returns le genre correspondant à l'id
     *
     * @param integer $id l'id du genre
     *
     * @return \NuitsCroixRousse\Domain\Genre|Jette une exception si aucun id trouvé
     */
    public function find($id) {
        $sql = "select * from t_genre where gen_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de genre trouvé pour l'id " . $id);
    }

    /**
     * Crée une instance de la classe genre à partir d'une requête de la BDD
     *
     * @param array $row la ligne contenant les données.
     *
     * @return \NuitsCroixRousse\Domain\Genre
     */
    protected function buildDomainObject($row) {
        $genre = new Genre();
        $genre->setId($row['gen_id']);
        $genre->setName($row['gen_name']);
        return $genre;
    }

}
