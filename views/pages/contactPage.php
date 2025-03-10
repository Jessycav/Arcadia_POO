<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Nous contacter</h4>
    </div>
    <h3>Formulaire</h3>
    <!-- Espace de contact -->
    <div class="form-container">
        <form action="" method="POST"> 
            <div class="inputBox">
                <input type="email" placeholder="Entrez votre email" required>
                <input type="text" placeholder="Saisissez un titre" required>
            </div>
            <textarea name="" placeholder="Ecrivez votre message..." cols="10" rows="6" required></textarea>
            <button class="btn" type="submit">Envoyer le message</button>
        </form>
    </div> 
    <a href="<?=ROOT?>accueil"><button class="btn">RETOUR A L'ACCUEIL</button></a>     
</div>


<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>
