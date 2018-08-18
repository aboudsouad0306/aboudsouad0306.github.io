<?php
//etablir la connexion a la base de données
include("../../../../connexion.php");
//requette pour recuperer la liste des utilisateurs
$sql=$bdd->_query("SELECT * FROM actualite");
// affichage des resultats dans un tableau

while($resultat=$sql->fetch())
{
echo '<h4>'.$resultat["titre"].'</h4>';
echo '<p>'.$resultat["article"].'</p>';
echo '<p>'.$resultat["date"].'</p>';
}
	
     ?>