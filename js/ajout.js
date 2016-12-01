//WebService permettant d'ajouter des donnees à la BDD, à partir du formulaire d'ajout HTML "form_ajout.php"


document.addEventListener('DOMContentLoaded', function () {
    
    var form = document.getElementById('ajout-form');
    form.addEventListener("submit", function(event) {
	
	// On n'exécute pas l'action par défaut, on affiche une alerte
        event.preventDefault();
        //window.alert("Tentative d'ajout d'annonce en cours");

        // On prépare une requête AJAX
        var request = new XMLHttpRequest();

        // On définit ce qu'elle fera lorsqu'elle aura reçu une réponse
        request.addEventListener('load', function(data) {
            if (data.target.status == 500) {

                // On fait sauter une erreur explicite au nez de l'utilisateur
                window.alert("Echec de l'ajout");

            } else if (data.target.status == 200) { // Sinon, si le code d'erreur est "ok"
            // On vide le champ du message (juste pour faire joli)
                form.reset();

               document.getElementById('alertbox').innerHTML = '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Annonce ajoutée ! </strong> Vous pouvez la consulter dès à présent.  </div>';
            }
/*

            var ret = data.target.responseText;
*/
    //window.alert(ret);   
    
	   });

        request.open("POST", "php/ajout.php");
        // On envoie les données que l'utilisateur a tapées dans le formulaire
         /*for (var pair of new FormData(form).entries()) {
       window.alert(pair[0]+ ', ' + pair[1]); 
    }  */



        request.send(new FormData(form)); 

	}); 
});
