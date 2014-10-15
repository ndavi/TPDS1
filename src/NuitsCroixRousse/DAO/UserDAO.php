<?php

namespace NuitsCroixRousse\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use NuitsCroixRousse\Domain\User;

class UserDAO extends DAO implements UserProviderInterface {

    /**
     * Returns un utilisateur correspondant à l'id
     *
     * @param integer $id
     *
     * @return NuitsCroixRousse\Domain\User|Jette une exception si aucun id trouvé
     */
    public function find($id) {
        $sql = "select * from t_user where user_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);
    }

    /**
     * Sauvegarde un utilisateur avec de nouvelles valeurs
     *
     * @param NuitsCroixRousse\Domain\User
     *
     */
    public function save($visitor) {
        $visitorData = array(
            'user_name' => $visitor->getUsername(),
            'password' => $visitor->getPassword()
        );
        $this->getDb()->update('t_user', $visitorData, array('user_id' => $visitor->getId()));
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username) {
        $sql = "select * from t_user where user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class) {
        return 'NuitsCroixRousse\Domain\User' === $class;
    }

    /**
     * Crée un visiteur à partir d'une requête de la BDD
     *
     * @param array $row la ligne contenant les informations
     * @return NuitsCroixRousse\Domain\User
     */
    protected function buildDomainObject($row) {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($row['user_name']);
        $user->setPassword($row['user_password']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;
    }

}
