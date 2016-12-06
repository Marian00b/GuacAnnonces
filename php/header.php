<?php 
    echo '<header>';
    echo '<h1 > <a href="index.php"><img class="logo" src="./images/logo2.png" id="logo"  height="100"/> </a> AnnonceÉtudiant </h1>';
    echo '<h2>Trouver et postez vos annonces gratuitement !</h2>';
    echo '<nav class ="navbar navbar-default" id="menu" role="navigation">';
    echo '<div class="container-fluid">';
    echo '<div class="navbar-header">';


    echo '<button type = "button" class = "navbar-toggle horizontal"';
    echo 'data-toggle = "collapse" data-target = "#example-navbar-collapse">';
    echo '<ul class="nav">';
    echo '<li > <a href="index.php"><span class="glyphicon glyphicon-home"></span> </a></li>';
    echo '<li > <a href="annonces.php"> Annonces </a></li>';
    echo '<li> <a href="recherche.php"> Rechercher </a></li>';
    echo '<li class = "dropdown" id="inscription_menu">';
    echo '<a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button" aria-expanded="false">';  
    echo '<span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>';
    echo '<ul class = "dropdown-menu">';
    echo '<li><a href="inscription.php"> Inscription </a>';
    echo '</li>';
    echo '</ul>';
    echo '</li>';
    echo '</ul>';
    echo '</button>';
    
    echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
    echo '<ul class="nav navbar-nav navbar-left">';
    echo '<li id="home_menu"> <a href="index.php"><span class="glyphicon glyphicon-home"></span> </a></li>';
    echo '<li id="annonce_menu"> <a href="annonces.php"> Annonces </a></li>';
    echo '<li id="recherche_menu"> <a href="recherche.php"> Rechercher </a></li>';
    echo '<li class = "dropdown" id="inscription_menu">';
    echo '<a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button" aria-expanded="false">';  
    echo '<span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>';
    echo '<ul class = "dropdown-menu">';
    echo '<li><a href="inscription.php"> Inscription </a>';
    echo '</li>';
    echo '</ul>';
    echo '</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';

    echo '<div class="collapse navbar-collapse" id="login">';
    echo '</div>';


    echo '</div>';

    
    echo '</nav>';
    echo '</header>';
?>