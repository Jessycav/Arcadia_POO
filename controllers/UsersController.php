<?php

require_once("./models/UsersModel.php");

class UsersController {

    public $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel();
    }
    
    public function loginPage() {
        require_once ("./views/pages/admin/loginPage.php");
    }

    public function login($user_name, $user_password) {
        if (isset($_SESSION['user_name'])) {
            header("Location:" . ROOT . "monCompte/dashboard");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->usersModel->getUsers($user_name, $user_password);
          //Préparer une requête pour vérifier si le mot de passe est correct (mot de passe haché)
        if ($user && password_verify($user_password, $user['user_password'])) {
            // Enregistrer le nom d'utilisateur dans la session
            $_SESSION['user_name'] = $user['user_name'];
            header("Location:" . ROOT . "monCompte/dashboard");
            exit();
        } else {
            $error = 'Nom d\'utilisateur ou mot de passe incorrect';
        }
        }
    }

    public function dashboardPage() {
        require_once ("./views/pages/admin/dashboardPage.php");
    }

    public function logout() {
        session_destroy();
        header("Location:" . ROOT);
    }
}