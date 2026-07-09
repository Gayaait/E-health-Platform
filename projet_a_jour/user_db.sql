-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mai 2024 à 21:14
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `user_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `immunisation_db`
--

CREATE TABLE `immunisation_db` (
  `id_vaccin` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `vaccineCode` varchar(255) NOT NULL,
  `administeredProduct` varchar(255) NOT NULL,
  `lotNumber` varchar(255) NOT NULL,
  `expirationDate` date NOT NULL,
  `site` varchar(255) NOT NULL,
  `doseQuantity` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `immunisation_db`
--

INSERT INTO `immunisation_db` (`id_vaccin`, `id_patient`, `vaccineCode`, `administeredProduct`, `lotNumber`, `expirationDate`, `site`, `doseQuantity`, `date`) VALUES
(5, 10, 'Flucelvax', 'Flucelvax (Influenza, injectable, MDCK, preservative free, quadrivalent)', 'AAJN11K', '2024-06-14', 'left arm', '5', '2023-05-01'),
(6, 10, 'Rabies - IM Diploid cell culture', 'Rabies - IM Diploid cell culture', 'PPL909K', '2024-11-06', 'right arm', '5', '2022-11-07'),
(7, 11, 'Flucelvax', 'Flucelvax (Influenza, injectable, MDCK, preservative free, quadrivalent)', 'AAJN11K', '2024-07-25', 'left arm', '5', '2020-10-26'),
(8, 13, 'Flucelvax', 'Flucelvax (Influenza, injectable, MDCK, preservative free, quadrivalent)', 'AAJN11K', '2024-03-28', 'left arm', '5', '2018-07-16');

-- --------------------------------------------------------

--
-- Structure de la table `observations_db`
--

CREATE TABLE `observations_db` (
  `id_observations` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date_observation` date NOT NULL,
  `observation` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `observations_db`
--

INSERT INTO `observations_db` (`id_observations`, `id_patient`, `date_observation`, `observation`, `value`, `unit`) VALUES
(5, 13, '2024-04-07', 'Glucose in Blood', '100', 'mmol/l'),
(6, 13, '2024-02-12', 'Glucose in Blood', '60', 'mmol/l'),
(7, 13, '2023-10-02', 'Glucose in Blood', '62', 'mmol/l'),
(8, 13, '2019-04-16', 'Creatinine', '1000', 'umol/L'),
(9, 12, '2024-04-27', 'Creatinine', '6', 'umol/L'),
(10, 12, '2023-06-14', 'Creatinine', '8', 'umol/L'),
(11, 10, '2016-08-19', 'Creatinine', '30', 'umol/L'),
(12, 10, '2015-11-15', 'Glucose in Blood', '22', 'mmol/l'),
(13, 11, '2024-04-30', 'Glucose in Blood', '123', 'mmol/l'),
(14, 11, '2021-11-16', 'Glucose in Blood', '33', 'mmol/l'),
(15, 11, '2022-01-31', 'Glucose in Blood', '900', 'mmol/l');

-- --------------------------------------------------------

--
-- Structure de la table `practitioner_db`
--

CREATE TABLE `practitioner_db` (
  `id_pract` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `telecom` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `communication` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `practitioner_db`
--

INSERT INTO `practitioner_db` (`id_pract`, `name`, `surname`, `qualifications`, `telecom`, `address`, `gender`, `communication`, `mail`, `tel`, `password`) VALUES
(1, 'Gaya', 'Ait Hamouda', 'Chirurgien', '0726475811', '122 rue Paul Armangot', 'male', 'fr, en, ar', 'gayaaithamouda@gmail.com', '0726475811', '8ef1349049e5512ae975cca556d7fc02'),
(2, 'William', 'Hilpert', 'Psychiatre', '0712237885', '12959 Veum Estate West Christinemouth, ME 44823-2292', 'male', 'en', 'williamhilpert@gmail.com', '0656345400', '2dab8a3a84f87594cf0b668e30d0e3e7'),
(5, 'Margot', 'Simonis', 'Neurologue', '+33712345678', '65059 Pacocha Station South Anahiview, FL 66611', 'female', 'fr, en', 'margotsimonis@gmail.com', '+33712345678', '8a8971a07c4f574de6b23b823ac91ca8');

-- --------------------------------------------------------

--
-- Structure de la table `rdv_db`
--

CREATE TABLE `rdv_db` (
  `id_rdv` int(11) NOT NULL,
  `id_pract` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secretaire_db`
--

CREATE TABLE `secretaire_db` (
  `id_secretaire` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_form`
--

CREATE TABLE `user_form` (
  `id_patient` int(11) NOT NULL,
  `id_pract` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_form`
--

INSERT INTO `user_form` (`id_patient`, `id_pract`, `nom`, `prenom`, `gender`, `birth`, `tel`, `mail`, `password`) VALUES
(10, 5, 'Graham', 'Alysa', 'female', '2000-01-10', '0790351765', 'alysagraham@gmail.com', '0e1157be4fa9c8e235ad986d162834cd'),
(11, 1, 'Stroman', 'Joseph', 'male', '1955-07-24', '0612887984', 'josephstroman@gmail.com', '9b493f90d14ed7f0735c3db22457871f'),
(12, 1, 'Effertz', 'Karina', 'male', '1999-04-12', '0792630653', 'karinaeffertz@gmail.com', 'e92dca28af8209e3d294a01c65c87ae7'),
(13, 2, 'Oumi', 'Oumi', 'female', '2002-01-10', '0762263295', 'oumioumi@gmail.com', 'f060b812e860f285ef178188f2b22568');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `immunisation_db`
--
ALTER TABLE `immunisation_db`
  ADD PRIMARY KEY (`id_vaccin`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `observations_db`
--
ALTER TABLE `observations_db`
  ADD PRIMARY KEY (`id_observations`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `practitioner_db`
--
ALTER TABLE `practitioner_db`
  ADD PRIMARY KEY (`id_pract`);

--
-- Index pour la table `rdv_db`
--
ALTER TABLE `rdv_db`
  ADD PRIMARY KEY (`id_rdv`),
  ADD KEY `id_pract` (`id_pract`);

--
-- Index pour la table `secretaire_db`
--
ALTER TABLE `secretaire_db`
  ADD PRIMARY KEY (`id_secretaire`);

--
-- Index pour la table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id_patient`),
  ADD KEY `id_pract` (`id_pract`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `immunisation_db`
--
ALTER TABLE `immunisation_db`
  MODIFY `id_vaccin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `observations_db`
--
ALTER TABLE `observations_db`
  MODIFY `id_observations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `practitioner_db`
--
ALTER TABLE `practitioner_db`
  MODIFY `id_pract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rdv_db`
--
ALTER TABLE `rdv_db`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `secretaire_db`
--
ALTER TABLE `secretaire_db`
  MODIFY `id_secretaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `immunisation_db`
--
ALTER TABLE `immunisation_db`
  ADD CONSTRAINT `immunisation_db_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `user_form` (`id_patient`);

--
-- Contraintes pour la table `observations_db`
--
ALTER TABLE `observations_db`
  ADD CONSTRAINT `observations_db_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `user_form` (`id_patient`);

--
-- Contraintes pour la table `rdv_db`
--
ALTER TABLE `rdv_db`
  ADD CONSTRAINT `rdv_db_ibfk_1` FOREIGN KEY (`id_pract`) REFERENCES `practitioner_db` (`id_pract`);

--
-- Contraintes pour la table `user_form`
--
ALTER TABLE `user_form`
  ADD CONSTRAINT `user_form_ibfk_1` FOREIGN KEY (`id_pract`) REFERENCES `practitioner_db` (`id_pract`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
