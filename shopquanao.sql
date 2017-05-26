-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 02 Décembre 2016 à 12:28
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shopquanao`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nameKhongDau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cate`
--

CREATE TABLE `cate` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `paren_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cate`
--

INSERT INTO `cate` (`id`, `name`, `url`, `paren_id`, `created_at`, `updated_at`) VALUES
(1, 'Đồ Nam', 'do-nam', 0, '2016-09-09 08:40:33', '0000-00-00 00:00:00'),
(2, 'Đồ Nử', 'do-nu', 0, '2016-09-09 08:40:33', '0000-00-00 00:00:00'),
(3, 'Quần Nam', 'quan-nam', 1, '2016-09-09 08:40:33', '0000-00-00 00:00:00'),
(5, 'Áo Nữ', 'ao-nu', 2, '2016-09-09 15:39:22', '2016-09-09 15:39:22'),
(6, 'Giầy Nam', 'giay-nam', 1, '2016-09-10 06:54:46', '2016-09-10 06:54:46'),
(7, 'Tóc Giã', 'toc-gia', 2, '2016-09-10 06:55:10', '2016-09-10 06:55:10'),
(8, 'Thắt Lưng', 'that-lung', 1, '2016-09-10 06:55:22', '2016-09-10 06:55:22'),
(9, 'Quần Nữ', 'quan-nu', 2, '2016-09-10 06:55:37', '2016-09-10 06:55:37');

-- --------------------------------------------------------

--
-- Structure de la table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noiDung` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT '0',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lienhe`
--

INSERT INTO `lienhe` (`id`, `name`, `email`, `noiDung`, `status`, `updated_at`, `created_at`) VALUES
(2, 'Ai My Tran', 'chauminhthien0212@gmail.com', 'châu minh thien', 0, '2016-09-10', '2016-09-10');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nameKhongDau` varchar(255) NOT NULL,
  `chiTiet` longtext NOT NULL,
  `gia` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `id_cate` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `nameKhongDau`, `chiTiet`, `gia`, `hinh`, `id_cate`, `created_at`, `updated_at`) VALUES
(1, 'My First Simle One Ecommerce template', 'my-first-simle-one-ecommerce-template', '<h2>h2 tag will be appear</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet Consectetur adipiscing elit</li>\r\n	<li>Integer molestie lorem at massa Facilisis in pretium nisl aliquet</li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n	<li>Faucibus porta lacus fringilla vel Aenean sit amet erat nunc Eget porttitor lorem</li>\r\n</ul>\r\n', '100000', 'product2.jpg', 3, '2016-09-10 13:46:41', '2016-09-10 13:46:41'),
(2, 'Châu Minh Thiện', 'chau-minh-thien', '<div style="font-family: arial, sans-serif; line-height: normal; color: rgb(136, 136, 136); font-size: 12.8px;"><strong>LTV: Châu Minh Thiện</strong><br />\r\nSinh Viên IT;</div>\r\n\r\n<p>Quê: Mỏ Cày Nam - Bến Tre</p>\r\n\r\n<div style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small; line-height: normal;">WebSite:&nbsp;<a href="http://chauminhthienit.tk/" style="color: rgb(17, 85, 204);" target="_blank">http://chauminhthienit.tk/</a><br />\r\n<span style="color:rgb(136, 136, 136); font-size:12.8px">Điện thoại: 0963.501.008 &nbsp; &nbsp; &nbsp; Em</span><span style="color:rgb(136, 136, 136); font-size:12.8px">ail:</span><a href="mailto:minhthien1305@gmail.com" style="color: rgb(17, 85, 204); font-size: 12.8px;" target="_blank">minhthien1305@gmail.com</a></div>\r\n', '111111110', '1473435543_OneG_.jpg', 3, '2016-09-09 15:39:03', '2016-09-09 15:39:03'),
(3, 'Minh Thiện', 'minh-thien', '<div style="font-family: arial, sans-serif; line-height: normal; color: rgb(136, 136, 136); font-size: 12.8px;"><strong>LTV: Châu Minh Thiện</strong><br />\r\nSinh Viên IT;</div>\r\n\r\n<p>Quê: Mỏ Cày Nam - Bến Tre</p>\r\n\r\n<div style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small; line-height: normal;">WebSite:&nbsp;<a href="http://chauminhthienit.tk/" style="color: rgb(17, 85, 204);" target="_blank">http://chauminhthienit.tk/</a><br />\r\n<span style="color:rgb(136, 136, 136); font-size:12.8px">Điện thoại: 0963.501.008 &nbsp; &nbsp; &nbsp; Em</span><span style="color:rgb(136, 136, 136); font-size:12.8px">ail:</span><a href="mailto:minhthien1305@gmail.com" style="color: rgb(17, 85, 204); font-size: 12.8px;" target="_blank">minhthien1305@gmail.com</a></div>\r\n', '123454', '1473437079_ZqYt_.jpg', 5, '2016-09-09 16:04:39', '2016-09-09 16:04:39');

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

CREATE TABLE `slide` (
  `id` int(10) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `slide`
--

INSERT INTO `slide` (`id`, `hinh`, `updated_at`, `created_at`) VALUES
(2, 'banner2.jpg', '0000-00-00', '0000-00-00'),
(4, '1473350602_oNS5_.jpg', '2016-09-08', '2016-09-08'),
(5, '1473493275_eXY3_.jpg', '2016-09-10', '2016-09-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quyen` tinyint(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `quyen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Châu Minh Thiện', 'chauminhthien0212@gmail.com', 1, '$2y$10$SvFZKCVDoEuuXnx5k5htx.2kXvmqdl9fhxFN8j4N38k32VDuqh9D.', 'D3PxLReRrGbjZ4rYXNjdTRXzMY66m068bRrIgtixJxudQOsKEmKIIw2uwSil', '2016-09-10 13:49:02', '2016-09-10 13:49:02'),
(2, 'Minh Thiện', 'chauminhthien@gmail.com', 0, '$2y$10$SvFZKCVDoEuuXnx5k5htx.2kXvmqdl9fhxFN8j4N38k32VDuqh9D.', '', '2016-09-09 05:49:52', '0000-00-00 00:00:00'),
(3, 'Ai My Tran', 'admin@gmail.com', 0, '$2y$10$AwLYOz6y8QF/Jbej.ov6UunvQdPxYo7ePj4ZFgWwv84GekEA85p7y', '', '2016-09-09 06:44:05', '2016-09-09 06:44:05');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cate`
--
ALTER TABLE `cate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
