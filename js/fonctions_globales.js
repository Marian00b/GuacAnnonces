// Les fonctions globales 

document.addEventListener('DOMContentLoaded', function () { // après chargement

    /*******************************************************
    ************** Date de modification automatique ********
    *******************************************************/
    
    // Plus d'infos sur : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date
    
    var date = new Date(document.lastModified);
    date = date.toLocaleString();
    document.getElementById("lastModif").innerHTML = date;

    
    /*******************************************************
    ********************************************************
    *******************************************************/
    
    /*******************************************************
    ******** Ajoute toutes/certaines annonces de la BDD ****
    *******************************************************/
    
    
    function connexion(toCheck){
                
        var request = new XMLHttpRequest();
        
        request.addEventListener('load', function(data) { 
            
            var session_val = JSON.parse(data.target.responseText);
            var new_html; 
            
            
            if (session_val) {
                new_html = '<ul class="nav navbar-nav navbar-right"> <li> <p class="navbar-text"> Bonjour ' + session_val + '</p></li>';
                new_html += '<li><div id="deco">';
                new_html += '<form id="deco-form" class="navbar-form navbar-right" role="form">';
                new_html += '<button type="submit" class="btn btn-primary"> Déconnexion </button>';
                new_html += '</form> </div></li></ul>';

                document.querySelector('#login').innerHTML = new_html;    

                add_deco();
                 
                if (toCheck){
                    document.getElementById('alertbox').innerHTML = '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Connexion réussie ! </strong> Vous pouvez maintenant ajouter/supprimer des annonces à votre guise.  </div>';
                }
            }
            else if (toCheck) {
                var all_a =  document.querySelectorAll('#login-form div.input-group'); 
                all_a.forEach(function(attr) {
                    attr.setAttribute('class', 'input-group has-error');
                });
                
                document.getElementById('alertbox').innerHTML = '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Attention! </strong> Adresse email ou mot de passe incorrect. Veuillez réessayer. </div>';
            }
            else { 
                new_html= '<form id="login-form" class="navbar-form navbar-right" role="form">';
                new_html+= '<div class="input-group ">';
                new_html+= '<span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i></span>'
                new_html+= '<input id="email" type="email" class="form-control" name="email" value="" placeholder="Adresse Email" required>';
                new_html+= '</div>';
                new_html+= '<div class="input-group">';
                new_html+= '<span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i></span>';
                new_html+= '<input id="password" type="password" class="form-control" name="password" value="" placeholder="Mot de passe" required>';
                new_html+= '</div>';
                new_html+= '<button type="submit" class="btn btn-default glyphicon glyphicon-log-in"> </button>';
                new_html+= '</form>';
                
                document.querySelector('#login').innerHTML = new_html;    

                add_log();
            }
            
            
            
        });
                
        request.open("POST", "php/session.php");    
        request.send();
        
    }
    
    
    function check_user(curr_form) {
        
		var request = new XMLHttpRequest();
        
		request.addEventListener('load', function(data) {
            
//			var ret = JSON.parse(data.target.responseText);
            
            connexion(true);
        
		});

		request.open("POST", "php/login.php");    
        request.send(curr_form);

	}
    
    /*******************************************************
    *********** Action soumission formulaire  **************
    *******************************************************/
    
    var loginForm; 
    
    function add_log() {
        
        loginForm = document.getElementById('login-form');

        loginForm.addEventListener("submit", function(event) {
            
            event.preventDefault(); // ne pas recharger la page par défaut

            var request = new XMLHttpRequest();

            // Vérifie qu'il n'y a pas de pb lors du loading
            request.addEventListener('load', function(data) {
                console.log(JSON.parse(data.target.responseText));

                if (data.target.status==500) {
                    alert("Erreur d'envoie des filtres")
                }
            }); 

            check_user(new FormData(loginForm));
        });
    }

        
    var decoForm; 


    function add_deco() {
        decoForm = document.getElementById('deco-form');

        decoForm.addEventListener("submit", function(event) {

            event.preventDefault(); // ne pas recharger la page par défa
              var request = new XMLHttpRequest();
            
             request.addEventListener('load', function(data) {
               connexion();
            }); 
                request.open("POST", "php/deconnexion.php");    
                request.send();

        });
        
    }
    
        
    connexion();
    

  

    
    
});
                        

