<!-- Fichier routeur point d'entrée de l'application -->
<?php

//session_start();  Démarre une session
// Vérifier si un utilisateur est connecté -<stockage dans la variable $user_id
//$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

/* Définir l'URL de base du projet avec : 
-> détection site HTTP ou HTTPS
-> récupération du nom de domaine 
-> récupération URL complète
-> suppression index.php pour garder la racine du projet */
define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

// Chargement des controlleurs


try {
    if (empty($_GET['page'])) { //Vérifie si le paramètre page est vide
        $url[0] = "accueil"; //Renvoie une page d'accueil par défaut
    } else {
        // Divise l'URL en plusieurs parties en nettoyant l'URL pour la sécurité
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
    }

    switch ($url[0]) {
        case "accueil":
            $homeController->homePage(); //Objet appelle la méthode homePage
            break;
                  
        default:
            throw new Exception ("La page demandée n'existe pas");        
    }

} catch(Exception $e) {
    echo "Erreur: " . $e->getMessage();
}