<?php
//script de suppression d'un membre
// recuperer le id de l'user a partir de url 

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	//requette de suppression du membre
	include("../../../connexion.php");//connexion a la base de donnees!

$req=$bdd->query("DELETE FROM users WHERE id='$id'");
header("Location:../users.php");exit;
 
	
	}

?>