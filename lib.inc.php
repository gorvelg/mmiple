<?php
session_start();
require 'secretxyz123.php';

function connexionBD(){
    $mabd=null;

    try {
        $mabd = new PDO('mysql:host=localhost;dbname=mmiple;charset=UTF8',LUTILISATEUR,LEMOTDEPASSE);
        $mabd->query('SET NAMES utf8;');

    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    return $mabd;

}

function deconnexionBD(&$mabd) {
    $mabd =null;
}

function afficherJeux($mabd) {

    $requete = "SELECT * FROM mmiple_jeux;"; // créer la requête 
    $jeux = $mabd->query($requete);

$lignes_resultat = $jeux->rowCount();

    if ($lignes_resultat>0) { // y a-t-il des résultats ?
// oui : pour chaque résultat : afficher 
        foreach($jeux as $unjeu) {
            echo '<article class="jeu">';
            echo '<h3>'.$unjeu['jeu_nom'].'</h3>';
            echo '<p>Editeur : </strong>'.$unjeu['jeu_editeur'].        '</p>';
            echo '<p>Nombre de joueurs mini '.$unjeu        ['jeu_nb_joueurs_mini'].' / maxi '.$unjeu       ['jeu_nb_joueurs_maxi'].'</p>';
            echo '<p>Durée d\'une partie : '.$unjeu     ['jeu_duree_partie'].'mn</p>';
            echo '<img src="'.$unjeu['jeu_photo1'].'" alt="photo        jeu">';
            echo '<div><a href="ajout_panier.php?jeu_id='.$unjeu['jeu_code'].'">Ajouter au panier</a></div>'."\n";
            echo '</article>';
        }
    } else {
        echo '<p>Pas de résultat !</p>';
    }
}

function recuperer_jeu($co, $id) {

    $req="SELECT * FROM mmiple_jeux WHERE jeu_code=".$id; // créer la requête  //echo '<p>'.$req.'</p>'."\n"; 
    
    try {
    $resultat=$co->query($req); // exécuter la requête 
    } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage().'<br />'; die();
        }
    
    // compter le nombre de résultats 
        
    $lignes_resultat=$resultat->rowCount();
        
    if ($lignes_resultat>0) { // y a-t-il des résultats ?       
        // oui : pour chaque résultat : afficher 
        return $resultat->fetch(PDO::FETCH_ASSOC);
    } else {
        // non, on renvoie la valeur "null" 
        return null;
    }
}

function paniertotaljeux($panier) {
    $total = 0;
    if(!empty($panier)) {
        foreach($panier as $jeu) {
            $total += $jeu['quantité'];
        }
    }
    return $total;
} 


function afficherPanier($co) {

    if (empty($_SESSION['panier'])) { // la panier est vide ? 
    
    $tablePanier='<p class="erreur">Désolé, votre panier est vide !</p>'; } else { // sinon le panier contient quelque chose    
    $tablePanier='<table id="tablePanier">'."\n";   
    $tablePanier.='<thead><th>Jeu</th><th>Prix</th>   
    <th>Quantité</th><th>Total</th></thead>'."\n"; 
    $tablePanier.='</table>'."\n";  
    }
    
    return $tablePanier;
    
    }