<?php

require_once("./models/ServicesModel.php");

class ServicesController {
    
    public $servicesModel;

    public function __construct() {
        $this->servicesModel = new ServicesModel();
    }

    public function allServices() {
        $services = $this->servicesModel->getAllServices();
        require __DIR__ . '/../views/pages/servicesPage.php';
    }

    public function viewServices() {
        $services = $this->servicesModel->getAllServices();
        require __DIR__ . '/../views/pages/admin/crudServices/servicesCrudPage.php';
    }

    public function viewOneServiceDetail($service_id) {
        $service = $this->servicesModel->getServiceDetailById($service_id);
        if (empty($service)) {
            die("Service introuvable");
        }
        require __DIR__ . '/../views/pages/admin/crudServices/serviceDetailPage.php';
    }

    public function modifyService($service_id) {
        $service = $this->servicesModel->getServiceDetailById($service_id);
        if (empty($service)) {
            die("Service introuvable");
        }
        require_once __DIR__ . '/../views/pages/admin/crudServices/modifyServicePage.php';
    }

    public function updateService() {
        $service_id = intval($_POST['service_id']);
        $service_name = htmlspecialchars($_POST['service_name']);
        $service_description = htmlspecialchars($_POST['service_description']);
        $old_image_url = htmlspecialchars($_POST['old_image_url']);

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_name = basename($_FILES['image']['name']);
            $image_path = 'public/assets/services/' . $image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                $service_image_url = $image_path;
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } else {
            $service_image_url = $old_image_url;
        }

        if ($this->servicesModel->updateService($service_id, $service_name, $service_description, $service_image_url)) {
            header("Location:" . ROOT . "monCompte/gestionServices/tousLesServices");
            exit();
        } else {
            throw new Exception("Erreur lors la modification des services");
        }
    }

    public function createNewService() { 
        $service_id = intval($_POST['service_id']);
        $service_name = htmlspecialchars($_POST['service_name']);
        $service_description = htmlspecialchars($_POST['service_description']);
        $service_image_url = htmlspecialchars($_POST['service_image_url']);

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_name = basename($_FILES['image']['name']);
            $image_path = 'public/assets/services/' . $image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                $service_image_url = $image_path;
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } 

        if ($this->servicesModel->addService($service_name, $service_description, $service_image_url)) {
            header("Location:" . ROOT . "monCompte/gestionServices/tousLesServices");
            exit();
        } else {
            throw new Exception("Erreur lors de l'ajout du service") ;
        }
    }

    public function deleteService($service_id) {
        if ($this->servicesModel->deleteServiceById($service_id)) {
            header("Location:" . ROOT . "monCompte/gestionServices/tousLesServices");
            exit();
        } else {
            echo "Erreur lors de la suppression du cadeau";
        }     
    }
}