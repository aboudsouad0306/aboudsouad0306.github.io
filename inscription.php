<?php
//etablir la connexion a la base de données
include("connexion.php");
?>
<?php
//zeeeeeeeee script !!!!
//verification des champs du formulaire !!

if(isset ($_POST["civilite"]) and isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["email"]) and  isset($_POST["adresse"]) and isset($_POST["region"]) and  isset($_POST["mdp"]) and isset($_POST["confirme"]))
  {
 if( $_POST["mdp"]=$_POST["confirme"]){
	//recuperation des données saisies par l'utilisateur
	$civilite=$_POST["civilite"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$email=$_POST["email"];	
	$adresse=$_POST["adresse"];
	$region=$_POST["region"];
	$mdp=$_POST["mdp"];
	// fin de recolte....**
	
	$type="entreprise";
	
	//recuperation de l'id type
	$sql=$bdd->query("SELECT * FROM users_type WHERE type='$type'");
	while($resultat=$sql->fetch())
	{
		$idtype=$resultat["id"];
		}
		
	//recuperation de l'id region "wilaya" 
	$sql1=$bdd->query("SELECT * FROM wilaya WHERE wilaya='$region'");
	while($resultat1=$sql1->fetch())
	{
		$idwilaya=$resultat1["id"];
		}


//insertion des données récoltés dans la bse de données !!

$sql2 = "INSERT INTO `its`.`users` (`id`, `civilite`, `nom`, `prenom` , `adresse`, `email`, `mdp`, `idtype`, `idwilaya`)
VALUES (NULL, '$civilite', '$nom', '$prenom', '$adresse',  '$email' ,  '$mdp' , '$idtype', '$idwilaya');"; 
$bdd->query($sql2); 
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

echo'<a href="acces_memebre.php">Félicitations vous êtes inscrit sur Find.dz, Connectez-vous maintenant !!</a>';
}
else{
echo'Les mots de passes que vous avez saisis ne sont pas identiques';
}
}
else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
  
  <div class="add">
  <center>
	<img src="imgs/ajouter.jpg" width="270" height="360"/>
    
	<!--zone pour la news letter-->
	<br/>
	</center>
</div>

 <div class="content">
    <h1>Devenir membre de Find.dz</h1>
    <form id="form1" name="form1" method="post" action="">
    
<center>
<div id="civ">
<table width="400" border="0">
 
  <tr>
    <td>Civilité <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td>
      Mlle
      <input type="radio" name="civilite" id="radio" value="1" />
      Mme
    
      <input type="radio" name="civilite" id="radio" value="2" />
      Mr

      <input type="radio" name="civilite" id="radio" value="3" />
     </td>
       
  </tr>
  
  </table>
   </div>
   <div id="civ">
<table width="450" border="0">
  <tr>
    <td>Nom <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" /></td>
  </tr>
  <tr>
    <td>Prénom <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="prenom"></label>
      <input type="text" name="prenom" id="prenom" /></td>
  </tr>
  <tr>
 
     <td>E-mail <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
     <td><label for="email"></label>
     <input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>Activité <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="activite"></label>
      <select name="activite" id="activite">
	  <option>Sélectionnez une activité /domaine/profession......</option>
       <?php
	  //recuperer la liste des wilaya "Regions" a partir de la base de données
	  $sql=$bdd->query("SELECT * FROM activité ORDER BY id");   //j ai supprimer MYSQL_USE_RESULT
	  //afficher les resultats de notre requette
                                                

	  while($resultat=$sql->fetch())
	  {
		  //affichage
		  echo '<option>'.$resultat["nom"].'</option>';
	  }
  

	  ?>
      </select></td>
  </tr>
  
  
  
   </table>
   </div>

   <div id="civ">
<table width="450" border="0">
  <tr>
    <td valign="top">Adresse <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="adresse"></label>
      <textarea name="adresse" id="adresse" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Wilaya <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="region"></label>
      <select name="region" id="region">
	  <option>Tout </option>
       <?php
	  //recuperer la liste des wilaya "Regions" a partir de la base de données
	  $sql=$bdd->query("SELECT * FROM wilaya ORDER BY id");
	  //afficher les resultats de notre requette
	  while($resultat=$sql->fetch())
	  {
		  //affichage
		  echo '<option>'.$resultat["wilaya"].'</option>';
	}
	  ?>
      </select></td>
  </tr>
  
  <tr>
    <td>Mot de Passe <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong> </td>
    <td><label for="mdp"></label>
      <input type="password" name="mdp" id="mdp" /></td>
  </tr>
  <tr>
    <td>Confirmez <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="confirme"></label>
      <input type="password" name="confirme" id="confirme" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Envoyer" />
      <input type="reset" name="button2" id="button2" value="Réinitialiser" /></td>
  </tr>
  </table>
  </div>
  
</table>
</center>
</form>
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


<?php
}
?>