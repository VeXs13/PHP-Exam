-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 jan. 2022 à 00:12
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_exam_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `answer_ID` int(11) NOT NULL,
  `users_ID` int(11) NOT NULL,
  `answer_username` varchar(255) NOT NULL,
  `articles_ID` int(11) NOT NULL,
  `answer_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`answer_ID`, `users_ID`, `answer_username`, `articles_ID`, `answer_content`) VALUES
(11, 90, 'XxTrollerxX', 30, 'bonjour l&#039;ami, je vais t&#039;aider !<br />\r\ntape GIYF sur internet il y a beaucoup de documentation en html'),
(17, 88, 'seif_le_bg', 30, 'Bonjour pk quand je tape GIYF il y a marqué &quot;google is your friend&quot; ?'),
(18, 90, 'XxTrollerxX', 30, 'Parce qu&#039;il faut apprendre à chercher par soit meme avant de venir chercher sur les forum :/'),
(19, 91, 'Maxime', 14, 'Yo mon pote ! Dirige toi vers des logiciels like KMs-Pico ou KMS-auto tu verras c&#039;est magique ;)'),
(20, 76, 'tester', 14, 'wow merci du conseil ça marche vraiment !!!!!'),
(21, 91, 'Maxime', 14, 'pas de soucis !'),
(22, 91, 'Maxime', 30, 'très drôle de troll les débutants :/'),
(23, 93, 'Midouch', 35, 'Bonjour, <br />\r\nje pense que vous n&#039;êtes pas sur un site adapté pour ce type d&#039;annonce<br />\r\n<br />\r\ncordialement, '),
(24, 93, 'Midouch', 14, 'Merci ca m&#039;a aidé aussi ! '),
(25, 76, 'tester', 39, 'ee'),
(26, 88, 'seif_le_bg', 42, 'Salut l&#039;ami je te conseil d&#039;aller voir les logiciels KMS_Pico &amp; KMS_auto ! '),
(27, 76, 'tester', 42, 'WOW ça marche merci !!!!'),
(28, 91, 'Maxime', 43, 'regarde Yupa sur youtube tu vas devenir meilleur ! '),
(29, 93, 'Midouch', 43, 'J&#039;ai grave évolué merci ! '),
(30, 90, 'XxTrollerxX', 44, 'Va voir le site GIYF -&gt; best site de dev web'),
(31, 92, 'Mike', 44, 'Pourquoi ca met &quot;google is ur friend&quot;'),
(32, 68, 'felipe', 44, 'Parce qu&#039;il te troll justement... c&#039;est &lt;br&gt; pour les sauts de ligne &lt;3'),
(33, 92, 'Mike', 44, 'HA ok merciiiiii');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `description`, `contenu`, `id_auteur`, `pseudo_auteur`, `date_publication`) VALUES
(42, 'Comment obtenir Office gratuitement', 'Bonjour j&#039;ai besoin d&#039;obtenir office gratuitement', 'Bonjour , <br />\r\nje cherche à obtenir office gratuitement afin de pouvoir travailler plus facilement !<br />\r\n<br />\r\nmerci d&#039;avance', 76, 'tester', '24/01/2022 00:01'),
(43, 'être meilleur à Genshin Impact', 'Bonjour je suis nul à Genshin Impact', 'Bonjour je suis nul à Genshin Impact quelqu&#039;un aurait des conseils !!!!', 93, 'Midouch', '24/01/2022 00:05'),
(44, 'Faire un saut de ligne en html', 'jsp comment faire un saut de ligne en html :/', 'Bonjour ca fait une semaine je suis bloqué, svp aidez moi, comment faire un saut de ligne en html', 92, 'Mike', '24/01/2022 00:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID_users` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` text NOT NULL,
  `mail` varchar(200) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_users`, `Username`, `Password`, `mail`, `avatar`) VALUES
(47, 'Cox', '$2y$10$.mVGtEzq7Z.Y4zZHa09JTu3VCsAf24DmIUtoJmLG8SvIVasudQwE6', 'cox@gmail.com', ''),
(48, 'Vexi0s', '$2y$10$DTXvJh/F8BoABCEicvK4AecKCx9Csb/edUZmAzqIWpnXpndQ5bjKK', 'test@gmail.com', ''),
(49, 'test1', '$2y$10$HNTtWh4n6.hImrku/TYk1.zlw99hu2tK8azIQMDQmVYelbGhf.mne', 'test1@gmail.com', ''),
(54, 'nick', '$2y$10$5ei45b3yNtXLzTCTtUAVLeK4dorLXnnbUT1GlGBAn4n2196RpWVAu', 'sestpasmoi@outlook.fr', ''),
(68, 'felipe', '$2y$10$n4qziWhtJuRfRY9sF..3feNWrtOdlv0U3u1misdR6g90AMw/qw0VC', 'felipe@felipe.com', ''),
(71, 'bryan', '$2y$10$FwW.fOBRBgZHGtyFHALMxO49qQSvDy06YqZOftpWNI6i9jnrRgsOK', 'bryan@ouaicmoi.com', ''),
(72, 'florine', '$2y$10$GbPb8R41QRSe0NI3vCXdQ.PCNe3zxXaUdIHeqL89GrTf749fGXIve', 'florine@gmail.com', ''),
(74, '&lt;script&gt;alert (&#039;ok&#039;)&lt;/script&gt;', '$2y$10$ZqTpflKLWa/MDwNg46dsRuQ9lgenCQ6eiE2dnCMSmbwazdF7IE.HG', 'sestpasmoi@outlook.frzzzz', ''),
(76, 'tester', '$2y$10$DI7TgdaXsynrWv7PgnScPu21B8LT5.JpQvb3TP4BFqDV8NNay7RWe', 'tester@gmail.com', '1193330.jpg'),
(78, 'aaaa', '$2y$10$V3Ujoz.ePp7VSAZP38uxYu2qJ0yCrHabDMedgQA3MZ9OHG5XMN2F2', 'aaaa@aaaa.fr', ''),
(81, 'dzazafazfaf', '$2y$10$DYgfnFNypo5Zkh2bnX63pelbLO7M3kALd.mYmC2kEmhs1uJRStKQa', 'sestpasmoi@outlook.fra', ''),
(88, 'seif_le_bg', '$2y$10$2Taznf/6MFPnodLbSINTku6m280T2wfVBCTU9N.NzPFZ6BTXWOpBi', 'seif@merci.com', ''),
(90, 'XxTrollerxX', '$2y$10$QzcNOhWQvcnEFgUA4kLmvu7qvxl5zvGgINu0Kfw9lZbVC3k00wAQG', 'xxtrollerxx@gmail.com', ''),
(91, 'Maxime', '$2y$10$hKXbbzGcHGS32wSUWMEtMOw16S9Qta6F8HS7kh5nE6h4WvANOkP56', 'max@gmail.com', ''),
(92, 'Mike', '$2y$10$/LfuZirU5NTuW1KSqfWq3e16mp5QLyIkDu94zNvSeH.VXUBh8trSK', 'mike@gmail.com', 'Demon-Slayer-Kimetsu-no-Yaiba-Entertainment-District-Arc-Nezukos-Demon-Form.jpg'),
(93, 'Midouch', '$2y$10$IfE5spW2Tdnjj8jakOXoOucAIUyGFOMEkzOvvA0MFmUxoEOPiMHh2', 'midouch@gmail.com', ''),
(98, 'mike1', '$2y$10$nK0X70R9J0QrN.zXoZwNVuiVEI3p/FGnw5DXrYGWWaLBTI4WSQE2y', 'ceci@est.test', ''),
(99, 'e', '$2y$10$Q8qR4SCABMNRVjDd/u0NKux6sgmErBfjQmrkMcsQQMWQ7wrGcXUc.', 'e@e.com', ''),
(100, 'g', '$2y$10$EkdaKPkxVXVwE7JT50h78.a74KUwNpMALEaII30Z.BZEdPT23.ffG', 'gg@gg.com', ''),
(101, 'coucouooooo', '$2y$10$xrraTzUkIosrHLUJcy7.5.OUK.FRnAE1q5MQmfudwa9.8zEEXayU.', 'ffff@fff.com', ''),
(102, 'frazéadfafazeaf', '$2y$10$yoH4JkDnE9kL7ztugWD/i.JSmXJ5fli4FCv9xDI/V2FmgVyzKncvC', 'e@eeee.com', ''),
(103, 'zfqfqfaq', '$2y$10$0gRoYNzf3TR9Hjw6BGI0duuYbPaS8OLhaRejAv0BkSqyO2P7Ez8Xe', 'z@zr.com', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_ID`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_users`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
