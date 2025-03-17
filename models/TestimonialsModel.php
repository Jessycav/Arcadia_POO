<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class TestimonialsModel extends Database {
    private $testimonial_id;
    private $visitor_firstname;
    private $visit_date;
    private $message;
    private $approuve_message;

    public function __construct($testimonial_id = null, $visitor_firstname = null, $visit_date = null, $message = null, $approuve_message = null) {
        $this->testimonial_id = $testimonial_id;
        $this->visitor_firstname = $visitor_firstname;
        $this->visit_date = $visit_date;
        $this->message = $message;
        $this->approuve_message = $approuve_message;
    }

    public function createTestimonials($visitor_firstname, $visit_date, $message) {
        $sql = "INSERT INTO testimonial (visitor_firstname, visit_date, message) 
        VALUES (:visitor_firstname, :visit_date, :message)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':visitor_firstname', $visitor_firstname, PDO::PARAM_STR);
        $stmt->bindParam(':visit_date', $visit_date, PDO::PARAM_INT);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $newTestimonial = $stmt->execute();
        $stmt->closeCursor();
        return $newTestimonial;
    }

    public function getApprovedTestimonials() {
        $sql = "SELECT * FROM testimonial WHERE approuve_message = 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $testimonials;
    }

    public function getPendingTestimonials() {
        $sql = "SELECT * FROM testimonial WHERE approuve_message = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $waitingtestimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $waitingtestimonials;
    }

    public function approveTestimonial($testimonial_id) {
        $sql = "UPDATE testimonial SET approuve_message = 1 WHERE testimonial_id = :testimonial_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':testimonial_id', $testimonial_id, PDO::PARAM_INT);
        $stmt->execute();
        $acceptedTestimonial = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $acceptedTestimonial;
    }

    public function deleteTestimonial($testimonial_id) {
        $sql = "DELETE FROM testimonial WHERE testimonial_id = :testimonial_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':testimonial_id', $testimonial_id, PDO::PARAM_INT);
        $stmt->execute();
        $deletedTestimonial = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $deletedTestimonial;
    } 
}