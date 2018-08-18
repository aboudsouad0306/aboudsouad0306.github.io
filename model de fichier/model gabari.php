<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
<div class="navigation">
<a href="index.php">Accueil</a>
<a href="annuaire.php">Annuaire</a>
<a href="annonces.php">Petites annonces</a>
<a href="actualite.php">Actualités</a>
<a href="acces_memebre.php">Acces membres</a>
<a href="inscription.php">Inscription</a>
</div>
  <div class="header">
  <img src="imgs/logo_web.png" width="300" height="177" class="logo"/>
   </div>
  <div class="search">
  <center> 
  <form action="search_engine.php" method="post">
  <table width="700" border="0">
  <tr>
    <td>Quoi?</td>
    <td><input name="search" type="text" size="50" id="chp"/></td>
    <td>Ou?</td>
    <td>
    <select name="wilaya" id="select">
    <?php
	//cette portion de code va nous permettre de recuperer la liste des wilayas algeriennes lol!
	include("wiliste.php");
	?>
    </select>
    </td>
    <td><input name="" type="submit" value="Trouver" /></td>
  </tr>
</table>
</form>
</center>  
  </div>
  <div class="add">
	<img src="imgs/ajouter.jpg" width="270" height="360"/>
    <a href="ajouter.php">Ajouter votre entreprise</a>
	<!--zone pour la news letter-->
	<br/>
	<div id="letter">
	Abonnez-vous à notre newsletter<br/>
    <form>
    <input type="text" name="firstname"><br/><br/>
    <input type="submit" name="button" id="button" value="ajouter" />
    </form> 
	</div>
</div>

  <div class="horbar">

  <div id="head">Classés par secteurs d'activité</div>
    <?php
    //connexion a la base de données
    include("cat.php");
   ?>
    <p></p>
   </div>
    <div class="home">

 <?php
   
?>
  </div>
 <!--fin de la div home-->     
</div>
 <div class="content">
    <p></p>
    <!-- fin .content -->
    </div>
    
  <div class="profooter">
    <p></p>
    <!-- fin .profooter -->
    </div>
   
  <div class="footer">
    <p>Powred by Info Tools Solutions 2013</p>
    <!-- end .footer -->
  </div>
  <!-- end .container -->
</div>
</body>
</html>
