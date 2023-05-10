<?php
require('lib.inc.php');
// var_dump($_SESSION);
$idJeu = $_GET['jeu_id'];
$quantite = $_GET['quantite'];
$action = $_GET['action'];


$co = connexionBD();
$infos = recuperer_jeu($co, $idJeu); //fonction qui recupere les infos sur un jeu
// var_dump($infos);

// Enlever 1 à la quantité de ce jeu dans le panier ou supprimer
if ($action == 'supprimer'){
    if (!empty($_SESSION['panier'][$idJeu])){ // si le jeu est déja dans le panier
        if ($quantite > 1){
            $_SESSION['panier'][$idJeu]['quantité']--;
        
        }else {
            unset($_SESSION['panier'][$idJeu]); // supprimer le jeu du panier

        }
    }
            
}


// Ajouter 1 à la quantité de ce jeu dans le panier
elseif ($action == 'ajouter'){

    if (!empty($_SESSION['panier'][$idJeu])){ // si le jeu est déja dans le panier
            $_SESSION['panier'][$idJeu]['quantité']++;
        
    }
}

header('location:panier.php');//Rediriger le client vers la page "panier.php"


?>