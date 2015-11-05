<?php

//include("../model/BDDAccess.php");

function readPersonneMain(){
	$rep = $GLOBALS['bdd']->query('
	SELECT personne.*,
	ville.Ville as VilleNaissance, pays.Pays as PaysNaissance, profession1.Profession as ProfessionAvantMigration, 
	profession2.Profession as ProfessionDurantInterrogatoire, 
	paysTransit1.Pays as PaysTransit1, paysTransit2.Pays as PaysTransit2,
	nationalite.Nationalite, attributsFamiliaux.*, attributsAdministratifs.*, 
	localisationCouple.Adresse as AdresseLocalisationCouple, localisationCouple.CodePostal as CodePostalLocalisationCouple, 
	villeLocalisationCouple.Ville as VilleLocalisationCouple, paysLocalisationCouple.Pays as PaysLocalisationCouple
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
	
	LEFT JOIN localisation AS localisationCouple
		ON attributsFamiliaux.IDLocalisationCouple = localisationCouple.IDLocalisation
	LEFT JOIN pays AS paysLocalisationCouple
		ON localisationCouple.IDPays = paysLocalisationCouple.IDPays
	LEFT JOIN ville AS villeLocalisationCouple
		ON localisationCouple.IDVille = villeLocalisationCouple.IDVille
	)
	ORDER BY IDPersonne DESC
	');
	return $rep;
}


function readRelationWhere($id){
$rep = $GLOBALS['bdd']->query('
SELECT relation.*, 
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (relation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
)
WHERE relation.IDRelation ='.$id);
return $rep;
}


function readRelationMain(){
$rep = $GLOBALS['bdd']->query('
SELECT relation.*, 
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter,
contexteSocioGeo.*
FROM (relation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
LEFT JOIN contexteSocioGeo
	ON contexteSocioGeo.IDContexteSocioGeo = relation.IDContexteSocioGeo
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienFinancier(){
$rep = $GLOBALS['bdd']->query('
SELECT lienFinancier.*,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter,
actionEnContrepartie.ActionEnContrepartie,frequenceFluxFinancier.Frequence, 
modalite1.Modalite as Modalite1, modalite2.Modalite as Modalite2,
personne1.Nom as NomIntermediaire1, personne1.Prenom as PrenomIntermediaire1,
personne2.Nom as NomIntermediaire2, personne2.Prenom as PrenomIntermediaire2,
localisationAlter.Adresse AS AdresseAlter, localisationAlter.CodePostal AS CodePostalAlter, 
localisationEgo.Adresse AS AdresseEgo, localisationEgo.CodePostal AS CodePostalEgo,
villeAlter.Ville AS VilleAlter, villeEgo.Ville AS VilleEgo,
paysAlter.Pays AS PaysAlter, paysEgo.Pays AS PaysEgo
FROM (lienFinancier
LEFT JOIN actionEnContrepartie
	ON actionEnContrepartie.IDActionEnContrepartie = lienFinancier.IDActionEnContrepartie
LEFT JOIN frequenceFluxFinancier
	ON lienFinancier.IDFrequence = frequenceFluxFinancier.IDFrequence
LEFT JOIN modalite AS modalite1
	ON lienFinancier.IDModalite = modalite1.IDModalite
LEFT JOIN modalite AS modalite2
	ON lienFinancier.IDModalite2 = modalite2.IDModalite
LEFT JOIN personne AS personne1
	ON lienFinancier.IDIntermediaire =  personne1.IDPersonne
LEFT JOIN personne AS personne2
	ON lienFinancier.IDIntermediaire2 = personne2.IDPersonne
LEFT JOIN localisation AS localisationAlter
	ON lienFinancier.IDLocalisationAlter = localisationAlter.IDLocalisation
LEFT JOIN localisation AS localisationEgo
	ON lienFinancier.IDLocalisationEgo = localisationEgo.IDLocalisation
LEFT JOIN ville AS villeAlter
	ON villeAlter.IDVille = localisationAlter.IDVille
LEFT JOIN ville AS villeEgo
	ON villeEgo.IDVille = localisationEgo.IDVille
LEFT JOIN pays AS paysAlter
	ON paysAlter.IDPays = localisationAlter.IDPays
LEFT JOIN pays AS paysEgo
	ON paysEgo.IDPays = localisationEgo.IDPays
LEFT JOIN relation
	ON lienFinancier.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienSang(){
$rep = $GLOBALS['bdd']->query('
SELECT lienSang.*,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (lienSang
LEFT JOIN relation
	ON lienSang.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienSexuel(){
$rep = $GLOBALS['bdd']->query('
SELECT lienSexuel.*,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (lienSexuel
LEFT JOIN relation
	ON lienSexuel.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienReseau(){
$rep = $GLOBALS['bdd']->query('
SELECT lienReseau.*,
actionReseau.*,
localisationAlter.Adresse AS AdresseAlter, localisationAlter.CodePostal AS CodePostalAlter, 
localisationEgo.Adresse AS AdresseEgo, localisationEgo.CodePostal AS CodePostalEgo,
villeAlter.Ville AS VilleAlter, villeEgo.Ville AS VilleEgo,
paysAlter.Pays AS PaysAlter, paysEgo.Pays AS PaysEgo,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (lienReseau
LEFT JOIN actionReseau
	ON lienReseau.IDActionReseau = actionReseau.IDActionReseau
LEFT JOIN relation
	ON lienReseau.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
LEFT JOIN localisation AS localisationAlter
	ON lienReseau.IDLocalisationAlter = localisationAlter.IDLocalisation
LEFT JOIN localisation AS localisationEgo
	ON lienReseau.IDLocalisationEgo = localisationEgo.IDLocalisation
LEFT JOIN ville AS villeAlter
	ON villeAlter.IDVille = localisationAlter.IDVille
LEFT JOIN ville AS villeEgo
	ON villeEgo.IDVille = localisationEgo.IDVille
LEFT JOIN pays AS paysAlter
	ON paysAlter.IDPays = localisationAlter.IDPays
LEFT JOIN pays AS paysEgo
	ON paysEgo.IDPays = localisationEgo.IDPays
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienConnaissance(){
$rep = $GLOBALS['bdd']->query('
SELECT lienConnaissance.*,
localisationAlter.Adresse AS AdresseAlter, localisationAlter.CodePostal AS CodePostalAlter, 
localisationEgo.Adresse AS AdresseEgo, localisationEgo.CodePostal AS CodePostalEgo,
villeAlter.Ville AS VilleAlter, villeEgo.Ville AS VilleEgo,
paysAlter.Pays AS PaysAlter, paysEgo.Pays AS PaysEgo,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (lienConnaissance
LEFT JOIN relation
	ON lienConnaissance.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
LEFT JOIN localisation AS localisationAlter
	ON lienConnaissance.IDLocalisationAlter = localisationAlter.IDLocalisation
LEFT JOIN localisation AS localisationEgo
	ON lienConnaissance.IDLocalisationEgo = localisationEgo.IDLocalisation
LEFT JOIN ville AS villeAlter
	ON villeAlter.IDVille = localisationAlter.IDVille
LEFT JOIN ville AS villeEgo
	ON villeEgo.IDVille = localisationEgo.IDVille
LEFT JOIN pays AS paysAlter
	ON paysAlter.IDPays = localisationAlter.IDPays
LEFT JOIN pays AS paysEgo
	ON paysEgo.IDPays = localisationEgo.IDPays
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienJuju(){
$rep = $GLOBALS['bdd']->query('
SELECT lienJuju.*,
fonctionJujuAlter.FonctionJuju as FonctionJujuAlter, fonctionJujuEgo.FonctionJuju as FonctionJujuEgo, 
localisationCeremonie.Adresse AS AdresseCeremonie, localisationCeremonie.CodePostal AS CodePostalCeremonie,
villeCeremonie.Ville AS VilleCeremonie, paysCeremonie.Pays AS PaysCeremonie,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (lienJuju
LEFT JOIN relation
	ON lienJuju.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
LEFT JOIN localisation AS localisationCeremonie
	ON lienJuju.IDLocalisationCeremonie = localisationCeremonie.IDLocalisation
LEFT JOIN ville AS villeCeremonie
	ON villeCeremonie.IDVille = localisationCeremonie.IDVille
LEFT JOIN pays AS paysCeremonie
	ON paysCeremonie.IDPays = localisationCeremonie.IDPays
LEFT JOIN fonctionJuju AS fonctionJujuAlter
	ON lienJuju.IDFonctionAlterJuju = fonctionJujuAlter.IDFonctionJuju
LEFT JOIN fonctionJuju AS fonctionJujuEgo
	ON lienJuju.IDFonctionEgoJuju = fonctionJujuEgo.IDFonctionJuju
)
ORDER BY IDRelation DESC
');
return $rep;
}

function readLienSoutien(){
$rep = $GLOBALS['bdd']->query('
SELECT lienSoutien.*,
typeSoutien.TypeSoutien,
relation.IDAlter, relation.IDEgo,
personneEgo.IDPersonne as IDEgo, personneEgo.Nom as NomEgo, personneEgo.Prenom as PrenomEgo, personneEgo.IDDossier as IDDossierEgo,
personneAlter.IDPersonne as IDAlter, personneAlter.Nom as NomAlter, personneAlter.Prenom as PrenomAlter, personneAlter.IDDossier as IDDossierAlter
FROM (lienSoutien
LEFT JOIN relation
	ON lienSoutien.IDRelation = relation.IDRelation
LEFT JOIN personne AS personneEgo
	ON relation.IDEgo = personneEgo.IDPersonne
LEFT JOIN personne AS personneAlter
	ON relation.IDAlter = personneAlter.IDPersonne
LEFT JOIN typeSoutien
	ON lienSoutien.IDTypeSoutien = typeSoutien.IDTypeSoutien
)
ORDER BY IDRelation DESC
');
return $rep;
}

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

function readSource(){
	$rep = $GLOBALS['bdd']->query('
	SELECT cote.IDCote, cote.NomCote, cote.DateCote, cote.InformationsNonExploitees, natureCote.NatureCote
	FROM (cote
	LEFT JOIN natureCote
		ON cote.IDNatureCote = natureCote.IDNatureCote
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
	SELECT personne.IDPersonne, cote.NomCote, natureCote.NatureCote, cote.DateCote, cote.InformationsNonExploitees
	FROM (personneToCote
	LEFT JOIN personne ON personne.IDPersonne = personneToCote.IDPersonne
	LEFT JOIN cote ON cote.IDCote = personneToCote.IDCote
	LEFT JOIN natureCote ON cote.IDNatureCote = natureCote.IDNatureCote
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