<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Détail de l'habitat</h3>
    <div class="form-container">
        <h4>Modifier cet habitat</h4>
        <?php if (!empty($habitat)): ?>
            <form action="<?=ROOT?>monCompte/gestionHabitats/updateHabitat" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="habitat_id" value="<?= $habitat['habitat_id']; ?>"> 
                <input type="hidden" name="old_image_url" value="<?= $habitat['habitat_image_url']; ?>">
                <div class="inputBox">
                    <label for="habitat_name">Nom du habitat :</label>
                    <input type="text" id="habitat_name" name="habitat_name" value="<?= htmlspecialchars($habitat['habitat_name']); ?>" required/>
                </div>
                <div class="inputBox">
                    <label for="habitat_description">Description du habitat :</label>
                    <textarea rows="10" id="habitat_description" name="habitat_description"><?= htmlspecialchars($habitat['habitat_description']); ?></textarea>
                </div>
                <div class="inputBox">
                    <label for="habitat_image">Ajouter une image :</label>
                    <br>
                    <?php if (!empty($habitat['habitat_image_url'])): ?>
                        <img src="<?=ROOT?><?= htmlspecialchars($habitat['habitat_image_url']); ?>" style="max-width: 200px;">
                    <?php endif; ?>
                    <br>
                    <input type="file" id="habitat_image_url" name="image">   
                </div>
                <button class="btn" type="submit">Enregistrer les modifications</button>
            </form>
        <?php else: ?>
            <p>habitat introuvable</p>
        <?php endif; ?>  
    </div>
    <a href="<?=ROOT?>monCompte/gestionHabitats/tousLesHabitats"><button class="btn">RETOUR</button></a>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>