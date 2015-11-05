

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
		ValidationSource,VitEnCouple,IDLocalisationCouple,Enceinte)
		VALUES (:IDPersonne, :Pere, :Mere, :RuptureParentale, :Fratrie, :PositionFratrie, :SituationMatrimoniale,
		:ValidationSource, :VitEnCouple, :IDLocalisationCouple, :Enceinte
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
		'Enceinte'=>$_POST['Enceinte']
		));
	
}
elseif($_POST['attributsMode']=='administratifs'){

	$req = $bdd->prepare('INSERT INTO attributsAdministratifs(IDPersonneAdm,
		NumPassport, DebutValPassport, FinValPassport,
		NumRecepisse, DebutValRecepisse, FinValRecepisse,
		NumSejour, DebutValSejour, FinValSejour,
		PrestationSociale, ModeMigration, ArriveeEurope, ArriveeFrance,
		IDPaysTransit1, IDPaysTransit2) 
		VALUES (:IDPersonne, :NumPassport, :DebutValPassport, :FinValPassport,
		:NumRecepisse, :DebutValRecepisse, :FinValPassport,
		:NumSejour, :DebutValSejour, :FinValSejour,
		:PrestationSociale, :ModeMigration, :ArriveeEurope, :ArriveeFrance,
		:IDPaysTransit1, :IDPaysTransit2
		)');

	if($_POST['IDPaysTransit1']=='')
		$_POST['IDPaysTransit1']=NULL;
	if($_POST['IDPaysTransit2']=='')
		$_POST['IDPaysTransit2']=NULL;

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
		'IDPaysTransit2'=>$_POST['IDPaysTransit2']
		));

}


$url = 'Location: ../view/index.php?modeRead=main&modeWrite=attributs&IDPersonneMode='
.$_POST['IDPersonne'].'&attributsMode='.$_POST['attributsMode'];
header($url);  
