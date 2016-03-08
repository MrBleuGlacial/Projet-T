<?php

include("../model/BDDAccess.php");
include("../model/readBDD.php"); 

$rep = readLienReseau();
$csv = "";

$csv .= '"IDLienReseau"';
$csv .= ',"IDRelation"';

$csv .= ',"IDEgo"';
$csv .= ',"PrenomEgo"';
$csv .= ',"NomEgo"';
$csv .= ',"IDDossierEgo"';

$csv .= ',"IDAlter"';
$csv .= ',"PrenomAlter"';
$csv .= ',"NomAlter"';
$csv .= ',"IDDossierAlter"';

$csv .= ',"IDActionReseau"';
$csv .= ',"ActionReseau"';
$csv .= ',"DateIdentification"';
$csv .= ',"DateIdentificationApx"';
$csv .= ',"NoteAction"';

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

$csv .= ',"IDReseau"';

$csv .= '
';

while($donnees = $rep->fetch()){
$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLienReseau'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDRelation'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomEgo'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierEgo'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrenomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomAlter'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossierAlter'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDActionReseau'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ActionReseau'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateIdentification'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateIdentificationApx'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NoteAction'])).'"';

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

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDReseau'])).'"';

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

$filename = "lienreseau.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

?>