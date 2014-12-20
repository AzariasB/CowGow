-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Client: sql107.byethost6.com
-- Généré le: Jeu 18 Décembre 2014 à 13:43
-- Version du serveur: 5.6.21-70.1
-- Version de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `b6_15629487_depinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `Activite`
--

CREATE TABLE IF NOT EXISTS `Activite` (
  `ida` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('intérieur','randonnée','Snowboard','parapente','VTT','ski') NOT NULL,
  `horaire_debut` time NOT NULL,
  `horaire_fin` time NOT NULL,
  `niveau_pratique` enum('Débutant','Confirmé','Professionel') NOT NULL,
  PRIMARY KEY (`ida`),
  UNIQUE KEY `ida` (`ida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE IF NOT EXISTS `activites` (
  `idAct` int(32) NOT NULL AUTO_INCREMENT,
  `saison` varchar(32) DEFAULT NULL,
  `nomA` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idAct`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`idAct`, `saison`, `nomA`) VALUES
(1, 'Hiver', 'Ski de piste'),
(2, 'Hiver', 'Ski Alpin'),
(3, 'Hiver', 'Ski Nordique'),
(4, 'Hiver', 'Raquettes'),
(5, 'Hiver', 'Luge'),
(6, 'Hiver', 'Hockey sur glace'),
(7, 'Hiver', 'Patin à glace'),
(8, 'Hiver', 'Motoneige'),
(9, 'Hiver', 'Héliski'),
(10, 'Hiver', 'Alpinisme'),
(11, 'Hiver', 'Tranîneaux à chiens'),
(12, 'Hiver', 'Escalade sur glace'),
(13, 'Eté', 'Randonnée pedestre'),
(14, 'Eté', 'Randonnée en VTT'),
(15, 'Eté', 'Equitation'),
(16, 'Eté', 'Parapente'),
(17, 'Eté', 'Escalade'),
(18, 'Eté', 'Rafting,kayak'),
(19, 'Eté', 'Pêche'),
(20, 'Eté', 'Via Ferrata');

-- --------------------------------------------------------

--
-- Structure de la table `activite_favorites`
--

CREATE TABLE IF NOT EXISTS `activite_favorites` (
  `pseudo` varchar(20) NOT NULL,
  `activite` varchar(30) NOT NULL,
  PRIMARY KEY (`pseudo`,`activite`),
  KEY `fk_activite` (`activite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `poste` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`pseudo`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `date_naiss` date DEFAULT NULL,
  PRIMARY KEY (`id`,`pseudo`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

CREATE TABLE IF NOT EXISTS `emplois` (
  `nomE` varchar(255) NOT NULL,
  `echelon` int(1) NOT NULL,
  PRIMARY KEY (`nomE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emplois`
--

INSERT INTO `emplois` (`nomE`, `echelon`) VALUES
('', 0),
('Industries de process', 1),
('Électricité, électronique', 2),
('Agriculturemarine, pêche', 3),
('Bâtiment, travaux publis', 3),
('Mécanique, travail des métaux', 2),
('Maintenance', 3),
('Matériaux souples, bois, industries graphiques', 2),
('Ingénieurs et cadres de l''industrie', 1),
('Transports, logistique et tourisme', 3),
('Artisanat', 3),
('Gestion, administration des entreprises', 1),
('Informatique et télécommunications', 2),
('Études et recherche', 1),
('Administration publique, professions juridiques', 2),
('Armée et police', 2),
('Banque et assurances', 1),
('Commerce', 2),
('Hôtellerie, restauration, alimentation', 3),
('Services aux particuliers et aux collectivités', 3),
('Communication, information, art et spectacle', 3),
('Santé', 1),
('Politique, religion', 2),
('Enseignement, formation', 2),
('Association culturelle et sportive', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Partenaire`
--

CREATE TABLE IF NOT EXISTS `Partenaire` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `secteur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`pseudo`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Service`
--

CREATE TABLE IF NOT EXISTS `Service` (
  `IDservice` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `nombre_place` int(11) NOT NULL,
  `lieu` varchar(20) CHARACTER SET utf8 NOT NULL,
  `note` int(1) NOT NULL,
  `photo` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`IDservice`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Service`
--

INSERT INTO `Service` (`IDservice`, `nom`, `Description`, `prix`, `nombre_place`, `lieu`, `note`, `photo`) VALUES
(0, 'Test Service', 'Essai de la table service, avec ID 0.', '0', 0, 'NulPart', 5, 'url...');

-- --------------------------------------------------------

--
-- Structure de la table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `idSta` int(32) NOT NULL AUTO_INCREMENT,
  `massif` varchar(32) NOT NULL,
  `nomS` varchar(255) NOT NULL,
  PRIMARY KEY (`idSta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=182 ;

--
-- Contenu de la table `stations`
--

INSERT INTO `stations` (`idSta`, `massif`, `nomS`) VALUES
(1, 'Alpes', '﻿L''Alpe du Grand Serre'),
(2, 'Alpes', 'L''Alpes d''Huez '),
(3, 'Alpes', 'Arêches-Beaufort'),
(4, 'Alpes', 'Les Arcs'),
(5, 'Alpes', 'L''Audibergue'),
(6, 'Alpes', 'La Moulière'),
(7, 'Alpes', 'Autron'),
(8, 'Alpes', 'Autrans'),
(9, 'Alpes', 'Avoriaz'),
(10, 'Alpes', 'Bramans'),
(11, 'Alpes', 'Les Brasses'),
(12, 'Alpes', 'Chamonix'),
(13, 'Alpes', 'Chamrousse'),
(14, 'Alpes', 'La Chèvrerie'),
(15, 'Alpes', 'La Clusaz'),
(16, 'Alpes', 'Le Collet d''Allevard'),
(17, 'Alpes', 'Col du Feu'),
(18, 'Alpes', 'Combloux'),
(19, 'Alpes', 'Les Contamines'),
(20, 'Alpes', 'Cordon'),
(21, 'Alpes', 'Crévoux'),
(22, 'Alpes', 'La Colmiane'),
(23, 'Alpes', 'Les Carroz'),
(24, 'Alpes', 'Les Deux Alpes'),
(25, 'Alpes', 'Espace Diamants'),
(26, 'Alpes', 'Flumet'),
(27, 'Alpes', 'Praz-sur-Arly'),
(28, 'Alpes', 'Les Saisies'),
(29, 'Alpes', 'Crest-Voland'),
(30, 'Alpes', 'Notre-Dame-de-Bellecombe'),
(31, 'Alpes', 'Flaine'),
(32, 'Alpes', 'Font d''Urle Chaud Clapier'),
(33, 'Alpes', 'Les Gets'),
(34, 'Alpes', 'Les Grands-Montet'),
(35, 'Alpes', 'Le Grand-Bornand'),
(36, 'Alpes', 'Greolieres-les-neiges'),
(37, 'Alpes', 'Gresse-en-Vercor'),
(38, 'Alpes', 'Habère-Poche'),
(39, 'Alpes', 'Espace Killy'),
(40, 'Alpes', 'Val-d''Isère'),
(41, 'Alpes', 'Tignes'),
(42, 'Alpes', 'Hirmentaz'),
(43, 'Alpes', 'Bellevaux'),
(44, 'Alpes', 'Isola 2000'),
(45, 'Alpes', 'Lans-en-Vercors'),
(46, 'Alpes', 'Les Karellis'),
(47, 'Alpes', 'Les Orres'),
(48, 'Alpes', 'Manigod'),
(49, 'Alpes', 'Méaudre'),
(50, 'Alpes', 'Megève'),
(51, 'Alpes', 'Montgenèvre'),
(52, 'Alpes', 'Morillon'),
(53, 'Alpes', 'Morzine'),
(54, 'Alpes', 'La Norma'),
(55, 'Alpes', 'Orcières-Merlette'),
(56, 'Alpes', 'La Plagne'),
(57, 'Alpes', 'Les Portes du Soleil'),
(58, 'Alpes', 'Praz de Lys'),
(59, 'Alpes', 'Sommand'),
(60, 'Alpes', 'Pra Loup'),
(61, 'Alpes', 'Pralognan-la-Vanoise'),
(62, 'Alpes', 'Réallon'),
(63, 'Alpes', 'Rencurel'),
(64, 'Alpes', 'Risoul 1850'),
(65, 'Alpes', 'La Rosière'),
(66, 'Alpes', 'Roubion'),
(67, 'Alpes', 'La Ruchère en Chartreuse'),
(68, 'Alpes', 'La Sambuy-Seythenex'),
(69, 'Alpes', 'Samoëns'),
(70, 'Alpes', 'Le Sauze'),
(71, 'Alpes', 'Les 7 laux'),
(72, 'Alpes', 'Saint Hilaire du Touvet'),
(73, 'Alpes', 'Saint Pierre de Chartreuse'),
(74, 'Alpes', 'Saint Anne-la-Condamine'),
(75, 'Alpes', 'Sainte-Foy-Tarentaise'),
(76, 'Alpes', 'St Jean d''Aulps'),
(77, 'Alpes', 'Serre Chevalier'),
(78, 'Alpes', 'La Semnoz'),
(79, 'Alpes', 'Sixt-Fer-à-Cheval'),
(80, 'Alpes', 'Sommand'),
(81, 'Alpes', 'Super-Châtel'),
(82, 'Alpes', 'Super Dévoluy'),
(83, 'Alpes', 'Super-Saxel'),
(84, 'Alpes', 'Les Sybelles'),
(85, 'Alpes', 'La Toussuire'),
(86, 'Alpes', 'Le Corbier'),
(87, 'Alpes', 'Saint Jean d''Avres'),
(88, 'Alpes', 'Saint-Sorlin d''Avres'),
(89, 'Alpes', 'Saint-Colomban-des-Villards'),
(90, 'Alpes', 'Les Bottières'),
(91, 'Alpes', 'Les Trois Vallées'),
(92, 'Alpes', 'Courchevel'),
(93, 'Alpes', 'Méribel'),
(94, 'Alpes', 'La Tania'),
(95, 'Alpes', 'Brides-les-Bains'),
(96, 'Alpes', 'Saint-Martin-de-Belleville'),
(97, 'Alpes', 'les Menuires'),
(98, 'Alpes', 'Val Thorens'),
(99, 'Alpes', 'Valberg'),
(100, 'Alpes', 'Val Cenis'),
(101, 'Alpes', 'Valfréjus'),
(102, 'Alpes', 'Valloire'),
(103, 'Alpes', 'Valmeinier'),
(104, 'Alpes', 'Valmorel'),
(105, 'Alpes', 'Vars'),
(106, 'Alpes', 'Vaujany'),
(107, 'Alpes', 'Villard-de-Lans'),
(108, 'Pyrénées', 'Arette'),
(109, 'Pyrénées', 'Artouste'),
(110, 'Pyrénées', 'Ax 3 Domaines'),
(111, 'Pyrénées', 'Barèges'),
(112, 'Pyrénées', 'Bourg-d''Oeuil'),
(113, 'Pyrénées', 'Cauterets'),
(114, 'Pyrénées', 'Font-Romeu'),
(115, 'Pyrénées', 'Formiguères'),
(116, 'Pyrénées', 'Gourette'),
(117, 'Pyrénées', 'Guzet-neige'),
(118, 'Pyrénées', 'Hautacam'),
(119, 'Pyrénées', 'La Mongie'),
(120, 'Pyrénées', 'La Pierre Saint-Martin'),
(121, 'Pyrénées', 'Le Mourtis'),
(122, 'Pyrénées', 'Les Angles'),
(123, 'Pyrénées', 'Le Somport'),
(124, 'Pyrénées', 'Luchon-Superbagnères'),
(125, 'Pyrénées', 'Luz-Ardiden'),
(126, 'Pyrénées', 'Nistos cap nestes'),
(127, 'Pyrénées', 'Peyragudes'),
(128, 'Pyrénées', 'Piau-Engaly'),
(129, 'Pyrénées', 'Porté-Puymorens'),
(130, 'Pyrénées', 'Puyvalador'),
(131, 'Pyrénées', 'Puigmal'),
(132, 'Pyrénées', 'Saint-Lary'),
(133, 'Pyrénées', 'Superbagnères'),
(134, 'Pyrénées', 'Val-Louron'),
(135, 'Massif central', 'Le Lioran'),
(136, 'Massif central', 'Super-Besse'),
(137, 'Massif central', 'Mont-Dore'),
(138, 'Massif central', 'Chastreix-Sancy'),
(139, 'Massif central', 'Chalmazel'),
(140, 'Massif central', 'Prat Peyrot'),
(141, 'Massif central', 'Brameloup'),
(142, 'Massif central', 'Laguiole'),
(143, 'Massif central', 'St urcize'),
(144, 'Jura', 'Les Fourgs'),
(145, 'Jura', 'Métabief Mont d''Or'),
(146, 'Jura', 'Rochejean'),
(147, 'Jura', 'Mijoux Lélex'),
(148, 'Jura', 'Crozet'),
(149, 'Jura', 'La Vattay'),
(150, 'Jura', 'La Faucille'),
(151, 'Jura', 'Menthères'),
(152, 'Jura', 'Les Rousses'),
(153, 'Jura', 'La Dôle (Suisse)'),
(154, 'Jura', 'Bois-d''Amont'),
(155, 'Jura', 'Lamoura'),
(156, 'Jura', 'Prémanon'),
(157, 'Vosges', 'Ballon d''Alsace'),
(158, 'Vosges', 'Champ du Feu'),
(159, 'Vosges', 'Col de la Schlucht'),
(160, 'Vosges', 'Cornimont'),
(161, 'Vosges', 'La Bresse'),
(162, 'Vosges', 'Lac Blanc/Le Bonhomme'),
(163, 'Vosges', 'Le Frenz'),
(164, 'Vosges', 'Saint-Amarin'),
(165, 'Vosges', 'Le Gaschney'),
(166, 'Vosges', 'Le Haut du Tôt'),
(167, 'Vosges', 'Le Schnepfenried'),
(168, 'Vosges', 'Le Tanet'),
(169, 'Vosges', 'Le Valtin'),
(170, 'Vosges', 'Les Trois-Fours'),
(171, 'Vosges', 'Gérardmer-Ski'),
(172, 'Vosges', 'Girmont'),
(173, 'Vosges', 'Val d''Ajol '),
(174, 'Vosges', 'Markstein'),
(175, 'Vosges', 'Saint-Maurice-sur-Moselle'),
(176, 'Vosges', 'Ventron Frère Joseph'),
(177, 'Vosges', 'Xonrupt-Longemer'),
(178, 'Corse', 'Ghisoni-Capanelle'),
(179, 'Corse', 'Val d''Ese'),
(180, 'Corse', 'Vergio'),
(181, 'Corse', 'Haut-Asco');

-- --------------------------------------------------------

--
-- Structure de la table `stations_favorites`
--

CREATE TABLE IF NOT EXISTS `stations_favorites` (
  `pseudo` varchar(20) NOT NULL,
  `id_station` int(20) unsigned NOT NULL,
  PRIMARY KEY (`pseudo`,`id_station`),
  KEY `fk_station` (`id_station`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Transport`
--

CREATE TABLE IF NOT EXISTS `Transport` (
  `idt` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('TGV','Covoiturage','Avion','Voyage') DEFAULT NULL,
  `provenance` char(20) NOT NULL,
  `destination` char(20) NOT NULL,
  `date_depart` date NOT NULL,
  `date_retour` date NOT NULL,
  PRIMARY KEY (`idt`),
  UNIQUE KEY `idt` (`idt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idusr` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `e-mail` varchar(32) NOT NULL,
  `avatar` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `pays` char(20) NOT NULL,
  `ville` char(20) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `type_usr` enum('admin','pro','simple') NOT NULL,
  PRIMARY KEY (`idusr`,`pseudo`),
  UNIQUE KEY `idusr` (`idusr`),
  UNIQUE KEY `mail` (`telephone`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Table mére des Clients,Admin et Partenaire' AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idusr`, `pseudo`, `mdp`, `e-mail`, `avatar`, `nom`, `prenom`, `telephone`, `adresse`, `pays`, `ville`, `code_postal`, `type_usr`) VALUES
(1, 'nigga', 'f7ae16771ad3db5fe1cb25ab2578e62d', 'lezgegnoir@bite.noir', 'taméreawoilp', 'Noir', 'Gros', '0658432096', '159 Cours ta mére', 'Franche', 'Negroland', 38000, 'admin'),
(2, 'miskinos', 'f7ae16771ad3db5fe1cb25ab2578e62d', 'lezgegnoir@bite.miskin', 'taméreawoilp', 'Noir', 'Gros', '0058432096', '159 Cours ta mére', 'Franche', 'Negroland', 38000, 'admin'),
(3, 'miskinas', 'f7ae16771ad3db5fe1cb25ab2578e62d', 'lezgegnoir@bite.miskin', 'taméreawoilp', 'Noir', 'Gros', '0a58432096', '159 Cours ta mére', 'Franche', 'Negroland', 38000, 'admin'),
(5, 'miskinps', 'f7ae16771ad3db5fe1cb25ab2578e62d', 'lezgegnoi@r.bitemiskino', 'taméreawoilp', 'Noir', 'Gros', '0b58432096', '159 Cours ta mére', 'Franche', 'Negroland', 38000, 'admin'),
(6, 'miskines', 'f7ae16771ad3db5fe1cb25ab2578e62d', 'lezgegnoi@rbitemiskino', 'taméreawoilp', 'Noir', 'Gros', '0c58432096', '159 Cours ta mére', 'Franche', 'Negroland', 38000, 'admin'),
(7, 'pidupierre', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', 'homme1.jpg', 'Pierre', 'Dupont', '0658978563', 'La rue sans u', 'France', 'Paris', 75000, 'simple');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
