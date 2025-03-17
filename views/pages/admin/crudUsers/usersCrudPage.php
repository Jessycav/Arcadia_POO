<?php
ob_start(); //Stocke les informations temporairement
?>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>