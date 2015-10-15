<?php

include("../model/writeBDDFather.php");



$subMode = $_POST['subMode'];

function linkDataToPersonne($bdd,$tableName,$valueToInsert){
	if(isset($_POST[$valueToInsert]) AND $_POST[$valueToInsert] != ""){
		$bdd->exec('INSERT INTO '.$tableName.'(IDPersonne,'.$valueToInsert.', IDCote)
					VALUES('.$_POST['IDPersonne'].', '.$_POST[$valueToInsert].', '.$_POST['IDCote'].')');
	}
}


function linkCoteToPersonne($bdd,$tableName,$valueToInsert){
	if(isset($_POST[$valueToInsert]) AND $_POST[$valueToInsert] != ""){
		$bdd->exec('INSERT INTO '.$tableName.'(IDPersonne,'.$valueToInsert.')
					VALUES('.$_POST['IDPersonne'].', '.$_POST[$valueToInsert].')');
	}
}

//-------------------------------------------------------------------------------------------------

//On lie une source à une personne
if(isset($_POST['IDCote']) AND count($_POST)== 3){
	linkCoteToPersonne($bdd,'personneToCote','IDCote');
}

//On lie une personne, un élément et une source ensembles
else{

	//--------------------------------------------

	if(isset($_POST['IDAlias']) AND isset($_POST['AliasNew'])){
		if($_POST['IDAlias']!='' AND $_POST['AliasNew']=='')		
			linkDataToPersonne($bdd,'personneToAlias','IDAlias');
		if($_POST['IDAlias']=='' AND $_POST['AliasNew']!=''){
			writeBDDSimpleElement($bdd,'alias','Alias',$_POST['AliasNew']);
			searchAndAddData($bdd,'IDAlias','alias','Alias',$_POST['AliasNew'],'personneToAlias','IDPersonne',$_POST['IDPersonne'],'IDCote',$_POST['IDCote']);
		}
	}

	if(isset($_POST['IDLangue']) AND isset($_POST['LangueNew'])){
		if($_POST['IDLangue']!='' AND $_POST['LangueNew']=='')
			linkDataToPersonne($bdd,'personneToLangue','IDLangue');
		if($_POST['IDLangue']=='' AND $_POST['LangueNew']!=''){
			writeBDDSimpleElement($bdd,'langue','Langue',$_POST['LangueNew']);
			searchAndAddData($bdd,'IDLangue','langue','Langue',$_POST['LangueNew'],'personneToLangue','IDPersonne',$_POST['IDPersonne'],'IDCote',$_POST['IDCote']);
		}
	}

	if(isset($_POST['IDTelephone']) AND isset($_POST['TelephoneNew'])){
		if($_POST['IDTelephone']!='' AND $_POST['TelephoneNew']=='')
			//echo 'here pls!';
			linkDataToPersonne($bdd,'personneToTelephone','IDTelephone');
		if($_POST['IDTelephone']=='' AND $_POST['TelephoneNew']!=''){
			writeBDDSimpleElement($bdd,'telephone','NumTelephone',$_POST['TelephoneNew']);
			searchAndAddData($bdd,'IDTelephone','telephone','NumTelephone',$_POST['TelephoneNew'],'personneToTelephone','IDPersonne',$_POST['IDPersonne'],'IDCote',$_POST['IDCote']);
		}

	}

	//
	//--------------------------------------------

	if(isset($_POST['IDVille']) AND isset($_POST['IDPays']) AND isset($_POST['Adresse']) AND isset($_POST['IDLocalisation']) AND isset($_POST['CodePostal']))
	{	
		if($_POST['IDVille']=='' AND $_POST['IDPays']=='' AND $_POST['Adresse']=='' AND $_POST['CodePostal']=='' AND $_POST['IDLocalisation']!='')
			linkDataToPersonne($bdd,'personneToLocalisation','IDLocalisation');
		if($_POST['IDLocalisation']=='' AND ($_POST['IDPays']!='' OR $_POST['IDVille']!='' OR $_POST['Adresse']!="" OR $_POST['CodePostal']))
		{
			if($_POST["IDVille"]=='')
				$_POST["IDVille"]=NULL;
			if($_POST["IDPays"]=='')
				$_POST["IDPays"]=NULL;
			if($_POST["Adresse"]=='')
				$_POST["Adresse"]=NULL;
			if ($_POST['CodePostal']=='')
				$_POST['CodePostal']=NULL;
			
			$req = $bdd->prepare('INSERT INTO localisation(IDPays, IDVille, Adresse,CodePostal)
				VALUES (:IDPays, :IDVille, :Adresse,:CodePostal)');

			$req->execute(array(
				'IDPays' => $_POST['IDPays'],
				'IDVille' => $_POST['IDVille'],
				'Adresse' => $_POST['Adresse'],
				'CodePostal' => $_POST['CodePostal']
			));

			$req2 = $bdd->prepare('SELECT IDLocalisation FROM localisation 
				WHERE (
					IF(:IDPays IS NULL, IDPays IS NULL, IDPays = :IDPays) AND 
					IF(:IDVille IS NULL, IDVille IS NULL, IDVille = :IDVille) AND 
					IF(:Adresse IS NULL, Adresse IS NULL, Adresse = :Adresse) AND 
					IF(:CodePostal IS NULL, CodePostal IS NULL, CodePostal = :CodePostal)
				)');
			$req2->execute(array(
				'IDPays' => $_POST['IDPays'],
				'IDVille' => $_POST['IDVille'], 
				'Adresse'=> $_POST['Adresse'],
				'CodePostal' => $_POST['CodePostal']));

			$donnees = $req2->fetch();
			
			?>
			<pre>
			<?php
				echo 'donnees :</br>';
				print_r($_POST);
			?>
			</pre>
			<?php	
			$req = $bdd->prepare('INSERT INTO personneToLocalisation(IDPersonne,IDLocalisation,IDCote)
				VALUES (:IDPersonne,:IDLocalisation,:IDCote)');
			$req->execute(array('IDPersonne'=>$_POST['IDPersonne'],'IDLocalisation'=>$donnees['IDLocalisation'],'IDCote'=>$_POST['IDCote']));
/*
			$bdd->exec('INSERT INTO personneToLocalisation(IDPersonne,IDLocalisation,IDCote)
						VALUES('.$_POST['IDPersonne'].','.$donnees['IDLocalisation'].','.$_POST['IDCote'].')');
*/			//$bdd->exec('INSERT INTO `personneToLocalisation`(`IDPersonne`, `IDLocalisation`, `IDCote`) VALUES ('.$_POST['IDPersonne'].','.$donnees['IDLocalisation'].','.$_POST['IDCote'].')');
		}

	}
	
}

$url = 'Location: ../view/index.php?modeRead=link&modeWrite=link&subMode='.$subMode.'&IDPersonneMode='.$_POST['IDPersonne'];
header($url);  





/*

?>
<pre>
<?php
//print_r(saadtpTest($bdd,'IDAlias','alias','Alias',$_POST['AliasNew']));
//$tabArg = ['IDPersonne','IDAlias','IDCote'];
//$tabIns = ['5','22','2'];
//print_r(writeBDDMultiElement($bdd,'personneToAlias',$tabArg,$tabIns)); //ITS WORK OMFG
?>
</pre>
<?php	


Array
(
    [IDPersonne] => 2
    [IDCote] => 
    [IDAlias] => 
    [IDLangue] => 
    [IDTelephone] => 
    [IDPays] => 
    [IDVille] => 
    [Adresse] => 
    [IDLocation] => 
)
*/

?>