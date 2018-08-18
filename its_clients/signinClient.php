<!DOCTYPE html>
<html>
<head>
	<title>Sign in client</title>
	 <meta charset="utf-8">
     <title>finddz resirvation </title>
     <meta name="viewport" content="width=device-width , initial-scale=1">

    <!--  css  -->
     
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/loginC.css">
 	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 


<style type="text/css">


</style>	
</head>


<body>
<dir class="backgroundimg">
		<div class="container-fluid">
		
				<div class="loginbox">
					<img src="../imgs/hocine.png" class="avatar">
						
							<form id="form1" name="form" method="post" action="">
							<div class="form-group">
							 <label id="label1"> Adresse mail  </label> <br>
							
							<input type="email" name="email" id="email" placeholder="example@gmail.com" required=""> 
							
							</div>

							<dir class="form-group">
								<label id="label2"> mot de passe  </label>
								<input type="password" name="password" id="password" placeholder="********" required="">
							</dir>
							
							<div>
							
								<input type="submit" name="" id="submit" value="Se connecter" >	
							
							</div>
							<br>
								
	
							<?php 
							session_start();
							include("../connexion.php");

							if (isset($_POST["email"]) and isset($_POST["password"])) {
								
								//recupiration des données saisiées par l'utilisateur 
								$email=$_POST["email"];
								$password=$_POST["password"];

							$sql=$bdd->query("SELECT* FROM clients WHERE email='$email' and mdp='$password'");

							if ($sql->fetch()) {

								//echo "access autorisé";
								
								header("Location : resirvation.php");
								exit;
									
							}else {

								echo "<center style='color:red;'> Vérifier votre mail et mot de passe , <br> Ou bien vous n'avez pas de compte </center> <br>";
							}

							}



							 ?>
							 <br>  
							<center><a href="#">Mot de passe oublié ?</a> </center>

							</form>
							<br>  
							<center><a href="inscriptionClt.php">Créer un compte</a></center>
							<!--form id="form2">
						
								<input type="submit" class="inputButton" value="S'inscrire" onclick="document.location.href='inscriptionClt.php'">
							
							
							</form-->
				</div>
		
	</div>
</dir>
	


</body>
</html>