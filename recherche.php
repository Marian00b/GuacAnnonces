<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        
        <meta charset="utf-8"/>
        <title> AnnonceÉtudiant </title>
        
        <link rel="icon" href="images/and.png"/>

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
        
         <?php
            include 'php/header.php';
        ?>
        
        <script type="text/javascript"> 
            document.querySelector("#recherche_menu").setAttribute('class','active');
        </script>

        <section class="cf">
            <div id="alertbox">
            </div>
            
            <main>  
                
                <div class="panel-group">
                    <div class="panel panel-default">

                        <div class="panel-heading recherche"><h4> <span class="glyphicon glyphicon-th-list"> </span> Lister les annonces selon vos critères </h4>
                        </div>
                        <div class="panel-body">
    
                            <form id="filter-form" class="form form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-3">
                                      <div class="input-group">
                                          <span class="input-group-addon transparent"><span class="glyphicon glyphicon-filter"></span></span>
                                          <input class="form-control left-border-none" type="text" id ="filter" name="filter" placeholder="Vos filtres">
                                      </div>
                                    </div>


                                    <div class="col-xs-3">
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
                                    </div> 

                                    <div class="col-xs-2">
                                        <button  type="submit" class="btn btn-primary btn-responsive">Afficher les données</button>
                                    </div>


                                </div> 
                                     

                            </form>

                   
                             <p><span class="glyphicon glyphicon-info-sign"></span> Séparez vos mot-clé(s) avec un espace pour définir un "ou" et avec un point-virgule pour un "et". </p>

                
                            </br>

                            <div id="annonces">
                            </div>

                        </div>
                    </div>
                </div>

            </main>
            
            
            <aside>


                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading ajout"><h4>  <span class="glyphicon glyphicon-edit"></span> Ajouter une annonce </h4></div>
                        <div class="panel-body">

                            <form id="ajout-form">

                                <div class="form-group">
<!--                                     <div class="col-xs-2">-->
                                     <div class="input-group">

                                        <select class ="form-control input-sm" name="categorie">
                                            <optgroup label="Catégorie">
                                                <option value="immobilier" selected>Immobilier</option>
                                                <option value="electronique">Électonique</option>
                                                <option value="vetement">Vêtement</option>
                                                <option value="bijoux">Bijoux</option>
                                                <option value="dvd_cd">DVD/CD</option>
                                            </optgroup>
                                        </select>
                                </div>
                                    </br>

<!--                                <div class="form-group">-->
                                     <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-tag"></span></span>
                                        <input class="form-control input-sm" type="text" name="titre" placeholder="Titre de l'annonce" required/>
                                    </div>
<!--                                </div>-->
</br>
<!--                                <div class="form-group">-->

                                    <div class="input-group">
                                      <span class="input-group-addon transparent"><span class="glyphicon glyphicon-pencil"></span></span>
                                      <textarea class="form-control input-sm" name="description" placeholder="Descriptif de l'annonce" rows = "5" maxlength="250" style="resize:none"></textarea> 
                                    </div> 
<!--                                </div>-->
</br>
<!--                                <div class="form-group"> -->
                                    <div class="input-group">
                                    <span class="input-group-addon transparent"><span class="glyphicon glyphicon-euro"></span></span>
                                    <input class="form-control input-sm" type="number" step="any" name="prix" placeholder="10 €" required/></div>
<!--                                </div>-->
</br>
<!--                                <div class="form-group">    -->
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-user"></span></span>
                                        <input class="form-control input-sm" type="text" name="nom_vendeur" placeholder="Votre nom" required />
                                    </div>
<!--                                </div>-->
</br>
<!--                                <div class="form-group">    -->
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-picture"></span></span>
                                        <input class="form-control input-sm" type="text" name="photo" placeholder="Lien URL vers la photo" />
                                    </div>
<!--                                </div>-->
</br>
<!--                                <div class="form-group ">    -->
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-map-marker"></span></span>
                                        <input class="form-control input-sm" type="number" step="any" name="rdv_lat" placeholder="Latitude" />
                                    </div>
<!--                                </div>-->
</br>
<!--                                <div class="form-group">-->
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-map-marker"></span></span>
                                        <input class="form-control input-sm"  type="number" step="any" name="rdv_lon" placeholder="Longitude" />
                                    </div>
<!--                                </div>-->

</br>
<!--  </div>  -->
                                <center>
<!--                                                                     <div class="col-sm-1 col-md-1 col-md-offset-1">-->

                                    <div class=" btn-responsive">
                                    <button  type="submit" class="btn btn-primary btn-responsive">Envoyer <span class="glyphicon glyphicon-send"></span></button>
                                    <button  type="reset" class="btn btn-primary btn-responsive"> Effacer <span class="glyphicon glyphicon-erase"></span></button>
                                        </div>
<!--                                    </div>-->
                                </center>
<!--                                    </div>-->
<!--                                </div>  
-->
 </div>

                            </form>

                       

                    </div>
                </div>
            </aside>

        </section>

        <?php
            include 'php/footer.php';
        ?>


    </body>  
    
</html>
