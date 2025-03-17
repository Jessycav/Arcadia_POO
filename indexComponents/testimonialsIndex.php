<?php

// si $url[0] = 

switch ($url[1]) {
    case "ecrireAvis":
        $formsController->testimonialsPage();
        break;
    
    case "ajouterAvis":
        $visitor_firstname = htmlspecialchars($_POST['visitor_firstname'], ENT_QUOTES);
        $visit_date = filter_var($_POST['visit_date'], FILTER_VALIDATE_INT);
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES);

        if (empty($visitor_firstname) || empty($message)) {
            throw new Exception("Vérifier les champs saisis");
        }
        $testimonialsController->addTestimonials($visitor_firstname, $visit_date, $message);
        break;

    default:
        throw new Exception ("La page demandée n'existe pas"); 

/*         switch ($url[2]) {
            case "tousLesServices":
                $servicesController->viewServices();
                break;
        
            case "detailService":
                $servicesController->viewOneServiceDetail();
                break;
        
            case "ajouterService":
        
                break;
        
            case "modifierService";
                break;
        
            case "supprimerService":
                break;    
            
            default:
            throw new Exception ("La page demandée n'existe pas"); 
        } */
}