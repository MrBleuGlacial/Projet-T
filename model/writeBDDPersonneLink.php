<?php

include("../model/writeBDDFather.php");



$subMode = $_POST['subMode'];
$formMode = $_POST['formMode'];

if($formMode != 'mod'){
	//-------------------------------------------------------------------------------------------------

	//On lie une source à une personne
	if($subMode == 'source'){
		linkCoteToPersonne($bdd,'personneToCote','IDCote');
	}
	elseif($subMode == "sourceAttributsFam"){
		linkCoteToPersonne($bdd,'personneToCoteFam','IDCoteAttributsFam','IDCote');
	}
	elseif($subMode == "sourceAttributsAdm"){
		linkCoteToPersonne($bdd,'personneToCoteAdm','IDCoteAttributsAdm','IDCote');
	}

	//On lie une personne, un élément et une source ensembles
	else{

		//--------------------------------------------

		if($subMode == 'alias'){
			if($_POST['IDAlias']!='' AND $_POST['AliasNew']=='')		
				linkDataToPersonne($bdd,'personneToAlias','IDAlias');
			if($_POST['IDAlias']=='' AND $_POST['AliasNew']!=''){
				writeBDDSimpleElement($bdd,'alias','Alias',$_POST['AliasNew']);
				searchAndAddData($bdd,'IDAlias','alias','Alias',$_POST['AliasNew'],'personneToAlias','IDPersonne',$_POST['IDPersonne'],'IDCote',$_POST['IDCote']);
			}
		}

		if($subMode == 'langue'){
			if($_POST['IDLangue']!='' AND $_POST['LangueNew']=='')
				linkDataToPersonne($bdd,'personneToLangue','IDLangue');
			if($_POST['IDLangue']=='' AND $_POST['LangueNew']!=''){
				writeBDDSimpleElement($bdd,'langue','Langue',$_POST['LangueNew']);
				searchAndAddData($bdd,'IDLangue','langue','Langue',$_POST['LangueNew'],'personneToLangue','IDPersonne',$_POST['IDPersonne'],'IDCote',$_POST['IDCote']);
			}
		}

		if($subMode == 'telephone'){
			if($_POST['IDTelephone']!='' AND $_POST['TelephoneNew']=='')
				//echo 'here pls!';
				linkDataToPersonne($bdd,'personneToTelephone','IDTelephone');
			if($_POST['IDTelephone']=='' AND $_POST['TelephoneNew']!=''){
				writeBDDSimpleElement($bdd,'telephone','NumTelephone',$_POST['TelephoneNew']);
				searchAndAddData($bdd,'IDTelephone','telephone','NumTelephone',$_POST['TelephoneNew'],'personneToTelephone','IDPersonne',$_POST['IDPersonne'],'IDCote',$_POST['IDCote']);
			}

		}

		if($subMode == 'possibiliteSimilaire'){
			writeBDDDoubleElement($bdd,'possibiliteSimilaire','IDPersonneMajeure','IDPersonneMineure',$_POST['IDPersonne'],$_POST['IDPersonneMineure']);
		}

		//--------------------------------------------

		if($subMode == 'role'){
			//mysql_real_escape_string
			$tabName = [];
			$tabValue = [];
			array_push($tabName,
				'IDPersonne','IDCote',
				'IDRole','DebutRole',
				'FinRole','PeriodeMois',
				'PeriodeAnnee','IdentifiantQuali'
			);

			if($_POST['FinRole']=='')
				$_POST['FinRole']=NULL;
			if($_POST['DebutRole']=='')
				$_POST['DebutRole']=NULL;
			if($_POST['IDCote']=='')
				$_POST['IDCote']=NULL;

			array_push($tabValue,
				$_POST['IDPersonne'],$_POST['IDCote'],
				$_POST['IDRole'],$_POST['DebutRole'],
				$_POST['FinRole'],$_POST['PeriodeMois'],
				$_POST['PeriodeAnnee'],$_POST['IdentifiantQuali']
			);
			writeBDDMultiElement($bdd,'personneToRole',$tabName,$tabValue);
		}

		//--------------------------------------------

		if($subMode == 'passport'){
			//mysql_real_escape_string
			$tabName = [];
			$tabValue = [];
			array_push($tabName,
				'IDPersonne','IDCote',
				'NumPassport','IDNationalitePassport',
				'DebutValPassport','FinValPassport'
			);
			array_push($tabValue,
				$_POST['IDPersonne'],$_POST['IDCote'],
				$_POST['NumPassport'],$_POST['IDNationalitePassport'],
				$_POST['DebutValPassport'],$_POST['FinValPassport']
			);
			writeBDDMultiElement($bdd,'personneToPassport',$tabName,$tabValue);
		}

		//--------------------------------------------

		if($subMode == 'localisation')
		{	
			?>
			<pre>
			<?php print_r($_POST); ?>
			</pre>
			<?php
			if($_POST['IDVille']=='' AND $_POST['IDPays']=='' AND $_POST['Adresse']=='' AND $_POST['CodePostal']=='' AND $_POST['IDLocalisation']!='')
				linkLocalisationToPersonne($bdd,$_POST['IDLocalisation']);
			if($_POST['IDLocalisation']=='' AND ($_POST['IDPays']!='' OR $_POST['IDVille']!='' OR $_POST['Adresse']!="" OR $_POST['CodePostal']))
			{
				if($_POST["IDVille"]=='')
					$_POST["IDVille"]=NULL;
				
				if($_POST["IDPays"]=='')
					$_POST["IDPays"]=NULL;

				if($_POST["Adresse"]=='')
					$_POST["Adresse"]=NULL;
				else{
					$_POST["Adresse"]= str_replace('"','\'',$_POST["Adresse"]);
				}
				
				if($_POST['CodePostal']=='')
					$_POST['CodePostal']=NULL;
				else{
					$_POST["CodePostal"]= str_replace('"','\'',$_POST["CodePostal"]);
				}

				$req = $bdd->prepare('INSERT INTO localisation(IDPays, IDVille, Adresse,CodePostal)
					VALUES (:IDPays, :IDVille, :Adresse,:CodePostal)');

				$req->execute(array(
					'IDPays' => $_POST['IDPays'],
					'IDVille' => $_POST['IDVille'],
					'Adresse' => $_POST['Adresse'],
					'CodePostal' => $_POST['CodePostal']
				));
/*
				?>
				<pre>
				<?php print_r($_POST); ?>
				</pre>
				<?php
*/
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
				
				<?php	
				/*
				$req = $bdd->prepare('INSERT INTO personneToLocalisation(IDPersonne,IDLocalisation,IDCote)
					VALUES (:IDPersonne,:IDLocalisation,:IDCote)');
				$req->execute(array('IDPersonne'=>$_POST['IDPersonne'],'IDLocalisation'=>$donnees['IDLocalisation'],'IDCote'=>$_POST['IDCote']));
				*/
				linkLocalisationToPersonne($bdd,$donnees['IDLocalisation']);
				/*
				$bdd->exec('INSERT INTO personneToLocalisation(IDPersonne,IDLocalisation,IDCote)
							VALUES('.$_POST['IDPersonne'].','.$donnees['IDLocalisation'].','.$_POST['IDCote'].')');
				*/			
				//$bdd->exec('INSERT INTO `personneToLocalisation`(`IDPersonne`, `IDLocalisation`, `IDCote`) VALUES ('.$_POST['IDPersonne'].','.$donnees['IDLocalisation'].','.$_POST['IDCote'].')');
			}

		}
		
	}
	$url = 'Location: ../view/index.php?modeRead=link&modeWrite=link&subMode='.$subMode.'&IDPersonneMode='.$_POST['IDPersonne'];
}
else //formMode == mod
{
	//echo 'IL EST ROND COMME UN BALLON, IL EST JAUNE COMME UN CITRON, CEST PACMAN !';
	$url = 'Location: ../view/index.php?modeRead=link&modeWrite=link&subMode='.$subMode.'&IDPersonneMode='.$_POST['IDPersonneMode'];
	$numberElement = $_POST['numberElement'];
	$IDPersonneMode = $_POST['IDPersonneMode'];
	if($subMode=="source"){
		/*
		for($i = 0; $i < $numberElement; $i++){
			$element = 'element'.$i;
			if(isset($_POST[$element])){
				delElementWhere($bdd,'personneToCote','IDCote',$_POST[$element],$_POST['IDPersonneMode']);
			}
		}
		*/
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToCote', 'IDCote');
	}
	if($subMode=="sourceAttributsFam"){
		/*
		for($i = 0; $i < $numberElement; $i++){
			$element = 'element'.$i;
			if(isset($_POST[$element])){
				delElementWhere($bdd,'personneToCoteFam','IDCote',$_POST[$element],$_POST['IDPersonneMode']);
			}
		}
		*/
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToCoteFam', 'IDCote');
	}
	if($subMode=="sourceAttributsAdm"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToCoteAdm', 'IDCote');
	}
	if($subMode=="alias"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToAlias', 'IDAlias');
	}
	if($subMode=="langue"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToLangue', 'IDLangue');
	}
	if($subMode=="telephone"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToTelephone', 'IDTelephone');
	}
	if($subMode=="localisation"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToLocalisation', 'IDPersonneToLocalisation');
	}
	if($subMode=="role"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToRole', 'IDRole');
	}
	if($subMode=="passport"){
		delSelectedElements($numberElement, $IDPersonneMode, $bdd, 'personneToPassport', 'NumPassport');
	}
	if($subMode=="possibiliteSimilaire"){
		//NE PAS UTILISER DelElementWhere de base
		for($i = 0; $i < $numberElement; $i++){
			$element = 'element'.$i;
			if(isset($_POST[$element])){
				delElementWherePossibiliteSimilaire($bdd,'possibiliteSimilaire','IDPersonneMineure',$_POST[$element],$IDPersonneMode);
			}
		}
	}
}

/*
?>
<pre>
<?php
	echo 'donnees :</br>';
	print_r($_POST);
?>
</pre>
<?php
*/

//$url = 'Location: ../view/index.php?modeRead=link&modeWrite=link&subMode='.$subMode.'&IDPersonneMode='.$_POST['IDPersonne'];

header($url);  


function delSelectedElements($numberElement,$IDPersonneMode,$bdd,$table,$argControl){
	for($i = 0; $i < $numberElement; $i++){
		$element = 'element'.$i;
		if(isset($_POST[$element])){
			delElementWhere($bdd,$table,$argControl,$_POST[$element],$IDPersonneMode);
		}
	}
}

function delElementWherePossibiliteSimilaire($bdd,$table,$argControl,$argValue, $IDPersonneMode){
	$req = $bdd->prepare('DELETE FROM '.$table.' WHERE ('.$argControl.' = :argValue AND IDPersonneMajeure = :IDPersonne)');
	$req->execute(array(
		'argValue' => $argValue,
		'IDPersonne' => $IDPersonneMode
	));
}
/*

?>
<pre>
<?php
//print_r(saadtpTest($bdd,'IDAlias','alias','Alias',$_POST['AliasNew']));
//$tabArg = ['IDPersonne','IDAlias','IDCote'];
//$tabIns = ['5','22','2'];
//print_r(writeBDDMultiElement($bdd,'personneToAlias',$tabArg,$tabIns));
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