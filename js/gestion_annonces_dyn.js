// Les fonctions pour affichage dynamique  

document.addEventListener('DOMContentLoaded', function () { // après chargement

    
    /*******************************************************
    ******** Met en forme les informations de la BDD *******
    *******************************************************/
    
    // A modifier selon partie 3
    function build_annonce_html(annonce){
        var ret = '';
        ret+= '<div class="panel panel-info">';
        ret+= '<div class="panel-heading ">';
        ret+= '<h3 class="panel-title">' + annonce.titre + ' <span class = "label label-primary">'+ annonce.categorie +'</span></h3>';
        ret+= '</div>';                    
        ret+= '<div class="panel-body">';
        ret+= '<a href="#" class="pull-right"> <img class="media-object img-thumbnail" width="150" height="150" src="'+ annonce.photo +'" >';
        ret+='<div class="caption" id="prix">';
        ret+= '<p>'+ annonce.prix +' €</p>';
        ret+= '</div>';
        ret+= '</a>';
        ret+= '<div class="media-body">';
        ret+= annonce.description ;
        ret+= '</div>';
        ret+= '</div>';
        ret+= '<table class = "table">'; 
        ret+= '<tr>';
        ret+='<th>Coordonnées</th>';
        ret+='<th>Vendu par </th>';
        ret+= '<th>Ajouté le </th>';
        ret+= '</tr>';
        ret+= '<tr>';
        ret+= '<td> Latitude : '+ annonce.rdv_lat +' </br> Longitude : '+ annonce.rdv_lon +'</td>';
        ret+= '<td>'+ annonce.nom_vendeur + '</td>';
        ret+= '<td>'+ annonce.date_ajout + '</td>';
        ret+= '</tr>';
        ret+= '</table>';
        ret+= '<div style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='+ annonce.rdv_lat +',' + annonce.rdv_lon +'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />';
        ret+= '</div>';
        return ret; 
                    
    }
    
    
    /*******************************************************
    ******** Ajoute toutes/certaines annonces de la BDD ****
    *******************************************************/
    
    function refresh_annonces(curr_form) {
        
		var request = new XMLHttpRequest();
        
		request.addEventListener('load', function(data) {
            
			var ret = JSON.parse(data.target.responseText);
            //console.log(ret);
			var new_html = '';
            
			for (var i = 0; i < ret.annonces.length; i++) {
				new_html += build_annonce_html(ret.annonces[i]);
			}
            
			document.querySelector('#annonces').innerHTML = new_html;

		});

		request.open("POST", "php/get_latest_msg.php");    
        request.send(curr_form);

	}
    
    /*******************************************************
    *********** Action soumission formulaire  **************
    *******************************************************/
        
    var filterForm = document.getElementById('filter-form');

	filterForm.addEventListener("submit", function(event) {

		event.preventDefault(); // ne pas recharger la page par défaut
        
        var request = new XMLHttpRequest();
        
        // Vérifie qu'il n'y a pas de pb lors du loading
		request.addEventListener('load', function(data) {
			console.log(JSON.parse(data.target.responseText));
        
			if (data.target.status==500) {
				alert("Erreur d'envoie des filtres")
            }
        }); 
        
        refresh_annonces(new FormData(filterForm));
    });
        
    

    /*******************************************************
    **** Afficage des annonces au chargement de la page ****
    *******************************************************/
        
    refresh_annonces();
	//setInterval(refresh_annonces, 1000);

    
});
                        

