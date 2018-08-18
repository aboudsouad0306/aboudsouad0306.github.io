<html> 
<head> 
<title>Insertion de modules dédiés aux utilisateurs et aux visiteurs du portail, météo.....</title> 
</head> 
<body> 

<h2>Insertion de modules dédiés aux utilisateurs et aux visiteurs du portail, météo.....</h2> 







<?php //-------------------------------------------------------------------------------------------------------------------?>
<?php //?>

<h2>La météo:</h2> 

<!-- widget meteo -->
<div id="widget_02297f3674b5a0fd3bebf7cdd479ac51">
<a href="http://www.my-meteo.fr/previsions+meteo+algerie/alger.html" title="M&eacute;t&eacute;o Alger 12 jours">M&eacute;t&eacute;o Alger 12 jours</a>
<script type="text/javascript">
(function() {
    var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
    my.src = "http://services.my-meteo.fr/widget/js2.php?ville=1&format=petit-horizontal&nb_jours=3&icones&vent&hum&c1=414141&c2=a1a1a1&c3=d4d4d4&c4=ffffff&c5=0136a3&c6=d12e2e&police=0&t_icones=1&x=431&y=74&id=02297f3674b5a0fd3bebf7cdd479ac51";
    var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
  })();
 </script>
</div>
<!-- widget meteo -->

<h2>La Date & L'Heure:</h2> 

<?php echo 'Aujourd\'hui, Nous sommes le : ' . date('d/m/Y'); ?>


<br>
<?php
echo 'Il est ' . date('H \H\e\u\r\e\s');
?>
<h2>Les Liens utiles:</h2>
 <a href="http://www.liensutiles.org/calendrier.htm" target="blank">-CALENDRIERS</a><br />
 <a href="http://infotoolssolutions.dz/" target="blank">-INFO TOOLS SOLUTIONS</a><br />
 <a href="http://www.liensutiles.org/calendrier.htm" target="blank">-CALENDRIERS</a><br />
 <a href="http://www.liensutiles.org/calendrier.htm" target="blank">-CALENDRIERS</a><br />
 <a href="http://www.liensutiles.org/calendrier.htm" target="blank">-CALENDRIERS</a><br />
 <br>
 <a href="form.php" target="blank">-Retour>></a><br />
</body> 
</html>