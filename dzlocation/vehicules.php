<!DOCTYPE html>
<html>
<head>
	<title>vehicules</title>
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
            liste des vehicules !  
        </p>

        <?php 
        //recupérer les données des agences de location
        include("../connexion.php");

        $sql = $bdd->query("SELECT* From vehicules ");

        while ($resultat = $sql->fetch()) {

        echo'<div id="agenc">';
        echo '<h4><font size="4" color="#b30000">'.$resultat["marque"].'</font></h4>';


    echo '<tr> Modele :  </tr><tr>'.$resultat["modele"].'</tr><br>';
    echo 'Couleur : '.$resultat["couleur"].'<br>';
	echo 'Matricule : '.$resultat["matricule"].'<br>';
	echo 'Prix:'.$resultat["prixlocation"].'<br>';
	echo 'Disponibilité:'.$resultat["disponibilité"].'<br>';
    echo ' <br> <a href="../its_clients/signinClient.php">Réserver</a>'.'<br>';
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