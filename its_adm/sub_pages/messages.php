<?php



echo '<br/>';echo '<br/>';

//recuperer les données!!

$sql=$bdd->query("SELECT * FROM contact");

// afficher les resultats de la requette 

while($resultat=$sql->fetch())

{
	echo '<h2>Nom:    <strong>'.$resultat["nom"].'</strong></h2>';
	echo 'Société:    <strong>'.$resultat["societe"].'</strong><br/>';
	
	echo $resultat["service"].'<br/>';
	echo 'Email:     '.$resultat["email"].'<br/><br/>';
	echo '<h2>Sujet:    <strong>'.$resultat["sujet"].'</strong><br/></p>';
	echo '<font size="3" color="red">'.$resultat["message"].'</font><br/></p>';
	
	echo '<div id"mail">';
	echo '<a class="nav" href="mailto:'.$resultat["email"].'" target="_blank"><strong> Répondre lui  par Email</strong> </a></div>';
	echo'<hr>';
	}		
    
?>