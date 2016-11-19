// Les fonctions globales 

document.addEventListener('DOMContentLoaded', function () { // après chargement

    /*******************************************************
    ************** Date de modification automatique ********
    *******************************************************/
    
    // Plus d'infos sur : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date
    
    var date = new Date(document.lastModified);
    date = date.toLocaleString();
    document.getElementById("lastModif").innerHTML = date;
   // console.log(date);
    
    /*******************************************************
    ********************************************************
    *******************************************************/
    
    
    
    
});
                        

