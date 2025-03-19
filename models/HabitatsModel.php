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

    public function addHabitat($habitat_name, $habitat_description, $habitat_image_url) {
        try {
            $this->connect()->beginTransaction();
            // Insertion dans la table habitat
            $sql_habitat = "INSERT INTO habitat (habitat_name, habitat_description) 
            VALUES (:habitat_name, :habitat_description)";
            $stmt_habitat = $this->connect()->prepare($sql_habitat);
            $stmt_habitat->bindParam(':habitat_name', $habitat_name, PDO::PARAM_STR);
            $stmt_habitat->bindParam(':habitat_description', $habitat_description, PDO::PARAM_STR);

            if ($stmt_habitat->execute()) {
                $habitat_id = $this->connect()->lastInsertId(); // Récupérer id habitat
            }

            if (!$habitat_id) {
                throw new Exception("ID Habitat non récupéré");
            }
            // Insérer dans la table habitat_image
            $sql_image = "INSERT INTO habitat_image (habitat_id, habitat_image_url) 
            VALUES (:habitat_id, :habitat_image_url)";
            $stmt_image = $this->connect()->prepare($sql_image);
            $stmt_image->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
            $stmt_image->bindParam(':habitat_image_url', $image_path, PDO::PARAM_STR);

                if ($stmt_image->execute()) {
                    // Valider la transaction
                    $this->connect()->commit();
                    return "Le nouvel habitat a été ajouté avec succès.";
                } else {
                    throw new Exception("Erreur lors de l'ajout de l'image.");
                }
        } catch (PDOException $e) {
            $this->connect()->rollBack();
            echo("Erreur lors de l'ajout : " . $e->getMessage());
        }
    } 

    public function deleteHabitatById($habitat_id) {
        $sql_image = "DELETE FROM habitat_image WHERE habitat_id = :habitat_id";
        $stmt = $this->connect()->prepare($sql_image); 
        $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
        $sql = "DELETE FROM habitat WHERE habitat_id = :habitat_id";
        $stmt = $this->connect()->prepare($sql); 
        $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }
    

    public function updateHabitat($habitat_id, $habitat_name, $habitat_description, $habitat_image_url) {
        $sql = "UPDATE habitat 
        SET habitat_name = :habitat_name, habitat_description = :habitat_description
        WHERE habitat_id = :habitat_id";
        $$stmt_habitat = $this->connect()->prepare($sql);
        $$stmt_habitat->bindParam(":habitat_id", $habitat_id, PDO::PARAM_INT);
        $$stmt_habitat->bindParam(":habitat_name", $habitat_name, PDO::PARAM_STR);
        $$stmt_habitat->bindParam(":habitat_description", $habitat_description, PDO::PARAM_STR);
       
        if ($stmt_habitat->execute()) {
            $habitat_id = $this->connect()->lastInsertId();
            $sql_image = "UPDATE habitat_image SET habitat_image_url = :habitat_image_url 
            WHERE habitat_id = :habitat_id"; 
            $stmt_image = $conn->prepare($sql_image);
            $stmt_image->bindParam(':habitat_image_url', $image_path, PDO::PARAM_STR);
            $stmt_image->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
            $stmt_image->execute();

            echo "L'habitat a été modifié.";
        } else {
            echo "Erreur de modification de l'habitat.";
        }
    }
}