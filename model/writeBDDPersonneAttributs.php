

<pre>
<?php
print_r($_POST);
?>
</pre>

<?php


include("../model/writeBDDFather.php");



if($_POST['attributsMode']=='familiaux'){

	$req = $bdd->prepare('INSERT INTO attributsFamiliaux(IDPersonneFam,
		Pere,Mere,RuptureParentale,Fratrie,PositionFratrie,SituationMatrimoniale,
		ValidationSource,VitEnCouple,IDLocalisationCouple,Enceinte,EnfantPaysOrigine,MaisonNigeria)
		VALUES (:IDPersonne, :Pere, :Mere, :RuptureParentale, :Fratrie, :PositionFratrie, :SituationMatrimoniale,
		:ValidationSource, :VitEnCouple, :IDLocalisationCouple, :Enceinte, :EnfantPaysOrigine, :MaisonNigeria
		)');
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

	$req = $bdd->prepare('INSERT INTO attributsAdministratifs(IDPersonneAdm,
		NumPassport, DebutValPassport, FinValPassport,
		NumRecepisse, DebutValRecepisse, FinValRecepisse,
		NumSejour, DebutValSejour, FinValSejour,
		PrestationSociale, ModeMigration, ArriveeEurope, ArriveeFrance,
		IDPaysTransit1, IDPaysTransit2, NumRecoursOFPRA, NumOQTF, DebutOQTF, 
		FinOQTF, IDNationalitePassport) 
		VALUES (:IDPersonne, :NumPassport, :DebutValPassport, :FinValPassport,
		:NumRecepisse, :DebutValRecepisse, :FinValRecepisse,
		:NumSejour, :DebutValSejour, :FinValSejour,
		:PrestationSociale, :ModeMigration, :ArriveeEurope, :ArriveeFrance,
		:IDPaysTransit1, :IDPaysTransit2, :NumRecoursOFPRA, :NumOQTF, :DebutOQTF, 
		:FinOQTF, :IDNationalitePassport
		)');

	/* Pour éviter la mise par défaut de valeurs type 0000-00-00 ou 0 */ 
	if($_POST['IDPaysTransit1']=='')
		$_POST['IDPaysTransit1']=NULL;
	if($_POST['IDPaysTransit2']=='')
		$_POST['IDPaysTransit2']=NULL;
	if($_POST['IDNationalitePassport']=='')
		$_POST['IDNationalitePassport']=NULL;

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

	if($_POST['NumPassport']=='')
		$_POST['NumPassport']=NULL;
	if($_POST['DebutValPassport']=='')
		$_POST['DebutValPassport']=NULL;
	if($_POST['FinValPassport']=='')
		$_POST['FinValPassport']=NULL;

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



	$req->execute(array(
		'IDPersonne'=>$_POST['IDPersonne'],
		'NumPassport'=>$_POST['NumPassport'], 
		'DebutValPassport'=>$_POST['DebutValPassport'], 
		'FinValPassport'=>$_POST['FinValPassport'],
		'NumRecepisse'=>$_POST['NumRecepisse'], 
		'DebutValRecepisse'=>$_POST['DebutValRecepisse'], 
		'FinValRecepisse'=>$_POST['FinValRecepisse'],
		'NumSejour'=>$_POST['NumSejour'], 
		'DebutValSejour'=>$_POST['DebutValSejour'], 
		'FinValSejour'=>$_POST['FinValSejour'],
		'PrestationSociale'=>$_POST['PrestationSociale'], 
		'ModeMigration'=>$_POST['ModeMigration'], 
		'ArriveeEurope'=>$_POST['ArriveeEurope'], 
		'ArriveeFrance'=>$_POST['ArriveeFrance'],
		'IDPaysTransit1'=>$_POST['IDPaysTransit1'], 
		'IDPaysTransit2'=>$_POST['IDPaysTransit2'],
		'NumRecoursOFPRA'=>$_POST['NumRecoursOFPRA'],
		'NumOQTF'=>$_POST['NumOQTF'],
		'DebutOQTF'=>$_POST['DebutOQTF'],
		'FinOQTF'=>$_POST['FinOQTF'],
		'IDNationalitePassport'=>$_POST['IDNationalitePassport']
		));

}


$url = 'Location: ../view/index.php?modeRead=main&modeWrite=attributs&IDPersonneMode='
.$_POST['IDPersonne'].'&attributsMode='.$_POST['attributsMode'];
header($url);  
