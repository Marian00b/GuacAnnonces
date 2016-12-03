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
        <script src="js/gestion_annonces_dyn.js"></script>
        
    </head>
    <body>
        
        <header >
            <h1 > <a href="index.php"><img class="logo" src="./images/logo2.png" id="logo"  height="100"/> </a> AnnonceÉtudiant </h1> <!-- 2 t à petites --> 
            <h2>Trouver et postez vos annonces gratuitement !</h2>

            <nav class ="navbar navbar-default" id="menu">  
                <div class="container-fluid">
                    <div class="navbar-header">
            
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li> <a href="index.php"><span class="glyphicon glyphicon-home"></span> </a></li>
                            <li  class="active"> <a href="annonces.php"> Annonces </a></li>
                            <li> <a href="recherche.php"> Rechercher </a></li>
                            <li class = "dropdown"> 
                                <a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
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
                                echo '<h3 class="panel-title ">' .$titre. ' <span class = "label label-primary">'.$categorie.'</span></h3>';
                      
                               
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
                        echo '<table class = "table">'; 
                            echo '<tr>';
                                echo '<th>Coordonnées</th>';
                                echo '<th>Vendu par </th>';
                                echo '<th>Ajouté le </th>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td> Latitude : '.$rdv_lat.' </br> Longitude : '.$rdv_lon.'</td>';
                                echo '<td>'.$vendeur.'</td>';
                                echo '<td>'.$date_ajout.'</td>';
                            echo '</tr>';


                         echo '</table>';
//                        echo '<div style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='.$rdv_lat.','.$rdv_lon.'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />';
                    
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
