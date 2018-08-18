<?php
//ce fichier va nous permettre de recuperer les données saisies par un utilisateur puis les sauvgardé dans la base de données

if( isset($_POST["nom"]) and isset($_POST["rs"]) and isset($_POST["adresse"]) and isset($_POST["description"]) and isset($_POST["region"]) and isset($_POST["tel"]) and isset($_POST["fax"]) and isset($_POST["mobile"]) and isset($_POST["activite"]) and isset($_POST["lien"]) and isset($_POST["email"]))
{
//recuperer les données saisies dans le formulaire et les transformer en variables


$nom=addslashes($_POST["nom"]);
$raison=addslashes($_POST["rs"]);
$adresse=addslashes($_POST["adresse"]);
$description=addslashes($_POST["description"]);
$wilaya=addslashes($_POST["region"]);
$tel=addslashes($_POST["tel"]);
$fax=addslashes($_POST["fax"]);
$mobile=addslashes($_POST["mobile"]);
$domain=addslashes($_POST["activite"]);
$lien=addslashes($_POST["lien"]);
$email=addslashes($_POST["email"]);
// fin de la recolte!!



//etablir la connexion a la base de données
include("connexion.php");

//recuperer l'identifiant du secteur d'activité

$sql=$bdd->query("SELECT* FROM activité WHERE nom='$domain'");

//recuperer le id:
while($res=$sql->fetch()){

$idact=$res["id"];
}

//recuperer l'identifiant de laregion "Wilaya" 

$sql=$bdd->query("SELECT* FROM wilaya WHERE wilaya='$wilaya'");
//recuperer le id:
while($res=$sql->fetch()){

$idw=$res["id"];
}

// la ou commence les requettes d'insertion lol!!

// insertion de données ................

$sql = "INSERT INTO `its`.`entreprise` (`id`, `nom`, `raisonsocial`, `email` , `lien`, `description`, `adresse`, `Tel`, `Fax`, `mobile`, `idwilaya`, `idact`)
VALUES (NULL, '$nom', '$raison', '$email', '$lien',  '$description', '$adresse', '$tel', '$fax', '$mobile', '$idw', '$idact');"; 

$bdd->query($sql); 

}

//fin de la condition if du depart !!
// on insère les informations du formulaire dans la table
   $bdd->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error());

    // on affiche le résultat pour le visiteur
    echo 'Vos infos on été ajoutées.';
	echo stripslashes($domain).'<br/>';
	echo stripslashes($nom).'<br/>';
	echo stripslashes($raison).'<br/>';
	echo stripslashes($tel).'<br/>';
	echo stripslashes($fax).'<br/>';
	echo stripslashes($adresse).'<br/>';
	echo stripslashes($wilaya).'<br/>';
	
	echo'<a href="index.php"> >>>Retour!</a>';
	

    //mysql_close();  // on ferme la connexion
   // } 
 



?>