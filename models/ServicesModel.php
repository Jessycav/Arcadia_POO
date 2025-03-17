<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class ServicesModel extends Database {
    private $service_id;
    private $service_name;
    private $service_image_url;
    private $service_description;
  
    
    public function __construct($service_id = null, $service_name = null, $service_image_url = null, $service_description = null) {
        $this->service_id = $service_id;
        $this->service_name = $service_name;
        $this->service_image_url = $service_image_url;
        $this->service_description = $service_description;
    }

    public function getAllServices() {
        $sql = "SELECT service.service_id, service.service_name, service.service_image_url, service.service_description 
        FROM service";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $services;
    }

    public function getServiceDetailById($service_id)  {
        $sql = "SELECT * FROM service WHERE service_id = :service_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":service_id", $service_id, PDO::PARAM_INT);
        $stmt->execute();
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $service;
    }
    
    public function updateService($service_id, $service_name, $service_description, $service_image_url) {
        $sql = "UPDATE service 
        SET service_name = :service_name, service_description = :service_description, service_image_url = :service_image_url
        WHERE service_id = :service_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":service_id", $service_id, PDO::PARAM_INT);
        $stmt->bindParam(":service_name", $service_name, PDO::PARAM_STR);
        $stmt->bindParam(":service_description", $service_description, PDO::PARAM_STR);
        $stmt->bindParam(":service_image_url", $service_image_url, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function addService($service_name, $service_description, $service_image_url) {
        $sql = "INSERT INTO service (service_name, service_description, service_image_url) 
        VALUES (:service_name, :service_description, :service_image_url)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":service_name", $service_name, PDO::PARAM_STR);
        $stmt->bindParam(":service_description", $service_description, PDO::PARAM_STR);
        $stmt->bindParam(":service_image_url", $service_image_url, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }

    public function deleteServiceById($service_id) {
        $sql = "DELETE FROM service WHERE service_id = :service_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":service_id", $service_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true; 
    }
}