<?php
/**
*Fichier de fonctions utilitaires php qui n'ont peu/pas été utilisées.
*Deprecated.
*/


/**
*
*/
function testDate($date){
	if (preg_match('#^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$#', $date) == 1 )//&& checkdate($m[3], $m[1], $m[4]))
		{
		  $split = explode("-",$date);
		  if(checkdate($split[1],$split[2],$split[0]))
		  	return $date;
		  else
		  	return NULL;
		}
	else
		{
		  return NULL;
		}
}


function formateDate($dateSplit){
	return $dateSplit[2] . "-" . $dateSplit[1] . "-" . $dateSplit[0];
}

function testValue($value){
	if($value == "")
		return NULL;
	else
		return $value;
}

function testNumber($value){
	if($value < 0)
		return NULL;
	else
		return $value;
}





?>