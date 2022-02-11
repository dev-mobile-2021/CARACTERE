-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : htsoftdeuzcaract.mysql.db
-- Généré le : jeu. 25 nov. 2021 à 12:29
-- Version du serveur : 5.6.50-log
-- Version de PHP : 7.4.25

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
CREATE DATABASE IF NOT EXISTS `htsoftdeuzcaract` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `htsoftdeuzcaract`;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `idAgence` int(11) NOT NULL,
  `agence` varchar(250) DEFAULT NULL,
  `siege` text,
  `tel` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL,
  `ninea` varchar(30) DEFAULT NULL,
  `rc` varchar(30) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `devisPiedconcl` text,
  `devisPiednta` text,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `prenomClient` varchar(80) DEFAULT NULL,
  `nomClient` varchar(80) DEFAULT NULL,
  `adresseClient` text,
  `paysClient` varchar(80) DEFAULT NULL,
  `telephoneClient` varchar(80) DEFAULT NULL,
  `emailClient` varchar(80) DEFAULT NULL,
  `photoClient` text,
  `dateAjout` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `prenomClient`, `nomClient`, `adresseClient`, `paysClient`, `telephoneClient`, `emailClient`, `photoClient`, `dateAjout`, `etat`) VALUES
(1, '', 'Agroline', 'Dakar', 'S&eacute;n&eacute;gal', '771500440', 'agroline@gmail.com', 'dist/img/clients/20204_90.png', '2020-07-24 15:01:10', 1),
(2, '', 'CIES', 'Dakar', 'S&eacute;n&eacute;gal', '771234567', 'cies@gmail.com', 'dist/img/clients/20026_90.png', '2020-07-24 15:01:14', 1),
(3, '', 'Siagro Kir&egrave;ne', 'Pikine', 'S&eacute;n&eacute;gal', '771111111', 'siagro@gmail.com', '', '2020-07-24 15:01:36', 1),
(4, '', 'Orange S&eacute;n&eacute;gal', '64, VDN, Dakar - S&eacute;n&eacute;gal', 'S&eacute;n&eacute;gal', '77 000 00 00', 'orange@orange.sn', 'dist/img/clients/', '2020-07-24 15:01:32', 1),
(5, '', 'Kir&egrave;ne avec Orange', 'Dakar', 'S&eacute;n&eacute;gal', '771111111', 'orange@orange.sn', 'dist/img/clients/', '2020-07-24 15:01:26', 1),
(6, '', 'Woodside', 'Dakar', 'S&eacute;n&eacute;gal', '771111111', 'woodside@gmail.com', 'dist/img/clients/', '2020-07-24 15:01:40', 1),
(7, '', 'Damag Casino', 'Dakar', 'S&eacute;n&eacute;gal', '771111111', 'damag@gmail.com', 'dist/img/clients/', '2020-07-24 15:01:21', 1);

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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nom`, `prenom`, `telephone`, `email`, `idClient`, `idUser`, `dateAjout`, `etat`) VALUES
(1, 'KOSSI ', 'Roland', '0781586996', 'rolandkossi.kossi@gmail.com', 4, 1, '2019-04-16 09:01:02', 1),
(2, 'Badara Dia', 'Alioune', '781542356', '', 4, 1, '2019-12-13 15:04:57', 1),
(3, ' Kaddoura', 'Nadia', '771111111', '', 3, 12, '2019-12-23 08:37:41', 1),
(4, ' Attieh', 'Samy', '771111112', '', 1, 1, '2019-12-23 08:38:49', 1),
(5, ' Barth', 'J&eacute;r&ocirc;me', '771111113', '', 2, 12, '2019-12-23 08:39:26', 1),
(6, ' Julienne', 'Linda', '771111114', '', 5, 1, '2019-12-23 08:40:10', 1),
(7, ' Wirtz', 'Nicolas', '771111115', '', 6, 1, '2019-12-23 08:40:37', 1),
(8, 'Petit', 'Christophe', '771111116', '', 7, 1, '2019-12-23 08:41:12', 1);

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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailsdevis`
--

INSERT INTO `detailsdevis` (`idDetailsdevis`, `idDevis`, `idRubrique`, `idFamille`, `idTypeservice`, `idService`, `prixAchat`, `prixVente`, `quantite`, `dateAjout`, `etat`) VALUES
(2, 1, 1, 1, 3, 2, '5000', '5000', '1', '2021-11-23 12:57:28', 1),
(3, 2, 1, 2, 5, 0, '0', '0', '0', '2021-11-23 13:07:11', 1);

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

--
-- Déchargement des données de la table `detailstypeservice`
--

INSERT INTO `detailstypeservice` (`id`, `idRubrique`, `idFamille`, `idTypeservice`, `idDevis`, `hasComment`, `commentaire`, `hasPrice`, `prixAchat`, `prixVente`, `quantite`, `etat`) VALUES
(26, 1, 1, 1, 7, 1, 'Fournisseur 1', 1, '200', '500', '50', 1),
(27, 1, 1, 1, 8, 2, '', 1, '', '450', '12', 1),
(28, 1, 1, 2, 8, 2, '', 1, '', '500', '10', 1),
(29, 1, 2, 8, 8, 2, '', 1, '', '50000', '5', 1),
(30, 1, 1, 14, 8, 2, '', 2, '0', '0', '0', 1),
(31, 1, 1, 1, 9, 2, '', 1, '', '8500', '1', 1),
(42, 2, 2, 6, 9, 2, '', 2, '0', '0', '0', 1),
(45, 1, 4, 19, 9, 2, '', 2, '0', '0', '0', 1),
(46, 1, 1, 15, 11, 2, '', 2, '0', '0', '0', 1),
(47, 1, 4, 19, 11, 2, '', 1, '1500', '12400', '19', 1),
(48, 2, 2, 6, 11, 2, '', 2, '0', '0', '0', 1),
(49, 2, 2, 5, 12, 1, 'Zhe shi fournisseur 1', 1, '100', '200', '100', 1),
(50, 2, 2, 6, 12, 2, '', 2, '0', '0', '0', 1),
(51, 1, 1, 1, 13, 2, '', 1, '1500', '2500', '1', 1),
(52, 1, 1, 2, 13, 2, '', 2, '0', '0', '0', 1),
(53, 2, 2, 5, 13, 2, '', 1, '900', '1000', '1', 1),
(54, 1, 1, 1, 14, 1, 'Listen production', 1, '52631', '90000', '1', 1),
(55, 1, 4, 19, 15, 2, '', 1, '4500', '5000', '1', 1),
(56, 1, 1, 1, 16, 1, 'Listen', 1, '52631', '90000', '1', 1),
(57, 1, 1, 3, 17, 1, 'PIKASSO', 1, '100000', '150000', '20', 1),
(58, 1, 1, 1, 2, 1, 'TFM', 1, '150000', '250000', '10', 1),
(60, 1, 1, 1, 3, 2, '', 1, '5500', '8900', '13', 1),
(62, 1, 1, 1, 5, 1, 'Listen prod', 1, '90000', '100000', '1', 1),
(63, 1, 6, 15, 6, 1, 'Abonnement CaractÃ¨re', 1, '0', '35000', '5', 1),
(68, 1, 3, 11, 5, 2, '', 1, '35000', '50000', '1', 1),
(69, 1, 2, 4, 7, 2, '', 1, '10000', '20000', '1', 1),
(70, 1, 3, 11, 7, 1, 'TFM', 1, '50000', '150000', '1', 1),
(71, 1, 3, 11, 8, 1, 'DJIM', 1, '50000', '150000', '1', 1),
(72, 1, 1, 1, 9, 1, 'STUDIO A', 1, '50000', '150000', '1', 1),
(73, 1, 2, 9, 12, 1, 'STUDIO X ', 1, '75000', '100000', '5', 1),
(74, 1, 1, 1, 10, 1, 'Studio Listen Prod', 1, '60000', '75000', '2', 1),
(75, 1, 2, 4, 13, 1, 'lkj', 1, '4000', '5000', '1', 1),
(76, 1, 2, 4, 14, 1, 'ioj', 1, '4000', '4000', '1', 1),
(78, 1, 1, 3, 1, 1, 'bea', 1, '5000', '5000', '1', 1),
(79, 1, 2, 5, 2, 1, 'RETOUR', 1, '2500', '3000', '1', 1);

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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`idDevis`, `numeroDevis`, `contact`, `objet`, `campagne`, `commissionProduction`, `taxeMunicipale`, `hasRemise`, `typeRemise`, `valeurRemise`, `conditionPaiement`, `commentaire`, `idResponsable`, `idClient`, `idTypetaxe`, `idAgence`, `idTypedevis`, `idEtat`, `idValideur`, `dateAjout`, `etat`) VALUES
(1, '001 NA.11/21', ' Attieh Samy #$# ', 'dfhrrrr', 'sdfd', '1', '1', 1, '1', '1', '50% &agrave; la commande, 50% &agrave; la livraison', '&amp;lt;p&amp;gt;ioi&amp;lt;/p&amp;gt;', 14, 1, 1, 1, 0, 3, 14, '2021-11-23 12:52:51', 1),
(2, '002 PA.11/21', 'Badara Dia Alioune #$# ', 'RETOUR', 'RETOUR', '03', '02', 1, '1', '02', 'Habituelles', '', 11, 4, 1, 1, 0, 15, 0, '2021-11-23 13:06:44', 1);

-- --------------------------------------------------------

--
-- Structure de la table `devisannule`
--

CREATE TABLE `devisannule` (
  `idDevisannule` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `motif` text NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `deviscommente`
--

INSERT INTO `deviscommente` (`idDeviscommente`, `idDevis`, `idUser`, `idDestinataire`, `contenu`, `dateAjout`, `etat`) VALUES
(1, 1, 11, 14, '<p>ERT</p>', '2021-11-23 13:08:35', 0),
(2, 2, 11, 11, '<p>CDFRE</p>', '2021-11-23 13:10:41', 1),
(3, 2, 11, 11, '<p>zertyui</p>', '2021-11-23 14:02:37', 1);

-- --------------------------------------------------------

--
-- Structure de la table `devislivre`
--

CREATE TABLE `devislivre` (
  `idDevislivre` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devisvalideclient`
--

INSERT INTO `devisvalideclient` (`idDevisvalideclient`, `idDevis`, `idUser`, `nomValideur`, `dateValidation`, `dateAjout`, `etat`) VALUES
(1, 1, 14, 'DFHRR', '23/11/2021', '2021-11-23 13:17:36', 1);

-- --------------------------------------------------------

--
-- Structure de la table `devisvalideresponsable`
--

CREATE TABLE `devisvalideresponsable` (
  `idDevisvalideresponsable` int(11) NOT NULL,
  `idDevis` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devisvalideresponsable`
--

INSERT INTO `devisvalideresponsable` (`idDevisvalideresponsable`, `idDevis`, `idUser`, `niveau`, `dateAjout`, `etat`) VALUES
(1, 1, 11, 1, '2021-11-23 13:16:57', 1);

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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `idFamille` int(11) NOT NULL,
  `famille` text NOT NULL,
  `description` text NOT NULL,
  `idRubrique` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`idFamille`, `famille`, `description`, `idRubrique`, `dateAjout`, `etat`) VALUES
(1, 'Audio', 'Audio', 1, '2020-03-13 10:21:07', 1),
(2, 'Audiovisuelle', 'kl', 1, '2020-07-20 07:06:14', 1),
(3, 'Prise de vue', 'klk', 1, '2020-07-20 07:06:43', 1),
(4, 'Impression', 'kl', 1, '2020-07-20 07:06:54', 1),
(5, 'Achat media', 'jk', 1, '2020-07-20 07:07:09', 1),
(6, 'Achat d\'art', 'Image Banque / Libre de droits (photo non exclusive) / Cession des droits 3 ans sur tous supports au S&eacute;n&eacute;gal', 1, '2020-07-20 07:07:20', 1),
(7, 'Honoraire agence', 'kl', 4, '2020-07-20 07:07:44', 1);

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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rubrique`
--

INSERT INTO `rubrique` (`idRubrique`, `referenceRubrique`, `rubrique`, `description`) VALUES
(1, 'RF042019-001', 'PRODUCTION', 'PRODUCTION'),
(2, 'RF042019-002', 'ACHAT D\'ESPACE MEDIA ', 'ACHAT D\'ESPACE MEDIA '),
(3, 'RF042019-003', 'ACHAT D\'ESPACE DIGITAL', 'ACHAT D\'ESPACE DIGITAL'),
(4, 'RF032020-001', 'HONORAIRE', 'HONORAIRE');

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
(1, 'SR032020-001', 'location studio'),
(2, 'SR032020-002', 'Location Voix');

-- --------------------------------------------------------

--
-- Structure de la table `typedevis`
--

CREATE TABLE `typedevis` (
  `idTypedevis` int(11) NOT NULL,
  `libelle` varchar(300) NOT NULL,
  `description` mediumtext NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeservice`
--

INSERT INTO `typeservice` (`idTypeservice`, `referenceTypeservice`, `typeService`, `idFamille`, `description`) VALUES
(1, 'TS032020-001', 'ENREGISTREMENT SPOT RADIO', 1, 'ENREGISTREMENT SPOT RADIO'),
(2, 'TS072020-001', 'REENREGISTREMENT SPOT RADIO', 1, ''),
(3, 'TS072020-002', 'CACHET VOIX OFF', 1, ''),
(4, 'TS072020-003', 'PRODUCTION SPOT TV &amp; SHOOTING', 2, ''),
(5, 'TS072020-004', 'PRODUCTION SPOT TV', 2, ''),
(6, 'TS072020-005', 'PRODUCTION ANIMATIQUE', 2, ''),
(7, 'TS072020-006', 'PRODUCTION BILLBOARD TV', 2, ''),
(8, 'TS072020-007', 'PODUCTION POP UP TV', 2, ''),
(9, 'TS072020-008', 'PRODUCTION CONTENUS DIGITAUX', 2, ''),
(10, 'TS072020-009', 'PRODUCTION MUSIQUE', 2, ''),
(11, 'TS072020-010', 'SHOOTING PHOTO', 3, ''),
(12, 'TS072020-011', 'FLYERS / CARTES DE VISITE / AFFICHES (exemples, cela d&eacute;pend du besoin client)', 4, ''),
(13, 'TS072020-012', 'ACHAT MEDIA OFFLINE', 5, ''),
(14, 'TS072020-013', 'ACHAT MEDIA ONLINE', 5, ''),
(15, 'TS072020-014', 'ACHAT D&rsquo;IMAGE', 6, ''),
(16, 'TS072020-015', 'REFLEXION STRATEGIQUE &amp; CREA 360&deg;', 7, ''),
(17, 'TS072020-016', 'STRATEGIE DIGITALE', 7, ''),
(18, 'TS072020-017', 'STRATEGIE MEDIA', 7, ''),
(19, 'TS072020-018', 'CONCEPTION / CREATION CAMPAGNE', 7, ''),
(20, 'TS072020-019', 'CONCEPTION / CREATION (dans le cas de support individuel hors campagne)', 7, ''),
(21, 'TS112021-001', 'Test h-tsoft', 1, 'io');

-- --------------------------------------------------------

--
-- Structure de la table `typetaxe`
--

CREATE TABLE `typetaxe` (
  `idTypetaxe` int(11) NOT NULL,
  `libelle` varchar(300) NOT NULL,
  `valeur` varchar(80) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `password` text,
  `prenom` varchar(80) DEFAULT NULL,
  `nom` varchar(80) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text,
  `idRole` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `password`, `prenom`, `nom`, `telephone`, `adresse`, `idRole`, `idAgence`, `photo`) VALUES
(1, 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Mody', 'KANE', '77 123 45 67', 'Dakar', 1, 1, 'dist/img/users/langfr-280px-Africa_(orthographic_projection).svg.png'),
(5, 'kanebi@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Amadou', 'KANE', '771111111', 'Dakar', 3, 1, 'dist/img/users/20180505195816avatar.png'),
(6, 'mndoye@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Marieme', 'NDOYE', '1221111', 'Dakar', 4, 1, 'dist/img/users/nature_slovenia_s.jpg'),
(10, 'rolandkossi.kossi@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', 'Roland', 'KOSSI', '7822656', '45, voltaire, 2, 10', 7, 1, 'dist/img/users/user2-160x160.png'),
(11, 'patricia@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Patricia', 'ABED', '777777777', 'Almadies', 2, 1, 'dist/img/users/ARTHMB-NewPetBirdChecklist-20160818.jpg'),
(12, 'alpha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Alpha', 'ROMO', '8889999', 'Somewhere', 1, 1, ''),
(13, 'nagib.attie@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib', 'Atti&eacute;', '770000000', 'caratere', 2, 1, NULL),
(14, 'dc.nagib.attie@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib D.C', 'Atti&eacute;', '770000000', 'caratere', 1, 1, NULL),
(15, 'daf.nagib.attie@caractereconseil.com', '446210d850d7aadf022a3ce00d8d3bc919af52d9', 'Nagib DAF', 'Atti&eacute;', '770000000', 'caratere', 4, 1, NULL),
(16, 'Test@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Test htsoft', 'Test htsoft', '776726045', 'Keur massar, Dakar, S&eacute;n&eacute;gal', 2, 1, 'dist/img/users/logo_h-tsoft.png');

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
,`rubriques` varchar(341)
,`familles` varchar(341)
,`typeservices` varchar(341)
,`services` varchar(341)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcontact`  AS SELECT `c`.`idContact` AS `idContact`, `c`.`nom` AS `nom`, `c`.`prenom` AS `prenom`, `c`.`telephone` AS `telephone`, `c`.`email` AS `email`, `c`.`idClient` AS `idClient`, `c`.`idUser` AS `idUser`, `c`.`dateAjout` AS `dateAjout`, `c`.`etat` AS `etat`, `cl`.`nomClient` AS `nomClient` FROM (`contact` `c` join `client` `cl`) WHERE (`c`.`idClient` = `cl`.`idClient`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdevis`
--
DROP TABLE IF EXISTS `vdevis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdevis`  AS SELECT `d`.`idDevis` AS `idDevis`, `d`.`numeroDevis` AS `numeroDevis`, `d`.`contact` AS `contact`, `d`.`objet` AS `objet`, `d`.`campagne` AS `campagne`, `d`.`commissionProduction` AS `commissionProduction`, `d`.`taxeMunicipale` AS `taxeMunicipale`, `d`.`hasRemise` AS `hasRemise`, `d`.`typeRemise` AS `typeRemise`, `d`.`valeurRemise` AS `valeurRemise`, `d`.`conditionPaiement` AS `conditionPaiement`, `d`.`commentaire` AS `commentaire`, `d`.`idResponsable` AS `idResponsable`, `d`.`idClient` AS `idClient`, `d`.`idTypetaxe` AS `idTypetaxe`, `d`.`idAgence` AS `idAgence`, `d`.`idTypedevis` AS `idTypedevis`, `d`.`idEtat` AS `idEtat`, `d`.`idValideur` AS `idValideur`, `d`.`dateAjout` AS `dateAjout`, `d`.`etat` AS `etat`, `c`.`nomClient` AS `nomClient`, `c`.`prenomClient` AS `prenomClient`, `c`.`adresseClient` AS `adresseClient`, `c`.`emailClient` AS `emailClient`, `c`.`telephoneClient` AS `telephoneClient`, `c`.`paysClient` AS `paysClient`, `c`.`photoClient` AS `photoClient`, `a`.`agence` AS `agence`, `a`.`siege` AS `siege`, `a`.`fax` AS `fax`, `a`.`email` AS `email`, `a`.`site` AS `site`, `a`.`ninea` AS `ninea`, `a`.`rc` AS `rc`, `a`.`logo` AS `logo`, `t`.`libelle` AS `libelle`, `t`.`valeur` AS `valeur`, `u`.`email` AS `emailAuteur`, `u`.`nom` AS `nom`, `u`.`idRole` AS `idRole`, `r`.`libelle` AS `role`, `u`.`prenom` AS `prenom`, `u`.`telephone` AS `telephone`, `u`.`adresse` AS `adresse`, (select sum(if((`dt`.`hasPrice` = 1),(select sum((`detailstypeservice`.`prixVente` * `detailstypeservice`.`quantite`)) from `detailstypeservice` where ((`detailstypeservice`.`idTypeservice` = `dt`.`idTypeservice`) and (`detailstypeservice`.`idDevis` = `d`.`idDevis`)) group by `detailstypeservice`.`idDevis`),(select sum((`detailsdevis`.`prixVente` * `detailsdevis`.`quantite`)) from `detailsdevis` where ((`detailsdevis`.`idTypeservice` = `dt`.`idTypeservice`) and (`detailsdevis`.`idDevis` = `d`.`idDevis`)) group by `detailsdevis`.`idDevis`)))) AS `montantDevis`, (select sum(if((`dt`.`hasPrice` = 1),(select sum((`detailstypeservice`.`prixAchat` * `detailstypeservice`.`quantite`)) from `detailstypeservice` where ((`detailstypeservice`.`idTypeservice` = `dt`.`idTypeservice`) and (`detailstypeservice`.`idDevis` = `d`.`idDevis`)) group by `detailstypeservice`.`idDevis`),(select sum((`detailsdevis`.`prixAchat` * `detailsdevis`.`quantite`)) from `detailsdevis` where ((`detailsdevis`.`idTypeservice` = `dt`.`idTypeservice`) and (`detailsdevis`.`idDevis` = `d`.`idDevis`)) group by `detailsdevis`.`idDevis`)))) AS `montantDevisAchat` FROM ((((((`devis` `d` join `client` `c`) join `agence` `a`) join `typetaxe` `t`) join `user` `u`) join `detailstypeservice` `dt`) join `role` `r`) WHERE ((`d`.`idClient` = `c`.`idClient`) AND (`d`.`idTypetaxe` = `t`.`idTypetaxe`) AND (`d`.`idAgence` = `a`.`idAgence`) AND (`d`.`idResponsable` = `u`.`idUser`) AND (`dt`.`idDevis` = `d`.`idDevis`) AND (`r`.`idRole` = `u`.`idRole`)) GROUP BY `d`.`idDevis` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdevis2`
--
DROP TABLE IF EXISTS `vdevis2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdevis2`  AS SELECT `v`.`idDevis` AS `idDevis`, `v`.`numeroDevis` AS `numeroDevis`, `v`.`contact` AS `contact`, `v`.`objet` AS `objet`, `v`.`campagne` AS `campagne`, `v`.`commissionProduction` AS `commissionProduction`, `v`.`taxeMunicipale` AS `taxeMunicipale`, `v`.`hasRemise` AS `hasRemise`, `v`.`typeRemise` AS `typeRemise`, `v`.`valeurRemise` AS `valeurRemise`, `v`.`conditionPaiement` AS `conditionPaiement`, `v`.`commentaire` AS `commentaire`, `v`.`idResponsable` AS `idResponsable`, `v`.`idClient` AS `idClient`, `v`.`idTypetaxe` AS `idTypetaxe`, `v`.`idAgence` AS `idAgence`, `v`.`idTypedevis` AS `idTypedevis`, `v`.`idEtat` AS `idEtat`, `v`.`idValideur` AS `idValideur`, `v`.`dateAjout` AS `dateAjout`, `v`.`etat` AS `etat`, `v`.`nomClient` AS `nomClient`, `v`.`prenomClient` AS `prenomClient`, `v`.`adresseClient` AS `adresseClient`, `v`.`emailClient` AS `emailClient`, `v`.`telephoneClient` AS `telephoneClient`, `v`.`paysClient` AS `paysClient`, `v`.`photoClient` AS `photoClient`, `v`.`agence` AS `agence`, `v`.`siege` AS `siege`, `v`.`fax` AS `fax`, `v`.`email` AS `email`, `v`.`site` AS `site`, `v`.`ninea` AS `ninea`, `v`.`rc` AS `rc`, `v`.`logo` AS `logo`, `v`.`libelle` AS `libelle`, `v`.`valeur` AS `valeur`, `v`.`emailAuteur` AS `emailAuteur`, `v`.`nom` AS `nom`, `v`.`idRole` AS `idRole`, `v`.`role` AS `role`, `v`.`prenom` AS `prenom`, `v`.`telephone` AS `telephone`, `v`.`adresse` AS `adresse`, `v`.`montantDevis` AS `montantDevis`, `v`.`montantDevisAchat` AS `montantDevisAchat`, (select group_concat(`rubrique`.`rubrique` separator ',') from `rubrique` where `rubrique`.`idRubrique` in (select `detailsdevis`.`idRubrique` from `detailsdevis` where (`detailsdevis`.`idDevis` = `v`.`idDevis`))) AS `rubriques`, (select group_concat(`famille`.`famille` separator ',') from `famille` where `famille`.`idFamille` in (select `detailsdevis`.`idFamille` from `detailsdevis` where (`detailsdevis`.`idDevis` = `v`.`idDevis`))) AS `familles`, (select group_concat(`typeservice`.`typeService` separator ',') from `typeservice` where `typeservice`.`idTypeservice` in (select `detailsdevis`.`idTypeservice` from `detailsdevis` where (`detailsdevis`.`idDevis` = `v`.`idDevis`))) AS `typeservices`, (select group_concat(`service`.`service` separator ',') from `service` where `service`.`idService` in (select `detailsdevis`.`idService` from `detailsdevis` where (`detailsdevis`.`idDevis` = `v`.`idDevis`))) AS `services` FROM `vdevis` AS `v` WHERE 1 ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdeviscommente`
--
DROP TABLE IF EXISTS `vdeviscommente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdeviscommente`  AS SELECT `d`.`idDeviscommente` AS `idDeviscommente`, `d`.`idDevis` AS `idDevis`, `d`.`idUser` AS `idUser`, `d`.`idDestinataire` AS `idDestinataire`, `d`.`contenu` AS `contenu`, `d`.`dateAjout` AS `dateAjout`, `d`.`etat` AS `etat`, `u`.`prenom` AS `prenom`, `u`.`nom` AS `nom` FROM (`deviscommente` `d` join `user` `u`) WHERE (`d`.`idUser` = `u`.`idUser`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vfacture`
--
DROP TABLE IF EXISTS `vfacture`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfacture`  AS SELECT `v`.`idDevis` AS `idDevis`, `v`.`numeroDevis` AS `numeroDevis`, `v`.`contact` AS `contact`, `v`.`objet` AS `objet`, `v`.`campagne` AS `campagne`, `v`.`commissionProduction` AS `commissionProduction`, `v`.`taxeMunicipale` AS `taxeMunicipale`, `v`.`hasRemise` AS `hasRemise`, `v`.`typeRemise` AS `typeRemise`, `v`.`valeurRemise` AS `valeurRemise`, `v`.`conditionPaiement` AS `conditionPaiement`, `v`.`commentaire` AS `commentaire`, `v`.`idResponsable` AS `idResponsable`, `v`.`idClient` AS `idClient`, `v`.`idTypetaxe` AS `idTypetaxe`, `v`.`idAgence` AS `idAgence`, `v`.`idTypedevis` AS `idTypedevis`, `v`.`idEtat` AS `idEtat`, `v`.`idValideur` AS `idValideur`, `v`.`dateAjout` AS `dateAjout`, `v`.`etat` AS `etat`, `v`.`nomClient` AS `nomClient`, `v`.`prenomClient` AS `prenomClient`, `v`.`adresseClient` AS `adresseClient`, `v`.`emailClient` AS `emailClient`, `v`.`telephoneClient` AS `telephoneClient`, `v`.`paysClient` AS `paysClient`, `v`.`photoClient` AS `photoClient`, `v`.`agence` AS `agence`, `v`.`siege` AS `siege`, `v`.`fax` AS `fax`, `v`.`email` AS `email`, `v`.`site` AS `site`, `v`.`ninea` AS `ninea`, `v`.`rc` AS `rc`, `v`.`logo` AS `logo`, `v`.`libelle` AS `libelle`, `v`.`valeur` AS `valeur`, `v`.`emailAuteur` AS `emailAuteur`, `v`.`nom` AS `nom`, `v`.`idRole` AS `idRole`, `v`.`role` AS `role`, `v`.`prenom` AS `prenom`, `v`.`telephone` AS `telephone`, `v`.`adresse` AS `adresse`, `v`.`montantDevis` AS `montantDevis`, `v`.`montantDevisAchat` AS `montantDevisAchat`, `f`.`numeroFacture` AS `numeroFacture`, `f`.`destinataire` AS `destinataire`, str_to_date(`f`.`dateFacture`,'%d/%m/%Y %r') AS `dateFacture`, `f`.`accompte` AS `accompte`, `d`.`numBc` AS `numBc` FROM ((`vdevis` `v` join `facture` `f`) join `devisbc` `d`) WHERE ((`v`.`idDevis` = `f`.`idDevis`) AND (`v`.`idDevis` = `d`.`idDevis`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vfamille`
--
DROP TABLE IF EXISTS `vfamille`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfamille`  AS SELECT `f`.`idFamille` AS `idFamille`, `f`.`famille` AS `famille`, `f`.`description` AS `description`, `f`.`idRubrique` AS `idRubrique`, `f`.`dateAjout` AS `dateAjout`, `f`.`etat` AS `etat`, `r`.`rubrique` AS `rubrique` FROM (`famille` `f` join `rubrique` `r`) WHERE (`f`.`idRubrique` = `r`.`idRubrique`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vrubrique`
--
DROP TABLE IF EXISTS `vrubrique`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrubrique`  AS SELECT `d`.`idDevis` AS `idDevis`, `t`.`idTypeservice` AS `idTypeservice`, `r`.`idRubrique` AS `idRubrique`, `r`.`rubrique` AS `rubrique`, (select `typeservice`.`typeService` from `typeservice` where (`typeservice`.`idTypeservice` = `t`.`idTypeservice`)) AS `typeService`, `t`.`hasPrice` AS `hasPrice`, if((`t`.`hasPrice` = 1),(select (`detailstypeservice`.`prixVente` * `detailstypeservice`.`quantite`) from `detailstypeservice` where ((`detailstypeservice`.`idTypeservice` = `t`.`idTypeservice`) and (`detailstypeservice`.`idRubrique` = `r`.`idRubrique`) and (`detailstypeservice`.`idDevis` = `d`.`idDevis`))),(select sum((`detailsdevis`.`prixVente` * `detailsdevis`.`quantite`)) from `detailsdevis` where ((`detailsdevis`.`idTypeservice` = `t`.`idTypeservice`) and (`detailsdevis`.`idRubrique` = `r`.`idRubrique`) and (`detailsdevis`.`idDevis` = `d`.`idDevis`)))) AS `somme`, if((`t`.`hasPrice` = 1),(select (`detailstypeservice`.`prixAchat` * `detailstypeservice`.`quantite`) from `detailstypeservice` where ((`detailstypeservice`.`idTypeservice` = `t`.`idTypeservice`) and (`detailstypeservice`.`idRubrique` = `r`.`idRubrique`) and (`detailstypeservice`.`idDevis` = `d`.`idDevis`))),(select sum((`detailsdevis`.`prixAchat` * `detailsdevis`.`quantite`)) from `detailsdevis` where ((`detailsdevis`.`idTypeservice` = `t`.`idTypeservice`) and (`detailsdevis`.`idRubrique` = `r`.`idRubrique`) and (`detailsdevis`.`idDevis` = `d`.`idDevis`)))) AS `sommeAchat` FROM ((`detailstypeservice` `t` join `rubrique` `r`) join `devis` `d`) WHERE ((`r`.`idRubrique` = `t`.`idRubrique`) AND (`d`.`idDevis` = `t`.`idDevis`) AND `t`.`idTypeservice` in (select `detailsdevis`.`idTypeservice` from `detailsdevis` where (`detailsdevis`.`idRubrique` = `r`.`idRubrique`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vtypeservice`
--
DROP TABLE IF EXISTS `vtypeservice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtypeservice`  AS SELECT `t`.`idTypeservice` AS `idTypeservice`, `t`.`referenceTypeservice` AS `referenceTypeservice`, `t`.`typeService` AS `typeService`, `t`.`idFamille` AS `idFamille`, `t`.`description` AS `description`, `f`.`famille` AS `famille` FROM (`typeservice` `t` join `famille` `f`) WHERE (`t`.`idFamille` = `f`.`idFamille`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vuser`
--
DROP TABLE IF EXISTS `vuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuser`  AS SELECT `u`.`idUser` AS `idUser`, `u`.`email` AS `email`, `u`.`password` AS `password`, `u`.`prenom` AS `prenom`, `u`.`nom` AS `nom`, `u`.`telephone` AS `telephone`, `u`.`adresse` AS `adresse`, `u`.`idRole` AS `idRole`, `u`.`idAgence` AS `idAgence`, `u`.`photo` AS `photo`, `r`.`libelle` AS `profil`, `a`.`agence` AS `agence` FROM ((`user` `u` join `role` `r`) join `agence` `a`) WHERE ((`u`.`idRole` = `r`.`idRole`) AND (`u`.`idAgence` = `a`.`idAgence`)) ;

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
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `detailsdevis`
--
ALTER TABLE `detailsdevis`
  MODIFY `idDetailsdevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `detailstypeservice`
--
ALTER TABLE `detailstypeservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `idDevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `devisannule`
--
ALTER TABLE `devisannule`
  MODIFY `idDevisannule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devisbc`
--
ALTER TABLE `devisbc`
  MODIFY `idDevisbc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `deviscommente`
--
ALTER TABLE `deviscommente`
  MODIFY `idDeviscommente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `devislivre`
--
ALTER TABLE `devislivre`
  MODIFY `idDevislivre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devisvalideclient`
--
ALTER TABLE `devisvalideclient`
  MODIFY `idDevisvalideclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `devisvalideresponsable`
--
ALTER TABLE `devisvalideresponsable`
  MODIFY `idDevisvalideresponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `idFacture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `idFamille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `idRubrique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idTypeservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `typetaxe`
--
ALTER TABLE `typetaxe`
  MODIFY `idTypetaxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
