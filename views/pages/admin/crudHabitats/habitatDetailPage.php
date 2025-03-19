<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <h3>Détail de l'habitat</h3>
    <section id="habitat" class="habitat">
        <div class="box">
            <?php if (!empty($oneHabitat)): ?>
                <h5><?= html_entity_decode($oneHabitat['habitat_name']); ?></h5>
                <p><?= html_entity_decode($oneHabitat['habitat_description']); ?></p>  
                <img src='<?=ROOT?><?= $oneHabitat['habitat_image_url']; ?>' 
                alt='<?= html_entity_decode($oneHabitat['habitat_name'], ENT_QUOTES); ?>'
                style="width: 15rem; height: 15rem;">     
            <?php else: ?>
                <p>Habitat introuvable</p>
            <?php endif; ?> 
            <p>Les animaux de cet habitat :</p>
            <table>
                <thead>
                    <tr>
                       <th scope="col">Nom de l'animal</th> 
                    </tr>
                </thead>
                <tbody>                     
                    <tr>
                        <th scope="row">
                            <?php foreach ($animals as $animal): ?> 
                            <form action="<?=ROOT?>animaux/animalDetail" method="POST">
                                <input type="hidden" value="<?= $animal['animal_id'] ?>" name="animal_id">
                                <button type="submit"><?= htmlspecialchars($animal['animal_name']) ?></button>                                        
                            </form>
                            <?php endforeach; ?>   
                        </th>                          
                   </tr>  
                </tbody>
            </table>
        </div>
    </section>

    <a href="<?=ROOT?>monCompte/gestionHabitats/tousLesHabitats"><button class="btn">Retour</button></a>
</div>      

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>