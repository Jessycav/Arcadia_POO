<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <div class="banner">
        <h4>Nos animaux</h4>
    </div>
    <h3>Venez à la rencontre de nos animaux</h3>
    <h5>Dans cette rubrique, vous pouvez découvrir la liste de tous les animaux merveilleux vivant à Arcadia.</h5>

    <!-- Filtrer les animaux par habitats -->
    <div class="filter">
        <form action="" method="GET"> 
            <label for="user_name">Filtrer par habitat :</label>
            <select name="habitat_id" id="habitat_id">
                <option value="">-- Tous --</option>
                <option value="1" <?php if($habitat_filter == '1') echo 'selected'; ?>>Savane</option>
                <option value="2" <?php if($habitat_filter == '2') echo 'selected'; ?>>Jungle</option>
                <option value="3" <?php if($habitat_filter == '3') echo 'selected'; ?>>Marais</option>
            </select>
            <button class="btn" type="submit">Filtrer</button>
        </form>
    </div>

    <section class="animal">
        <div class="box-container">
            <!-- vérifier si des animaux ont été trouvés -->
            <?php if (!empty($allAnimals)): ?>
            <!-- Affichage de chaque animal avec échappement des caractères spéciaux et éviter failles CSS -->
                <?php foreach ($allAnimals as $allAnimal): ?>
                    <div class='box'>
                        <img src='<?=ROOT?><?= htmlspecialchars($allAnimal['animal_image_url'], ENT_QUOTES) ?>' 
                        alt='<?= htmlspecialchars($allAnimal['animal_name'], ENT_QUOTES) ?>'>
                        <h4><?= htmlspecialchars($allAnimal['animal_name'], ENT_QUOTES) ?></h4>
                        <form action="<?=ROOT?>animaux/animalDetail" method="POST">
                            <input type="hidden" value="<?= $allAnimal['animal_id'] ?>" name="animal_id">
                            <button type="submit"><i class="fa-solid fa-circle-plus fa-2x"></i></button>                                        
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun animal trouvé pour cet habitat<p>
            <?php endif; ?>
        </div>
    </section>  
    <a href="<?=ROOT?>accueil"><button class="btn">RETOUR A L'ACCUEIL</button></a>     
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>
