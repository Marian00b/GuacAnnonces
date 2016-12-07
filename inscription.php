<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        
        <meta charset="utf-8"/>
        <title> AnnonceÉtudiant </title>
                
         <link rel="icon" href="images/and.png" />

        
        <!-- Librairies externes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        

        <!-- Librairies personnelles --> 
        <link href="./css/style.css" rel="stylesheet" />
        <script src="js/fonctions_globales.js"></script>
        <script src="js/inscription.js"></script>
        
        
    </head>
    
    <body>
        <?php
            include 'php/header.php';
        ?>
        
        <script type="text/javascript"> 
            document.querySelector("#inscription_menu").setAttribute('class','active');
        </script>
        
        <main>  
            
            <div id="alertbox">
            </div>
            <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><h4>  <span class="glyphicon glyphicon-edit"></span> S'inscrire </h4></div>
                        <div class="panel-body">
<!--                            <div id="center-form" c>-->
                                
                            
                            <form id="inscrit-form">

                                <div class="form-group">      
                                    <div class="col-sm-11 col-md-6 col-md-offset-3">

                                     
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-user"></span></span>
                                        <input class="form-control input-sm" type="text" name="nom" placeholder="Votre nom" required />
                                    </div>
                                        
<!--                                    </div>-->
                               </br>
                                    
<!--                                    <div class="col-xs-4">-->
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input class="form-control input-sm" type="email" name="email" placeholder="Votre email" required />
                                    </div>
                                
<!--                                    </div>-->
                                </br>
<!--                                    <div class="col-xs-4">-->
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon transparent"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input class="form-control input-sm" type="password" name="password" placeholder="Votre mot de passe" required />
                                    </div>
                                    
                                    
                                
                                
                                </br>
                                
                                <center>
                                    <button  type="submit" class="btn btn-primary">Envoyer <span class="glyphicon glyphicon-send"></span></button>
                                    <button  type="reset" class="btn btn-primary"> Effacer <span class="glyphicon glyphicon-erase"></span></button>
                                </center>
                            </div>
                                </div>
                             

                            </form>
<!--                            </div>-->
                        </div>

                    </div>
                </div>

        </main>
        
        <?php
            include 'php/footer.php';
        ?>

    </body> 
    
</html>
