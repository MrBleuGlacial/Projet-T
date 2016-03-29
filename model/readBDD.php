<?php
/**
*Ensemble de fonctions utilitaires pour accéder aux données de la BDD.
*/

//include("../model/BDDAccess.php");

/**
*Lit les données relatives aux personnes.
*/
function readPersonneMain(){
	$rep = $GLOBALS['bdd']->query('
	SELECT personne.*,
	ville.Ville as VilleNaissance, pays.Pays as PaysNaissance, profession1.Profession as ProfessionAvantMigration, 
	profession2.Profession as ProfessionDurantInterrogatoire, 
	paysTransit1.Pays as PaysTransit1, paysTransit2.Pays as PaysTransit2,
	paysNationalite.Pays as Nationalite, attributsFamiliaux.*, attributsAdministratifs.*, 
	localisationCouple.Adresse as AdresseLocalisationCouple, localisationCouple.CodePostal as CodePostalLocalisationCouple, 
	villeLocalisationCouple.Ville as VilleLocalisationCouple, paysLocalisationCouple.Pays as PaysLocalisationCouple,
	coteInitiale.NomCote as NomCoteInitiale
	FROM (personne
	LEFT JOIN cote AS coteInitiale
		ON personne.IDCoteInitiale = coteInitiale.IDCote
	LEFT JOIN ville
		ON personne.IDVilleNaissance = ville.IDVille
	LEFT JOIN pays
		ON personne.IDPaysNaissance = pays.IDPays
	LEFT JOIN pays AS paysNationalite
		ON personne.IDNationalite = paysNationalite.IDPays
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

/**
*Lit les données relatives aux déplacements.
*/
function readGeoMain(){
	$rep = $GLOBALS['bdd']->query('
	SELECT geo.*, 
	localisationDepart.Adresse as AdresseDepart, localisationDepart.CodePostal as CodePostalDepart, 
	villeDepart.Ville as VilleDepart, paysDepart.Pays as PaysDepart,
	localisationArrivee.Adresse as AdresseArrivee, localisationArrivee.CodePostal as CodePostalArrivee,
	villeArrivee.Ville as VilleArrivee, paysArrivee.Pays as PaysArrivee,
	personne.IDPersonne, personne.Nom, personne.Prenom
	FROM (geo
	LEFT JOIN localisation AS localisationDepart
		ON geo.IDLocalisationDepart = localisationDepart.IDLocalisation
	LEFT JOIN pays AS paysDepart
		ON localisationDepart.IDPays = paysDepart.IDPays
	LEFT JOIN ville AS villeDepart
		ON localisationDepart.IDVille = villeDepart.IDVille
	LEFT JOIN localisation AS localisationArrivee
		ON geo.IDLocalisationArrivee = localisationArrivee.IDLocalisation
	LEFT JOIN pays AS paysArrivee
		ON localisationArrivee.IDPays = paysArrivee.IDPays
	LEFT JOIN ville AS villeArrivee
		ON localisationArrivee.IDVille = villeArrivee.IDVille
	LEFT JOIN personne
		ON personne.IDPersonne = geo.IDPersonne
	)
	');
	return $rep;
}

/**
*Lit les données spécifiques à une relation dont l'id est spécifié.
*/
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

/**
*Lit les données spécifiques aux relations.
*/
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

/**
*Lit les données relatives aux liens financiers.
*/
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

/**
*Lit les données relatives aux liens de sang.
*/
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

/**
*Lit les données relatives aux liens sexuels.
*/
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

/**
*Lit les données relatives aux liens réseaux.
*/
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

/**
*Lit les données relatives aux liens de connaissance.
*/
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

/**
*Lit les données relatives aux liens juju.
*/
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

/**
*Lit les données relatives aux liens soutien.
*/
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

/**
*Lit les données relatives aux localisations.
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

/**
*Lit les données relatives aux sources de la table cote.
*/
function readSource(){
	$rep = $GLOBALS['bdd']->query('
	SELECT cote.IDCote, cote.NomCote, cote.DateCote, cote.InformationsNonExploitees, natureCote.NatureCote
	FROM (cote
	LEFT JOIN natureCote
		ON cote.IDNatureCote = natureCote.IDNatureCote
	)');
	return $rep;
}


/**
*Lit les données liées relatives à une personne dont l'ID est spécifié.
*/
function readAllAssociationTable($IDPersonne, $tableLinkName, $tableName, $IDArgName, $ValueArgNameDeprecated=NULL){
	$rep = $GLOBALS['bdd']->query('
		SELECT personne.IDPersonne, personne.Prenom, personne.Nom, '.$tableName.'.*, '.$tableLinkName.'.* ,cote.NomCote
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

/**
*Lit les données relatives aux cotés liées à une personne dont l'ID est spécifié. 
*Tables possibles : personneToCote, personneToCoteFam ou personneToCoteAdm acceptées.
*/
function readPersonneToCoteAssociationWhere($IDPersonne,$tablePersonneToCoteType){
	$rep = $GLOBALS['bdd']->query('
		SELECT '.$tablePersonneToCoteType.'.IDPersonne, cote.NomCote
		FROM ('.$tablePersonneToCoteType.'
		LEFT JOIN cote
			ON '.$tablePersonneToCoteType.'.IDCote = cote.IDCote 
		)
	WHERE '.$tablePersonneToCoteType.'.IDPersonne = '. $IDPersonne
	);
	return $rep;
}

/**
*Lit les données relatives aux sources liées à une relation dont l'ID est spécifié.
*/
function readRelationAndSourceAssociation($IDRelation){
	$rep = $GLOBALS['bdd']->prepare('
		SELECT cote.NomCote
		FROM (relationToCote
		LEFT JOIN cote
			ON relationToCote.IDCote = cote.IDCote
		)
		WHERE relationToCote.IDRelation = :IDRelation');
	$rep->execute(array('IDRelation'=>$IDRelation));
	return $rep;
}

/**
*Idem que readRelationAndSourceAssociation mais avec potentiellement des attributs supplémentaires.
*Est devenu similaire à readRelationAndSourceAssociation. Deprecated.
*/
function readRelationAndSourceAssociationForForm($IDRelation){
	$rep = $GLOBALS['bdd']->prepare('
		SELECT cote.*
		FROM (relationToCote
		LEFT JOIN cote
			ON relationToCote.IDCote = cote.IDCote
		)
		WHERE relationToCote.IDRelation = :IDRelation');
	$rep->execute(array('IDRelation'=>$IDRelation));
	return $rep;
}

/**
*Lit les données relatives aux cotes liées à un déplacement dont l'ID est spécifié.
*/
function readGeoAndSourceAssociation($IDGeo){
	$rep = $GLOBALS['bdd']->prepare('
		SELECT cote.NomCote
		FROM (geoToCote
		LEFT JOIN cote
			ON geoToCote.IDCote = cote.IDCote
		)
		WHERE geoToCote.IDGeo = :IDGeo');
	$rep->execute(array('IDGeo'=>$IDGeo));
	return $rep;
}

/**
*Lit les données relatives aux potentiels doublons entre plusieurs personnes par rapport à une personne dont l'ID est spécifié.
*/
function readSimilariteAssociation($IDPersonne){
	$rep = $GLOBALS['bdd']->query('
		SELECT personneMineure.IDDossier, personneMineure.IDPersonne,
		personneMineure.Prenom, personneMineure.Nom
		FROM (possibiliteSimilaire
		LEFT JOIN personne AS personneMineure
			ON possibiliteSimilaire.IDPersonneMineure = personneMineure.IDPersonne
		)
		WHERE possibiliteSimilaire.IDPersonneMajeure = '.$IDPersonne);
	return $rep;
}

/**
*Lit les données relatives aux rôles liés à une personne dont l'ID est spécifié.
*/
function readRoleAssociation($IDPersonne){
	$rep = $GLOBALS['bdd']->prepare('
		SELECT role.Role, personneToRole.*, cote.NomCote
		FROM (personneToRole
		LEFT JOIN role
			ON personneToRole.IDRole = role.IDRole
		LEFT JOIN cote
			ON personneToRole.IDCote = cote.IDCote
		)
		WHERE personneToRole.IDPersonne = :IDPersonne');
	$rep->execute(array('IDPersonne'=>$IDPersonne));
	return $rep;
}

/**
*Lit les données relatives aux passports liés à une personne dont l'ID est spécifié.
*/
function readPassportAssociation($IDPersonne){
	$rep = $GLOBALS['bdd']->prepare('
		SELECT pays.Pays as NationalitePassport, personneToPassport.*, cote.NomCote
		FROM (personneToPassport
		LEFT JOIN pays
			ON personneToPassport.IDNationalitePassport = pays.IDPays
		LEFT JOIN cote
			ON personneToPassport.IDCote = cote.IDCote
		)
		WHERE personneToPassport.IDPersonne = :IDPersonne');
	$rep->execute(array('IDPersonne'=>$IDPersonne));
	return $rep;	
}

/**
*Lit les données relatives aux localisations liées à une personne dont l'ID est spécifié.
*/
function readLocalisationAssociation($IDPersonne){
	$rep = $GLOBALS['bdd']->prepare('
		SELECT personne.IDPersonne, personne.Prenom, personne.Nom, cote.NomCote, 
		localisation.IDLocalisation, localisation.Adresse, localisation.CodePostal, pays.Pays, ville.Ville,
		personneToLocalisation.DateDebutApx, personneToLocalisation.DateFinApx, personneToLocalisation.IDPersonneToLocalisation
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
		WHERE personne.IDPersonne = :IDPersonne');
	$rep->execute(array('IDPersonne'=>$IDPersonne));
	return $rep;
}

/**
*Lit les données relatives aux sources liées à une personne dont l'ID est spécifié.
*/
function readSourceOnlyAssociation($IDPersonne,$tableCote='personneToCote'){
	$rep = $GLOBALS['bdd']->prepare('
	SELECT personne.IDPersonne, cote.NomCote, cote.IDCote, natureCote.NatureCote, cote.DateCote, cote.InformationsNonExploitees
	FROM ('.$tableCote.'
	LEFT JOIN personne ON personne.IDPersonne = '.$tableCote.'.IDPersonne
	LEFT JOIN cote ON cote.IDCote = '.$tableCote.'.IDCote
	LEFT JOIN natureCote ON cote.IDNatureCote = natureCote.IDNatureCote
	)
	WHERE (personne.IDPersonne = :IDPersonne)');
	$rep->execute(array('IDPersonne'=>$IDPersonne));
	return $rep;
}

/**
*Lit les données relatives aux sources liées à un déplacement dont l'ID est spécifié.
*Utilisez readGeoAndSourceAssociation si IDCote non exploité.
*/
function readGeoToCoteAssociation($IDGeo){
	$rep = $GLOBALS['bdd']->prepare('
	SELECT geoToCote.*, cote.NomCote
	FROM (geoToCote
		LEFT JOIN cote ON geoToCote.IDCote = cote.IDCote
	)
	WHERE (geoToCote.IDGeo = :IDGeo)');
	$rep->execute(array('IDGeo'=>$IDGeo));
	return $rep;
}

/**
*Fonction générique de lecture de table.
*/
function readAllTable($table){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM '. $table
	);
	return $rep;
}

/**
*Fonction générique de lecture de table avec condition.
*/
function readAllTableWhere($table, $where){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM '. $table .' WHERE '.$where
	);
	return $rep;
}

/**
*Retourne une liste des personnes triées pour des inputs.
*/
function listPersonneForMenu(){
	$rep = $GLOBALS['bdd']->query('
	SELECT IDPersonne, IDDossier, Nom, Prenom
	FROM personne
	ORDER BY IDPersonne DESC
	');
	return $rep;
}

//--------------DEPRECATED--------------

/**
*Deprecated.
*/
function readVille(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM ville ORDER BY Ville
	');
	return $rep;	
}

/**
*Deprecated.
*/
function readPays(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM pays ORDER BY Pays
	');
	return $rep;	
}

/**
*Deprecated.
*/
function readNationalite(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM nationalite ORDER BY Nationalite
	');
	return $rep;	
}

/**
*Deprecated.
*/
function readLangue(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM langue ORDER BY Langue
	');
	return $rep;	
}

/**
*Deprecated.
*/
function readAlias(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM alias ORDER BY Alias
	');
	return $rep;	
}

/**
*Deprecated.
*/
function readTelephone(){
	$rep = $GLOBALS['bdd']->query('
	SELECT * FROM telephone
	');
	return $rep;	
}

//--- To check the manual id of a relation ---
/**
*Retourne l'ID maximal d'un paramètre spécifié d'une table spécifiée.
*/
function checkMaxID($maxArg,$tableArg){
	$rep =$GLOBALS['bdd']->query('SELECT MAX('.$maxArg.') FROM '.$tableArg);
	return $rep->fetch()[0];
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