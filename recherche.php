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

        <script type="text/javascript" src="js/ajout.js"></script>
        
    </head>
    <body>
        
        <header >
            <h1 > <a href="index.php"><img class="logo" src="./images/logo2.png" id="logo"  height="100"/> </a> AnnonceÉtudiant </h1> <!-- 2 t à petites --> 
            <h2>Trouver et postez vos annonces gratuitement !</h2>

            
            <nav class ="navbar navbar-default" id="menu">  
                <div class="container-fluid">
                    <div class="navbar-header ">
            
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left " >
                            <li> <a href="index.php"><span class="glyphicon glyphicon-home"></span> </a></li>
                            <li> <a href="annonces.php"> Annonces </a></li>
                            <li class="active"> <a href="recherche.php"> Rechercher </a></li>
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
        <section class="cf">
            <div id="alertbox">
            </div>
            
        <main>  <!-- Main, norme HTML5 -->
            
            
            <?php 
           // var_dump($_SESSION); 
            //session_destroy();
            ?>
            
                  <div class="panel-group">
              <div class="panel panel-default">

                  <div class="panel-heading recherche"><h4> <span class="glyphicon glyphicon-th-list"> </span> Lister les annonces selon vos critères </h4></div>
      <div class="panel-body">
        
      
            <form id="filter-form" class="form form-horizontal">
                
                
                <div class="form-group">
                <div class="col-xs-4">
                  <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-filter"></span></span>
                      <input class="form-control left-border-none" type="text" id ="filter" name="filter" placeholder="Vos filtres">
                  </div>
                </div>
        
<!--
                <div class="col-xs-2">
                <span> Catégorie</span>
                    </div>
-->

                <div class="col-xs-2">
                  <div class="input-group">
                       <select class="form-control" name="column" value="Catégorie" id="column"> 
                           <optgroup label="Catégorie">

                        <option value="id"> Identifiant </option>
                        <option value="titre"> Titre </option>
                        <option value="description"> Description </option>
                        <option value="categorie"> Catégorie </option>
                        <option value="nom_vendeur"> Vendeur </option>
                        <option value="prix"> Prix </option>
                        <option value="photo"> Photo </option>
                        <option value="rdv_lat"> Latitude </option>
                        <option value="rdv_lon"> Longitude </option>
                        <option value="date_ajout"> Date </option>
                        <option value="all" selected > Tout </option>
                           </optgroup>
                    </select>

                  </div>
<!--                </div>-->  
<!--                                                        <button  type="submit" class="btn btn-primary">Afficher les données</button>-->
                    
              </div>
                    
                    <div class="col-xs-4">
                
                                                        <button  type="submit" class="btn btn-primary">Afficher les données</button>
                    </div>
                 
                        
                </div> 
             
            </form>
                
                <p>
                <span class="glyphicon glyphicon-info-sign"></span> Séparez vos mot-clé(s) avec un espace pour définir un "ou" et avec un point-virgule pour un "et". </p>
                
                </div> 
            
    
            </br>
            
            <div id="annonces">
            </div>
                      
            </div></div>
            
        </main>
        <aside>
        
    
            <div class="panel-group">
              <div class="panel panel-default">
                    <div class="panel-heading ajout"><h4>  <span class="glyphicon glyphicon-edit"></span> Ajouter une annonce </h4></div>
                  <div class="panel-body">

            <form id="ajout-form">
               <!-- <fielset> 
                    <legend> Info</legend>-->
                <div class="form-group">
<!--                    <label>Type d'annonce :</label>-->
                        <select class ="form-control input-sm" name="categorie">
                            <optgroup label="Catégorie" selected>
                            <option value="immobilier">Immobilier</option>
                            <option value="electronique">Électonique</option>
                            <option value="vetement">Vêtement</option>
                            <option value="bijoux">Bijoux</option>
                            <option value="dvd_cd">DVD/CD</option>
                                </optgroup>
                        </select>
                </div>
                
                
                <div class="form-group">
                     <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-tag"></span></span>
                    <input class="form-control input-sm" type="text" name="titre" placeholder="Titre de l'annonce" required/>
                  </div>
<!--                    <label>Titre :</label>-->
                </div>
                
                <div class="form-group">
<!--                    <label>Descriptif :</label> </br>-->
                      <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea class="form-control input-sm" name="description" placeholder="Descriptif de l'annonce" rows = "5" maxlength="250" style="resize:none"></textarea> </div> 
                </div>

                <div class="form-group">  <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-euro"></span></span>
<!--                    <label>Prix :</label>-->
                    <input class="form-control input-sm" type="number" name="prix" placeholder="10 €" required/></div>
                </div>
                    
                <div class="form-group">    
<!--                    <label>Nom :</label>-->  <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-user"></span></span>
                    <input class="form-control input-sm" type="text" name="nom_vendeur" placeholder="Votre nom" required /></div>
                </div>
                    
                <div class="form-group">    
<!--                    <label>Photo :</label>-->   <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-picture"></span></span>
                    <input class="form-control input-sm" type="text" name="photo" placeholder="Lien URL vers la photo" /></div>
                </div>
                    
                <div class="form-group ">    
<!--                    <label>Rdv lattitude :</label>-->  <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-map-marker"></span></span>
                    <input class="form-control input-sm" type="number" name="rdv_lat" placeholder="Latitude" /></div>
                </div>
                <div class="form-group">
<!--                    <label>Rdv longitude :</label>-->  <div class="input-group">
                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-map-marker"></span></span>
                    <input class="form-control input-sm"  type="number" name="rdv_lon" placeholder="Longitude" /></div>
                </div>
                
<!--                 <div class="col-xs-4">-->
                <center>
                <button  type="submit" class="btn btn-primary">Envoyer <span class="glyphicon glyphicon-send"></span></button>
                <button  type="reset" class="btn btn-primary"> Effacer <span class="glyphicon glyphicon-erase"></span></button>
                    </center>
<!--                </div>-->
                
                <!--</fieldset>-->
                
            </form>
                </div>
    
    </div>
        </aside>
        </section>
        <footer>  
            <p> Tous droits réservés &copy Marianne Borderes et Gonché Danesh </p>
            <p> Dernière mise à jour : <time id="lastModif"></time> </p>
        </footer>

<!--  <script src="js/toggle.js"></script>-->
        
    </body>  <!--Footer dans body -->
    
</html>
