<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Détail du service du zoo</h3>
    <section id="service" class="service">
        <div class="box">
            <?php if (!empty($service)): ?>
                <h5><?= html_entity_decode($service['service_name']); ?></h5>
                <p><?= html_entity_decode($service['service_description']); ?></p>  
                <img src='<?=ROOT?><?= $service['service_image_url']; ?>' 
                alt='<?= html_entity_decode($service['service_name'], ENT_QUOTES); ?>'
                style="width: 20rem; height: 20rem;">     
            <?php else: ?>
                <p>Service introuvable</p>
            <?php endif; ?>   
        </div>
    </section>

    <a href="<?=ROOT?>monCompte/gestionServices/tousLesServices"><button class="btn">Retour</button></a>
</div>      

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>