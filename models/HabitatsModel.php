<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class HabitatsModel extends Database {
    private $habitat_id;
    private $habitat_name;
    private $habitat_description;
    private $habitat_image_url;
  
    
    public function __construct($habitat_id = null, $habitat_name = null, $habitat_description = null, $habitat_image_url = null) {
        $this->habitat_id = $habitat_id;
        $this->habitat_name = $habitat_name;
        $this->habitat_description = $habitat_description;
        $this->habitat_image_url = $habitat_image_url;
    }

    public function getAllHabitats() {
        $sql = "SELECT habitat.habitat_id, habitat.habitat_name, habitat_image.habitat_image_url 
        FROM habitat 
        JOIN habitat_image 
        ON habitat.habitat_id = habitat_image.habitat_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $habitats;
    } 

    public function getHabitatById($habitat_id) {
        $sql = "SELECT habitat.habitat_name, habitat_image.habitat_image_url, habitat.habitat_description
        FROM habitat
        JOIN habitat_image ON habitat.habitat_id = habitat_image.habitat_id
        WHERE habitat.habitat_id = :habitat_id";
        $stmt = $this->connect()->prepare($sql);                          
        $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
        $stmt->execute();
        $oneHabitat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $oneHabitat;
    }
}



