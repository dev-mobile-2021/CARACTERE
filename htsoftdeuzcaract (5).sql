-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 fév. 2022 à 18:27
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `htsoftdeuzcaract`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `idAgence` int(11) NOT NULL,
  `agence` varchar(250) DEFAULT NULL,
  `siege` text DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL,
  `ninea` varchar(30) DEFAULT NULL,
  `rc` varchar(30) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `devisPiedconcl` text DEFAULT NULL,
  `devisPiednta` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idAgence`, `agence`, `siege`, `tel`, `fax`, `email`, `site`, `ninea`, `rc`, `logo`, `devisPiedconcl`, `devisPiednta`, `dateAjout`, `etat`) VALUES
(1, 'CARACTERE SARL', 'Dakar', '+221 33 860 00 00', '+221 33 860 00 01', 'contact@caractere.com', 'www.caractere.com', NULL, NULL, './images/logo.png', NULL, NULL, '2019-02-09 05:21:39', 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `prenomClient` varchar(80) DEFAULT NULL,
  `nomClient` varchar(80) DEFAULT NULL,
  `adresseClient` text DEFAULT NULL,
  `paysClient` varchar(80) DEFAULT NULL,
  `telephoneClient` varchar(80) DEFAULT NULL,
  `emailClient` varchar(80) DEFAULT NULL,
  `photoClient` text DEFAULT NULL,
  `dateAjout` timestamp NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `reference`, `prenomClient`, `nomClient`, `adresseClient`, `paysClient`, `telephoneClient`, `emailClient`, `photoClient`, `dateAjout`, `etat`) VALUES
(160, '4111ADEMAS', '', 'ADEMAS', 'caractere', 'senegal', '77 700 00 01', 'caractere@gmail.com', '', '2022-01-04 13:38:11', 1),
(161, '4111ADIE', '', 'ADIE', 'caractere', 'senegal', '78 700 00 02', 'caractere@gmail.com', '', '2022-01-28 22:43:13', 1),
(162, '4111AGROLINE', NULL, 'AGROLINE', 'caractere', 'senegal', '79 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(163, '4111AIGLEAZUR', NULL, 'AIGLE AZUR', 'caractere', 'senegal', '80 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(164, '4111ALCATEL', NULL, 'ALCATEL', 'caractere', 'senegal', '81 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(165, '4111ALIZES', NULL, 'ALIZES NETTOYAGE', 'caractere', 'senegal', '82 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(166, '4111AMBASSADEDEFR', NULL, 'AMBASSADE DE FRANCE', 'caractere', 'senegal', '83 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(167, '4111ARCHIPEL', NULL, 'ARCHIPEL & CO', 'caractere', 'senegal', '84 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(168, '4111AUCHAN', NULL, 'AUCHAN SENEGAL', 'caractere', 'senegal', '85 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(169, '4111BANKOFAFRICA', NULL, 'BANK OF AFRICA', 'caractere', 'senegal', '86 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(170, '4111BIC', NULL, 'BIC', 'caractere', 'senegal', '87 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(171, '4111BICIS', NULL, 'BICIS', 'caractere', 'senegal', '88 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(172, '4111BNDE', NULL, 'BNDE', 'caractere', 'senegal', '89 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(173, '4111BUILDSMART', NULL, 'BUILD SMARTBUILD', 'caractere', 'senegal', '90 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(174, '4111CABLERIES', NULL, 'CABLERIES DU SENEGAL', 'caractere', 'senegal', '91 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(175, '4111CASINO', NULL, 'CASINO', 'caractere', 'senegal', '92 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(176, '4111CLM', NULL, 'CLM_CELLULE DE LUTTE CONTRE LA MALN', 'caractere', 'senegal', '93 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(177, '4111COFINA', NULL, 'COFINA', 'caractere', 'senegal', '94 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(178, '4111COMITE', NULL, 'COMITE INTERNATIONAL OLYMPIQUE', 'caractere', 'senegal', '95 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(179, '4111CUMMINS', NULL, 'CUMMINS AFRIQUE DE L\'OUEST', 'caractere', 'senegal', '96 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(180, '4111DECATHLON', NULL, 'DECATHLON', 'caractere', 'senegal', '97 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(181, '4111DIAGONAL', NULL, 'DIAGONAL_CITYDIA', 'caractere', 'senegal', '98 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(182, '4111DIVERS', NULL, 'CLIENTS DIVERS', 'caractere', 'senegal', '99 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(183, '4111EIFFAGE', NULL, 'EIFFAGE SENEGAL ', 'caractere', 'senegal', '100 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(184, '4111ELTORO', NULL, 'EL TORO', 'caractere', 'senegal', '101 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(185, '4111FREEFREE', NULL, 'FREE_SAGA AFRICA HOLDINGS', 'caractere', 'senegal', '102 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(186, '4111GRANTTHORNTON', NULL, 'GRANT THORNTON', 'caractere', 'senegal', '103 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(187, '4111GRASSAVOYE', NULL, 'GRAS SAVOYE_CIES', 'caractere', 'senegal', '104 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(188, '4111ICARE', NULL, 'ICARE SA', 'caractere', 'senegal', '105 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(189, '4111INASEN', NULL, 'INASEN', 'caractere', 'senegal', '106 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(190, '4111IOM', NULL, 'INTERNATIONAL ORGANIZATION OF MIGRA', 'caractere', 'senegal', '107 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:20', 0),
(191, '4111JUMBO', NULL, 'JUMBO_GB FOODS SENEGAL SA', 'caractere', 'senegal', '108 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(192, '4111JUMIA', NULL, 'JUMIA ', 'caractere', 'senegal', '109 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(193, '4111JUVASANTE', NULL, 'JUVASANTE INTERNATIONAL', 'caractere', 'senegal', '110 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(194, '4111KINGS', NULL, 'PH 2 O SARL KING\'S CLUB', 'caractere', 'senegal', '111 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(195, '4111KMOB', NULL, 'KIRENE-MOBILE', 'caractere', 'senegal', '112 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(196, '4111LABOREX', NULL, 'LABOREX SENEGAL', 'caractere', 'senegal', '113 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(197, '4111LACTALIS', NULL, 'LACTALIS', 'caractere', 'senegal', '114 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(198, '4111LAFOURCHETTE', NULL, 'LA FOURCHETTE', 'caractere', 'senegal', '115 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(199, '4111LASA', NULL, 'LA SENEGALAISE DE L\'AUTOMOBILE', 'caractere', 'senegal', '116 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(200, '4111LCS', NULL, 'LES CABLERIES DU SENEGAL', 'caractere', 'senegal', '117 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(201, '4111LUBSUPPL', NULL, 'LUB & SUPPLY_CIES', 'caractere', 'senegal', '118 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(202, '4111MEROUEH', NULL, 'Ets Meroueh et Cie', 'caractere', 'senegal', '119 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(203, '4111MIDDLE', NULL, 'ORANGE MIDDLE EAST AND AFRICA', 'caractere', 'senegal', '120 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(204, '4111NUTRALINE', NULL, 'NUTRALINE', 'caractere', 'senegal', '121 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(205, '4111OLEOSEN', NULL, 'OLEOSEN', 'caractere', 'senegal', '122 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(206, '4111OO2SENEGAL', NULL, 'OO2SENEGAL SARL CIES', 'caractere', 'senegal', '123 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(207, '4111ORABANK', NULL, 'ORABANK SENEGAL', 'caractere', 'senegal', '124 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(208, '4111ORANGECAMEROU', NULL, 'ORANGE CAMEROUN', 'caractere', 'senegal', '125 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(209, '4111ORANGECONAKRY', NULL, 'CONAKRY', 'caractere', 'senegal', '126 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(210, '4111ORANGECOTEDIV', NULL, 'ORANGE COTE D\'IVOIRE', 'caractere', 'senegal', '127 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(211, '4111ORANGENIGER', NULL, 'ORANGE NIGER', 'caractere', 'senegal', '128 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(212, '4111PNL', NULL, 'PNL_PEOPLE NO LIMIT SARL', 'caractere', 'senegal', '129 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(213, '4111RENOVINDUSTRI', NULL, 'RENOV INDUSTRIES_CIES', 'caractere', 'senegal', '130 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(214, '4111RIA', NULL, 'RIA', 'caractere', 'senegal', '131 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(215, '4111SAMSUNG', NULL, 'CHEIL SOUTH AFRICA ( SAMSUNG)', 'caractere', 'senegal', '132 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(216, '4111SENEAU', NULL, 'SEN\'EAU_EAU DU SENEGAL', 'caractere', 'senegal', '133 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(217, '4111SERTEM', NULL, 'SERTEM', 'caractere', 'senegal', '134 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(218, '4111SGBS', NULL, 'SGBS_SOCIETE GENERALE DE BANQUE AU ', 'caractere', 'senegal', '135 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(219, '4111SIAGROKIRENE', NULL, 'SIAGRO_KIRENE', 'caractere', 'senegal', '136 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(220, '4111SIMPA', NULL, 'SIMPA', 'caractere', 'senegal', '137 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(221, '4111SIPRES', NULL, 'SIPRES', 'caractere', 'senegal', '138 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(222, '4111SOCAS', NULL, 'SOCAS', 'caractere', 'senegal', '139 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(223, '4111SOCIDA', NULL, 'SOCIETE COMMERCIALE INDUS.DAKAROISE', 'caractere', 'senegal', '140 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(224, '4111SOFIEX', NULL, 'SOFIEX', 'caractere', 'senegal', '141 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(225, '4111SONATEL', NULL, 'SONATEL_ORANGE', 'caractere', 'senegal', '142 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(226, '4111SUEZ', NULL, 'SUEZ GROUPE', 'caractere', 'senegal', '143 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(227, '4111SUNSHINELTD', NULL, 'SUNSHINE LTD / GROUPE TOPAZ', 'caractere', 'senegal', '144 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(228, '4111SUNU', NULL, 'SUNU ASSURANCE', 'caractere', 'senegal', '145 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(229, '4111TEYLIOM', NULL, 'TEYLIOM PROPERTISES', 'caractere', 'senegal', '146 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(230, '4111TOTAL', NULL, 'TOTAL SENEGAL', 'caractere', 'senegal', '147 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(231, '4111TOTALMARKETIN', NULL, 'TOTAL MARKETING SERVICES', 'caractere', 'senegal', '148 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(232, '4111TOTALOUTREMER', NULL, 'TOTAL OUTRE MER', 'caractere', 'senegal', '149 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(233, '4111TRANPAPS', NULL, 'TRANPAPS', 'caractere', 'senegal', '150 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(234, '4111WILLISTOWERS', NULL, 'WILLIS TOWERS  WATSON ', 'caractere', 'senegal', '151 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(235, '4111WOODSIDE', NULL, 'WOODSIDE ENERGY SENEGAL', 'caractere', 'senegal', '152 700 00 00', 'caractere@gmail.com', NULL, '2021-12-21 16:00:21', 0),
(236, '', '', 'REZILUX', 'SENEGAL, DAKAR, YOFF VIRAGE', 'rrrerrr', '774161615', 'infos@rezilux.com', 'dist/img/clients/AVATAR.jfif', '2022-01-28 23:19:25', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `telephone` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nom`, `prenom`, `telephone`, `email`, `idClient`, `idUser`, `dateAjout`, `etat`) VALUES
(1, 'Seye', 'Awa Cheikh ', '76 637 32 86', 'seyeawacheikh@yahoo.fr', 160, 1, '2022-01-05 09:01:02', 1),
(2, 'Sine', 'Assane', '77 229 69 91', 'assane.sine@adie.sn', 161, 1, '2022-01-06 09:01:02', 1),
(3, 'Attieh ', 'Samy', '77 748 59 67', 'samy.attieh@agroline.sn', 162, 1, '2022-01-07 09:01:02', 1),
(7, 'Hemeryck ', 'Fanta Bouba', '77 359 72 20', 'fanta-bouba.hemeryck@ambafrance-sn.org', 166, 1, '2022-01-11 09:01:02', 1),
(8, 'Vander Heyden', 'Téo', '(0) 6 23 37 50 76', 'teo.vanderheyden@archipel-co.com', 167, 1, '2022-01-12 09:01:02', 1),
(13, 'Diagne', 'Fatimatou Bintou', '33 829 20 50', 'fatimatou.diagne@bnde.sn', 172, 1, '2022-01-17 09:01:02', 1),
(14, 'Saheli', 'Amar Esther', '33 834 05  84', 'amar.saheli@bsmart.sn', 173, 1, '2022-01-18 09:01:02', 1),
(15, 'Barth', 'Jérôme', '33 879 19 90', 'jbarth@lcs.sn', 174, 1, '2022-01-19 09:01:02', 1),
(16, 'Matern', 'Jean Marc', '78 589 14 49', 'jm.matern@mim.mc', 175, 1, '2022-01-20 09:01:02', 1),
(24, 'Fall', 'Yacine', '77 737 19 47', 'Yacine.FALL@eiffage.com', 183, 1, '2022-01-28 09:01:02', 1),
(26, 'Diallo', 'Lamine', '76 675 30 60', 'ldiallo@free.sn', 185, 1, '2022-01-30 09:01:02', 1),
(29, 'Saheli', 'Amar Esther', '33 834 05 84', 'amar.saheli@bsmart.sn', 188, 1, '2022-02-02 09:01:02', 1),
(32, 'Gueye ', 'Seynabou Mar', '77 573 19 09', 'sgueye@thegbfoods.com', 191, 1, '2022-02-05 09:01:02', 1),
(33, 'Hane', 'Ernesto', '77 539 78 62', 'ernesto.hane@jumia.com', 192, 1, '2022-02-06 09:01:02', 1),
(34, 'Aurio', 'Sophie', '33156624000', 's.auriau@fr.urgo.com', 193, 1, '2022-02-07 09:01:02', 1),
(36, 'Julienne', 'Linda', '77 906 69 69', 'dircom.mkg@kireneavecorange.sn', 195, 1, '2022-02-09 09:01:02', 1),
(45, 'Attie', 'Nagib', '77 638 12 53', 'nagib.attie@nutraline.sn', 204, 1, '2022-02-18 09:01:02', 1),
(46, 'Diop', 'Cheikh Ahmadou', '76 750 17 29', 'cheikh.diop@copeol.com', 205, 1, '2022-02-19 09:01:02', 1),
(53, 'Lopes', 'Inna', '77 332 50 69', 'inna@peoplenolimit.com', 212, 1, '2022-02-26 09:01:02', 1),
(55, 'Fall', 'Nafissatou', '77 718 18 04', 'nfall@riafinancial.com', 214, 1, '2022-02-28 09:01:02', 1),
(57, 'Likibi', 'Lydia', '77 470 68 00', 'lydia.likibi@seneau.sn', 216, 1, '2022-03-02 09:01:02', 1),
(60, 'Kaddoura', 'Nadia', '78 200 35 35', 'nkaddoura@kirene.sn', 219, 1, '2022-03-05 09:01:02', 1),
(62, 'Lo', 'Ndeye Alioune', '77 406 38 57', 'ndeye.lo@sipres.sn', 221, 1, '2022-03-07 09:01:02', 1),
(67, 'Mestre', 'Flabia', '700 00 00', 'flabia.mestre@suez.com', 226, 1, '2022-03-12 09:01:02', 1),
(70, 'Konté', 'Diama', '76 529 12 32', 'diama.konte@teyliom.com', 229, 1, '2022-03-15 09:01:02', 1),
(71, 'Dembelé', 'Maimouna', '78 755 94 92', 'maimouna.dembele@totalenergies.sn ', 230, 1, '2022-03-16 09:01:02', 1),
(76, 'Diagne', 'Aissatou', '76 600 13 64', 'aissatou.diagne@woodside.com.au', 235, 1, '2022-03-21 09:01:02', 1);

-- --------------------------------------------------------

--
-- Structure de la table `detailsdevis`
--

CREATE TABLE `detailsdevis` (
  `idDetailsdevis` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idRubrique` int(11) NOT NULL,
  `idFamille` int(11) NOT NULL,
  `idTypeservice` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `prixAchat` varchar(80) DEFAULT '0',
  `prixVente` varchar(80) DEFAULT '0',
  `quantite` varchar(80) DEFAULT '0',
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detailstypeservice`
--

CREATE TABLE `detailstypeservice` (
  `id` int(11) NOT NULL,
  `idRubrique` int(11) NOT NULL,
  `idFamille` int(11) NOT NULL,
  `idTypeservice` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `hasComment` int(11) NOT NULL,
  `commentaire` mediumtext NOT NULL,
  `hasPrice` int(11) NOT NULL,
  `prixAchat` varchar(80) NOT NULL,
  `prixVente` varchar(80) NOT NULL,
  `quantite` varchar(80) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `idDevis` int(11) NOT NULL,
  `numeroDevis` varchar(80) NOT NULL,
  `contact` text NOT NULL,
  `objet` text NOT NULL,
  `campagne` text NOT NULL,
  `commissionProduction` varchar(80) NOT NULL,
  `taxeMunicipale` varchar(80) NOT NULL,
  `hasRemise` int(11) NOT NULL,
  `typeRemise` varchar(80) NOT NULL,
  `valeurRemise` varchar(80) NOT NULL,
  `conditionPaiement` varchar(300) NOT NULL,
  `commentaire` text NOT NULL,
  `idResponsable` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idTypetaxe` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `idTypedevis` int(11) NOT NULL,
  `idEtat` int(11) NOT NULL,
  `idValideur` int(11) NOT NULL,
  `idFournisseur` int(11) DEFAULT NULL,
  `nomFournisseur` varchar(80) NOT NULL,
  `prenomFournisseur` varchar(80) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devisannule`
--

CREATE TABLE `devisannule` (
  `idDevisannule` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `motif` text NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devisbc`
--

CREATE TABLE `devisbc` (
  `idDevisbc` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `numBc` varchar(80) NOT NULL,
  `dateBc` varchar(80) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deviscommente`
--

CREATE TABLE `deviscommente` (
  `idDeviscommente` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idDestinataire` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devislivre`
--

CREATE TABLE `devislivre` (
  `idDevislivre` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devisvalideclient`
--

CREATE TABLE `devisvalideclient` (
  `idDevisvalideclient` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nomValideur` varchar(80) NOT NULL,
  `dateValidation` varchar(80) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devisvalideresponsable`
--

CREATE TABLE `devisvalideresponsable` (
  `idDevisvalideresponsable` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `idDroit` int(11) NOT NULL,
  `libelle` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`idDroit`, `libelle`) VALUES
(1, 'Valider avec la priorité 1'),
(2, 'Valider avec la priorité 2'),
(3, 'Valider avec la priorité 3'),
(4, 'Demander correction'),
(5, 'Annuler '),
(6, 'Faire la validation client'),
(7, 'Saisir le numéro du bon de commande'),
(8, 'Livrer');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `idEtat` int(11) NOT NULL,
  `libelle` varchar(80) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`idEtat`, `libelle`, `dateAjout`) VALUES
(1, 'Devis a valider', '2019-02-09 06:40:49'),
(2, 'Devis valide', '2019-02-09 06:40:49'),
(3, 'Devis valide par le client', '2019-02-09 06:40:49'),
(4, 'Bon de commande recu', '2019-02-09 06:40:49'),
(5, 'Devis livre', '2019-02-09 06:40:49'),
(6, 'Facture a valider', '2019-02-09 06:42:21'),
(7, 'Facture validee', '2019-04-19 13:47:01'),
(8, 'Devis annule', '2019-04-19 13:47:01'),
(9, 'Devis a corriger', '2019-04-19 13:48:59'),
(10, 'Bon de commande a valider - ', '2019-04-19 13:48:59'),
(11, 'Devis en attente de validation par le client', '2019-04-19 13:48:59'),
(12, 'Devis en attente de BC', '2019-04-19 13:48:59'),
(13, 'Devis livre avec BC', '2019-04-19 13:48:59'),
(14, 'Devis livre en attente de BC', '2019-04-19 13:49:35'),
(15, 'Devis commente', '2019-04-20 16:20:48');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idFacture` int(11) NOT NULL,
  `numeroFacture` varchar(80) NOT NULL,
  `destinataire` text NOT NULL,
  `dateFacture` varchar(80) NOT NULL,
  `accompte` varchar(80) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idResponsable` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `numeroFacture`, `destinataire`, `dateFacture`, `accompte`, `idDevis`, `idResponsable`, `dateAjout`, `etat`) VALUES
(1, '2021 / 12 / 001', 'RRR', '16/12/2021', '6000', 3, 6, '2021-12-16 15:21:03', 1),
(2, '2021 / 12 / 002', 'RGTRHT', '16/12/2021', '1800', 4, 6, '2021-12-16 15:25:25', 1),
(3, '2021 / 12 / 003', 'GERG', '16/12/2021', '300000', 5, 6, '2021-12-16 15:30:40', 1),
(4, '2021 / 12 / 004', 'ert', '17/12/2021', '9000', 6, 6, '2021-12-17 13:12:39', 1),
(5, '2021 / 12 / 005', 'BJI', '17/12/2021', '600', 7, 6, '2021-12-17 13:19:03', 1),
(6, '2021 / 12 / 006', 'ED', '17/12/2021', '15000', 9, 6, '2021-12-17 13:25:20', 1),
(7, '2021 / 12 / 007', 'RG', '17/12/2021', '20000', 10, 6, '2021-12-17 13:33:48', 1),
(8, '2021 / 12 / 008', 'FYU', '17/12/2021', '50', 11, 6, '2021-12-17 13:46:53', 1);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `idFamille` int(11) NOT NULL,
  `famille` text NOT NULL,
  `description` text NOT NULL,
  `idRubrique` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`idFamille`, `famille`, `description`, `idRubrique`, `dateAjout`, `etat`) VALUES
(33, 'Réflexion stratégique et créative', 'à metre à jour', 4, '0000-00-00 00:00:00', 1),
(34, 'Réflexion créative', 'à metre à jour', 4, '0000-00-00 00:00:00', 1),
(35, 'Recommandation stratégique Online', 'à metre à jour', 4, '0000-00-00 00:00:00', 1),
(36, 'Recommandation stratégique Offline', 'à metre à jour', 4, '0000-00-00 00:00:00', 1),
(37, 'Conception, création charte graphique', 'à metre à jour', 4, '0000-00-00 00:00:00', 1),
(38, 'Production TV', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(39, 'Production Spot radio', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(40, 'Prise de vue', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(41, 'Achat d\'art', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(42, 'Production Animatique', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(43, 'Production Billboard TV', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(44, 'Production Pop up TV', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(45, 'Production musique', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(46, 'Production contenus digitaux', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(47, 'Impression', 'à metre à jour', 1, '0000-00-00 00:00:00', 1),
(48, 'Objectifs', 'à metre à jour', 3, '0000-00-00 00:00:00', 1),
(49, 'Régie publicitaire', 'à metre à jour', 3, '0000-00-00 00:00:00', 1),
(50, 'Onsite Ad', 'à metre à jour', 3, '0000-00-00 00:00:00', 1),
(51, 'Mise en relation avec les DSP/ Programmatique', 'à metre à jour', 3, '0000-00-00 00:00:00', 1),
(52, 'Mode d\'achat', 'à metre à jour', 3, '0000-00-00 00:00:00', 1),
(53, 'Achat d\'espace TV', 'à metre à jour', 2, '0000-00-00 00:00:00', 1),
(54, 'Achat d\'espace radio', 'à metre à jour', 2, '0000-00-00 00:00:00', 1),
(55, 'PRESSE MAGAZINE', 'à metre à jour', 2, '0000-00-00 00:00:00', 1),
(56, 'OOH', 'à metre à jour', 2, '0000-00-00 00:00:00', 1),
(57, 'divers', 'à metre à jour', 5, '0000-00-00 00:00:00', 1),
(58, 'choix', 'choix', 5, '2022-02-04 16:28:23', 1),
(59, 'WQA', 'XSZ', 4, '2022-02-08 10:45:58', 1),
(60, 'WQASZ', 'AQWRE', 4, '2022-02-08 12:09:07', 1),
(61, 'VV', 'VV', 2, '2022-02-08 15:47:02', 1),
(62, 'VF', 'VF', 22, '2022-02-08 15:53:26', 1),
(63, 'CC', 'CC', 22, '2022-02-08 15:53:54', 1),
(64, 'SERVICE', 'SERVICE', 2, '2022-02-08 16:06:57', 1),
(65, 'RTRYY', 'YYIYI7I', 2, '2022-02-10 15:54:34', 1),
(66, 'RTRYYDF', 'YYIYI7ID', 2, '2022-02-10 15:55:29', 1),
(67, 'RARE', 'RARE', 22, '2022-02-10 16:00:52', 1),
(68, 'vert', 'vert', 22, '2022-02-10 16:01:35', 1),
(69, 'rouge', 'rouge', 22, '2022-02-10 16:02:32', 1),
(70, 'gris', 'gris', 30, '2022-02-10 16:04:05', 1),
(71, 'jaune', 'jaune', 30, '2022-02-10 16:05:16', 1),
(72, 'bleu', 'bleu', 14, '2022-02-10 16:06:34', 1),
(73, 'bleuuu', 'bleuuu', 2, '2022-02-10 16:07:34', 1),
(74, 'RADIO', 'RADIO', 1, '2022-02-10 16:15:23', 1),
(75, 'ert', 'ERT', 1, '2022-02-10 16:17:24', 1),
(76, 'ppt', 'PPT', 1, '2022-02-10 16:19:21', 1),
(77, 'toi', 'toi', 45, '2022-02-10 16:24:14', 1),
(78, 'GAZ', 'GAZ', 43, '2022-02-10 16:25:43', 1),
(79, 'ORANGE', 'ORANGE', 14, '2022-02-10 16:27:03', 1),
(80, 'telephone', 'telephone', 22, '2022-02-10 16:34:15', 1),
(81, 'bebe', 'bebe', 114, '2022-02-11 15:43:31', 1),
(82, 'lex', 'lex', 5, '2022-02-11 16:06:25', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `idFournisseur` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `prenomFournisseur` varchar(80) DEFAULT NULL,
  `nomFournisseur` varchar(80) DEFAULT NULL,
  `adresseFournisseur` text DEFAULT NULL,
  `paysFournisseur` varchar(80) DEFAULT NULL,
  `telephoneFournisseur` varchar(80) DEFAULT NULL,
  `emailFournisseur` varchar(80) DEFAULT NULL,
  `photoFournisseur` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `reference`, `prenomFournisseur`, `nomFournisseur`, `adresseFournisseur`, `paysFournisseur`, `telephoneFournisseur`, `emailFournisseur`, `photoFournisseur`, `dateAjout`, `etat`) VALUES
(1150, '4011ABDOU', '', 'ABDOU FATTAH FARIS', 'caractere', 'SENEGAL', '77 700 00 22 ', 'caractere@gmail.com', '', '2022-01-28 23:47:44', 1),
(1152, '4011ABDOUKARIM', '', 'ABDOU KARIM NDOYE', 'caractere', 'senegal', '79 700 24 00', 'caractere@gmail.com', '', '2022-01-28 23:48:09', 1),
(1153, '4011ABDOULAHAT', NULL, 'ABDOU LAHAT DIAGNE', 'caractere', 'senegal', '80 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1154, '4011ABDOULAYE', NULL, 'ABDOULAYE GNINGUE', 'caractere', 'senegal', '81 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1155, '4011ABLAYE', NULL, 'ABLAYE MBAYE_DJIBSON', 'caractere', 'senegal', '82 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1156, '4011ABOUSARR', NULL, 'ABOU SARR', 'caractere', 'senegal', '83 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1157, '4011ABPROD', NULL, 'ABPROD COMMUNICATION', 'caractere', 'senegal', '84 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1158, '4011ABYTHIAM', NULL, 'ABY THIAM', 'caractere', 'senegal', '85 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1159, '4011ACTE', NULL, 'L\'ACTE', 'caractere', 'senegal', '86 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1160, '4011ADAMA', NULL, 'ADAMA GUEYE', 'caractere', 'senegal', '87 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1161, '4011ADJA', NULL, 'ADJA SEYNABOU DIOUF', 'caractere', 'senegal', '88 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1162, '4011ADJAALPHYGUEY', NULL, 'ADJA ALPHY GUEYE', 'caractere', 'senegal', '89 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1163, '4011ADJACOUMBA', NULL, 'ADJA COUMBA NIANG', 'caractere', 'senegal', '90 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1164, '4011ADJARAFALL', NULL, 'ADJARA FALL', 'caractere', 'senegal', '91 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1165, '4011ADSHOW', NULL, 'AD SHOW', 'caractere', 'senegal', '92 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1166, '4011AFCOP', NULL, 'AFCOP SUARL', 'caractere', 'senegal', '93 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1167, '4011AFRICAPHONE', NULL, 'AFRICAPHONE BOOKS', 'caractere', 'senegal', '94 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1168, '4011AFRICOME', NULL, 'AFRICOME', 'caractere', 'senegal', '95 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1169, '4011AFROMAKER', NULL, 'AFROMAKER', 'caractere', 'senegal', '96 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1170, '4011AFROPUB', NULL, 'AFRO PUB', 'caractere', 'senegal', '97 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1171, '4011AHMAD', NULL, 'AHMAD LY', 'caractere', 'senegal', '98 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1172, '4011AISSATA', NULL, 'AISSATA TRAORE', 'caractere', 'senegal', '99 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1173, '4011AISSATACISSE', NULL, 'AISSATA CISSE', 'caractere', 'senegal', '100 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1174, '4011AISSATOUDRAME', NULL, 'AISSATOU DRAME', 'caractere', 'senegal', '101 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1175, '4011AISSATOUKANE', NULL, 'AISSATOU KANE ', 'caractere', 'senegal', '102 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1176, '4011AKPROJECT', NULL, 'AK PROJECT', 'caractere', 'senegal', '103 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1177, '4011ALEXANDRE', NULL, 'ALEXANDRE JULIENNE', 'caractere', 'senegal', '104 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1178, '4011ALFAYDA', NULL, 'ALFAYDA RADIO', 'caractere', 'senegal', '105 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1179, '4011ALINEBIBETTE', NULL, 'ALINE BIBETTE FAYE ', 'caractere', 'senegal', '106 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1180, '4011ALIOUNE', NULL, 'ALIOUNE TABLIBE LY', 'caractere', 'senegal', '107 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1181, '4011ALIOUNEBAD', NULL, 'ALIOUNE BADARA NDIAYE', 'caractere', 'senegal', '108 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1182, '4011ALIOUNENDIAYE', NULL, 'ALIOUNE NDIAYE', 'caractere', 'senegal', '109 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1183, '4011ALKUMA', NULL, 'GROUPE ALKUMA', 'caractere', 'senegal', '110 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1184, '4011ALMOURIDIYYA', NULL, 'ALMOURIDIYYA', 'caractere', 'senegal', '111 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1185, '4011ALPHAOMEGA', NULL, 'ALPHA & OMEGA', 'caractere', 'senegal', '112 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1186, '4011ALPHY', NULL, 'ADJA ALPHY GUEYE_L\'ESTHETE GROUP', 'caractere', 'senegal', '113 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1187, '4011AMADOUBOUSSO', NULL, 'AMADOU BOUSSO DIAGNE', 'caractere', 'senegal', '114 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1188, '4011AMADOUMACTAR', NULL, 'AMADOU MACTAR DIALLO', 'caractere', 'senegal', '115 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:18', 0),
(1189, '4011AMADOUNDONGO', NULL, 'AMADOU NDONGO', 'caractere', 'senegal', '116 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1190, '4011AMARANTE', NULL, 'AMARANTE', 'caractere', 'senegal', '117 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1191, '4011AMETH', NULL, 'AMETH FALL', 'caractere', 'senegal', '118 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1192, '4011AMINATA', NULL, 'MAME MARIE AMINATA DOUCOURE', 'caractere', 'senegal', '119 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1193, '4011AMINATADIAWAR', NULL, 'AMINATA DIAWARA', 'caractere', 'senegal', '120 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1194, '4011ANDRE', NULL, 'MOUHAMED ANDRE NDOYE', 'caractere', 'senegal', '121 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1195, '4011ANISSA', NULL, 'ANISSA SECK', 'caractere', 'senegal', '122 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1196, '4011ANK', NULL, 'ANK CONSULTING', 'caractere', 'senegal', '123 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1197, '4011ARAME', NULL, 'ARAME SALL', 'caractere', 'senegal', '124 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1198, '4011ARONA', NULL, 'ARONA', 'caractere', 'senegal', '125 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1199, '4011ARTMADA', NULL, 'ARTMADA', 'caractere', 'senegal', '126 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1200, '4011ASFIYA', NULL, 'ASFIYAHI COMMUNICATION', 'caractere', 'senegal', '127 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1201, '4011ASSANEGUEYE', NULL, 'ASSANE GUEYE', 'caractere', 'senegal', '128 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1202, '4011ATAB', NULL, 'ATAB SAMBOU', 'caractere', 'senegal', '129 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1203, '4011ATELIERSDEIBA', NULL, 'ATELIERS DE IBA', 'caractere', 'senegal', '130 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1204, '4011ATLANTIS', NULL, 'ATLANTIS GROUP', 'caractere', 'senegal', '131 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1205, '4011AUDEGUYON', NULL, 'AUDE GUYON', 'caractere', 'senegal', '132 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1206, '4011AUGUSTIN', NULL, 'AUGUSTIN DIATTA', 'caractere', 'senegal', '133 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1207, '4011AWA', NULL, 'AWA TOURE', 'caractere', 'senegal', '134 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1208, '4011BABACA', NULL, 'BABACAR NDAW FAYE', 'caractere', 'senegal', '135 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1209, '4011BABACAR', NULL, 'BABACAR NDOYE', 'caractere', 'senegal', '136 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1210, '4011BABACARCHEIKH', NULL, 'BABACAR CHEIKH SALAH GUINDO', 'caractere', 'senegal', '137 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1211, '4011BABACARMANE', NULL, 'BABACAR MANE', 'caractere', 'senegal', '138 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1212, '4011BACARYDIALLO', NULL, 'BACARY DIALLO', 'caractere', 'senegal', '139 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1213, '4011BAKARY', NULL, 'BAKARY NDIAYE', 'caractere', 'senegal', '140 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1214, '4011BAMTAARE', NULL, 'BAMTAARE DOWRI FM', 'caractere', 'senegal', '141 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1215, '4011BAYDI', NULL, 'BAYDI BA', 'caractere', 'senegal', '142 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1216, '4011BEAUTYPICS', NULL, 'BEAUTYPICS', 'caractere', 'senegal', '143 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1217, '4011BENNOFM', NULL, 'RADIO BENNO FM', 'caractere', 'senegal', '144 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1218, '4011BESTFM', NULL, 'BESTFM', 'caractere', 'senegal', '145 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1219, '4011BUZZ', NULL, 'BUZZ STUDIO', 'caractere', 'senegal', '146 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1220, '4011BIG', NULL, 'BIG SAM FALL', 'caractere', 'senegal', '147 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1221, '4011BIJORCA', NULL, 'BIJORCA', 'caractere', 'senegal', '148 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1222, '4011BILAL', NULL, 'BILAL MOUSSA', 'caractere', 'senegal', '149 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1223, '4011BINTAFATOUMAT', NULL, 'BINTA FATOUMATA KANE', 'caractere', 'senegal', '150 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1224, '4011BINTASANKARE', NULL, 'BINTASANKARE', 'caractere', 'senegal', '151 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1225, '4011BIRAM', NULL, 'BIRAM NGOM', 'caractere', 'senegal', '152 700 00 00', 'caractere@gmail.com', NULL, '2022-01-04 13:53:19', 0),
(1226, '4011BIRAME', NULL, 'BIRAME MBAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1227, '4011BLANCHE', NULL, 'BLANCHE MOUNKALA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1228, '4011BOCAR', NULL, 'BOCAR NDOYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1229, '4011BONKOUNGOU', NULL, 'BONKOUNGOU DESIGN', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1230, '4011BROADCOM', NULL, 'BROADCOM/RACINE KANE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1231, '4011BRUNA', NULL, 'BRUNA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1232, '4011BRUNOGUEDJ', NULL, 'BRUNO GUEDJ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1233, '4011BSDA', NULL, 'BSDA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1234, '4011BUSINESS', NULL, 'BUSINESS 24', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1235, '4011BUZZ', NULL, 'BUZZ STUDIOS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1236, '4011BUZZLAB', NULL, 'BUZZ LAB', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1237, '4011BYFILLING', NULL, 'BY FILLING', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1238, '4011CARREFOURFM', NULL, 'CARREFOUR FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1239, '4011CHALESGUEYE', NULL, 'CHARLES GUEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1240, '4011CHALLENGER', NULL, 'CHALLENGER', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1241, '4011CINEKAP', NULL, 'CINEKAP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1242, '4011CLEMENT', NULL, 'CLEMENT TARDIF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1243, '4011COCCINELLE', NULL, 'COCCINELLE VERTE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1244, '4011COIN', NULL, 'COIN AFRIQUE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1245, '4011CORINE', NULL, 'CORINE BERGES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1246, '4011CORINEZAHUIEP', NULL, 'CORINE ZAHUI EPSE LECOMPTE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1247, '4011COTEOUEST', NULL, 'COTE OUEST AUDIOVISUEL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1248, '4011COUROPROD', NULL, 'COURO PROD', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1249, '4011CREATIVCOM', NULL, 'CREATIV COM_ISMAILA DIONE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1250, '4011CRISTAL', NULL, 'CRISTAL EVENTS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1251, '4011CURTIS', NULL, 'MARIE THERESE CURTIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1252, '4011CYPSIEBANDIO', NULL, 'CYPSIE BANDIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1253, '4011DABAKH', NULL, 'DABAKH OFFICE SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1254, '4011DAKARACTU', NULL, 'DAKAR ACTU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1255, '4011DAMIEN', NULL, 'DAMIEN DOSSIOVHO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:19', 0),
(1256, '4011DEED', NULL, 'DEED DEVELOPMENT SUARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1257, '4011DELTA', NULL, 'DELTA ENERGIE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1258, '4011DEMBAGUEYE', NULL, 'DEMBA GUEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1259, '4011DEMBATHIAM', NULL, 'DEMBA THIAM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1260, '4011DFCOM', NULL, 'DFCOM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1261, '4011DIMINGA', NULL, 'DIMINGA DASYLVA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1262, '4011DJIBRILDIALLO', NULL, 'DJIBRIL DIALLO SEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1263, '4011DJONY', NULL, 'DJONY FAH ISHOLA AGBOGBE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1264, '4011DOMINIQUE', NULL, 'DOMINIQUE BANGOURA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1265, '4011DOULSY', NULL, 'DOULSY_JAH GAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1266, '4011DREAM', NULL, 'DREAM LINE STUDIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1267, '4011DUDU', NULL, 'DUDU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1268, '4011DUNYAA', NULL, 'DUNYAA RADIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1269, '4011EBEN', NULL, 'EBEN SALOMON', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1270, '4011EBENISTERIE', NULL, 'EBENISTERIE KEUR MOR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1271, '4011EDEN', NULL, 'EDEN FLEURS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1272, '4011EDJA', NULL, 'EDITIONS JURIDIQUES AFRICAINES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1273, '4011ELHADJ', NULL, 'EL HADJ SAMBA FALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1274, '4011ELHADJAMADA', NULL, 'EL HADJ ADAMA NDONGO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1275, '4011ELHADJI', NULL, 'EL HADJI DIALLO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1276, '4011ELHADJMAMAD', NULL, 'EL HADJ MAMADOU SAMBE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1277, '4011ELHADJMAMADOU', NULL, 'EL HADJ MAMADOU MBENGUE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1278, '4011ELHADJMANSOUR', NULL, 'EL HADJ MANSOUR FALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1279, '4011ELHAHDJ', NULL, 'EL HADJ MAGUETTE THIAM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1280, '4011ELIOT', NULL, 'ELIOT CHARLES KOMNHA KOUASSI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1281, '4011ELISABETH', NULL, 'ELISABETH SENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1282, '4011ELISABETHDJIB', NULL, 'ELISABETH DJIBA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1283, '4011ENQUETE', NULL, 'ENQUETE PUB', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1284, '4011ERICBERGES', NULL, 'ERIC BERGES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1285, '4011ESKIMI', NULL, 'ESKIMI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1286, '4011ESPACE', NULL, 'ESPACE TECHNIQUE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1287, '4011ESPERANCEFM', NULL, 'RADIO ESPERANCE DU SENEGAL SA.', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1288, '4011ESPRIT', NULL, 'ESPRIT D\'AFRIQUE ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1289, '4011EVENPROD', NULL, 'EvenProd-Impression', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1290, '4011FABS', NULL, 'FABS SENEGAL SA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1291, '4011FAMADIOUF', NULL, 'FAMA DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1292, '4011FANTOBRIGHT', NULL, 'FANTOBRIGHT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1293, '4011FARANDOUR', NULL, 'FARA NDOUR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1294, '4011FATIMATOUBINT', NULL, 'FATIMATOU BINTOU SARR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1295, '4011FATOU', NULL, 'FATOU THIARE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1296, '4011FATOUBA', NULL, 'FATOU BA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1297, '4011FATOUBINTOUSA', NULL, 'FATOU BINTOU SARR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1298, '4011FATOUDIABY', NULL, 'FATOU DIABY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1299, '4011FATOUDIEDHIOU', NULL, 'FATOU DIEDHIOU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1300, '4011FATOUMATA', NULL, 'FATOUMATA OUATTARA_FATIM\'O', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1301, '4011FELIX', NULL, 'FELIX DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1302, '4011FEMEM', NULL, 'FEM FM/ RADIO DES FEMMES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1303, '4011FILYDIOUF', NULL, 'FILY DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1304, '4011FMSENEGAL', NULL, 'FM SENEGAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1305, '4011FOTOLIA', NULL, 'FOTOLIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1306, '4011FRANK', NULL, 'FRANK BOUCHER', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1307, '4011FUTURS', NULL, 'FUTURS MEDIAS_MBACKE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1308, '4011FUTURSMEDIAS', NULL, 'FUTURS MEDIAS_GFM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1309, '4011GARNIERADVICE', NULL, 'GARNIER ADVICE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1310, '4011GENERATION93', NULL, 'GENERATION 93,4', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1311, '4011GMS', NULL, 'GROUPE MEDIAS DU SUD', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1312, '4011GOMEDIA', NULL, 'GO MEDIA SUARL/FEMFM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1313, '4011GRAFIT', NULL, 'GRAF IT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1314, '4011GRAMICA', NULL, 'GRAMICA SAS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1315, '4011GRAVUPUB', NULL, 'GRAVU PUB', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1316, '4011GUILLAUME', NULL, 'GUILLAUME BASSINET', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:20', 0),
(1317, '4011HABIBCOULIBAL', NULL, 'HABIB KE CHERY COULIBALY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1318, '4011HAMAT', NULL, 'HAMAT LY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1319, '4011HENRY', NULL, 'HENRY VENN', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1320, '4011HLBSENEGAL', NULL, 'HLB SENEGAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1321, '4011HOMETECH', NULL, 'HOMETECH SA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1322, '4011HUSSEIN', NULL, 'HUSSEIN EZZEDINE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1323, '4011IBAAKU', NULL, 'IBAAKU BASSENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1324, '4011IBM', NULL, 'IBM SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1325, '4011IBRA', NULL, 'IBRA SEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1326, '4011IBRADIA', NULL, 'IBRA DIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1327, '4011IBRAHIMA', NULL, 'IBRAHIMA SENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1328, '4011IBRAHIMADOUMB', NULL, 'IBRAHIMA DOUMBIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1329, '4011IBRAHIMAMBAYE', NULL, 'IBRAHIMA MBAYE ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1330, '4011IBRAHIMANIASS', NULL, 'IBRAHIMA NIASS FALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1331, '4011IBRAHIMASALL', NULL, 'IBRAHIMA SALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1332, '4011IBRAHIMASORIB', NULL, 'IBRAHIMA SORIBA GUEYE ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1333, '4011ICONA', NULL, 'ICONA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1334, '4011IMAGEIN', NULL, 'IMAGEin SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1335, '4011IMPACTMARKETI', NULL, 'IMPACT MARKETING', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1336, '4011IMPRIMERIEDUC', NULL, 'IMPRIMERIE DU CENTRE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1337, '4011INAOTA', NULL, 'INAOTA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1338, '4011INCORE', NULL, 'INCORE SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1339, '4011INSERTION', NULL, 'L\'INSERTION', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1340, '4011INTELLIGENCES', NULL, 'INTELLIGENCES MAGAZINE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1341, '4011INTERMEDIASAR', NULL, 'INTERMEDIA SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1342, '4011IRADIO', NULL, 'IRADIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1343, '4011IRAHIMADOUMBI', NULL, 'IBRAHIMA DOUMBIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1344, '4011ISMAELA', NULL, 'ISMAELA SECK', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1345, '4011ISSA', NULL, 'ISSA SOW', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1346, '4011JACQUELINE', NULL, 'JACQUELINE M F SANE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1347, '4011JACQUES', NULL, 'JACQUES DE THEODOR MOSES AMARA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1348, '4011JAMA', NULL, 'JAMA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1349, '4011JANT', NULL, 'JANT BI_ECOLE DES SABLES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1350, '4011JANTBIFM', NULL, 'JANTBI FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1351, '4011JARDIN', NULL, 'JARDIN DU SAHEL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1352, '4011JEAN', NULL, 'JEAN LOUIS KAHOURY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1353, '4011JEANBAPTISTE', NULL, 'JEAN BAPTISTE SANE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1354, '4011JEANHUBERT', NULL, 'JEAN HUBERT BIAGUI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1355, '4011JEANJACQUES', NULL, 'JEAN JACQUES BOISSY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1356, '4011JEFF', NULL, 'JEFF DE BRUGES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1357, '4011JPMSENGHOR', NULL, 'JEAN PIERRE M. SENGHOR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1358, '4011JUMIA', NULL, 'JUMIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1359, '4011KAANI', NULL, 'KAANI_CAMILLE C.  LHOMMEAU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1360, '4011KADIASALL', NULL, 'KADIA SALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1361, '4011KARIMNDOYE', NULL, 'KARIM NDOYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1362, '4011KARINE', NULL, 'KARINE AWA CECILE JOUANELLE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1363, '4011KARINENDIAYE', NULL, 'KARINE NDIAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1364, '4011KEBSFM', NULL, 'KEBS FM/Frs Média', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1365, '4011KEDOUGOUFM', NULL, 'KEDOUGOU FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1366, '4011KEURARAM', NULL, 'KEUR ARAM INFORMATIQUE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1367, '4011KHALIFA', NULL, 'KHALIFA ABABACAR FAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1368, '4011KHEWEUL', NULL, 'KHEWEUL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:21', 0),
(1369, '4011LAGAZETTE', NULL, 'LA GAZETTE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1370, '4011LALIA', NULL, 'LALIA_NDEYE NOGAYE DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1371, '4011LAMINE', NULL, 'LAMINE SARR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1372, '4011LAMINEFALL', NULL, 'LAMINE FALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1373, '4011LAMP', NULL, 'LAMP FALL COMMUNICATION', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1374, '4011LAROCHETTE', NULL, 'LA ROCHETTE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1375, '4011LAS', NULL, 'L\'AS_GROUPE 3M COMM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1376, '4011LAYEPRO', NULL, 'LAYE PRO_ABDOULAYE NDAO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1377, '4011LEBASANE', NULL, 'LEBASANE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1378, '4011LENS', NULL, 'LENS ON LIFE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1379, '4011LEONTINE', NULL, 'LEONTINE DACOSTA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1380, '4011LEPALACE', NULL, 'LE PALACE D\'ANNA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1381, '4011LEPICERIE', NULL, 'L\'EPICERIE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1382, '4011LEQUOTIDIEN', NULL, 'LE QUOTIDIEN_GROUPE AVENIR COM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1383, '4011LERAL', NULL, 'LERAL NET', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1384, '4011LESOLEIL', NULL, 'LE SOLEIL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1385, '4011LESPETITESAFI', NULL, 'LES PETITES AFFICHES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1386, '4011LEUZMEDIA', NULL, 'LEUZ MEDIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1387, '4011LEVEL', NULL, 'LEVEL STUDIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1388, '4011LIBASSE', NULL, 'LIBASSE MBAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1389, '4011LIFA', NULL, 'LIFA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1390, '4011LINK', NULL, 'LINK MEDIA SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1391, '4011LISTEN', NULL, 'LISTEN PRODUCTIONS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1392, '4011LOIC', NULL, 'LOIC ROBERT HOQUET', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1393, '4011LOUIS', NULL, 'LOUIS BENOIST', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1394, '4011LOUTYBA', NULL, 'LOUTY BA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1395, '4011LUCIE', NULL, 'LUCIE BLANCHE M SONGO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1396, '4011MAGUETTE', NULL, 'MAGUETTE SEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1397, '4011MAGUETTEDIOP', NULL, 'MAGUETTE DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1398, '4011MAITREOUMY', NULL, 'MAITRE OUMY SOW LOUM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1399, '4011MALICK', NULL, 'MALICK DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1400, '4011MALICKDIAWARA', NULL, 'MALICK DIAWARA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1401, '4011MALICKNDAW', NULL, 'MALICK NDAW', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1402, '4011MAM', NULL, 'MAME BALLA MBOW', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1403, '4011MAMADOU', NULL, 'MAMADOU BAH', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1404, '4011MAMADOUC', NULL, 'MAMADOU CISSE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1405, '4011MAMADOUCHERIF', NULL, 'MAMADOU CHERIF DIALLO ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1406, '4011MAMADOUCISSE', NULL, 'MAMADOU CISSE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1407, '4011MAMADOUNDAW', NULL, 'MAMADOU NDAW DIT WILLY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1408, '4011MAME', NULL, 'MAME ABDOU SOUARE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1409, '4011MAMEBOYO', NULL, 'MAME BOYO TALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1410, '4011MAMYTEUWSOW', NULL, 'MAMY TEUW SOW', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1411, '4011MANDARINE', NULL, 'MANDARINE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1412, '4011MANSOURGUEYE', NULL, 'MANSOURGUEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1413, '4011MAOPROD', NULL, 'PAPA KANDE SIDIBE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1414, '4011MAPATHE', NULL, 'MAPATHE NDIAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1415, '4011MARCERIC', NULL, 'MARC ERIC PIERRE LECOEUR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1416, '4011MARCPIERREERI', NULL, 'MARC PIERRE ERIC LECOEUR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1417, '4011MARIADAPINA', NULL, 'MARIA DAPINA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1418, '4011MARIAMADIALL', NULL, 'MARIAMA DIALLÖ MODELE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1419, '4011MARIAME', NULL, 'MARIAME FAYE ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1420, '4011MARIE', NULL, 'MARIE THERESE CURTIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1421, '4011MARIEME', NULL, 'MARIEME NGOM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1422, '4011MARIEMETRAORE', NULL, 'MARIEME TRAORE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1423, '4011MARODISENEGAL', NULL, 'MARODI SENEGAL SUARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1424, '4011MATAMFM', NULL, 'MATAM FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1425, '4011MATAR', NULL, 'MATAR DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1426, '4011MATHIASBOISSY', NULL, 'MATHIAS BOISSY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1427, '4011MATY', NULL, 'MATY DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1428, '4011MBAMAHAN', NULL, 'MBAMAHAN SOW', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1429, '4011MBOURFM', NULL, 'MBOUR FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1430, '4011MEDEX', NULL, 'MEDEX SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1431, '4011MEDIA365', NULL, 'MEDIA 365', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1432, '4011MEDIATIME', NULL, 'MEDIA TIME', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1433, '4011MIRAGE', NULL, 'MIRAGE_EL HADJ SIDY DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1434, '4011MOCTARDIOP', NULL, 'MOCTAR DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1435, '4011MOHAMED', NULL, 'MOHAMED DIOKHANE SY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1436, '4011MOHAMEDAL', NULL, 'MOHAMED AL AMIN DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1437, '4011MOOV', NULL, 'MOOV\'IN DAK ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1438, '4011MOUHAMADOU', NULL, 'MOUHAMADOU LAMINE SENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:22', 0),
(1439, '4011MOUHAMADOUFA', NULL, 'MOUHAMADOU FALLOU THIAM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1440, '4011MOUHAMADOUFAL', NULL, 'MOUHAMADOU FALL - LIBASS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1441, '4011MOUHAMADOUNDI', NULL, 'MOUHAMADOU NDIAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1442, '4011MOUHAMED', NULL, 'MOUHAMED MOUSTAPHA DIAGNE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1443, '4011MOUHAMEDDIOKH', NULL, 'MOUHAMED DIOKHANE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1444, '4011MOULAYE', NULL, 'MOULAYE MARA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1445, '4011MOUNTAGA', NULL, 'MOUNTAGA CISSE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1446, '4011MOURCHIDCOMMU', NULL, 'GROUPE MOURCHID COMMUNICATION', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1447, '4011MOUSSA', NULL, 'MOUSSA DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1448, '4011MOUSSANDIAYE', NULL, 'MOUSSA NDIAYE ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1449, '4011MOUSTAPHA', NULL, 'MOUSTAPHA OUATTARA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1450, '4011MOUSTAPHAGUEY', NULL, 'MOUSTAPHA GUEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1451, '4011MOUSTAPHASARR', NULL, 'MOUSTAPHA SARR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1452, '4011MOUSTAPHATOUR', NULL, 'MOUSTAPHA TOURE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1453, '4011NAFISSATOU', NULL, 'NAFISSATOU BA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1454, '4011NAFISSATOUGAE', NULL, 'NAFISSATOU GAELLE SENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1455, '4011NATTY', NULL, 'NATTY DREAD', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1456, '4011NAYETTE', NULL, 'NAYETTE DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1457, '4011NDAGOU', NULL, 'NDAGOU NDIAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1458, '4011NDAW', NULL, 'NDAW MALICK', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1459, '4011NDEFLENG', NULL, 'NDEF-LENG FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1460, '4011NDENE', NULL, 'NDENE OUSMANE NIANG', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1461, '4011NDEYE', NULL, 'NDEYE SEYNABOU SENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1462, '4011NDEYEMOUR', NULL, 'NDEYE MOUR NDAO ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1463, '4011NDIAGANDOUR', NULL, 'NDIAGA NDOUR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1464, '4011NDIAYE', NULL, 'NDIAYE STAGIAIRE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1465, '4011NDONGO', NULL, 'IBRAHIMA NDONGO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1466, '4011NEUKLEO', NULL, 'NEUKLEOS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1467, '4011NIANG', NULL, 'MOUHAMADOU MOUSTAPHA NIANG', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1468, '4011NICOLAS', NULL, 'NICOLAS KERROUX', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1469, '4011NKXCONSULTING', NULL, 'NKX CONSULTING', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1470, '4011NOSTALGIE', NULL, 'NOSTALGIE DAKAR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1471, '4011NOUVEL', NULL, 'NOUVEL HORIZON', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1472, '4011NOUVELLESFRON', NULL, 'NOUVELLES FRONTIERES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1473, '4011NUMERIKA', NULL, 'NUMERIKA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1474, '4011NUMERIS', NULL, 'NUMERIS SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1475, '4011ODILE', NULL, 'ODILE BAMPOKY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1476, '4011OOOK', NULL, 'OOOK.SN', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1477, '4011ORANGO', NULL, 'ORANGO NAJMA VERINIQUE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1478, '4011ORCA', NULL, 'ORCA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1479, '4011ORIGINESA', NULL, 'ORIGINE SA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1480, '4011OUICARY', NULL, 'OUI CARRY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1481, '4011OULIMATA', NULL, 'OULIMATA DIAGNE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1482, '4011OUMAR', NULL, 'OUMAR NIANG', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1483, '4011OUMARBA', NULL, 'OUMAR BA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1484, '4011OUMYMARIE', NULL, 'OUMY MARIE DIALLO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1485, '4011OUSMANE', NULL, 'OUSMANE CISSE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1486, '4011OUSMANECOLY', NULL, 'OUSMANE COLY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1487, '4011OUSMANEFALL', NULL, 'OUSMANE FALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:23', 0),
(1488, '4011OXYGENE', NULL, 'OXYGENE AFRICA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1489, '4011PACIFIQUEPISC', NULL, 'PACIFIQUE PISCINE LIMAMOU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1490, '4011PANTONE', NULL, 'PANTONE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1491, '4011PAPAALIOUNE', NULL, 'PAPA ALIOUNE DIENG', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1492, '4011PAPAMAO', NULL, 'PAPA MAO DIALLO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1493, '4011PAPAMOUSSA', NULL, 'PAPA MOUSSA DIAKHATE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1494, '4011PAPEADRIEN', NULL, 'PAPE ADRIEN DIOUF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1495, '4011PAPEAMADOUTAL', NULL, 'PAPE AMADOU TALL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1496, '4011PAPEMARBOYE', NULL, 'PAPE MAR BOYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1497, '4011PAPI', NULL, 'PAPI STUDIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1498, '4011PASSANT', NULL, 'PASSANT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1499, '4011PAUL', NULL, 'PAUL ERNEST SAMBOU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1500, '4011PENDA', NULL, 'PENDA BADJI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1501, '4011PETITES', NULL, 'LES PETITES AFFICHES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1502, '4011PICONET', NULL, 'PICONET_STUDIO PICONET', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1503, '4011PIKASSO', NULL, 'PIKASSO SENEGAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1504, '4011PNL', NULL, 'PNL ASSOCIES_PEOPLE NO LIMIT SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1505, '4011PODORFM', NULL, 'PODOR FM/Frs Média', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1506, '4011POLYKROME', NULL, 'POLYKROME', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1507, '4011PPG', NULL, 'PPG SEIGNEURIE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1508, '4011PREMIUM', NULL, 'PREMIUM BEAT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1509, '4011PRESCO', NULL, 'PRESCO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1510, '4011PRINCE', NULL, 'PRINCE DEBIZ N\'KOUKA BIZENGA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1511, '4011PRINTIMPACT', NULL, 'PRINT IMPACT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1512, '4011PRODIVIS', NULL, 'PRODIVIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1513, '4011RADIO', NULL, 'RADIO MOUBARACK FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1514, '4011RADISSONBLU', NULL, 'RADISSONBLU HOTEL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1515, '4011RAMSESGROUP', NULL, 'RAMSES GROUP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1516, '4011REGIDAK', NULL, 'REGI DAK_REGIE DAKAROISE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1517, '4011REGIPUB', NULL, 'REGI PUB', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1518, '4011REPTYLEMUSIC', NULL, 'REPTYLE MUSIC GROUP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1519, '4011REUSSIR', NULL, 'REUSSIR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1520, '4011RFI', NULL, 'RFI_RADIO FRANCE INTERNATIONALE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1521, '4011RINGIER', NULL, 'RINGIER SENEGAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1522, '4011ROGERPIERRE', NULL, 'ROGER PIERRE MONIZ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1523, '4011ROKHAYACISS', NULL, 'ROKHAYA CISSOKHO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1524, '4011ROLL', NULL, 'ROLL SERVICE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1525, '4011RTS', NULL, 'RTS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1526, '4011SACOURA', NULL, 'SACOURA BA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1527, '4011SALIOUDIOP', NULL, 'SALIOU DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1528, '4011SATEL', NULL, 'SATEL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1529, '4011SELOV', NULL, 'SELOV', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1530, '4011SENEGO', NULL, 'SENEGO MEDIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1531, '4011SENELEC', NULL, 'SENELEC', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1532, '4011SENEPE', NULL, 'SENEPEOPLE TV', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1533, '4011SENEPRO', NULL, 'SENEPRO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1534, '4011SENEWEB', NULL, 'SENEWEB SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1535, '4011SENGAMES', NULL, 'SENGAMES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:24', 0),
(1536, '4011SENIFAYE', NULL, 'SENI FAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1537, '4011SENNEWS', NULL, 'SEN NEWS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1538, '4011SERIGNE', NULL, 'SERIGNE SALIOU DIOP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1539, '4011SERIGNENARDIO', NULL, 'SERIGNE NAR DIOUM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1540, '4011SEYDINA', NULL, 'SEYDINA OUSMANE BOYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1541, '4011SEYNI', NULL, 'SEYNI GUEYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1542, '4011SEYNIFAYE', NULL, 'SEYNI FAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1543, '4011SIAGRO', NULL, 'SIAGRO_KIRENE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1544, '4011SIAKA', NULL, 'SIAKA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1545, '4011SIDATH', NULL, 'SIDATH', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1546, '4011SIPAPRESS', NULL, 'SIPA PRESS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1547, '4011SIPS', NULL, 'SIPS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1548, '4011SIRIUS', NULL, 'SIRIUS CAPITAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1549, '4011SMART', NULL, 'SMART COM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1550, '4011SODAV', NULL, 'SODAV', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1551, '4011SOKHNA', NULL, 'SOKHNA MAIMOUNA SALLA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1552, '4011SOKHNAMAIMOUN', NULL, 'SOKHNA MAIMOUNA SECK ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1553, '4011SOLIMMO', NULL, 'SOLIMMO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1554, '4011SOPSIAK', NULL, 'SOPSIAK PHOTOGRAPHY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1555, '4011STUDIO', NULL, 'STUDIO SANKARA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1556, '4011STUDIOCRAYON', NULL, 'STUDIO CRAYON', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1557, '4011STUDIOREVERSE', NULL, 'STUDIO REVERSE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1558, '4011STUDIOWUDE', NULL, 'STUDIO WUDE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1559, '4011SUDFM', NULL, 'SUD FM_SEN RADIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1560, '4011SUDSARL', NULL, 'SUD QUOTIDIEN SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1561, '4011TAXITOP', NULL, 'TAXITOP SN SUARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1562, '4011TERANGAFM', NULL, 'TERANGA FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1563, '4011TERANGAINVEST', NULL, 'TERANGA INVESTMENTS SARL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1564, '4011TERROU', NULL, 'TERROU BI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1565, '4011THIERNO', NULL, 'THIERNO WADE ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1566, '4011THIORO', NULL, 'THIORO NDIAYE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1567, '4011TIMTIMOL', NULL, 'TIMTIMOL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1568, '4011TIZIANA', NULL, 'TIZIANA MANFREDI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1569, '4011TOM', NULL, 'TOM ESCARMELLE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1570, '4011TOPFM', NULL, 'TOP FM-GROUPE LE TEMOIN', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1571, '4011TOUBAFALL', NULL, 'RADIO TOUBA FALL FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1572, '4011TRACE', NULL, 'TRACE SENEGAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1573, '4011TRANSTERP', NULL, 'TRANSTERP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1574, '4011UNIVERSAL', NULL, 'UNIVERSAL MUSIC AFRICA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1575, '4011URAC', NULL, 'URAC (SENEGAL)', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1576, '4011URBAN', NULL, 'URBAN RADIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1577, '4011VDNTECH', NULL, 'VDN TECHNOLOGY SARL ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1578, '4011VIBERADIO', NULL, 'VIBE RADIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1579, '4011VINCENTBLOCH', NULL, 'VINCENT BLOCH', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1580, '4011VIRIMMA', NULL, 'VIRIMMA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1581, '4011VIZEUM', NULL, 'VIZEUM SENEGAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1582, '4011WALFA', NULL, 'WALFADJRI', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1583, '4011WIWSPORT', NULL, 'WIWSPORT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1584, '4011WURUS', NULL, 'WURUS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1585, '4011XELCOM', NULL, 'XELCOM SERVICES', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:25', 0),
(1586, '4011YACINE', NULL, 'YACINE PRODUCTION', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1587, '4011YACINESECK', NULL, 'YACINE SECK', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1588, '4011YAYE', NULL, 'YAYE FATOU BA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1589, '4011YIIF', NULL, 'YIIF', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1590, '4011YOGUE', NULL, 'YOGUE TCHEUDJO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1591, '4011YOURI', NULL, 'YOURI L\'ENQUETTE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1592, '4011YOUSSEF', NULL, 'YOUSSEF HACHEM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1593, '4011YUX', NULL, 'SUBA AFRICA TECHNOLOGIES ', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1594, '4011ZIART', NULL, 'ZIARTSTUDIO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1595, '4011ZIGFM', NULL, 'ZIG FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1596, '4011ZIKFM', NULL, 'ZIK FM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1597, '4012ADOBE', NULL, 'ADOBE SYSTEMS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1598, '4012AFRETYSAS', NULL, 'AFRETY SAS PARIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1599, '4012AGORAPULSE', NULL, 'AGORAPULSE SAS PARIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1600, '4012AKTYVUSSE', NULL, 'AKTYVUSSE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1601, '4012AMAZON', NULL, 'AMAZON', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1602, '4012APPLE', NULL, 'APPLE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1603, '4012AUDIOHUB', NULL, 'AUDIOHUB', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1604, '4012AUDIOMACK', NULL, 'AUDIOMACK', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1605, '4012AVANGATE', NULL, 'AVANGATE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1606, '4012BELIVE', NULL, 'BELIVE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1607, '4012BRAND24', NULL, 'BRAND 24', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1608, '4012BUSINESS24', NULL, 'BUSINESS24', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0);
INSERT INTO `fournisseur` (`idFournisseur`, `reference`, `prenomFournisseur`, `nomFournisseur`, `adresseFournisseur`, `paysFournisseur`, `telephoneFournisseur`, `emailFournisseur`, `photoFournisseur`, `dateAjout`, `etat`) VALUES
(1609, '4012CAMPAINGN', NULL, 'CAMPAIGN MONITOR', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1610, '4012CRISTAL', NULL, 'CRISTAL EVENTS PARIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1611, '4012DEEZER', NULL, 'DEEZER PARIS', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1612, '4012FACEBOOK', NULL, 'FACEBOOK', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1613, '4012FAVANGATE', NULL, 'AVANGATE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1614, '4012FORMILLACOM', NULL, 'FORMILLACOM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1615, '4012FOTOLIA', NULL, 'FOTOLIA', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1616, '4012GETTYIMAGE', NULL, 'GETTYIMAGE.COM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1617, '4012GOOGLE', NULL, 'GOOGLE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1618, '4012HEROKU', NULL, 'HEROKU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1619, '4012INCORE', NULL, 'INCORE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1620, '4012ITUNES', NULL, 'ITUNES.COM/BILL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1621, '4012KHEWEUL', NULL, 'KHEWEUL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1622, '4012LANDBOT', NULL, 'LANDBOT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1623, '4012LEARNING', NULL, 'LEARNING CURVE', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1624, '4012LINKEDIN', NULL, 'LINKEDIN', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1625, '4012MAILCHIMP', NULL, 'MAILCHIMP', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1626, '4012MATMENTIONCOM', NULL, 'MATMENTIONCOM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1627, '4012MENTION', NULL, 'WWW.MENTION.COM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1628, '4012MENTIONCOM', NULL, 'MENTIONCOM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1629, '4012NEUKLEO', NULL, 'NEUKLEO', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1630, '4012NEW', NULL, 'NEW CRISTAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1631, '4012OVH', NULL, 'OVH ROUBAIX', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1632, '4012PAYPAL', NULL, 'PAYPAL', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1633, '4012PAYPALCONTAGI', NULL, 'PAYPAL CONTAGIOU', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1634, '4012PLANNINGDIRTY', NULL, 'PLANNING DIRTY', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1635, '4012SPARKLIT', NULL, 'SPARKLIT', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:26', 0),
(1636, '4012STK', NULL, 'STK_SHUTTERSTOCK', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:27', 0),
(1637, '4012TWITTER', NULL, 'TWITTER', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:27', 0),
(1638, '4012WETRANSFER', NULL, 'WETRANSFER', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:27', 0),
(1639, '4012WIREWAX', NULL, 'WIREWAX LONDON', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:27', 0),
(1640, '4012YOAST', NULL, 'YOAST', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:27', 0),
(1641, '4012ZOOM', NULL, 'ZOOM', NULL, NULL, NULL, NULL, NULL, '2022-01-04 13:53:27', 0);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `libelle`) VALUES
(1, 'Commercial'),
(2, 'Directrice generale'),
(3, 'Directeur commercial'),
(4, 'DAF'),
(5, 'Directrice clientele'),
(6, 'Chef de groupe'),
(7, 'Chef de pub'),
(8, 'Responsable media'),
(9, 'Media planner'),
(10, 'Responsable digital'),
(11, 'Chef de pub digital'),
(12, 'Chef de groupe digital');

-- --------------------------------------------------------

--
-- Structure de la table `role_droit`
--

CREATE TABLE `role_droit` (
  `id` int(11) NOT NULL,
  `idDroit` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE `rubrique` (
  `idRubrique` int(11) NOT NULL,
  `referenceRubrique` varchar(250) DEFAULT NULL,
  `rubrique` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rubrique`
--

INSERT INTO `rubrique` (`idRubrique`, `referenceRubrique`, `rubrique`, `description`) VALUES
(1, 'RF042019-001', 'PRODUCTION', 'PRODUCTION'),
(2, 'RF042019-002', 'ACHAT D\'ESPACE MEDIA  OFFLINE', 'ACHAT D\'ESPACE MEDIA  OFFLINE'),
(3, 'RF042019-003', 'ACHAT D\'ESPACE MEDIA ONLINE', 'ACHAT D\'ESPACE MEDIA ONLINE'),
(4, 'RF032020-001', 'HONORAIRE', 'HONORAIRE'),
(5, 'RF122021-001', 'IMPREVUS', 'DIVERS'),
(65, 'RF022022-002', 'AA', 'AA'),
(66, 'RF022022-002', 'szaz', 'szas'),
(67, 'RF022022-002', 'vol', 'vol'),
(68, 'RF022022-002', 'vole', 'vole'),
(69, 'RF022022-002', '123', '123'),
(70, 'RF022022-002', '44', '44'),
(71, 'RF022022-002', '45', '45'),
(72, 'RF022022-002', '46', '46'),
(73, 'RF022022-002', '111', '111'),
(74, 'RF022022-002', '41A', '41A'),
(75, 'RF022022-002', 'KK', 'KK'),
(76, 'RF022022-002', 'cc', 'cc'),
(77, 'RF022022-002', 'cb', 'cb'),
(78, 'RF022022-002', 'aabb', 'aa'),
(79, 'RF022022-002', 'xxx', 'xxx'),
(80, 'RF022022-002', 'ddd', 'ddd'),
(81, 'RF022022-002', 'NJ', 'NJ'),
(82, 'RF022022-002', 'NJEE', 'NJEE'),
(83, 'RF022022-002', 'vfff', 'frrf'),
(84, 'RF022022-002', 'vfe', 'cft'),
(85, 'RF022022-002', 'vfedd', 'cftdd'),
(86, 'RF022022-002', 'vfrt', 'vfgt'),
(87, 'RF022022-002', 'vfrtfrfrr', 'vfgttrtr'),
(88, 'RF022022-002', 'jjj', 'jjj'),
(89, 'RF022022-002', 'rrr', 'rrr'),
(90, 'RF022022-002', 'scd', 'scd'),
(91, 'RF022022-002', '55', '55'),
(92, 'RF022022-002', 'dfgd', 'fg'),
(93, 'RF022022-002', 'cvcvcvc', 'dfdfd'),
(94, 'RF022022-002', 'fgh', 'gfd'),
(95, 'RF022022-002', 'sdsds', 'sdsds'),
(96, 'RF022022-002', 'ci', 'ci'),
(97, 'RF022022-002', 'EE', 'EE'),
(98, 'RF022022-002', 'ff', 'ff'),
(99, 'RF022022-002', 'dfgdrrr', 'fgr'),
(100, 'RF022022-002', 'hyt', 'hyt'),
(101, 'RF022022-002', 'gfhj', 'jhgf'),
(102, 'RF022022-002', 'vsdv', 'sd'),
(103, 'RF022022-002', 'xfgh', 'dfgh'),
(104, 'RF022022-002', '3E', '3E'),
(105, 'RF022022-002', 'hyi', 'hyi'),
(106, 'RF022022-002', 'cdsf', 'dz'),
(107, 'RF022022-002', 'kl', 'kl'),
(108, 'RF022022-002', 'sav', 'sav'),
(109, 'RF022022-002', 'sal', 'sal'),
(110, 'RF022022-002', 'toi', 'toi'),
(111, 'RF022022-002', 'LA', 'LA'),
(112, 'RF022022-002', 'ma', 'ma'),
(113, 'RF022022-002', 'maman', 'maman'),
(114, 'RF022022-002', 'papa', 'papa'),
(115, 'RF022022-002', 'VENDRE', 'VENDRE');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `referenceService` varchar(80) DEFAULT NULL,
  `service` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `referenceService`, `service`) VALUES
(1, 'TS032020-001', 'Conseil et orientation stratégique'),
(2, 'TS032020-002', 'Conception et création de campagnes Marque et Produits'),
(3, 'TS032020-003', 'Conception et création de campagnes '),
(4, 'TS032020-004', 'Conception, création visuels et spot TV'),
(5, 'TS032020-005', 'Conception, création spot TV & storyboard'),
(6, 'TS032020-006', 'Comms planning & Plan Media'),
(7, 'TS032020-007', 'Réalisation charte éditoriale'),
(8, 'TS032020-008', 'Mise en place de Kpis et monitoring'),
(9, 'TS032020-009', 'Conseil et orientation stratégique'),
(10, 'TS032020-010', 'Planning, buying, Monitiring'),
(11, 'TS032020-011', 'Edition rapport de campagne'),
(12, 'TS032020-012', 'Recherche de naming'),
(13, 'TS032020-013', 'Conception, création logo'),
(14, 'TS032020-014', 'Recherche et définition des lignes graphiques'),
(15, 'TS032020-015', 'Mise en synergie des vecteurs identitaires : taille - chromie - typographie'),
(16, 'TS032020-016', 'Définition des principes généraux'),
(17, 'TS032020-017', 'Définition des interdits'),
(18, 'TS032020-018', 'Définition des principes de cohabitation du logo avec ceux des partenaires'),
(19, 'TS032020-019', 'Composition - Exécution - Adaptation & mise aux formats'),
(20, 'TS032020-020', 'Exemples d\'applications graphiques'),
(21, 'TS032020-021', 'Supports: Carte de visite - factures - papier entête - enveloppe - signature mail - t-shirt - casquette - stylo - branding véhicule '),
(22, 'TS032020-022', 'Préproduction : casting, repérage lieux, Stylisme & accessoires, déco & accessoires, location site de tournage, autorisation de tournage'),
(23, 'TS032020-023', 'Production : Locations système de tournage, Accessoires Kit de tournage, Location lumière + Groupe ELectrogène+ Carburant, Location système de prise de son'),
(24, 'TS032020-024', 'Post Production : Location système de montage numérique, Animation packshot, Etalonnage, Location studio + enregistrement Voix off TV'),
(25, 'TS032020-025', 'Equipe Technique : Réalisateur, Directeur de production, Chef Opérateur'),
(26, 'TS032020-026', 'Cachet modèle/ Acteur principal'),
(27, 'TS032020-027', 'Cachet modèle/ Acteur secondaire'),
(28, 'TS032020-028', 'Cachet modèle / Figurants'),
(29, 'TS032020-029', 'Cession des droits 1 an / Sénégal / Tv / Print & Digital'),
(30, 'TS032020-030', 'Cession des droits 2 ans / Sénégal / Tv / Print & Digital'),
(31, 'TS032020-031', 'Cession des droits 3 ans / Sénégal / Tv / Print & Digital'),
(32, 'TS032020-032', 'Cession des droits 1 an / Sénégal / Tv / Print '),
(33, 'TS032020-033', 'Cession des droits 2 ans / Sénégal / Tv / Print '),
(34, 'TS032020-034', 'Cession des droits 3 ans / Sénégal / Tv / Print '),
(35, 'TS032020-035', 'Cession des droits 1 an / Panaf / Tv / Print & Digital'),
(36, 'TS032020-036', 'Cession des droits 2 ans / Panaf / Tv / Print & Digital'),
(37, 'TS032020-037', 'Cession des droits 3 ans / Panaf / Tv / Print & Digital'),
(38, 'TS032020-038', 'Cession des droits 1 an / Panaf / Tv / Print '),
(39, 'TS032020-039', 'Cession des droits 2 ans / Panaf / Tv / Print '),
(40, 'TS032020-040', 'Cession des droits 3 ans / Panaf / Tv / Print '),
(41, 'TS032020-041', 'Regie : Transport équipe technique & comédiens / Catering'),
(42, 'TS032020-042', 'Location studio'),
(43, 'TS032020-043', 'Enregistrement & coaching'),
(44, 'TS032020-044', 'Dérushage, montage et mixage'),
(45, 'TS032020-045', 'Cachet voix off'),
(46, 'TS032020-046', 'Traduction'),
(47, 'TS032020-047', 'Musique'),
(48, 'TS032020-048', 'Casting, repérage lieux, Stylisme & accessoires, déco & accessoires'),
(49, 'TS032020-049', 'Location studio'),
(50, 'TS032020-050', 'Location site de tournage'),
(51, 'TS032020-051', 'Honoraire photographe'),
(52, 'TS032020-052', 'Cession des droits photographe / 1 an / Sénégal / Tous supports'),
(53, 'TS032020-053', 'Cession des droits photographe / 2 ans / Sénégal / Tous supports'),
(54, 'TS032020-054', 'Cession des droits photographe / 3 ans / Sénégal / Tous supports'),
(55, 'TS032020-055', 'Cession des droits photographe / 1 an / Panaf / Tous supports'),
(56, 'TS032020-056', 'Cession des droits photographe / 2 ans / Panaf / Tous supports'),
(57, 'TS032020-057', 'Cession des droits photographe / 3 ans / Panaf / Tous supports'),
(58, 'TS032020-058', 'Cachet modèle /cession des droits 1 an / Sénégal / Print & digital'),
(59, 'TS032020-059', 'Cachet modèle /cession des droits 2 ans / Sénégal / Print & digital'),
(60, 'TS032020-060', 'Cachet modèle /cession des droits 3 ans / Sénégal / Print & digital'),
(61, 'TS032020-061', 'Cachet modèle /cession des droits 1 an / Panaf / Print & digital'),
(62, 'TS032020-062', 'Cachet modèle /cession des droits 2 ans / Panaf / Print & digital'),
(63, 'TS032020-063', 'Cachet modèle /cession des droits 3 ans / Panaf / Print & digital'),
(64, 'TS032020-064', 'Achat d\'image banque'),
(65, 'TS032020-065', 'Libre de droits (images non exclusives)'),
(66, 'TS032020-066', 'Durée : 1an'),
(67, 'TS032020-067', 'Durée : 2 ans'),
(68, 'TS032020-068', 'Durée : 3 ans'),
(69, 'TS032020-069', 'Territoire : Sénégal'),
(70, 'TS032020-070', 'Territoire : Panaf'),
(71, 'TS032020-071', 'Supports : Print & Digital'),
(72, 'TS032020-072', 'Supports : Print'),
(73, 'TS032020-073', 'Supports : Digital'),
(74, 'TS032020-074', 'Supports : TV'),
(75, 'TS032020-075', 'Mise en conformité des éléments graphiques & typographiques'),
(76, 'TS032020-076', 'Animation 2D'),
(77, 'TS032020-077', 'Animation 3D'),
(78, 'TS032020-078', 'Modélisation, Compositing, Motion design'),
(79, 'TS032020-079', 'Montage, Mix & Mastering'),
(80, 'TS032020-080', 'Location studio + enregistrement Voix off TV'),
(81, 'TS032020-081', 'Cachet Voix off TV'),
(82, 'TS032020-082', 'Utilisation musique existante'),
(83, 'TS032020-083', 'Musique libre de droits'),
(84, 'TS032020-084', 'Cession des droits 1 an / Sénégal / Tv & Digital'),
(85, 'TS032020-085', 'Cession des droits 2 ans / Sénégal / Tv & Digital'),
(86, 'TS032020-086', 'Cession des droits 3 ans / Sénégal / Tv & Digital'),
(87, 'TS032020-087', 'Cession des droits 1 an / Panaf/ Tv & Digital'),
(88, 'TS032020-088', 'Cession des droits 2 ans / Panaf / Tv & Digital'),
(89, 'TS032020-089', 'Cession des droits 3 ans / Panaf / Tv & Digital'),
(90, 'TS032020-090', 'Mise en conformité des éléments graphiques & typographiques'),
(91, 'TS032020-091', 'Compositing, Animation'),
(92, 'TS032020-092', 'Montage, Mix & Mastering'),
(93, 'TS032020-093', 'Location studio + enregistrement Voix off TV'),
(94, 'TS032020-094', 'Cachet Voix off TV'),
(95, 'TS032020-095', 'Utilisation musique existante'),
(96, 'TS032020-096', 'Musique libre de droits'),
(97, 'TS032020-097', 'Ecritel animé'),
(98, 'TS032020-098', 'Déclinaison graphique'),
(99, 'TS032020-099', 'Adaptation/animation'),
(100, 'TS032020-100', 'Montage'),
(101, 'TS032020-101', 'Création musique originale'),
(102, 'TS032020-102', 'Création Jingle'),
(103, 'TS032020-103', 'Remix musqiue existante'),
(104, 'TS032020-104', 'Location studio'),
(105, 'TS032020-105', 'Direction artistique, réalisaton, composition'),
(106, 'TS032020-106', 'Musiciens additionnels'),
(107, 'TS032020-107', 'Interprètes'),
(108, 'TS032020-108', 'Postproduction, mix & mastering'),
(109, 'TS032020-109', 'Supports : Telco '),
(110, 'TS032020-110', 'Supports : Radio, Tv, Digital'),
(111, 'TS032020-111', 'Supports : musique d\'attente téléphonique'),
(112, 'TS032020-112', 'Cession des droits 1 an / Sénégal '),
(113, 'TS032020-113', 'Cession des droits 2 ans / Sénégal'),
(114, 'TS032020-114', 'Cession des droits 3 ans / Sénégal '),
(115, 'TS032020-115', 'Cession des droits 1 an / Panaf'),
(116, 'TS032020-116', 'Cession des droits 2 ans / Panaf '),
(117, 'TS032020-117', 'Cession des droits 3 ans / Panaf '),
(118, 'TS032020-118', 'Gifs animés'),
(119, 'TS032020-119', 'Développement application web'),
(120, 'TS032020-120', 'Développement appication mobile'),
(121, 'TS032020-121', 'Maintenance et gestion de base de données'),
(122, 'TS032020-122', 'Live stream'),
(123, 'TS032020-123', 'Equipe technique & Matériel'),
(124, 'TS032020-124', 'Cachets influenceurs'),
(125, 'TS032020-125', 'Déclinaisons visuels'),
(126, 'TS032020-126', 'Live Tweet'),
(127, 'TS032020-127', 'Animatique digitale'),
(128, 'TS032020-128', 'Flyers A5 Recto seul'),
(129, 'TS032020-129', 'Flyers A4 Recto seul'),
(130, 'TS032020-130', 'Flyers A5 Recto/Verso'),
(131, 'TS032020-131', 'Flyers A4 Recto/Verso'),
(132, 'TS032020-132', 'Carton d\'invitation 2 volets'),
(133, 'TS032020-133', 'Carton d\'invitation Recto/Verso'),
(134, 'TS032020-134', 'Carte de Voeux Recto Seul'),
(135, 'TS032020-135', 'Carte de Voeux Recto/Verso'),
(136, 'TS032020-136', 'Plaquette A4'),
(137, 'TS032020-137', 'Dépliant 3 volets'),
(138, 'TS032020-138', 'Dépliant 2 volet'),
(139, 'TS032020-139', 'Dossier de presse'),
(140, 'TS032020-140', 'Kakemono'),
(141, 'TS032020-141', 'Signalétique'),
(142, 'TS032020-142', 'Affiche 40x60'),
(143, 'TS032020-143', 'Brochure'),
(144, 'TS032020-144', 'Affiche 12m²'),
(145, 'TS032020-145', 'Oriflamme'),
(146, 'TS032020-146', 'Abribus'),
(147, 'TS032020-147', 'Branding'),
(148, 'TS032020-148', 'Recrutement'),
(149, 'TS032020-149', 'Intéractions'),
(150, 'TS032020-150', 'Notoriété'),
(151, 'TS032020-151', 'Couverture'),
(152, 'TS032020-152', 'Traffic'),
(153, 'TS032020-153', 'Installations d\'application'),
(154, 'TS032020-154', 'Vues de vidéo'),
(155, 'TS032020-155', 'Génération de prospects'),
(156, 'TS032020-156', 'Message'),
(157, 'TS032020-157', 'Conversions'),
(158, 'TS032020-158', 'Google Ad'),
(159, 'TS032020-159', 'Facebook Ad'),
(160, 'TS032020-160', 'Instragram ad'),
(161, 'TS032020-161', 'Twitter Ad'),
(162, 'TS032020-162', 'Linkedin Ad'),
(163, 'TS032020-163', 'Seneweb'),
(164, 'TS032020-164', 'Dakar Actu'),
(165, 'TS032020-165', 'Leral'),
(166, 'TS032020-166', 'Eskimi'),
(167, 'TS032020-167', 'Jumia'),
(168, 'TS032020-168', 'Gramica'),
(169, 'TS032020-169', 'CPC'),
(170, 'TS032020-170', 'CPM'),
(171, 'TS032020-171', 'CPA'),
(172, 'TS032020-172', '2STV'),
(173, 'TS032020-173', 'TFM'),
(174, 'TS032020-174', 'RTS'),
(175, 'TS032020-175', 'SEN TV'),
(176, 'TS032020-176', 'WALF TV'),
(177, 'TS032020-177', 'RFM'),
(178, 'TS032020-178', 'ZIk FM'),
(179, 'TS032020-179', 'SUD FM'),
(180, 'TS032020-180', 'WALF FM'),
(181, 'TS032020-181', 'VIBE RADIO'),
(182, 'TS032020-182', 'I RADIO'),
(183, 'TS032020-183', 'RFI'),
(184, 'TS032020-184', 'LAMP FALL'),
(185, 'TS032020-185', 'TRACE FM'),
(186, 'TS032020-186', 'LAMP FALL TOUBA'),
(187, 'TS032020-187', 'AL FAYDA KAOLACK'),
(188, 'TS032020-188', 'TERANGA FM ST LOUIS'),
(189, 'TS032020-189', 'CARREFOUR FM LOUGA'),
(190, 'TS032020-190', 'MBOUR FM'),
(191, 'TS032020-191', 'BEST FM THIES'),
(192, 'TS032020-192', 'KEDOUGOU FM'),
(193, 'TS032020-193', 'ZIK FM ZIGINCHOR'),
(194, 'TS032020-194', 'ALKUMA FM TAMBA'),
(195, 'TS032020-195', 'URAC'),
(196, 'TS032020-196', 'JEUNE AFRIQUE'),
(197, 'TS032020-197', 'REUSSIR'),
(198, 'TS032020-198', 'MOOV IN DAK'),
(199, 'TS032020-199', 'INTELLIGENCE'),
(200, 'TS032020-200', 'Location 12 m² Dakar & Banlieue'),
(201, 'TS032020-201', 'Location 12 m² Dakar '),
(202, 'TS032020-202', 'Location Oriflamme'),
(203, 'TS032020-203', 'Location Abribus'),
(204, 'TS032020-204', 'Location Big size'),
(205, 'TS032020-205', 'Location Taxi');

-- --------------------------------------------------------

--
-- Structure de la table `typedevis`
--

CREATE TABLE `typedevis` (
  `idTypedevis` int(11) NOT NULL,
  `libelle` varchar(300) NOT NULL,
  `description` mediumtext NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typefacture`
--

CREATE TABLE `typefacture` (
  `idTypefacture` int(11) NOT NULL,
  `libelle` varchar(300) NOT NULL,
  `description` mediumtext NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeservice`
--

CREATE TABLE `typeservice` (
  `idTypeservice` int(11) NOT NULL,
  `referenceTypeservice` varchar(250) DEFAULT NULL,
  `typeService` varchar(300) DEFAULT NULL,
  `idFamille` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeservice`
--

INSERT INTO `typeservice` (`idTypeservice`, `referenceTypeservice`, `typeService`, `idFamille`, `description`) VALUES
(1, 'TS032020-001', 'Conseil et orientation stratégique', 33, 'à metre à jour'),
(2, 'TS032020-002', 'Conception et création de campagnes Marque et Produits', 33, 'à metre à jour'),
(3, 'TS032020-003', 'Conception et création de campagnes ', 34, 'à metre à jour'),
(4, 'TS032020-004', 'Conception, création visuels et spot TV', 34, 'à metre à jour'),
(5, 'TS032020-005', 'Conception, création spot TV & storyboard', 34, 'à metre à jour'),
(6, 'TS032020-006', 'Comms planning & Plan Media', 35, 'à metre à jour'),
(7, 'TS032020-007', 'Réalisation charte éditoriale', 35, 'à metre à jour'),
(8, 'TS032020-008', 'Mise en place de Kpis et monitoring', 35, 'à metre à jour'),
(9, 'TS032020-009', 'Conseil et orientation stratégique', 36, 'à metre à jour'),
(10, 'TS032020-010', 'Planning, buying, Monitiring', 36, 'à metre à jour'),
(11, 'TS032020-011', 'Edition rapport de campagne', 36, 'à metre à jour'),
(12, 'TS032020-012', 'Recherche de naming', 37, 'à metre à jour'),
(13, 'TS032020-013', 'Conception, création logo', 37, 'à metre à jour'),
(14, 'TS032020-014', 'Recherche et définition des lignes graphiques', 37, 'à metre à jour'),
(15, 'TS032020-015', 'Mise en synergie des vecteurs identitaires : taille - chromie - typographie', 37, 'à metre à jour'),
(16, 'TS032020-016', 'Définition des principes généraux', 37, 'à metre à jour'),
(17, 'TS032020-017', 'Définition des interdits', 37, 'à metre à jour'),
(18, 'TS032020-018', 'Définition des principes de cohabitation du logo avec ceux des partenaires', 37, 'à metre à jour'),
(19, 'TS032020-019', 'Composition - Exécution - Adaptation & mise aux formats', 37, 'à metre à jour'),
(20, 'TS032020-020', 'Exemples d\'applications graphiques', 37, 'à metre à jour'),
(21, 'TS032020-021', 'Supports: Carte de visite - factures - papier entête - enveloppe - signature mail - t-shirt - casquette - stylo - branding véhicule ', 37, 'à metre à jour'),
(22, 'TS032020-022', 'Préproduction : casting, repérage lieux, Stylisme & accessoires, déco & accessoires, location site de tournage, autorisation de tournage', 38, 'à metre à jour'),
(23, 'TS032020-023', 'Production : Locations système de tournage, Accessoires Kit de tournage, Location lumière + Groupe ELectrogène+ Carburant, Location système de prise de son', 38, 'à metre à jour'),
(24, 'TS032020-024', 'Post Production : Location système de montage numérique, Animation packshot, Etalonnage, Location studio + enregistrement Voix off TV', 38, NULL),
(25, 'TS032020-025', 'Equipe Technique : Réalisateur, Directeur de production, Chef Opérateur', 38, NULL),
(26, 'TS032020-026', 'Cachet modèle/ Acteur principal', 38, NULL),
(27, 'TS032020-027', 'Cachet modèle/ Acteur secondaire', 38, NULL),
(28, 'TS032020-028', 'Cachet modèle / Figurants', 38, NULL),
(29, 'TS032020-029', 'Cession des droits 1 an / Sénégal / Tv / Print & Digital', 38, NULL),
(30, 'TS032020-030', 'Cession des droits 2 ans / Sénégal / Tv / Print & Digital', 38, NULL),
(31, 'TS032020-031', 'Cession des droits 3 ans / Sénégal / Tv / Print & Digital', 38, NULL),
(32, 'TS032020-032', 'Cession des droits 1 an / Sénégal / Tv / Print ', 38, NULL),
(33, 'TS032020-033', 'Cession des droits 2 ans / Sénégal / Tv / Print ', 38, NULL),
(34, 'TS032020-034', 'Cession des droits 3 ans / Sénégal / Tv / Print ', 38, NULL),
(35, 'TS032020-035', 'Cession des droits 1 an / Panaf / Tv / Print & Digital', 38, NULL),
(36, 'TS032020-036', 'Cession des droits 2 ans / Panaf / Tv / Print & Digital', 38, NULL),
(37, 'TS032020-037', 'Cession des droits 3 ans / Panaf / Tv / Print & Digital', 38, NULL),
(38, 'TS032020-038', 'Cession des droits 1 an / Panaf / Tv / Print ', 38, NULL),
(39, 'TS032020-039', 'Cession des droits 2 ans / Panaf / Tv / Print ', 38, NULL),
(40, 'TS032020-040', 'Cession des droits 3 ans / Panaf / Tv / Print ', 38, NULL),
(41, 'TS032020-041', 'Regie : Transport équipe technique & comédiens / Catering', 38, NULL),
(42, 'TS032020-042', 'Location studio', 39, NULL),
(43, 'TS032020-043', 'Enregistrement & coaching', 39, NULL),
(44, 'TS032020-044', 'Dérushage, montage et mixage', 39, NULL),
(45, 'TS032020-045', 'Cachet voix off', 39, NULL),
(46, 'TS032020-046', 'Traduction', 39, NULL),
(47, 'TS032020-047', 'Musique', 39, NULL),
(48, 'TS032020-048', 'Casting, repérage lieux, Stylisme & accessoires, déco & accessoires', 40, NULL),
(49, 'TS032020-049', 'Location studio', 40, NULL),
(50, 'TS032020-050', 'Location site de tournage', 40, NULL),
(51, 'TS032020-051', 'Honoraire photographe', 40, NULL),
(52, 'TS032020-052', 'Cession des droits photographe / 1 an / Sénégal / Tous supports', 40, NULL),
(53, 'TS032020-053', 'Cession des droits photographe / 2 ans / Sénégal / Tous supports', 40, NULL),
(54, 'TS032020-054', 'Cession des droits photographe / 3 ans / Sénégal / Tous supports', 40, NULL),
(55, 'TS032020-055', 'Cession des droits photographe / 1 an / Panaf / Tous supports', 40, NULL),
(56, 'TS032020-056', 'Cession des droits photographe / 2 ans / Panaf / Tous supports', 40, NULL),
(57, 'TS032020-057', 'Cession des droits photographe / 3 ans / Panaf / Tous supports', 40, NULL),
(58, 'TS032020-058', 'Cachet modèle /cession des droits 1 an / Sénégal / Print & digital', 40, NULL),
(59, 'TS032020-059', 'Cachet modèle /cession des droits 2 ans / Sénégal / Print & digital', 40, NULL),
(60, 'TS032020-060', 'Cachet modèle /cession des droits 3 ans / Sénégal / Print & digital', 40, NULL),
(61, 'TS032020-061', 'Cachet modèle /cession des droits 1 an / Panaf / Print & digital', 40, NULL),
(62, 'TS032020-062', 'Cachet modèle /cession des droits 2 ans / Panaf / Print & digital', 40, NULL),
(63, 'TS032020-063', 'Cachet modèle /cession des droits 3 ans / Panaf / Print & digital', 40, NULL),
(64, 'TS032020-064', 'Achat d\'image banque', 41, NULL),
(65, 'TS032020-065', 'Libre de droits (images non exclusives)', 41, NULL),
(66, 'TS032020-066', 'Durée : 1an', 41, NULL),
(67, 'TS032020-067', 'Durée : 2 ans', 41, NULL),
(68, 'TS032020-068', 'Durée : 3 ans', 41, NULL),
(69, 'TS032020-069', 'Territoire : Sénégal', 41, NULL),
(70, 'TS032020-070', 'Territoire : Panaf', 41, NULL),
(71, 'TS032020-071', 'Supports : Print & Digital', 41, NULL),
(72, 'TS032020-072', 'Supports : Print', 41, NULL),
(73, 'TS032020-073', 'Supports : Digital', 41, NULL),
(74, 'TS032020-074', 'Supports : TV', 41, NULL),
(75, 'TS032020-075', 'Mise en conformité des éléments graphiques & typographiques', 42, NULL),
(76, 'TS032020-076', 'Animation 2D', 42, NULL),
(77, 'TS032020-077', 'Animation 3D', 42, NULL),
(78, 'TS032020-078', 'Modélisation, Compositing, Motion design', 42, NULL),
(79, 'TS032020-079', 'Montage, Mix & Mastering', 42, NULL),
(80, 'TS032020-080', 'Location studio + enregistrement Voix off TV', 42, NULL),
(81, 'TS032020-081', 'Cachet Voix off TV', 42, NULL),
(82, 'TS032020-082', 'Utilisation musique existante', 42, NULL),
(83, 'TS032020-083', 'Musique libre de droits', 42, NULL),
(84, 'TS032020-084', 'Cession des droits 1 an / Sénégal / Tv & Digital', 42, NULL),
(85, 'TS032020-085', 'Cession des droits 2 ans / Sénégal / Tv & Digital', 42, NULL),
(86, 'TS032020-086', 'Cession des droits 3 ans / Sénégal / Tv & Digital', 42, NULL),
(87, 'TS032020-087', 'Cession des droits 1 an / Panaf/ Tv & Digital', 42, NULL),
(88, 'TS032020-088', 'Cession des droits 2 ans / Panaf / Tv & Digital', 42, NULL),
(89, 'TS032020-089', 'Cession des droits 3 ans / Panaf / Tv & Digital', 42, NULL),
(90, 'TS032020-090', 'Mise en conformité des éléments graphiques & typographiques', 43, NULL),
(91, 'TS032020-091', 'Compositing, Animation', 43, NULL),
(92, 'TS032020-092', 'Montage, Mix & Mastering', 43, NULL),
(93, 'TS032020-093', 'Location studio + enregistrement Voix off TV', 43, NULL),
(94, 'TS032020-094', 'Cachet Voix off TV', 43, NULL),
(95, 'TS032020-095', 'Utilisation musique existante', 43, NULL),
(96, 'TS032020-096', 'Musique libre de droits', 43, NULL),
(97, 'TS032020-097', 'Ecritel animé', 44, NULL),
(98, 'TS032020-098', 'Déclinaison graphique', 44, NULL),
(99, 'TS032020-099', 'Adaptation/animation', 44, NULL),
(100, 'TS032020-100', 'Montage', 44, NULL),
(101, 'TS032020-101', 'Création musique originale', 45, NULL),
(102, 'TS032020-102', 'Création Jingle', 45, NULL),
(103, 'TS032020-103', 'Remix musqiue existante', 45, NULL),
(104, 'TS032020-104', 'Location studio', 45, NULL),
(105, 'TS032020-105', 'Direction artistique, réalisaton, composition', 45, NULL),
(106, 'TS032020-106', 'Musiciens additionnels', 45, NULL),
(107, 'TS032020-107', 'Interprètes', 45, NULL),
(108, 'TS032020-108', 'Postproduction, mix & mastering', 45, NULL),
(109, 'TS032020-109', 'Supports : Telco ', 45, NULL),
(110, 'TS032020-110', 'Supports : Radio, Tv, Digital', 45, NULL),
(111, 'TS032020-111', 'Supports : musique d\'attente téléphonique', 45, NULL),
(112, 'TS032020-112', 'Cession des droits 1 an / Sénégal ', 45, NULL),
(113, 'TS032020-113', 'Cession des droits 2 ans / Sénégal', 45, NULL),
(114, 'TS032020-114', 'Cession des droits 3 ans / Sénégal ', 45, NULL),
(115, 'TS032020-115', 'Cession des droits 1 an / Panaf', 45, NULL),
(116, 'TS032020-116', 'Cession des droits 2 ans / Panaf ', 45, NULL),
(117, 'TS032020-117', 'Cession des droits 3 ans / Panaf ', 45, NULL),
(118, 'TS032020-118', 'Gifs animés', 46, NULL),
(119, 'TS032020-119', 'Développement application web', 46, NULL),
(120, 'TS032020-120', 'Développement appication mobile', 46, NULL),
(121, 'TS032020-121', 'Maintenance et gestion de base de données', 46, NULL),
(122, 'TS032020-122', 'Live stream', 46, NULL),
(123, 'TS032020-123', 'Equipe technique & Matériel', 46, NULL),
(124, 'TS032020-124', 'Cachets influenceurs', 46, NULL),
(125, 'TS032020-125', 'Déclinaisons visuels', 46, NULL),
(126, 'TS032020-126', 'Live Tweet', 46, NULL),
(127, 'TS032020-127', 'Animatique digitale', 46, NULL),
(128, 'TS032020-128', 'Flyers A5 Recto seul', 47, NULL),
(129, 'TS032020-129', 'Flyers A4 Recto seul', 47, NULL),
(130, 'TS032020-130', 'Flyers A5 Recto/Verso', 47, NULL),
(131, 'TS032020-131', 'Flyers A4 Recto/Verso', 47, NULL),
(132, 'TS032020-132', 'Carton d\'invitation 2 volets', 47, NULL),
(133, 'TS032020-133', 'Carton d\'invitation Recto/Verso', 47, NULL),
(134, 'TS032020-134', 'Carte de Voeux Recto Seul', 47, NULL),
(135, 'TS032020-135', 'Carte de Voeux Recto/Verso', 47, NULL),
(136, 'TS032020-136', 'Plaquette A4', 47, NULL),
(137, 'TS032020-137', 'Dépliant 3 volets', 47, NULL),
(138, 'TS032020-138', 'Dépliant 2 volet', 47, NULL),
(139, 'TS032020-139', 'Dossier de presse', 47, NULL),
(140, 'TS032020-140', 'Kakemono', 47, NULL),
(141, 'TS032020-141', 'Signalétique', 47, NULL),
(142, 'TS032020-142', 'Affiche 40x60', 47, NULL),
(143, 'TS032020-143', 'Brochure', 47, NULL),
(144, 'TS032020-144', 'Affiche 12m²', 47, NULL),
(145, 'TS032020-145', 'Oriflamme', 47, NULL),
(146, 'TS032020-146', 'Abribus', 47, NULL),
(147, 'TS032020-147', 'Branding', 47, NULL),
(148, 'TS032020-148', 'Recrutement', 48, NULL),
(149, 'TS032020-149', 'Intéractions', 48, NULL),
(150, 'TS032020-150', 'Notoriété', 48, NULL),
(151, 'TS032020-151', 'Couverture', 48, NULL),
(152, 'TS032020-152', 'Traffic', 48, NULL),
(153, 'TS032020-153', 'Installations d\'application', 48, NULL),
(154, 'TS032020-154', 'Vues de vidéo', 48, NULL),
(155, 'TS032020-155', 'Génération de prospects', 48, NULL),
(156, 'TS032020-156', 'Message', 48, NULL),
(157, 'TS032020-157', 'Conversions', 48, NULL),
(158, 'TS032020-158', 'Google Ad', 49, NULL),
(159, 'TS032020-159', 'Facebook Ad', 49, NULL),
(160, 'TS032020-160', 'Instragram ad', 49, NULL),
(161, 'TS032020-161', 'Twitter Ad', 49, NULL),
(162, 'TS032020-162', 'Linkedin Ad', 49, NULL),
(163, 'TS032020-163', 'Seneweb', 50, NULL),
(164, 'TS032020-164', 'Dakar Actu', 50, NULL),
(165, 'TS032020-165', 'Leral', 50, NULL),
(166, 'TS032020-166', 'Eskimi', 51, NULL),
(167, 'TS032020-167', 'Jumia', 51, NULL),
(168, 'TS032020-168', 'Gramica', 51, NULL),
(169, 'TS032020-169', 'CPC', 52, NULL),
(170, 'TS032020-170', 'CPM', 52, NULL),
(171, 'TS032020-171', 'CPA', 52, NULL),
(172, 'TS032020-172', '2STV', 53, NULL),
(173, 'TS032020-173', 'TFM', 53, NULL),
(174, 'TS032020-174', 'RTS', 53, NULL),
(175, 'TS032020-175', 'SEN TV', 53, NULL),
(176, 'TS032020-176', 'WALF TV', 53, NULL),
(177, 'TS032020-177', 'RFM', 54, NULL),
(178, 'TS032020-178', 'ZIk FM', 54, NULL),
(179, 'TS032020-179', 'SUD FM', 54, NULL),
(180, 'TS032020-180', 'WALF FM', 54, NULL),
(181, 'TS032020-181', 'VIBE RADIO', 54, NULL),
(182, 'TS032020-182', 'I RADIO', 54, NULL),
(183, 'TS032020-183', 'RFI', 54, NULL),
(184, 'TS032020-184', 'LAMP FALL', 54, NULL),
(185, 'TS032020-185', 'TRACE FM', 54, NULL),
(186, 'TS032020-186', 'LAMP FALL TOUBA', 54, NULL),
(187, 'TS032020-187', 'AL FAYDA KAOLACK', 54, NULL),
(188, 'TS032020-188', 'TERANGA FM ST LOUIS', 54, NULL),
(189, 'TS032020-189', 'CARREFOUR FM LOUGA', 54, NULL),
(190, 'TS032020-190', 'MBOUR FM', 54, NULL),
(191, 'TS032020-191', 'BEST FM THIES', 54, NULL),
(192, 'TS032020-192', 'KEDOUGOU FM', 54, NULL),
(193, 'TS032020-193', 'ZIK FM ZIGINCHOR', 54, NULL),
(194, 'TS032020-194', 'ALKUMA FM TAMBA', 54, NULL),
(195, 'TS032020-195', 'URAC', 54, NULL),
(196, 'TS032020-196', 'JEUNE AFRIQUE', 55, NULL),
(197, 'TS032020-197', 'REUSSIR', 55, NULL),
(198, 'TS032020-198', 'MOOV IN DAK', 55, NULL),
(199, 'TS032020-199', 'INTELLIGENCE', 55, NULL),
(200, 'TS032020-200', 'Location 12 m² Dakar & Banlieue', 56, NULL),
(201, 'TS032020-201', 'Location 12 m² Dakar ', 56, NULL),
(202, 'TS032020-202', 'Location Oriflamme', 56, NULL),
(203, 'TS032020-203', 'Location Abribus', 56, NULL),
(204, 'TS032020-204', 'Location Big size', 56, NULL),
(205, 'TS032020-205', 'Location Taxi', 56, NULL),
(206, 'TS032020-206', 'divers', 57, NULL),
(233, 'TS022022-207', 'RARE', 38, 'RARE'),
(234, 'TS022022-207', 'NN', 33, 'NN'),
(235, 'TS022022-207', 'DESCRIPTIF', 33, 'DESCRIPTIF'),
(236, 'TS022022-207', 'zero', 67, 'zero'),
(237, 'TS022022-207', 'UN', 67, 'UN'),
(238, 'TS022022-207', 'DEUX', 67, 'DEUX'),
(239, 'TS022022-207', 'DEUX2', 67, 'DEUX2'),
(240, 'TS022022-207', 'TROIS', 67, 'TROIS'),
(241, 'TS022022-207', 'qatre', 67, 'qatre'),
(242, 'TS022022-207', 'clair', 71, 'clair'),
(243, 'TS022022-207', '3D', 47, '3D'),
(244, 'TS022022-207', '4D', 47, '4D'),
(245, 'TS022022-207', 'rose', 70, 'rose'),
(246, 'TS022022-207', 'eau', 79, 'eau'),
(247, 'TS022022-207', 'cinq', 67, 'cinq'),
(248, 'TS022022-207', 'sept', 67, 'sept'),
(249, 'TS022022-207', 'JOUER', 62, 'JOUER'),
(250, 'TS022022-207', 'dix', 67, 'dix'),
(251, 'TS022022-207', 'onze', 67, 'onze'),
(252, 'TS022022-207', 'yyyyy', 70, 'yyy'),
(253, 'TS022022-207', 'ZZZZZzzz', 70, 'zzz'),
(254, 'TS022022-207', 'REDRED', 71, 'RED'),
(255, 'TS022022-207', 'bl', 72, 'bl'),
(256, 'TS022022-207', 'yellow', 71, 'yellow'),
(257, 'TS022022-207', 'nokia', 80, 'nokia'),
(258, 'TS022022-207', 'fm', 74, 'fm'),
(259, 'TS022022-207', 'vase', 57, 'vase'),
(260, 'TS022022-207', 'SERVICE', 38, 'SERVICE'),
(261, 'TS022022-207', 'VALEUR', 57, 'VALEUR'),
(262, 'TS022022-207', 'PPPF', 38, 'PPPF'),
(263, 'TS022022-207', 'PDF', 38, 'PDF'),
(264, 'TS022022-207', 'PLM', 38, 'pLM'),
(265, 'TS022022-207', 'TINA', 82, 'TINA'),
(266, 'TS022022-207', 'MAK', 82, 'MAK');

-- --------------------------------------------------------

--
-- Structure de la table `typetaxe`
--

CREATE TABLE `typetaxe` (
  `idTypetaxe` int(11) NOT NULL,
  `libelle` varchar(300) NOT NULL,
  `valeur` varchar(80) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typetaxe`
--

INSERT INTO `typetaxe` (`idTypetaxe`, `libelle`, `valeur`, `dateAjout`, `etat`) VALUES
(1, 'HTVA', '0', '2019-02-09 20:19:57', 1),
(2, 'TVA', '18', '2019-02-09 20:19:57', 1),
(3, 'BRS', '5', '2019-02-11 08:39:58', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `prenom` varchar(80) DEFAULT NULL,
  `nom` varchar(80) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `idRole` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `password`, `prenom`, `nom`, `telephone`, `adresse`, `idRole`, `idAgence`, `photo`) VALUES
(1, 'admi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Mody', 'KANE', '77 123 45 67', 'Dakar', 2, 1, 'dist/img/users/langfr-280px-Africa_(orthographic_projection).svg.png'),
(5, 'kanebi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Amadou', 'KANE', '771111111', 'Dakar', 3, 1, 'dist/img/users/20180505195816avatar.png'),
(6, 'mndoye@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Marieme', 'NDOYE', '1221111', 'Dakar', 4, 1, 'dist/img/users/nature_slovenia_s.jpg'),
(14, 'nagib@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib', 'Atti&eacute;', '77 638 12 53', 'caratere', 1, 1, ''),
(18, 'diarra@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Diarra', 'Diallo', '77 333 73 54', 'caract&eacute;re', 1, 1, NULL),
(19, 'binta@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Binta Daubry', 'Diallo', '77 865 41 72', 'caractere', 1, 1, NULL),
(20, 'moustapha@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Moustapha', 'Diop', '77 099 50 08', 'caract&eacute;re', 1, 1, NULL),
(21, 'ndeye.rokhaya@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nd&egrave;ye Rokhaya', 'Diop ', '78 129 51 11', 'caract&eacute;re', 1, 1, NULL),
(22, 'ali@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Ali', 'Diouf', '78 177 51 73', 'caract&eacute;re', 1, 1, NULL),
(23, 'lena@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'L&eacute;na', 'Kane', '78 129 50 57', 'caract&eacute;re', 1, 1, NULL),
(24, 'clemence@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Cl&eacute;mence', 'Lefranc', '77462 07 45', 'caract&eacute;re', 1, 1, NULL),
(25, 'zeinab@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Zeynab', 'Mamoudou', '78 177 70 54', 'caract&eacute;re', 1, 1, NULL),
(28, 'fatoumata@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Fatoumata', 'Traor&eacute;', '77 865 41 38', 'caract&eacute;re', 1, 1, NULL),
(29, 'nagib.attie@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib', 'Atti&eacute;', '77 638 12 53', 'caract&eacute;re', 2, 1, NULL),
(30, 'dc.nagib.attie@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib', 'Atti&eacute;', '77 638 12 53', 'caract&eacute;re', 3, 1, NULL),
(33, 'moussa@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Moussa', 'Boye', '78 162 01 90', 'caract&eacute;re', 9, 1, NULL),
(34, 'isabelle@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Isabelle', 'Monteiro', '77 865 41 86', 'caract&eacute;re', 9, 1, NULL),
(35, 'ahmadou@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Ahmadou', 'Sidib&eacute;', '77 740 30 17', 'caract&eacute;re', 9, 1, NULL),
(37, 'daf.nagib.attie@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib', 'Attie', '770000000', 'Caractere', 4, 1, NULL),
(38, 'patricia@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Patricia', 'ABED', '775690358', 'caractere caractere', 2, 1, 'dist/img/users/AVATAR.jfif');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vcontact`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vcontact` (
`idContact` int(11)
,`nom` varchar(80)
,`prenom` varchar(80)
,`telephone` varchar(80)
,`email` varchar(80)
,`idClient` int(11)
,`idUser` int(11)
,`dateAjout` timestamp
,`etat` int(11)
,`nomClient` varchar(80)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vdevis`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vdevis` (
`idDevis` int(11)
,`idFournisseur` int(11)
,`nomFournisseur` varchar(80)
,`prenomFournisseur` varchar(80)
,`numeroDevis` varchar(80)
,`contact` text
,`objet` text
,`campagne` text
,`commissionProduction` varchar(80)
,`taxeMunicipale` varchar(80)
,`hasRemise` int(11)
,`typeRemise` varchar(80)
,`valeurRemise` varchar(80)
,`conditionPaiement` varchar(300)
,`commentaire` text
,`idResponsable` int(11)
,`idClient` int(11)
,`idTypetaxe` int(11)
,`idAgence` int(11)
,`idTypedevis` int(11)
,`idEtat` int(11)
,`idValideur` int(11)
,`dateAjout` timestamp
,`etat` int(11)
,`nomClient` varchar(80)
,`prenomClient` varchar(80)
,`adresseClient` text
,`emailClient` varchar(80)
,`telephoneClient` varchar(80)
,`paysClient` varchar(80)
,`photoClient` text
,`agence` varchar(250)
,`siege` text
,`fax` varchar(30)
,`email` varchar(30)
,`site` varchar(30)
,`ninea` varchar(30)
,`rc` varchar(30)
,`logo` varchar(150)
,`libelle` varchar(300)
,`valeur` varchar(80)
,`emailAuteur` varchar(80)
,`nom` varchar(80)
,`idRole` int(11)
,`role` varchar(25)
,`prenom` varchar(80)
,`telephone` varchar(20)
,`adresse` text
,`montantDevis` double
,`montantDevisAchat` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vdevis2`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vdevis2` (
`idDevis` int(11)
,`numeroDevis` varchar(80)
,`contact` text
,`objet` text
,`campagne` text
,`commissionProduction` varchar(80)
,`taxeMunicipale` varchar(80)
,`hasRemise` int(11)
,`typeRemise` varchar(80)
,`valeurRemise` varchar(80)
,`conditionPaiement` varchar(300)
,`commentaire` text
,`idResponsable` int(11)
,`idClient` int(11)
,`idTypetaxe` int(11)
,`idAgence` int(11)
,`idTypedevis` int(11)
,`idEtat` int(11)
,`idValideur` int(11)
,`dateAjout` timestamp
,`etat` int(11)
,`nomClient` varchar(80)
,`prenomClient` varchar(80)
,`adresseClient` text
,`emailClient` varchar(80)
,`telephoneClient` varchar(80)
,`paysClient` varchar(80)
,`photoClient` text
,`agence` varchar(250)
,`siege` text
,`fax` varchar(30)
,`email` varchar(30)
,`site` varchar(30)
,`ninea` varchar(30)
,`rc` varchar(30)
,`logo` varchar(150)
,`libelle` varchar(300)
,`valeur` varchar(80)
,`emailAuteur` varchar(80)
,`nom` varchar(80)
,`idRole` int(11)
,`role` varchar(25)
,`prenom` varchar(80)
,`telephone` varchar(20)
,`adresse` text
,`montantDevis` double
,`montantDevisAchat` double
,`rubriques` mediumtext
,`familles` mediumtext
,`typeservices` mediumtext
,`services` mediumtext
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vdeviscommente`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vdeviscommente` (
`idDeviscommente` int(11)
,`idDevis` int(11)
,`idUser` int(11)
,`idDestinataire` int(11)
,`contenu` text
,`dateAjout` timestamp
,`etat` int(11)
,`prenom` varchar(80)
,`nom` varchar(80)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vfacture`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vfacture` (
`idDevis` int(11)
,`numeroDevis` varchar(80)
,`contact` text
,`objet` text
,`campagne` text
,`commissionProduction` varchar(80)
,`taxeMunicipale` varchar(80)
,`hasRemise` int(11)
,`typeRemise` varchar(80)
,`valeurRemise` varchar(80)
,`conditionPaiement` varchar(300)
,`commentaire` text
,`idResponsable` int(11)
,`idClient` int(11)
,`idTypetaxe` int(11)
,`idAgence` int(11)
,`idTypedevis` int(11)
,`idEtat` int(11)
,`idValideur` int(11)
,`dateAjout` timestamp
,`etat` int(11)
,`nomClient` varchar(80)
,`prenomClient` varchar(80)
,`adresseClient` text
,`emailClient` varchar(80)
,`telephoneClient` varchar(80)
,`paysClient` varchar(80)
,`photoClient` text
,`agence` varchar(250)
,`siege` text
,`fax` varchar(30)
,`email` varchar(30)
,`site` varchar(30)
,`ninea` varchar(30)
,`rc` varchar(30)
,`logo` varchar(150)
,`libelle` varchar(300)
,`valeur` varchar(80)
,`emailAuteur` varchar(80)
,`nom` varchar(80)
,`idRole` int(11)
,`role` varchar(25)
,`prenom` varchar(80)
,`telephone` varchar(20)
,`adresse` text
,`montantDevis` double
,`montantDevisAchat` double
,`numeroFacture` varchar(80)
,`destinataire` text
,`dateFacture` datetime
,`accompte` varchar(80)
,`numBc` varchar(80)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vfamille`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vfamille` (
`idFamille` int(11)
,`famille` text
,`description` text
,`idRubrique` int(11)
,`dateAjout` timestamp
,`etat` int(11)
,`rubrique` varchar(250)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vrubrique`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vrubrique` (
`idDevis` int(11)
,`idTypeservice` int(11)
,`idRubrique` int(11)
,`rubrique` varchar(250)
,`typeService` varchar(300)
,`hasPrice` int(11)
,`somme` double
,`sommeAchat` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtypeservice`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vtypeservice` (
`idTypeservice` int(11)
,`referenceTypeservice` varchar(250)
,`typeService` varchar(300)
,`idFamille` int(11)
,`description` text
,`famille` text
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vuser`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vuser` (
`idUser` int(11)
,`email` varchar(80)
,`password` text
,`prenom` varchar(80)
,`nom` varchar(80)
,`telephone` varchar(20)
,`adresse` text
,`idRole` int(11)
,`idAgence` int(11)
,`photo` text
,`profil` varchar(25)
,`agence` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vcontact`
--
DROP TABLE IF EXISTS `vcontact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcontact`  AS SELECT `c`.`idContact` AS `idContact`, `c`.`nom` AS `nom`, `c`.`prenom` AS `prenom`, `c`.`telephone` AS `telephone`, `c`.`email` AS `email`, `c`.`idClient` AS `idClient`, `c`.`idUser` AS `idUser`, `c`.`dateAjout` AS `dateAjout`, `c`.`etat` AS `etat`, `cl`.`nomClient` AS `nomClient` FROM (`contact` `c` join `client` `cl`) WHERE `c`.`idClient` = `cl`.`idClient` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdevis`
--
DROP TABLE IF EXISTS `vdevis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdevis`  AS SELECT `d`.`idDevis` AS `idDevis`, `d`.`idFournisseur` AS `idFournisseur`, `d`.`nomFournisseur` AS `nomFournisseur`, `d`.`prenomFournisseur` AS `prenomFournisseur`, `d`.`numeroDevis` AS `numeroDevis`, `d`.`contact` AS `contact`, `d`.`objet` AS `objet`, `d`.`campagne` AS `campagne`, `d`.`commissionProduction` AS `commissionProduction`, `d`.`taxeMunicipale` AS `taxeMunicipale`, `d`.`hasRemise` AS `hasRemise`, `d`.`typeRemise` AS `typeRemise`, `d`.`valeurRemise` AS `valeurRemise`, `d`.`conditionPaiement` AS `conditionPaiement`, `d`.`commentaire` AS `commentaire`, `d`.`idResponsable` AS `idResponsable`, `d`.`idClient` AS `idClient`, `d`.`idTypetaxe` AS `idTypetaxe`, `d`.`idAgence` AS `idAgence`, `d`.`idTypedevis` AS `idTypedevis`, `d`.`idEtat` AS `idEtat`, `d`.`idValideur` AS `idValideur`, `d`.`dateAjout` AS `dateAjout`, `d`.`etat` AS `etat`, `c`.`nomClient` AS `nomClient`, `c`.`prenomClient` AS `prenomClient`, `c`.`adresseClient` AS `adresseClient`, `c`.`emailClient` AS `emailClient`, `c`.`telephoneClient` AS `telephoneClient`, `c`.`paysClient` AS `paysClient`, `c`.`photoClient` AS `photoClient`, `a`.`agence` AS `agence`, `a`.`siege` AS `siege`, `a`.`fax` AS `fax`, `a`.`email` AS `email`, `a`.`site` AS `site`, `a`.`ninea` AS `ninea`, `a`.`rc` AS `rc`, `a`.`logo` AS `logo`, `t`.`libelle` AS `libelle`, `t`.`valeur` AS `valeur`, `u`.`email` AS `emailAuteur`, `u`.`nom` AS `nom`, `u`.`idRole` AS `idRole`, `r`.`libelle` AS `role`, `u`.`prenom` AS `prenom`, `u`.`telephone` AS `telephone`, `u`.`adresse` AS `adresse`, (select sum(if(`dt`.`hasPrice` = 1,(select sum(`detailstypeservice`.`prixVente` * `detailstypeservice`.`quantite`) from `detailstypeservice` where `detailstypeservice`.`idTypeservice` = `dt`.`idTypeservice` and `detailstypeservice`.`idDevis` = `d`.`idDevis` group by `detailstypeservice`.`idDevis`),(select sum(`detailsdevis`.`prixVente` * `detailsdevis`.`quantite`) from `detailsdevis` where `detailsdevis`.`idTypeservice` = `dt`.`idTypeservice` and `detailsdevis`.`idDevis` = `d`.`idDevis` group by `detailsdevis`.`idDevis`)))) AS `montantDevis`, (select sum(if(`dt`.`hasPrice` = 1,(select sum(`detailstypeservice`.`prixAchat` * `detailstypeservice`.`quantite`) from `detailstypeservice` where `detailstypeservice`.`idTypeservice` = `dt`.`idTypeservice` and `detailstypeservice`.`idDevis` = `d`.`idDevis` group by `detailstypeservice`.`idDevis`),(select sum(`detailsdevis`.`prixAchat` * `detailsdevis`.`quantite`) from `detailsdevis` where `detailsdevis`.`idTypeservice` = `dt`.`idTypeservice` and `detailsdevis`.`idDevis` = `d`.`idDevis` group by `detailsdevis`.`idDevis`)))) AS `montantDevisAchat` FROM ((((((`devis` `d` join `client` `c`) join `agence` `a`) join `typetaxe` `t`) join `user` `u`) join `detailstypeservice` `dt`) join `role` `r`) WHERE `d`.`idClient` = `c`.`idClient` AND `d`.`idTypetaxe` = `t`.`idTypetaxe` AND `d`.`idAgence` = `a`.`idAgence` AND `d`.`idResponsable` = `u`.`idUser` AND `dt`.`idDevis` = `d`.`idDevis` AND `r`.`idRole` = `u`.`idRole` GROUP BY `d`.`idDevis` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdevis2`
--
DROP TABLE IF EXISTS `vdevis2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdevis2`  AS SELECT `v`.`idDevis` AS `idDevis`, `v`.`numeroDevis` AS `numeroDevis`, `v`.`contact` AS `contact`, `v`.`objet` AS `objet`, `v`.`campagne` AS `campagne`, `v`.`commissionProduction` AS `commissionProduction`, `v`.`taxeMunicipale` AS `taxeMunicipale`, `v`.`hasRemise` AS `hasRemise`, `v`.`typeRemise` AS `typeRemise`, `v`.`valeurRemise` AS `valeurRemise`, `v`.`conditionPaiement` AS `conditionPaiement`, `v`.`commentaire` AS `commentaire`, `v`.`idResponsable` AS `idResponsable`, `v`.`idClient` AS `idClient`, `v`.`idTypetaxe` AS `idTypetaxe`, `v`.`idAgence` AS `idAgence`, `v`.`idTypedevis` AS `idTypedevis`, `v`.`idEtat` AS `idEtat`, `v`.`idValideur` AS `idValideur`, `v`.`dateAjout` AS `dateAjout`, `v`.`etat` AS `etat`, `v`.`nomClient` AS `nomClient`, `v`.`prenomClient` AS `prenomClient`, `v`.`adresseClient` AS `adresseClient`, `v`.`emailClient` AS `emailClient`, `v`.`telephoneClient` AS `telephoneClient`, `v`.`paysClient` AS `paysClient`, `v`.`photoClient` AS `photoClient`, `v`.`agence` AS `agence`, `v`.`siege` AS `siege`, `v`.`fax` AS `fax`, `v`.`email` AS `email`, `v`.`site` AS `site`, `v`.`ninea` AS `ninea`, `v`.`rc` AS `rc`, `v`.`logo` AS `logo`, `v`.`libelle` AS `libelle`, `v`.`valeur` AS `valeur`, `v`.`emailAuteur` AS `emailAuteur`, `v`.`nom` AS `nom`, `v`.`idRole` AS `idRole`, `v`.`role` AS `role`, `v`.`prenom` AS `prenom`, `v`.`telephone` AS `telephone`, `v`.`adresse` AS `adresse`, `v`.`montantDevis` AS `montantDevis`, `v`.`montantDevisAchat` AS `montantDevisAchat`, (select group_concat(`rubrique`.`rubrique` separator ',') from `rubrique` where `rubrique`.`idRubrique` in (select `detailsdevis`.`idRubrique` from `detailsdevis` where `detailsdevis`.`idDevis` = `v`.`idDevis`)) AS `rubriques`, (select group_concat(`famille`.`famille` separator ',') from `famille` where `famille`.`idFamille` in (select `detailsdevis`.`idFamille` from `detailsdevis` where `detailsdevis`.`idDevis` = `v`.`idDevis`)) AS `familles`, (select group_concat(`typeservice`.`typeService` separator ',') from `typeservice` where `typeservice`.`idTypeservice` in (select `detailsdevis`.`idTypeservice` from `detailsdevis` where `detailsdevis`.`idDevis` = `v`.`idDevis`)) AS `typeservices`, (select group_concat(`service`.`service` separator ',') from `service` where `service`.`idService` in (select `detailsdevis`.`idService` from `detailsdevis` where `detailsdevis`.`idDevis` = `v`.`idDevis`)) AS `services` FROM `vdevis` AS `v` WHERE 1 ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdeviscommente`
--
DROP TABLE IF EXISTS `vdeviscommente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdeviscommente`  AS SELECT `d`.`idDeviscommente` AS `idDeviscommente`, `d`.`idDevis` AS `idDevis`, `d`.`idUser` AS `idUser`, `d`.`idDestinataire` AS `idDestinataire`, `d`.`contenu` AS `contenu`, `d`.`dateAjout` AS `dateAjout`, `d`.`etat` AS `etat`, `u`.`prenom` AS `prenom`, `u`.`nom` AS `nom` FROM (`deviscommente` `d` join `user` `u`) WHERE `d`.`idUser` = `u`.`idUser` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vfacture`
--
DROP TABLE IF EXISTS `vfacture`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfacture`  AS SELECT `v`.`idDevis` AS `idDevis`, `v`.`numeroDevis` AS `numeroDevis`, `v`.`contact` AS `contact`, `v`.`objet` AS `objet`, `v`.`campagne` AS `campagne`, `v`.`commissionProduction` AS `commissionProduction`, `v`.`taxeMunicipale` AS `taxeMunicipale`, `v`.`hasRemise` AS `hasRemise`, `v`.`typeRemise` AS `typeRemise`, `v`.`valeurRemise` AS `valeurRemise`, `v`.`conditionPaiement` AS `conditionPaiement`, `v`.`commentaire` AS `commentaire`, `v`.`idResponsable` AS `idResponsable`, `v`.`idClient` AS `idClient`, `v`.`idTypetaxe` AS `idTypetaxe`, `v`.`idAgence` AS `idAgence`, `v`.`idTypedevis` AS `idTypedevis`, `v`.`idEtat` AS `idEtat`, `v`.`idValideur` AS `idValideur`, `v`.`dateAjout` AS `dateAjout`, `v`.`etat` AS `etat`, `v`.`nomClient` AS `nomClient`, `v`.`prenomClient` AS `prenomClient`, `v`.`adresseClient` AS `adresseClient`, `v`.`emailClient` AS `emailClient`, `v`.`telephoneClient` AS `telephoneClient`, `v`.`paysClient` AS `paysClient`, `v`.`photoClient` AS `photoClient`, `v`.`agence` AS `agence`, `v`.`siege` AS `siege`, `v`.`fax` AS `fax`, `v`.`email` AS `email`, `v`.`site` AS `site`, `v`.`ninea` AS `ninea`, `v`.`rc` AS `rc`, `v`.`logo` AS `logo`, `v`.`libelle` AS `libelle`, `v`.`valeur` AS `valeur`, `v`.`emailAuteur` AS `emailAuteur`, `v`.`nom` AS `nom`, `v`.`idRole` AS `idRole`, `v`.`role` AS `role`, `v`.`prenom` AS `prenom`, `v`.`telephone` AS `telephone`, `v`.`adresse` AS `adresse`, `v`.`montantDevis` AS `montantDevis`, `v`.`montantDevisAchat` AS `montantDevisAchat`, `f`.`numeroFacture` AS `numeroFacture`, `f`.`destinataire` AS `destinataire`, str_to_date(`f`.`dateFacture`,'%d/%m/%Y %r') AS `dateFacture`, `f`.`accompte` AS `accompte`, `d`.`numBc` AS `numBc` FROM ((`vdevis` `v` join `facture` `f`) join `devisbc` `d`) WHERE `v`.`idDevis` = `f`.`idDevis` AND `v`.`idDevis` = `d`.`idDevis` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vfamille`
--
DROP TABLE IF EXISTS `vfamille`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfamille`  AS SELECT `f`.`idFamille` AS `idFamille`, `f`.`famille` AS `famille`, `f`.`description` AS `description`, `f`.`idRubrique` AS `idRubrique`, `f`.`dateAjout` AS `dateAjout`, `f`.`etat` AS `etat`, `r`.`rubrique` AS `rubrique` FROM (`famille` `f` join `rubrique` `r`) WHERE `f`.`idRubrique` = `r`.`idRubrique` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vrubrique`
--
DROP TABLE IF EXISTS `vrubrique`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrubrique`  AS SELECT `d`.`idDevis` AS `idDevis`, `t`.`idTypeservice` AS `idTypeservice`, `r`.`idRubrique` AS `idRubrique`, `r`.`rubrique` AS `rubrique`, (select `typeservice`.`typeService` from `typeservice` where `typeservice`.`idTypeservice` = `t`.`idTypeservice`) AS `typeService`, `t`.`hasPrice` AS `hasPrice`, if(`t`.`hasPrice` = 1,(select `detailstypeservice`.`prixVente` * `detailstypeservice`.`quantite` from `detailstypeservice` where `detailstypeservice`.`idTypeservice` = `t`.`idTypeservice` and `detailstypeservice`.`idRubrique` = `r`.`idRubrique` and `detailstypeservice`.`idDevis` = `d`.`idDevis`),(select sum(`detailsdevis`.`prixVente` * `detailsdevis`.`quantite`) from `detailsdevis` where `detailsdevis`.`idTypeservice` = `t`.`idTypeservice` and `detailsdevis`.`idRubrique` = `r`.`idRubrique` and `detailsdevis`.`idDevis` = `d`.`idDevis`)) AS `somme`, if(`t`.`hasPrice` = 1,(select `detailstypeservice`.`prixAchat` * `detailstypeservice`.`quantite` from `detailstypeservice` where `detailstypeservice`.`idTypeservice` = `t`.`idTypeservice` and `detailstypeservice`.`idRubrique` = `r`.`idRubrique` and `detailstypeservice`.`idDevis` = `d`.`idDevis`),(select sum(`detailsdevis`.`prixAchat` * `detailsdevis`.`quantite`) from `detailsdevis` where `detailsdevis`.`idTypeservice` = `t`.`idTypeservice` and `detailsdevis`.`idRubrique` = `r`.`idRubrique` and `detailsdevis`.`idDevis` = `d`.`idDevis`)) AS `sommeAchat` FROM ((`detailstypeservice` `t` join `rubrique` `r`) join `devis` `d`) WHERE `r`.`idRubrique` = `t`.`idRubrique` AND `d`.`idDevis` = `t`.`idDevis` AND `t`.`idTypeservice` in (select `detailsdevis`.`idTypeservice` from `detailsdevis` where `detailsdevis`.`idRubrique` = `r`.`idRubrique`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vtypeservice`
--
DROP TABLE IF EXISTS `vtypeservice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtypeservice`  AS SELECT `t`.`idTypeservice` AS `idTypeservice`, `t`.`referenceTypeservice` AS `referenceTypeservice`, `t`.`typeService` AS `typeService`, `t`.`idFamille` AS `idFamille`, `t`.`description` AS `description`, `f`.`famille` AS `famille` FROM (`typeservice` `t` join `famille` `f`) WHERE `t`.`idFamille` = `f`.`idFamille` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vuser`
--
DROP TABLE IF EXISTS `vuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuser`  AS SELECT `u`.`idUser` AS `idUser`, `u`.`email` AS `email`, `u`.`password` AS `password`, `u`.`prenom` AS `prenom`, `u`.`nom` AS `nom`, `u`.`telephone` AS `telephone`, `u`.`adresse` AS `adresse`, `u`.`idRole` AS `idRole`, `u`.`idAgence` AS `idAgence`, `u`.`photo` AS `photo`, `r`.`libelle` AS `profil`, `a`.`agence` AS `agence` FROM ((`user` `u` join `role` `r`) join `agence` `a`) WHERE `u`.`idRole` = `r`.`idRole` AND `u`.`idAgence` = `a`.`idAgence` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`idAgence`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `detailsdevis`
--
ALTER TABLE `detailsdevis`
  ADD PRIMARY KEY (`idDetailsdevis`),
  ADD KEY `idDevis` (`idDevis`),
  ADD KEY `idDevis_2` (`idDevis`);

--
-- Index pour la table `detailstypeservice`
--
ALTER TABLE `detailstypeservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRubrique` (`idRubrique`,`idTypeservice`,`idDevis`),
  ADD KEY `idDevis` (`idDevis`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`idDevis`);

--
-- Index pour la table `devisannule`
--
ALTER TABLE `devisannule`
  ADD PRIMARY KEY (`idDevisannule`),
  ADD KEY `idDevis` (`idDevis`);

--
-- Index pour la table `devisbc`
--
ALTER TABLE `devisbc`
  ADD PRIMARY KEY (`idDevisbc`),
  ADD KEY `idDevis` (`idDevis`);

--
-- Index pour la table `deviscommente`
--
ALTER TABLE `deviscommente`
  ADD PRIMARY KEY (`idDeviscommente`),
  ADD KEY `idDevis` (`idDevis`);

--
-- Index pour la table `devislivre`
--
ALTER TABLE `devislivre`
  ADD PRIMARY KEY (`idDevislivre`),
  ADD KEY `idDevis` (`idDevis`);

--
-- Index pour la table `devisvalideclient`
--
ALTER TABLE `devisvalideclient`
  ADD PRIMARY KEY (`idDevisvalideclient`),
  ADD KEY `idDevis` (`idDevis`);

--
-- Index pour la table `devisvalideresponsable`
--
ALTER TABLE `devisvalideresponsable`
  ADD PRIMARY KEY (`idDevisvalideresponsable`),
  ADD KEY `idDevis` (`idDevis`,`idUser`),
  ADD KEY `idDevis_2` (`idDevis`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`idDroit`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`idEtat`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idFacture`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`idFamille`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`idFournisseur`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `role_droit`
--
ALTER TABLE `role_droit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`idRubrique`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- Index pour la table `typedevis`
--
ALTER TABLE `typedevis`
  ADD PRIMARY KEY (`idTypedevis`);

--
-- Index pour la table `typefacture`
--
ALTER TABLE `typefacture`
  ADD PRIMARY KEY (`idTypefacture`);

--
-- Index pour la table `typeservice`
--
ALTER TABLE `typeservice`
  ADD PRIMARY KEY (`idTypeservice`),
  ADD KEY `idFamille` (`idFamille`);

--
-- Index pour la table `typetaxe`
--
ALTER TABLE `typetaxe`
  ADD PRIMARY KEY (`idTypetaxe`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `idAgence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4259;

--
-- AUTO_INCREMENT pour la table `detailsdevis`
--
ALTER TABLE `detailsdevis`
  MODIFY `idDetailsdevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT pour la table `detailstypeservice`
--
ALTER TABLE `detailstypeservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `idDevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `devisannule`
--
ALTER TABLE `devisannule`
  MODIFY `idDevisannule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `devisbc`
--
ALTER TABLE `devisbc`
  MODIFY `idDevisbc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `deviscommente`
--
ALTER TABLE `deviscommente`
  MODIFY `idDeviscommente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `devislivre`
--
ALTER TABLE `devislivre`
  MODIFY `idDevislivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `devisvalideclient`
--
ALTER TABLE `devisvalideclient`
  MODIFY `idDevisvalideclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `devisvalideresponsable`
--
ALTER TABLE `devisvalideresponsable`
  MODIFY `idDevisvalideresponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `idDroit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `idEtat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idFacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `idFamille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `idFournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1646;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `role_droit`
--
ALTER TABLE `role_droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rubrique`
--
ALTER TABLE `rubrique`
  MODIFY `idRubrique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT pour la table `typedevis`
--
ALTER TABLE `typedevis`
  MODIFY `idTypedevis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typefacture`
--
ALTER TABLE `typefacture`
  MODIFY `idTypefacture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typeservice`
--
ALTER TABLE `typeservice`
  MODIFY `idTypeservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT pour la table `typetaxe`
--
ALTER TABLE `typetaxe`
  MODIFY `idTypetaxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detailsdevis`
--
ALTER TABLE `detailsdevis`
  ADD CONSTRAINT `detailsdevis_ibfk_1` FOREIGN KEY (`idDevis`) REFERENCES `devis` (`idDevis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `devisannule`
--
ALTER TABLE `devisannule`
  ADD CONSTRAINT `devisannule_ibfk_1` FOREIGN KEY (`idDevis`) REFERENCES `devis` (`idDevis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
