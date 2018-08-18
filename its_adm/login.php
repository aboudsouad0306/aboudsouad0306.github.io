

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="ISO 8859-1">
	<title>connexion_Finddz</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
			<a href="../index.php" class="round button dark ic-left-arrow image-left ">Vers le site</a>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Connexio à l'espace administrateur</h1>
				<h5>Veuillez saisir vos informations de connexion!</h5>
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="../index.php" id="company-branding" class="fr"><img src="images/mini-logo.png" alt="Finddz.com" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="../acces_memebre.php" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">Votre E-mail</label>
					<input type="text" name="email" id="login-username" class="round full-width-input" autofocus />
				</p>

				<p>
					<label for="login-password">votre Mot de passe</label>
					<input type="password" name="mdp" id="login-password" class="round full-width-input" />
				</p>
				
				<p><a href="#">Mot de passe oublié ?</a></p>
				
				<input type="submit" name="button" id="button" value="CONNEXION" class="button round blue image-right ic-right-arrow"/>

			</fieldset>


		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2013 <a href="HTTP//:www.infotoolssolutions.dz">Info tools solutions</a>. Tous droits réservés.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>