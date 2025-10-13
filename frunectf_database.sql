-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2025 at 03:53 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frunectf_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `iso_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code`) VALUES
(1, 'Argentina', 'AR'),
(2, 'Bolivia', 'BO'),
(3, 'Brasil', 'BR'),
(4, 'Chile', 'CL'),
(5, 'Colombia', 'CO'),
(6, 'Costa Rica', 'CR'),
(7, 'Cuba', 'CU'),
(8, 'Ecuador', 'EC'),
(9, 'El Salvador', 'SV'),
(10, 'Guatemala', 'GT'),
(11, 'Honduras', 'HN'),
(12, 'México', 'MX'),
(13, 'Nicaragua', 'NI'),
(14, 'Panamá', 'PA'),
(15, 'Paraguay', 'PY'),
(16, 'Perú', 'PE'),
(17, 'Puerto Rico', 'PR'),
(18, 'República Dominicana', 'DO'),
(19, 'Uruguay', 'UY'),
(20, 'Venezuela', 'VE'),
(21, 'Canadá', 'CA'),
(22, 'Estados Unidos', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `webname` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `register_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `country_id` int DEFAULT NULL,
  `description` varchar(255) DEFAULT 'Sin descripción',
  `flags_won` int DEFAULT '0',
  `competitions_won` int DEFAULT '0',
  `photo_url` varchar(255) DEFAULT 'images/user-images/user_image_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `webname`, `name`, `mail`, `password`, `register_time`, `country_id`, `description`, `flags_won`, `competitions_won`, `photo_url`) VALUES
(8, 'Pernax', 'Ignacio Loncón', 'ignacioloncon2006@gmail.com', '$2y$10$FhflBntUx3j2zXY9rQsb.OHjrrSxDVaOmn7DjMMy6WeAiCtfqxpn6', '2025-10-12 20:08:49', 4, 'Co-creador de FruneCTF, página de Capture the Flag desarrollada para evitar el examen de Desarrollo Web. Esperamos que disfruten la página y se diviertan tanto con las actividades disponibles como con las que están por venir :]', 69, 0, 'images/user-images/user_image_8.png'),
(10, 'Bowie', 'Conejillo de indias', 'iloncon2025@alu.uct.cl', '$2y$10$mBTAf5l7wtJ.Q5MQNqdRMe7jNcGQc5ivngHsKeW2Cht4KGOo/kfBO', '2025-10-12 20:23:40', 4, 'Soy el sujeto de pruebas de FruneCTF: me torturan las 24 horas todos los días para que esta página prospere. Espero que mi sufrimiento constante sea al menos esencial para que este asombroso sitio vea la luz.', 0, 0, 'images/user-images/user_image_10.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `fk_users_country` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
