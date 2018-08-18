<?php


echo'<h1><center><mark>la liste de toutes les entreprises enregistrées</mark></center></h1>';


echo '<br/>';echo '<br/>';

//recuperer les données!!

$sql=$bdd->query("SELECT * FROM entreprise");

// afficher les resultats de la requette 

while($resultat=$sql->fetch())
{
	echo '<h1><strong>'.$resultat["nom"].'</strong></h1>';
	echo 'Raison Social:  '.$resultat["raisonsocial"].'<br>';
	echo 'Adresse:  '.$resultat["adresse"].'</p>';
	echo 'Email:  '.$resultat["email"].'<br>';
	echo 'Lien(site):   <a href="'.$resultat["lien"].'" target="_blank">' .$resultat["lien"].'</a><br>';
	echo'<br>';
	echo 'Télephone:  '.$resultat["Tel"].'<br>';
	echo 'Fax:  '.$resultat["Fax"].'<br>';
	echo 'Mobile:  '.$resultat["mobile"].'</p>';
	echo 'Description:<font color="red">  '.$resultat["description"].'</font></p>';
	echo '<div id"mail">';
	echo '<a class="nav" href="mailto:'.$resultat["email"].'" target="_blank"> Contactez le par Email</a></div>';
	echo'<hr>';
	
	}	

?>