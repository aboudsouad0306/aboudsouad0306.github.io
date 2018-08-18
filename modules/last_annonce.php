<?php
//portion de codes pour afficher les dernieres annonces
include("../connexion.php");




/*afficher les dernieres annonces postées */
$sql=$bdd->query("SELECT * FROM annonce LIMIT 10");

echo 
'<div class="last"><ul>'; 
     
      while($resultat=$sql->fetch())
      {
      echo '<li><h3><a href="detail_annonce.php?id='.$resultat["id"].'">'.$resultat["titre"].'</a></h3>';
	  /*if(){*/
	  echo '<a href="detail_annonce.php?id='.$resultat["id"].'"><img src="imgs/annonces/'.$resultat["id"].'.jpeg" width="100" height="75"/></a><br/>';
	  echo 'parue le : '. date("d/m/Y", strtotime($resultat["date"])).'';
	  echo'</li>';

    } 
echo 
'</ul></div>';


?>

 