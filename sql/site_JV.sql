-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 23 avr. 2018 à 12:13
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
CREATE DATABASE IF NOT EXISTS `site_jv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `site_jv`;

-- --------------------------------------------------------
--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `texte` text NOT NULL,
  `idLien` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `texte` text NOT NULL,
  `idUser` int(11) NOT NULL,
  `idLien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE `lien` (
  `id` int(11) NOT NULL,
  `idTest` int(11) DEFAULT NULL,
  `idJeuDlc` int(11) NOT NULL,
  `idConsole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `console`
--

DROP TABLE IF EXISTS `console`;
CREATE TABLE `console` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `constructeur` varchar(50) NOT NULL,
  `dateSortie` date NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `jeudlc`
--

DROP TABLE IF EXISTS `jeudlc`;
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
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `texte` text NOT NULL,
  `note` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` enum('journaliste','membre') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mdp`, `pseudo`, `email`, `type`) VALUES
(1, 'Super', 'Administrateur', 'admin', 'admin', 'admin@site_jv.com', 'journaliste'),
(2, '', 'Valentin', 'valentin', 'kalyps', '', 'journaliste'),
(3, '', 'Leo', 'leo', 'Leo', '', 'journaliste'),
(4, '', 'Arnaud', 'arnaud', 'arnaud', '', 'journaliste'),
(5, '', 'Eric', 'eric', 'Reek', '', 'journaliste'),
(6, '', 'Henry', 'henry', 'Nazou', '', 'journaliste'),
(7, '', 'Adrien', 'adrien', 'Adrien21', '', 'journaliste');

-- --------------------------------------------------------
--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `titre`, `date`, `texte`, `note`, `idUser`) VALUES
(1, ' Assassin\'s Creed Origins : le bijou tant attendu ', '2017-10-26 13:00:00', 'En choisissant de s\'inspirer de ce qui se fait de mieux sur le marché pour son système de combat, l\'exploration et l\'interface, Assassin\'s Creed Origins fait figure de lifting bienvenu pour une série qui en avait besoin. L\'épisode se dote au passage d\'une narration et d\'un scénario plus travaillés que jamais et portés par une galerie de personnages très réussis. Ajoutez à cela une reconstitution une nouvelle fois incroyable de l\'Égypte antique et un monde ouvert riche en contenu scénarisé et vous obtenez l\'épisode d\'Assassin\'s Creed le plus abouti depuis des années, malgré quelques soucis qui l\'empêchent encore de viser plus haut : outre quelques bugs et légers ralentissements inhérents aux mondes ouverts, nous pourrons ainsi regretter le manque de clarté du système de détection en infiltration et le retour de la métahistoire du présent, pas encore pleinement convaincant. Des défauts qui ne pèsent toutefois pas bien lourd face aux nombreuses qualités de cet opus, mais qui ont le mérite de laisser encore une marge de manœuvre pour nous livrer un prochain épisode encore plus mémorable.', 18, 2),
(2, 'Assassin\'s Creed Origins : The Hidden Ones : Bien', '2018-01-25 16:00:00', 'The Hidden Ones pèche par son caractère expéditif, qui ne laisse pas le temps à son scénario et aux personnages qui y figurent de prendre de l\'épaisseur, là où nous aurions aimé, vu le postulat de départ, assister à une intrigue riche en révélations. D\'une durée de vie de 7/8 heures si vous voulez tout faire, tout voir, le DLC ne propose rien de fondamentalement neuf, récite avec rigueur une recette déjà éprouvée dans le jeu de base et minimise la prise de risque. Toutefois, si vous n\'avez pas d\'attentes trop élevées concernant l\'originalité ou la profondeur de l\'écriture, The Hidden Ones vous propose des quêtes annexes de qualité dans des environnements toujours aussi plaisants à parcourir. Une expérience pas désagréable, à acquérir en connaissance de cause.', 14, 7),
(3, 'Dragon Ball Fighter Z: Cool !!!', '2018-01-22 10:12:00', 'Le meilleur jeu Dragon Ball jamais conçu. Tout simplement. Oui, certains pourront estimer qu\'il manque quelques personnages mais regardons les choses en face : jamais un jeu Dragon Ball n\'avait bénéficié d\'une telle réalisation, d\'un tel soin du détail. FighterZ est réussi de bout en bout, dans sa direction artistique jusque dans la réalisation de ses intentions. Son action frénétique et hypnotique est sublimée par une direction artistique magistrale, qui fait honneur à l\'oeuvre d\'Akira Toriyama. Mais plus qu\'un excellent produit à destination des fans de la série, c\'est aussi un superbe jeu de combat, à la fois riche et inventif, malin et brutal. Avec Dragon Ball FighterZ, ce sont presque 30 années d\'attente qui ont été récompensées : le jeu Dragon Ball ultime est enfin là.', 16, 4),
(4, 'Monster Hunter World: Une totale réussite !', '2018-01-25 17:35:00', 'Le double pari est donc réussi pour Capcom qui propose avec Monster Hunter World un épisode aux mécaniques en partie retravaillées, doté de très solides arguments capables d’attirer aussi bien les chasseurs vétérans que les joueurs débutants. Cet opus du renouveau dispose de solides arguments pour vous convaincre : de vastes zones bourrées à ras-bord d\'interactions, un casting de nouveaux monstres très convaincant, un mode multi à l’accès enfin intuitif, une jouabilité jouissive et sans faille et, pour couronner le tout, la promesse d’ajouts de contenus réguliers et gratuits de la part des développeurs. Cette vision sur le long terme permet de minimiser l’impact d’un bestiaire et d’environnements quelque peu limités au lancement du jeu. Monster Hunter World représente clairement l’avenir de la franchise, un avenir qui s\'appréhende sous les meilleurs augures. Vous voilà prévenus, alors foncez et que la chasse commence !', 17, 6),
(5, 'Sea of Thieves: L’aventure pirate', '2018-03-22 14:47:14', 'Sea of Thieves donne de multiples outils aux joueurs pour qu’ils plongent, ensemble, dans de grandes aventures maritimes à base de petites quêtes et d’éminents affrontements. Avec un système d’XP faisant la part belle aux améliorations strictement cosmétiques, le titre de Rare mise sur les voyages parcourus plutôt que sur la destination. L’intérêt ne réside en fait pas dans les quêtes en elles-mêmes, mais dans tout ce qui gravite autour. Chaque excursion peut potentiellement réserver des moments mémorables, pour peu que l’on trouve les bonnes personnes avec qui partir en mer. Derrière l’aspect cartoon de sa direction artistique et ses jolis graphismes, Sea of Thieves est en fait impitoyable envers les joueurs désorganisés et solitaires. Ses missions peu variées et ses îles trop semblables l’empêchent cependant d’accéder à la fontaine de jouvence. Annoncé comme un jeu service au contenu régulièrement mis à jour, l’abonnement via Game Pass est surement le meilleur moyen de goûter au grog concocté par Rare sans risquer de hoqueter sur son prix fort.', 15, 5),
(6, 'Farcry 5: Une très bonne aventure !', '2018-03-26 15:10:20', 'Outre un renouvellement louable de son système de progression, Far Cry 5 a eu la bonne idée de s’affranchir des éléments parasites - tours radios, craft fastidieux en tête - des précédents opus et d’épurer son HUD pour nous offrir une aventure immersive et fluide. Le dépoussiérage de la licence est donc bien visible et très appréciable sur le fond, mais s’avère plus discret sur la forme. En effet, malgré une histoire plaisante portée par des antagonistes convaincants, ce nouvel opus reprend religieusement le cahier des charges de ses aînés et ne s’avère audacieux que par sa conclusion, provoquant ainsi chez le joueur un sentiment trop régulier de déjà-vu. À cela, il faut ajouter une intelligence artificielle laborieuse qui commence à accuser le poids des années et des mécaniques de jeux certes excellentes, mais qui semblent déjà avoir atteint leur potentiel maximum. Si le caractère un brin redondant de la formule ne vous gêne pas ou si vous n’avez encore jamais touché un Far Cry, n’hésitez pas, l’épisode garde suffisamment d’atouts pour vous convaincre. Dans le cas contraire, la question de son acquisition peut se poser.', 16, 3),
(7, 'God of War: Un jeu béni des dieux ', '2018-04-19 17:27:43', 'Kratos tranche, découpe, mais frappe avant tout en plein cœur du joueur. Tour à tour féroce, contemplatif, émouvant et drôle, God of War redéfinit la série éponyme sans pour autant réfuter son passé auquel il est intimement lié par son histoire. Nul doute que cet opus ne mettra pas tous les fans d\'accord car en fonction des attentes, l\'histoire de Kratos et d\'Atreus vous parlera sans doute plus ou moins. Pourtant, au-delà des choix opérés à tous les niveaux par les développeurs, God of War respire la sincérité et reste un gigantesque morceau de bravoure mû par son étonnante narration et sa volonté farouche de faire évoluer son héros tout en proposant une aventure incroyablement généreuse. God of War avait marqué la PS2 et PS3 de son empreinte, ce nouveau volet s\'impose de lui-même sur PS4 comme le meilleur beat\'em all de la machine et accessoirement le meilleur représentant actuel du genre, rien de moins.', 19, 4);


-- --------------------------------------------------------
--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`id`, `nom`, `constructeur`, `dateSortie`, `prix`) VALUES
(1, 'Xbox One X', 'Microsoft', '2017-11-07', '499.00'),
(2, 'Nintendo Switch', 'Nintendo', '2017-03-03', '299.00'),
(3, 'PS4', 'Sony', '2013-11-29', '399.00'),
(4, 'Xbox', 'Microsoft', '2013-11-22', '499.00'),
(5, 'Wii U', 'Nintendo', '2012-11-30', '349.00');

-- --------------------------------------------------------
--
-- Déchargement des données de la table `jeudlc`
--

INSERT INTO `jeudlc` (`id`, `nom`, `editeur`, `dev`, `dateSortie`, `prix`, `pegi`, `description`, `idJeuParent`) VALUES
(1, 'God of War ', 'Sony Computer Entertainment', 'Sony Santa Monica', '2018-04-20', '69.00', '18', 'Dans ce nouvel épisode de God Of War, le héros évoluera dans un monde aux inspirations nordiques, très forestier et montagneux.', NULL),
(2, 'Farcry 5', 'Ubisoft', 'Ubisoft Montreal', '2018-03-27', '60.00', '18', ' Far Cry 5 est un jeu d\'action / aventure jouable en solo. Bienvenue à Hope County dans le Montana, terre de liberté et de bravoure qui abrite un culte fanatique prêchant la fin du monde : Eden’s Gate.', NULL),
(3, 'Sea of Thieves', 'Rareware', 'Rareware', '2018-03-20', '49.00', '12', 'Sea of Thieves est le nouveau jeu des créateurs de Banjo-Kazooie, Rare Software. Ce titre vous plongera dans l\'univers des pirates, où vous pourrez naviguer soit en solitaire, soit à plusieurs sur les mers et mener des batailles navales.', NULL),
(4, 'Monster Hunter World', 'Capcom', 'Capcom', '2018-01-26', '49.00', '16', 'La dernière entrée de la série Monster Hunter. Plus complet que jamais, le jeu transporte le joueur au travers de batailles contre de terribles monstres et de magnifiques paysages.', NULL),
(5, 'Dragon Ball Fighter Z', 'Bandai Namco Entertainment', 'Arc System Works', '2018-01-26', '52.00', '12', ' Dragon Ball FighterZ est un jeu de combat 2D développé par Arc System Works et édité par Bandai Namco. La franchise Dragon Ball met en scène les personnages iconiques de la série dans des affrontements explosifs en 3 versus 3.', NULL),
(6, 'Assassin\'s Creed Origins', 'Ubisoft', 'Ubisoft Montreal  ', '2017-10-27', '59.00', '18', 'Assassin\'s Creed Origins est un action RPG en monde ouvert incluant des mécaniques d\'infiltration. Le titre vous fait visiter les terres mystérieuses de l\'Egypte antique dans la peau de Bayek.', NULL),
(7, 'Assassin\'s Creed Origins : The Hidden Ones', 'Ubisoft', 'Ubisoft Montreal', '2018-01-23', '35.00', '18', ' Assassin\'s Creed Origins : The Hidden Ones est le premier DLC de Assassin\'s Creed Origins sur PS4. Il permet de continuer l\'aventure avec Bayek plusieurs années après les événements du jeu de base et de découvrir une nouvelle région.', 6),
(8, 'Street Fighter 30th Anniversary Collection', 'Capcom', 'Capcom', '2018-05-29', '39.90', '12', 'Avec Street Fighter 30th Anniversary Collection, Capcom vise les joueurs qui veulent s\'amuser entre potes le temps d\'une soirée. On retrouve 12 jeux de la licence principale, y compris le tout premier opus sorti en 1987. ', NULL);

-- --------------------------------------------------------
--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`id`, `idTest`, `idJeuDlc`, `idConsole`) VALUES
(1, 7, 1, 3),
(2, 6, 2, 1),
(3, 6, 2, 3),
(5, 5, 3, 1),
(6, 4, 4, 1),
(7, 4, 4, 3),
(8, 3, 5, 1),
(9, NULL, 5, 3),
(10, NULL, 8, 1),
(11, NULL, 8, 2),
(12, NULL, 8, 3),
(13, 1, 6, 1),
(14, 1, 6, 3),
(15, 2, 7, 1),
(16, 2, 7, 3);

-- --------------------------------------------------------
--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `note`, `date`, `texte`, `idLien`, `idUser`) VALUES
(1, 11, '2018-04-09 08:14:00', 'Ce DLC manque d\'ambition, sur tous les plans. Il se laisse boucler sans déplaisir particulier (enfin pour peu qu\'on en attende rien de particulier) mais le contenu relativement banal qu\'il offre n\'est pas à la hauteur du prix affiché ne serait-ce qu\'en le comparant au jeu de base. Là où ce dernier offrait environ 80-90h de jeu pour 50€, ce DLC en aligne 5 pour 10 balles.\r\n\r\nLe gameplay ne change pas vu que les mécaniques du jeu original sont simplement portées dans une nouvelle région : Le Sinaï. Seules les zones changent mais le reste c\'est la même chose : tanières à décimer, camps à infiltrer, capitaines à occire, trésors à piller (qui a dit pas de collectibles dans le jeu de base déjà?) et quelques quêtes sympas mais qui ne justifient jamais les 10€ demandés.\r\n\r\nLe DLC accuse une véritable paresse d\'exploitation scénaristique avec le développement d\'une confrérie qui peine à ressortir tout au long des quêtes qui y sont liées, donnant une vraie impression de survoler encore une fois les origines de cette confrérie qui tenaient sur les trente dernières minutes du jeu de base. J\'ajoute que vous ne mettrez certainement pas cinq heures pour venir à bout des quêtes sur la confrérie ce qui renforce encore ce sentiment de survol.\r\n\r\nUbisoft nous gratifie d\'un DLC paresseux qui ne se foule jamais et se contente du strict minimum. Ils auraient mieux fait de l\'intégrer au jeu de base ne serait-ce que par respect pour le développement de la confrérie afin d\'éviter cet arrière-goût de contenu retiré du jeu original vendu par la suite. Il va sans dire qu\'Ubisoft a tout simplement intérêt à se sortir les lames secrètes du c*l pour le DLC de Mars parce que pour l\'heure, je vois vraiment pas comment on peut justifier l\'achat d\'un Season Pass dont je le rappelle la valeur officielle est de 40€. Va falloir trouver mieux que des tenues et du remplissage artificiel.\r\n', 16, 3),
(2, 18, '2018-04-16 12:18:28', 'magnifique graphisme à couper le souffle ! le gameplay orienté plus RPG est bien plus plaisant et moins répétitif ! les quêtes secondaire très bien scénarisé ! un petit chef d\'oeuvre, le meilleur de la ligné des AC ', 16, 7),
(3, 14, '2018-04-05 18:32:00', '1 ère DLC de cet Assassin\'s Creed, il permet de voir les aléas de la confrérie quelques temps après sa création (une notoriété causant des ennuis notamment). Elle nous offre également un autre lieu de la map qui est bien plus petite que celle de la seconde DLC (que j\'ai déjà fait avant ce commentaire). D\'un point de vue général, il n\'y a donc pas de grande nouveauté si ce n\'est l\'apparition de tyroliennes (un nouveau costume & un nouveau méchant)... Bref si vous savez pas quelle DLC prendre je vous conseille la 2 nde qui reste quand même plus large et longue à réaliser. ', 15, 2),
(4, 19, '2018-03-06 12:18:38', 'Une claque intersidérale en terme de mise en scène, d\'interprétation, des moments d\'anthologie vidéoludique, j\'ai adoré ce God of War, qui prend une tournure encore plus spectaculaire avec la caméra à l\'épaule et son gameplay plus varié alternant de manière équilibrée les phases d\'exploration, d\'énigme (bien pensée au passage) et de combats.\r\nLes combats justement, jouissif est le mot qui me vient immédiatement à l\'esprit, au départ j\'ai eu le sentiment de jouer à un Souls, combat plutôt posé, avec un Kratos qui reprend tranquillement du service, puis au fur et à mesure que l\'on avance dans l\'aventure, on retrouve notre cher Spartiate énervé ruant ses ennemis de coups, les combats deviennent alors bien plus spectaculaires et encore plus jouissif.\r\nBref pour résumer, j\'ai passé une trentaine d\'heures inoubliables, les seuls points qui me chagrines, les fameux Royaumes, 3 d\'entres eux ne sont à priori pas visitables (Asgard, Vanaheim et Svartalfheim) alors qu\'ils apparaissent bien dans l\'arbre permettant la voyage entre les Royaumes.\r\nEt enfin autres déceptions, les boss liés à l\'histoire sont peu nombreux, Santa Monica a visiblement fait le choix d\'en laisser beaucoup de côté pour les prochains épisodes...', 1, 4),
(5, 17, '2018-04-10 16:22:38', 'On retrouve les mécaniques des far cry. on est donc pas perdu, le jeu est magnifique graphiquement (aucun problème sur Xbox x).\r\nles personnages sont tout de suite prenant, ainsi que l\'histoire. Je n\'ai que quelques heures de jeu pour l\'instant, mais la coop donne de la fraîcheur et on a vraiment envie de continuer. :)', 2, 6),
(6, 12, '2018-04-01 08:28:23', 'Sur les diverses promotions et teasers ce DBZ semblait exceptionnel, le meilleur qu\'on ait jamais eu en jeux videos, pourtant dans les faits il est bien loin de tout ça.\r\n\r\nAlors certes graphiquement il est juste monstrueux, il n\'y a rien à dire là dessus, il reprend l\'aspect graphique de la série trait pour trait, c\'est bluffant.\r\n\r\nLe gameplay est simple et intuitif tout en étant technique, par contre il est vraiment bourrin et cafouillis, puis je ne raffole pas de l\'auto-combo.\r\nDe plus on est vraiment trop proche d\'un Marvel vs Capcom en fait dans cet aspect là, on dirait typiquement ce jeu mais avec un skin DBZ.\r\n\r\nLe mode solo est horrible : alors ok le mode solo, ce n\'est pas forcément le point fort d\'un jeu de combat, mais là on parle d\'un DBZ d\'une et de deux avait il besoin de le rendre aussi chiant et monotone ?\r\n\r\nJe ne suis pas non plus très fan qu\'on soit obligé d\'aller sur un Lobby pour jouer au jeu, ce qui suppose donc qu\'il faut une connexion pour pouvoir y jouer.\r\n\r\nBref au final après une dizaine d\'heures de jeu, la magie ne fait plus trop office car j\'ai vraiment trop l\'impression d\'un Marvel Capcom mod DBZ comme dit plus haut.\r\n', 9, 7),
(7, 2, '2018-04-11 09:27:32', 'Enfaite les gars ils ont modélisé des textures 3d puis au dernier moment ils se sont dit ont va mettre des skins dragon ball, et le pire c\'est les jean-casu qui applaudissent le jeu parce que c\'est la première fois de leurs vie qu\'ils font des quart de cercle sur un jeu', 9, 3),
(8, 10, '2018-03-08 11:20:16', 'Un bon jeu, mais avouons le, il manque cruellement de contenu,\r\nSinon plus qu\'a attendre les maj qui arriveront très vite espérons le.\r\nAprès sa reste fun entre amis et c\'est l\'un des points fort de se jeu.', 5, 5),
(9, 18, '2018-02-08 19:22:28', 'Génial mais l histoire aurait pu être encore plus travaillée, l assistante me soule carrément et n arrête pas de parler pour rien et le combats contre le Zorah et un peut lent mais si non rien à redire.', 6, 3),
(10, 17, '2018-04-06 18:19:00', 'une reussite totale ! etant grand fan de la serie, je trouve qu\'il est au dessus de ce que l\'on aurait pu imaginer, il est magnifique, le gameplay est extra (il faudra tout de meme quelques heures de jeu pour s\'habituer aux touches et aux differents systèmes, surtout pour les nouveaux joueur)\r\nles monstres sont superbes, les écosystèmes sont magiques, les cartes sont toute plus belles les unes que les autres et même après plus de 50h de jeu j\'en découvre encore !\r\nles armes sont toute très interessantes et les armures vraiment classes pour la plupart !\r\nla coop demandera un peu d\'expérience pour connaitre ses limites et ses possibilités, mais cela vaux le coup =)\r\n\r\nje recommande très fortement pour ceux qui recherche le frisson de la chasse !\r\n', 6, 4),
(11, 18, '2018-03-16 00:00:00', 'C’est une bombe ce jeu, mérite quelque ajustement graphique mais ils est trop bien et je le conseil aux autre joueurs/joueuses qui ne l’ont pas encore aller y foncé...', 6, 7),
(14, 19, '2018-02-19 16:22:23', 'Paysage splendide représentation de la culture égyptienne et grecque magnifique personnage intéressant un nouveau système de compétence plaisant et une prise en main difficile au début mais on s\'y habitue à la fin !!! Merci Ubisoft pour ce jeu qui fait plaiz\'', 13, 4),
(15, 18, '2018-04-12 19:34:21', 'Jeu très complet avec de beau graphismes sur Xbox One et Tv Full HD.\r\nUne carte gigantesque, détaillée et vivante.\r\nUn RPG basique, mais un très bon Assassin\'s Creed, n’hésitez pas une seconde :ok:', 13, 2),
(16, 20, '2018-01-16 21:39:27', 'magnifique l\'Égypte un ptit brin de RPG dans assassin creed sa fait le plus grand bien quelques bug mais rien de bien méchant le système de sauvegarde est très bien un jeux à avoir dès la sortie :)', 14, 6);

-- --------------------------------------------------------
--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `date`, `texte`, `idUser`, `idLien`) VALUES
(1, 'God of War : le patch 1.12', '2018-04-23 09:07:48', 'Déjà bien fourni en patchs pour son lancement, avec près de 7,4 Go à télécharger dès le premier jour, God of War en a accueilli un nouveau hier : le patch 1.12. Celui-ci vient corriger le problème d\'affichage des textes, en ajoutant une option dans les paramètres permettant de les agrandir. De quoi soulager les yeux des joueurs, qui n\'auront plus besoin de s\'approcher à quelques centimètres de leur écran pour déchiffrer les textes qui défilent. Un patch pesant une soixantaine de Mo, qui s\'accompagne également de correction de bugs, ainsi que d\'améliorations de stabilité et de performance.', 3, 1),
(2, 'Far Cry 5 : un événement temporaire en mode Arcade', '2018-04-11 18:25:10', 'Ubisoft nous annonce le lancement d\'Arcade Dawn, un événement qui se terminera le 17 avril, et au cours duquel nous pouvons remporter des objets in-game. Pour cela, rien de plus simple : il suffit de... jouer au mode Arcade, durant 40 minutes, et nous gagnons un Vector .45 ACP aux couleurs chatoyantes. Également, si la communauté accumule une durée totale de 50.000 heures de jeu, chacun des participants repartira avec une tenue spéciale.', 6, 2),
(3, 'Far Cry 5 : un événement temporaire en mode Arcade', '2018-04-11 18:24:13', 'Ubisoft nous annonce le lancement d\'Arcade Dawn, un événement qui se terminera le 17 avril, et au cours duquel nous pouvons remporter des objets in-game. Pour cela, rien de plus simple : il suffit de... jouer au mode Arcade, durant 40 minutes, et nous gagnons un Vector .45 ACP aux couleurs chatoyantes. Également, si la communauté accumule une durée totale de 50.000 heures de jeu, chacun des participants repartira avec une tenue spéciale.', 6, 3),
(4, 'Sea of Thieves : place à la mise à jour 1.0.3', '2018-04-12 09:36:24', 'Le studio Rare nous informe sur ses forums que suite à une maintenance prévue pour entre 10 heures et 15 heures aujourd\'hui, une mise à jour d\'1,20 Go apparaîtra et apportera les éléments suivants :\r\n\r\n    Un message sur le bateau des Damnés, rappelant qu\'il est possible de couler sa propre coquille de noix si nous sommes dans une position trop délicate.\r\n    La réduction des dégâts du tromblon et l\'augmentation des dégâts du fusil à lunette.\r\n    Sur PC : augmentation de la sensibilité par défaut de la souris. Un réglage sera possible avec une future update. La molette va faire partie des boutons sur lesquels il est possible de mapper des contrôles.\r\n    Le chat audio \"non-directionnel\" ne permet plus d\'être entendu par tout le monde.\r\n    Correction d\'un bug empêchant de s\'équiper d\'une arme secondaire.\r\n    Les joueurs seront désormais avertis des maintenances de serveurs au minimum 30 minutes avant l\'opération.\r\n    Déploiement de serveurs en Amérique du Sud.\r\n    Correction de problèmes de crashes, aussi bien côté serveur que côté client.', 7, 5),
(5, 'Monster Hunter World : l\'arrivée de Sakura ', '2018-04-21 16:20:49', 'Tandis que nous prenions l\'apparence de Ryu en février, c\'est au tour de la jeune femme de faire son entrée dans l\'action-RPG de Capcom. L\'entreprise a effectivement précisé que nous pourrons découvrir une quête du 4 au 10 mai, dans laquelle il s\'agira de combattre... un Rathian sakura, bien évidemment. Cette quête en trois actes, nécessitant d\'avoir un personnage de niveau 12, permettra d\'obtenir les composants requis pour l\'élaboration de la skin.', 5, 7),
(6, 'Monster Hunter World : le festival du printemps', '2018-04-18 11:15:22', 'Comme Capcom l\'avait annoncé, le festival célébrant le retour des beaux jours doit s\'arrêter ce jeudi 19 avril, et c\'est donc le moment ou jamais de terminer ce que vous avez à faire. Pour rappel, l\'event redécore le hub du jeu, et propose surtout une sélection de quêtes, permettant de crafter l\'armure Printemps mais aussi les objets des événements précédents, comme la tenue de Ryu ou le chapeau de Tortilleur.', 3, 6),
(7, 'Dragon Ball FighterZ : Zamasu fusionné en DLC', '2018-04-19 16:10:16', 'Après la dernière mise à jour de Dragon Ball FighterZ, les joueurs impatients de connaître les prochains personnages en DLC ont fouiné dans les fichiers du jeu en quête d\'informations. Leur recherche a été fructueuse, puisque des éléments faisant mention de Vegeto Blue et de Zamasu fusionné ont été trouvés, et le dernier V-Jump semble confirmer une partie de ces informations. Une pleine page annonce officiellement que le personnage issu de la fusion entre Black Goku et Zamasu du futur fera bien son entrée sur le ring.\r\n\r\nOn y apprend également que ses compétences lui permettront notamment de voler. Après avoir lancé un coup spécial, Zamasu fusionné passera en état de vol, et pourra alors se déplacer dans l\'une des huit directions possibles. Il sera évidemment possible de lancer son attaque de sphère \"Holy Wrath\", ainsi que l\'attaque \"Lightning of Absolution\", qui lui fait tirer des projectiles violets dans tous les sens. Il ne reste plus qu\'à attendre plus d\'informations de la part de Bandai Namco, notamment pour confirmer si Vegeto Blue accompagnera bel et bien Zamasu fusionné ou non, et à quelle date.', 4, 8),
(8, 'Street Fighter 30th: La collector sur Xbox', '2018-04-13 17:09:54', 'Ce sera donc à partir de ce matin, 10 heures, que vous pourrez précommander la version collector de Street Fighter 30th Anniversary Collection sur Xbox One, Switch et PS4. Dans tous les cas les stocks seront limités et il faudra se connecter à 10 heures pour connaitre le prix, qui n\'a toujours pas été communiqué pour le moment. Au niveau du contenu vous pourrez donc avoir le jeu sur la plateforme de votre choix, accompagné d\'un livre de 80 pages au format A5 avec couverture rigide sur l’histoire de Street Fighter, quatre lithographies au format A5, et une boite collector rétro.', 6, 10),
(9, 'Street Fighter 30th Anniversary prend date', '2018-04-20 14:11:48', 'Annoncé à la mi-décembre, Street Fighter 30th Anniversary Collection est une compilation de 12 titres de la mythique licence de jeux de combat. Ce dernier vient de préciser le jour de sa sortie après nous avoir annoncé le mois.\r\n\r\nC\'est donc le 29 mai que Capcom permettra aux joueurs de lancer le titre sur PC, PlayStation 4, Switch ou encore Xbox One. Pour ce qui est de la liste des 12 jeux inclus, la voici :\r\n\r\n    Street Fighter\r\n    Street Fighter II\r\n    Street Fighter 2 : Champion Edition\r\n    Street Fighter 2 : Hyper Fighting\r\n    Super Street Fighter 2\r\n    Super Street Fighter 2 : Turbo\r\n    Street Fighter Alpha\r\n    Street Fighter Alpha 2\r\n    Street Fighter Alpha 3\r\n    Street Fighter 3\r\n    Street Fighter 3 : 2nd Impact\r\n    Street Fighter 3 : Third Strike\r\n\r\nMais en plus de la date précise, l\'éditeur dévoile ce que seront les bonus de précommande en fonction de la plateforme choisie :\r\n\r\n    Playstation 4 et PC : Ultra Street Fighter IV offert en dématérialisé.\r\n\r\n    Xbox One : Super Street Fighter IV: Arcade Edition et Ultra Street Fighter IV en dématérialisé.\r\n\r\n    Switch : Pas de bonus en tant que tel, mais présence inédite de Super Street Fighter II : The Tournament Battle.', 7, 11),
(10, 'Assassin\'s Creed Origins : Le DLC repoussé', '2018-02-23 10:45:24', 'Avec son nouvel épisode paru après deux années d\'absence, la série Assassin\'s Creed nous emmenait dans l\'Egypte antique pour découvrir les origines de la confrérie des assassins. Evidemment, cette nouvelle aventure vient avec sa poignée de DLC, dont le prochain, The Curse of the Pharaohs, vient d\'être repoussé.\r\nAssassin\'s Creed Origins : Le DLC The Curse of the Pharaohs repoussé\r\n\r\nPrévue à l\'origine pour le 6 mars prochain, cette seconde extension aura finalement besoin d\'une semaine de plus pour sortir dans les meilleures conditions. C\'est en effet ce qui a été annoncé par Ubisoft à nos confrères de GameSpot aujourd\'hui, la sortie se fera donc le 13 mars 2018 pour \"délivrer la meilleure expérience possible à nos joueurs\".', 2, 14),
(11, ' Assassin\'s Creed Origins : un objet à débloquer', '2018-03-17 17:13:15', 'Hier, Ubisoft publiait une nouvelle mise à jour pour Assassin\'s Creed Origins sur toutes les plateformes, qui apportait notamment un mode New Game +. Il apparaît que celui-ci réserve une surprise aux personnes qui le termineront.\r\n\r\nComme vous le savez sans doute, le mode New Game + permet de recommencer une partie d\'Assassin\'s Creed Origins tout en conservant tous nos équipements et nos compétences. Najoray, un utilisateur de Reddit, a déjà eu le temps de finir à nouveau le jeu et nous révèle qu\'une récompense attend les braves terminant le titre deux fois. Vous pouvez toujours rebrousser chemin si vous avez fait fausse route, et les personnes ne craignant pas les spoilers retrouveront une image de l\'objet en question ci-dessous.', 4, 13),
(12, 'Assassin\'s Creed Origins, The Hidden Ones : soluce', '2018-01-26 09:38:17', 'Assassin\'s Creed Origins a accueilli cette semaine son premier DLC scénarisé, la nouvelle campagne The Hidden Ones qui se déroule après la fin de l\'aventure de Bayek, dans une nouvelle région à explorer : le Sinaï. Découvrez comment parvenir au bout de cette quête supplémentaire et comment en percer tous les secrets grâce au guide dédié au DLC The Hidden Ones qui vient d\'être ajoutée à notre soluce de Assassin\'s Creed Origins. ', 7, 15);


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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `jeudlc`
--
ALTER TABLE `jeudlc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `lien`
--
ALTER TABLE `lien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
