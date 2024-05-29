-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mai 2024 à 19:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sang`
--

-- --------------------------------------------------------

--
-- Structure de la table `bnadms`
--

CREATE TABLE `bnadms` (
  `vsidentite` int(11) NOT NULL,
  `nom_donneur_s` varchar(50) NOT NULL,
  `prenom_donneur_s` varchar(50) NOT NULL,
  `email_donneur_s` varchar(255) NOT NULL,
  `password_D` varchar(255) NOT NULL,
  `code_verif_pass_D` varchar(255) DEFAULT NULL,
  `pass_time_reset` varchar(50) DEFAULT NULL,
  `telephone_donneur_s` varchar(10) NOT NULL,
  `agesdonneur_s` varchar(20) NOT NULL,
  `groupage_donneur_s` varchar(2) NOT NULL,
  `dernier_donneur_s` varchar(50) DEFAULT NULL,
  `ville_donneur_s` varchar(50) NOT NULL,
  `sexe_donneur_s` varchar(20) NOT NULL,
  `blastek` enum('h_b_donneurs','hopitale_b_d','h_bancsang_d','h_bancsang_maalem_d') NOT NULL,
  `code_verif` varchar(255) NOT NULL,
  `checkk_me_bro` enum('xX','oO') NOT NULL DEFAULT 'xX',
  `valide_token_donneur` varchar(255) NOT NULL,
  `url_bnadms` varchar(100) NOT NULL,
  `latitude_b_s` varchar(50) NOT NULL,
  `longitude_b_s` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_inscr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `bnadms`
--

INSERT INTO `bnadms` (`vsidentite`, `nom_donneur_s`, `prenom_donneur_s`, `email_donneur_s`, `password_D`, `code_verif_pass_D`, `pass_time_reset`, `telephone_donneur_s`, `agesdonneur_s`, `groupage_donneur_s`, `dernier_donneur_s`, `ville_donneur_s`, `sexe_donneur_s`, `blastek`, `code_verif`, `checkk_me_bro`, `valide_token_donneur`, `url_bnadms`, `latitude_b_s`, `longitude_b_s`, `type`, `address`, `date_inscr`) VALUES
(106, 'Banc du sang Ibn Rochd', '', 'ibnrochd@gmail.com', '$2y$12$xNK2Laf75L0uzbkBRlSbCu0OnyDo8jGVK3E2BE6iv7YRjtS7cqEsW', '9a5e0497381ba89a40dd428dbf8651031a9ff29a486a0510323eabe9332bf662', '2024-05-22 20:30:47', '0696566905', '22', 'O+', NULL, 'Annaba', 'homme', 'h_bancsang_d', '4f0712707aa3633396ba30f26fd31df58d924fd45fc6c7db70b85458dd497528', 'oO', 'd5b0a479cbcd07353245513323738136fe2921e90c246fb1a934e433d03991ba', '533763ba53efe311f0e735c36b09f649f0700eccc5ddc977d5da17e71629a29f', '36.910577', '7.747605', 'banc', 'Bd seddik Benyahia', '2024-05-15 19:29:30'),
(107, 'Banc du sang El Bouni', '', 'anissannabi2@gmail.com', '$2y$12$GVrQnrhXF3Klr7q478YryuORRRxzmJz.8lAdNc9EnI/KXyogbHTtW', NULL, NULL, '0795337574', '', '', NULL, 'Annaba', '', 'h_bancsang_maalem_d', 'aa9f346b10f19b61dc76742dceaf68b891f29aa75b122fe35314e4d1e4f5dcac', 'oO', 'ab50ab94d5a4089f157869c1b8a163f71c6a0db428163a0b86c3c3dd0fe35cc9', '42f8f8572600d07982b528621a7d5d9adaec145cfe51ace293363b0197b1cdeb', '36.862622', '7.737664', 'banc', 'El Bouni Annaba', '2024-05-15 19:35:56'),
(108, 'Al farabi ', '', 'elfarabi@gmail.com', '$2y$12$nfXB2F43FyLSEtpghnNACOPJEA5mf5lSutRHCuI5NEZF2mAIVglga', NULL, NULL, '0541515861', '', '', NULL, 'Annaba', '', 'hopitale_b_d', '02b035cbd40a89beec9d381e6ee234107a0c8e05986dc3e0978378bc9d408fda', 'oO', '4366558893fad0678f3d6b9da600ddeded072e6547c36c2fe13aec3cab53fca5', '', '', '', 'hopitale', 'El Bouni Annaba', '2024-05-15 19:44:27'),
(110, 'Banc Du Sang', '', 'skikda@gmail.com', '$2y$12$ip0CdCHiHboeBc/BOZBsve3yrwR53/98aBSpkUszdEx86ZetuQ8uO', NULL, NULL, '0770841846', '', '', NULL, 'Skikda', '', 'h_bancsang_d', 'acaf255d354ddbae2af1130953c863464869aa039180137ac1fdeea751d9bd11', 'oO', 'b574e49f670fe6c848c98e371593cb88b1e1a67a9f87f4b7f85267008a8109c0', 'e55fb77fe2133443f7a13f8bc6f4e1c7c2bc897c2aef9b10f8e6725311e47e68', '36.863215', '6.927008', 'banc', 'Merdj Eddib', '2024-05-22 20:03:19'),
(111, 'NiSomed', '', 'nisomed@gmail.com', '$2y$12$JpLDQHCMmyog3NQXIaFsiuJXJtfuZfyqWdqTqQM/7R6N5rxBUEAyS', NULL, NULL, '0672644346', '', '', NULL, 'Skikda', '', 'hopitale_b_d', '4de4593f2a501a7c423af2dd2475fd7e1baf6fabd9932df7eb7f5459d3526317', 'oO', '1b4d61b140b7213a376e29090df908c05763f6f7503e985bf31645dbba536534', '', '', '', 'hopitale', 'Rue De Bouyala', '2024-05-22 20:19:12'),
(112, 'Debz', 'Abdelhamid', 'debzabdelhamid@gmail.com', '', NULL, NULL, '0795337571', '20', 'A+', NULL, 'Annaba', 'homme', 'h_b_donneurs', '', 'oO', '', '', '', '', '', '', ''),
(113, 'Debz', 'Kheireddine', 'annabikhairo@gmail.com', '$2y$12$/BJy/gMuygvy7ONmYuz3k.I0GO2HrG0zISpObHeyMAWuxZxIrzv2i', NULL, NULL, '0696566908', '22', 'O+', NULL, 'Annaba', 'homme', 'h_b_donneurs', 'bbe4fd9f59a116bd8f2dd0292a90bae9f4920db19d1847b99a96690a9e4d8449', 'oO', '83f606864fdc4810c9be6486ca293ae8aeca0df048a83da250e6b893bd413687', 'b820af287e03801881d06d729d8dfcdb7066cbff074e6224576a04617810a86d', '', '', '', '', '2024-05-22 20:32:44'),
(114, 'Maoui', 'Mohamed hatem', 'maoui@gmail.com', '', NULL, NULL, '0770841845', '21', 'A+', NULL, 'Annaba', 'homme', 'h_b_donneurs', '', 'oO', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `demmande_poches`
--

CREATE TABLE `demmande_poches` (
  `id` int(11) NOT NULL,
  `url1` int(11) NOT NULL,
  `url2` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `type_sang` enum('sang','plasma','plaquette') NOT NULL,
  `groupage` enum('O+','A+','B+','AB+','O-','A-','B-','AB-') NOT NULL,
  `nb_poche` enum('1','2','3','4','5') NOT NULL,
  `url_demmande` varchar(255) NOT NULL,
  `status_d` enum('en attente','confirmer') NOT NULL,
  `dated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `demmande_poches`
--

INSERT INTO `demmande_poches` (`id`, `url1`, `url2`, `nom`, `prenom`, `type_sang`, `groupage`, `nb_poche`, `url_demmande`, `status_d`, `dated`) VALUES
(44, 108, 106, 'Debz', 'Kheireddine', 'sang', 'O+', '2', 'd5d4cbfa2c9157806a03ae529071d6b1dfd18433fc749ab5b9b5e491a94fd1e5', 'confirmer', '2024-05-29 17:57:39'),
(45, 111, 110, 'Badi', 'Mouatez', 'plasma', 'A+', '2', '582d9eaa61c0287c9cc5e54f41bb162348ac7c2e9110d1c5b6c86a40b0146a7c', 'confirmer', '2024-05-29 18:00:59');

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer_donneur`
--

CREATE TABLE `enregistrer_donneur` (
  `id_enr` int(11) NOT NULL,
  `vsidentite` int(11) NOT NULL,
  `nom_donneur_1` varchar(50) NOT NULL,
  `prenom_donneur_1` varchar(50) NOT NULL,
  `age_donneur_1` varchar(20) NOT NULL,
  `groupage_donneur_1` varchar(20) NOT NULL,
  `groupage_donneur_2` varchar(20) NOT NULL,
  `nom_donneur_2` varchar(50) NOT NULL,
  `prenom_donneur_2` varchar(50) NOT NULL,
  `age_donneur_2` varchar(20) NOT NULL,
  `nom_hopitale` varchar(50) NOT NULL,
  `nom_banc` varchar(50) NOT NULL,
  `status_enregistrement` enum('en attente_d','valide_d') NOT NULL DEFAULT 'en attente_d',
  `type_enregistrement` enum('locale_d','hopitale_d','disponible_d') NOT NULL,
  `ville_enregistrement` varchar(50) NOT NULL,
  `url_enregistrement` varchar(100) NOT NULL,
  `date_enregistrement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `enregistrer_donneur`
--

INSERT INTO `enregistrer_donneur` (`id_enr`, `vsidentite`, `nom_donneur_1`, `prenom_donneur_1`, `age_donneur_1`, `groupage_donneur_1`, `groupage_donneur_2`, `nom_donneur_2`, `prenom_donneur_2`, `age_donneur_2`, `nom_hopitale`, `nom_banc`, `status_enregistrement`, `type_enregistrement`, `ville_enregistrement`, `url_enregistrement`, `date_enregistrement`) VALUES
(53, 106, 'Debz', 'Abdelhamid', '20', 'A+', 'A-', 'Mallem', 'Djamell', '20', 'Banc du sang Ibn Rochd', '', 'valide_d', 'locale_d', 'Annaba', '68ff7c8993e60af7d104d4f9b154dab133a0d747b8082c3b27d96b3693ed244f', '2024-05-29 05:52:13'),
(54, 106, 'Debz', 'Abdelhamid', '20', 'A+', 'A+', 'Debz', 'Abdallah', '88', 'Al farabi', 'Banc du sang Ibn Rochd', 'valide_d', 'hopitale_d', 'Annaba', '013cf616af042e7a464ca7f67f56f1066b7527e73710554ad4ec3cfcae494d62', '2024-05-29 05:53:53'),
(55, 106, 'Maoui', 'Mohamed Hatem', '20', 'O+', '', '', '', '', 'Banc du sang Ibn Rochd', '', 'valide_d', 'disponible_d', 'Annaba', '5f6b11d5dd49f8ffd3c6a373c251a1c820f5cdf5da8391b5c0cd60dea2f39359', '2024-05-29 05:55:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bnadms`
--
ALTER TABLE `bnadms`
  ADD PRIMARY KEY (`vsidentite`),
  ADD UNIQUE KEY `emaildonneur` (`email_donneur_s`),
  ADD UNIQUE KEY `telephone` (`telephone_donneur_s`);

--
-- Index pour la table `demmande_poches`
--
ALTER TABLE `demmande_poches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bnadm_demmande` (`url1`),
  ADD KEY `fk_bnadm_demmandee` (`url2`);

--
-- Index pour la table `enregistrer_donneur`
--
ALTER TABLE `enregistrer_donneur`
  ADD PRIMARY KEY (`id_enr`),
  ADD KEY `fk_bnadm_enregistrer` (`vsidentite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bnadms`
--
ALTER TABLE `bnadms`
  MODIFY `vsidentite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `demmande_poches`
--
ALTER TABLE `demmande_poches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `enregistrer_donneur`
--
ALTER TABLE `enregistrer_donneur`
  MODIFY `id_enr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demmande_poches`
--
ALTER TABLE `demmande_poches`
  ADD CONSTRAINT `fk_bnadm_demmande` FOREIGN KEY (`url1`) REFERENCES `bnadms` (`vsidentite`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bnadm_demmandee` FOREIGN KEY (`url2`) REFERENCES `bnadms` (`vsidentite`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enregistrer_donneur`
--
ALTER TABLE `enregistrer_donneur`
  ADD CONSTRAINT `fk_bnadm_enregistrer` FOREIGN KEY (`vsidentite`) REFERENCES `bnadms` (`vsidentite`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
