<?php	

$bdd 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign in client</title>
	 <meta charset="utf-8">
     <title>finddz resirvation </title>
     <meta name="viewport" content="width=device-width , initial-scale=1">

    <!--  css  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/loginC.css">
 	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 


<style type="text/css">


</style>	
</head>


<body>
<dir class="backgroundimg">
		<div class="container-fluid">
		
				<div class="signonbox">
					<img src="../imgs/hocine.png" class="avatar"> <br> 
						
							<form id="form" name="form" method="post" action="resirvation.php">
							<h2> S'inscrire </h2>
							<i class="fa fa-user fa-lg fa-fw" id="icon1"></i>
							<input type="text" name="nom" id="nom" placeholder="Nom" required>
							
							<input type="text" name="prenom" id="prenom" placeholder="Prenom" required> <br>
							
							<i class="fa fa-envelope fa-lg fa-fw"></i>
							<input type="email" name="email1" id="email1" placeholder="Adresse mail" required > <br>
							<i class="fa fa-key fa-lg fa-fw"></i>
							<input type="password" name="password1" id="password1" placeholder="Le mot de passe" required> 
							
							<input type="password" name="cpassword1" id="cpassword1" placeholder="Confirmer le mot de passe" required>		<br>

							<i class="fa fa-phone fa-lg fa-fw"></i>
							<input type="text" name="tel" id="tel" placeholder="Num téléphone" required> <br>
							<i class="fa fa-address-book fa-lg fa-fw"></i>
							<input type="text" name="adresse" id="adresse" placeholder="Adresse" required> <br>

							
							<input type="submit" name="submit1" id="submit1" value="envoyer" >	

							
							
	
							
							</form>

						
						
				</div>
		
	</div>
</dir>
	


</body>
</html>