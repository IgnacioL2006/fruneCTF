-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2025 at 11:00 PM
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
-- Database: `frune_ctf_database`
--

-- --------------------------------------------------------
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `difficulty` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `times_completed` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `activities` (`id`, `difficulty`, `times_completed`, `description`, `name`) VALUES
(1, '1', 0, 'Encuentra información oculta en un simple e inocente blog canino | 2 Mins', 'Top de nombres para perros'),
(2, '2', 0, 'Demuestra tus habilidades de OSINT en este desafío introductorio! | 3 Mins.', 'Detective de imágenes');

-- --------------------------------------------------------
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `target_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `iso_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `body` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `news` (`ID`, `title`, `body`, `date`, `user_id`) VALUES
(21, 'Actualización FruneCTF; Entrega 3', 'Hola a todos,\r\n\r\nEn esta última actualización de fruneCTF hemos añadido varias mejoras importantes:\r\n\r\n- Foros de usuarios utilizando el framework jQuery, lo que permite una interacción más dinámica.\r\n- Modificación de la página principal y otras secciones usando Bootstrap, para un diseño más moderno (no me gustó).\r\n- Noticias: ahora únicamente los administradores pueden publicar noticias, garantizando contenido controlado.\r\n\r\nRecordatorio de funcionalidades anteriores que estaban contempladas para esta entrega:\r\n-Sistema de login y registro, con uso de sesiones, asegurando que solo los usuarios registrados puedan interactuar con ciertas secciones.\r\n\r\nY, por supuesto, un enorme agradecimiento a la única persona que realmente ha estado activa en nuestra página; el ayudante. Gracias por tu incansable esfuerzo de… revisar la página un par de veces.\r\n\r\nSe despide,\r\nPernax', '2025-11-17 17:59:58', 8);

-- --------------------------------------------------------
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `webname` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `register_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `country_id` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'Sin descripción',
  `flags_won` int DEFAULT '0',
  `competitions_won` int DEFAULT '0',
  `photo_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'images/user-images/user_image_default.png',
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `webname`, `name`, `mail`, `password`, `register_time`, `country_id`, `description`, `flags_won`, `competitions_won`, `photo_url`, `admin`) VALUES
(8, 'Pernax', 'Ignacio Loncón', 'ignacioloncon2006@gmail.com', '$2y$10$FhflBntUx3j2zXY9rQsb.OHjrrSxDVaOmn7DjMMy6WeAiCtfqxpn6', '2025-10-12 20:08:49', 4, 'Co-creador de FruneCTF, página de Capture the Flag desarrollada para evitar el examen de Desarrollo Web. Esperamos que disfruten la página y se diviertan tanto con las actividades disponibles como con las que están por venir :].', 69, 0, 'images/user-images/user_image_8.png', 1),
(10, 'Bowie', 'Conejillo de indias', 'iloncon2025@alu.uct.cl', '$2y$10$mBTAf5l7wtJ.Q5MQNqdRMe7jNcGQc5ivngHsKeW2Cht4KGOo/kfBO', '2025-10-12 20:23:40', 4, 'Soy el sujeto de pruebas de FruneCTF: me torturan las 24 horas todos los días...', 0, 0, 'images/user-images/user_image_10.png', 0),
(13, 'Yoelpixula', 'Nicolás Cayuman', 'ncayuman2025@alu.uct.cl', '$2y$10$f/..V.maNcRDTuza.5262.L6uFxuGoz2.U6rQQQMoRKu8Bp.jsLiq', '2025-10-13 14:01:26', 4, 'Cualquier wea, yo el pixula :D', 0, 0, 'images/user-images/user_image_default.png', 0),
(14, 'ls_trillat', 'Lukas Trillat', 'ltrillat2025@alu.uct.cl', '$2y$10$fL2PpjZ5jvZnFOfaG5vDseKRKmUw8Dt.3JCGREBYRbQpoLEZ.Pve6', '2025-10-14 18:20:41', 4, 'Sin descripción', 0, 0, 'images/user-images/user_image_default.png', 0),
(15, 'trops', 'Sofía Rodríguez', 'sofiarodrigueznog@gmail.com', '$2y$10$8Xn0XE0LV7ErFFSWz7oiF.vnWKfT0WSpxzDOnMZdcybzyoSKWB5Xu', '2025-10-20 16:10:24', 5, 'te voy a mandar a matar', 0, 0, 'images/user-images/user_image_15.png', 0);

-- --------------------------------------------------------
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `user_id` int NOT NULL,
  `activity_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `fk_users_country` (`country_id`);

ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`user_id`,`activity_id`),
  ADD KEY `activity_id` (`activity_id`);

-- AUTO_INCREMENT
ALTER TABLE `activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `news`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

-- Constraints
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1`
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_country`
  FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
  ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_ibfk_1`
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_activities_ibfk_2`
  FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`);

COMMIT;

 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
