<?php
session_start();

/*if(isset($_GET['page']))
{
$page= ($_GET['page']);
}
 else{$page='accueil';}*/
 
?>

 <?php

        if(isset($_SESSION['email']) && $_SESSION['email']!=NULL  and isset($_SESSION['mdp']) && $_SESSION['mdp']!=NULL){
		
//recuperer toutes les informations concernant l'utilisateur
       $email=$_SESSION['email'];
	   $nom=$_SESSION['nom'];
       $prenom=$_SESSION['prenom'];
	   
	   //etablir une connexion a la base de données
	   include("../../../connexion.php");
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

      header('location:../acces_memebre.php');
            }
         ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrateur</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="bouton.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="container">
  <div class="header">
  <div id="nav">
  <a href="../index.php">vers le site</a>
  </div>
  <?php

	//affichage d'un ptit message de bienvenue!!
	echo 'Bonjour, '.$prenom.' '.$nom.'<a href="user_profil.php">Mon profil</a> <a href="deconnexion.php">se deconnecter</a>' ;
	
     ?>

  </div>
  <div class="sidebar1">
 <div id="profil">
  <?php

	echo $prenom.', c\'est votre: '.$n_visite.' eme visite' ;
	
     ?>
</div>
    <ul class="nav">
      <li><a href="#" class="actif">>> Accueil</a></li>
      <li><a href="messages.php">>> Mes messages</a></li>
      <li><a href="#">>> Bla Bla</a></li>
      <li><a href="#">>> Bla Bla</a></li>
    </ul>
	<div id="option">
	<ul class="option">
	<h1>Mes priviléges</h1>
	<li><a href="#">> Contenu</a></li>
	<li><a href="users.php">> Utilisateurs</a></li>
	<li><a href="mailing_liste.php">> Mailing</a></li>
	<li><a href="news.php">> Actualités</a></li>
	<li><a href="#">> Annuaire</a></li>
	<li><a href="#">> Annonces</a></li>
	</ul>
	<h1></h1>
	</div>
    <p>
    
    </p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <h1>Page d'accueil Administrateur:</h1>
    <table width="600">
	<tr>
	<td>
	 <div id="ico"> </div>
	</td>
	<td><div id="ico"> </div></td>
	<td><div id="ico"> </div></td>
	</tr>
	<tr>
	<td>
	 <div id="ico"> </div>
	</td>
	<td><div id="ico"> </div></td>
	<td><div id="ico"> </div></td>
	</tr>
	<tr>
	<td>
	 <div id="ico"> </div>
	</td>
	<td><div id="ico"> </div></td>
	<td><div id="ico"> </div></td>
	</tr>
	</table>
    <!-- end .content --></div>
  <div class="footer">
    <center><p>Info Tools Solutions 2013</p></center>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
