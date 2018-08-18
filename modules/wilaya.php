
<?php
//script pour recuperer les wilaya algeriennes
//etablir la connexion a la base de donées
include("../connexion.php");
$sql=$bdd->query("SELECT * FROM wilaya");



echo '<ul>';
while($resultat=$sql->fetch())
{  
$idw=$resultat["id"];
echo '<li><a href="#">'.$resultat["wilaya"].'</a></li>';
   //afficher le nombre d'entreprises inscrites pour la dite wilaya
   //$sql=mysql_query("SELECT * FROM entreprise WHERE idwilaya='$idw'");

}
echo '</ul>';

?>
   
   
 