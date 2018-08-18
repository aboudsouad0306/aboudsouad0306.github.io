<?php



echo '<br/>';echo '<br/>';

echo '<h1><center><mark><strong>Liste des Utilisateurs</strong></mark></h1></center><br>';
echo'<br>';
  //recuperer les données!!

$sql=$bdd->query("SELECT * FROM users");


  // afficher les resultats de la requette 

while($resultat=$sql->fetch())
{
	if($resultat["idtype"]==1){
					$usre="Administrateur";		
							}else
					$usre="Entrepreneur";	


	$space="   ";
	echo '<h1><strong>'.$resultat["nom"].$space.$resultat["prenom"].'</strong></h1>';
	echo '<h2><font color="red"><strong>'.$usre.'</strong></font></h2>';
	echo 'Adresse:  '.$resultat["adresse"].'<br/>';
	echo 'MOT DE PASSE:  '.$resultat["mdp"].'<br/>';
	echo 'Email:  '.$resultat["email"].'<br/></p>';
	
	echo '<div id"mail">';
	echo '<a class="nav" href="mailto:'.$resultat["email"].'" target="_blank"> Contactez le par Email</a></div>';
	echo'<hr>';
}	
    
?>