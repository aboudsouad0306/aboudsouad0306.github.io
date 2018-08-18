<?php
// OUVERTURE DE SESSION
include("session.php");



//ce fichier va nous permettre de recuperer les données saisies par un utilisateur puis les sauvgardé dans la base de données

if( isset($_POST["nom"]) and isset($_POST["adresse"]) and isset($_POST["region"]) and isset($_POST["tel"]) 
	and isset($_POST["activite"]) and isset($_POST["email"]))
{
//recuperer les données saisies dans le formulaire et les transformer en variables
$nom1=addslashes($_POST["nom"]);
$raison=addslashes($_POST["rs"]);
$adresse=addslashes($_POST["adresse"]);
$description=addslashes($_POST["description"]);
$wilaya=addslashes($_POST["region"]);
$tel=addslashes($_POST["tel"]);
$fax=addslashes($_POST["fax"]);
$mobile=addslashes($_POST["mobile"]);
$domain=addslashes($_POST["activite"]);
$lien=addslashes($_POST["lien"]);
$email1=addslashes($_POST["email"]);
// fin de la recolte!!



//etablir la connexion a la base de données
include("../connexion.php");

//recuperer l'identifiant du secteur d'activité
$sql=$bdd->query("SELECT* FROM activité ");


//recuperer le id:
while($res=$sql->fetch()){

$idact=$res["id"];
}


//recuperation de l'id region "wilaya" 
	$sql1=$bdd->query("SELECT * FROM wilaya WHERE wilaya='$wilaya'");
	while($resultat1=$sql1->fetch())
	{
		$idw=$resultat1["id"];
		}


// insertion de données ................

$sql = "INSERT INTO `its`.`entreprise` (`id`, `nom`, `raisonsocial`, `email` , `lien`, `description`, `adresse`, `Tel`, `Fax`, `mobile`, `idwilaya`, `idact`)
VALUES (NULL, '$nom1', '$raison', '$email1', '$lien',  '$description', '$adresse', '$tel', '$fax', '$mobile', '$idw', '$idact');" ;

   $bdd->query($sql) ;
   //  or die('Erreur SQL !'.$sql.'<br>'.error());				//////here  find way 

    // on affiche le résultat pour le visiteur
    echo 'vous infos ont été ajouté dans notre base de dennée.<br/>';
	echo stripslashes($domain).'<br/>';
	echo stripslashes($nom).'<br/>';
	echo stripslashes($raison).'<br/>';
	echo stripslashes($tel).'<br/>';
	echo stripslashes($fax).'<br/>';
	echo stripslashes($adresse).'<br/>';
	echo stripslashes($wilaya).'<br/>';
	
	echo'<a href="index.php"> >>>Retour à la page d accueil!</a>';

}else{

	echo"<font color='red'>* </font>: Champ Obligatoire";
    echo'<a href="ajouter.php"> >>>Ressayer!</a>';
	 }

    //mysql_close();  // on ferme la connexion
   // } 
 
?>