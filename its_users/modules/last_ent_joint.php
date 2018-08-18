<?php
//programme pour afficher les dernieres entreprises ajouter a l'annuaire!!
include("../connexion.php");

/*afficher les dernieres entreprises ajoutées */
$sql=$bdd->query("SELECT * FROM entreprise ORDER BY id DESC LIMIT 5 ");

echo 
'<div class="">'; 
     
      while($resultat=$sql->fetch())
      {
      echo '<li><a href="#?id='.$resultat["id"].'">'.$resultat["nom"].'</a></li>';
    } 
echo '</div>';


?>

 