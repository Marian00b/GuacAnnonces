// Les fonctions pour affichage dynamique  

document.addEventListener('DOMContentLoaded', function () { // après chargement

    
    /*******************************************************
    ******** Met en forme les informations de la BDD *******
    *******************************************************/
    
    function build_annonce_html(annonce){
        var ret = '';
        ret+= '<div class="panel panel-info">';
        ret+= '<div class="panel-heading annonce">';
        ret+= '<h3 class="panel-title pull-left">' + annonce.titre + ' <span class = "label label-primary">'+ annonce.categorie +'</span></h3>';
        ret+= '<button type="button" id="'+annonce.id+'" class="btn btn-danger pull-right glyphicon glyphicon-trash supprimer"></button> ';
        ret+= '<div class="clearfix"></div>';
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
        ret+='<th>Coordonnées </br> <a href="#" class="map"> (Cliquez ici pour afficher la carte) </a></th>';
        ret+='<th>Vendu par </th>';
        ret+= '<th>Ajouté le </th>';
        ret+= '</tr>';
        ret+= '<tr>';
        ret+= '<td> Latitude : '+ annonce.rdv_lat +' </br> Longitude : '+ annonce.rdv_lon +'</td>';
        ret+= '<td>'+ annonce.nom_vendeur + '</td>';
        ret+= '<td>'+ annonce.date_ajout + '</td>';
        ret+= '</tr>';
        ret+= '</table>';
        ret += '<div class="inner" id="'+ annonce.rdv_lat +',' + annonce.rdv_lon +'">';
        ret+='</div>';
        ret+= '</div>';
        return ret; 
                    
    }
    
    
    /*******************************************************
    ******** Ajoute toutes/certaines annonces de la BDD ****
    *******************************************************/
    
    function refresh_annonces(curr_form,supression) {


        
		var request = new XMLHttpRequest();

        
		request.addEventListener('load', function(data) {
            
			var ret = JSON.parse(data.target.responseText);
 
			var new_html = '';
            
			for (var i = 0; i < ret.annonces.length; i++) {
				new_html += build_annonce_html(ret.annonces[i]);
			}
            
            
			document.querySelector('#annonces').innerHTML = new_html;
            
            addSuprimer();
            
            if (!supression){
                clickToggle("recherche");
                clickToggle("annonce");
            } else {
                clickToggle("annonce");
            }
            
    
		});

		request.open("POST", "php/get_all_messages.php");    
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
        
        refresh_annonces(new FormData(filterForm),true);
    });
    
    
    
    var deleteBtns;
    
    function addSuprimer() {
        
    deleteBtns = document.getElementsByClassName("supprimer");
    Array.from(deleteBtns).forEach(function(deleteBtn) {

        deleteBtn.addEventListener("click", function(event) {

            event.stopPropagation();

            var request = new XMLHttpRequest();

            // Vérifie qu'il n'y a pas de pb lors du loading
            request.addEventListener('load', function(data) {

                var ret = JSON.parse(data.target.responseText);
                
                if (data.target.status==500) {
                    alert("Erreur d'envoie des filtres")
                }
                else if (ret=="false") {
                    document.getElementById('alertbox').innerHTML = '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Attention! </strong> Vous devez vous connecter pour supprimer une annonce. </div>';
                    window.top.window.scrollTo(0,0);
                }
                else {
                    refresh_annonces("",true);
                }
            }); 
            
            var data=new FormData();
            var atribuID = deleteBtn.getAttribute("id");
            data.append('id',atribuID);

            request.open("POST", "php/supprimer.php");    
            request.send(data);

        });
    });
    }    
    

    refresh_annonces();
    clickToggle("ajout");
    
    
    var form_ajout = document.getElementById('ajout-form');
    
    form_ajout.addEventListener("submit", function(event) {
	
        event.preventDefault();
        
        var request = new XMLHttpRequest();

        request.addEventListener('load', function(data) {
            if (data.target.status == 500) {
                
                window.alert("Echec de l'ajout");

            } else if (data.target.status == 200) {
                form_ajout.reset();

               document.getElementById('alertbox').innerHTML = '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Annonce ajoutée ! </strong> Vous pouvez la consulter dès à présent en cliquant sur "Afficher les données".  </div>';
            }
  
	   });

        request.open("POST", "php/ajout.php");
        request.send(new FormData(form_ajout)); 
	}); 


    /*******************************************************
    **** Toggle on click : annonces, map, ajout         ****
    *******************************************************/
    
     
    function waitForElement(elementPath, callBack){
      window.setTimeout(function(){
        if($(elementPath).length){
          callBack(elementPath, $(elementPath));
        }else{
          waitForElement(elementPath, callBack);
        }
      })
    }


    function toggleContent(event) {
        event.preventDefault();

        $(this).siblings("*").toggle();

        if (($(this).attr("class") == "panel-heading ajout") && ($(this).siblings("*").is(':visible'))){
            $("aside").css('position', 'absolute');
            window.top.window.scrollTo(0,0);
        }
        else if (($(this).attr("class") == "panel-heading ajout") && ($(this).siblings("*").is(':hidden'))) { 
            $("aside").css('position', 'fixed');
        }

    }

    function toggleMap(event){
        event.preventDefault();

        if($(this).parent().parent().parent().parent().siblings("div.inner").children().length > 0) {
            $(this).parent().parent().parent().parent().siblings("div.inner").empty();
            $(this).text("(Cliquez ici pour afficher la carte)");

        }
        else {

            $(this).parent().parent().parent().parent().siblings("div.inner").append('<div class="map_div" style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='+ $(this).parent().parent().parent().parent().siblings("div.inner").attr("id") +'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />' );
            $(this).text("(Cliquez ici pour cacher la carte)");

        }
    }


    function clickToggle(nom_classe){
        waitForElement(".panel-body",function(){   
            
            $("div.panel-heading."+nom_classe).each(function() {
                $(this).siblings("*").hide();
            });

            $("div.panel-heading."+nom_classe).click(toggleContent);
            
        });
        
        if (nom_classe == "annonce") {
            waitForElement(".map",function(){        
                $(".map").click(toggleMap);
            });
        }
        
    }
    
});
                        

