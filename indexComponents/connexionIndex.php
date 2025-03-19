<?php

// si $url[0] = monCompte

switch ($url[1]) {
    case "espacePro":
        $usersController->loginPage();
        break;

    case "login":
        $user_name = trim($_POST['user_name'] ?? ''); 
        $user_password = trim($_POST['user_password'] ?? '');
        if (empty($user_name) || empty($user_password)) {
            throw new Exception ("Veuillez remplir tous les champs");
        }
        $usersController->login($user_name, $user_password);
        break;
    
    case "dashboard":
        $usersController->dashboardPage(); 
        break;

    case "deconnexion":
        $usersController->logout();
        break;

    case "gestionUtilisateurs":
        //require_once ('indexComponents/crudServicesIndex.php');
        break;

    case "gestionHabitats":
        require_once ('indexComponents/crudHabitatsIndex.php');
        break;

    case "gestionAnimaux":
        require_once ('indexComponents/crudAnimalsIndex.php');
        break;

    case "gestionServices":
        require_once ('indexComponents/crudServicesIndex.php');
        break;    
    
    case "gestionAvis":
        //require_once ('indexComponents/crudServicesIndex.php');
        break;

    default:
        throw new Exception ("La page demandée n'existe pas"); 
}