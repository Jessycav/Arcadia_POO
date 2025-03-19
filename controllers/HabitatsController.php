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

    public function viewHabitats() {
        $habitats = $this->habitatsModel->getAllHabitats();
        require __DIR__ . '/../views/pages/admin/crudHabitats/habitatsCrudPage.php';
    }

    public function showHabitats($habitat_id) {
        $oneHabitat = $this->habitatsModel->getHabitatById($habitat_id);
        
        $animals = $this->animalsModel->getAnimalsByHabitatId($habitat_id);
        require __DIR__ . '/../views/pages/habitats/habitatsDetailPage.php';
    }

    public function viewOneHabitatDetail($habitat_id) {
        $oneHabitat = $this->habitatsModel->getHabitatById($habitat_id);
        $animals = $this->animalsModel->getAnimalsByHabitatId($habitat_id);

        if (empty($oneHabitat)) {
            die("Habitat introuvable");
        }
        require __DIR__ . '/../views/pages/admin/crudHabitats/habitatDetailPage.php';
    }

    public function createNewHabitat() {
        $habitat_id = isset($_POST['habitat_id']) ? intval($_POST['habitat_id']) : null;
        $habitat_name = htmlspecialchars($_POST['habitat_name']);
        $habitat_description = htmlspecialchars($_POST['habitat_description']);
        $habitat_image_url = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_name = basename($_FILES['image']['name']);
            $image_path = 'public/assets/habitats/' . $image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                $habitat_image_url = $image_path;
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } 

        if ($this->habitatsModel->addHabitat($habitat_name, $habitat_description, $habitat_image_url)) {
            header("Location:" . ROOT . "monCompte/gestionHabitats/tousLesHabitats");
            exit();
        } else {
            throw new Exception("Erreur lors de l'ajout de l'habitat");
        }
    }

    public function deleteHabitat($habitat_id) {
        if ($this->habitatsModel->deleteHabitatById($habitat_id)) {
            header("Location:" . ROOT . "monCompte/gestionHabitats/tousLesHabitats");
            exit();
        } else {
            echo "Erreur lors de la suppression de l'habitat";
        } 
    }

    public function modifyHabitat($habitat_id) {
        $habitat_id = intval($_POST['habitat_id']);
        $habitat = $this->habitatsModel->getHabitatById($habitat_id);
        if (empty($habitat)) {
            die("Habitat introuvable");
        }
        require_once __DIR__ . '/../views/pages/admin/crudHabitats/modifyHabitatPage.php';
    }

    public function updateHabitat() {
        $habitat_id = intval($_POST['habitat_id']);
        $habitat_name = htmlspecialchars($_POST['habitat_name']);
        $habitat_description = htmlspecialchars($_POST['habitat_description']);
        $old_image_url = htmlspecialchars($_POST['old_image_url']);

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_name = basename($_FILES['image']['name']);
            $image_path = 'public/assets/habitats/' . $image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                $habitat_image_url = $image_path;
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } else {
            $habitat_image_url = $old_image_url;
        }

        if ($this->habitatsModel->updateHabitat($habitat_id, $habitat_name, $habitat_description, $habitat_image_url)) {
            header("Location:" . ROOT . "monCompte/gestionHabitats/tousLesHabitats");
            exit();
        } else {
            throw new Exception("Erreur lors la modification des habitats");
        }
    }
}