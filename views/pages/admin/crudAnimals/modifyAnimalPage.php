<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Détail du animal du zoo</h3>
    <div class="form-container">
        <h4>Modifier ce animal</h4>
        <?php if (!empty($animal)): ?>
            <form action="<?=ROOT?>monCompte/gestionAnimaux/updateAnimal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="animal_id" value="<?= $animal['animal_id']; ?>"> 
                <input type="hidden" name="old_image_url" value="<?= $animal['animal_image_url']; ?>">
                <div class="inputBox">
                    <label for="animal_name">Nom du animal :</label>
                    <input type="text" id="animal_name" name="animal_name" value="<?= htmlspecialchars($animal['animal_name']); ?>" required/>
                </div>
                <div class="inputBox">
                    <label for="animal_description">Description du animal :</label>
                    <textarea rows="10" id="animal_description" name="animal_description"><?= htmlspecialchars($animal['animal_description']); ?></textarea>
                </div>
                <div class="inputBox">
                    <label for="animal_image">Ajouter une image :</label>
                    <br>
                    <?php if (!empty($animal['animal_image_url'])): ?>
                        <img src="<?=ROOT?><?= htmlspecialchars($animal['animal_image_url']); ?>" style="max-width: 200px;">
                    <?php endif; ?>
                    <br>
                    <input type="file" id="animal_image_url" name="image">   
                </div>
                <button class="btn" type="submit">Enregistrer les modifications</button>
            </form>
        <?php else: ?>
            <p>animal introuvable</p>
        <?php endif; ?>  
    </div>
    <a href="<?=ROOT?>monCompte/gestionAnimaux/tousLesAnimaux"><button class="btn">RETOUR</button></a>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>