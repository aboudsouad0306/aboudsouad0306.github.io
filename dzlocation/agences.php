<!DOCTYPE html>
<html>
<head>
	<title>Agences de location</title>
	<meta name="viewport" content="width=device-width , initial-scale=1">

    <!--  css  -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="DZlocation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>     

</head>
<body>
	<dir class="backgroundimg">
	<div class="container-fluid">
		<div class="dzloc">
		 
         <div id="navbar">
         	<div id="logo"><h1>DZLocation</h1></div>
           <ul>              
            <li> <a href="acceuil.php"> Acceuil</a>  </li> 

             <li><a href="agences.php"> Agences </a>  </li>
           
            <li><a href="vehicules.php"> Véhicules</a> </li>
            
            <li><a href="../its_clients/signinClient.php"> Resirvation</a></li>
           </ul>
         </div>
         
        
        <p>
            liste des agences automoblie !  
        </p>

        <?php 
        //recupérer les données des agences de location
        include("../connexion.php");

        $sql = $bdd->query("SELECT* From entreprise WHERE idact = 8 ");

        while ($resultat = $sql->fetch()) {

        echo'<div id="agenc">';
        echo '<h4><font size="4" color="#b30000">'.$resultat["nom"].'</font></h4>';

    echo 'Adresse : '.$resultat["adresse"].'<br>';
    echo 'Tel : '.$resultat["Tel"].'<br>';
	echo 'Mobile : '.$resultat["mobile"].'<br>';
	echo 'Fax : '.$resultat["Fax"].'<br>';
	echo 'Email:'.$resultat["email"].'<br>';
	echo 'Lien  <a href="'.$resultat["lien"].'" target="_blank">'.$resultat["lien"].'</a>'.'<br>';
   	echo '  <a href="vehicules.php">voir les Véhicules disponibles</a>'.'<br>';
	echo '</div>';

 
	echo'<hr>';
        	
        }




        ?>
        
         <!-- footer -->
        <div id="footer">
            <a href="www.infotoolssolusions.com">InfooToolsSolutions</a>
        </div>

           

		</div>
	</div>
	
</dir>
</body>
</html>