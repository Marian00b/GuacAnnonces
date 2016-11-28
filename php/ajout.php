
<?php
//<!--Requête pour ajouter une anonce à la BDD à partir des donnees du formulaire d'ajout HTML-->

	include "bdd.php";

	session_start();

	//test connexion a la base de donnee
	try {
		$bd = connexionbd();
	}catch ( Exception $e ) {
		die( 'Erreur : ' . $e->getMessage() );
	}
	
	//requete pour ajouter une annonce dans la BDD
	$req = 	"INSERT INTO annonces VALUES "
		. "( DEFAULT, '" 
		. $_POST[ "titre" ] . "', '" 
		. $_POST[ "description" ] . "', '" 
		. $_POST[ "categorie" ] . "', '" 
		. $_POST[ "nom_vendeur" ] . "', '"  
		. $_POST[ "prix" ] . "', '" 
		. $_POST[ "photo" ] . "', '" 
		. $_POST[ "rdv_lat" ] . "', '" 
		. $_POST[ "rdv_lon" ] . "', '" 
        . date('Y-m-d G:i:s') . "' );";
    print $req;
    requete( $bd, $req );
	
?>


