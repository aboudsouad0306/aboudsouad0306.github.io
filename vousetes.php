  <div id="civ">
  <table width="450" border="0">
    <tr>
    <td>Vous �tes?</td>
    <td><label for="type"></label>
      <select name="type" id="type">
      <?php
	  //recuperer la liste des type potentiels a partir de la base de donn�es
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