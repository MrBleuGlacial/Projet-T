<?php

include("../model/BDDAccess.php");
include("../model/readBDD.php"); 

$rep = readLienJuju();
$csv = "";

$csv .='"IDLienJuju"';
$csv .= ',"IDRelation"';

$csv .= ',"IDEgo"';
$csv .= ',"PrenomEgo"';
$csv .= ',"NomEgo"';
$csv .= ',"IDDossierEgo"';

$csv .= ',"IDAlter"';
$csv .= ',"PrenomAlter"';
$csv .= ',"NomAlter"';
$csv .= ',"IDDossierAlter"';

$csv .= ',"Date"';

$csv .= ',"IDFonctionAlterJuju"';
$csv .= ',"FonctionJujuAlter"';
$csv .= ',"IDFonctionEgoJuju"';
$csv .= ',"FonctionJujuEgo"';

$csv .= ',"IDLocalisationCeremonie"';
$csv .= ',"PaysCeremonie"';
$csv .= ',"VilleCeremonie"';
$csv .= ',"AdresseCeremonie"';
$csv .= ',"CodePostalCeremonie"';

$csv .= ',"IDJuju"';

$csv .= '
';


while($donnees = $rep->fetch()){
$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLienJuju'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDRelation'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Date'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDFonctionAlterJuju'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['FonctionJujuAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDFonctionEgoJuju'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['FonctionJujuEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLocalisationCeremonie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysCeremonie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['VilleCeremonie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['AdresseCeremonie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['CodePostalCeremonie'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDJuju'])).'"';

$csv .= '
';
}



$filename = "lienjuju.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

?>