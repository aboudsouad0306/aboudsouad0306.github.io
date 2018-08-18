<?php
//etablir la connexion a la base de données
include("connexion.php");
//zeeeeeeeee script !!!!
//verification des champs du formulaire !!

if(isset($_POST["email"]))
{

	$email=$_POST["email"];

	$sql="INSERT INTO `its`.`mdplost` (`id`, `email_perdu`) VALUES (NULL, '$email');"; 	
    $sql->query(); 
echo'Félicitations!! Votre message est bien reçu nous vous contactons dans les meilleurs délais<a href="index.php"> >>>> Retour à la page d accueil</a>';
}
else{
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="ISO 8859-1">
	<title>connexion_Finddz</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="its_adm/css/style.css">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1> Eespace Membre:</h1>
				<h5>Veuillez saisir vos informations de connexion pour vous envoyer votre mot de passe oublié!</h5>
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="index.php" id="company-branding" class="fr"><img src="its_adm/images/mini-logo.png" alt="Finddz.com" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="lostmdp.php" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">Votre E-mail</label>
					<input type="text" name="email" id="login-username" class="round full-width-input" autofocus />
				</p>

				
				<input type="submit" name="button" id="button" value="ENVOYER" class="button round blue image-right ic-right-arrow"/>

			</fieldset>


		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2018 <a href="http//:www.infotoolssolutions.dz">Info tools solutions</a>. Tous droits réservés.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>
<?php
}
?>