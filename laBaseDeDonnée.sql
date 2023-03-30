-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mars 2023 à 08:40
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saesondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administre`
--

CREATE TABLE `administre` (
  `idAdministré` int(11) NOT NULL,
  `nomAdministré` varchar(50) NOT NULL,
  `prénomAdministré` varchar(50) NOT NULL,
  `dateNaissAdministré` date NOT NULL,
  `adresseAdministré` varchar(50) NOT NULL,
  `codePostalAdministré` int(11) NOT NULL,
  `VilleAdministré` varchar(50) NOT NULL,
  `numTelAdministré` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administre`
--

INSERT INTO `administre` (`idAdministré`, `nomAdministré`, `prénomAdministré`, `dateNaissAdministré`, `adresseAdministré`, `codePostalAdministré`, `VilleAdministré`, `numTelAdministré`) VALUES
(2, 'zerfzerf', 'zerfzerf', '2023-03-01', 'zerfzer', 0, 'fzerfezrf', NULL),
(3, 'vsdfvdsfv', 'dsfvdsf', '2023-03-03', 'dsfvdsfv', 0, 'sdfvdsfv', NULL),
(6, 'qsdfqdsf', 'qsdfqdsf', '2023-03-07', 'qsdfqdsf', 0, 'qdsfqsdf', NULL),
(7, 'dsfvdsf', 'vsdfvsdf', '2023-03-16', 'fdsvfds', 0, 'svsdfvsdfv', NULL),
(9, 'dqsfqsdf', 'qsdfqsdf', '2023-03-03', 'fqdsfqsd', 0, 'fqsdfqdsf', NULL),
(11, 'erzfzerf', 'zerfzerf', '2023-03-02', 'fzerfzerf', 0, 'zerfzerfz', NULL),
(13, 'sdfv', 'sdfv', '2023-03-03', 'vsdfv', 0, 'dsfvsdfv', NULL),
(14, 'qsdvqds', 'vqsdv', '2023-03-10', 'vqdsvqds', 0, 'qdsvqds', 12212323),
(15, 'sdqfqsdf', 'dsqfqdsf', '2023-03-02', 'dqsfqdsf', 0, 'sfqsdf', NULL),
(16, 'caca', 'dqsqsd', '2023-03-09', 'cqdscqsd', 0, 'cqsdcqsdc', NULL),
(17, 'C', 'C', '2023-03-08', 'C', 0, 'C', 123),
(26, 'TEST', 'fsqdcqdsc', '2023-03-08', 'qcqdscq', 0, 'cqdscqsdc', NULL),
(27, 'Mahydine', 'Lazzouli', '2003-04-28', '145 avenue de versailles, 75016 paris', 75016, 'Paris', NULL),
(28, 'Mahydineqsdc', 'qsdcqdsc', '2023-03-09', 'qsdcqsd', 0, 'cqdscqsdc', 0),
(29, 'Mahydine', 'qdsfqdsfq', '2023-03-01', 'qsdfqsdf', 213, 'qsdfqsdf', NULL),
(30, 'AZZ', 'fqsdfqsd', '2023-03-09', 'ad', 213, 'efez', NULL),
(31, 'Berger', '123', '2023-03-15', 'sdcqsdcq', 23123, '2343241', NULL),
(32, '4', 'qdsfqsdf', '2023-04-07', '12312', 234134, '13412341', NULL),
(33, 'ZAEFAEZFA', 'ZEFAZEFAEZF', '2023-02-28', 'AZEFAEZF', 124124, 'ZAEFAZEFAZ', NULL),
(34, 'HACHIMI', 'LEPIPI', '2023-03-23', 'sqcqsd', 123124, 'sdcqs', NULL),
(36, 'Yanis', 'Sacdeau', '2023-03-09', '145 avenue de versailles, 75016 paris', 213414, 'ZEFEZF', NULL),
(37, 'Mahydine', 'LeBogoss', '2023-03-16', '145 avenue de versailles, 75016 paris', 123, '123', NULL),
(38, 'MahydineULTIMETEST', 'caca', '2023-03-24', 'azeaze', 124324, 'cfqdsfds', NULL),
(39, 'Final', 'Final', '2023-03-08', 'Final', 0, 'Final', NULL),
(40, 'derniertest', 'derniertest', '2023-03-24', 'derniertest', 123, 'derniertest', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administre`
--
ALTER TABLE `administre`
  ADD PRIMARY KEY (`idAdministré`),
  ADD UNIQUE KEY `numTelAdministré` (`numTelAdministré`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administre`
--
ALTER TABLE `administre`
  MODIFY `idAdministré` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
