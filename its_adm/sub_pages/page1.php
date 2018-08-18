<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<meta charset="utf-8">
<title>Liste des news</title>
<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
<style type="text/css">
h2, th, td
{
text-align:center;
}
table
{
border-collapse:collapse;
border:2px solid black;
margin:auto;
}
th, td
{
border:1px solid black;
}
</style>
</head>
<body>
<h2><a href="index.php?page=sub_pages/page7">Ajouter une Annonce</a></h2>
<?php

//etablir la connexion a la base de données
//include("../its_adm/connexion.php");


//-----------------------------------------------------
// Vérification 1 : est-ce qu'on veut poster une annonce ?
//-----------------------------------------------------
if (isset($_POST['titre']) AND isset($_POST['contenu']))
{
$titre = addslashes($_POST['titre']);
$contenu = addslashes($_POST['contenu']);
// On vérifie si c'est une modification de annonce ou non.
if ($_POST['$id_annonce'] == 0)
{
// Ce n'est pas une modification, on crée une nouvelle entrée dans la table.
$bdd->query("INSERT INTO annonce VALUES('', '" . $titre . "',
'" . $contenu . "', '" . time() . "')");
}
else
{
// On protége la variable "$id_annonce" pour éviter une faille SQL.
$_POST['$id_annonce'] = addslashes($_POST['$id_annonce']);
// C'est une modification, on met juste à jour le titre et le contenu.
$bdd->query("UPDATE actualite SET titre='" . $titre . "',
contenu='" . $contenu . "' WHERE id='" . $_POST['$id_annonce'] . "'");
}
}
//--------------------------------------------------------
// Vérification 2 : est-ce qu'on veut supprimer une annonce?
//--------------------------------------------------------
if (isset($_GET['supprimer_news'])) // Si l'on demande de supprimer une annonce.
{
// Alors on supprime l'annonce correspondante.
// On protège la variable "id_news" pour éviter une faille SQL.
$_GET['supprimer_news'] = addslashes($_GET['supprimer_news']);
$bdd->query('DELETE FROM annonce WHERE id=\'' .
$_GET['supprimer_news'] . '\'');
}?>
<table>
<tr>
<th>Modifier</th>
<th>Supprimer</th>
<th>Titre</th>
<th>Date</th>
</tr>
<?php
$retour = $bdd->query('SELECT * FROM annonce ORDER BY id DESC');
while ($donnees = $retour->fetch()) // On fait une boucle pour lister les annonces.
{
?>
<tr>
<td><?php echo '<a href="index.php?page=sub_pages/page7?modifier_news=' .$donnees['id'] . '">'; ?>Modifier</a></td>
<td><?php echo '<a href="index.php?page=sub_pages/page1?supprimer_news=' .$donnees['id'] . '">'; ?>Supprimer</a></td>
<td><?php echo stripslashes($donnees['titre']); ?></td>
<td><?php echo $donnees['date']; ?></td>
</tr>
<?php
} // Fin de la boucle qui liste les annonces.
?>
</table>
</body>
</html>



  