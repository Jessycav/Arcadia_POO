<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Détail du service du zoo</h3>
    <div class="form-container">
        <h4>Modifier ce service</h4>
        <?php if (!empty($service)): ?>
            <form action="<?=ROOT?>monCompte/gestionServices/updateService" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="service_id" value="<?= $service['service_id']; ?>"> 
                <input type="hidden" name="old_image_url" value="<?= $service['service_image_url']; ?>">
                <div class="inputBox">
                    <label for="service_name">Nom du service :</label>
                    <input type="text" id="service_name" name="service_name" value="<?= htmlspecialchars($service['service_name']); ?>" required/>
                </div>
                <div class="inputBox">
                    <label for="service_description">Description du service :</label>
                    <textarea rows="10" id="service_description" name="service_description"><?= htmlspecialchars($service['service_description']); ?></textarea>
                </div>
                <div class="inputBox">
                    <label for="service_image">Ajouter une image :</label>
                    <br>
                    <?php if (!empty($service['service_image_url'])): ?>
                        <img src="<?=ROOT?><?= htmlspecialchars($service['service_image_url']); ?>" style="max-width: 200px;">
                    <?php endif; ?>
                    <br>
                    <input type="file" id="service_image_url" name="image">   
                </div>
                <button class="btn" type="submit">Enregistrer les modifications</button>
            </form>
        <?php else: ?>
            <p>Service introuvable</p>
        <?php endif; ?>  
    </div>
    <a href="<?=ROOT?>monCompte/gestionServices/tousLesServices"><button class="btn">RETOUR</button></a>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>