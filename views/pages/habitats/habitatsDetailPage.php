<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Habitats et animaux</h4>
    </div>
    <section id="detail_page">
        <h3>L'habitat en détail</h3>
        <div class="box-container">
            <div class="box">
                <?php if ($oneHabitat): ?>
                <h5 class="title"><?= htmlspecialchars($oneHabitat['habitat_name']); ?></h5>
                <div class="image">
                    <img src="<?=ROOT?><?= htmlspecialchars($oneHabitat['habitat_image_url'], ENT_QUOTES); ?>" 
                    alt="Image de<?= htmlspecialchars($oneHabitat['habitat_name'], ENT_QUOTES); ?>">
                </div>
                <br>
                <div class="description">
                    <p><?= htmlspecialchars($oneHabitat['habitat_description'], ENT_QUOTES, 'UTF-8'); ?></p>
                    
                    <p>Dans cet habitat, vous trouverez :</p>
                    <ul>
                        <?php foreach ($animals as $animal): ?>
                            <li>
                                <form action="<?=ROOT?>animaux/animalDetail" method="POST">
                                    <input type="hidden" value="<?= $animal['animal_id'] ?>" name="animal_id">
                                    <button type="submit"><?= htmlspecialchars($animal['animal_name']) ?></button>                                        
                                </form>                            
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php else: ?>
                    <p>L'habitat demandé est introuvable</p>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?=ROOT?>habitats/tousleshabitats"><button class="btn">Retour à la liste des habitats</button></a>
    </section>
</div>


<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");  