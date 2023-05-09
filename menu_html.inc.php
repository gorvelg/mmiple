<header>
    <img src="img/logo_mmiple.png" alt="mmiple logo" id="logo" />
    <nav>
        <a href="index.php">Accueil</a> -
        <a href="jeux.php">Jeux</a> -
        <a href="contact.php">Contact</a>
    </nav>
    <div id="connexion">
        <a href="panier.php">
            <span class="uk-badge" id="panier_jeux">
                <?php 
                require('lib.inc.php');
                if (!empty($_SESSION['panier'])){
                    $panier = $_SESSION['panier'];
                    $totalJeux = paniertotaljeux($panier);
                
                    echo $totalJeux;
                }
                
                 ?>
            </span>
            <img src="img/caddie.png" id="panier" />
        </a>
&nbsp;
    <?php
    if(!empty($_SESSION['prenom_client'])){
        echo 'Bonjour '.$_SESSION['prenom_client'];
    } else {
        echo '<a href="connexion.php">Connexion</a>';
    }
    ?> /
    <?php 
    if(!empty($_SESSION['prenom_client'])){
        echo '<a href="deconnexion.php">Déconnexion</a>';
    } else {
        echo '<a href="inscription.php">Inscription</a>';
    }
    ?>

</div>
</header>
