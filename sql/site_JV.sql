-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 19 avr. 2018 à 12:34
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_jv`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `texte` text NOT NULL,
  `idLien` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE `console` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `constructeur` varchar(50) NOT NULL,
  `dateSortie` date NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jeudlc`
--

CREATE TABLE `jeudlc` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `editeur` varchar(50) NOT NULL,
  `dev` varchar(50) NOT NULL,
  `dateSortie` date NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `pegi` enum('3','7','12','16','18') NOT NULL,
  `description` text NOT NULL,
  `idJeuParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeudlc`
--

INSERT INTO `jeudlc` (`id`, `nom`, `editeur`, `dev`, `dateSortie`, `prix`, `pegi`, `description`, `idJeuParent`) VALUES
(1, 'jeu1', '', '', '0000-00-00', '0.00', '3', 'Bacon ipsum dolor amet doner quis tenderloin ut mollit ad. Turkey in do enim ut minim leberkas. Spare ribs strip steak ribeye pork belly ball tip, venison tail turkey. Ea pancetta non, occaecat ullamco magna proident ut meatball t-bone et fugiat.', NULL),
(2, 'jeu2', '', '', '0000-00-00', '0.00', '3', 'Hodor! Hodor hodor, hodor hodor hodor? Hodor! Hodor hodor, hodor hodor hodor? Hodor! Hodor hodor, hodor; hodor hodor hodor hodor? Hodor, hodor... Hodor hodor hodor? Hodor hodor HODOR! Hodor hodor... Hodor hodor hodor.', NULL),
(3, 'jeu3', '', '', '0000-00-00', '0.00', '3', 'You got a real attitude problem, McFly. You\'re a slacker. You remind me of you father when he went her, he was a slacker too. Hey guys, you gotta get back in there and finish the dance. ', NULL),
(4, 'jeu4', 'yeahteam', 'yeahdev', '2015-01-12', '36.37', '16', ' Maron korin future zarbon ultimate corporation yajirobe bio-broly corporation hirudegarm towa. Bujin goten fighters raspberry corporation hirudegarm bido robot raspberry ultimate 18. Guido earth hope jackie. Guido namek ', NULL),
(5, 'jeu5', '', '', '0000-00-00', '0.00', '3', 'Well, the way they make shows is, they make one show. That show\'s called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they\'re going to make more shows.', NULL),
(6, 'jeu6', '', '', '0000-00-00', '0.00', '3', 'Cupcake ipsum dolor sit. Amet I love liquorice jujubes pudding croissant I love pudding. Apple pie macaroon toffee jujubes pie tart cookie applicake caramels. Halvah macaroon I love lollipop. Wypas I love pudding brownie cheesecake tart jelly-o.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `id` int(11) NOT NULL,
  `idTest` int(11) DEFAULT NULL,
  `idJeuDlc` int(11) NOT NULL,
  `idConsole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `texte` text NOT NULL,
  `idUser` int(11) NOT NULL,
  `idLien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `texte` text NOT NULL,
  `note` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` enum('journaliste','membre') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avis_lien1_idx` (`idLien`),
  ADD KEY `fk_avis_User1_idx` (`idUser`);

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jeudlc`
--
ALTER TABLE `jeudlc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jeuDlc_jeuDlc1_idx` (`idJeuParent`);

--
-- Index pour la table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lien_Test1_idx` (`idTest`),
  ADD KEY `fk_lien_jeuDlc1_idx` (`idJeuDlc`),
  ADD KEY `fk_lien_console1_idx` (`idConsole`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_lien1_idx` (`idLien`),
  ADD KEY `fk_news_User1_idx` (`idUser`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Test_User1_idx` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jeudlc`
--
ALTER TABLE `jeudlc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `lien`
--
ALTER TABLE `lien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avis_lien1` FOREIGN KEY (`idLien`) REFERENCES `lien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `jeudlc`
--
ALTER TABLE `jeudlc`
  ADD CONSTRAINT `fk_jeuDlc_jeuDlc1` FOREIGN KEY (`idJeuParent`) REFERENCES `jeudlc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lien`
--
ALTER TABLE `lien`
  ADD CONSTRAINT `fk_lien_Test1` FOREIGN KEY (`idTest`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lien_console1` FOREIGN KEY (`idConsole`) REFERENCES `console` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lien_jeuDlc1` FOREIGN KEY (`idJeuDlc`) REFERENCES `jeudlc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_lien1` FOREIGN KEY (`idLien`) REFERENCES `lien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_Test_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
