-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 sep. 2020 à 03:57
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminemail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminemail`) VALUES
('ft.fb05@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` varchar(400) NOT NULL,
  `name` varchar(400) NOT NULL,
  `dir` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `dir`) VALUES
('1', 'Clothing', 'images/clothing.jpg'),
('2', 'Watches', 'images/watch.jpg'),
('3', 'Headphones', 'images/headphones.jpg'),
('4', 'Shoes', 'images/shoes.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` int(20) NOT NULL,
  `dir` varchar(500) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `dir`, `category`, `quantity`) VALUES
(22, 'Nike sample 1', 2500, 'images/image12.jpg', 'Shoes', 3),
(24, 'Nike sample 3', 6000, 'images/image32767.jpg', 'Shoes', 2),
(25, 'GODAS', 12000, 'images/image28866.jpg', 'Shoes', 1),
(26, 'Nike sample 7', 15000, 'images/image11776.jpg', 'Shoes', 2),
(27, 'TRICO', 2000, 'images/image22553.jpg', 'Clothing', 1),
(29, 'T SHIRT 2', 3000, 'images/image19888.jpg', 'Clothing', 4),
(30, 'TRICO 3', 1500, 'images/image17125.jpg', 'Clothing', 1),
(31, 'TRICO ', 10000, 'images/image7842.jpg', 'Clothing', 4),
(32, 'APPLE WATCH', 30000, 'images/image4709.jpg', 'Watches', 2),
(33, 'JALD', 1500, 'images/image17017.jpg', 'Watches', 3),
(34, 'CUIRE', 3000, 'images/image16273.jpg', 'Watches', 1),
(35, 'LG WATCH', 15000, 'images/image15443.jpg', 'Watches', 1),
(36, 'KIWI', 9000, 'images/image29680.jpg', 'Headphones', 1),
(37, 'EAR BUDS', 20000, 'images/image30219.jpg', 'Headphones', 1),
(38, 'Huawei Sport kit', 7000, 'images/image21836.jpg', 'Headphones', 1),
(39, 'JVC', 1500, 'images/image25168.jpg', 'Headphones', 1),
(40, ' T-shirt', 1500, 'images/image15687.jpg', 'Clothing', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `registration_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email_id`, `first_name`, `last_name`, `phone`, `registration_time`, `password`) VALUES
(80, 'ft.fb05@gmail.com', 'Fateh', 'Benyamina', '0696398181', '2020-09-17 01:19:27', 'ab4f63f9ac65152575886860dde480a1');

-- --------------------------------------------------------

--
-- Structure de la table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `status` enum('Added To Cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`item_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `users_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_products_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
