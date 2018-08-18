<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Finddz-accueil</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="css/boutons.css" rel="stylesheet" type="text/css" />


</head>

<body>

<?php
include ("testconnexion.php");
echo'hello souad <br/> ';

$sql = $bdd->query("SELECT count(*) FROM activité ");

/* ($res = $sql->fetch()) {
	$go = $res["id"];
	echo stripcslashes($go).'<br/>';
}	*/

$res = $sql->fetchColumn();
echo($res);


?>




</body>

</html>