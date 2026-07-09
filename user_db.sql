-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 mai 2023 à 00:39
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
(1, 1, '1234', 'qcghjiuytrs', '17465983', '2023-05-27', 'pmlkjhgf', 'kjhvcxw', '2023-05-07'),
(2, 2, '1586', 'mlkjhgfytr', '15573', '2023-05-22', 'vghytrev', 'pqxcwqc', '2023-05-07'),
(3, 3, '59857', 'bhynpmi', '1457', '2023-04-26', 'czxfauy', 'bjiuyscgc', '2023-05-07'),
(4, 1, '2467', 'pgghdezq', '75471', '2023-03-28', 'qvdcb', 'tergrtyj', '2023-05-07');

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
(1, 1, '2023-05-07', 'Glucose in Blood', '90', 'mg/dL'),
(2, 2, '2023-05-07', 'Body Height', '52', 'cm'),
(3, 3, '2023-05-07', 'Glucose in Blood', '500', 'g/L'),
(4, 3, '2023-05-07', 'Body Weight', '900', 'kg');

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
(1, 'Omayma', 'RAJI', 'Podologue', '+33320875847', '20 rue des petits pieds, FeetCity, 59000', 'female', 'fr, en, de, ms, ar', 'omayma.raji10@gmail.com', '+33762263395', '148537950a169109e1dc93f5f81372ff'),
(2, 'Rafik', 'DERRADJI', 'Médecin généraliste ', '+33237903280', '22 rue Henri Barbusse, Villejuif, 94800', 'male', 'fr, en, es, ms, ar', 'rafik.derradjipro@gmail.com', '+33620023990', 'dabc46e9e9d9f52fa31bf7c17f6773c1'),
(3, 'Izuku', 'MIDORIYA', 'Médecin des alters', '+33277777777', 'Lycée Yuei, Tokyo, 100-0000', 'male', 'fr, en, ja', 'alphiyarr@gmail.com', '+33677777777', 'addf46b3e8ff4656906043e54deec6aa'),
(4, 'Toshinori', 'YAGI', 'médecin des alters', '+33266666666', 'Lycée Yuei, Tokyo, 100-0000', 'male', 'fr, en, ja', 'all.might2159@gmail.com ', '+33666666666', '03ebafa2b57ec7b942fb1be71a0b3fdc');

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
(1, 1, 'azert', 'vhfgtt', 'male', '2023-05-03', '1234567899', 'sdfghjkmlkjhgfd', 'azertyubvcsfgh'),
(2, 2, 'sdfghjklkjhgqsv', 'axvhtvgf', 'sdfghkloi', '2022-05-18', '1234567899', 'zazertdddd', 'ddddttttttt'),
(3, 3, 'asdfvvgt', 'ujnbzrvf', 'gtzgvz', '2023-07-13', '1234567899', 'zergbbujniklp', 'jubykoibf'),
(4, 2, 'lalala', 'pipipi', 'male', '2023-03-08', '1231456755', 'oadieom@hmmhmh.com', 'ppaoaoaooa');

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
  MODIFY `id_vaccin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `observations_db`
--
ALTER TABLE `observations_db`
  MODIFY `id_observations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `practitioner_db`
--
ALTER TABLE `practitioner_db`
  MODIFY `id_pract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rdv_db`
--
ALTER TABLE `rdv_db`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `secretaire_db`
--
ALTER TABLE `secretaire_db`
  MODIFY `id_secretaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
