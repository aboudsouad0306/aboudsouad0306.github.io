<div class="content">
    <h1>Devenir membre de Find.dz</h1>
    <form id="form1" name="form1" method="post" action="">
    
<center>
<div id="civ">
<table width="600" border="0">
 
  <tr>
    <td>Civilité:</td>
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
<table width="600" border="0">
  <tr>
    <td>Nom:</td>
    <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" /></td>
  </tr>
  <tr>
    <td>Prénom:</td>
    <td><label for="prenom"></label>
      <input type="text" name="prenom" id="prenom" /></td>
  </tr>
  <tr>
 
    <td>E-mail:</td>
    <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
  </tr>
   </table>
   </div>
  <div id="civ">
<table width="600" border="0">
  <tr>
    <td>Vous etes?</td>
    <td><label for="type"></label>
      <select name="type" id="type">
      <?php
	  //recuperer la liste des type potentiels a partir de la base de données
	  $sql=$bdd->query("SELECT * FROM users_type ORDER BY type");
	  //afficher les resultats de notre requette
	  while($resultat=$sql->fetch())
	  {
		  //affichage
		  echo '<option>'.$resultat["type"].'</option>';
	}
	  ?>
      </select></td>
  </tr>
   </table>
   </div>
   <div id="civ">
<table width="600" border="0">
  <tr>
    <td valign="top">Votre adresse:</td>
    <td><label for="adresse"></label>
      <textarea name="adresse" id="adresse" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Région:</td>
    <td><label for="region"></label>
      <select name="region" id="region">
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
  </table>
   </div>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Envoyer" />
      <input type="reset" name="button2" id="button2" value="Réinitialiser" /></td>
  </tr>
</table>
</center>
</form>