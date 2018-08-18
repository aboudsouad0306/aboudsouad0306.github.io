<?php
//etablir la connexion a la base de données
include("../its_adm/connexion.php");
?>
<?php
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
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="css/boutons.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="top">

<!--<td>-->
<img src="imgs/mini-logo.png" />
<!--</td>-->

     <div id="acces">
     <form id="form1" name="form1" method="post" action="acces_memebre.php">
     <br/><br/>
      Email:<input type="text" name="email" id="email" />
     Mot de passe:<input type="password" name="mdp" id="mdp" />
     <input type="submit" name="button" id="button" value="GO!" />
     </form>
   <br/> <!--petit saut de ligne --> 
      <ul id="lien">
      <li><a href="inscription.php">>Inscription</a></li>
      <li><a href="lostmdp.php">>Mot de passe oublié?</a></li>
      </ul> 
   
     </div><!-- fin de la div acces-->

</div>

<div class="navigation">

  <a href="index.php" class="nav">Accueil</a>
  <a href="annuaire.php" class="nav">Annuaire</a>
  <a href="annonces.php" class="nav">Petites annonces</a>
  <a href="actualite.php" class="nav">Actualités</a>
  <a href="inscription.php" class="nav">Inscription</a>

</div>
<div class="container">

  <div class="header">
 
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
    <?php
	//cette portion de code va nous permettre de recuperer la liste des wilayas algeriennes lol!
	include("wiliste.php");
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
	<img src="imgs/ajouter.jpg" width="270" height="360"/>
    <a href="ajouter.php" class="adbtn">AJOUTER VOTRE ENTREPRISE!</a>
	<!--zone pour la news letter-->
	<br/>
	</center>
</div>
<div class="horbar">

  <div id="head">Resultats de votre recherche</div>
    
   </div>
 <div class="content">
    <?php
if(isset($_POST["search"]) and isset($_POST["wilaya"]))
{
$search=htmlspecialchars($_POST["search"]);
$search=addslashes($search);
$wilaya=$_POST["wilaya"];

//etablir la connexion a la base de données
include("../its_adm/connexion.php");
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
		  echo '<h3>'.$resultat["nom"].'</h3>';
		  echo '<p>'.$resultat["description"].'</p>';
		  echo '<p>'.$resultat["adresse"].'</p>';
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
	
	<td width="320">
	<ul>
	<ul id="footmenu">
	<li><a href="#">accueil</a></li>
	<li><a href="#">qui sommes nous?</a></li>
	<li><a href="#">service client</a></li>
	<li><a href="#">nous contacter</a></li>
	<li><a href="#">informations juridiques</a></li>
	</td>
	<td>
		
	</td>
	<td width="320">
	<div id="letter">
	<?php
    //verifier si il existe des valeurs dans le champ de l'email!!
	if(isset ($_POST["email"]) && ($_POST["email"]!=NULL))
	{
	$email=$_POST["email"];
	//introduire l'email a la base de données
	$sql="INSERT INTO `its`.`email` (`id`, `email`) VALUES (NULL, '$email');"; 
	
    $sql->query(); 
	//message de confirmation
	echo'Votre adresse E-mail a été enregistrer avec succes!';
	}
    else{
   ?>
	Abonnez-vous à notre newsletter<br/><br/>
    <form name="input" action="" method="POST">
    <input type="text" name="email" class="email">
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
    <p>Powred by Info Tools Solutions 2013</p>
    <!-- end .footer -->
  </div>
  <!-- end .container -->
</div>
</body>
</html>


<?php
}
?>