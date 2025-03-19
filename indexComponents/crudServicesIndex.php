<?php

// si $url[0] = moncompte
// si $url[1] = gestionServices

switch ($url[2]) {
    case "tousLesServices":
        $servicesController->viewServices();
        break;

    case "detailService":
        $service_id = intval($_POST['service_id']);
        $servicesController->viewOneServiceDetail($service_id);
        break;

    case "ajouterService":
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $servicesController->createNewService();
        } else {
            echo "Erreur de modification";
        }
        break;

    case "modifierService";
        $service_id = intval($_POST['service_id']);
        if (isset($_POST['service_id']) && !empty($_POST['service_id'])) {
            $servicesController->modifyService($service_id);
        } else {
            die ("Erreur: ID du service manquant");
        }
        break;
    
    case "updateService":
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $servicesController->updateService();
        } else {
            echo "Erreur de modification";
        }
        break;

    case "supprimerService":
        $service_id = htmlentities($_POST['service_id']);
        $servicesController->deleteService($service_id);
        break;    
    
    default:
    throw new Exception ("La page demandée n'existe pas"); 
}