<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Gestion des services du zoo</h3>
    <!-- Formulaire pour ajouter un service -->
    <div class="form-container">
        <h4>Ajouter un service</h4>
        <form action="<?=ROOT?>monCompte/gestionServices/ajouterService" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <label for="service_name">Nom du service :</label>
                <input type="text" id="service_name" name="service_name" placeholder="Entrer le nom du service" required />
            </div>
            <div class="inputBox">
                <label for="service_description">Description du service :</label>
                <input type="text" id="service_description" name="service_description" placeholder="Entrer un description du service" required />
            </div>
            <div class="inputBox">
                <label for="service_image">Ajouter une image :</label>
                <input type="file" id="service_image_url" name="image" accept="../public/assets/services/*">
            </div>
            <button class="btn" type="submit">ENREGISTRER</button>
        </form>
    </div>
    <hr>
    <!-- Liste des services existants -->
    <h4>Liste des services actuels</h4>
    <section id="service">
        <div class="box-container">
            <table class="table">
                <thead>
                    <th>Image du service</th>
                    <th>Nom du service</th>
                    <th>Actions</th>
                </thead>
                <tbody> 
                    <?php if(!empty($services)): ?>
                        <?php foreach($services as $service): ?> 
                            <tr>
                                <td>   
                                    <img src='<?=ROOT?><?= $service['service_image_url']; ?>' 
                                    alt='<?= htmlspecialchars($service['service_name'], ENT_QUOTES); ?>'
                                    style="width: 100px; height: 100px;">
                                </td>
                                <td><?= htmlspecialchars($service['service_name']); ?></td>
                                <td>
                                    <form action="<?=ROOT?>monCompte/gestionServices/detailService" method="POST">
                                        <input type="hidden" value="<?= $service['service_id'] ?>" name="service_id">
                                        <button type="submit"><i class="fa-solid fa-eye"></i></button>                                        
                                    </form>
                                    <form action="<?=ROOT?>monCompte/gestionServices/modifierService" method="POST">
                                        <input type="hidden" value="<?= $service['service_id'] ?>" name="service_id">
                                        <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>                                        
                                    </form>
                                    <form action="<?=ROOT?>monCompte/gestionServices/supprimerService" method="POST">
                                        <input type="hidden" value="<?= $service['service_id'] ?>" name="service_id">
                                        <button type="submit" name="submit"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>                                    
                    <?php else: ?>
                        <p>Aucun service disponible</p>
                    <?php endif; ?>
                </tbody>
            </table>   
        </div>
    </section>
    <a href="<?=ROOT?>monCompte/dashboard"><button class="btn">Retour</button></a>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>