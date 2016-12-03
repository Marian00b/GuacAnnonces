// Les fonctions pour affichage dynamique  

document.addEventListener('DOMContentLoaded', function () { // après chargement

    
    /*******************************************************
    ******** Met en forme les informations de la BDD *******
    *******************************************************/
    
    
    
    // A modifier selon partie 3
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
//        ret+= '<div class="show_map" style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='+ annonce.rdv_lat +',' + annonce.rdv_lon +'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />';
        ret+='</div>';
        ret+= '</div>';
        return ret; 
                    
    }
    
    
    /*******************************************************
    ******** Ajoute toutes/certaines annonces de la BDD ****
    *******************************************************/
    
    function refresh_annonces(curr_form,supression) {
//        test();

        
		var request = new XMLHttpRequest();
//         test();
        
		request.addEventListener('load', function(data) {
            
			var ret = JSON.parse(data.target.responseText);
            //console.log(ret);
			var new_html = '';
            
			for (var i = 0; i < ret.annonces.length; i++) {
				new_html += build_annonce_html(ret.annonces[i]);
			}
            
            
			document.querySelector('#annonces').innerHTML = new_html;
            
           addSuprimer();
            
            if (!supression){
                 clickrecherche();
                 clickannonce();
            }else {
           clickannonce();
            }

           

            
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
        
        refresh_annonces(new FormData(filterForm),true);
    });
    
    
    
    var deleteBtns;
    
    function addSuprimer() {
        
    deleteBtns = document.getElementsByClassName("supprimer");
    Array.from(deleteBtns).forEach(function(deleteBtn) {

        deleteBtn.addEventListener("click", function(event) {

            event.stopPropagation();

//            event.preventDefault(); // ne pas recharger la page par défaut

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
    
//    test();

    refresh_annonces();
//        clickrecherche();
//    clickannonce();
    clickajout();
//    test();

    /*******************************************************
    **** Afficage des annonces au chargement de la page ****
    *******************************************************/
        
	//setInterval(refresh_annonces, 1000);
    
     
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
//        window.location.href("#");
        window.top.window.scrollTo(0,0);
        //        $("aside").css('bottom', '0');
    }
    else if (($(this).attr("class") == "panel-heading ajout") && ($(this).siblings("*").is(':hidden'))) { 
        $("aside").css('position', 'fixed');
    }

}

function toggleMap(event){
    event.preventDefault();
    
    if($(this).parent().parent().parent().parent().siblings("div.inner").children().length > 0) {
//        $(this).remove(".map_div");
        $(this).parent().parent().parent().parent().siblings("div.inner").empty();
        $(this).text("(Cliquez ici pour afficher la carte)");

    }
    else {

        $(this).parent().parent().parent().parent().siblings("div.inner").append('<div class="map_div" style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='+ $(this).parent().parent().parent().parent().siblings("div.inner").attr("id") +'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />' );
        $(this).text("(Cliquez ici pour cacher la carte)");

    }
}

    
    function clickannonce() {
        waitForElement(".panel-body",function(){        

            $("div.panel-heading.annonce").each(function() {
                $(this).siblings("*").hide();
            });

            $("div.panel-heading.annonce").click(toggleContent);
        });



        waitForElement(".map",function(){        

            $(".map").click(toggleMap);
        });
    }
    
    function clickajout() {
        waitForElement(".panel-body",function(){        

            $("div.panel-heading.ajout").each(function() {
                $(this).siblings("*").hide();
            });

            $("div.panel-heading.ajout").click(toggleContent);
        });


    }
    
    function clickrecherche() {
        waitForElement(".panel-body",function(){        

            $("div.panel-heading.recherche").each(function() {
                $(this).siblings("*").hide();
            });

            $("div.panel-heading.recherche").click(toggleContent);
            
        });
    }
    
    



    
    
});
                        

