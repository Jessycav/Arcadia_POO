<?php

require_once("./models/HabitatsModel.php");
require_once("./models/AnimalsModel.php");

class HabitatsController {
    
    public $habitatsModel;
    public $animalsModel;

    public function __construct() {
        $this->habitatsModel = new HabitatsModel();
        $this->animalsModel = new AnimalsModel();
    }

    public function allHabitats() {
        $habitats = $this->habitatsModel->getAllHabitats();
        require __DIR__ . '/../views/pages/habitats/habitatsPage.php';
    }

    public function showHabitats($habitat_id) {
        $oneHabitat = $this->habitatsModel->getHabitatById($habitat_id);
        
        $animals = $this->animalsModel->getAnimalsByHabitatId($habitat_id);
        require __DIR__ . '/../views/pages/habitats/habitatsDetailPage.php';
    }
}