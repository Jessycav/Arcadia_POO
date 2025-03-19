<?php

// si $url[0] = moncompte
// si $url[1] = gestionHabitats

switch ($url[2]) {
    case "tousLesHabitats":
        $habitatsController->viewHabitats();
        break;

    case "detailHabitat":
        $habitat_id = intval($_POST['habitat_id']);
        $habitatsController->viewOneHabitatDetail($habitat_id);
        break;

    case "ajouterHabitat":
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $habitatsController->createNewHabitat();
        } else {
            echo "Erreur lors de l'ajout";
        }
        break;

    case "modifierHabitat";
        $habitat_id = intval($_POST['habitat_id']);
        if (isset($_POST['habitat_id']) && !empty($_POST['habitat_id'])) {
            $habitatsController->modifyHabitat($habitat_id);
        } else {
            die ("Erreur: ID de l'habitat manquant");
        }
        break;

    case "updateHabitat":
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $habitatsController->updateHabitat();
        } else {
            echo "Erreur de modification";
        }
        break;

    case "supprimerHabitat":
        $habitat_id = htmlentities($_POST['habitat_id']);
        $habitatsController->deleteHabitat($habitat_id);
        break;    
        
    default:
    throw new Exception ("La page demandée n'existe pas"); 
} 