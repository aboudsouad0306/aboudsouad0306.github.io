<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>Rédiger une news</title>
<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
<style type="text/css">
h3, form
{
text-align:center;
}
</style>
</head>
<body>
<h3><a href="index.php?page=page3">Retour à la liste des annonces</a></h3>
<?php

//etablir la connexion a la base de données
include("../its_adm/connexion.php");




if (isset($_GET['modifier_annonce'])) // Si on demande de modifier une annonce.
{
// On protège la variable "modifier_annonce" pour éviter une faille SQL.
$_GET['modifier_annonce'] = qote($_GET['modifier_annonce']));				
// On récupère les informations de l'annonce correspondante.
$retour = $bdd->query('SELECT * FROM annonce WHERE id=\'' .
$_GET['modifier_annonce'] . '\'');
$donnees = $retour->fetch();
// On place le titre et le contenu dans des variables simples.
$titre = stripslashes($donnees['titre']);
$contenu = stripslashes($donnees['contenu']);
$id_annonce = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
}
else // C'est qu'on rédige une nouvelle annonce.
{
// Les variables $titre et $contenu sont vides, puisque c'est une nouvelle annonce.
$titre = '';
$contenu = '';
$id_annonce= 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.
}
?>
<form action="index.php?page=sub_pages/page1" method="post">
<p>Titre : <input type="text" size="30" name="titre" value="<?php
echo $titre; ?>" /></p>
<p>
Contenu :<br />
<textarea name="contenu" cols="50" rows="10">
<?php echo $contenu; ?>
</textarea><br />
<input type="hidden" name="id_news" value="<?php echo $id_news;
?>" />
<input type="submit" value="Envoyer" />
</p>
</form>
</body>
</html>