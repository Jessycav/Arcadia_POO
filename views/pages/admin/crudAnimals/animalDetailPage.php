<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Détail de l'animal</h3>
    <section id="animal" class="animal">
        <div class="box">
            <?php if (!empty($oneAnimal)): ?>
                <h5><?= html_entity_decode($oneAnimal['animal_name']); ?></h5>
                <img src='<?=ROOT?><?= $oneAnimal['animal_image_url']; ?>' 
                alt='<?= html_entity_decode($oneAnimal['animal_name'], ENT_QUOTES); ?>'
                style="width: 15rem; height: 15rem;">
                <div class="description">
                    <p>Habitat : <?= htmlspecialchars($oneAnimal['habitat_name'], ENT_QUOTES); ?></p>
                    <p>Race : <?= htmlspecialchars($oneAnimal['breed_name'], ENT_QUOTES); ?></p>
                    <h4>Informations du vétérinaire</h4>
                    <p>État de santé : <?= htmlspecialchars($oneAnimal['health'], ENT_QUOTES); ?></p>
                    <?php
                        // Conditions pour vérifier la présence d'un rapport du vétérinaire
                        if (!empty($oneAnimal['food']) && !empty($oneAnimal['food_weight'])) {
                            echo '<p>Nourriture : ' . htmlspecialchars($oneAnimal['food'], ENT_QUOTES) . '</p>';
                            echo '<p>Grammage : ' . htmlspecialchars($oneAnimal['food_weight'], ENT_QUOTES) . '</p>';
                        } else {
                            echo '<p>Aucun rapport vétérinaire n\'est disponible pour cet animal. </p>';
                        }
                    ?>
                </div>     
            <?php else: ?>
                <p>Animal introuvable</p>
            <?php endif; ?>   
        </div>
    </section>

    <a href="<?=ROOT?>monCompte/gestionAnimaux/tousLesAnimaux"><button class="btn">Retour</button></a>
</div>      

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>