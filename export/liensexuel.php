<?php

include("../model/BDDAccess.php");
include("../model/readBDD.php"); 

$rep = readLienSexuel();
$csv = "";

$csv .='"IDLienSexuel"';
$csv .= ',"IDRelation"';

$csv .= ',"IDEgo"';
$csv .= ',"PrenomEgo"';
$csv .= ',"NomEgo"';
$csv .= ',"IDDossierEgo"';

$csv .= ',"IDAlter"';
$csv .= ',"PrenomAlter"';
$csv .= ',"NomAlter"';
$csv .= ',"IDDossierAlter"';

$csv .= ',"Prostitution"';
$csv .= ',"Viol"';
$csv .= ',"EnCouple"';
$csv .= ',"DateDebut"';
$csv .= ',"DateFin"';
$csv .= ',"DateApx"';
$csv .= ',"TypeLienSexuel"';


$csv .= '
';


while($donnees = $rep->fetch()){

$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLienSexuel'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDRelation'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Prostitution'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Viol'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['EnCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateDebut'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateFin'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateApx'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['TypeLienSexuel'])).'"';

$csv .= '
';
}



$filename = "liensexuel.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

?>