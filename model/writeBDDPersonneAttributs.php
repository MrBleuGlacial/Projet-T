

<pre>
<?php
print_r($_POST);
?>
</pre>

<?php


include("../model/writeBDDFather.php");



if($_POST['attributsMode']=='familiaux'){
	
	
}
elseif($_POST['attributsMode']=='administratifs'){

	$req = $bdd->prepare('INSERT INTO attributsAdministratifs(IDPersonne,
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
