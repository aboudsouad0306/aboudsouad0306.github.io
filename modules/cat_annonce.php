
<?php
//script pour recuperer les categories d'annonces
//etablir la connexion a la base de donées
include("../connexion.php");
$sql=$bdd->query("SELECT * FROM cat_annonce WHERE parent='defaut'");

echo 
'<div class="annonce">
<ul class="parent">';

while($resultat=$sql->fetch())
{
$intitule=$resultat["intitule"];

echo 
'<li><h3>'.$intitule.'</h3>';

    /*afficher les sous categories pour chaque categorie d'annonce*/
	$sql2=$bdd->query("SELECT * FROM cat_annonce WHERE parent='$intitule'");

      
      while($resultat2=$sql2->fetch())
      {
      $intitule=$resultat2["intitule"];
	  $id=$resultat2["id"];

      echo '<a href="type_annonce.php?id='.$resultat2["id"].'">'.$intitule.'</a><br/>';
      }
	 

echo '</li>';
} 
echo 
'</ul></div>';


?>
   
   
 