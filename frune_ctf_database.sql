-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2025 at 03:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frune_ctf_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `difficulty` varchar(100) DEFAULT NULL,
  `times_completed` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `difficulty`, `times_completed`, `description`, `name`) VALUES
(1, '1', 0, 'Encuentra información oculta en un simple e inocente blog canino | 2 Mins', 'Top de nombres para perros'),
(2, '2', 0, 'Demuestra tus habilidades de OSINT en este desafío introductorio! | 3 Mins.', 'Detective de imágenes');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `iso_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `title`, `body`, `author`, `date`) VALUES
(1, 'testing', 'test this', 'testernigga', '2025-11-20'),
(2, 'Me pica el orto', 'q alguien me la meta uwu', 'BabyNigga', '2025-12-20'),
(3, 'testttc', 'caca', 'dada', '2025-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `webname` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `register_time` datetime DEFAULT current_timestamp(),
  `country_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT 'Sin descripción',
  `flags_won` int(11) DEFAULT 0,
  `competitions_won` int(11) DEFAULT 0,
  `photo_url` varchar(255) DEFAULT 'images/user-images/user_image_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `webname`, `name`, `mail`, `password`, `register_time`, `country_id`, `description`, `flags_won`, `competitions_won`, `photo_url`) VALUES
(8, 'Pernax', 'Ignacio Loncón', 'ignacioloncon2006@gmail.com', '$2y$10$FhflBntUx3j2zXY9rQsb.OHjrrSxDVaOmn7DjMMy6WeAiCtfqxpn6', '2025-10-12 20:08:49', 4, 'Co-creador de FruneCTF, página de Capture the Flag desarrollada para evitar el examen de Desarrollo Web. Esperamos que disfruten la página y se diviertan tanto con las actividades disponibles como con las que están por venir :]', 69, 0, 'images/user-images/user_image_8.png'),
(10, 'Bowie', 'Conejillo de indias', 'iloncon2025@alu.uct.cl', '$2y$10$mBTAf5l7wtJ.Q5MQNqdRMe7jNcGQc5ivngHsKeW2Cht4KGOo/kfBO', '2025-10-12 20:23:40', 4, 'Soy el sujeto de pruebas de FruneCTF: me torturan las 24 horas todos los días para que esta página prospere. Espero que mi sufrimiento constante sea al menos esencial para que este asombroso sitio vea la luz.', 0, 0, 'images/user-images/user_image_10.png'),
(13, 'Yoelpixula', 'Nicolás Cayuman', 'ncayuman2025@alu.uct.cl', '$2y$10$f/..V.maNcRDTuza.5262.L6uFxuGoz2.U6rQQQMoRKu8Bp.jsLiq', '2025-10-13 14:01:26', 4, 'Cualquier wea, yo el pixula :D', 0, 0, 'images/user-images/user_image_default.png'),
(14, 'ls_trillat', 'Lukas Trillat', 'ltrillat2025@alu.uct.cl', '$2y$10$fL2PpjZ5jvZnFOfaG5vDseKRKmUw8Dt.3JCGREBYRbQpoLEZ.Pve6', '2025-10-14 18:20:41', 4, 'Sin descripción', 0, 0, 'images/user-images/user_image_default.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `fk_users_country` (`country_id`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`user_id`,`activity_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_activities_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
