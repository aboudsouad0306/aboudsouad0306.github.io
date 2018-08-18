<!DOCTYPE html>
<html>
<head>
	<title>DZLocation</title>
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
         
        
            <dir class="icon">                        
                <div class="name" data-text="Sign out"><i class="fa fa-home" aria-hidden="true"></i> 
                   Acceuil
                </div>  
            </dir> 
       

        <p>
            trouvez votre voiture préférée et profitez-en !  
        </p>

         <div class="form">
         <form>
         Cherchez votre voiture , remplissez les champs suivants pour un meilleur résultat ! <br><br>
         <div id="inputs">
         <label>Marque <br> <input type="text" name="marque"></label> <br>     
         <label>Modele <br> <input type="text" name="modele"> </label> <br>
         <label>Date de retrait <br> <input type="date" name="date retrait"> </label> <br>
         <label>Date de restitution  <br><input type="date" name="date restitution"> </label> <br>
         <input type="button" name="acceuil" onclick="vehicules.php" value="Cherchez" style="width: 100px;font-weight: bold; font-size: 15px; margin-top: 16px;">
         </div>
         
         <div id="img">
             <img src="../imgs/accimg.jpg">
         </div>
         </form>   
         </div>  

        
         <!-- footer -->
        <div id="footer">
            <a href="www.infotoolssolusions.com">InfooToolsSolutions</a>
        </div>

           

		</div>
	</div>
	
</dir>

</body>
</html>