-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2019 at 07:47 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `amitie`
--

CREATE TABLE `amitie` (
  `id_amitie` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `decision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_posteur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(2555) NOT NULL,
  `etat` int(2) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id`, `pseudo`, `email`, `mdp`, `etat`, `date_creation`) VALUES
(1, 'iàpjp', 'puik', 'uçu', 0, '0000-00-00 00:00:00'),
(2, 'gergre', 'gresgfd@reger.fezf', 'greger', 1, '2019-12-24 22:15:49'),
(3, '', 'gresgfd@reger.fezf', 'fref', 1, '2019-12-24 22:16:41'),
(4, 'y-(\'y-', 'gresgfd@reger.fezf', 'yteytr', 1, '2019-12-24 22:21:31'),
(5, '', 'gresgfd@reger.fezf', 'egrf', 1, '2019-12-24 22:52:09'),
(6, '', 'grfezfesgfd@reger.fezf', 'zfe', 1, '2019-12-24 23:00:54'),
(7, '', 'gresgfd@reger.fezf', 'ger', 1, '2019-12-24 23:40:24'),
(8, '', 'gresgfd@reger.fezf', 'aefez', 1, '2019-12-24 23:46:54'),
(9, '', 'gresgfd@reger.fezf', 'pup', 1, '2019-12-25 00:39:00'),
(10, 'fzefez', 'GETGRG@FZEF.com', 'fezfze', 1, '2019-12-25 00:41:05'),
(11, 'dsf', 'bfdbdfbd@edfyt.ezsg', 'fdsfggre', 1, '2019-12-25 00:48:15'),
(12, 'roosvelt', 'delano@gaiml.com', 'pancrea', 1, '2019-12-25 06:02:16'),
(13, 'emerite', 'emerite@gmail.com', 'tatous', 1, '2019-12-26 04:27:11'),
(14, 'emerite', 'emerite@gmail.com', 'afefz', 1, '2019-12-26 04:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(50) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `membre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msg_groupe`
--

CREATE TABLE `msg_groupe` (
  `id_msg_group` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msg_prive`
--

CREATE TABLE `msg_prive` (
  `id_msg` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `date_reception` datetime NOT NULL,
  `contenu` text NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `id_posteur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statut`
--

CREATE TABLE `statut` (
  `id_statu` int(11) NOT NULL,
  `id_posteur` int(11) NOT NULL,
  `composants` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `date_naiss` date NOT NULL,
  `profil` varchar(100) NOT NULL,
  `lieux` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amitie`
--
ALTER TABLE `amitie`
  ADD PRIMARY KEY (`id_amitie`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Indexes for table `msg_groupe`
--
ALTER TABLE `msg_groupe`
  ADD PRIMARY KEY (`id_msg_group`);

--
-- Indexes for table `msg_prive`
--
ALTER TABLE `msg_prive`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`);

--
-- Indexes for table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statu`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amitie`
--
ALTER TABLE `amitie`
  MODIFY `id_amitie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msg_groupe`
--
ALTER TABLE `msg_groupe`
  MODIFY `id_msg_group` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msg_prive`
--
ALTER TABLE `msg_prive`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
