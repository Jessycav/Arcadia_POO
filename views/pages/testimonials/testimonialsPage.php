<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Écrire un avis</h3>
    <div class="form-container">
        <form action="<?=ROOT?>avis/ajouterAvis" method="POST">
            <div class="inputBox">
                <label for="visitor_firstname">Prénom :</label>
                <input type="text" id="visitor_firstname" name="visitor_firstname" placeholder="Entrer votre prénom" required />
            </div>
            <div class="inputBox">
                <label for="visit_date">Visite du :</label>
                <input type="date" id="visit_date" name="visit_date" placeholder="Entrer votre mot de passe" required />
            </div>
            <div class="inputBox">
                <label for="message">Votre avis :</label>
                <textarea type="message" id="message" name="message" rows="5" placeholder="Écriver votre avis" required></textarea>
            </div>        
            <button class="btn" type="submit" onclick="submitTestimonial()">Envoyer</button>
        </form>
    </div>
    <button class="btn"><a href="<?=ROOT?>accueil">RETOUR A L'ACCUEIL</a></button>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");