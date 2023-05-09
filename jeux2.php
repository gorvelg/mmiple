<?php require 'debut_html.inc.php'; ?>

<?php require 'menu_html.inc.php'; ?>

        <div id="contenu">
            <h1>Découvez les jeux MMiple</h1>
            <p>
                <?php
                    require 'lib.inc.php';
                    $co=connexionBD(); // se connecter à la base de données  
                    afficherJeux($co); // afficher les jeux
                    deconnexionBD($co); // se déconnecter de la base de données
                ?>
            </p>
        </div>

<?php require 'fin_html.inc.php'; ?>