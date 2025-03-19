<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Se connecter</h4>
    </div>
    <h3>Connexion à l'espace professionnel</h3>
    <!-- Espace de contact -->
    <div class="form-container">
        <form action="<?=ROOT?>monCompte/login" method="POST">
            <div class="inputBox">
                <label for="user_name">Nom d'utilisateur :</label>
                <input type="text" id="username" name="user_name" placeholder="Entrer votre nom d'utilisateur" required />
            </div>
            <div class="inputBox">
                <label for="user_password">Mot de passe :</label>
                <input type="password" id="password" name="user_password" placeholder="Entrer votre mot de passe" required />
            </div>
            <p>En cas d'oubli de vos identifiants, veuillez contacter l'administrateur.</p>
            <a href="<?=ROOT?>monCompte/dashboard"><button class="btn" type="submit">SE CONNECTER</button></a>
        </form>
    </div> 
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>