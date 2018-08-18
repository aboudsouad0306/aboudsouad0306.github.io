<?php
$nom=$_POST['nom'];
$chemin='files/'.$nom.'.csv';
if(move_uploaded_file($_FILES['image']['tmp_name'],$chemin))
{
echo"le fichietr".$_FILES['image']['name']."a été stocké avec succés sur le serveur: ".$chemin;
}
echo '<br/>';
// 1 : on ouvre le fichier en mode lecture
$monfichier =fopen($chemin , "r");


  // 2 : on lit la première ligne du fichier
  $i=0;
  while(!feof($monfichier))   //Tant que l'on est pas a la fin du fichier
  {
  $ligne = fgets($monfichier);
  
  $tab=explode(';',$ligne);
   
   if( $i>0)
   {  
   // file of connect
   include("../its_adm/modules/SendFile/connexion.php");
   $sql="INSERT INTO entreprise(id,nom,raisonsocial,description,adresse,Tel,Fax,idcat,idwilaya) VALUE(id,'$tab[1]', '$tab[2]', '$tab[3]', '$tab[4]', '$tab[5]', '$tab[6]', '$tab[7]', '$tab[8]')";
   // Envoi de la requête à la base
   $bdd->query($sql);
   // or die('Erreur dans la requête SQL'); 
    }
   ?>
   <br/>
   <?php
    $i++;
}

  
  



 
  










 
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);
?> 