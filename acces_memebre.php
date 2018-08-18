

<?php
// ouvrir une session
session_start();
//etablir la connexion a la base de données
include("connexion.php");
?>

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
<a href="">Annonces</a>
<a href="">Acces membres</a>
<a href="inscription.php">S'inscrire</a>
</div>



  <div class="header">
  
  </div>
 <!-- <div class="horbar">
    <?php
    //affichage des secteurs "Categories" d'activités 
    //include("cat.php");
   ?>
    <p></p>
   </div>-->
  <div class="content">
    <h1>Acces membre</h1>
    <form id="form1" name="form1" method="post" action="acces_memebre.php">
   <?php
  // appeller le meme page avec php_self
    //echo $_SERVER["PHP_SELF"]; 
	?> 
<center>
<div id="civ">
<?php
//zeeeeeeeee script !!!!
//verification des champs du formulaire !!

if(isset ($_POST["email"]) and isset($_POST["mdp"]))
{
	//recuperation des données saisies par l'utilisateur
	$email=$_POST["email"];
	$mdp=$_POST["mdp"];
	

//requete pour verifier l'existance de l'identifiant et du mot de passe introduits
	$sql=$bdd->query("SELECT * FROM users WHERE email='$email' AND mdp='$mdp'");

//mysql_query($sql); 

   while($resultat=$sql->fetch()){
			
			$_SESSION['email']=$email;
			$_SESSION['mdp']=$mdp;
			$_SESSION['nom']=$resultat['nom'];
			$_SESSION['prenom']=$resultat['prenom'];
			$id=$resultat['id'];
			$_SESSION['idtype']=$resultat['idtype'];
			$Date=date("y-m-d");
			
			 //recuperer le nombre de visites de l'utilisateur
	   $sql=$bdd->query("SELECT * FROM user_compteur WHERE id_user='$id'");
	   while($resultat=$sql->fetch())
	   {
	   $id_user=$resultat["id_user"];
	   $n_visite=$resultat["n_visite"];
	   $n_visite=$n_visite+1;
	      }
	   $sql = "UPDATE `its`.`user_compteur` SET `n_visite` = '$n_visite' WHERE `user_compteur`.`id_user` = '$id_user';";
	   $bdd->query($sql);
			//rederiction du membre selon son type de compte administrateur vers le compte admin utilisateur vers le compte utilisateur
			if($_SESSION['idtype']==1)
			{
			header("Location:its_adm/index.php");exit;
			}
			else{
			 header("Location:its_users/index.php");exit;
			 }
			}
}//fin du if isset..
else{
?>
<?php
echo ' ';
}
?>
   </div>
   <div id="civ">
<table width="600" border="0">
  <tr>
    <td>Email:</td>
    <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>Mot de passe:</td>
    <td><label for="mdp"></label>
      <input type="password" name="mdp" id="mdp" /></td>
  </tr>
   </table>
   </div>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="CONNEXION" /></td>
  </tr>
</table>
</center>
</form>

    <p></p>
    <h3></h3>
    <p></p>
    <p> </p>
    <p></p>
    <h4></h4>
    <p></p>
    <!-- end .content --></div>
  <div class="footer">
    <p>Powred by Info Tools Solutions 2018</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
