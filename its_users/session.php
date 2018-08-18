<?php
session_start();

	if(isset($_SESSION['email']) and isset($_SESSION['nom']) and isset($_SESSION['prenom']))
		{
       //recuperer toutes les informations concernant l'utilisateur
       $email=$_SESSION['email'];
	   $nom=$_SESSION['nom'];
       $prenom=$_SESSION['prenom'];
         }
   ?>