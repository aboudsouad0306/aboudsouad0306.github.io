<?php
//afficher les details de chaque annonces
if( isset($_GET["id"]))
{
$id=$_GET["id"];
//requette pour reccuperer le detail de chaque annonce
$sql=$bdd->query("SELECT * FROM annonce WHERE id='$id'");
// afficher le resultat dans une boucle !!
while($resultat=$sql->fetch())
{
/*recuper id categorie*/
     $id_cat=$resultat["id_cat"];
    //recuperer la categorie ainsi que la sous categorie de l'annonce
	$sql2=$bdd->query("SELECT * FROM cat_annonce WHERE id='$id_cat'");
	while($resultat2=$sql2->fetch())
    {
	$id=$resultat2["id"];
	$sql3=$bdd->query("SELECT parent FROM cat_annonce WHERE id='$id'");
	$resultat3=$sql3->fetch();
	$categorie=$resultat3["parent"];
	$intitule_categorie=$resultat2["intitule"];
	$id_cat=$resultat2["id"];
	/*afficher la fille d'ariane des categories et sous_categorie*/
	echo '<div class="ariane">';
	echo $categorie.' / <a href="type_annonce.php?id='.$resultat2["id"].'">'.$intitule_categorie.'</a><br/>';
	echo '</div>';
	}
//affichage des etails de chaque annonce

echo '<table width"800"><tr><td><div class="detail">';
echo '<h3>'.$resultat["titre"].'</h3><br/><br/>';
echo $resultat["content"].'<br/>';
echo $resultat["id_user"].'<br/>';
echo 'Parue le: '. date("d/m/Y", strtotime($resultat["date"])).'<br/>';
echo $resultat["id_wilaya"].'';
echo '</div></td>';
//affichage de l'mage de l'annonce
echo '<td><img src="imgs/annonces/'.$resultat["id"].'.jpeg" width="200" height="150"/><br/>';
echo '</td></tr></table>';
}
}



?>

 