<?php
/*debuter une nouvelle session*/
session_start();
/*petit script pour la réorientation des sous pages!*/

if(isset($_GET['page']))
{
$page= ($_GET['page']);
}
 else{$page='sub_pages/accueil';}
 
?>

<?php

        if(isset($_SESSION['email']) && $_SESSION['email']!=NULL  and isset($_SESSION['mdp']) && $_SESSION['mdp']!=NULL){
		
       //recuperer toutes les informations concernant l'utilisateur
       $email=$_SESSION['email'];
	   $nom=$_SESSION['nom'];
       $prenom=$_SESSION['prenom'];
	   
	   //etablir une connexion a la base de données
	   include("../connexion.php");
	   //recuperer les informations cocernants le profil utilisateur
	   $sql=$bdd->query("SELECT * FROM users WHERE email='$email'");
	   //affichage des informations utilisateurs
	   while($resultat=$sql->fetch())
	    {
	   $id=$resultat["id"];
	   $civilite=$resultat["civilite"];
	   $adresse=$resultat["adresse"];
	   $idtype=$resultat["idtype"];
	   $idwilaya=$resultat["idwilaya"];
	   }
	   //recuperer le nombre de visires de l'utilisateur
	   /*$sql=mysql_query("SELECT * FROM user_compteur WHERE id_user='$id'");
	   while($resultat=mysql_fetch_array($sql))
	   {
	   $id_user=$resultat["id_user"];
	   $n_visite=$resultat["n_visite"];
	   $n_visite=$n_visite+1;
	      }
	   $sql = "UPDATE `its`.`user_compteur` SET `n_visite` = '$n_visite' WHERE `user_compteur`.`id_user` = '$id_user';";
	   mysql_query($sql);*/
	
	   //recuperer le nouveau nombre de visites
	   $sql=$bdd->query("SELECT n_visite FROM user_compteur WHERE id_user='$id'");
	   while($resultat=$sql->fetch())
	       {
	       $n_visite=$resultat["n_visite"];
	       }
	   
	   
	  
       //$Type=$_SESSION['Type'];
	   //$Nom=$_SESSION['Nom'];
	   //$Prenom=$_SESSION['Prenom'];
	   //$Email=$_SESSION['Email'];
		  
//afficher des informations concernant l'utilisateur	   
     
       }
       else{

      header('location:login.php');
            }
         ?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Administrateur_Finddz</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	
	<script src="js/script.js"></script>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="../index.php" class="round button dark ic-left-arrow image-left">Vers le site</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Connécté en tant que: <strong><?php echo $prenom.' '.$nom; ?></strong></a>
					<ul>
						<li><a href="index.php?page=modules/users/user_profil">Mon profile</a></li>
						<li><a href="index.php?page=modules/users/setting_user">Parametres utilisateur</a></li>
						<li><a href="index.php?page=modules/users/setting_mdp">Parametres du mot de passe</a></li>
						<li><a href="modules/deconnexion.php">Déconnexion</a></li>
					</ul> 
				</li>
			
				<li><a href="index.php?page=sub_pages/messages" class="round button dark menu-email-special image-left">Mes messages</a></li>
				<li><a href="modules/deconnexion.php" class="round button dark menu-logoff image-left">Deconnexion</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="search_engine.php" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Recherche..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="index.php?page=sub_pages/accueil" class="active-tab dashboard-tab">Accueil</a></li>
				<li><a href="index.php?page=sub_pages/page1">Mes Annonces</a></li>
				<li><a href="index.php?page=sub_pages/page2">Utilisateurs</a></li>
				<li><a href="index.php?page=page3">Actualités</a></li>
				<li><a href="index.php?page=sub_pages/page4">Mes Newsletters</a></li>
				<li><a href="index.php?page=sub_pages/page8">Ajouter un Admin pour le Site</a></li>
				<li><a href="index.php?page=sub_pages/page6">Contenus du site</a></li>
				
				
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/mini-logo.png" alt="Blue Hosting" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>MENU</h3>
				<ul>
				
					<li><a href="index.php?page=modules/entreprise/add">Ajouter une entreprise</a></li>
					<li><a href="index.php?page=modules/entreprise/import">Importer une liste Excel entreprise</a></li>
					<li><a href="index.php?page=modules/entreprise/liste">Liste des entreprises enregistrées</a></li>
					
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Zone principale</h3>
						<span class="fr expand-collapse-text"></span>
						<span class="fr expand-collapse-text initial-expand"></span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
					<?php 
                     $mapage=$page.'.php';
	                  include($mapage); 
		             ?>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
				<div class="content-module">
				
					
				
								
				</div> <!-- end content-module -->
	
				<div class="half-size-column fl">
	
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">une autre zone</h3>
							<span class="fr expand-collapse-text"></span>
							<span class="fr expand-collapse-text initial-expand"></span>
						
						</div> <!-- end content-module-heading -->
						
						
					
					</div> <!-- end content-module -->
	
				</div>

				

			</div>
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2014 <a href="http//:www.infotoolssolutions.dz" target="_blank">Info tools solutions</a>. tous droits réservés.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>