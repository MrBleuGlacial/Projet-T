-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 27 Novembre 2015 à 16:58
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `TETRUM`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionEnContrepartie`
--

CREATE TABLE IF NOT EXISTS `actionEnContrepartie` (
  `IDActionEnContrepartie` int(11) NOT NULL,
  `ActionEnContrepartie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `actionReseau`
--

CREATE TABLE IF NOT EXISTS `actionReseau` (
  `IDActionReseau` int(11) NOT NULL,
  `ActionReseau` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alias`
--

CREATE TABLE IF NOT EXISTS `alias` (
  `IDAlias` int(11) NOT NULL,
  `Alias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attributsAdministratifs`
--

CREATE TABLE IF NOT EXISTS `attributsAdministratifs` (
  `IDPersonneAdm` int(11) NOT NULL,
  `NumEtranger` varchar(255) DEFAULT NULL,
  `NumRecepisse` varchar(255) DEFAULT NULL,
  `NumRecoursOFPRA` varchar(255) DEFAULT NULL,
  `DebutValRecepisse` date DEFAULT NULL,
  `FinValRecepisse` date DEFAULT NULL,
  `NumOQTF` varchar(255) DEFAULT NULL,
  `DebutOQTF` date DEFAULT NULL,
  `FinOQTF` date DEFAULT NULL,
  `NumSejour` varchar(255) DEFAULT NULL,
  `DebutValSejour` date DEFAULT NULL,
  `FinValSejour` date DEFAULT NULL,
  `CarteNationale` varchar(255) DEFAULT NULL,
  `PrestationSociale` float DEFAULT NULL,
  `ModeMigration` enum('Air','Terre','Mer','Air-Terre','Air-Mer','Terre-Mer','Air-Terre-Mer') DEFAULT NULL,
  `ArriveeEurope` date DEFAULT NULL,
  `ArriveeEuropeApx` varchar(120) DEFAULT NULL,
  `ArriveeFrance` date DEFAULT NULL,
  `ArriveeFranceApx` varchar(120) DEFAULT NULL,
  `IDPaysTransit1` int(11) DEFAULT NULL,
  `IDPaysTransit2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attributsFamiliaux`
--

CREATE TABLE IF NOT EXISTS `attributsFamiliaux` (
  `IDPersonneFam` int(11) NOT NULL,
  `Pere` varchar(50) DEFAULT NULL,
  `Mere` varchar(50) DEFAULT NULL,
  `RuptureParentale` enum('non','NSP','NR','décès','divorce/séparation') DEFAULT NULL,
  `Fratrie` int(11) DEFAULT NULL,
  `PositionFratrie` int(11) DEFAULT NULL,
  `SituationMatrimoniale` enum('en couple','marié(e)','célibataire','inconnue','séparé(e)/divorcé(e)','veuf/veuve') DEFAULT NULL,
  `ValidationSource` enum('déclarée','inférée','administrative','inconnue') DEFAULT NULL,
  `VitEnCouple` tinyint(1) DEFAULT NULL,
  `Enceinte` tinyint(1) DEFAULT NULL,
  `IDLocalisationCouple` int(11) DEFAULT NULL,
  `EnfantPaysOrigine` tinyint(1) DEFAULT NULL,
  `MaisonNigeria` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `causeDeplacement`
--

CREATE TABLE IF NOT EXISTS `causeDeplacement` (
  `IDCauseDeplacement` int(11) NOT NULL,
  `CauseDeplacement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contexteSocioGeo`
--

CREATE TABLE IF NOT EXISTS `contexteSocioGeo` (
  `IDContexteSocioGeo` int(11) NOT NULL,
  `ContexteSocioGeo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cote`
--

CREATE TABLE IF NOT EXISTS `cote` (
  `IDCote` int(11) NOT NULL,
  `NomCote` varchar(10) NOT NULL,
  `IDNatureCote` int(11) DEFAULT NULL,
  `DateCote` date DEFAULT NULL,
  `InformationsNonExploitees` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionJuju`
--

CREATE TABLE IF NOT EXISTS `fonctionJuju` (
  `IDFonctionJuju` int(11) NOT NULL,
  `FonctionJuju` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frequenceFluxFinancier`
--

CREATE TABLE IF NOT EXISTS `frequenceFluxFinancier` (
  `IDFrequence` int(11) NOT NULL,
  `Frequence` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `IDLangue` int(11) NOT NULL,
  `Langue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienConnaissance`
--

CREATE TABLE IF NOT EXISTS `lienConnaissance` (
  `IDRelation` int(11) NOT NULL,
  `PremierEvenement` date DEFAULT NULL,
  `IDLocalisationEgo` int(11) DEFAULT NULL,
  `IDLocalisationAlter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienFinancier`
--

CREATE TABLE IF NOT EXISTS `lienFinancier` (
  `IDLienFinancier` int(11) NOT NULL,
  `IDRelation` int(11) NOT NULL,
  `IDActionEnContrepartie` int(11) DEFAULT NULL,
  `DateFlux` varchar(32) DEFAULT NULL,
  `DateFluxApx` varchar(120) DEFAULT NULL,
  `IDFrequence` int(11) DEFAULT NULL,
  `MontantEuro` int(11) DEFAULT NULL,
  `IDModalite` int(11) DEFAULT NULL,
  `IDIntermediaire` int(11) DEFAULT NULL,
  `IDModalite2` int(11) DEFAULT NULL,
  `IDIntermediaire2` int(11) DEFAULT NULL,
  `IDLocalisationEgo` int(11) DEFAULT NULL,
  `IDLocalisationAlter` int(11) DEFAULT NULL,
  `Intermediaire` tinyint(1) DEFAULT NULL,
  `IDFlux` int(11) DEFAULT NULL,
  `ActionDuFlux` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienJuju`
--

CREATE TABLE IF NOT EXISTS `lienJuju` (
  `IDLienJuju` int(11) NOT NULL,
  `IDRelation` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `IDLocalisationCeremonie` int(11) DEFAULT NULL,
  `IDFonctionAlterJuju` int(11) DEFAULT NULL,
  `IDFonctionEgoJuju` int(11) DEFAULT NULL,
  `IDJuju` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienReseau`
--

CREATE TABLE IF NOT EXISTS `lienReseau` (
  `IDLienReseau` int(11) NOT NULL,
  `IDRelation` int(11) NOT NULL,
  `DateIdentification` date DEFAULT NULL,
  `DateIdentificationApx` varchar(120) DEFAULT NULL,
  `IDLocalisationEgo` int(11) DEFAULT NULL,
  `IDLocalisationAlter` int(11) DEFAULT NULL,
  `Intermediaire` tinyint(1) DEFAULT NULL,
  `IDReseau` int(11) DEFAULT NULL,
  `IDActionReseau` int(11) DEFAULT NULL,
  `NoteAction` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienSang`
--

CREATE TABLE IF NOT EXISTS `lienSang` (
  `IDRelation` int(11) NOT NULL,
  `Type` enum('fratrie','parent','enfant','oncle/tante','grands parents','demi-fratrie','autre') NOT NULL,
  `Certification` enum('avéré','prétendu','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienSexuel`
--

CREATE TABLE IF NOT EXISTS `lienSexuel` (
  `IDRelation` int(11) NOT NULL,
  `Prostitution` tinyint(1) DEFAULT NULL,
  `Viol` tinyint(1) DEFAULT NULL,
  `EnCouple` tinyint(1) DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  `DateApx` varchar(120) DEFAULT NULL,
  `TypeLienSexuel` enum('Mari','Concubin','Amant','Petit-Ami','Autre') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienSoutien`
--

CREATE TABLE IF NOT EXISTS `lienSoutien` (
  `IDLienSoutien` int(11) NOT NULL,
  `IDRelation` int(11) NOT NULL,
  `DatePremierContact` date DEFAULT NULL,
  `DatePremierContactApx` varchar(120) DEFAULT NULL,
  `IDTypeSoutien` int(11) DEFAULT NULL,
  `Intermediaire` tinyint(1) DEFAULT NULL,
  `IDSoutien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lieuProstitution`
--

CREATE TABLE IF NOT EXISTS `lieuProstitution` (
  `IDPersonne` int(11) NOT NULL,
  `IDSource` int(11) DEFAULT NULL,
  `IDLocalisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE IF NOT EXISTS `localisation` (
  `IDLocalisation` int(11) NOT NULL,
  `IDPays` int(11) DEFAULT NULL,
  `IDVille` int(11) DEFAULT NULL,
  `Adresse` varchar(150) DEFAULT NULL,
  `CodePostal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modalite`
--

CREATE TABLE IF NOT EXISTS `modalite` (
  `IDModalite` int(11) NOT NULL,
  `Modalite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modeTransport`
--

CREATE TABLE IF NOT EXISTS `modeTransport` (
  `IDModeTransport` int(11) NOT NULL,
  `ModeTransport` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

CREATE TABLE IF NOT EXISTS `nationalite` (
  `IDNationalite` int(11) NOT NULL,
  `Nationalite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `natureCote`
--

CREATE TABLE IF NOT EXISTS `natureCote` (
  `IDNatureCote` int(11) NOT NULL,
  `NatureCote` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `IDPays` int(11) NOT NULL,
  `Pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `IDPersonne` int(11) NOT NULL,
  `IDTmp` int(11) DEFAULT NULL,
  `IDDossier` varchar(5) NOT NULL,
  `IDCoteInitiale` int(11) DEFAULT NULL,
  `TypePersonne` enum('Personne Physique','Personne Morale','','') DEFAULT NULL,
  `Sexe` enum('Homme','Femme') DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `IDVilleNaissance` int(11) DEFAULT NULL,
  `IDPaysNaissance` int(11) DEFAULT NULL,
  `IDNationalite` int(11) DEFAULT NULL,
  `SeProstitue` tinyint(1) DEFAULT NULL,
  `IDProfessionAvantMigration` int(11) DEFAULT NULL,
  `IDProfessionDurantInterrogatoire` int(11) DEFAULT NULL,
  `DetteInitiale` int(11) DEFAULT NULL,
  `DetteRenegociee` int(11) DEFAULT NULL,
  `DateDettePayee` date DEFAULT NULL,
  `DateEstRecrute` date DEFAULT NULL,
  `DateRecrute` date DEFAULT NULL,
  `Diplome` enum('primary school','secondary school','aucun','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToAlias`
--

CREATE TABLE IF NOT EXISTS `personneToAlias` (
  `IDPersonne` int(11) NOT NULL,
  `IDAlias` int(11) NOT NULL,
  `IDCote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToCote`
--

CREATE TABLE IF NOT EXISTS `personneToCote` (
  `IDPersonne` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToCoteAdm`
--

CREATE TABLE IF NOT EXISTS `personneToCoteAdm` (
  `IDPersonne` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToCoteFam`
--

CREATE TABLE IF NOT EXISTS `personneToCoteFam` (
  `IDPersonne` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToLangue`
--

CREATE TABLE IF NOT EXISTS `personneToLangue` (
  `IDPersonne` int(11) NOT NULL,
  `IDLangue` int(11) NOT NULL,
  `IDCote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToLocalisation`
--

CREATE TABLE IF NOT EXISTS `personneToLocalisation` (
  `IDPersonne` int(11) NOT NULL,
  `IDLocalisation` int(11) NOT NULL,
  `IDCote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToPassport`
--

CREATE TABLE IF NOT EXISTS `personneToPassport` (
  `IDPersonne` int(11) NOT NULL,
  `IDCote` int(11) DEFAULT NULL,
  `NumPassport` int(11) NOT NULL,
  `IDNationalitePassport` int(11) DEFAULT NULL,
  `DebutValPassport` date DEFAULT NULL,
  `FinValPassport` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToRole`
--

CREATE TABLE IF NOT EXISTS `personneToRole` (
  `IDPersonne` int(11) NOT NULL,
  `IDRole` int(11) NOT NULL,
  `DebutRole` date DEFAULT NULL,
  `PeriodeMois` varchar(64) DEFAULT NULL,
  `PeriodeAnnee` varchar(64) DEFAULT NULL,
  `FinRole` date DEFAULT NULL,
  `IdentifiantQuali` varchar(128) DEFAULT NULL,
  `IDCote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personneToTelephone`
--

CREATE TABLE IF NOT EXISTS `personneToTelephone` (
  `IDPersonne` int(11) NOT NULL,
  `IDTelephone` int(11) NOT NULL,
  `IDCote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `possibiliteSimilaire`
--

CREATE TABLE IF NOT EXISTS `possibiliteSimilaire` (
  `IDPersonneMajeure` int(11) NOT NULL,
  `IDPersonneMineure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `IDProfession` int(11) NOT NULL,
  `Profession` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `IDRelation` int(11) NOT NULL,
  `IDTmp` int(11) NOT NULL,
  `IDAlter` int(11) NOT NULL,
  `IDEgo` int(11) NOT NULL,
  `IDCoteInitiale` int(11) NOT NULL,
  `TraceLienDossier` enum('avéré (admin)','téléphonique','déclaratif','sms','internet','visuel','autre','inconnu') DEFAULT NULL,
  `TypeLien` enum('financier','sang','sexuel','réseau','connaissance','juju','soutien','autre','inconnu') DEFAULT NULL,
  `IDContexteSocioGeo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relationToCote`
--

CREATE TABLE IF NOT EXISTS `relationToCote` (
  `IDRelation` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `IDRole` int(11) NOT NULL,
  `Role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `IDTelephone` int(11) NOT NULL,
  `NumTelephone` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeSoutien`
--

CREATE TABLE IF NOT EXISTS `typeSoutien` (
  `IDTypeSoutien` int(11) NOT NULL,
  `TypeSoutien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `IDVille` int(11) NOT NULL,
  `Ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actionEnContrepartie`
--
ALTER TABLE `actionEnContrepartie`
  ADD PRIMARY KEY (`IDActionEnContrepartie`);

--
-- Index pour la table `actionReseau`
--
ALTER TABLE `actionReseau`
  ADD PRIMARY KEY (`IDActionReseau`);

--
-- Index pour la table `alias`
--
ALTER TABLE `alias`
  ADD PRIMARY KEY (`IDAlias`),
  ADD UNIQUE KEY `Alias` (`Alias`);

--
-- Index pour la table `attributsAdministratifs`
--
ALTER TABLE `attributsAdministratifs`
  ADD PRIMARY KEY (`IDPersonneAdm`),
  ADD KEY `PaysTransit1` (`IDPaysTransit1`),
  ADD KEY `PaysTransit2` (`IDPaysTransit2`);

--
-- Index pour la table `attributsFamiliaux`
--
ALTER TABLE `attributsFamiliaux`
  ADD PRIMARY KEY (`IDPersonneFam`),
  ADD KEY `IDLocalisationCouple` (`IDLocalisationCouple`);

--
-- Index pour la table `causeDeplacement`
--
ALTER TABLE `causeDeplacement`
  ADD PRIMARY KEY (`IDCauseDeplacement`);

--
-- Index pour la table `contexteSocioGeo`
--
ALTER TABLE `contexteSocioGeo`
  ADD PRIMARY KEY (`IDContexteSocioGeo`),
  ADD UNIQUE KEY `ContexteSocioGeo` (`ContexteSocioGeo`);

--
-- Index pour la table `cote`
--
ALTER TABLE `cote`
  ADD PRIMARY KEY (`IDCote`),
  ADD UNIQUE KEY `NomCote` (`NomCote`),
  ADD KEY `IDNatureCote` (`IDNatureCote`);

--
-- Index pour la table `fonctionJuju`
--
ALTER TABLE `fonctionJuju`
  ADD PRIMARY KEY (`IDFonctionJuju`);

--
-- Index pour la table `frequenceFluxFinancier`
--
ALTER TABLE `frequenceFluxFinancier`
  ADD PRIMARY KEY (`IDFrequence`),
  ADD UNIQUE KEY `Frequence` (`Frequence`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`IDLangue`),
  ADD UNIQUE KEY `Langue` (`Langue`);

--
-- Index pour la table `lienConnaissance`
--
ALTER TABLE `lienConnaissance`
  ADD PRIMARY KEY (`IDRelation`),
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDLocalisationEgo` (`IDLocalisationEgo`),
  ADD KEY `IDLocalisationAlter` (`IDLocalisationAlter`);

--
-- Index pour la table `lienFinancier`
--
ALTER TABLE `lienFinancier`
  ADD PRIMARY KEY (`IDLienFinancier`),
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDIntermediaire` (`IDIntermediaire`),
  ADD KEY `IDIntremediaire2` (`IDIntermediaire2`),
  ADD KEY `IDLocalisationEgo` (`IDLocalisationEgo`),
  ADD KEY `IDLocalisationAlter` (`IDLocalisationAlter`),
  ADD KEY `IDModalite` (`IDModalite`),
  ADD KEY `IDModalite2` (`IDModalite2`),
  ADD KEY `IDActionEnContrepartie` (`IDActionEnContrepartie`),
  ADD KEY `IDFrequence` (`IDFrequence`);

--
-- Index pour la table `lienJuju`
--
ALTER TABLE `lienJuju`
  ADD PRIMARY KEY (`IDLienJuju`),
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDLocalisationCeremonie` (`IDLocalisationCeremonie`),
  ADD KEY `IDFonctionAlterJuju` (`IDFonctionAlterJuju`),
  ADD KEY `IDFonctionEgoJuju` (`IDFonctionEgoJuju`);

--
-- Index pour la table `lienReseau`
--
ALTER TABLE `lienReseau`
  ADD PRIMARY KEY (`IDLienReseau`),
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDLocalisationEgo` (`IDLocalisationEgo`),
  ADD KEY `IDLocalisationAlter` (`IDLocalisationAlter`),
  ADD KEY `IDActionReseau` (`IDActionReseau`);

--
-- Index pour la table `lienSang`
--
ALTER TABLE `lienSang`
  ADD PRIMARY KEY (`IDRelation`),
  ADD KEY `IDRelation` (`IDRelation`);

--
-- Index pour la table `lienSexuel`
--
ALTER TABLE `lienSexuel`
  ADD PRIMARY KEY (`IDRelation`),
  ADD KEY `IDRelation` (`IDRelation`);

--
-- Index pour la table `lienSoutien`
--
ALTER TABLE `lienSoutien`
  ADD PRIMARY KEY (`IDLienSoutien`),
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDTypeAccompagnement` (`IDTypeSoutien`);

--
-- Index pour la table `lieuProstitution`
--
ALTER TABLE `lieuProstitution`
  ADD PRIMARY KEY (`IDPersonne`,`IDLocalisation`),
  ADD KEY `IDPersonne` (`IDPersonne`),
  ADD KEY `IDSource` (`IDSource`),
  ADD KEY `IDAdresse` (`IDLocalisation`);

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`IDLocalisation`),
  ADD KEY `IDVille` (`IDVille`),
  ADD KEY `IDPays` (`IDPays`) USING BTREE;

--
-- Index pour la table `modalite`
--
ALTER TABLE `modalite`
  ADD PRIMARY KEY (`IDModalite`);

--
-- Index pour la table `modeTransport`
--
ALTER TABLE `modeTransport`
  ADD PRIMARY KEY (`IDModeTransport`);

--
-- Index pour la table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`IDNationalite`),
  ADD UNIQUE KEY `Nationalite` (`Nationalite`);

--
-- Index pour la table `natureCote`
--
ALTER TABLE `natureCote`
  ADD PRIMARY KEY (`IDNatureCote`),
  ADD UNIQUE KEY `NatureCote` (`NatureCote`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`IDPays`),
  ADD UNIQUE KEY `Pays` (`Pays`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`IDPersonne`),
  ADD KEY `IDNationaliteToIDNationalite` (`IDNationalite`),
  ADD KEY `IDPaysNaissanceToIDPays` (`IDPaysNaissance`),
  ADD KEY `Localisation` (`IDVilleNaissance`,`IDPaysNaissance`,`IDNationalite`) USING BTREE,
  ADD KEY `ProfessionAvantMigration` (`IDProfessionAvantMigration`),
  ADD KEY `ProfessionDurantInterrogatoire` (`IDProfessionDurantInterrogatoire`);

--
-- Index pour la table `personneToAlias`
--
ALTER TABLE `personneToAlias`
  ADD PRIMARY KEY (`IDPersonne`,`IDAlias`),
  ADD KEY `PersonneToAliasIDAlias` (`IDAlias`),
  ADD KEY `IDCote` (`IDCote`);

--
-- Index pour la table `personneToCote`
--
ALTER TABLE `personneToCote`
  ADD PRIMARY KEY (`IDPersonne`,`IDCote`),
  ADD KEY `PersonneToCoteIDCote` (`IDCote`);

--
-- Index pour la table `personneToCoteAdm`
--
ALTER TABLE `personneToCoteAdm`
  ADD PRIMARY KEY (`IDPersonne`,`IDCote`);

--
-- Index pour la table `personneToCoteFam`
--
ALTER TABLE `personneToCoteFam`
  ADD PRIMARY KEY (`IDPersonne`,`IDCote`);

--
-- Index pour la table `personneToLangue`
--
ALTER TABLE `personneToLangue`
  ADD PRIMARY KEY (`IDPersonne`,`IDLangue`),
  ADD KEY `PersonneToLangueIDLangue` (`IDLangue`);

--
-- Index pour la table `personneToLocalisation`
--
ALTER TABLE `personneToLocalisation`
  ADD PRIMARY KEY (`IDPersonne`,`IDLocalisation`),
  ADD KEY `PersonneToLocalisationIDLocalisation` (`IDLocalisation`);

--
-- Index pour la table `personneToPassport`
--
ALTER TABLE `personneToPassport`
  ADD PRIMARY KEY (`IDPersonne`,`NumPassport`),
  ADD KEY `IDPersonne` (`IDPersonne`),
  ADD KEY `IDNationalitePassport` (`IDNationalitePassport`),
  ADD KEY `IDCote` (`IDCote`);

--
-- Index pour la table `personneToRole`
--
ALTER TABLE `personneToRole`
  ADD PRIMARY KEY (`IDPersonne`,`IDRole`),
  ADD KEY `IDPersonne` (`IDPersonne`),
  ADD KEY `IDRole` (`IDRole`),
  ADD KEY `IDCote` (`IDCote`);

--
-- Index pour la table `personneToTelephone`
--
ALTER TABLE `personneToTelephone`
  ADD PRIMARY KEY (`IDPersonne`,`IDTelephone`),
  ADD KEY `PersonneToTelephoneIDTelephone` (`IDTelephone`);

--
-- Index pour la table `possibiliteSimilaire`
--
ALTER TABLE `possibiliteSimilaire`
  ADD PRIMARY KEY (`IDPersonneMajeure`,`IDPersonneMineure`),
  ADD KEY `IDPersonneMineure` (`IDPersonneMineure`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`IDProfession`),
  ADD UNIQUE KEY `Profession` (`Profession`);

--
-- Index pour la table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`IDRelation`),
  ADD KEY `IDAlterEgo` (`IDAlter`,`IDEgo`) USING BTREE,
  ADD KEY `IDEgoToIDPersonne` (`IDEgo`),
  ADD KEY `ContexteSocioGeographique` (`IDContexteSocioGeo`),
  ADD KEY `IDCoteInitiale` (`IDCoteInitiale`);

--
-- Index pour la table `relationToCote`
--
ALTER TABLE `relationToCote`
  ADD PRIMARY KEY (`IDRelation`,`IDCote`),
  ADD KEY `RelationToCoteIDCote` (`IDCote`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDRole`),
  ADD UNIQUE KEY `Role` (`Role`);

--
-- Index pour la table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`IDTelephone`),
  ADD UNIQUE KEY `NumTelephone` (`NumTelephone`);

--
-- Index pour la table `typeSoutien`
--
ALTER TABLE `typeSoutien`
  ADD PRIMARY KEY (`IDTypeSoutien`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`IDVille`),
  ADD UNIQUE KEY `Ville` (`Ville`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actionEnContrepartie`
--
ALTER TABLE `actionEnContrepartie`
  MODIFY `IDActionEnContrepartie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `actionReseau`
--
ALTER TABLE `actionReseau`
  MODIFY `IDActionReseau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `alias`
--
ALTER TABLE `alias`
  MODIFY `IDAlias` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `attributsFamiliaux`
--
ALTER TABLE `attributsFamiliaux`
  MODIFY `IDPersonneFam` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `causeDeplacement`
--
ALTER TABLE `causeDeplacement`
  MODIFY `IDCauseDeplacement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contexteSocioGeo`
--
ALTER TABLE `contexteSocioGeo`
  MODIFY `IDContexteSocioGeo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cote`
--
ALTER TABLE `cote`
  MODIFY `IDCote` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fonctionJuju`
--
ALTER TABLE `fonctionJuju`
  MODIFY `IDFonctionJuju` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `frequenceFluxFinancier`
--
ALTER TABLE `frequenceFluxFinancier`
  MODIFY `IDFrequence` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `IDLangue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lienFinancier`
--
ALTER TABLE `lienFinancier`
  MODIFY `IDLienFinancier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lienJuju`
--
ALTER TABLE `lienJuju`
  MODIFY `IDLienJuju` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lienReseau`
--
ALTER TABLE `lienReseau`
  MODIFY `IDLienReseau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lienSoutien`
--
ALTER TABLE `lienSoutien`
  MODIFY `IDLienSoutien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `IDLocalisation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modalite`
--
ALTER TABLE `modalite`
  MODIFY `IDModalite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modeTransport`
--
ALTER TABLE `modeTransport`
  MODIFY `IDModeTransport` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `IDNationalite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `natureCote`
--
ALTER TABLE `natureCote`
  MODIFY `IDNatureCote` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `IDPays` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `IDPersonne` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `IDProfession` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `relation`
--
ALTER TABLE `relation`
  MODIFY `IDRelation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `IDTelephone` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typeSoutien`
--
ALTER TABLE `typeSoutien`
  MODIFY `IDTypeSoutien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `IDVille` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attributsAdministratifs`
--
ALTER TABLE `attributsAdministratifs`
  ADD CONSTRAINT `IDPersonneInAttributsAdmin` FOREIGN KEY (`IDPersonneAdm`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PaysTransit1InAttributsAdmin` FOREIGN KEY (`IDPaysTransit1`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `PaysTransit2InAttributsAdmin` FOREIGN KEY (`IDPaysTransit2`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `attributsFamiliaux`
--
ALTER TABLE `attributsFamiliaux`
  ADD CONSTRAINT `IDLocalisationCoupleToIDLocalisation` FOREIGN KEY (`IDLocalisationCouple`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDPersonneAttributsToIDPersonne` FOREIGN KEY (`IDPersonneFam`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cote`
--
ALTER TABLE `cote`
  ADD CONSTRAINT `NatureCoteToItself` FOREIGN KEY (`IDNatureCote`) REFERENCES `natureCote` (`IDNatureCote`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienConnaissance`
--
ALTER TABLE `lienConnaissance`
  ADD CONSTRAINT `LConnaissanceIDLocalisationAlter` FOREIGN KEY (`IDLocalisationAlter`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LConnaissanceIDLocalisationEgo` FOREIGN KEY (`IDLocalisationEgo`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LConnaissanceIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienFinancier`
--
ALTER TABLE `lienFinancier`
  ADD CONSTRAINT `IDAenCToSame` FOREIGN KEY (`IDActionEnContrepartie`) REFERENCES `actionEnContrepartie` (`IDActionEnContrepartie`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDModalite2ToModalite` FOREIGN KEY (`IDModalite2`) REFERENCES `modalite` (`IDModalite`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDModaliteToSame` FOREIGN KEY (`IDModalite`) REFERENCES `modalite` (`IDModalite`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDfrequenceToSame` FOREIGN KEY (`IDFrequence`) REFERENCES `frequenceFluxFinancier` (`IDFrequence`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancier` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancierIDIntermediaire1` FOREIGN KEY (`IDIntermediaire`) REFERENCES `personne` (`IDPersonne`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancierIDIntermediaire2` FOREIGN KEY (`IDIntermediaire2`) REFERENCES `personne` (`IDPersonne`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancierIDLocalisationAlter` FOREIGN KEY (`IDLocalisationAlter`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancierIDLocalisationEgo` FOREIGN KEY (`IDLocalisationEgo`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienJuju`
--
ALTER TABLE `lienJuju`
  ADD CONSTRAINT `IDFonctionAlterJujuToIDFonctionJuju` FOREIGN KEY (`IDFonctionAlterJuju`) REFERENCES `fonctionJuju` (`IDFonctionJuju`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDFonctionEgoJujuToIDFonctionJuju` FOREIGN KEY (`IDFonctionEgoJuju`) REFERENCES `fonctionJuju` (`IDFonctionJuju`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LJujuIDLocalisationCeremonie` FOREIGN KEY (`IDLocalisationCeremonie`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LJujuIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienReseau`
--
ALTER TABLE `lienReseau`
  ADD CONSTRAINT `IDActionReseauToIDActionReseau` FOREIGN KEY (`IDActionReseau`) REFERENCES `actionReseau` (`IDActionReseau`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LReseauIDLocalisationAlter` FOREIGN KEY (`IDLocalisationAlter`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LReseauIDLocalisationEgo` FOREIGN KEY (`IDLocalisationEgo`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LReseauIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienSang`
--
ALTER TABLE `lienSang`
  ADD CONSTRAINT `LSangIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienSexuel`
--
ALTER TABLE `lienSexuel`
  ADD CONSTRAINT `LSexuelIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lienSoutien`
--
ALTER TABLE `lienSoutien`
  ADD CONSTRAINT `IDTypeAccompagnementToIDTypeSoutien` FOREIGN KEY (`IDTypeSoutien`) REFERENCES `typeSoutien` (`IDTypeSoutien`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LSoutienIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lieuProstitution`
--
ALTER TABLE `lieuProstitution`
  ADD CONSTRAINT `LieuProstitutionIDAdresse` FOREIGN KEY (`IDLocalisation`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LieuProstitutionIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LieuProstitutionIDSource` FOREIGN KEY (`IDSource`) REFERENCES `cote` (`IDCote`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `LocalisationIDPays` FOREIGN KEY (`IDPays`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LocalisationIDVille` FOREIGN KEY (`IDVille`) REFERENCES `ville` (`IDVille`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `IDNationaliteToIDNationalite` FOREIGN KEY (`IDNationalite`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDPaysNaissanceToIDPays` FOREIGN KEY (`IDPaysNaissance`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDVilleNaissanceToIDVille` FOREIGN KEY (`IDVilleNaissance`) REFERENCES `ville` (`IDVille`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ProfessionAvantMigrationToIDProfession` FOREIGN KEY (`IDProfessionAvantMigration`) REFERENCES `profession` (`IDProfession`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ProfessionDurantInterrogatoireToIDProfession` FOREIGN KEY (`IDProfessionDurantInterrogatoire`) REFERENCES `profession` (`IDProfession`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToAlias`
--
ALTER TABLE `personneToAlias`
  ADD CONSTRAINT `PersonneToAliasIDAlias` FOREIGN KEY (`IDAlias`) REFERENCES `alias` (`IDAlias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PersonneToAliasIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToCote`
--
ALTER TABLE `personneToCote`
  ADD CONSTRAINT `PersonneToCoteIDCote` FOREIGN KEY (`IDCote`) REFERENCES `cote` (`IDCote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PersonneToCoteIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToLangue`
--
ALTER TABLE `personneToLangue`
  ADD CONSTRAINT `PersonneToLangueIDLangue` FOREIGN KEY (`IDLangue`) REFERENCES `langue` (`IDLangue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PersonneToLangueIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToLocalisation`
--
ALTER TABLE `personneToLocalisation`
  ADD CONSTRAINT `PersonneToLocalisationIDLocalisation` FOREIGN KEY (`IDLocalisation`) REFERENCES `localisation` (`IDLocalisation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PersonneToLocalisationIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToPassport`
--
ALTER TABLE `personneToPassport`
  ADD CONSTRAINT `IDNationalitePassportToIDNationalitePassport` FOREIGN KEY (`IDNationalitePassport`) REFERENCES `pays` (`IDPays`),
  ADD CONSTRAINT `IDPersonneToIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToRole`
--
ALTER TABLE `personneToRole`
  ADD CONSTRAINT `IDPersonneToSame` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDRoleToSame` FOREIGN KEY (`IDRole`) REFERENCES `role` (`IDRole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personneToTelephone`
--
ALTER TABLE `personneToTelephone`
  ADD CONSTRAINT `PersonneToTelephoneIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PersonneToTelephoneIDTelephone` FOREIGN KEY (`IDTelephone`) REFERENCES `telephone` (`IDTelephone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `possibiliteSimilaire`
--
ALTER TABLE `possibiliteSimilaire`
  ADD CONSTRAINT `IDPersonneMajeure` FOREIGN KEY (`IDPersonneMajeure`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDPersonneMineure` FOREIGN KEY (`IDPersonneMineure`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `IDAlterToIDPersonne` FOREIGN KEY (`IDAlter`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDContexteSocioGeoToSame` FOREIGN KEY (`IDContexteSocioGeo`) REFERENCES `contexteSocioGeo` (`IDContexteSocioGeo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDCoteInitialeToIDCote` FOREIGN KEY (`IDCoteInitiale`) REFERENCES `cote` (`IDCote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDEgoToIDPersonne` FOREIGN KEY (`IDEgo`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relationToCote`
--
ALTER TABLE `relationToCote`
  ADD CONSTRAINT `RelationToCoteIDCote` FOREIGN KEY (`IDCote`) REFERENCES `cote` (`IDCote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RelationToCoteIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
