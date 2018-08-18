<?php
//etablir la connexion a la base de données
include("connexion.php");
//zeeeeeeeee script !!!!
//verification des champs du formulaire !!

if(isset ($_POST["civilite"]) and isset($_POST["nom"]) and isset($_POST["service"]) and isset($_POST["societe"]) and isset($_POST["email"]) and isset($_POST["sujet"]) and isset($_POST["message"]))
{
	//recuperation des données saisies par l'utilisateur
	$civilite=$_POST["civilite"];
	$nom=$_POST["nom"];
	$service=$_POST["service"];
	$societe=$_POST["societe"];
	$email=$_POST["email"];
	$sujet=$_POST["sujet"];
	$message=$_POST["message"];	
	
	// fin de recolte....**

//insertion des données récoltés dans la bse de données !!

$sql = "INSERT INTO `its`.`contact` (`id`, `civilite`, `nom`, `societe`,`service` , `email`, `sujet`, `message`)
VALUES (NULL, '$civilite', '$nom' ,'$societe', '$service', '$email', '$sujet', '$message');"; 
$bdd->query($sql); 
//recuperer l'identifiant du nouveau utilisateur
/*$sql=mysql_query("SELECT * FROM users WHERE email='$email'");
while($resultat=mysql_fetch_array($sql))
{
$id=$resultat["id"];	
}	
// creer un compteur personnel pour le nouveau membre
$id_user=$id;
$n_visite=0;
$sql2 = "INSERT INTO `its`.`user_compteur` (`id`, `id_user`, `n_visite`)
VALUES (NULL, '$id_user', '$n_visite');"; 

///  mysql_query($sql); */

echo'Félicitations!! Votre message est bien été envoyé, nous vous répondrons dans les meilleurs délais <a href="index.php"> >>>> Retour à la page d accueil</a>';



}
else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; ISO 8859-1" />
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
  <div class="hour">
    </div>
  <center>
	<img src="imgs/ajouter.jpg" width="270" height="360"/>
    
	<!--zone pour la news letter-->
	<br/>
	</center>
	<!-- section pour les nouvelles entreprises qui viennent de rejoindre l'annuaire!!-->
	<div class="last_ent">
	<h3>Ils ont rejoint finddz</h3>
	<?php
	include("modules/last_ent_joint.php");
   ?>
   </div>
</div>

 <div class="content">
 
	 <div id="middle-result">

<div class="last_entin">
<br>
Si vous souhaitez nous contacter pour une question, suggestion ou tout autre sujet, utilisez ce 
formulaire de contact, nous vous répondrons dans les plus brefs délais.</br>
   <br>
   </div>

  
<br>
  <form id="form1" name="form1" method="POST" action="contact.php"> 
    <table class="form">
   <tbody>
     
 <tr> <td height="24">&nbsp;&nbsp;</td>
      <td><p> Civilité :<font color="#FF0000">*</font></p></td>
    <td>
      Mr
      <input type="radio" name="civilite" id="radio" value="" />
     Mlle
    
      <input type="radio" name="civilite" id="radio" value="" />
       Mme

      <input type="radio" name="civilite" id="radio" value="" />
     </td>
       <br>
  </tr>
   
    <tr>
      <td height="24">&nbsp;&nbsp;</td>
      <td><p> Nom :<font color="#FF0000">*</font></p></td>
      <td><input id="nom" name="nom" class="contact_champ" type="text"></td>
    </tr>
    <tr>
      <td height="24">&nbsp;&nbsp;</td>
      <td><p> Société :</p></td>
      <td><input class="contact_champ" id="societe" name="societe" type="text"></td>
     </tr>
    <tr>
                <td height="26">&nbsp;</td>
<td><p> Service :<font color="#FF0000">*</font></p></td>
                <td><select id="service" name="service" class="contact_champ"><option value="Service Général" selected="selected">Service Général</option>
                <option value="Service Technique">Service Technique</option>
                <option value="Service Commercial">Service Commercial</option>
                <option value="Manager">Manager</option>
                </select></td>
     </tr>
     <tr>
     <td height="25">&nbsp;&nbsp;</td>
      <td><p> Email :<font color="#FF0000">*</font></p></td>
      <td><input class="contact_champ" name="email" id="email" type="text"></td>
     </tr> 
      <tr>
      <td height="28">&nbsp;&nbsp;</td>
      <td><p> Sujet :<font color="#FF0000">*</font></p></td>
      <td><input class="contact_champ" name="sujet" id="sujet" type="text"></td>
     </tr>
     <tr>
     <td>&nbsp;&nbsp;</td>
      <td valign="top" width="100px"> <p> Message :<font color="#FF0000">*</font> </p> </td>
    
      <td><textarea class="contact_textarea" rows="10" cols="50" name="message" id="message"></textarea></td>
    </tr>
 <tr>
 <td>&nbsp;&nbsp;</td>
 <td height="52" align="center"> </td>

    <td><input type="submit" name="button" id="button" value="Envoyer" />
    <input type="reset" name="button2" id="button2" value="Réinitialiser" /></td>
	
 </tr>

    </tbody></table>
  </form>

</div>
 
     
 	
	
	
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