-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 13 juin 2023 à 12:35
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, '\"J\'aurais aimé que l\'amour du désordre puisse être traité avec un simple sirop contre la toux, Monsieur Poirot.\"', 1, '2023-06-12 23:29:16'),
(2, '\"Je me sens aussi perdu qu\'un chien errant dans une fête foraine.\"', 2, '2023-06-13 10:42:34'),
(3, '\"Mon personnage principal résout toujours les énigmes bien plus vite que moi. C\'est assez embarrassant.\"', 3, '2023-06-13 10:45:43'),
(4, '\"J\'ai essayé une fois de résoudre une affaire avant Poirot. J\'ai fini par suspecter le livreur de lait, le facteur et même mon propre reflet dans le miroir.\"', 4, '2023-06-13 10:51:16'),
(5, '\"Je laisse parfois les gens penser qu\'ils ont le dessus, mais c\'est juste une autre occasion pour mes petites cellules grises de faire leur magie.\"', 5, '2023-06-13 10:55:38');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Miss Lemon', '$2y$10$5B4TE4.rnjqT8/X//CmMyORRkO8T2RcV.tG5vEHZ3.S17OiS9G2Je'),
(2, 'Inspecteur Japp', '$2y$10$jRE7j/npvdLSJerf44IzDOiLz7H2GG3Bsu26x9u9Rs8fKm1sOHcg.'),
(3, 'Ariadne Oliver', '$2y$10$skuHzvJv7oeYJ6ZdUG.R8epe5nwB8kvJjT8XP8FvFAx/B6Sw2HhfW'),
(4, 'Capitaine Hastings', '$2y$10$UWuwB9zV2fJ3nb9XZwV3j.o4aS0InKhH.CDDbe34CFRa0cALrhIn2'),
(5, 'Hercule Poirot', '$2y$10$Mmar27mm../DlW6TTLtRUeJAq7wFJxbBfEmtWnbmnrWX/INjiQ7la');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
