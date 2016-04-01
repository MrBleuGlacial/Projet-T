<?php


/**
*Permet l'exportation sous forme de .csv
*de la table relative aux personnes ainsi que
*ses attributs admin et familiaux.
*/

/**
*
*/
include("../model/BDDAccess.php");
/**
*
*/
include("../model/readBDD.php"); 

/*
echo 'count/2 : '.(count($donnees[0])/2).'<br>';

//for($i = 0; $i < count($donnees); $i++){
	for($j = 0; $j < (count($donnees[193])/2);$j++){
		if($donnees[193][$j]!= NULL) echo $donnees[193][$j].'<br>';
		else { echo '-<br>';}
	}
//}
*/
/*
?>
<pre>
<?php print_r($donnees); ?>
</pre>
<?php
*/

$rep = readPersonneMain();
$csv = "";

$csv .= '"IDPersonne"';
$csv .= ',"IDDossier"';
$csv .= ',"Prenom"';
$csv .= ',"Nom"';
$csv .= ',"IDCoteInitiale"';
$csv .= ',"NomCoteInitiale"';
$csv .= ',"TypePersonne"';
$csv .= ',"Sexe"';
$csv .= ',"DateNaissance"';
$csv .= ',"Nationalite"';
$csv .= ',"SeProstitue"';
$csv .= ',"IDPaysNaissance"';
$csv .= ',"PaysNaissance"';
$csv .= ',"IDVilleNaissance"';
$csv .= ',"VilleNaissance"';
$csv .= ',"IDProfessionAvantMigration"';
$csv .= ',"ProfessionAvantMigration"';
$csv .= ',"IDProfessionDurantInterrogatoire"';
$csv .= ',"ProfessionDurantInterrogatoire"';
$csv .= ',"DetteEnCours"';
$csv .= ',"DetteInitiale"';
$csv .= ',"DetteRenegociee"';
$csv .= ',"DateDettePayee"';
$csv .= ',"DateEstRecrute"';
$csv .= ',"DateRecrute"';
$csv .= ',"Diplome"';

$csv .= ',"Pere"';
$csv .= ',"Mere"';
$csv .= ',"RuptureParentale"';
$csv .= ',"Fratrie"';
$csv .= ',"PositionFratrie"';
$csv .= ',"SituationMatrimoniale"';
$csv .= ',"ValidationSource"';
$csv .= ',"VitEnCouple"';
$csv .= ',"IDLocalisationCouple"';
$csv .= ',"PaysLocalisationCouple"';
$csv .= ',"VilleLocalisationCouple"';
$csv .= ',"AdresseLocalisationCouple"';
$csv .= ',"CodePostalLocalisationCouple"';
$csv .= ',"Enceinte"';
$csv .= ',"EnfantPaysOrigine"';
$csv .= ',"MaisonNigeria"';

$csv .= ',"NumEtranger"';
$csv .= ',"NumRecepisse"';
$csv .= ',"NumRecoursOFPRA"';
$csv .= ',"DebutValRecepisse"';
$csv .= ',"FinValRecepisse"';
$csv .= ',"NumOQTF"';
$csv .= ',"DebutOQTF"';
$csv .= ',"FinOQTF"';
$csv .= ',"NumSejour"';
$csv .= ',"DebutValSejour"';
$csv .= ',"FinValSejour"';
$csv .= ',"CarteNationale"';
$csv .= ',"PrestationSociale"';
$csv .= ',"ModeMigration"';
$csv .= ',"ArriveeEurope"';
$csv .= ',"ArriveeEuropeApx"';
$csv .= ',"ArriveeFrance"';
$csv .= ',"ArriveeFranceApx"';
$csv .= ',"Prison"';
$csv .= ',"IDPaysTransit1"';
$csv .= ',"PaysTransit1"';
$csv .= ',"IDPaysTransit2"';
$csv .= ',"PaysTransit2"';
$csv .= ',"Prison"';

$csv .= ',"Liste Alias"';
$csv .= ',"Liste Cote"';
$csv .= ',"Liste Cote Familial"';
$csv .= ',"Liste Cote Admin"';
$csv .= ',"Liste Langue"';
$csv .= ',"Liste Role"';
$csv .= ',"Liste Telephone"';
$csv .= ',"Liste Similaire"';

$csv .= ',"Liste Passport"';
$csv .= ',"Liste Localisation"';

$csv .= '
';


while($donnees = $rep->fetch()){
$csv .= '"'.str_replace(',','',str_replace('"', '\'',$donnees['IDPersonne'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDDossier'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Prenom'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Nom'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDCoteInitiale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NomCoteInitiale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['TypePersonne'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Sexe'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateNaissance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Nationalite'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['SeProstitue'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDPaysNaissance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysNaissance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDVilleNaissance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['VilleNaissance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDProfessionAvantMigration'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ProfessionAvantMigration'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDProfessionDurantInterrogatoire'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ProfessionDurantInterrogatoire'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DetteEnCours'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DetteInitiale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DetteRenegociee'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateDettePayee'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateEstRecrute'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DateRecrute'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Diplome'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Pere'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Mere'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['RuptureParentale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Fratrie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PositionFratrie'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['SituationMatrimoniale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ValidationSource'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['VitEnCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDLocalisationCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysLocalisationCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['VilleLocalisationCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['AdresseLocalisationCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['CodePostalLocalisationCouple'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Enceinte'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['EnfantPaysOrigine'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['MaisonNigeria'])).'"';

$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NumEtranger'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NumRecepisse'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NumRecoursOFPRA'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DebutValRecepisse'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['FinValRecepisse'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NumOQTF'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DebutOQTF'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['FinOQTF'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['NumSejour'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['DebutValSejour'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['FinValSejour'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['CarteNationale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PrestationSociale'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ModeMigration'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ArriveeEurope'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ArriveeEuropeApx'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ArriveeFrance'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['ArriveeFranceApx'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Prison'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDPaysTransit1'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysTransit1'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['IDPaysTransit2'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['PaysTransit2'])).'"';
$csv .= ',"'.str_replace(',','',str_replace('"', '\'',$donnees['Prison'])).'"';

//---------- LISTE ALIAS ----------
$rep2 = readAllAssociationTable($donnees['IDPersonne'],'personneToAlias','alias','IDAlias');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
        .str_replace(',','',str_replace('\'','',$donnees2['Alias'])).'/'
        .str_replace(',','',str_replace('\'','',$donnees2['NomCote']))
        .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------

//---------- LISTE COTE ----------
$rep2 = readPersonneToCoteAssociationWhere($donnees['IDPersonne'],'personneToCote');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''.str_replace(',','',str_replace('\'','',$donnees2['NomCote'])) . '\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//--------------------------------

//---------- LISTE COTE FAM-------
$rep2 = readPersonneToCoteAssociationWhere($donnees['IDPersonne'],'personneToCoteFam');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''.str_replace(',','',str_replace('\'','',$donnees2['NomCote'])) . '\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//--------------------------------

//---------- LISTE COTE ADM-------
$rep2 = readPersonneToCoteAssociationWhere($donnees['IDPersonne'],'personneToCoteAdm');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''.str_replace(',','',str_replace('\'','',$donnees2['NomCote'])) . '\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//--------------------------------

//---------- LISTE LANGUE ----------
$rep2 = readAllAssociationTable($donnees['IDPersonne'],'personneToLangue','langue','IDLangue');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
        .str_replace(',','',str_replace('\'','',$donnees2['Langue'])).'/' 
        .str_replace(',','',str_replace('\'','',$donnees2['NomCote']))
        .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------

//---------- LISTE ROLE ----------
$rep2 = readAllAssociationTable($donnees['IDPersonne'],'personneToRole','role','IDRole');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
    .str_replace(',','',str_replace('\'','',$donnees2['Role'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['DebutRole'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['FinRole'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['PeriodeMois'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['PeriodeAnnee'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['IdentifiantQuali'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['NomCote']))
    .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------

//------ LISTE TELEPHONE ----------
$rep2 = readAllAssociationTable($donnees['IDPersonne'],'personneToTelephone','telephone','IDTelephone');
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
    .str_replace(',','',str_replace('\'','',$donnees2['NumTelephone'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['NomCote']))
    .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------

//------ LISTE SIMILAIRE ----------
$rep2 = readAllTableWhere('possibiliteSimilaire','IDPersonneMajeure = '.$donnees['IDPersonne']);
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
    .str_replace(',','',str_replace('\'','',$donnees2['IDPersonneMineure']))
    .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------

//------ LISTE PASSPORT ----------
$rep2 = readPassportAssociation($donnees['IDPersonne']);
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
    .str_replace(',','',str_replace('\'','',$donnees2['NationalitePassport'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['NumPassport'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['DebutValPassport'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['FinValPassport'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['NomCote']))
    .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------

//------ LISTE LOCALISATION ----------
$rep2 = readLocalisationAssociation($donnees['IDPersonne']);
$csv .= ',"';
while($donnees2 = $rep2->fetch())
{
    $csv .= '\''
    .str_replace(',','',str_replace('\'','',$donnees2['Pays'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['Ville'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['CodePostal'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['Adresse'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['DateDebutApx'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['DateFinApx'])).'/'
    .str_replace(',','',str_replace('\'','',$donnees2['NomCote']))
    .'\',';
}
if(substr($csv, -1)==',')
	$csv = substr($csv,0,-1);
$csv .= '"';
//---------------------------------





$csv .= '
';	
}

$filename = "personne.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $csv;

//echo '"Ban","ane" <br> "1","1"';


//exit;

?>