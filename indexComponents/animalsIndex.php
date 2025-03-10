<?php

switch ($url[1]) {
    case "tousnosanimaux":
        $animalsController->allAnimals();
        break;
    
    case "animalDetail":
        $animal_id = isset($_POST['animal_id']) ? htmlentities($_POST['animal_id']) :
        (isset($_GET['id']) ? htmlentities($_GET['id']) : null);
        $animalsController->showAnimalDetail($animal_id);
        break;

    default:
        throw new Exception ("La page demandée n'existe pas"); 
}