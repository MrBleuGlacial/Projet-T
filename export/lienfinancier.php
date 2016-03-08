<?php

include("../model/BDDAccess.php");
include("../model/readBDD.php"); 

$rep = readLienFinancier();
$csv = "";

$csv .= '"IDLienFinancier"';
$csv .= ',"IDRelation"';

$csv .= ',"IDEgo"';
$csv .= ',"PrenomEgo"';
$csv .= ',"NomEgo"';
$csv .= ',"IDDossierEgo"';

$csv .= ',"IDAlter"';
$csv .= ',"PrenomAlter"';
$csv .= ',"NomAlter"';
$csv .= ',"IDDossierAlter"';

$csv .= ',"IDActionEnContrepartie"';
$csv .= ',"ActionEnContrepartie"';
$csv .= ',"DateFlux"';
$csv .= ',"DateFluxApx"';
$csv .= ',"IDFrequence"';
$csv .= ',"Frequence"';
$csv .= ',"MontantEuro"';
$csv .= ',"Modalite1"';
$csv .= ',"Modalite2"';

$csv .= ',"IDIntermediaire"';
$csv .= ',"PrenomIntermediaire1"';
$csv .= ',"NomIntermediaire1"';

$csv .= ',"IDIntermediaire2"';
$csv .= ',"PrenomIntermediaire2"';
$csv .= ',"NomIntermediaire2"';

$csv .= ',"Intermediaire"';

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

$csv .= ',"ActionDuFlux"';
$csv .= ',"IDFlux"';
$csv .= '
';

while($donnees = $rep->fetch()){
$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLienFinancier'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDRelation'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDActionEnContrepartie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ActionEnContrepartie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateFlux'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateFluxApx'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDFrequence'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Frequence'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['MontantEuro'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Modalite1'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Modalite2'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDIntermediaire'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomIntermediaire1'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomIntermediaire1'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDIntermediaire2'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomIntermediaire2'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomIntermediaire2'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Intermediaire'])).'"';

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

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ActionDuFlux'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDFlux'])).'"';
$csv .= '
';
}

/*
?>
<pre>
<?php print_r($rep->fetchAll()); ?>
</pre>
<?php
*/

$filename = "lienfinancier.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

?>