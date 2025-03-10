<?php

switch ($url[1]) {
    case "tousleshabitats":
        $habitatsController->allHabitats();
        break;

    case "habitatsDetail":
        $habitat_id = isset($_POST['habitat_id']) ? htmlentities($_POST['habitat_id']) :
        (isset($_GET['id']) ? htmlentities($_GET['id']) : null);
        $habitatsController->showHabitats($habitat_id);
        break;

    default:
        throw new Exception ("La page demandée n'existe pas"); 
}