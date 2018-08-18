<?php


echo'la liste des utilisateurs enregistres';

echo '<br/>';echo '<br/>';

//recuperer les données!!

$sql=$bdd->query("SELECT * FROM users");

// afficher les resultats de la requette 

while($resultat=$sql->fetch())
{
	echo '<p>'.$resultat["nom"].'</p>';
	echo '<p>'.$resultat["prenom"].'</p>';
	echo '<p>'.$resultat["adresse"].'</p>';
	
	echo'<div id"mail">
	<a href="">
	contact par Email
	</a>
	</div>'; 
	}	



?>