<?php
//ce fichier va permettre de recuperer les divers categories a partir de la base de données!

//1-etablir la connexion avec la base de données !

include("connexion.php");
//requette pour recuperer les données a partir de la table categorie!
$sql=$bdd->query("SELECT * FROM categorie");

//afficher les resultats de la requette 
echo'<ul>';//ceci est une liste qui va contenir les liens de la navigation :::
while($resultat=$sql->fetch()){
	
	$id=$resultat["id"];
	
	echo '<li><a href="entreprise.php?id='.$id.'">>'.$resultat["nom"].'</a></li>';
	
	}
	 
echo'</ul>';

?>