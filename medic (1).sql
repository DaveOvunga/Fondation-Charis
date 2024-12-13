-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 29 sep. 2024 à 17:59
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medic`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Anatomy'),
(2, 'Pharmacology'),
(3, 'Public Health'),
(4, 'Surgery'),
(5, 'Pediatrics'),
(6, 'Psychiatry'),
(7, 'Nutrition');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `video_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `video_url`, `image_url`, `instructor_id`, `category_id`, `created_at`) VALUES
(85, 'CCC', 'CCCC', 'https://vimeo.com/1014033544', 'http://localhost/VIMEOUPLOAD/images/istockphoto-532394887-612x612.jpg', 2, 1, '2024-09-29 15:40:40');

-- --------------------------------------------------------

--
-- Structure de la table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrollment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','instructor') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'john_doe', 'john.doe@example.com', '123', 'student', '2024-09-04 14:25:43'),
(2, 'jane_smith', 'jane.smith@example.com', 'hashed_password_2', 'instructor', '2024-09-04 14:25:43'),
(3, 'alice_johnson', 'alice.johnson@example.com', 'hashed_password_3', 'student', '2024-09-04 14:25:43'),
(4, 'bob_brown', 'bob.brown@example.com', 'hashed_password_4', 'student', '2024-09-04 14:25:43'),
(5, 'charlie_white', 'charlie.white@example.com', 'hashed_password_5', 'student', '2024-09-04 14:25:43'),
(6, 'david_green', 'david.green@example.com', 'hashed_password_6', 'student', '2024-09-04 14:25:43'),
(7, 'emma_wilson', 'emma.wilson@example.com', 'hashed_password_7', 'student', '2024-09-04 14:25:43'),
(8, 'frank_black', 'frank.black@example.com', 'hashed_password_8', 'student', '2024-09-04 14:25:43'),
(9, 'grace_martin', 'grace.martin@example.com', 'hashed_password_9', 'student', '2024-09-04 14:25:43'),
(10, 'henry_james', 'henry.james@example.com', 'hashed_password_10', 'student', '2024-09-04 14:25:43'),
(11, 'isabella_clark', 'isabella.clark@example.com', 'hashed_password_11', 'instructor', '2024-09-04 14:25:43'),
(12, 'jack_lewis', 'jack.lewis@example.com', 'hashed_password_12', 'instructor', '2024-09-04 14:25:43'),
(13, 'karen_hall', 'karen.hall@example.com', 'hashed_password_13', 'instructor', '2024-09-04 14:25:43'),
(14, 'lisa_king', 'lisa.king@example.com', 'hashed_password_14', 'instructor', '2024-09-04 14:25:43'),
(15, 'michael_lopez', 'michael.lopez@example.com', 'hashed_password_15', 'instructor', '2024-09-04 14:25:43'),
(16, 'natalie_wright', 'natalie.wright@example.com', 'hashed_password_16', 'instructor', '2024-09-04 14:25:43'),
(17, 'olivia_miller', 'olivia.miller@example.com', 'hashed_password_17', 'instructor', '2024-09-04 14:25:43'),
(18, 'paul_anderson', 'paul.anderson@example.com', 'hashed_password_18', 'instructor', '2024-09-04 14:25:43'),
(19, 'quinn_thomas', 'quinn.thomas@example.com', 'hashed_password_19', 'instructor', '2024-09-04 14:25:43'),
(20, 'rachel_moore', 'rachel.moore@example.com', 'hashed_password_20', 'instructor', '2024-09-04 14:25:43');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comment_course` (`course_id`),
  ADD KEY `fk_comment_user` (`user_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_instructor` (`instructor_id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Index pour la table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `fk_enrollment_user` (`user_id`),
  ADD KEY `fk_enrollment_course` (`course_id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_rating_course` (`course_id`),
  ADD KEY `fk_rating_user` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `fk_enrollment_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_enrollment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_rating_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
