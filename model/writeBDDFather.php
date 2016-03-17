<?php

include("../model/BDDAccess.php");
include("../controler/utils.php");

function writeBDDLocalisation($bdd){
	if(isset($_POST['Adresse']) AND isset($_POST['IDPays']) AND isset($_POST['IDVille']) AND isset($_POST['CodePostal']))
	{
		if($_POST["IDVille"]=="")
			$_POST["IDVille"]=NULL;
		if($_POST["IDPays"]=="")
			$_POST["IDPays"]=NULL;
		if($_POST["Adresse"]=="")
			$_POST["Adresse"]=NULL;
		if($_POST["CodePostal"]=="")
			$_POST["CodePostal"]=NULL;
		
		if(isset($_POST['IDValue'])){
			$req = $bdd->prepare('UPDATE localisation SET IDPays = :IDPays, IDVille = :IDVille, 
			Adresse = :Adresse, CodePostal = :CodePostal
			WHERE IDLocalisation = '.$_POST['IDValue']);
		}
		else{
			$req = $bdd->prepare('INSERT INTO localisation(IDPays, IDVille, Adresse, CodePostal)
			VALUES (:IDPays, :IDVille, :Adresse, :CodePostal)');
		}

		$req->execute(array(
			'IDPays' => $_POST['IDPays'],
			'IDVille' => $_POST['IDVille'],
			'Adresse' => $_POST['Adresse'],
			'CodePostal' => $_POST['CodePostal']
			));
	
		header('Location: ../view/popUp.php?mode=localisation');
	}
}

function writeBDDSimpleElement($bdd, $tableValue,$insertValueName,$insertValue){
	try{
		$req = $bdd->prepare('INSERT INTO '.$tableValue.'('.$insertValueName.') VALUES (:Value)');
		$req->execute(array('Value'=>$insertValue));
	}
	catch (PDOException $e)
	{
		header('Location: ../view/error.php');
		die();
	}
}

function writeBDDDoubleElement($bdd, $tableValue,$insertValueName1,$insertValueName2,$insertValue1,$insertValue2){
	$req = $bdd->prepare('INSERT INTO '. $tableValue .'('. $insertValueName1 .','. $insertValueName2 .') VALUES (:Value1, :Value2)');
	$req->execute(array('Value1'=>$insertValue1,'Value2'=>$insertValue2));
}

function writeBDDMultiElement($bdd,$tableValue,$tabMultiElemName,$tabMultiElemValue){
	$sql = 'INSERT INTO '.$tableValue.' (';
	$sql1 = '';
	$sql2 = '';
	$countMEN = count($tabMultiElemName);
	for($i = 0; $i < $countMEN; $i++){
		if($i == $countMEN-1)
			$sql1 = $sql1 . $tabMultiElemName[$i] . ') VALUES (';
		else
			$sql1 = $sql1 . $tabMultiElemName[$i] . ',';
		if($i == $countMEN-1)
			$sql2 = $sql2 . ':Arg'.$tabMultiElemName[$i].')';
		else
			$sql2 = $sql2 . ':Arg'.$tabMultiElemName[$i].',';
	}
	$sql = $sql . $sql1 . $sql2;

	for($i = 0; $i < $countMEN; $i++){
		$tmp = 'Arg'.$tabMultiElemName[$i];
		$sqlarray[$tmp] = $tabMultiElemValue[$i]; 
	}
	$req = $bdd->prepare($sql);
	$req->execute($sqlarray);
	return 1;
}


function searchAndAddData($bdd, $IDName,$tableToSearchName,$conditionName,$valueCondition,$tableToLinkName,$arg1Name,$arg1Value,$arg2Name,$arg2Value){
		if($arg2Name == 'IDCote'){
			if($arg2Value=='')
				$arg2Value=NULL;
		}

		$req = $bdd->prepare('SELECT '.$IDName.' FROM '.$tableToSearchName.' WHERE '.$conditionName.' = ?');
		$req->execute(array($valueCondition));
		$donnees = $req->fetch();
		$req->closeCursor();
		//writeBDDDoubleElement($bdd,$tableToLinkName,$IDName,'IDCote', $donnees[$IDName],$postCote);
		$tabMultiElemName = [];
		$tabMultiElemValue = [];
		array_push($tabMultiElemName,$arg1Name,$IDName,$arg2Name);
		array_push($tabMultiElemValue,$arg1Value,$donnees[$IDName],$arg2Value);
		writeBDDMultiElement($bdd,$tableToLinkName,$tabMultiElemName,$tabMultiElemValue);
}

function saadtpTest($bdd, $IDName,$tableToSearchName,$conditionName,$valueCondition){
		$req = $bdd->prepare('SELECT '.$IDName.' FROM '.$tableToSearchName.' WHERE '.$conditionName.' = ?');
		$req->execute(array($valueCondition));
		$donnees = $req->fetch();
		return $donnees;
}

function linkDataToPersonne($bdd,$tableName,$valueToInsert){
	try{
		if(isset($_POST[$valueToInsert]) AND $_POST[$valueToInsert] != ""){
			if($_POST['IDCote']=='')
				$_POST['IDCote'] = 'NULL';
			$bdd->exec('INSERT INTO '.$tableName.'(IDPersonne,'.$valueToInsert.', IDCote)
				VALUES('.$_POST['IDPersonne'].', '.$_POST[$valueToInsert].', '.$_POST['IDCote'].')');
		}
	}
	catch (PDOException $e)
	{
		header('Location: ../view/error.php');
		die();
	}
}

function linkLocalisationToPersonne($bdd, $IDLocalisation){
	/*if(isset($_POST['IDLocalisation']) AND $_POST['IDLocalisation'] != ""){
		$bdd->exec('INSERT INTO personneToLocalisation (IDPersonne, IDLocalisation, IDCote)
					VALUES('.$_POST['IDPersonne'].', '.$_POST['IDLocalisation'].', '.$_POST['IDCote'].')');
	}
	*/
	$req = $bdd->prepare('INSERT INTO personneToLocalisation (IDPersonne, IDLocalisation, 
		IDCote, DateDebutApx, DateFinApx) VALUES (:IDPersonne, :IDLocalisation,
		:IDCote, :DateDebutApx, :DateFinApx)'		
	);

	if($_POST['IDCote']=='')
		$_POST['IDCote']=NULL;

	if($_POST["DateDebutApx"]=='')
		$_POST["DateDebutApx"]=NULL;
	else{
		$_POST["DateDebutApx"]= str_replace('"','\'',$_POST["DateDebutApx"]);
	}

	if($_POST["DateFinApx"]=='')
		$_POST["DateFinApx"]=NULL;
	else{
		$_POST["DateFinApx"]= str_replace('"','\'',$_POST["DateFinApx"]);
	}

	$req->execute(array(
		'IDPersonne' => $_POST['IDPersonne'],
		'IDLocalisation' => $IDLocalisation,
		'IDCote' => $_POST['IDCote'],
		'DateDebutApx' => $_POST['DateDebutApx'],
		'DateFinApx' => $_POST['DateFinApx']
	));
}

function linkCoteToPersonne($bdd,$tableName,$valueToInsert, $valueToInsertInto=NULL){
	try{
		if($valueToInsertInto==NULL)
			$valueToInsertInto = $valueToInsert;
		if(isset($_POST[$valueToInsert]) AND $_POST[$valueToInsert] != ""){
			$bdd->exec('INSERT INTO '.$tableName.'(IDPersonne,'.$valueToInsertInto.')
						VALUES('.$_POST['IDPersonne'].', '.$_POST[$valueToInsert].')');
		}
	}
	catch (PDOException $e)
	{
		header('Location: ../view/error.php');
		die();
	}
}

function delElementWhere($bdd,$table,$argControl,$argValue, $IDPersonneMode){
	$req = $bdd->prepare('DELETE FROM '.$table.' WHERE ('.$argControl.' = :argValue AND IDPersonne = :IDPersonne)');
	$req->execute(array(
		'argValue' => $argValue,
		'IDPersonne' => $IDPersonneMode
	));
}


?>