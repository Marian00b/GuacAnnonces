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
        <script src="js/gestion_annonces_dyn.js"></script>
        
    </head>
    <body>
        
        <header >
            <h1 > <a href="index.html"><img class="logo" src="./images/logo2.png" id="logo"/> </a> AnnonceÉtudiant </h1> <!-- 2 t à petites --> 
            <h2>Trouver et postez vos annonces gratuitement !</h2>

            <nav id="menu">  
                <ul id="onglets">
                    <li> <a href="index.html"> Page d'accueil </a></li>
                    <li> <a href="annonces.php"> Annonces </a></li>
                    <li> <a href="recherche.html"> Recherche d'annonces </a></li>
                </ul>
            </nav>
        </header>
        
        <main>  <!-- Main, norme HTML5--> 
            <?php
                include 'php/bdd.php';
                $donnees = get_messages();
                foreach ($donnees["annonces"] as $data) {  //$donnnees = le gros tableau ; $data = chaque case du tableau;
                    $id = $data["id"];
                    $titre = $data["titre"];
                    $description = $data["description"];
                    $vendeur = $data["nom_vendeur"];
                    $prix = $data["prix"];
                    $categorie = $data["categorie"];
                    $photo = $data["photo"];
                    $rdv_lat = $data["rdv_lat"];
                    $rdv_lon = $data["rdv_lon"];
                    $date_ajout = $data["date_ajout"];
                    echo '<div class="panel panel-info">';
                        echo '<div class="panel-heading ">';
                                echo '<h3 class="panel-title">' .$titre. ' <span class = "label label-primary">'.$categorie.'</span></h3>';
                                    
                         echo '</div>';                    
                         echo '<div class="panel-body">';
                            echo '<a href="#" class="pull-right"> <img class="media-object img-thumbnail" width="150" height="150" src="'.$photo.'" >';
                                echo '<div class="caption" id="prix">';
                                    echo '<p>'.$prix.' €'.'</p>';
                                echo '</div>';
                            echo '</a>';
                            echo '<div class="media-body">';
                                echo $description ;
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    
                }
                
            ?>
        </main>
            
        <footer>  
            <p> Tous droits réservés &copy Marianne Borderes et Gonché Danesh </p>
            <p> Dernière mise à jour : <time id="lastModif"></time> </p>
        </footer>
        
    </body> <!-- Footer dans body--> 
    
</html>
