<?php

// si $url[0] = moncompte
// si $url[1] = gestionAnimaux

switch ($url[2]) {
    case "tousLesAnimaux":
        $animalsController->viewAnimals();
        break;

    case "detailAnimal":
        break;
        

    case "ajouterAnimal":
        
        break;

    case "modifierAnimal";
        
        break;
    
    case "updateAnimal":
       
        break;

    case "supprimerAnimal":
        
        break;    
    
    default:
    throw new Exception ("La page demandée n'existe pas"); 
}