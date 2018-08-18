<?php
// ouvrir une session
session_start();
//etablir la connexion a la base de données
include("connexion.php");
?>

<!-- **********************************************-->

<html>
	<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Finddz Administrateur</title>
  <link rel="stylesheet" href="css/ad_style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <form method="post" action="acces_admin.php" class="login">
    <p>
      <label for="login">Email:</label>
      <input type="text" name="email" id="email" value="mail@exemple.com">
    </p>

    <p>
      <label for="password">Mdp:</label>
      <input type="password" name="mdp" id="mdp" value="4815162342">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

    <p class="forgot-password"><a href="#">Mot de passe oublié ?</a></p>
  </form>

  
</body>


</html>
<?php
//zeeeeeeeee script !!!! acces administrateur
//verification des champs du formulaire !!

if(isset ($_POST["email"]) and isset($_POST["mdp"]))
{
	//recuperation des données saisies par l'utilisateur
	$email=$_POST["email"];
	$mdp=$_POST["mdp"];
	

//requete pour verifier l'existance de l'identifiant et du mot de passe introduits
	$sql=$bdd->query("SELECT * FROM users WHERE email=\'$email\' AND mdp=\'$mdp\'");
 

   while($resultat=$sql
   	->fetch()){
			
			$_SESSION['email']=$email;
			$_SESSION['mdp']=$mdp;
			$_SESSION['nom']=$resultat['nom'];
			$_SESSION['prenom']=$resultat['prenom'];
			$id=$resultat['id'];
			$_SESSION['idtype']=$resultat['idtype'];
			$Date=date("y-m-d");
			
			 //recuperer le nombre de visires de l'utilisateur
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
			
			header("Location:its_adm/index.php");exit;
			
			}
}//fin du if isset..
else{
?>
<?php
echo ' ';
}
?>