<?php require 'debut_html.inc.php'; ?>

<?php require 'menu_html.inc.php'; ?>
<?php

?>
<div id="contenu">

<h1>Votre panier</h1>

<p>Voici les jeux sélectionnés :</p>
<?php var_dump($_SESSION); ?>
<p>
    <?php
        $co=connexionBD();
        echo afficherPanier($co);
        deconnexionBD($co);
    
    
      


    ?>
</p>

<?php require 'fin_html.inc.php'; ?>