
<?php
//zeeeeeeeee script !!!!
//verification des champs du formulaire !!

if(isset ($_POST["civilite"]) and isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["email"]) and  isset($_POST["adresse"]) and isset($_POST["region"]) and  isset($_POST["mdp"]) and isset($_POST["confirme"]))
  {
 if( $_POST["mdp"]=$_POST["confirme"]){
	//recuperation des données saisies par l'utilisateur
	$civilite=$_POST["civilite"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$email=$_POST["email"];	
	$adresse=$_POST["adresse"];
	$region=$_POST["region"];
	$mdp=$_POST["mdp"];
	// fin de recolte....**
	
	$type="administrateur";

	//etablir la connexion a la base de données
	include("../../connexion.php");
	
	//recuperation de l'id type
	$sql=$bdd->query("SELECT * FROM users_type WHERE type='$type'");
	while($resultat=$sql->fetch())
	{
		$idtype=$resultat["id"];
	}
		
	//recuperation de l'id region "wilaya" 
	$sql1=$bdd->query("SELECT * FROM wilaya WHERE wilaya='$region'");
	while($resultat1=$sql1->fetch())
	{
		$idwilaya=$resultat1["id"];
		}


//insertion des données récoltés dans la bse de données !!

$sql2 = "INSERT INTO `its`.`users` (`id`, `civilite`, `nom`, `prenom` , `adresse`, `email`, `mdp`, `idtype`, `idwilaya`)
VALUES (NULL, '$civilite', '$nom', '$prenom', '$adresse',  '$email' ,  '$mdp' , '$idtype', '$idwilaya');"; 
$bdd->query($sql2); 
//recuperer l'identifiant du nouveau utilisateur
/*$sql=mysql_query("SELECT * FROM users WHERE email='$email'");
while($resultat=mysql_fetch_array($sql))
{
$id=$resultat["id"];	
}	
//creer un compteur personnel pour le nouveau membre
$id_user=$id;
$n_visite=0;
$sql2 = "INSERT INTO `its`.`user_compteur` (`id`, `id_user`, `n_visite`)
VALUES (NULL, '$id_user', '$n_visite');"; 

///mysql_query($sql); */

echo'<a href="../modules/deconnexion.php">Félicitations vous avez inscrit un nouveau admin sur Find.dz, Connectez-vous maintenant !!</a>';
}
else{
echo'Les mots de passes que vous avez saisis ne sont pas identiques';
}
}
else{
	echo"Remplissez tout les champs";
	}
?>
