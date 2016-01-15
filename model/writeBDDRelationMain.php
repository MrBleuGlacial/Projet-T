
<!--
<pre>
<?php
print_r($_POST);
?>
</pre>
-->

<?php

include("../model/writeBDDFather.php");

$IDOldRelation = NULL;
if(isset($_POST['IDOldRelation']))
{
	$IDOldRelation = $_POST['IDOldRelation'];
}


//---------- On cherche si la structure existe déjà ----------
$req2 = $bdd->prepare('SELECT IDRelation FROM relation
	WHERE (
		IF(:IDContexteSocioGeo IS NULL, IDContexteSocioGeo IS NULL, IDContexteSocioGeo = :IDContexteSocioGeo) AND
		IDAlter = :IDAlter AND
		IDEgo = :IDEgo AND
		TraceLienDossier = :TraceLienDossier AND
		TypeLien = :TypeLien
	)');

if($_POST['IDContexteSocioGeo']=='')
		$_POST['IDContexteSocioGeo']=NULL;

$req2->execute(array(
	'IDContexteSocioGeo' => $_POST['IDContexteSocioGeo'],
	'IDAlter' => $_POST['IDAlter'],
	'IDEgo' => $_POST['IDEgo'],
	'TraceLienDossier' => $_POST['TraceLienDossier'],
	'TypeLien' => $_POST['TypeLien']));

$donnees = $req2->fetch();

//------------------------------------------------------------


//---------- On crée la structure si elle n'existe pas ----------
if($donnees == NULL){
?><pre><?php
print_r($donnees);
?></pre><?php
	$req = $bdd->prepare('INSERT INTO relation(IDAlter,IDEgo,
		TraceLienDossier, TypeLien, IDContexteSocioGeo)
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

}





//-----------------------------------------------

if($_POST['TypeLien']=='financier'){
	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
	$req3 = $bdd->prepare('UPDATE lienFinancier SET IDRelation = :IDRelation, IDActionEnContrepartie = :IDActionEnContrepartie, 
		DateFlux = :DateFlux, DateFluxApx = :DateFluxApx, IDFrequence = :IDFrequence,
		MontantEuro = :MontantEuro, IDModalite = :IDModalite, IDIntermediaire = :IDIntermediaire, 
		IDModalite2 = :IDModalite2, IDIntermediaire2 = :IDIntermediaire2, IDLocalisationEgo = :IDLocalisationEgo, 
		IDLocalisationAlter = :IDLocalisationAlter, Intermediaire = :Intermediaire, 
		IDFlux = :IdentificationFlux, ActionDuFlux = :ActionDuFlux WHERE IDLienFinancier = '.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienFinancier(IDRelation, IDActionEnContrepartie, DateFlux, DateFluxApx, IDFrequence,
			MontantEuro, IDModalite, IDIntermediaire, IDModalite2, IDIntermediaire2, IDLocalisationEgo, IDLocalisationAlter,
			Intermediaire, IDFlux, ActionDuFlux)
			VALUES (:IDRelation, :IDActionEnContrepartie, :DateFlux, :DateFluxApx, :IDFrequence,
			:MontantEuro, :IDModalite, :IDIntermediaire, :IDModalite2, :IDIntermediaire2, :IDLocalisationEgo, :IDLocalisationAlter,
			:Intermediaire, :IdentificationFlux, :ActionDuFlux)
			');
	}

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

//-----------------------------------------------

if($_POST['TypeLien']=='sang'){
	
	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req3 = $bdd->prepare('UPDATE lienSang SET IDRelation = :IDRelation, 
		Type = :Type, Certification = :Certification WHERE IDLienSang = '.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienSang(IDRelation, Type, Certification)
		VALUES (:IDRelation, :Type, :Certification)
		');
	}

	$req3->execute(array(
	'IDRelation'=>$donnees['IDRelation'],
	'Type'=>$_POST['Type'],
	'Certification'=>$_POST['Certification']
	));
}

//-----------------------------------------------

if($_POST['TypeLien']=='sexuel'){
	
	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req3 = $bdd->prepare('UPDATE lienSexuel SET IDRelation = :IDRelation, Prostitution = :Prostitution, 
		Viol = :Viol, EnCouple = :EnCouple,	DateDebut = :DateDebut, DateFin = :DateFin, 
		DateApx = :DateApx, TypeLienSexuel = :TypeLienSexuel WHERE IDLienSexuel ='.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienSexuel(IDRelation, Prostitution, Viol, EnCouple,
		DateDebut, DateFin, DateApx, TypeLienSexuel)
		VALUES (:IDRelation, :Prostitution, :Viol, :EnCouple, :DateDebut, :DateFin, :DateApx, :TypeLienSexuel)
		');
	}

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

//-----------------------------------------------

if($_POST['TypeLien']=='réseau'){

	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req3 = $bdd->prepare('UPDATE lienReseau SET IDRelation = :IDRelation, DateIdentification = :DateIdentification, 
		DateIdentificationApx = :DateIdentificationApx, IDLocalisationEgo = :IDLocalisationEgo, 
		IDLocalisationAlter = :IDLocalisationAlter, Intermediaire = :Intermediaire, IDReseau = :IDReseau, 
		IDActionReseau = :IDActionReseau, NoteAction = :NoteAction WHERE IDLienReseau = '.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienReseau(IDRelation, DateIdentification, DateIdentificationApx, IDLocalisationEgo, IDLocalisationAlter,
		Intermediaire, IDReseau, IDActionReseau, NoteAction)
		VALUES (:IDRelation, :DateIdentification, :DateIdentificationApx, :IDLocalisationEgo, :IDLocalisationAlter, :Intermediaire, :IDReseau, 
		:IDActionReseau, :NoteAction)
		');
	}

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

//-----------------------------------------------

if($_POST['TypeLien']=='connaissance'){

	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req3 = $bdd->prepare('UPDATE lienConnaissance SET IDRelation = :IDRelation, PremierEvenement = :PremierEvenement, 
		IDLocalisationEgo = :IDLocalisationEgo, IDLocalisationAlter = :IDLocalisationAlter WHERE IDLienConnaissance = '.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienConnaissance(IDRelation, PremierEvenement, IDLocalisationEgo, IDLocalisationAlter)
		VALUES (:IDRelation, :PremierEvenement, :IDLocalisationEgo, :IDLocalisationAlter)
		');
	}

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

//-----------------------------------------------

if($_POST['TypeLien']=='juju'){

	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req3 = $bdd->prepare('UPDATE lienJuju SET IDRelation = :IDRelation, Date = :Date, 
		IDLocalisationCeremonie = :IDLocalisationCeremonie, IDFonctionAlterJuju = :IDFonctionAlterJuju, 
		IDFonctionEgoJuju = :IDFonctionEgoJuju, IDJuju = :IDJuju WHERE IDLienJuju = '.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienJuju(IDRelation, Date, IDLocalisationCeremonie, IDFonctionAlterJuju, 
		IDFonctionEgoJuju, IDJuju)
		VALUES (:IDRelation, :Date, :IDLocalisationCeremonie, :IDFonctionAlterJuju, :IDFonctionEgoJuju, :IDJuju)
		');
	}

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

//-----------------------------------------------

if($_POST['TypeLien']=='soutien'){

	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req3 = $bdd->prepare('UPDATE lienSoutien SET IDRelation = :IDRelation, DatePremierContact = :DatePremierContact, 
		DatePremierContactApx = :DatePremierContactApx, IDTypeSoutien = :IDTypeSoutien, 
		Intermediaire = :Intermediaire, IDSoutien = :IDSoutien WHERE IDLienSoutien = '.$_POST['IDLien']);
	}
	else{
		$req3 = $bdd->prepare('INSERT INTO lienSoutien(IDRelation, DatePremierContact, DatePremierContactApx, IDTypeSoutien, Intermediaire, IDSoutien)
		VALUES (:IDRelation, :DatePremierContact, :DatePremierContactApx, :IDTypeSoutien, :Intermediaire, :IDSoutien)
		');
	}

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




//---------------------------------------------------------------
//TODO : ON VERIFIE SI L'ANCIENNE STRUCTURE DE RELATION EST REFERENCEE PAR LES TABLES LIEN SINON ON LA DETRUIT
//----- WARNING ----- : 
//FAIRE ATTENTION DE REDIRIGE LES RELATIONTOCOTE CONVENABLEMENT DE LA VIEILLE STRUCTURE A LA NOUVELLE!!
if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
	$isRef = 0;
	
	$reqTest = $bdd->query('SELECT * FROM lienConnaissance WHERE IDLienConnaissancePrimaire = '.$IDOldRelation)->fetch();
	if($reqTest != NULL) $isRef++;
	//REITERER POUR CHAQUE TABLE

	//PEUT ETRE PEUT ON OPTIMISER POUR EVITER DE SE MANGER 7 REQUETES SIMULTANEMENT ?

}
//---------------------------------------------------------------




$url = 'Location: ../view/index.php?relationView=1&modeWrite=main&modeRead='
.$_POST['TypeLien'].'&subMode='.$_POST['TypeLien'];
header($url); 