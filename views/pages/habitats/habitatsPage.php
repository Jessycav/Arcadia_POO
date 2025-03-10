<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Habitats et animaux</h4>
    </div>
    <h3>Découvrez les différents habitats de notre zoo Arcadia</h3>
    <section id="habitats" class="thumb">
        <div class="box-container">
            <?php foreach ($habitats as $habitat): ?>
                <div class='box'>
                    <h4><?= htmlspecialchars($habitat['habitat_name']); ?></h4>
                    <img src="<?=ROOT?><?= htmlspecialchars($habitat['habitat_image_url'], ENT_QUOTES); ?>"
                    alt="<?= htmlspecialchars($habitat['habitat_name']); ?>">
                    <form action="<?=ROOT?>habitats/habitatsDetail" method="POST">
                        <input type="hidden" value="<?= $habitat['habitat_id'] ?>" name="habitat_id">
                        <button class="btn" type="submit">Voir le détail</button>                                        
                    </form>
                </div>
            <?php endforeach; ?>  
        </div>
    </section>
    <button class="btn" name="send"><a href="<?=ROOT?>accueil">RETOUR A L'ACCUEIL</a></button>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>