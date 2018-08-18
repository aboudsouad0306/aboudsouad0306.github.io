<?php
// OUVERTURE DE SESSION
include("session.php");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finddz-accueil</title>
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
  <div class="hour">
  <?php
    /*afficher la date et l'heure courante!!
  $date_du_jour = date ("d-m-Y");
  $heure_courante = date ("H:i");
   echo 'Nous sommes le : ';
   echo $date_du_jour;
   echo ' Et il est : ';
   echo $heure_courante;*/
   ?>
  </div>
  
   <!-- section pour les nouvelles entreprises qui viennent de rejoindre l'annuaire!!-->
  <div class="last_ent">
	<h3>Ils ont rejoint finddz</h3>
	<?php
	include("modules/last_ent_joint.php");
    ?>
  </div>
  
  <center>
	<img src="../imgs/ajouter.jpg" width="270" height="360"/>
    <!--<a href="ajouter.php" class="adbtn">AJOUTER VOTRE ENTREPRISE!</a>-->
	<!--zone pour la news letter-->
	<br/>
	</center>
</div>

 
 <div class="content">
  <table width="600" border="0"> 
 <tr><td><img src="../imgs/warning.png"></td>
 <td>
 <p id="warning"> Veuillez indiquer vos coordonnées exactes, notre équipe va vous contacter afin de valider l'inscription
 de votre entreprise dans l'annuaire FINDDZ, merci.</p></td>
 </tr>
 </table>
 <h1>Inscrivez votre entreprise maintenait</h1>
 
  <form id="form1" name="form1" method="post" action="valider.php">  
<center>
<div id="civ">
<table width="400" border="0">
 </table>
   </div>
   <div id="civ">
<table width="450" border="0">
  <tr>
    <td>Nom de l'entreprise <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" /></td>
  </tr>
   <tr>
    <td>Raison Social <strong> &nbsp;</strong></td>
    <td><label for="rs"></label>
      <select name="rs" id="rs">
	  <option>Sélectionner </option>
	  <option>EURL </option>
	  <option>SARL</option>
	  <option>SNC </option>
	  <option>Autre </option>
      </select></td>
  </tr>
  <tr>
    <td>Adresse <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="adresse"></label>
      <input type="text" name="adresse" id="adresse" /></td>
  </tr>
    <tr>
 
     <td>Description <strong> &nbsp;</strong></td>
     <td><label for="description"></label><textarea name="description" id="description" cols="45" rows="5"></textarea></td>
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
    <td valign="top">Tel <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="tel"></label><input type="text" name="tel" id="tel" /></td>
  </tr>
    <tr>
    <td valign="top">Fax <strong>&nbsp;</strong></td>
    <td><label for="fax"></label><input type="text" name="fax" id="fax" /></td>
   </tr>
  <tr>
    <td valign="top">Mobile <strong> &nbsp;</strong></td>
    <td><label for="mobile"></label><input type="text" name="mobile" id="mobile" /></td>
  </tr>

       <tr>
    <td>Domaine d'activité <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="activite"></label>
      <select name="activite" id="activite">
      <option>Sélectionnez une activité /domaine/profession......</option>
      <option> ADMINISTRATIONS</option>
      <option> AGRICULTURE-ELEVAGE</option>
    <option>AGRO INDUSTRIES</option>
    <option>AMBASSADES -ORGANISATIONS INTERNATIONALES</option>
    <option>AMEUBLEMENT</option>
    <option>ASSOCIATIONS DIVERSES</option>
    <option>ASSURANCES-REASSURANCES ET MUTUELLES</option>
    <option>AUTOMOBILE</option>
    <option>BET (Bureau d'Etude Technique)</option>
    <option>BOIS LIEGES ET DERIVES</option>
      <option>BTP (Bàtiment et Travaux Publics)</option>
    <option>CELLULOSE - PAPIER - CARTON</option>
    <option>CHIMIE-PETROCHIMIE</option>
    <option>COMMERCE-DISTRIBUTION-NEGOCE</option>
    <option>COMMUNICATION MEDIAS</option>
    <option>COSMETIQUES-PARFUMERIE</option>
    <option>CUIR-CHAUSSURES-MAROQUINERIE</option>
    <option>EDITION-IMPRIMERIE-SERIGRAPHIE</option>
    <option>EDUCATION-FORMATION</option>
    <option>ELECTRICITE-ELECTRONIQUE-TELECOMMUNICATION</option>
    <option>EQUIPEMENTS INDUSTRIELS</option>
    <option>EQUIPEMENTS POUR LES COLLECTIVITES</option>
    <option>ETABLISSEMENTS FINANCIERS ET BANCAIRES</option>
    <option>HYDRAULIQUE</option>
    <option>IMMOBILIER</option>
    <option>INDUSTRIES DIVERSES</option>
      <option>INFORMATIQUE-BUREAUTIQUE</option>
    <option>MATERIAUX DE CONSTRUCTION</option>
    <option>MECANIQUE</option>
    <option>MEDICAL-PARAMEDICAL</option>
      </select>
   </td>
  </tr>



	 
	 
      </select>
   </td>
  </tr>
  <tr>
     <td>Lien (http://)<strong> &nbsp;</strong></td>
     <td><label for="lien"></label>
     <input type="text" name="lien" id="lien" /></td>
  </tr>
  <tr>
     <td>E-mail <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
     <td><label for="email"></label>
     <input type="text" name="email" id="email" /></td>
  </tr>
  
  
   </table>
   </div>

   <div id="civ">
<table width="450" border="0">
  
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
