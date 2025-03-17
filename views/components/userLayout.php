<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Informations -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue à Arcadia</title>
    <meta name="description" content="Le zoo d'Arcadia possède un panel d'animaux, dans un cadre écologique et enchanteur.">
    <!-- Import Font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <!-- Liens styles CSS -->
    <link href="<?= ROOT ?>public/css/global.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/header.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/carousel.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/footer.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/animals.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/habitat.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/services.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/testimonial.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/form.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/detail.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="<?= ROOT ?>public/css/horaires.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Lien JavaScript -->
    <script src="<?= ROOT ?>public/js/navbar_script.js" defer></script>
    <script src="<?= ROOT ?>public/js/schedule_script.js" defer></script>
    <script src="<?= ROOT ?>public/js/testimonial_script.js" defer></script>
    <script src="<?= ROOT ?>public/js/carousel_script.js" defer></script>
    <script src="<?= ROOT ?>public/js/stats.js" defer></script>
    <script src="<?= ROOT ?>public/js/getStats.js" defer></script>
    <script src="<?= ROOT ?>public/js/server.js" defer></script>
</head>

<body>
    <?php require_once("./views/components/userHeader.php") ?>

    <main>
        <?= $content ?>
    </main>

    <script src="https://kit.fontawesome.com/4c6fdf51a1.js" crossorigin="anonymous"></script>
</body>
</html>