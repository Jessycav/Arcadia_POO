<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="container">
        <h3>Bienvenue sur votre espace, 
        <?= htmlspecialchars($_SESSION['user_name']) ?>!</h3>
    </div>
    <div class="user">
        <div class="box-container">
            <div class='box'>
                <h4>Gestion des utilisateurs</h4>
                <a href="<?=ROOT?>monCompte/gestionUtilisateurs/tousLesUtilisateurs"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
            </div>
            <div class='box'>
                <h4>Gestion des habitats</h4>
                <a href="<?=ROOT?>monCompte/gestionHabitats/tousLesHabitats"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
            </div>
            <div class='box'>
                <h4>Gestion des animaux</h4>
                <a href="<?=ROOT?>monCompte/gestionAnimaux/tousLesAnimaux"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
            </div>
            <div class='box'>
                <h4>Gestion des services</h4>
                <a href="<?=ROOT?>monCompte/gestionServices/tousLesServices"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
            </div>
            <div class='box'>
                <h4>Gestion des avis</h4>
                <a href="<?=ROOT?>monCompte/gestionavis/tousLesAvis"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
            </div>
        </div>
    </div>
    <button class="btn"><a href="<?=ROOT?>monCompte/logout">Se déconnecter</a></button>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>
