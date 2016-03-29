<?php
/**
*Export des liens de connaissance en csv.
*/
/**
*
*/
include("../model/BDDAccess.php");
include("../model/readBDD.php"); 

$rep = readLienConnaissance();
$csv = "";

$csv .= '"IDLienConnaissance"';
$csv .= ',"IDRelation"';

$csv .= ',"IDEgo"';
$csv .= ',"PrenomEgo"';
$csv .= ',"NomEgo"';
$csv .= ',"IDDossierEgo"';

$csv .= ',"IDAlter"';
$csv .= ',"PrenomAlter"';
$csv .= ',"NomAlter"';
$csv .= ',"IDDossierAlter"';

$csv .= ',"PremierEvenement"';

$csv .= ',"IDLocalisationEgo"';
$csv .= ',"PaysEgo"';
$csv .= ',"VilleEgo"';
$csv .= ',"AdresseEgo"';
$csv .= ',"CodePostalEgo"';

$csv .= ',"IDLocalisationAlter"';
$csv .= ',"PaysAlter"';
$csv .= ',"VilleAlter"';
$csv .= ',"AdresseAlter"';
$csv .= ',"CodePostalAlter"';

$csv .= ',"ContactDirect"';
$csv .= ',"LienOriente"';

$csv .= '
';

while($donnees = $rep->fetch()){
$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLienConnaissance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDRelation'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PremierEvenement'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLocalisationEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['VilleEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['AdresseEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['CodePostalEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLocalisationAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['VilleAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['AdresseAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['CodePostalAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ContactDirect'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['LienOriente'])).'"';

$csv .= '
';
}


$filename = "lienconnaissance.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

?>