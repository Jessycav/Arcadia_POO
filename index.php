<!-- Fichier routeur point d'entrée de l'application -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
require_once 'controllers/HomeController.php';
$homeController = new HomeController();
require_once 'controllers/HabitatsController.php';
$habitatsController = new HabitatsController();
require_once 'controllers/AnimalsController.php';
$animalsController = new AnimalsController();
require_once 'controllers/ServicesController.php';
$servicesController = new ServicesController();
require_once 'controllers/FormsController.php';
$formsController = new FormsController();
require_once 'controllers/UsersController.php';
$usersController = new UsersController();
require_once 'controllers/TestimonialsController.php';
$testimonialsController = new TestimonialsController();



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

            if (isset($_GET['fetch']) && $_GET['fetch'] === 'testimonials') {
                header("Content-Type: application/json");
                $testimonialsController->approuvedTestimonials();
                echo json_encode($testimonials);
                exit();
            }
            
            break;

        case "habitats":
            require_once ('./indexComponents/habitatsIndex.php');
            break;
        
        case "animaux":
            require_once ('./indexComponents/animalsIndex.php');
            break;
            
        case "services":
            $servicesController->allServices();
            break;
            
        case "contact":
            $formsController->contactPage(); //Objet appelle la méthode homePage
            break;
        
        case "avis":
            require_once ('indexComponents/testimonialsIndex.php');
            break;
        
        case "connexion":
            require_once ('indexComponents/connexionIndex.php');
            break;
    
        default:
            throw new Exception ("La page demandée n'existe pas");        
    }

} catch(Exception $e) {
    echo "Erreur: " . $e->getMessage();
}