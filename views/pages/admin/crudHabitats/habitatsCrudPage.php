<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Gestion des habitats du zoo</h3>
    <!-- Formulaire pour ajouter un habitat -->
    <div class="form-container">
        <h4>Ajouter un habitat</h4>
        <form action="<?=ROOT?>monCompte/gestionHabitats/ajouterHabitat" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <label for="habitat_name">Nom de l'habitat :</label>
                <input type="text" id="habitat_name" name="habitat_name" placeholder="Entrer le nom de l'habitat" required/>
            </div>
            <div class="inputBox">
                <label for="habitat_description">Description de l'habitat :</label>
                <input type="text" id="habitat_description" name="habitat_description" placeholder="Entrer une description de l'habitat" required/>
            </div>
            <div class="inputBox">
                <label for="habitat_image">Ajouter une image :</label>
                <input type="file" id="habitat_image_url" name="image" accept="../public/assets/habitats/*">
            </div>
            <button class="btn" type="submit">ENREGISTRER</button>
        </form>
    </div>
    <hr>
    <!-- Liste des habitats existants -->
    <h4>Liste des habitats actuels</h4>
    <section id="habitat">
        <div class="box-container">
            <table class="table">
                <thead>
                    <th>Image de l'habitat</th>
                    <th>Nom de l'habitat</th>
                    <th>Actions</th>
                </thead>
                <tbody> 
                    <?php if(!empty($habitats)): ?>
                        <?php foreach($habitats as $habitat): ?> 
                            <tr>
                                <td>   
                                    <img src='<?=ROOT?><?= $habitat['habitat_image_url']; ?>' 
                                    alt='<?= htmlspecialchars($habitat['habitat_name'], ENT_QUOTES); ?>'
                                    style="width: 100px; height: 100px;">
                                </td>
                                <td><?= htmlspecialchars($habitat['habitat_name']); ?></td>
                                <td>
                                    <form action="<?=ROOT?>monCompte/gestionHabitats/detailHabitat" method="POST">
                                        <input type="hidden" value="<?= $habitat['habitat_id'] ?>" name="habitat_id">
                                        <button type="submit"><i class="fa-solid fa-eye"></i></button>                                        
                                    </form>
                                    <form action="<?=ROOT?>monCompte/gestionHabitats/modifierHabitat" method="POST">
                                        <input type="hidden" value="<?= $habitat['habitat_id'] ?>" name="habitat_id">
                                        <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>                                        
                                    </form>
                                    <form action="<?=ROOT?>monCompte/gestionHabitats/supprimerHabitat" method="POST">
                                        <input type="hidden" value="<?= $habitat['habitat_id'] ?>" name="habitat_id">
                                        <button type="submit" name="submit"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>                                    
                    <?php else: ?>
                        <p>Aucun habitat disponible</p>
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