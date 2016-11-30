<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        
        <meta charset="utf-8"/>
        <title> AnnonceÉtudiant </title>
                
        <!-- Librairies externes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        

        <!-- Librairies personnelles --> 
        <link href="./css/style.css" rel="stylesheet" />
        <script src="js/fonctions_globales.js"></script>
        
    </head>
    <body>
        
        <header >
            <h1 > <a href="index.html"><img class="logo" src="./images/logo2.png" id="logo"  height="100"/> </a> AnnonceÉtudiant </h1> <!-- 2 t à petites --> 
            <h2>Trouver et postez vos annonces gratuitement !</h2>

            <nav class ="navbar navbar-default" id="menu">  
                <div class="container-fluid">
                    <div class="navbar-header">
            
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li  class="active"> <a href="index.php"> Accueil </a></li>
                            <li> <a href="annonces.php"> Annonces </a></li>
                            <li> <a href="recherche.php"> Rechercher </a></li>
                            <li class = "dropdown"> 
                                <a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button" aria-expanded="false"> Dropdown <span class="caret"></span></a>
                            </li>
                        </ul>
                      <div class="collapse navbar-collapse" id="login">
        
                       </div>
                    </div>
                    
                </div>
            </nav>
        </header>
        
        <main>  <!-- Main, norme HTML5--> 
            
            <div id="alertbox">
            </div>
            
            <section> 
                <article>
                    <p> Tu es étudiant et tu cherches un job, un appartement ? Tu souhaites publier une annonce ? Alors tu es sur le bon site ! </p>
                    <p> Déposez votre annonce en quelques clics ! Il suffit de créer un compte si vous n'êtes pas déjà utilisateur. Ensuite prenez 1 minute de otre temps afin de remplir un petit formulaire. Et hop! Votre annonce sera vue par nos utilisateurs. </p>
                    <p>Je ne sais pas quoi dire à part Marianou est une zoli crivette! Je suis un peu fatiguée là mais c'est rigolo de jouer avec le css! hehehe</p>
                </article>
            </section>
        </main>
            
        <footer>  
            <p> Tous droits réservés &copy Marianne Borderes et Gonché Danesh </p>
            <p> Dernière mise à jour : <time id="lastModif"></time> </p>
        </footer>
        
    </body> <!-- Footer dans body--> 
    
</html>
