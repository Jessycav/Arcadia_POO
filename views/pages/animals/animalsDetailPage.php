<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Nos animaux</h4>
    </div>

    <section id="detail_page">
        <h3>Les animaux en détail</h3>
        <div class="box-container">
            <div class="box">
                <?php if (isset($animal)): ?>
                    <h5 class="title"><?= htmlspecialchars($animal['animal_name'], ENT_QUOTES); ?></h5>
                    <div class="image">
                        <img src="<?=ROOT?><?= htmlspecialchars($animal['animal_image_url'], ENT_QUOTES); ?>" alt="Image de <? htmlspecialchars($animal['animal_name'], ENT_QUOTES); ?>">
                    </div>
                    <br>
                    <div class="description">
                        <p>Habitat : <?= htmlspecialchars($animal['habitat_name'], ENT_QUOTES); ?></p>
                        <p>Race : <?= htmlspecialchars($animal['breed_name'], ENT_QUOTES); ?></p>
                        <h4>Informations du vétérinaire</h4>
                        <p>État de santé : <?= htmlspecialchars($animal['health'], ENT_QUOTES); ?></p>
                        <?php
                            // Conditions pour vérifier la présence d'un rapport du vétérinaire
                            if (!empty($animal['food']) && !empty($animal['food_weight'])) {
                                echo '<p>Nourriture : ' . htmlspecialchars($animal['food'], ENT_QUOTES) . '</p>';
                                echo '<p>Grammage : ' . htmlspecialchars($animal['food_weight'], ENT_QUOTES) . '</p>';
                            } else {
                                echo '<p>Aucun rapport vétérinaire n\'est disponible pour cet animal. </p>';
                            }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <form action="<?=ROOT?>habitats/habitatsDetail" method="POST">
            <input type="hidden" value="<?= $animal['habitat_id'] ?>" name="habitat_id">
            <button class="btn" type="submit">Retour à l'habitat</button>                                        
        </form>    
    </section>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>