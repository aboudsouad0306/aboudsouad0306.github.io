<!DOCTYPE html">
<html lang="fr" >

<!-- entete -->

   <head>
     <meta charset="utf-8">
    <title>finddz resirvation </title>
     <meta name="viewport" content="width=device-width , initial-scale=1">

    <!--  css  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleres.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>     

    <style>
    
    </style>

   </head>
   <body>

   <!-- navigation -->
  <div class="backgroundimg">
   
   		<nav class="navbar navbar-inverse">
        <div class="container-fluid">
         <div class="navbar-header">
           
           <a href="#" class="navbar-brand"><img src="imgs/mini-logo.png" width="100px"></a>
         </div>
         <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav navbar-right">   
            <li>
              <a href="index.php">
                <dir class="icon">                        
                  <div class="name" data-text="Sign out"><i class="fa fa-sign-out" aria-hidden="true"></i> 
                   Déconnecter
                  </div>  
                </dir> 
              </a>
             </li>            
           </ul>
         </div>
       </div>
      </nav>

      <form>
      <div style="display: block;">
        <div class="agence">
        	<label  for="selc1">Agence de location</label>
        	<select class="form-control" id="selc1">
        		<option>123</option>
        		<!-- recuperer la listes des agences apartir de la base de données   -->

        	</select>
        </div>

         <div class="checkbox" id="checkbox">
          <label><input type="checkbox" value="" class="form-control">Lieu de retour différent</label>
        </div>
      </div>
      <div style="display: block; margin-top: 20px;">
        <div id="date1">
          <label class="name" data-text="Date de retrait">    Date de retrait <br>
            <input type="Date" name="Date de début" id="date" class="form-control">
          </label>
        </div>
        <div id="time1">
          <label class="name" data-text="Heure">    Heure <br>
            <input type="time" name="Heure" id="time" class="form-control">
          </label>
        </div>
        <div id="date2">
          <label class="name" data-text="Date de retrait">    Date de restitution <br>
            <input type="Date" name="Date de début" id="date" class="form-control" >
          </label>
        </div>
        <div id="time2">
          <label class="name" data-text="Heure">    Heure <br>
            <input type="time" name="Heure" id="time" class="form-control" >
          </label>
        </div>
        <div id="recherch">
          <button type="button" class="btn-md" style="border-radius: 3px;border:0;">Recherche</button>
        </div>
       </div>

       <dir class="suit">
          
        <div class="agence">
          <label  for="selc2">Marque de véhicule</label>
          <select class="form-control" id="selc2">
            <option>123</option>
            <!-- recuperer la listes des agences apartir de la base de données   -->

          </select>
        </div>

        <div class="agence">
          <label  for="selc3">modèle de véhicule</label>
          <select class="form-control" id="selc3">
            <option>123</option>
            <!-- recuperer la listes des agences apartir de la base de données   -->

          </select>
        </div>

        <div class="agence">
          <label  for="selc3">couleur de véhicule</label>
          <select class="form-control" id="selc3">
            <option>123</option>
            <!-- recuperer la listes des agences apartir de la base de données   -->

          </select>
        </div>
       </dir>

      </form>

     


      </div>


   

  		
 </body>
</html>


