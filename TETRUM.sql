-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 21 Septembre 2015 à 15:13
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
-- Structure de la table `actionReseau`
--

CREATE TABLE IF NOT EXISTS `actionReseau` (
  `IDActionReseau` int(11) NOT NULL,
  `ActionReseau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alias`
--

CREATE TABLE IF NOT EXISTS `alias` (
  `IDAlias` int(11) NOT NULL,
  `Alias` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `alias`
--

INSERT INTO `alias` (`IDAlias`, `Alias`) VALUES
(22, 'Barracuda'),
(39, 'Chomp'),
(25, 'Dauphin'),
(41, 'Girafe'),
(40, 'Ours Polaire'),
(30, 'Requin'),
(42, 'Rhinocéros Laineux'),
(17, 'Tata'),
(16, 'Toto');

-- --------------------------------------------------------

--
-- Structure de la table `attributsAdministratifs`
--

CREATE TABLE IF NOT EXISTS `attributsAdministratifs` (
  `IDPersonne` int(11) NOT NULL,
  `NumPassport` varchar(255) DEFAULT NULL,
  `DebutValPassport` date DEFAULT NULL,
  `FinValPassport` date DEFAULT NULL,
  `NumRecepisse` varchar(255) DEFAULT NULL,
  `DebutValRecepisse` date DEFAULT NULL,
  `FinValRecepisse` date DEFAULT NULL,
  `NumSejour` varchar(255) DEFAULT NULL,
  `DebutValSejour` date DEFAULT NULL,
  `FinValSejour` date DEFAULT NULL,
  `Prestation Sociale` int(11) DEFAULT NULL,
  `ModeMigration` enum('Air','Terre','Mer','Air-Terre','Air-Mer','Terre-Mer') DEFAULT NULL,
  `ArriveeEurope` date DEFAULT NULL,
  `ArriveeFrance` date DEFAULT NULL,
  `IDPaysTransit1` int(11) DEFAULT NULL,
  `IDPaysTransit2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attributsFamiliaux`
--

CREATE TABLE IF NOT EXISTS `attributsFamiliaux` (
  `IDPersonne` int(11) NOT NULL,
  `Pere` varchar(50) DEFAULT NULL,
  `Mere` varchar(50) DEFAULT NULL,
  `RuptureParentale` enum('non','NSP','NR','décès','divorce/séparation') DEFAULT NULL,
  `Fratrie` int(11) DEFAULT NULL,
  `PositionFratrie` int(11) DEFAULT NULL,
  `SituationMatrimoniale` enum('en couple','marié(e)','célibataire','inconnue','séparé(e)/divorcé(e)','veuf/veuve') DEFAULT NULL,
  `ValidationSource` enum('déclarée','inférée','administrative','inconnue') DEFAULT NULL,
  `VitEnCouple` tinyint(1) DEFAULT NULL,
  `Enceinte` tinyint(1) DEFAULT NULL
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
  `NatureCote` enum('Audition','Carte d''identité','Document administratif','Interpellation','IPC Interrogatoire première comparution','Livret de famille','Passeport','Récepissé demande d''asile','Retranscription écoute','Titre de séjour','Dossier étranger','Document autorités autre pays UE','Attache téléphonique','Recherches Administratives') NOT NULL,
  `DateCote` date DEFAULT NULL,
  `InformationsNonExploitees` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cote`
--

INSERT INTO `cote` (`IDCote`, `NomCote`, `NatureCote`, `DateCote`, `InformationsNonExploitees`) VALUES
(1, 'D9999', 'Interpellation', '1999-06-25', 'Tom Aterouge a fait frire Tobi Gorneau. A prouver.'),
(2, 'D1978', 'Audition', '1885-01-01', 'C''est quoi ces bugs ?!'),
(3, 'D0000', 'IPC Interrogatoire première comparution', '2000-10-25', 'Bugs résolus !'),
(4, 'D7555', 'Titre de séjour', '1885-06-24', 'A découvert l''arche perdue pendant ce voyage.'),
(5, 'X1522', 'Retranscription écoute', '1500-01-01', 'Projet Canadien');

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
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `IDLangue` int(11) NOT NULL,
  `Langue` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`IDLangue`, `Langue`) VALUES
(10, 'Langue 1'),
(11, 'Langue 2'),
(12, 'Langue 3'),
(14, 'Langue 4'),
(13, 'Langue 5');

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
  `IDRelation` int(11) NOT NULL,
  `ActionEnContrepartie` varchar(100) DEFAULT NULL,
  `DateFlux` date DEFAULT NULL,
  `Frequence` int(11) DEFAULT NULL,
  `MontantEuro` int(11) DEFAULT NULL,
  `IDModalite` int(11) DEFAULT NULL,
  `IDIntermediaire` int(11) DEFAULT NULL,
  `IDModalite2_A_VERIFIER` int(11) DEFAULT NULL,
  `IDIntremediaire2` int(11) DEFAULT NULL,
  `IDLocalisationEgo` int(11) DEFAULT NULL,
  `IDLocalisationAlter` int(11) DEFAULT NULL,
  `Intermediaire` tinyint(1) DEFAULT NULL,
  `IdentificationFlux` int(11) DEFAULT NULL,
  `ActionDuFlux` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienJuju`
--

CREATE TABLE IF NOT EXISTS `lienJuju` (
  `IDRelation` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `IDLocalisationCeremonie` int(11) DEFAULT NULL,
  `IDFonctionEgoJuju` int(11) DEFAULT NULL,
  `IdentificationJuju` int(11) DEFAULT NULL,
  `IDFonctionAlterJuju` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienReseau`
--

CREATE TABLE IF NOT EXISTS `lienReseau` (
  `IDRelation` int(11) NOT NULL,
  `DateIdentification` date DEFAULT NULL,
  `IDLocalisationEgo` int(11) DEFAULT NULL,
  `IDLocalisationAlter` int(11) DEFAULT NULL,
  `Intermediaire` tinyint(1) DEFAULT NULL,
  `IDReseau` int(11) DEFAULT NULL,
  `IDActionReseau` int(11) DEFAULT NULL
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
  `TypeLienSexuel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lienSoutien`
--

CREATE TABLE IF NOT EXISTS `lienSoutien` (
  `IDRelation` int(11) NOT NULL,
  `DatePremierContact` date DEFAULT NULL,
  `IDTypeAccompagnement` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `localisation`
--

INSERT INTO `localisation` (`IDLocalisation`, `IDPays`, `IDVille`, `Adresse`, `CodePostal`) VALUES
(12, 36, 17, 'Adresse 1', 99999),
(13, 36, 19, 'Adresse 2', 88888),
(54, 36, NULL, 'Adresse Random', NULL),
(55, NULL, NULL, 'Adresse Randomx2', NULL),
(56, NULL, 21, NULL, NULL),
(57, NULL, NULL, NULL, 99999),
(58, NULL, 17, NULL, NULL),
(59, NULL, 19, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `nationalite`
--

INSERT INTO `nationalite` (`IDNationalite`, `Nationalite`) VALUES
(14, 'Nationalite 1'),
(15, 'Nationalite 2');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `IDPays` int(11) NOT NULL,
  `Pays` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`IDPays`, `Pays`) VALUES
(36, 'Pays 1'),
(37, 'Pays 2');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `IDPersonne` int(11) NOT NULL,
  `IDDossier` varchar(5) NOT NULL,
  `Sexe` enum('Homme','Femme') DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `IDVilleNaissance` int(11) DEFAULT NULL,
  `IDPaysNaissance` int(11) DEFAULT NULL,
  `IDNationalite` int(11) DEFAULT NULL,
  `IDProfessionAvantMigration` int(11) DEFAULT NULL,
  `IDProfessionDurantInterrogatoire` int(11) DEFAULT NULL,
  `DetteInitiale` int(11) DEFAULT NULL,
  `DetteRenegociee` int(11) DEFAULT NULL,
  `DateDettePayee` date DEFAULT NULL,
  `DateEstRecrute` date DEFAULT NULL,
  `DateRecrute` date DEFAULT NULL,
  `Diplome` enum('primary school','secondary school','aucun','') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`IDPersonne`, `IDDossier`, `Sexe`, `Nom`, `Prenom`, `DateNaissance`, `IDVilleNaissance`, `IDPaysNaissance`, `IDNationalite`, `IDProfessionAvantMigration`, `IDProfessionDurantInterrogatoire`, `DetteInitiale`, `DetteRenegociee`, `DateDettePayee`, `DateEstRecrute`, `DateRecrute`, `Diplome`) VALUES
(2, 'X', 'Femme', 'Cordy', 'Annie', NULL, NULL, NULL, NULL, 22, 23, 0, 0, NULL, NULL, NULL, ''),
(5, 'T', 'Homme', 'Cobain', 'Kurt', NULL, 20, 36, 14, 26, 29, 15000, 8500, '1995-01-01', NULL, '1998-02-02', 'primary school'),
(13, 'J', 'Homme', 'Marley', 'Bob', '2015-09-09', 19, 36, 14, 23, 26, 1500, 500, '2015-09-30', '2015-09-11', '2015-09-06', 'secondary school'),
(14, 'S', 'Homme', 'Goldman', 'Jean-Jacques', '1850-01-01', 20, 37, 14, 28, 25, 25, 10, '1250-01-01', '1275-01-01', '1300-01-01', 'secondary school');

-- --------------------------------------------------------

--
-- Structure de la table `personneToAlias`
--

CREATE TABLE IF NOT EXISTS `personneToAlias` (
  `IDPersonne` int(11) NOT NULL,
  `IDAlias` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personneToAlias`
--

INSERT INTO `personneToAlias` (`IDPersonne`, `IDAlias`, `IDCote`) VALUES
(2, 16, 1),
(2, 22, 1),
(2, 30, 1),
(5, 22, 2),
(5, 30, 1),
(13, 16, 1),
(13, 22, 1),
(13, 30, 2),
(14, 30, 5),
(14, 42, 5);

-- --------------------------------------------------------

--
-- Structure de la table `personneToCote`
--

CREATE TABLE IF NOT EXISTS `personneToCote` (
  `IDPersonne` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personneToCote`
--

INSERT INTO `personneToCote` (`IDPersonne`, `IDCote`) VALUES
(13, 1),
(2, 3),
(13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `personneToLangue`
--

CREATE TABLE IF NOT EXISTS `personneToLangue` (
  `IDPersonne` int(11) NOT NULL,
  `IDLangue` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personneToLangue`
--

INSERT INTO `personneToLangue` (`IDPersonne`, `IDLangue`, `IDCote`) VALUES
(2, 11, 1),
(5, 11, 5),
(5, 12, 5),
(13, 11, 2),
(13, 13, 2),
(14, 13, 2),
(14, 14, 5);

-- --------------------------------------------------------

--
-- Structure de la table `personneToLocalisation`
--

CREATE TABLE IF NOT EXISTS `personneToLocalisation` (
  `IDPersonne` int(11) NOT NULL,
  `IDLocalisation` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personneToLocalisation`
--

INSERT INTO `personneToLocalisation` (`IDPersonne`, `IDLocalisation`, `IDCote`) VALUES
(2, 12, 1),
(2, 56, 2),
(2, 57, 2),
(5, 54, 5),
(5, 55, 5),
(13, 58, 3),
(13, 59, 3);

-- --------------------------------------------------------

--
-- Structure de la table `personneToTelephone`
--

CREATE TABLE IF NOT EXISTS `personneToTelephone` (
  `IDPersonne` int(11) NOT NULL,
  `IDTelephone` int(11) NOT NULL,
  `IDCote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personneToTelephone`
--

INSERT INTO `personneToTelephone` (`IDPersonne`, `IDTelephone`, `IDCote`) VALUES
(2, 9, 2),
(13, 8, 3),
(13, 9, 5),
(14, 10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `IDProfession` int(11) NOT NULL,
  `Profession` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profession`
--

INSERT INTO `profession` (`IDProfession`, `Profession`) VALUES
(23, 'Chimiste'),
(28, 'Inquisiteur'),
(22, 'Médecin'),
(26, 'Mineur'),
(29, 'Prêtre'),
(24, 'Professeur'),
(25, 'Prospecteur'),
(27, 'Sergent');

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `IDRelation` int(11) NOT NULL,
  `IDAlter` int(11) DEFAULT NULL,
  `IDEgo` int(11) DEFAULT NULL,
  `TraceLienDossier` enum('avéré','téléphonique','déclaratif','sms','internet','visuel','autre','inconnu') DEFAULT NULL,
  `TypeLien` enum('financier','sang','sexuel','réseau','connaissance','juju','soutien','autre','inconnu') DEFAULT NULL,
  `IDContexteSocioGeographique` int(11) DEFAULT NULL
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
-- Structure de la table `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `IDTelephone` int(11) NOT NULL,
  `NumTelephone` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `telephone`
--

INSERT INTO `telephone` (`IDTelephone`, `NumTelephone`) VALUES
(8, '0512345678'),
(9, '0612345678'),
(10, '0912345678');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`IDVille`, `Ville`) VALUES
(23, 'L''union'),
(17, 'Ville 1'),
(19, 'Ville 2'),
(20, 'Ville 3'),
(21, 'Ville 4'),
(22, 'Ville 5');

--
-- Index pour les tables exportées
--

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
  ADD PRIMARY KEY (`IDPersonne`),
  ADD KEY `PaysTransit1` (`IDPaysTransit1`),
  ADD KEY `PaysTransit2` (`IDPaysTransit2`);

--
-- Index pour la table `attributsFamiliaux`
--
ALTER TABLE `attributsFamiliaux`
  ADD PRIMARY KEY (`IDPersonne`);

--
-- Index pour la table `causeDeplacement`
--
ALTER TABLE `causeDeplacement`
  ADD PRIMARY KEY (`IDCauseDeplacement`);

--
-- Index pour la table `contexteSocioGeo`
--
ALTER TABLE `contexteSocioGeo`
  ADD PRIMARY KEY (`IDContexteSocioGeo`);

--
-- Index pour la table `cote`
--
ALTER TABLE `cote`
  ADD PRIMARY KEY (`IDCote`),
  ADD UNIQUE KEY `NomCote` (`NomCote`);

--
-- Index pour la table `fonctionJuju`
--
ALTER TABLE `fonctionJuju`
  ADD PRIMARY KEY (`IDFonctionJuju`);

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
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDLocalisationEgo` (`IDLocalisationEgo`),
  ADD KEY `IDLocalisationAlter` (`IDLocalisationAlter`);

--
-- Index pour la table `lienFinancier`
--
ALTER TABLE `lienFinancier`
  ADD KEY `IDIntermediaire` (`IDIntermediaire`),
  ADD KEY `IDIntremediaire2` (`IDIntremediaire2`),
  ADD KEY `IDLocalisationEgo` (`IDLocalisationEgo`),
  ADD KEY `IDLocalisationAlter` (`IDLocalisationAlter`),
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDModalite` (`IDModalite`);

--
-- Index pour la table `lienJuju`
--
ALTER TABLE `lienJuju`
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDLocalisationCeremonie` (`IDLocalisationCeremonie`),
  ADD KEY `IDFonctionAlterJuju` (`IDFonctionAlterJuju`),
  ADD KEY `IDFonctionEgoJuju` (`IDFonctionEgoJuju`);

--
-- Index pour la table `lienReseau`
--
ALTER TABLE `lienReseau`
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDLocalisationEgo` (`IDLocalisationEgo`),
  ADD KEY `IDLocalisationAlter` (`IDLocalisationAlter`),
  ADD KEY `IDActionReseau` (`IDActionReseau`);

--
-- Index pour la table `lienSang`
--
ALTER TABLE `lienSang`
  ADD KEY `IDRelation` (`IDRelation`);

--
-- Index pour la table `lienSexuel`
--
ALTER TABLE `lienSexuel`
  ADD KEY `IDRelation` (`IDRelation`);

--
-- Index pour la table `lienSoutien`
--
ALTER TABLE `lienSoutien`
  ADD KEY `IDRelation` (`IDRelation`),
  ADD KEY `IDTypeAccompagnement` (`IDTypeAccompagnement`);

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
  ADD KEY `PersonneToAliasIDAlias` (`IDAlias`);

--
-- Index pour la table `personneToCote`
--
ALTER TABLE `personneToCote`
  ADD PRIMARY KEY (`IDPersonne`,`IDCote`),
  ADD KEY `PersonneToCoteIDCote` (`IDCote`);

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
-- Index pour la table `personneToTelephone`
--
ALTER TABLE `personneToTelephone`
  ADD PRIMARY KEY (`IDPersonne`,`IDTelephone`),
  ADD KEY `PersonneToTelephoneIDTelephone` (`IDTelephone`);

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
  ADD KEY `ContexteSocioGeographique` (`IDContexteSocioGeographique`);

--
-- Index pour la table `relationToCote`
--
ALTER TABLE `relationToCote`
  ADD PRIMARY KEY (`IDRelation`,`IDCote`),
  ADD KEY `RelationToCoteIDCote` (`IDCote`);

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
-- AUTO_INCREMENT pour la table `actionReseau`
--
ALTER TABLE `actionReseau`
  MODIFY `IDActionReseau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `alias`
--
ALTER TABLE `alias`
  MODIFY `IDAlias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `attributsFamiliaux`
--
ALTER TABLE `attributsFamiliaux`
  MODIFY `IDPersonne` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `IDCote` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `fonctionJuju`
--
ALTER TABLE `fonctionJuju`
  MODIFY `IDFonctionJuju` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `IDLangue` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `IDLocalisation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
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
  MODIFY `IDNationalite` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `IDPays` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `IDPersonne` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `IDProfession` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `relation`
--
ALTER TABLE `relation`
  MODIFY `IDRelation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `IDTelephone` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `typeSoutien`
--
ALTER TABLE `typeSoutien`
  MODIFY `IDTypeSoutien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `IDVille` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attributsAdministratifs`
--
ALTER TABLE `attributsAdministratifs`
  ADD CONSTRAINT `IDPersonneInAttributsAdmin` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PaysTransit1InAttributsAdmin` FOREIGN KEY (`IDPaysTransit1`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `PaysTransit2InAttributsAdmin` FOREIGN KEY (`IDPaysTransit2`) REFERENCES `pays` (`IDPays`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `IDModaliteToSame` FOREIGN KEY (`IDModalite`) REFERENCES `modalite` (`IDModalite`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancier` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancierIDIntermediaire1` FOREIGN KEY (`IDIntermediaire`) REFERENCES `personne` (`IDPersonne`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `LFinancierIDIntermediaire2` FOREIGN KEY (`IDIntremediaire2`) REFERENCES `personne` (`IDPersonne`) ON DELETE SET NULL ON UPDATE CASCADE,
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
  ADD CONSTRAINT `IDTypeAccompagnementToIDTypeSoutien` FOREIGN KEY (`IDTypeAccompagnement`) REFERENCES `typeSoutien` (`IDTypeSoutien`) ON DELETE SET NULL ON UPDATE CASCADE,
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
  ADD CONSTRAINT `IDNationaliteToIDNationalite` FOREIGN KEY (`IDNationalite`) REFERENCES `nationalite` (`IDNationalite`) ON DELETE SET NULL ON UPDATE CASCADE,
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
-- Contraintes pour la table `personneToTelephone`
--
ALTER TABLE `personneToTelephone`
  ADD CONSTRAINT `PersonneToTelephoneIDPersonne` FOREIGN KEY (`IDPersonne`) REFERENCES `personne` (`IDPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PersonneToTelephoneIDTelephone` FOREIGN KEY (`IDTelephone`) REFERENCES `telephone` (`IDTelephone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `IDAlterToIDPersonne` FOREIGN KEY (`IDAlter`) REFERENCES `personne` (`IDPersonne`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDContexteSocioGeoToSame` FOREIGN KEY (`IDContexteSocioGeographique`) REFERENCES `contexteSocioGeo` (`IDContexteSocioGeo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `IDEgoToIDPersonne` FOREIGN KEY (`IDEgo`) REFERENCES `personne` (`IDPersonne`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `relationToCote`
--
ALTER TABLE `relationToCote`
  ADD CONSTRAINT `RelationToCoteIDCote` FOREIGN KEY (`IDCote`) REFERENCES `cote` (`IDCote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RelationToCoteIDRelation` FOREIGN KEY (`IDRelation`) REFERENCES `relation` (`IDRelation`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
