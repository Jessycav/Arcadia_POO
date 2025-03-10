<?php

require_once("./models/ServicesModel.php");

class ServicesController {
    
    public $servicesModel;

    public function __construct() {
        $this->servicesModel = new ServicesModel();
    }

    public function allServices() {
        $services = $this->servicesModel->getAllServices();
        require __DIR__ . '/../views/pages/servicesPage.php';
    }
}