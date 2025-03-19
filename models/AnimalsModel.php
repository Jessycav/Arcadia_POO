<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class AnimalsModel extends Database {
    private $animal_id;
    private $animal_name;
    private $habitat_id;
    
    public function __construct($animal_id = null, $animal_name = null, $habitat_id = null) {
        $this->animal_id = $animal_id;
        $this->animal_name = $animal_name;
        $this->habitat_id = $habitat_id;
    }

    public function getAnimalsByHabitatId($habitat_id) {
        $sql = "SELECT animal.animal_id, animal.animal_name
        FROM animal
        WHERE animal.habitat_id = :habitat_id";
        //Récupérer les animaux associés à l'habitat et les images
        $stmt = $this->connect()->prepare($sql);           
        $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
        $stmt->execute();
        $animalsByHabitat = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $stmt->closeCursor();
        return $animalsByHabitat;
    }

    public function getAllAnimals() {
        $habitat_filter = isset($_GET['habitat_id']) ? $_GET['habitat_id'] : '';
        // Recupérer les données animaux avec jointure
        $sql = "SELECT animal.animal_id, animal.animal_name, animal_image.animal_image_url 
        FROM animal JOIN animal_image ON animal.animal_id = animal_image.animal_id";
        if ($habitat_filter) {
            $sql .= " WHERE animal.habitat_id = :habitat_id";
        }   
        // Préparation de la requête pour sécuriser et éviter les injections SQL
        $stmt = $this->connect()->prepare($sql);
        // Lier le paramètre si le filtre est appliqué
        if ($habitat_filter) {
            $stmt->bindParam(':habitat_id', $habitat_filter, PDO::PARAM_INT);
        }
        //Exécuter la requête
        $stmt->execute();
        //Récupération des résultats
        $allAnimals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $allAnimals; 
    }

    public function getOneAnimalById($animal_id) {
        //Préparer la requête pour récupérer les détails de l'animal
        $sql = "SELECT animal.animal_name, animal.health, breed.breed_name, habitat.habitat_name, habitat.habitat_id, animal_image.animal_image_url, veterinary_report.food, veterinary_report.food_weight
                FROM animal
                JOIN habitat ON animal.habitat_id = habitat.habitat_id
                JOIN breed ON animal.breed_id = breed.breed_id
                LEFT JOIN animal_image ON animal.animal_id = animal_image.animal_id
                LEFT JOIN veterinary_report ON animal.animal_id = veterinary_report.animal_id
                WHERE animal.animal_id = :animal_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
        $stmt->execute();
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animal; 
    }

    public function getAnimals() {
        $sql = "SELECT animal.animal_id, animal.animal_name, animal_image.animal_image_url 
        FROM animal JOIN animal_image ON animal.animal_id = animal_image.animal_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animals;
    }
}