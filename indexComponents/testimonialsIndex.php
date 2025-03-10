<?php


switch ($url[1]) {
    case "ecrireAvis":
        $formsController->testimonialsPage();
        break;

    default:
        throw new Exception ("La page demandée n'existe pas"); 
}