<?php
//etablir la connexion a la base de données

include("connexion.php");

// lancer une requette sur la table wilaya de la base de données!!

$sql = $bdd->query("SELECT * FROM wilaya ORDER BY id");

// afficher les resultats de la requette !!

//boucle while tant que 

while($resultat=$sql->fetch())
{
	echo '<option>'.$resultat["wilaya"].'</option>';
	}


?>
<!--<option value="1">Ou?</option>-->