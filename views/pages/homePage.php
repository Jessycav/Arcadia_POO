<?php
ob_start(); //Stocke les informations temporairement
?>

<div class="main">
    <!-- Caroussel d'images pour page d'accueil -->
    <div id="image-carousel" class="carousel">
        <div class="carousel-inner">
            <div class="slide" style="background-image: url('<?=ROOT?>public/assets/animaux/elephant1.jpg');"></div>
            <div class="slide" style="background-image: url('<?=ROOT?>public/assets/animaux/tigre2.png');"></div>
            <div class="slide" style="background-image: url('<?=ROOT?>public/assets/animaux/flamrose2.png');"></div>
        </div>    
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>

    <div class="global-message">
        <h1>Bienvenue à Arcadia</h1>
        <h2>Venez vivre une parenthèse magique en forêt de Brocéliande</h2>
        <p>
            Notre parc zoologique fondé en 1960 vous propose de découvrir de nombreux animaux répartis en 3 habitats. 
            Vous aurez l'occasion de visiter notre savane africaine, notre jungle ainsi que notre petit marais.
        </p>
        <br>
        <p>
            Nous accordons la plus grande importance au bien-être de nos animaux grâce à l'implication quotidienne de nos équipes de soigneurs et vétérinaires. 
            Les contrôles médicaux et environnementaux mis en place nous permettent d'élever nos animaux sainement.
        </p>
        <br>   
        <p>
            Nous avons hâte de vous compter parmi nos visiteurs au zoo Arcadia et découvrez sans plus attendre les détails de notre parc animalier.
        </p>           
    </div>
    <br>
    <hr>
    <br>
    <!-- Sections du zoo -->
    <h3>Les habitats</h3>
    <section class="thumb">
        <div class="box-container">
            <div class="box">
                <img src="<?=ROOT?>public/assets/habitats/savane.jpg" alt="Savane">
                <h4>La savane</h4>   
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/habitats/jungle.jpg" alt="Jungle">
                <h4>La jungle</h4>   
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/habitats/marais.jpg" alt="Marais">
                <h4>Le marais</h4>   
            </div>
        </div>
        <div>
            <a href="<?=ROOT?>habitats/tousleshabitats"><i class="fa fa-caret-square-o-right"></i></a>
        </div>
    </section>
    <br>
    <hr>
    <br>
    <h3>Nos animaux les plus célèbres</h3>
    <section class="animal">
        <div class="box-container">
            <div class="box">
                <img src="<?=ROOT?>public/assets/animaux/girafe1.jpg" alt="Notre girafe Olga">
                <h4>Olga</h4>   
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/animaux/orangoutan1.jpg" alt="Notre orang-outan Louis">
                <h4>Louis</h4>   
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/animaux/crocodile2.jpg" alt="Notre crocodile Dundee">
                <h4>Dundee</h4>
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/animaux/hippo1.jpg" alt="Notre hippopotame Gumba">
                <h4>Gumba</h4>
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/animaux/guepard1.jpg" alt="Notre guépard Speedy">
                <h4>Speedy</h4>
            </div>
            <div class="box">
                <img src="<?=ROOT?>public/assets/animaux/couleuvre.jpg" alt="La couleuvre Naga">
                <h4>Naga</h4>
            </div>
        </div>
        <br>
        <button class="btn" name="send"><a href="<?=ROOT?>animaux/tousnosanimaux">DECOUVREZ TOUS NOS ANIMAUX</a></button>
   </section>
    <br>
    <hr>
    <br>
    <h3>Nos services</h3>
    <section class="services">
        <div class="box-container">
            <div class="box">
                <i class="fa fa-cutlery"></i>
                <h4>Se restaurer</h4>   
            </div>
            <div class="box">
                <i class="fa fa-id-badge"></i>
                <h4>Visite guidée</h4>   
            </div>
            <div class="box">
                <i class="fa fa-train"></i>
                <h4>Balade en petit train</h4>   
            </div>
        </div>
        <br>
        <button class="btn" name="send"><a href="<?=ROOT?>services">VOIR LE DETAIL DES SERVICES</a></button>
    </section>
    <br>
    <hr>
    <br>
    <!-- Avis des visiteurs -->
    <h3>Les avis de nos visiteurs</h3>
    <div id="testimonial-carousel" class="carousel">
        <div class="carousel-inner" id="testimonial-slider-container">
            <!-- Slides ajoutées ici par Javascript -->
        </div>
        <button class="prev" onclick="changeTestimonialSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeTestimonialSlide(1)">&#10095;</button>
        <br>
        <div>        
           <button class="btn"><a href="<?=ROOT?>avis/ecrireAvis">LAISSER VOTRE AVIS</a></button>   
        </div>
    </div>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");