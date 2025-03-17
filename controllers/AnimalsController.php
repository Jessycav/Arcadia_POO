<?php

require_once("./models/AnimalsModel.php");

class AnimalsController {
    
    public $animalsModel;

    public function __construct() {
        $this->animalsModel = new AnimalsModel();
    }

    public function allAnimals() {
        $habitat_filter = isset($_GET['habitat_id']) ? $_GET['habitat_id'] : '';
        $allAnimals = $this->animalsModel->getAllAnimals();
        require __DIR__ . '/../views/pages/animals/allAnimalsPage.php';
    }

    public function showAnimalDetail($animal_id){
        $animal_id = isset($_POST['animal_id']) ? (int) $_POST['animal_id'] : 
        (isset($_GET['id']) ? (int) $_GET['id'] : 0);

        if ($animal_id <= 0) {
            echo "Identifiant de l'animal invalide";
            return;
        }
        $animal = $this->animalsModel->getOneAnimalById($animal_id);
        if (!$animal) {
            echo "Aucun animal trouvé";
            return;
        }
        require __DIR__ . '/../views/pages/animals/animalsDetailPage.php';
    }

    public function viewAnimals() {
        $animals = $this->animalsModel->getAllAnimals();
        require __DIR__ . '/../views/pages/admin/crudAnimals/animalsCrudPage.php';
    }
}