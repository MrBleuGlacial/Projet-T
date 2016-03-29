<?php
/**
*Sélectionne le <body> lié aux relations, aux déplacements ou aux personnes en fonction du paramètre placé dans l'url.
*Il n'était pas prévu à l'origine d'avoir plus de deux types de body, il s'agissait donc uniquement de tester la présence du paramètre 'relationView' dans l'url afin de déterminer s'il s'agissait d'une vue des relations ou, à défaut, des personnes. 
*Lors de l'apparition d'une nouvelle vue sur les déplacements, un nouveau paramètre 'geoView' a été ajouté pour éviter de reprendre le code à plusieurs endroits au lieu de créer un paramètre typeView = 0,1,2 qui aurait été une solution plus propre.
*/
/**
*
*/
include("../controler/inputForForm.php");

if(isset($_GET['relationView']) AND $_GET['relationView']==1)
	include ('../controler/createBodyRelation.php');
elseif(isset($_GET['geoView']) AND $_GET['geoView']==1)
	include ('../controler/createBodyGeo.php');
else
	include('../controler/createBodyPersonne.php'); 

?>