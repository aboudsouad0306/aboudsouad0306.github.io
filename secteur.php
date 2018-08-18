<?php
//etablir la connexion a la base de donées
include("connexion.php");

$sql=$bdd->query("SELECT * FROM categorie");
// afficher les resultats de la recherche

//echo'<SELECT name="activite">';
while($resultat=$sql->fetch())
{
echo '<option>'.$resultat["nom"].'</option>';
} 
//echo'</SELECT>';



?>