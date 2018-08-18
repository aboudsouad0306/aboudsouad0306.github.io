
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>Liste des news</title>
<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
</head>
<body>
<?php

//etablir la connexion a la base de données
//include("../its_adm/connexion.php");

?>
    <h1>Ajouter un Administrateur pour Find.dz</h1>

 <div class="content">
 
   <form id="form1" name="form1" method="post" action="sub_pages/valide_admin.php">
    
<center>
<div id="civ">
<table width="400" border="0">
 
  <tr>
    <td>Civilité <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td>
      Mlle
      <input type="radio" name="civilite" id="radio" value="1" />
      Mme
    
      <input type="radio" name="civilite" id="radio" value="2" />
      Mr

      <input type="radio" name="civilite" id="radio" value="3" />
     </td>
       
  </tr>
  
  </table>
   </div>
   <div id="civ">
<table width="450" border="0">
  <tr>
    <td>Nom <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" /></td>
  </tr>
  <tr>
    <td>Prénom <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="prenom"></label>
      <input type="text" name="prenom" id="prenom" /></td>
  </tr>
  <tr>
 
     <td>E-mail <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
     <td><label for="email"></label>
     <input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>Activité <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="activite"></label>
      <select name="activite" id="activite">
	  <option>Sélectionnez une activité /domaine/profession......</option>
       <?php
	  //recuperer la liste des wilaya "Regions" a partir de la base de données
	  $sql=$bdd->query("SELECT * FROM activité ORDER BY id");
	  //afficher les resultats de notre requette
	  while($resultat=$sql->fetch())
	  {
		  //affichage
		  echo '<option>'.$resultat["nom"].'</option>';
	  }
	  ?>
      </select></td>
  </tr>
  
  
  
   </table>
   </div>

   <div id="civ">
<table width="450" border="0">
  <tr>
    <td valign="top">Adresse <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="adresse"></label>
      <textarea name="adresse" id="adresse" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Wilaya <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="region"></label>
      <select name="region" id="region">
	  <option>Tout </option>
       <?php
	  //recuperer la liste des wilaya "Regions" a partir de la base de données
	  $sql=$bdd->query("SELECT * FROM wilaya ORDER BY id");
	  //afficher les resultats de notre requette
	  while($resultat=$sql->fetch())
	  {
		  //affichage
		  echo '<option>'.$resultat["wilaya"].'</option>';
	}
	  ?>
      </select></td>
  </tr>
  
  <tr>
    <td>Mot de Passe <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong> </td>
    <td><label for="mdp"></label>
      <input type="password" name="mdp" id="mdp" /></td>
  </tr>
  <tr>
    <td>Confirmez <strong><span class="note"><font color="red">*</font></span> &nbsp;</strong></td>
    <td><label for="confirme"></label>
      <input type="password" name="confirme" id="confirme" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Envoyer" />
      <input type="reset" name="button2" id="button2" value="Réinitialiser" /></td>
  </tr>
  </table>
  </div>
  
</table>
</center>
</form>
</div>
</body>
</html>