<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class UsersModel extends Database {
    private $user_id;
    private $user_name;
    private $user_password;
    private $role_id;
    
    public function __construct($user_id = null, $user_name = null, $user_password = null, $role_id = null) {
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_password = $user_password;
        $this->role_id = $role_id;
    }

    public function getUsers($user_name) {
        $sql ="SELECT * FROM user WHERE user_name = :user_name";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $user;
    }

}