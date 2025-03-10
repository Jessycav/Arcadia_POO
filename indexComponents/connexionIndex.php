<?php

switch ($url[1]) {
    case "espacePro":
        $usersController->loginPage();
        break;

    default:
        throw new Exception ("La page demandée n'existe pas"); 
}