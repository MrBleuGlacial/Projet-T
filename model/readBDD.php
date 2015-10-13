<?php

//include("../model/BDDAccess.php");

function readPersonneMain(){
	$rep = $GLOBALS['bdd']->query('
	SELECT personne.*,
	ville.Ville as VilleNaissance, pays.Pays as PaysNaissance, profession1.Profession as ProfessionAvantMigration, 
	profession2.Profession as ProfessionDurantInterrogatoire, 
	paysTransit1.Pays as PaysTransit1, paysTransit2.Pays as PaysTransit2,
	nationalite.Nationalite, attributsFamiliaux.*, attributsAdministratifs.*
	FROM (personne
	LEFT JOIN ville
		ON personne.IDVilleNaissance = ville.IDVille
	LEFT JOIN pays
		ON personne.IDPaysNaissance = pays.IDPays
	LEFT JOIN nationalite
		ON personne.IDNationalite = nationalite.IDNationalite
	LEFT JOIN profession AS profession1
		ON personne.IDProfessionAvantMigration = profession1.IDProfession 
	LEFT JOIN profession AS profession2
		ON personne.IDProfessionDurantInterrogatoire = profession2.IDProfession
	LEFT JOIN attributsFamiliaux
		ON personne.IDPersonne = attributsFamiliaux.IDPersonneFam
	LEFT JOIN attributsAdministratifs
		ON personne.IDPersonne = attributsAdministratifs.IDPersonneAdm
	LEFT JOIN pays AS paysTransit1
		ON attributsAdministratifs.IDPaysTransit1 = paysTransit1.IDPays
	LEFT JOIN pays AS paysTransit2
		ON attributsAdministratifs.IDPaysTransit2 = paysTransit2.IDPays
	)
	ORDER BY IDPersonne DESC
	');
	return $rep;
}

/*ProfessionAvantMigration
ProfessionDurantInterrogatoire
*/

function readLocalisation(){
	$rep = $GLOBALS['bdd']->query('
	SELECT localisation.IDLocalisation, localisation.Adresse, localisation.CodePostal, ville.Ville, pays.Pays
	FROM (localisation
	LEFT JOIN ville
		ON localisation.IDVille = ville.IDVille
	LEFT JOIN pays
		ON localisation.IDPays = pays.IDPays
	)');
	return $rep;
}


function readAllAssociationTable($IDPersonne, $tableLinkName, $tableName, $IDArgName, $ValueArgName){
	$rep = $GLOBALS['bdd']->query('
		SELECT personne.IDPersonne, personne.Prenom, personne.Nom, '.$tableName.'.'.$ValueArgName.', cote.NomCote
		FROM ('.$tableLinkName.'
		LEFT JOIN personne
			ON personne.IDPersonne = '.$tableLinkName.'.IDPersonne
		LEFT JOIN '.$tableName.'
			ON '.$tableName.'.'.$IDArgName.' = '.$tableLinkName.'.'.$IDArgName.'
		LEFT JOIN cote
			ON cote.IDCote = '.$tableLinkName.'.IDCote
		)
		WHERE personne.IDPersonne = '. $IDPersonne);
	return $rep;
}

function readLocalisationAssociation($IDPersonne){
	$rep = $GLOBALS['bdd']->query('
		SELECT personne.IDPersonne, personne.Prenom, personne.Nom, cote.NomCote, 
		localisation.IDLocalisation, localisation.Adresse, localisation.CodePostal, pays.Pays, ville.Ville
		FROM (personneToLocalisation
		LEFT JOIN personne
			ON personne.IDPersonne = personneToLocalisation.IDPersonne
		LEFT JOIN cote
			ON cote.IDCote = personneToLocalisation.IDCote
		LEFT JOIN localisation
			ON localisation.IDLocalisation = personneToLocalisation.IDLocalisation
		LEFT JOIN pays 
			ON pays.IDPays = localisation.IDPays
		LEFT JOIN ville
			ON ville.IDVille = localisation.IDVille  
		)
		WHERE personne.IDPersonne = '.$IDPersonne);
	return $rep;
}

function readSourceOnlyAssociation($IDPersonne){
	$rep = $GLOBALS['bdd']->query('
	SELECT personne.IDPersonne, cote.NomCote, cote.NatureCote, cote.DateCote, cote.InformationsNonExploitees
	FROM (personneToCote
	LEFT JOIN personne ON personne.IDPersonne = personneToCote.IDPersonne
	LEFT JOIN cote ON cote.IDCote = personneToCote.IDCote
	)
	WHERE personne.IDPersonne = '.$IDPersonne);
	return $rep;
}


// -> 


function readAllTable($table){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM '. $table
	);
	return $rep;
}

function readAllTableWhere($table, $where){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM '. $table .' WHERE '.$where
	);
	return $rep;
}

function listPersonneForMenu(){
	$rep = $GLOBALS['bdd']->query('
	SELECT IDPersonne, IDDossier, Nom, Prenom
	FROM personne
	ORDER BY IDPersonne DESC
	');
	return $rep;
}

//--------------DEPRECATED--------------

function readVille(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM ville ORDER BY Ville
	');
	return $rep;	
}

function readPays(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM pays ORDER BY Pays
	');
	return $rep;	
}

function readNationalite(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM nationalite ORDER BY Nationalite
	');
	return $rep;	
}

function readLangue(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM langue ORDER BY Langue
	');
	return $rep;	
}

function readAlias(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM alias ORDER BY Alias
	');
	return $rep;	
}

function readTelephone(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM telephone
	');
	return $rep;	
}




//echo "readBDD";
/*
$rep = $bdd->query('
	SELECT * 
	FROM (personne
	INNER JOIN ville
		ON personne.IDVilleNaissance = ville.IDVille
	INNER JOIN pays
		ON personne.IDPaysNaissance = pays.IDPays
	INNER JOIN personne as pere
		ON personne.IDPere = pere.IDPersonne
	)
	');
$donnees = $rep->fetchAll();
*/


/*
$rep = $bdd->query('
	SELECT personne.Sexe, personne.Nom, personne.Prenom, personne.DateNaissance,
	ville.Ville, pays.Pays, personne.ProfessionAvantMigration, personne.ProfessionDurantInterrogatoire, 
	pere.Nom AS NomPere, pere.Prenom AS PrenomPere
	FROM (personne
	INNER JOIN ville
		ON personne.IDVilleNaissance = ville.IDVille
	INNER JOIN pays
		ON personne.IDPaysNaissance = pays.IDPays
	LEFT OUTER JOIN personne as pere
		ON personne.IDPere = pere.IDPersonne
	)
	');
*/

/*
$donnees = $rep->fetchAll();

echo "<pre>";
print_r($donnees);
echo "</pre>";
*/
/*
for($i = 0; $i <= 25; $i++){
	if($donnees[0][$i] == NULL){
		echo 'C\'est null !' . '</br>';
	}
	else{
	echo $donnees[0][$i] . '</br>';
	}
}
*/

/*
echo "-------------------------------</br>";
foreach($donnees as $i)
{
	$nmbrAttribut = sizeof($i)/2;
	for($j = 0; $j < $nmbrAttribut; $j++)
	{
		echo 'Valeur : ' . $i[$j] . '</br>';
	}
	echo "-------------------------------</br>";
}
*/	



/*
------ SAVE MAIN REQUETE ------
SELECT personne.IDPersonne, personne.Sexe, personne.Nom, personne.IDPersonne, personne.IDDossier, personne.Prenom, personne.DateNaissance,
	ville.Ville as VilleNaissance, pays.Pays as PaysNaissance, profession1.Profession as ProfessionAvantMigration, 
	profession2.Profession as ProfessionDurantInterrogatoire, personne.DetteInitiale, personne.DetteRenegociee,
	personne.DateDettePayee, personne.DateEstRecrute, personne.DateRecrute, personne.Diplome, personne.IDNationalite,
	nationalite.Nationalite
	FROM (personne
	LEFT JOIN ville
		ON personne.IDVilleNaissance = ville.IDVille
	LEFT JOIN pays
		ON personne.IDPaysNaissance = pays.IDPays
	LEFT JOIN nationalite
		ON personne.IDNationalite = nationalite.IDNationalite
	LEFT JOIN profession AS profession1
		ON personne.IDProfessionAvantMigration = profession1.IDProfession 
	LEFT JOIN profession AS profession2
		ON personne.IDProfessionDurantInterrogatoire = profession2.IDProfession
	)
*/

?>