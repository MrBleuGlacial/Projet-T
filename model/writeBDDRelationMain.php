<pre>
<?php
print_r($_POST);
?>
</pre>

<?php

include("../model/writeBDDFather.php");


$req = $bdd->prepare('INSERT INTO relation(IDAlter,IDEgo, IDCoteInitiale,
	TraceLienDossier, TypeLien, IDContexteSocioGeo)
	VALUES (:IDAlter, :IDEgo, :IDCoteInitiale, :TraceLienDossier, :TypeLien, :IDContexteSocioGeo)
	');

if($_POST['IDContexteSocioGeo']=='')
	$_POST['IDContexteSocioGeo']=NULL;
if($_POST['IDCoteInitiale']=='')
	$_POST['IDCoteInitiale']=NULL;

$req->execute(array(
	'IDAlter'=> $_POST['IDAlter'],
	'IDEgo' => $_POST['IDEgo'],
	'IDCoteInitiale' => $_POST['IDCoteInitiale'],
	'TraceLienDossier' => $_POST['TraceLienDossier'],
	'TypeLien' => $_POST['TypeLien'],
	'IDContexteSocioGeo' => $_POST['IDContexteSocioGeo']
	));

$req2 = $bdd->prepare('SELECT IDRelation FROM relation
	WHERE (
		IF(:IDContexteSocioGeo IS NULL, IDContexteSocioGeo IS NULL, IDContexteSocioGeo = :IDContexteSocioGeo) AND
		IF(:IDCoteInitiale IS NULL, IDCoteInitiale IS NULL, IDCoteInitiale = :IDCoteInitiale) AND
		IDAlter = :IDAlter AND
		IDEgo = :IDEgo AND
		TraceLienDossier = :TraceLienDossier AND
		TypeLien = :TypeLien
	)');

$req2->execute(array(
	'IDContexteSocioGeo' => $_POST['IDContexteSocioGeo'],
	'IDCoteInitiale' => $_POST['IDCoteInitiale'],
	'IDAlter' => $_POST['IDAlter'],
	'IDEgo' => $_POST['IDEgo'],
	'TraceLienDossier' => $_POST['TraceLienDossier'],
	'TypeLien' => $_POST['TypeLien']));

$donnees = $req2->fetch();


//-----------------------------------------------
if($_POST['TypeLien']=='financier'){
	$req3 = $bdd->prepare('INSERT INTO lienFinancier(IDRelation, IDActionEnContrepartie, DateFlux, DateFluxApx, IDFrequence,
		MontantEuro, IDModalite, IDIntermediaire, IDModalite2, IDIntermediaire2, IDLocalisationEgo, IDLocalisationAlter,
		Intermediaire, IDFlux, ActionDuFlux)
		VALUES (:IDRelation, :IDActionEnContrepartie, :DateFlux, :DateFluxApx, :IDFrequence,
		:MontantEuro, :IDModalite, :IDIntermediaire, :IDModalite2, :IDIntermediaire2, :IDLocalisationEgo, :IDLocalisationAlter,
		:Intermediaire, :IdentificationFlux, :ActionDuFlux)
		');

	if($_POST['DateFlux']=='')
		$_POST['DateFlux']=NULL;
	if($_POST['DateFluxApx']=='')
		$_POST['DateFluxApx']=NULL;
	if($_POST['IDActionEnContrepartie']=='')
		$_POST['IDActionEnContrepartie']=NULL;
	if($_POST['IDFrequence']=='')
		$_POST['IDFrequence']=NULL;
	if($_POST['IDModalite']=='')
		$_POST['IDModalite']=NULL;
	if($_POST['IDIntermediaire']=='')
		$_POST['IDIntermediaire']=NULL;
	if($_POST['IDModalite2']=='')
		$_POST['IDModalite2']=NULL;
	if($_POST['IDIntermediaire2']=='')
		$_POST['IDIntermediaire2']=NULL;
	if($_POST['IDLocalisationEgo']=='')
		$_POST['IDLocalisationEgo']=NULL;
	if($_POST['IDLocalisationAlter']=='')
		$_POST['IDLocalisationAlter']=NULL;



	$req3->execute(array(
		'IDRelation' => $donnees['IDRelation'], 
		'IDActionEnContrepartie' => $_POST['IDActionEnContrepartie'], 
		'DateFlux' => $_POST['DateFlux'],
		'DateFluxApx' => $_POST['DateFluxApx'], 
		'IDFrequence' => $_POST['IDFrequence'],
		'MontantEuro' => $_POST['MontantEuro'], 
		'IDModalite' => $_POST['IDModalite'], 
		'IDIntermediaire' => $_POST['IDIntermediaire'], 
		'IDModalite2' => $_POST['IDModalite2'], 
		'IDIntermediaire2' => $_POST['IDIntermediaire2'], 
		'IDLocalisationEgo' => $_POST['IDLocalisationEgo'], 
		'IDLocalisationAlter' => $_POST['IDLocalisationAlter'],
		'Intermediaire' => $_POST['Intermediaire'], 
		'IdentificationFlux' => $_POST['IdentificationFlux'], 
		'ActionDuFlux' => $_POST['ActionDuFlux']
	));
}

if($_POST['TypeLien']=='sang'){
	$req3 = $bdd->prepare('INSERT INTO lienSang(IDRelation, Type, Certification)
	VALUES (:IDRelation, :Type, :Certification)
	');

	$req3->execute(array(
	'IDRelation'=>$donnees['IDRelation'],
	'Type'=>$_POST['Type'],
	'Certification'=>$_POST['Certification']
	));
}

if($_POST['TypeLien']=='sexuel'){
	$req3 = $bdd->prepare('INSERT INTO lienSexuel(IDRelation, Prostitution, Viol, EnCouple,
	DateDebut, DateFin, DateApx, TypeLienSexuel)
	VALUES (:IDRelation, :Prostitution, :Viol, :EnCouple, :DateDebut, :DateFin, :DateApx, :TypeLienSexuel)
	');

	if($_POST['Prostitution']=='')
		$_POST['Prostitution']=NULL;
	if($_POST['Viol']=='')
		$_POST['Viol']=NULL;
	if($_POST['EnCouple']=='')
		$_POST['EnCouple']=NULL;
	if($_POST['DateDebut']=='')
		$_POST['DateDebut']=NULL;
	if($_POST['DateFin']=='')
		$_POST['DateFin']=NULL;
	if($_POST['DateApx']=='')
		$_POST['DateApx']=NULL;


	$req3->execute(array(
	'IDRelation' => $donnees['IDRelation'],
	'Prostitution' => $_POST['Prostitution'],
	'Viol' => $_POST['Viol'],
	'EnCouple' => $_POST['EnCouple'],
	'DateDebut' => $_POST['DateDebut'],
	'DateFin' => $_POST['DateFin'],
	'DateApx' => $_POST['DateApx'],
	'TypeLienSexuel' => $_POST['TypeLienSexuel']
	));
}

if($_POST['TypeLien']=='réseau'){
	$req3 = $bdd->prepare('INSERT INTO lienReseau(IDRelation, DateIdentification, DateIdentificationApx, IDLocalisationEgo, IDLocalisationAlter,
	Intermediaire, IDReseau, IDActionReseau, NoteAction)
	VALUES (:IDRelation, :DateIdentification, :DateIdentificationApx, :IDLocalisationEgo, :IDLocalisationAlter, :Intermediaire, :IDReseau, 
	:IDActionReseau, :NoteAction)
	');

	if($_POST['DateIdentification']=='')
		$_POST['DateIdentification']=NULL;
	if($_POST['DateIdentificationApx']=='')
		$_POST['DateIdentificationApx']=NULL;
	if($_POST['IDLocalisationEgo']=='')
		$_POST['IDLocalisationEgo']=NULL;
	if($_POST['IDLocalisationAlter']=='')
		$_POST['IDLocalisationAlter']=NULL;
	if($_POST['IDActionReseau']=='')
		$_POST['IDActionReseau']=NULL;

	$req3->execute(array(
	'IDRelation' => $donnees['IDRelation'],
	'DateIdentification' => $_POST['DateIdentification'],
	'DateIdentificationApx' => $_POST['DateIdentificationApx'],
	'IDLocalisationEgo' => $_POST['IDLocalisationEgo'],
	'IDLocalisationAlter' => $_POST['IDLocalisationAlter'],
	'Intermediaire' => $_POST['Intermediaire'],
	'IDReseau' => $_POST['IDReseau'],
	'IDActionReseau' => $_POST['IDActionReseau'],
	'NoteAction' => $_POST['NoteAction']
	));
}

if($_POST['TypeLien']=='connaissance'){
	$req3 = $bdd->prepare('INSERT INTO lienConnaissance(IDRelation, PremierEvenement, IDLocalisationEgo, IDLocalisationAlter)
	VALUES (:IDRelation, :PremierEvenement, :IDLocalisationEgo, :IDLocalisationAlter)
	');

	if($_POST['IDLocalisationEgo']=='')
		$_POST['IDLocalisationEgo']=NULL;
	if($_POST['IDLocalisationAlter']=='')
		$_POST['IDLocalisationAlter']=NULL;

	$req3->execute(array(
	'IDRelation' => $donnees['IDRelation'],
	'PremierEvenement' => $_POST['PremierEvenement'],
	'IDLocalisationEgo' => $_POST['IDLocalisationEgo'],
	'IDLocalisationAlter' => $_POST['IDLocalisationAlter']
	));
}

if($_POST['TypeLien']=='juju'){
	$req3 = $bdd->prepare('INSERT INTO lienJuju(IDRelation, Date, IDLocalisationCeremonie, IDFonctionAlterJuju, 
	IDFonctionEgoJuju, IDJuju)
	VALUES (:IDRelation, :Date, :IDLocalisationCeremonie, :IDFonctionAlterJuju, :IDFonctionEgoJuju, :IDJuju)
	');

	if($_POST['Date']=='')
		$_POST['Date']=NULL;
	if($_POST['IDLocalisationCeremonie']=='')
		$_POST['IDLocalisationCeremonie']=NULL;
	if($_POST['IDFonctionAlterJuju']=='')
		$_POST['IDFonctionAlterJuju']=NULL;
	if($_POST['IDFonctionEgoJuju']=='')
		$_POST['IDFonctionEgoJuju']=NULL;

	$req3->execute(array(
	'IDRelation' => $donnees['IDRelation'],
	'Date' => $_POST['Date'],
	'IDLocalisationCeremonie' => $_POST['IDLocalisationCeremonie'],
	'IDFonctionAlterJuju' => $_POST['IDFonctionAlterJuju'],
	'IDFonctionEgoJuju' => $_POST['IDFonctionEgoJuju'],
	'IDJuju' => $_POST['IDJuju']
	));
}

if($_POST['TypeLien']=='soutien'){
	$req3 = $bdd->prepare('INSERT INTO lienSoutien(IDRelation, DatePremierContact, DatePremierContactApx, IDTypeSoutien, Intermediaire, IDSoutien)
	VALUES (:IDRelation, :DatePremierContact, :DatePremierContactApx, :IDTypeSoutien, :Intermediaire, :IDSoutien)
	');

	if($_POST['IDTypeSoutien']=='')
		$_POST['IDTypeSoutien']=NULL;
	if($_POST['DatePremierContact']=='')
		$_POST['DatePremierContact']=NULL;
	if($_POST['DatePremierContactApx']=='')
		$_POST['DatePremierContactApx']=NULL;
	if($_POST['Intermediaire']=='')
		$_POST['Intermediaire']=NULL;


	$req3->execute(array(
		'IDRelation' => $donnees['IDRelation'], 
		'DatePremierContact' => $_POST['DatePremierContact'],
		'DatePremierContactApx' => $_POST['DatePremierContactApx'],
		'IDTypeSoutien' => $_POST['IDTypeSoutien'], 
		'Intermediaire'=> $_POST['Intermediaire'], 
		'IDSoutien' => $_POST['IDSoutien']
	));
}	

echo '------ '.$donnees['IDRelation'].' ------';

$url = 'Location: ../view/index.php?relationView=1&modeWrite=main&modeRead='
.$_POST['TypeLien'].'&subMode='.$_POST['TypeLien'];
header($url); 