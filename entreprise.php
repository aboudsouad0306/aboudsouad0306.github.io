<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
<div class="navigation">
<a href="index.php">Accueil</a>
<a href="">Annuaire</a>
<a href="">Petites annonces</a>
<a href="">Acces membres</a>
<a href="">Inscription</a>
</div>
  <div class="header">
  
  </div>
  <div class="sidebar1">
  <div id="secteur">Par secteurs d'activité</div>
    <ul class="nav">
    <?php
    //connexion a la base de données
    include("cat.php");
   ?>
    </ul>
    <p></p>
   </div>
  <div class="content">
    <h1>Intitulé de la page</h1>
    
    <div id="entr"> 
	<?php
//ce fichier va nous permettre d'afficher les données concernant les entrepries contenues dans la base de données
if(isset ($_GET["id"]))
{
	$id=$_GET["id"];
	
//établir une connexion a la base de données!

include("connexion.php");

//recuperer les données!!

$sql=$bdd->query("SELECT * FROM entreprise WHERE idcat='$id'");

// afficher les resultats de la requette 

while($resultat=$sql->fetch())
{
	echo '<h4>'.$resultat["nom"].'</h4>';
	echo '<p>'.$resultat["raisonsocial"].'<br/>';
	echo $resultat["description"].'<br/>';
	echo $resultat["adresse"].'<br/>';
	echo $resultat["Tel"].'<br/>';
	echo $resultat["Fax"].'<br/></p>';
	echo'<div id"mail">
	<a href="">
	contact par Email
	</a>
	</div>'; 
	}	

}

	
?>
</div>
    <h3></h3>
    <p></p>
    <p> </p>
    <p></p>
    <h4></h4>
    <p></p>
    <!-- end .content --></div>
   <div class="footer">
    <p><center><a href="http://www.infotoolssolutions.com" target="blank">Info Tools Solutions, Tous droits réservés © 2018</center></p>
    <!-- end .footer -->
  </div>
  <!-- end .container --></div>
</body>
</html>
