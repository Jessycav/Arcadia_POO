<?php

require_once ("./models/TestimonialsModel.php");

class TestimonialsController {

    public $testimonialsModel;

    public function __construct() {
        $this->testimonialsModel = new TestimonialsModel();
    }

    public function addTestimonials() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $testimonial = json_decode(file_get_contents("php://input"), true);
            if (!empty($testimonial['visitor_firstname']) && !empty($testimonial['message'])) {
                $this->testimonialsModel = addTestimonials();
                echo json_encode(["success" => true, "message" => "Votre avis a été envoyé et est en attente de validation"]);
            } else {
                echo json_encode(["success" => false, "message" => "Erreur lors de la soumission de l'avis"]);
            }
        }
    }

    public function approuvedTestimonials() {
        echo json_encode($this->testimonialsModel->getApprouvedTestimonials()); 
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