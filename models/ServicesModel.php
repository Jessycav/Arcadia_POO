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
}