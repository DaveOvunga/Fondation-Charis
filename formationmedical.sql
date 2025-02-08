-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 08 fév. 2025 à 01:21
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formationmedical`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(5, 'Business', NULL),
(4, 'Data Science', NULL),
(2, 'Design', NULL),
(3, 'Marketing', NULL),
(1, 'Programming', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `course_id`, `chapter_number`, `name`, `content`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Introduction aux Plaies', '1.1 Définition des Plaies :\nUne plaie est une rupture de la continuité de la peau ou des muqueuses, souvent causée par un traumatisme, une chirurgie, ou une maladie. Les plaies peuvent être classées selon leur origine, leur profondeur et leur durée.\n\n1.2 Importance de la Gestion des Plaies :\nLes plaies mal gérées peuvent entraîner des infections, des complications graves, et une prolongation du séjour hospitalier. Une bonne gestion des plaies est essentielle pour améliorer la qualité de vie des patients et réduire les coûts de soins de santé.\n\n1.3 Objectifs du Cours :\nComprendre les différents types de plaies et leurs caractéristiques spécifiques.\n\n1.4 Apprendre les mécanismes de cicatrisation :\nPhases de la cicatrisation et facteurs influençant le processus.\n\n1.5 Maîtriser les meilleures pratiques de traitement :\nChoix des pansements, évaluation des plaies, et élaboration de plans de soins adaptés.\n\nEn Resumer :\nCe chapitre introduit les concepts fondamentaux liés aux plaies, leur classification et leur gestion. Dans le prochain chapitre, nous explorerons plus en détail la classification des plaies, en examinant les types et leurs caractéristiques.', 'https://vimeo.com/1017735907', '2024-12-21 01:24:05', '2024-12-24 02:37:35'),
(2, 1, 2, 'Classification des Plaies', 'Understanding data types and variables in Python:', 'https://vimeo.com/1017735907', '2024-12-21 01:24:05', '2024-12-28 00:51:30');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `objectif` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` int(11) NOT NULL,
  `descriptionCourte` varchar(255) DEFAULT NULL,
  `prerequis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `image_url`, `objectif`, `price`, `created_at`, `updated_at`, `category_id`, `descriptionCourte`, `prerequis`) VALUES
(1, 'Maîtrise et Gestion des Plaies : Approches et Pratiques', 'Cette formation est conçu pour les professionnels de santé souhaitant approfondir leurs connaissances sur la gestion des plaies. Il aborde les aspects fondamentaux de la description des plaies, les facteurs influençant leur cicatrisation, ainsi que les méthodes d\'évaluation et de traitement.', 'https://picsum.photos/800/600?random=3', 'Compréhension des bases :\n\nAcquérir une connaissance approfondie de la description des plaies et de leur classification.\nIdentification des facteurs influençant la cicatrisation :\n\nReconnaître les différents facteurs (physiologiques, environnementaux, et liés au patient) qui peuvent affecter le processus de guérison.\nÉvaluation des plaies :\n\nApprendre à évaluer correctement une plaie en utilisant des critères spécifiques (taille, profondeur, exsudat, etc.).\nChoix des traitements appropriés :\n\nSavoir sélectionner les pansements et les traitements en fonction des caractéristiques de la plaie.\nPlanification des soins :\n\nÉlaborer un plan de soins individualisé et adapté aux besoins spécifiques de chaque patient.\nCollaboration interdisciplinaire :\n\nEncourager le travail d\'équipe entre différents professionnels de santé pour une approche globale de la gestion des plaies.', 49.99, '2024-12-21 01:24:05', '2024-12-24 00:39:05', 1, 'Apprenez à identifier les types de plaies, à comprendre les mécanismes de cicatrisation et à choisir les traitements adaptés. Transformez vos compétences en soins et offrez à vos patients une guérison optimale !', 'Connaissances de base en soins infirmiers :\n\nAvoir une formation en soins infirmiers ou dans un domaine connexe (médecine, kinésithérapie, etc.).\nExpérience en soins des plaies (souhaitable) :\n\nAvoir une expérience préalable dans le traitement et la gestion des plaies est un atout, bien que non obligatoire.');

-- --------------------------------------------------------

--
-- Structure de la table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`, `enrolled_at`) VALUES
(1, 1, 1, '2024-12-21 01:24:05'),
(12, 12, 1, '2024-12-24 02:49:20'),
(13, 13, 1, '2024-12-27 13:35:14');

-- --------------------------------------------------------

--
-- Structure de la table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `loginattempts`
--

INSERT INTO `loginattempts` (`id`, `user`, `ip`, `timestamp`) VALUES
(80, 88, '::1', 1738973694);

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `course_id`, `rating`, `comment`, `created_at`) VALUES
(1, 1, 1, 5, 'Excellent course!', '2024-12-21 01:24:05');

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT NULL,
  `type` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`id`, `user`, `hash`, `timestamp`, `type`) VALUES
(68, 85, '95920', 1736983321, 0),
(69, 86, '87390', 1736983541, 0),
(70, 87, '44151', 1738972022, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('user','instructor','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `verified`) VALUES
(1, 'AlexKing', '$2y$10$LVN3ZY6FQlq6BBxWsMwCOO0OoBI1lhASeogrR9Yd9.Mo0osZic2hG', 'Alex@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(2, 'JohnKing', '1234567', 'john.doe@example.com', 'user', '2024-12-21 01:24:05', 0),
(3, 'DoeKing', '1234567', 'john.doe2@example.com', 'user', '2024-12-21 01:24:05', 0),
(5, 'doe3King', '$2y$10$q1FlSTB9nn.N4ClIrh0ZJOt43WcD6BFUOU5Lox.EJg20syQiCEAQu', 'john.doe3@example.com', 'user', '2024-12-21 01:24:05', 0),
(6, 'JaneQueen', '$2y$10$NjJkVRZnBJdJQ7bysvaMv..2SvnmaTspJ4D/WSgnTOz2TBi7Sx1mW', 'jane@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(7, 'Doudou', '$2y$10$sOD8o1MAtadKKg51xrW3C.yV/p6.C0hj1GRAoWpPhdwZGfiEDJt9.', 'doudou@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(8, 'jane2', '$2y$10$HSP/MHBZz2yVVpyvUjg8D.pNeS2AuaHtY/uaMvxDfhrpKVYrbIG3e', 'jane2@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(9, 'jane3', '$2y$10$fFqsI2M7CPo4jN7Aq6SLne5cyflPIeYDN42rxN8PmAP4SFMjUBPTa', 'jane3@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(10, 'jane0', '$2y$10$XkenJ/j9J.jyLCdpdtO7ouu3hTy9yly/rIe/0tmrqXuLju96quVce', 'jane0@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(11, 'jane8', '$2y$10$0lx9fy0oxEuWnUqZCGPpF.w/1XH2/n9T5H3NN5FogTpvF5jtpG2tq', 'jane8@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(12, 'AxelKing', '$2y$10$40wMUvJLj5BPQs9a8FHA5uXHnW6r1SijeEegDefUzvo4oL/295Ly.', 'Axel@gmail.com', 'user', '2024-12-21 01:24:05', 0),
(13, '', '$2y$10$k3ksEvMaURK8BoXKGs/LV.Wq88pA7w5K02sOQc4FFZ.W4xRBEXqGS', 'Test@gmail.com', 'user', '2024-12-27 13:32:54', 0),
(85, 'AxelKing', '$2y$10$UQNASgivgwDvdnsrpAZRieOHkXl1X8LkUvjti/tFfVSVQtG.S0zpG', 'shongoaxel58@gmail.com', 'user', '2025-01-15 23:22:00', 0),
(86, 'AxelKing', '$2y$10$D1mu4YgehTU9gLOtOqaRzuC0dmcT1v7BLh.x2TN8RFdkz3QggkwvK', 'davepseudo13@gmail.com', 'user', '2025-01-15 23:25:41', 0),
(89, 'Saxel', '$2y$10$vCAP7o4FBbWw2wgWi9WDQu0uGjSATQc2LyWmND98BiAeWHJwzLeVO', 'shongoaxel580@gmail.com', 'user', '2025-02-08 00:15:45', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_completed_chapters`
--

CREATE TABLE `user_completed_chapters` (
  `enrollment_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user_completed_chapters`
--

INSERT INTO `user_completed_chapters` (`enrollment_id`, `chapter_id`, `completed_at`) VALUES
(1, 1, '2024-12-28 00:26:11'),
(12, 1, '2024-12-28 00:39:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`parent_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`,`chapter_number`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user_completed_chapters`
--
ALTER TABLE `user_completed_chapters`
  ADD PRIMARY KEY (`enrollment_id`,`chapter_id`),
  ADD UNIQUE KEY `enrollment_id` (`enrollment_id`,`chapter_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
