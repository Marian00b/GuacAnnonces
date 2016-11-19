// Les fonctions pour affichage dynamique  

document.addEventListener('DOMContentLoaded', function () { // après chargement

    
    /*******************************************************
    ******** Met en forme les informations de la BDD *******
    *******************************************************/
    
    // A modifier selon partie 3
    function build_annonce_html(annonce){
        var ret = '';
		ret+= '<div class="panel panel-default">';
		ret+= '<div class="panel-heading">';
		ret+= '<h3 class="panel-title">' + annonce.titre + '</h3>';
		ret+= '</div>';
		ret+= '<div class="panel-body">';
		ret+= annonce.description
		ret+= '</div></div>';
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
                        

