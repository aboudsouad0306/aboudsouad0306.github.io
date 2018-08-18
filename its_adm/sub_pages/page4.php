<?php



echo '<br/>';echo '<br/>';

//recuperer les données!!

$sql=$bdd->query("SELECT * FROM email");

// afficher les resultats de la requette 

while($resultat=$sql->fetch())

{

	echo $resultat["id"].'<br/>';
	echo $resultat["email"].'<br/>';
	
	echo '<div id"mail">';
	echo '<a class="nav" href="mailto:'.$resultat["email"].'" target="_blank"> Envoyer lui une offre de service par Email</a></div>';
	echo'<hr>';
	}	
    
?>