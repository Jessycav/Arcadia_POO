<?php

require_once ("./models/TestimonialsModel.php");

class TestimonialsController {

    public $testimonialsModel;

    public function __construct() {
        $this->testimonialsModel = new TestimonialsModel();
    }

    public function addTestimonials($visitor_firstname, $visit_date, $message) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visitor_firstname = htmlspecialchars($_POST['visitor_firstname'], ENT_QUOTES);
            $visit_date = filter_var($_POST['visit_date'], FILTER_VALIDATE_INT);
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
        }
        if ($this->testimonialsModel->createTestimonials($visitor_firstname, $visit_date, $message)) {
            header("Location:" . ROOT . "accueil");
        }    
    }

    public function showTestimonials() {
        if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
            header('Content-Type: application/json');
            echo json_encode($this->testimonialsModel->getApprovedTestimonials());
            exit;     
        }
    }

    public function approveTestimonials() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $testimonial = json_decode(file_get_contents("php://input"), true);
            if (!empty($testimonial['testimonial_id'])) {
                $this->testimonialsModel = approveTestimonial($testimonial_id);
                echo json_encode(["success" => true]);
            }
        }
    }

    public function deleteTestimonials() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $testimonial = json_decode(file_get_contents("php://input"), true);
            if (!empty($testimonial['testimonial_id'])) {
                $this->testimonialsModel = deleteTestimonial($testimonial_id);
                echo json_encode(["success" => true]);
            }
        }
    }
}