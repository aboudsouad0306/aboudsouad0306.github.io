<?php
$nom=$_POST['nom'];
$chemin='modules/files/'.$nom.'.csv';
if(move_uploaded_file($_FILES['image']['tmp_name'],$chemin))
{
echo "le fichier ".$_FILES['image']['name']." a ete stocke avec succes sur le serveur: ".$chemin;
}
echo '<br/>';
// 1 : on ouvre le fichier en mode lecture
$monfichier =fopen($chemin , 'r');



// file of connect
  include("../its_adm/connexion.php");


// 2 : on lit la première ligne du fichier
$i=0;
while(!feof($monfichier))    //Tant que l'on est pas a la fin du fichier
{
  $ligne = fgets($monfichier);
  
  $tab=explode(';',$ligne);
  
  
  
  
 if(($i>0) and isset($tab[0])){
   $code=$tab[0];                              
   $nom=addslashes($tab[1]);
   $raisonsocial=addslashes($tab[2]);
   $email=addslashes($tab[3]);
   $lien=addslashes($tab[4]);
   $adresse=addslashes($tab[5]);
   $description=addslashes($tab[6]);
   $tel=addslashes($tab[7]);
   $fax=addslashes($tab[8]);
   $mobile=addslashes($tab[9]);
   
   
   //recuperer l'identifiant du secteur d'activité
   $sql=$bdd->query("SELECT* FROM activité WHERE nom='$tab[10]'");

   //recuperer le id:
   while($res=$sql->fetch()){

   $idact=$res["id"];
   }

   //recuperer l'identifiant de laregion "Wilaya" 
   $sql=$bdd->query("SELECT* FROM wilaya WHERE wilaya='$$tab[11]'");

   //recuperer le id:
   while($res=$sql->fetch()){

   $idw=$res["id"];
   }
   
   //$email=addslashes($tab[9]);

  
//insertion des données contenues dans le fichier excel dans la table entreprisie

$sql="INSERT INTO entreprise(id,nom,raisonsocial,email,lien,adresse,description,Tel,Fax,mobile,idwilaya,idact) VALUE(NULL,'$nom', '$raisonsocial','$email','$lien','$adresse' , '$description', '$tel', 'fax', '$mobile', '$idw', '$idact')";
   // Envoi de la requête à la base
   $bdd->query();
   // or die('Erreur dans la requête SQL');          
   
   //echo 'vos donnees ont ete stocker avec succes dans la BDD';
}
   ?>
   <br/>
   <?php
     $i++;
}

 echo 'vos donnees ont ete stocker avec succes dans la BDD'; 
 
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);
?> 