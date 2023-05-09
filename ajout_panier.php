<?php
require('lib.inc.php');
// SI le client est connecté ALORS

// fonction qui récupère les informations sur un jeu SI le jeu est déjà dans le panier ALORS

// ajouter 1 à la quantité de ce jeu dans le panier
if (!empty($_SESSION['prenom_client'])){
    $idJeu = $_GET['jeu_id'];

    $co = connexionBD();
    $infos = recuperer_jeu($co, $idJeu); //fonction qui recupere les infos sur un jeu
    var_dump($infos);

    if (!empty($_SESSION['panier'][$idJeu])){ // si le jeu est déja dans le panier
        $_SESSION['panier'][$idJeu]['quantité']++;
        
    } else {
        $_SESSION['panier'][$idJeu]=['nom'=> $infos['jeu_nom'], 'prix' => $infos['jeu_prix_unit'], 'quantité' => 1];
    }
    header('location:jeux.php');//Rediriger le client vers la page "jeux.php"
} else {
        header('location: connexion.php');
    }

// SINON
//AJOUTER le jeu (nom, prix, quantite=1) à la variable de session 'panier' FINSI


//Rediriger le client vers la page "connexion.php" avec la fonction header : header('LocatiFINSI

// fonction qui récupère les informations sur un jeu 

// et les retourne ou bien retourne null si le jeu n'existe pas 


?>