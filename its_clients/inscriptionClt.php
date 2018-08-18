<?php 
							
							

							if (isset($_POST["submit1"])) {
								//extract($_POST);

								if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email1']) && isset($_POST['tel']) && isset($_POST['password1']) && isset($_POST['cpassword1']) && isset($_POST['adresse'])) {


									if ($_POST['password1'] == $_POST['cpassword1']) {

										//$options= [	'cost' => 12 , ] ;
									
									//$hashpass = password_hash($password1 , PASSWORD_BCRYPT ,$options ) ; 

									include("../connexion.php");

									$nom=$_POST["nom"];
									$prenom=$_POST["prenom"];
									$email=$_POST["email1"];	
									$adresse=$_POST["adresse"];
									$tel=$_POST["tel"];
									$mdp=$_POST["password1"];

									$sql2 = "INSERT INTO `clients` (`id`,`nom`, `prenom` ,  `email`, `tel`, `adresse`, `mdp`) VALUES (NULL,'$nom', '$prenom', '$email',  '$tel' ,  '$adresse' , '$mdp');"; 
									 $bdd->query($sql2); 

									 /*$s = $bdd->query("SELECT* FROM clients ") ;
									 while($res=$s->fetch()){
									 	$nom1 = $res['nom'];
									 }*/

									
									/*$sql = $bdd->prepare("INSERT INTO `clients' VALUES(NULL,:nom,:prenom,:email,:tel,:adresse,:mdp) ;" ) ;

									$sql-> bindValue(':nom' , $_POST['nom'] , PDO::PARAM_STR);
									$sql-> bindValue(':prenom' , $_POST['prenom'] , PDO::PARAM_STR);
									$sql-> bindValue(':email' , $_POST['email1'] , PDO::PARAM_STR);
									$sql-> bindValue(':tel' , $_POST['tel'] , PDO::PARAM_STR);
									$sql-> bindValue(':adresse' , $_POST['adresse'] , PDO::PARAM_STR);
									$sql-> bindValue(':mdp' , $_POST['password1'] , PDO::PARAM_STR);

									 $sql->execute();	*/	
									 
							
										//echo "le contact a étais ajouter ";
										 
										
									

									}								
									
								}else {
									echo "les champs ne sont pas tous remplis !!!";
								}

								

						
							}

								

							 ?>


<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
	 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width , initial-scale=1">


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/loginC.css">
 	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 

</head>
<body>

<dir class="backgroundimg">
		<div class="container-fluid">
		
				<div class="signonbox">
					<img src="../imgs/hocine.png" class="avatar"> <br> 
						
							<form id="form" name="form" method="post" action="../resirvation.php">
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



