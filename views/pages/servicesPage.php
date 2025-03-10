<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Nos services</h4>
    </div>
    <h3>Informations pour préparer votre visite</h3>
    <h5>Pour faciliter votre venue, le parc zoologique d'Arcadia dispose de plusieurs services inclus dans le prix de votre billet d'entrée.</h5>
    <section id="service" class="service">
        <div class="box-container">
            <?php foreach ($services as $service): ?>
                <div class='box'>
                    <img src='<?= htmlspecialchars($service['service_image_url'], ENT_QUOTES); ?>' alt='<?= htmlspecialchars($service['service_name'], ENT_QUOTES); ?>'>
                    <h4><?= htmlspecialchars($service['service_name']); ?></h4>
                    <p><?=  htmlspecialchars($service['service_description']); ?></p>
                </div>      
            <?php endforeach; ?>    
        </div>
    </section>
    <a href="<?=ROOT?>accueil"><button class="btn">RETOUR A L'ACCUEIL</button></a>     
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>


