
<?php
/**
*Gère les requêtes d'écriture et de modification relatives aux attributs.
*/
/**
*
*/

include("../model/writeBDDFather.php");



if($_POST['attributsMode']=='familiaux'){

	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod' AND isset($_POST['IDPersonne']))
	{
		$req = $bdd->prepare('UPDATE attributsFamiliaux SET IDPersonneFam = :IDPersonne,
		Pere = :Pere, Mere = :Mere, RuptureParentale = :RuptureParentale, Fratrie = :Fratrie,
		PositionFratrie = :PositionFratrie, SituationMatrimoniale = :SituationMatrimoniale,
		ValidationSource = :ValidationSource, VitEnCouple = :VitEnCouple,
		IDLocalisationCouple = :IDLocalisationCouple, Enceinte = :Enceinte,
		EnfantPaysOrigine = :EnfantPaysOrigine, MaisonNigeria = :MaisonNigeria
		WHERE IDPersonneFam = '.$_POST['IDPersonne']);
	}
	else
	{
		$req = $bdd->prepare('INSERT INTO attributsFamiliaux(IDPersonneFam,
		Pere,Mere,RuptureParentale,Fratrie,PositionFratrie,SituationMatrimoniale,
		ValidationSource,VitEnCouple,IDLocalisationCouple,Enceinte,EnfantPaysOrigine,MaisonNigeria)
		VALUES (:IDPersonne, :Pere, :Mere, :RuptureParentale, :Fratrie, :PositionFratrie, :SituationMatrimoniale,
		:ValidationSource, :VitEnCouple, :IDLocalisationCouple, :Enceinte, :EnfantPaysOrigine, :MaisonNigeria
		)');
	}

	if($_POST['PositionFratrie']=='')
		$_POST['PositionFratrie']=NULL;
	if($_POST['Fratrie']=='')
		$_POST['Fratrie']=NULL;
	if($_POST['VitEnCouple']=='')
		$_POST['VitEnCouple']=NULL;
	if($_POST['Enceinte']=='')
		$_POST['Enceinte']=NULL;
	if($_POST['IDLocalisationCouple']=='')
		$_POST['IDLocalisationCouple']=NULL;
	if($_POST['EnfantPaysOrigine']=='')
		$_POST['EnfantPaysOrigine']=NULL;
	if($_POST['MaisonNigeria']=='')
		$_POST['MaisonNigeria']=NULL;

	$req->execute(array(
		'IDPersonne'=>$_POST['IDPersonne'],
		'Pere'=>$_POST['Pere'],
		'Mere'=>$_POST['Mere'],
		'RuptureParentale'=>$_POST['RuptureParentale'],
		'Fratrie'=>$_POST['Fratrie'],
		'PositionFratrie'=>$_POST['PositionFratrie'],
		'SituationMatrimoniale'=>$_POST['SituationMatrimoniale'],
		'ValidationSource'=>$_POST['ValidationSource'],
		'VitEnCouple'=>$_POST['VitEnCouple'],
		'IDLocalisationCouple'=>$_POST['IDLocalisationCouple'],
		'Enceinte'=>$_POST['Enceinte'],
		'EnfantPaysOrigine'=>$_POST['EnfantPaysOrigine'],
		'MaisonNigeria'=>$_POST['MaisonNigeria']
		));
	
}
elseif($_POST['attributsMode']=='administratifs'){

	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod' AND isset($_POST['IDPersonne']))
	{
		$req = $bdd->prepare('UPDATE attributsAdministratifs SET IDPersonneAdm = :IDPersonne,
		NumRecepisse = :NumRecepisse, DebutValRecepisse = :DebutValRecepisse, 
		FinValRecepisse = :FinValRecepisse, NumSejour = :NumSejour, DebutValSejour = :DebutValSejour, 
		FinValSejour = :FinValSejour, PrestationSociale = :PrestationSociale, 
		ModeMigration = :ModeMigration, ArriveeEurope = :ArriveeEurope, 
		ArriveeEuropeApx = :ArriveeEuropeApx, ArriveeFrance = :ArriveeFrance, 
		ArriveeFranceApx = :ArriveeFranceApx, IDPaysTransit1 = :IDPaysTransit1, 
		IDPaysTransit2 = :IDPaysTransit2, NumRecoursOFPRA = :NumRecoursOFPRA, 
		NumOQTF = :NumOQTF, DebutOQTF = :DebutOQTF, FinOQTF = :FinOQTF, 
		CarteNationale = :CarteNationale, NumEtranger = :NumEtranger, Prison = :Prison 
		WHERE IDPersonneAdm = '.$_POST['IDPersonne']);
	}
	else
	{
		$req = $bdd->prepare('INSERT INTO attributsAdministratifs(IDPersonneAdm,
		NumRecepisse, DebutValRecepisse, FinValRecepisse,
		NumSejour, DebutValSejour, FinValSejour,
		PrestationSociale, ModeMigration, ArriveeEurope, ArriveeEuropeApx,
		ArriveeFrance, ArriveeFranceApx,
		IDPaysTransit1, IDPaysTransit2, NumRecoursOFPRA, NumOQTF, DebutOQTF, 
		FinOQTF, CarteNationale, NumEtranger, Prison) 
		VALUES (:IDPersonne,
		:NumRecepisse, :DebutValRecepisse, :FinValRecepisse,
		:NumSejour, :DebutValSejour, :FinValSejour,
		:PrestationSociale, :ModeMigration, :ArriveeEurope, :ArriveeEuropeApx, 
		:ArriveeFrance, :ArriveeFranceApx,
		:IDPaysTransit1, :IDPaysTransit2, :NumRecoursOFPRA, :NumOQTF, :DebutOQTF, 
		:FinOQTF, :CarteNationale, :NumEtranger, :Prison
		)');
	}

	// Pour éviter la mise par défaut de valeurs type 0000-00-00 ou 0 
	if($_POST['IDPaysTransit1']=='')
		$_POST['IDPaysTransit1']=NULL;
	if($_POST['IDPaysTransit2']=='')
		$_POST['IDPaysTransit2']=NULL;

	if($_POST['DebutValSejour']=='')
		$_POST['DebutValSejour']=NULL;
	if($_POST['FinValSejour']=='')
		$_POST['FinValSejour']=NULL;
	if($_POST['PrestationSociale']=='')
		$_POST['PrestationSociale']=NULL;

	if($_POST['ArriveeEurope']=='')
		$_POST['ArriveeEurope']=NULL;
	if($_POST['ArriveeFrance']=='')
		$_POST['ArriveeFrance']=NULL;
	if($_POST['ArriveeEuropeApx']=='')
		$_POST['ArriveeEuropeApx']=NULL;
	if($_POST['ArriveeFranceApx']=='')
		$_POST['ArriveeFranceApx']=NULL;

	if($_POST['NumOQTF']=='')
		$_POST['NumOQTF']=NULL;
	if($_POST['DebutOQTF']=='')
		$_POST['DebutOQTF']=NULL;
	if($_POST['FinOQTF']=='')
		$_POST['FinOQTF']=NULL;

	if($_POST['NumRecoursOFPRA']=='')
		$_POST['NumRecoursOFPRA']=NULL;
	if($_POST['DebutValRecepisse']=='')
		$_POST['DebutValRecepisse']=NULL;
	if($_POST['FinValRecepisse']=='')
		$_POST['FinValRecepisse']=NULL;

	if($_POST['CarteNationale']=='')
		$_POST['CarteNationale']=NULL;
	if($_POST['NumEtranger']=='')
		$_POST['NumEtranger']=NULL;
	if($_POST['Prison']=='')
		$_POST['Prison']=NULL;

	$req->execute(array(
		'IDPersonne'=>$_POST['IDPersonne'],
		'NumRecepisse'=>$_POST['NumRecepisse'], 
		'DebutValRecepisse'=>$_POST['DebutValRecepisse'], 
		'FinValRecepisse'=>$_POST['FinValRecepisse'],
		'NumSejour'=>$_POST['NumSejour'], 
		'DebutValSejour'=>$_POST['DebutValSejour'], 
		'FinValSejour'=>$_POST['FinValSejour'],
		'PrestationSociale'=>$_POST['PrestationSociale'], 
		'ModeMigration'=>$_POST['ModeMigration'], 
		'ArriveeEurope'=>$_POST['ArriveeEurope'], 
		'ArriveeEuropeApx'=>$_POST['ArriveeEuropeApx'], 
		'ArriveeFrance'=>$_POST['ArriveeFrance'],
		'ArriveeFranceApx'=>$_POST['ArriveeFranceApx'],
		'IDPaysTransit1'=>$_POST['IDPaysTransit1'], 
		'IDPaysTransit2'=>$_POST['IDPaysTransit2'],
		'NumRecoursOFPRA'=>$_POST['NumRecoursOFPRA'],
		'NumOQTF'=>$_POST['NumOQTF'],
		'DebutOQTF'=>$_POST['DebutOQTF'],
		'FinOQTF'=>$_POST['FinOQTF'],
		'CarteNationale'=>$_POST['CarteNationale'],
		'NumEtranger'=>$_POST['NumEtranger'],
		'Prison'=>$_POST['Prison']
		));

}


$url = 'Location: ../view/index.php?modeRead=main&modeWrite=attributs&attributsMode='.$_POST['attributsMode'];
header($url);  
