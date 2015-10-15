<pre>
<?php
print_r($_POST);
?>
</pre>

<?php

include("../model/writeBDDFather.php");


$req = $bdd->prepare('INSERT INTO relation(IDAlter,IDEgo,TraceLienDossier,
	TypeLien, IDContexteSocioGeo)
	VALUES (:IDAlter, :IDEgo, :TraceLienDossier, :TypeLien, :IDContexteSocioGeo)
	');

if($_POST['IDContexteSocioGeo']=='')
	$_POST['IDContexteSocioGeo']=NULL;

$req->execute(array(
	'IDAlter'=> $_POST['IDAlter'],
	'IDEgo' => $_POST['IDEgo'],
	'TraceLienDossier' => $_POST['TraceLienDossier'],
	'TypeLien' => $_POST['TypeLien'],
	'IDContexteSocioGeo' => $_POST['IDContexteSocioGeo']
	));

$req2 = $bdd->prepare('SELECT IDRelation FROM relation
	WHERE (
		IF(:IDContexteSocioGeo IS NULL, IDContexteSocioGeo IS NULL, IDContexteSocioGeo = :IDContexteSocioGeo) AND
		IDAlter = :IDAlter AND
		IDEgo = :IDEgo AND
		TraceLienDossier = :TraceLienDossier AND
		TypeLien = :TypeLien
	)');

$req2->execute(array(
	'IDContexteSocioGeo' => $_POST['IDContexteSocioGeo'],
	'IDAlter' => $_POST['IDAlter'],
	'IDEgo' => $_POST['IDEgo'],
	'TraceLienDossier' => $_POST['TraceLienDossier'],
	'TypeLien' => $_POST['TypeLien']));

$donnees = $req2->fetch();


//-----------------------------------------------
if($_POST['TypeLien']=='financier'){
	$req3 = $bdd->prepare('INSERT INTO lienFinancier(IDRelation, IDActionEnContrepartie, DateFlux, IDFrequence,
		MontantEuro, IDModalite, IDIntermediaire, IDModalite2, IDIntermediaire2, IDLocalisationEgo, IDLocalisationAlter,
		Intermediaire, IdentificationFlux, ActionDuFlux)
		VALUES (:IDRelation, :IDActionEnContrepartie, :DateFlux, :IDFrequence,
		:MontantEuro, :IDModalite, :IDIntermediaire, :IDModalite2, :IDIntermediaire2, :IDLocalisationEgo, :IDLocalisationAlter,
		:Intermediaire, :IdentificationFlux, :ActionDuFlux)
		');

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
	DateDebut, DateFin, TypeLienSexuel)
	VALUES (:IDRelation, :Prostitution, :Viol, :EnCouple, :DateDebut, :DateFin, :TypeLienSexuel)
	');

	$req3->execute(array(
	'IDRelation' => $donnees['IDRelation'],
	'Prostitution' => $_POST['Prostitution'],
	'Viol' => $_POST['Viol'],
	'EnCouple' => $_POST['EnCouple'],
	'DateDebut' => $_POST['DateDebut'],
	'DateFin' => $_POST['DateFin'],
	'TypeLienSexuel' => $_POST['TypeLienSexuel']
	));
}

if($_POST['TypeLien']=='réseau'){
	$req3 = $bdd->prepare('INSERT INTO lienReseau(IDRelation, DateIdentification, IDLocalisationEgo, IDLocalisationAlter,
	Intermediaire, IDReseau, IDActionReseau, NoteAction)
	VALUES (:IDRelation, :DateIdentification, :IDLocalisationEgo, :IDLocalisationAlter, :Intermediaire, :IDReseau, 
	:IDActionReseau, :NoteAction)
	');

	if($_POST['IDLocalisationEgo']=='')
		$_POST['IDLocalisationEgo']=NULL;
	if($_POST['IDLocalisationAlter']=='')
		$_POST['IDLocalisationAlter']=NULL;
	if($_POST['IDActionReseau']=='')
		$_POST['IDActionReseau']=NULL;

	$req3->execute(array(
	'IDRelation' => $donnees['IDRelation'],
	'DateIdentification' => $_POST['DateIdentification'],
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
	$req3 = $bdd->prepare('INSERT INTO lienSoutien(IDRelation, DatePremierContact, IDTypeSoutien, Intermediaire, IDSoutien)
	VALUES (:IDRelation, :DatePremierContact, :IDTypeSoutien, :Intermediaire, :IDSoutien)
	');

	if($_POST['IDTypeSoutien']=='')
		$_POST['IDTypeSoutien']=NULL;

	$req3->execute(array(
		'IDRelation' => $donnees['IDRelation'], 
		'DatePremierContact' => $_POST['DatePremierContact'],
		'IDTypeSoutien' => $_POST['IDTypeSoutien'], 
		'Intermediaire'=> $_POST['Intermediaire'], 
		'IDSoutien' => $_POST['IDSoutien']
	));
}	

echo '------ '.$donnees['IDRelation'].' ------';