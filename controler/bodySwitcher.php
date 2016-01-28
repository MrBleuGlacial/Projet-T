<?php

include("../controler/inputForForm.php");

//Ici sont mis les conditions (en GET) pour switcher entre la vue personne, relation, voyage ou autre
//la vue de base sans paramètre est la vue personne. Elle sera dans le "else" quand il y aura d'autres modes. 

if(isset($_GET['relationView']) AND $_GET['relationView']==1)
	include ('../controler/createBodyRelation.php');
elseif(isset($_GET['geoView']) AND $_GET['geoView']==1)
	include ('../controler/createBodyGeo.php');
else
	include('../controler/createBodyPersonne.php'); 

?>