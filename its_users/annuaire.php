<?php
// OUVERTURE DE SESSION
include("session.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Finddz-annuaire</title>
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

    <div class="home">


 <!--fin de la div home-->     
</div>
 <div class="content">
 <div class="horbar">
  
  <h1>Effectuer votre recherche:<h1/>

  <a href="rpsa.php" class="btn">Par secteurs d'activité<br/>
  <img src="../imgs/sec.png"/>
  </a>
  <a href="rplg.php" class="btn">Par localisation géographique
  <br/>
  <img src="../imgs/geo.png"/>
  </a>
  <a href="rpra.php" class="btn">Recherche avancée
  <br/>
  <img src="../imgs/ad_srch.png"/>
  </a>
  
    <?php
    //afficher les different secteur d'activités!!
    //include("cat.php");
   ?>
    <p></p>
   </div>
   

   <div>
 <h1><font color="#fdgggg"> Liste des Entreprises:</font><h1/>  
 <hr>
     <?php

include("../connexion.php");

echo '<br/>';echo '<br/>';

//recuperer les données!!

$sql=$bdd->query("SELECT * FROM entreprise");

// afficher les resultats de la requette 

while($resultat=$sql->fetch())
{

	
	echo '<h4><font size="4">'.$resultat["nom"].'</font></h4>';

	echo '<table  border="1">';
	echo '<tr>';
    echo '<th>Raison Social</th>';
    echo '<th>Adresse</th>';
    echo '<th>Tel</th>';
	echo '<th>Fax</th>';
	echo '<th>Email</th>';
	echo '<th>Lien</th>';
    echo '</tr>';
	echo '<tr>';
	echo '<td>'.$resultat["raisonsocial"].'</td>';	
	echo '<td>'.$resultat["adresse"].'</td>';
	echo '<td>'.$resultat["Tel"].'</td>';
	echo '<td>'.$resultat["Fax"].'</td>';
	echo '<td>'.$resultat["email"].'</td>';
	echo '<td><a href="'.$resultat["lien"].'" target="_blank">'.$resultat["lien"].'</a></td>';
	echo '</tr>';
	echo '</table><br>';
	echo'<div id"mail">
	<a class="nav" href="mailto:'.$resultat["email"].'">
	Contacter par un message
	</a>
	</div>'; 
	echo'<hr>';
	}	

?>
   
   
   </div>
   
   
   
 
<!-- fin .content -->
</div>
    
  <div class="profooter">
    <table width="960"> 
	<tr>
	
	<td width="240">
	<ul>
	<ul id="footmenu">
	<li><a href="#">accueil</a></li>
	<li><a href="#">qui sommes nous?</a></li>
	<li><a href="#">service client</a></li>
	<li><a href="#">nous contacter</a></li>
	<li><a href="#">informations juridiques</a></li>
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
   
<?php include("footer.php");?>
  <!-- end .container -->
</div>
</body>
</html>
