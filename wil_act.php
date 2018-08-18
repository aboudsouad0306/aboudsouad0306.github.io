<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Finddz-annonces</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="css/boutons.css" rel="stylesheet" type="text/css" />
<link href="css/annonce.css" rel="stylesheet" type="text/css" />


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
<table> 
<tr> 
<td> 
 <div class="wliste">
 <h2>Entreprises par region</h2>

 <?php
 include("modules/wilaya.php");
   ?>
 <?php
 //echo '<h2>ils ont rejoint Finddz recement</h2>';
  //include("modules/cat_annonce.php");
   ?>
 <!-- fin .content -->
    </div>
</td> 
<td> 
	<div class="carte">
    <h2>carte interactive</h2>

 <img src="imgs/carte_dz.png" width="500"/>
 <!-- fin .content -->
    </div>
</td> 
</tr> 
 </table>    
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
	<td>
		
	</td>
	<td width="320">
	<div id="letter">
	<?php

  //etablir la connexion a la base de données

  include("connexion.php");

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
