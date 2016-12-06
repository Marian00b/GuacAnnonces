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
        <?php
            include 'php/header.php';
        ?>
        
        <script type="text/javascript"> 
            document.querySelector("#home_menu").setAttribute('class','active');
        </script>
        
        <main>  
            
            <div id="alertbox">
            </div>
            
            <section>
                
                <h3> Bienvenue à toi ! </h3>

                <div class="well well-lg">

                    <p> Tu es étudiant et tu cherches un job, un appartement ? Tu souhaites publier une annonce ? Alors tu es sur le bon site ! </p>
                    <p> Déposez votre annonce en quelques clics ! Il suffit de créer un compte si vous n'êtes pas déjà utilisateur. Ensuite prenez 1 minute de otre temps afin de remplir un petit formulaire. Et hop! Votre annonce sera vue par nos utilisateurs. </p>
                    
                </div>
                
                <h3> Consulte notre toute dernière annonce : </h3>
                    
                <?php
                    include 'php/bdd.php';
                    $donnees = get_latest_message();
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
                        echo '</div>';
                    }

            ?>
                        
            </section>
        </main>
        
        <?php
            include 'php/footer.php';
        ?>

    </body> 
    
</html>
