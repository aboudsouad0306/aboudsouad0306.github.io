-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 02 Août 2018 à 12:24
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

 SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
 SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `its`
--

-- --------------------------------------------------------

--
-- Structure de la table `activité`
--

CREATE TABLE `activité` (
  `id` int(40) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `activité`
--

INSERT INTO `activité` (`id`, `nom`) VALUES
(1, 'ADMINISTRATIONS'),
(2, 'AGRICULTURE-ELEVAGE'),
(3, 'AGRO INDUSTRIES'),
(4, 'AMBASSADES -ORGANISATIONS INTERNATIONALES'),
(5, 'AMEUBLEMENT'),
(6, 'ASSOCIATIONS DIVERSES'),
(7, 'ASSURANCES-REASSURANCES ET MUTUELLES'),
(8, 'AUTOMOBILE'),
(9, 'BET (Bureau d\'Etude Technique)'),
(10, 'BOIS LIEGES ET DERIVES'),
(11, 'BTP (Bâtiment et Travaux Publics)'),
(12, 'CELLULOSE - PAPIER - CARTON'),
(13, 'CHIMIE-PETROCHIMIE'),
(14, 'COMMERCE-DISTRIBUTION-NEGOCE'),
(15, 'COMMUNICATION MEDIAS'),
(16, 'COSMETIQUES-PARFUMERIE'),
(17, 'CUIR-CHAUSSURES-MAROQUINERIE'),
(18, 'EDITION-IMPRIMERIE-SERIGRAPHIE'),
(19, 'EDUCATION-FORMATION'),
(20, 'ELECTRICITE-ELECTRONIQUE-TELECOMMUNICATION'),
(21, 'EQUIPEMENTS INDUSTRIELS'),
(22, 'EQUIPEMENTS POUR LES COLLECTIVITES'),
(23, 'ETABLISSEMENTS FINANCIERS ET BANCAIRES'),
(24, 'HYDRAULIQUE'),
(25, 'IMMOBILIER'),
(26, 'INDUSTRIES DIVERSES'),
(27, 'INFORMATIQUE-BUREAUTIQUE'),
(28, 'MATERIAUX DE CONSTRUCTION'),
(29, 'MECANIQUE'),
(30, 'MEDICAL-PARAMEDICAL'),
(31, 'MER ET PECHE'),
(32, 'MINES ET ENERGIE'),
(33, 'MOBILIER, EQUIPEMENT BUREAUX'),
(34, 'ORGANISMES ECONOMIQUES'),
(35, 'PLASTIQUE-CAOUTCHOUC'),
(36, 'SERVICES'),
(37, 'SIDERURGIE-METALLURGIE'),
(38, 'SPORTS CULTURE ET LOISIRS'),
(39, 'TEXTILE-CONFECTION'),
(40, 'TOURISME-HOTELLERIE-RESTAURATION'),
(41, 'TRANSPORT-TRANSIT-LOGISTIQUE'),
(42, 'VERRE-CERAMIQUE'),
(43, 'ARTISANAT  ET PETITS METIERS');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `contenu`, `date`) VALUES
(9, 'FindDz est lancé cette semaine', 'Soyez les bienvenus au grand réseau public d’entreprise\r\nFindDz vous offre la possibilité de référencié votre entreprise et déposer vous propre annonce sur votre produit !!\r\n', 1396626327);

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_wilaya` int(11) NOT NULL,
  `date` date NOT NULL 
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `contenu`, `id_user`, `id_cat`, `id_wilaya`, `date`) VALUES
(4, 'Villa a bejaia bord de mer ', 'villa 2 étages, Bejaia, bord de mer, piscine, jardin, 2 garages ....etc ', 1, 9, 6, '2013-08-18'),
(5, 'R19 bonne état', 'Renault 19 de l\'année 1992, très bonne état, ....blabla ...etc', 1, 16, 16, '2013-08-18'),
(6, 'Nikon d500', 'nikon d500, état neuf, ...bla bla bla bla ....etc  ', 1, 15, 10, '2013-08-19');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Batiment, Travaux publiques, Construction'),
(2, 'Pharmacies'),
(3, 'Agences de voyage'),
(4, 'Immobilier'),
(5, 'Agro alimentaire'),
(6, 'Formation'),
(7, 'Concessionaires Automobile'),
(8, 'Hotels'),
(9, 'Banks'),
(10, 'Etudes et conseils'),
(11, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `cat_annonce`
--

CREATE TABLE `cat_annonce` (
  `id` int(11) NOT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cat_annonce`
--

INSERT INTO `cat_annonce` (`id`, `intitule`, `parent`) VALUES
(1, 'Immobilier', 'defaut'),
(2, 'Vehicules ', 'defaut'),
(3, 'Informatique ', 'defaut'),
(4, 'Produit Maison ', 'defaut'),
(5, 'Electronique', 'defaut'),
(6, 'Voyage/Tourisme', 'defaut'),
(7, 'Divers', 'defaut'),
(8, 'appartement', 'Immobilier'),
(9, 'villa', 'Immobilier'),
(10, 'terrain', 'Immobilier'),
(11, 'studio', 'Immobilier'),
(12, 'pc de bureau', 'Informatique'),
(13, 'pc portable', 'Informatique'),
(14, 'Téléviseur', 'Electronique'),
(15, 'Appareil photo', 'Electronique'),
(16, 'Renault', 'Vehicules'),
(17, 'Peugeot', 'Vehicules'),
(18, 'Nissan', 'Vehicules'),
(19, 'Toyota', 'Vehicules'),
(20, 'Carcasses', 'Immobilier');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(15) NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `tel`, `adresse`, `mdp`, `datecreation`) VALUES
(5, 'aboud', 'souad', 'aboudsouad360@gmail.com', 673213821, 'DBK Tizi-ouzou', '0000', '2018-08-02 09:47:13');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `civilite` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `civilite`, `nom`, `societe`, `service`, `email`, `sujet`, `message`) VALUES
(1, '1', 'tak', 'forever', 'Service Commercial', 'kahina@hotmail.fr', 'leave', 'mon pays est d?vast? par des ?trangers '),
(2, '2', 'takina', 'forever', 'Service Technique', 'kahingdfa@hotmail.fr', 'leaved', 'mon pays est d?vast? par des ?trangers kfqa'),
(3, '', 'MEHRAZI', 'Belhak', 'Service Commercial', 'belhak@live.fr', 'agriculture', 'je veux vendre un terain de ichikar\r\nappellez moi!!'),
(7, '', 'toufik', 'its', 'Service Technique', 'infotools@gmail.com', 'r?glage de mon pc', 'je veux formater mon pc et je ne sais pas comment');

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `email`
--

INSERT INTO `email` (`id`, `email`) VALUES
(2, 'norahb@live.fr'),
(3, 'ahmed.bouktit@gmail.com'),
(4, 'infos@rea-dz.com'),
(6, 'manel@hotmail.com'),
(8, 'mehrazitawfik@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `raisonsocial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `Tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idwilaya` int(11) NOT NULL,
  `idact` int(50) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `raisonsocial`, `email`, `lien`, `description`, `adresse`, `Tel`, `Fax`, `mobile`, `idwilaya`, `idact`) VALUES
(248, 'AAA ATELIER D ARCHITECTURE ET DE TOUT AMENAGEMENT', '', '', '', '', 'Faubourg de Gandouza, Route Nationale N°26, Akbou', 'Tel :034358707', '', '', 7, 5),
(249, 'ABCUISINE PLUS SARL', '', 'groupeab@yahoo.fr / info@groupe-abcuisine.com', 'http://groupe-abcuisine.com', '', 'Zone Industrielle BP.264 - El Kseur', 'Tel :034 25 26 02/034 25 34 22/034 25 34 23', '034 25 23 49', '', 7, 5),
(264, 'ACA SPA - AGGLO CONSTRUCTION AMIZOUR', '', '', '', '', 'Zone d Activité - Amizour', '034 24 19 64', 'fax', '', 7, 24),
(268, 'ACF SERVICE - ETS. MEDJKOUNE', '', '', '', '', '235, Avenue du 1er. novembre - Akbou', '034 35 76 59', '034 35 76 59', '', 7, 36),
(266, 'IKRAM rent car', '', '', '', '', 'Centre Commercail Akfadou au 1ér étage.13 Rue Ahmed Boumeda Bejaia Algérie', '034 22 01 65', '', '0661 802 261', 7, 8),
(265, 'Izacar', '', '', '', '', 'Rue des Frères Tabet les 4 Chermins 06000 Béjaia Algérie', '', '', '661 630 500', 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `mdplost`
--

CREATE TABLE `mdplost` (
  `id` int(50) NOT NULL,
  `email_perdu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `civilite` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `idtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idwilaya` int(11) NOT NULL  
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `civilite`, `nom`, `prenom`, `adresse`, `email`, `mdp`, `idtype`, `idwilaya`) VALUES
(4, 1, 'Bekouri', 'Noura', 'Ighzar -Béjaia', 'nora.boukeroui@gmail.com', 'nono2013', '2', 6),
(11, 3, 'MEHRAZI', 'Toufik', 'Akhenak-Seddouk-Béjaia', 'mehrazitawfik@gmail.com', '123', '1', 6),
(12, 3, 'MEHRAZI', 'Toufik', 'Akhenak-Seddouk-Béjaia', 'kifwat7787@hotmail.fr', '123', '2', 15),
(23, 3, 'KHAREBOUCHE', 'YOUCEF', 'akbou', 'infotoolssolutions@gmail.com', '321', '1', 6),
(31, 1, 'aboud', 'souad', 'boughni , tizi-ouzou', 'aboudsouad360@gmail.com', '123', '2', 15),
(32, 3, 'kenouche ', 'hocine', 'biskra', 'hocineKhenouche@gmail.com', '123', '2', 7);

-- --------------------------------------------------------

--
-- Structure de la table `users_type`
--

CREATE TABLE `users_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users_type`
--

INSERT INTO `users_type` (`id`, `type`) VALUES
(1, 'administrateur'),
(2, 'entreprise'),
(3, 'annonceur');

-- --------------------------------------------------------

--
-- Structure de la table `user_compteur`
--

CREATE TABLE `user_compteur` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `n_visite` varchar(255) COLLATE utf8_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_compteur`
--

INSERT INTO `user_compteur` (`id`, `id_user`, `n_visite`) VALUES
(1, 2, '8'),
(2, 3, '90'),
(3, 4, '32'),
(4, 9, '1'),
(5, 10, '2');

-- --------------------------------------------------------

--
-- Structure de la table `resirvation`
--

CREATE TABLE `resirvation` (
`id` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `resirvation`
--


-- --------------------------------------------------------

--
-- Structure de la table `Vehicules`
--

CREATE TABLE `Vehicules` ( 
  `id` int (11) NOT NULL  ,
 `matricule` int(30) NOT NULL ,
 `modele` varchar(50) NOT NULL ,
 `marque` varchar(50) NOT NULL,
 `couleur` varchar(50) NOT NULL,
 `prixlocation` varchar(20) NOT NULL,
 `disponibilité` varchar(15) NOT NULL ,
 `identreprise` int(11) NOT NULL  

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `Vehicules` (`id`, `matricule`, `modele`, `marque`, `couleur`, `prixlocation`, `disponibilité`, `identreprise`) VALUES
(1,0055511807, 'bmw X3', 'BMW', 'noir', '3000.00 DA/jr', 'disponible', 265),
(2,0044411807, 'bmw X5', 'BMW', 'blanche', '3000.00 DA/jr', '', 266);

-- --------------------------------------------------------

--
-- Structure de la table `wilaya`
--

CREATE TABLE `wilaya` (
  `id` int(11) NOT NULL,
  `wilaya` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `wilaya`
--

INSERT INTO `wilaya` (`id`, `wilaya`) VALUES
(1, 'Adrar'),
(2, 'Chlef'),
(3, 'Laghouat'),
(4, 'Oum El Bouaghi'),
(5, 'Batna'),
(6, 'Bejaia'),
(7, 'Biskra'),
(8, 'Béchar'),
(9, 'Blida'),
(10, 'Bouira'),
(11, 'Tamanrasset'),
(12, 'Tébessa'),
(13, 'Tlemcen'),
(14, 'Tiaret'),
(15, 'Tizi Ouzou'),
(16, 'Alger'),
(17, 'Djelfa'),
(18, 'Jijel'),
(19, 'Sétif'),
(20, 'Saïda'),
(21, 'Skikda'),
(22, 'Sidi Bel Abbès'),
(23, 'Annaba'),
(24, 'Guelma'),
(25, 'Constantine'),
(26, 'Médéa'),
(27, ' Mostaganem'),
(28, 'M\'sila'),
(29, ' Mascara'),
(30, 'Ouargla'),
(31, 'Oran'),
(32, 'El Bayadh'),
(33, 'Illizi'),
(34, 'Bordj Bou Arreridj'),
(35, 'Boumerdès'),
(36, 'El Tarf'),
(37, 'Tindouf'),
(38, 'Tissemsilt'),
(39, 'El Oued'),
(40, 'Khenchela'),
(41, 'Souk Ahras'),
(42, 'Tipaza'),
(43, ' Mila'),
(44, 'Aïn Defla'),
(45, 'Naâma'),
(46, 'Aïn Témouchent'),
(47, 'Ghardaia'),
(48, 'Relizane');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cat_annonce`
--
ALTER TABLE `cat_annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mdplost`
--
ALTER TABLE `mdplost`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_compteur`
--
ALTER TABLE `user_compteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wilaya`
--
ALTER TABLE `wilaya`
  ADD PRIMARY KEY (`id`);


 --
 -- Index pour la table `vehicules`
 -- 
 ALTER TABLE `Vehicules` 
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `resirvation`
--
ALTER TABLE `resirvation` 
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `resirvation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;  






 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
