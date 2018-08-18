<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Finddz-accueil</title>
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
      <li><a href="inscription.php" >   >  Inscription</a></li>
      <li><a href="lostmdp.php">    >   Mot de passe oublié?</a></li>
      </ul> 

   
     </div><!-- fin de la div acces-->

</div>

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
	
	include("modules/slogan.php");
	
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
  


<!-- debut .content -->

<div class="content">
	<!-- debut .add -->
<div class="add">
   <center>
	<img src="imgs/ajouter.jpg" width="270" height="360"/>
    <!--<a href="ajouter.php" class="adbtn">AJOUTER VOTRE ENTREPRISE!</a>-->
	<!--zone pour la news letter-->
	<br/>
	</center>
	
</div>
<div class="last_entin">
<br>
<h2>Bienvenus chez FindDz!</h2><br>
FindDz, est l’un des  premiers véritable annuaire des entreprises algériennes 
doté d’un puissant moteur de recherche destiné aux professionnels et au grand public.</br>
Inscrire et compléter dès aujourd’hui la fiche de votre entreprise, c’est s’assurer 
une présence optimisée sur l’Internet. </br>
FindDz organise et classe d'autres sites selon leur thématique (informatique, automobile, bio etc.) afin 
d'aider les internautes pour leurs recherches de sites sur le web.
<br>
</div>
</div>
<!-- fin .content -->
<div class="home">
<?php
//connexion a la base de donnée
include ("connexion.php");


//recuperer les dernieres actualités + affichage

$sql=$bdd->query("SELECT * FROM actualite ORDER BY date LIMIT 1");
//affichage
while($resultat=$sql->fetch())
{
?>
 <div id="zonea">
 <h3>Actualités</h3>
 <p>
 <?php echo '<strong>'.$resultat["titre"].'</strong></br>'; ?>
 <?php echo $resultat["contenu"].'<br/>'; ?>
 <a href="actualite.php" class="suite">+ lire la suite</a>
 </p>
 </div>
<?php
}
?>

<?php
//recuperer les dernieres actualités + affichage
$sql=$bdd->query("SELECT * FROM annonce ORDER BY date LIMIT 1");
//affichage
while($resultat=$sql->fetch())
{
?>
 <div id="zoneb">
 <h3>Nos annonces</h3>
 <p>
 <?php echo '<strong>'.$resultat["titre"].'</strong></br>'; ?>
 <?php echo $resultat["contenu"].'<br/>'; ?>
 <a href="actualite.php" class="suite">+ lire la suite</a>
 </p>
 </div>
<?php
}
?>
  <div id="zonec">
   <h3>Autres!!</h3>
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam Identifiant libero sem. Aenean Pellentesque faucibus augue,     id euismod elit vestibulum UE. Ut nec justo felis.
     Phasellus eu Velit nec ante auctor Mattis.
  <br/>
 <a href="actualite.php" class="suite">+ lire la suite</a>
 </p>
  </div>
 <!-- section pour les nouvelles entreprises qui viennent de rejoindre l'annuaire!!-->
	<div class="last_ent">
	<h3>Ils ont rejoint finddz</h3>
	<?php
	include("modules/last_ent_joint.php");
   ?>
   </div> 
 <!--fin de la div home-->     
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
	
    $bdd->query($sql); 
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
    <p><center><a href="http://www.infotoolssolutions.com" target="blank">Info Tools Solutions, Tous droits réservés © 2018</center></p>
    <!-- end .footer -->
  </div>
  <!-- end .container -->
</div>
</body>
</html>
