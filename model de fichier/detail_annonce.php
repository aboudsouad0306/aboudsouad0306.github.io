<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
   
  </div>
<ul id="lien">
 <li>
   <a href="inscription.php">>Inscription</a>
   </li>
  
   <li>
   <a href="lostmdp.php">>Mot de passe oublié?</a>
   </li>
  
   </ul> 
</div>
<div class="container">

  <div class="navigation">

  <a href="index.php" class="nav">Accueil</a>
  <a href="annuaire.php" class="nav">Annuaire</a>
  <a href="annonces.php" class="nav">Petites annonces</a>
  <a href="actualite.php" class="nav">Actualités</a>
  <a href="inscription.php" class="nav">Inscription</a>

</div>

  <div class="header">
  <img src="imgs/logo_web.png" width="300" height="177" class="logo"/>
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
 
   
 <div class="content">
 
 
 <h2>Detail de l'Annonce</h2>
 <?php
  include("modules/det_annonce.php");
   ?>
    
 <!-- fin .content -->
    </div>
<div class="plus">
	<h5>Annonces dans le meme genre!</h5>
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

  include("../connexion.php");

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
