       
document.addEventListener('DOMContentLoaded', function () { // après chargement

    var inscriForm = document.getElementById('inscrit-form');

        inscriForm.addEventListener("submit", function(event) {

            event.preventDefault(); // ne pas recharger la page par défa
            var request = new XMLHttpRequest();
            
             request.addEventListener('load', function(data) {
                 
                 inscriForm.reset();
                 
                if (data.target.status==500) {
                    document.getElementById('alertbox').innerHTML = '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Erreur lors de l\'inscription. </strong> Veuillez réessayer.  </div>';
                }
                else {
                 document.getElementById('alertbox').innerHTML = '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Inscription réussie ! </strong> Vous pouvez maintenant vous connecter.  </div>';
                }

                 
               
             }); 
                request.open("POST", "php/insertMembre.php");    
                request.send(new FormData(inscriForm));

        });
    
});
    