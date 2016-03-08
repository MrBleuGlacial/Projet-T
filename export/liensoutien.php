<?php

include("../model/BDDAccess.php");
include("../model/readBDD.php"); 

$rep = readLienSoutien();
$csv = "";

$csv .='"IDLienSoutien"';
$csv .= ',"IDRelation"';

$csv .= ',"IDEgo"';
$csv .= ',"PrenomEgo"';
$csv .= ',"NomEgo"';
$csv .= ',"IDDossierEgo"';

$csv .= ',"IDAlter"';
$csv .= ',"PrenomAlter"';
$csv .= ',"NomAlter"';
$csv .= ',"IDDossierAlter"';

$csv .= ',"DatePremierContact"';
$csv .= ',"DatePremierContactApx"';
$csv .= ',"IDTypeSoutien"';
$csv .= ',"TypeSoutien"';
$csv .= ',"Intermediaire"';
$csv .= ',"IDSoutien"';

$csv .= '
';


while($donnees = $rep->fetch()){

$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLienSoutien'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDRelation'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DatePremierContact'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DatePremierContactApx'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDTypeSoutien'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['TypeSoutien'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Intermediaire'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDSoutien'])).'"';

$csv .= '
';
}

$filename = "liensoutien.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

?>