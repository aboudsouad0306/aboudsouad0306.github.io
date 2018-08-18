<?php
// OUVERTURE DE SESSION
include("session.php");
 ?>
<?php
//etablir la connexion a la base de données
include("../connexion.php");

//zeeeeeeeee script !!!!
//verification des champs du formulaire !!

if(isset ($_POST["civilite"]) and isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["email"]) and isset($_POST["type"]) and isset($_POST["adresse"]) and isset($_POST["region"]))
{
	//recuperation des données saisies par l'utilisateur
	$civilite=$_POST["civilite"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$email=$_POST["email"];
	$type=$_POST["type"];
	$adresse=$_POST["adresse"];
	$region=$_POST["region"];
	// fin de recolte....**
	
	//recuperation de l'id type
	$sql=$bdd->query("SELECT * FROM users_type WHERE type='$type'");
	while($resultat=$sql->fetch())
	{
		$idtype=$resultat["id"];
		}
		
	//recuperation de l'id region "wilaya" 
	$sql=$bdd->query("SELECT * FROM wilaya WHERE wilaya='$region'");
	while($resultat=$sql->fetch())
	{
		$idwilaya=$resultat["id"];
		}


//insertion des données récoltés dans la bse de données !!

$sql = "INSERT INTO `its`.`users` (`id`, `civilite`, `email`, `nom`,`prenom` , `adresse`, `idtype`, `idwilaya`)
VALUES (NULL, '$civilite', '$email' ,'$nom', '$prenom', '$adresse', '$idtype', '$idwilaya');"; 
$sql->query(); 
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

echo'Félicitations vous étes maintenant inscrit sur Find.dz';
}
else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finddz-annonces</title>
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="../css/boutons.css" rel="stylesheet" type="text/css" />


</head>

<body>
<table width="960"> 
<tr>
<td>
<div class="top_users">

<!--<td>-->
<img src="../imgs/mini-logo.png" />
<!--</td>-->
</div>
</td>
<td width="200">
</td>
<td width="200">
</td>
<td width="200">
</td>
<td>
<div id="acces">
<div class="position">
    <?php
		
	    //affichage d'un ptit message de bienvenue!!
	    echo '<left>Bonjour, '.$prenom.' '.$nom.'<a href="user_profil.php"><br />Mon profil</a><br /> <a href="deconnexion.php">se deconnecter</a>';
	
    ?>
</div> 
 </div><!-- fin de la div acces-->
 </td>
</tr>
</table>

<div class="navigation">

  <a href="index.php" class="nav">Accueil</a>
  <a href="annuaire.php" class="nav">Annuaire</a>
  <a href="actualite.php" class="nav">Actualités</a>
  <a href="service.php" class="nav">Services</a>
  <a href="contact.php" class="nav">Contact</a>
  <a href="ajouter.php" class="adbtn">AJOUTER VOTRE ENTREPRISE!</a>
</div>
<div class="container">

  <div class="header">
  <?php
	//affichage du slogan publicitaire!
	
	include("../modules/slogan.php");
	
	?>
 
   </div>
  <div class="search">
  <center> 
  <form action="search_engine.php" method="post">
  <table width="700" border="0">
  <tr>
    <td>Quoi?</td>
    <td><input name="search" type="text" size="50" id="chp"/></td>
    <td>Ou?</td>
    <td>
    <select name="wilaya" id="select">
	<option>Sélectionner</option>
    <?php
	//cette portion de code va nous permettre de recuperer la liste des wilayas algeriennes lol!
	include("../wiliste.php");
	?>
    </select>
    </td>
    <td><input name="" type="submit" value="Trouver!" class="searchbtn"/></td>
  </tr>
</table>
</form>
</center>  
  </div>
  <div class="add">
  <center>
	<img src="../imgs/ajouter.jpg" width="270" height="360"/>
	<!--zone pour la news letter-->
	<br/>
	</center>
</div>
<div class="horbar">

 <br> <div id="head"><font color="#ffffff" size="4">R</font><font color="red" size="4">Resultats de votre Recherche:</font></div>
    
   </div>
 <div class="content">
    <?php
if(isset($_POST["search"]) and isset($_POST["wilaya"]))
{
$search=htmlspecialchars($_POST["search"]);
$search=addslashes($search);
$wilaya=$_POST["wilaya"];

//etablir la connexion a la base de données
include("../connexion.php");
//recuperer le code de la region   
$sql=$bdd->query("SELECT * FROM wilaya WHERE wilaya='$wilaya'");
while($resultat=$sql->fetch()){
	$idw=$resultat["id"];
//requette de recuperation des données
//AND idwilaya='$idw' 
/*$sql=mysql_query("SELECT * FROM entreprise WHERE nom LIKE '%$search%' OR raisonsocial LIKE '%$search%' OR description LIKE '%$search%' AND idwilaya='$idw'");*/

$sql=$bdd->query("SELECT count(*) FROM entreprise WHERE nom LIKE '%$search%' OR raisonsocial LIKE '%$search%' OR description LIKE '%$search%'");



  //verification de la recherche
  $nb_resultats=$sql->fetchColumn();
  if($nb_resultats!=0)
  {
	  

     //affichage des resultats de la recherche
      while($resultat=$sql->fetch())
	     {
		  echo '<h2>Nom  :'.$resultat["nom"].'</h2>';
		  echo '<p><h3>Description:  '.$resultat["description"].'</h3></p>';
		  echo '<p><h3>Adresse:  '.$resultat["adresse"].'</h3></p>';
		  echo '<p><h3>Lien:  '.$resultat["lien"].'</h3></p>';
		  echo '<p><h3>Email:  '.$resultat["email"].'</h3></p>';
		  echo '<p><h3>Telephone:  '.$resultat["Tel"].'</h3></p>';
		  echo '<p><h3>Mobile:  '.$resultat["mobile"].'</h3></p>';
		  echo '<p><h3>Fax: '.$resultat["Fax"].'</h3></p>';
		  }
  }//fin du if
  else{
	 echo'nous n\'avons pas pu trouver de resultats pour votre recherche!';
	  }//fin du else "sinon"
}
} 

?>
    <!-- fin .content -->
    </div>
    
  <div class="profooter">
    <table width="960"> 
	<tr>
	
	<td width="240">
	<ul>
	<ul id="footmenu">
	<li><a href="index.php">accueil</a></li>
	<li><a href="http://www.infotoolssolutions.com">qui sommes nous?</a></li>
	<li><a href="service.php">service client</a></li>
	<li><a href="contact.php">nous contacter</a></li>
	<li><a href="http://www.infotoolssolutions.com">informations juridiques</a></li>
	</td>
	<td width="240">
	
	</td>
	<td width="240">
		
	</td>
	<td width="240">
	<div id="letter">
	<?php
    //verifier si il existe des valeurs dans le champ de l'email!!
	if(isset ($_POST["letter"]) && ($_POST["letter"]!=NULL))
	{
	$letter=$_POST["letter"];
	//introduire l'email a la base de données
	$sql="INSERT INTO `its`.`email` (`id`, `email`) VALUES (NULL, '$letter');"; 
	
    $sql->query(); 
	//message de confirmation
	echo'<strong><br>Votre adresse E-mail à été enregistré <br>avec succes!</strong>';
	}
    else{
   ?>
	Abonnez-vous à notre newsletter<br/><br/>
    <form name="input" action="" method="POST">
    <input type="text" name="letter" class="email">
    <input type="submit" name="button" id="button" class="okbut" value="OK" />
    </form>
	<?php
   }
   ?>	
	</div>
	</td>
	</tr> 
	</table>
    <p></p>
    <!-- fin .profooter -->
    </div>
   
   <div class="footer">
    <p><center><a href="http://www.infotoolssolutions.com" target="blank">Info Tools Solutions, Tous droits réservés © 2014</center></p>
    <!-- end .footer -->
  </div>
  <!-- end .container -->
</div>
</body>
</html>


<?php
}
?>