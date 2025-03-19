<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Gestion des animaux du zoo</h3>
    <!-- Formulaire pour ajouter un animal -->
    <div class="form-container">
        <h4>Ajouter un animal</h4>
        <form action="<?=ROOT?>monCompte/gestionAnimaux/ajouterAnimal" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <label for="animal_name">Nom de l'animal :</label>
                <input type="text" id="animal_name" name="animal_name" placeholder="Entrer le nom du animal" required />
            </div>
            <div class="inputBox">
                <label for="animal_description">Description de l'animal :</label>
                <input type="text" id="animal_description" name="animal_description" placeholder="Entrer un description du animal" required />
            </div>
            <div class="inputBox">
                <label for="animal_image">Ajouter une image :</label>
                <input type="file" id="animal_image_url" name="image" accept="../public/assets/animaux/*">
            </div>
            <button class="btn" type="submit">ENREGISTRER</button>
        </form>
    </div>
    <hr>
    <!-- Liste des animals existants -->
    <h4>Liste des animaux</h4>
    <section id="animal">
        <div class="box-container">
            <table class="table">
                <thead>
                    <th>Image de l'animal</th>
                    <th>Nom de l'animal</th>
                    <th>Actions</th>
                </thead>
                <tbody> 
                    <?php if(!empty($animals)): ?>
                        <?php foreach($animals as $animal): ?> 
                            <tr>
                                <td>   
                                    <img src='<?=ROOT?><?= $animal['animal_image_url']; ?>' 
                                    alt='<?= htmlspecialchars($animal['animal_name'], ENT_QUOTES); ?>'
                                    style="width: 100px; height: 100px;">
                                </td>
                                <td><?= htmlspecialchars($animal['animal_name']); ?></td>
                                <td>
                                    <form action="<?=ROOT?>monCompte/gestionAnimaux/detailAnimal" method="POST">
                                        <input type="hidden" value="<?= $animal['animal_id'] ?>" name="animal_id">
                                        <button type="submit"><i class="fa-solid fa-eye"></i></button>                                        
                                    </form>
                                    <form action="<?=ROOT?>monCompte/gestionAnimaux/modifierAnimal" method="POST">
                                        <input type="hidden" value="<?= $animal['animal_id'] ?>" name="animal_id">
                                        <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>                                        
                                    </form>
                                    <form action="<?=ROOT?>monCompte/gestionAnimaux/supprimerAnimal" method="POST">
                                        <input type="hidden" value="<?= $animal['animal_id'] ?>" name="animal_id">
                                        <button type="submit" name="submit"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>                                    
                    <?php else: ?>
                        <p>Aucun animal disponible</p>
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