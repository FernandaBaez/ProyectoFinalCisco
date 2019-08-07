-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-08-2019 a las 13:07:05
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CentroSoporte22`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academia`
--

CREATE TABLE `academia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitio` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `academia`
--

INSERT INTO `academia` (`id`, `nombre`, `direccion`, `direccion2`, `pais`, `estado`, `ciudad`, `cp`, `sitio`, `tipo`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'CBTis 129', 'Calle alamos', '45', 'Mexico', 'Tamaulipas', 'Victoria', '23456', 'cbtic.som', 'Publica', 0, NULL, NULL),
(2, 'Cbtis 24', 'Calle 24 ', '67', 'Mexico', 'Tamaulipas', 'Victoria', '5678', '23.com', 'Publica', 1, NULL, '2019-08-01 16:42:32'),
(3, 'CBTI 199', 'colonia 19', '67', 'Mexico', 'Tamaulipas', 'Victoria', '5678', '119.com', 'Publica', 1, NULL, '2019-08-01 16:42:36'),
(4, 'Cebeta', 'Colonia los pinos', 'No 12221', 'Mexico', 'Tamaulipas', 'Victoria', '123', 'web.ocom', 'Publica', 1, '2019-08-01 06:28:15', '2019-08-01 06:28:15'),
(5, 'Cbtis 89', 'Colonia nbabs', '56', 'Mexico', 'Tamaulipas', 'Victoria', '67', 'cbtis.8com', 'Publica', 1, '2019-08-01 16:46:45', '2019-08-01 16:46:45'),
(6, 'Cbtis78', '456', '56', 'Mexico', 'Tamaulipas', 'Victoria', '45', 'WEB.COM', 'Publica', 1, NULL, NULL),
(7, 'La salle', '456', '456', 'Mexico', 'Tamaulipas', 'Victoria', '12', 'lasalle.com', 'Publica', 1, '2019-08-01 16:49:02', '2019-08-01 16:49:02'),
(8, 'Prepa 2', 'Laloma', '12', 'Mexico', 'Tamaulipas', 'Victoria', '456', 'prepa2.com', 'Publica', 1, '2019-08-03 01:53:54', '2019-08-03 01:54:19'),
(9, 'kok', 'oko', 'kok', 'ok', 'okok', 'oko', '277', 'jij', 'Publica', 1, '2019-08-05 13:23:32', '2019-08-05 13:23:32'),
(10, 'CBTis 12344', 'Centro Universitario Adolfo López Mateos', 'Centro Universitario Adolfo López Mateos', 'México', 'TAMAULIPAS', 'Victoria', '87000', 's', 'Publica', 1, '2019-08-05 13:23:46', '2019-08-05 13:23:46'),
(11, 'fdfd', 'dfdf', NULL, 'dfdf', 'fdfd', 'dfdf', NULL, NULL, 'Publica', 1, '2019-08-06 12:34:26', '2019-08-06 12:34:26'),
(12, 'fdfd', 'dfdf', NULL, 'dfdf', 'fdfd', 'dfdf', NULL, NULL, 'Publica', 1, '2019-08-06 12:34:26', '2019-08-06 12:34:26'),
(13, 'fdfd', 'ppp', NULL, 'dfdf', 'fdfd', 'dfdf', NULL, NULL, 'Publica', 1, '2019-08-06 12:34:26', '2019-08-06 12:35:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_academia` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idioma` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `id_usuario`, `id_academia`, `nombre`, `apellido`, `correo`, `cargo`, `pais`, `telefono`, `extension`, `idioma`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 'Marlen', 'Marquez N', '123@gmail.com', 'Maestro', 'Mexico', '1222222', '12', 'Español', 1, NULL, '2019-08-05 13:12:38'),
(2, 1, 10, 'Mario', 'Rodriguez', 'systemas@gmail.com', 'dir', 'México', 'eeqq', '33', 'Ingles', 1, '2019-08-05 13:25:29', '2019-08-05 13:25:29'),
(3, 4, 2, 'Emanueol', 'Dalsba', '123.com', NULL, 'Mexico', '5245852', NULL, NULL, 1, '2019-08-06 12:54:55', '2019-08-06 12:54:55'),
(4, 4, 2, 'Emanueol', 'Dalsba', '123.com', NULL, 'Mexico', '5245852', NULL, NULL, 1, '2019-08-06 12:54:55', '2019-08-06 12:54:55'),
(5, 4, 8, 'jijij', 'ijiji', 'ijij', NULL, 'jiji', '68', NULL, NULL, 1, '2019-08-06 12:55:34', '2019-08-06 12:55:34'),
(6, 2, 9, 'Luis', 'Pere', 'angelperez@gmail', 'Director', 'México', '018341628513', '82', 'Ingles', 1, '2019-08-07 00:16:14', '2019-08-07 08:56:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cursos`
--

CREATE TABLE `Cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Cursos`
--

INSERT INTO `Cursos` (`id`, `nombre`, `fecha`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'CCNA R& e', '2019-06-17', 'Introducción a cnna', 1, '2019-07-30 11:00:00', '2019-08-05 05:27:36'),
(2, 'CCNA R&S: Routing and Switching Essentials', NULL, 'Routing and switching', 1, '2019-08-01 03:42:33', '2019-08-01 03:42:33'),
(6, 'CCNA R&S', NULL, 'Introducción a CNNA', 1, '2019-08-01 05:11:37', '2019-08-01 05:11:37'),
(10, 'CCNA R&S 2', NULL, 'CCNA', 1, '2019-08-05 13:11:48', '2019-08-05 13:11:48'),
(11, 'Introducción a las redes', NULL, 'Intro ccna', 1, '2019-08-05 13:18:25', '2019-08-05 13:18:25'),
(15, 'CCNA 4', NULL, 'dedededed', 1, '2019-08-05 13:26:33', '2019-08-05 13:26:33'),
(16, 'sdfsd', '2019-08-21', 'djfslid', 1, '2019-08-05 23:36:23', '2019-08-06 05:08:18'),
(17, 'sedfwp´kfpo', '2019-08-21', 'soñdkfsd', 1, '2019-08-05 23:36:31', '2019-08-06 05:07:04'),
(18, 'asds', '2019-08-21', 'sdf', 1, '2019-08-05 23:36:41', '2019-08-06 05:06:46'),
(19, 'Hola', '2019-08-20', 'bbcito', 1, '2019-08-06 04:13:34', '2019-08-06 05:06:17'),
(20, 'dfsd', '2021-02-05', 'sdfsd', 1, '2019-08-06 04:48:49', '2019-08-06 04:48:49'),
(21, 'CNA2', '2019-08-07', NULL, 1, '2019-08-07 05:57:51', '2019-08-07 05:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupos`
--

CREATE TABLE `Grupos` (
  `id` int(11) NOT NULL,
  `id_academia` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha_creado` date DEFAULT NULL,
  `nombre` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Grupos`
--

INSERT INTO `Grupos` (`id`, `id_academia`, `id_curso`, `fecha_creado`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(19, 2, 11, '2019-08-07', NULL, 'dsdfs', 1, '2019-08-07 00:48:47', '2019-08-07 00:48:47'),
(20, 5, 11, '2019-08-07', NULL, 'dfgd', 1, '2019-08-07 00:50:27', '2019-08-07 00:50:27'),
(21, 2, 11, '2019-08-07', NULL, NULL, 1, '2019-08-07 00:52:19', '2019-08-07 00:52:19'),
(22, 5, 1, '2019-08-07', NULL, NULL, 1, '2019-08-07 01:52:35', '2019-08-07 01:52:35'),
(23, 10, 19, '2019-08-07', NULL, 'dfsfd', 1, '2019-08-07 06:51:03', '2019-08-07 06:51:03'),
(24, 2, 19, '2019-08-07', NULL, 'sdfsdf', 1, '2019-08-07 07:07:51', '2019-08-07 07:07:51'),
(25, 2, 19, '2019-08-07', NULL, 'adfsdf', 1, '2019-08-07 08:30:32', '2019-08-07 08:30:32'),
(26, 10, 11, '2019-08-07', NULL, 'sss', 1, '2019-08-07 08:30:48', '2019-08-07 08:30:48'),
(27, 4, 17, '2019-08-07', NULL, 'a', 1, '2019-08-07 09:07:17', '2019-08-07 09:07:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscripcion`
--

CREATE TABLE `Inscripcion` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_instructor` int(11) NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Inscripcion`
--

INSERT INTO `Inscripcion` (`id`, `id_grupo`, `id_instructor`, `estado`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 19, 1, 'En espera', NULL, NULL, NULL),
(2, 20, 2, 'En espera', NULL, NULL, NULL),
(3, 21, 3, 'En espera', NULL, NULL, NULL),
(5, 20, 1, 'En espera', NULL, NULL, NULL),
(6, 22, 1, 'En espera', NULL, NULL, NULL),
(7, 20, 1, 'En espera', NULL, NULL, NULL),
(23, 24, 8, 'En espera', 1, '2019-08-07 07:18:00', '2019-08-07 07:18:00'),
(24, 24, 3, 'En espera', 1, '2019-08-07 07:32:23', '2019-08-07 07:32:23'),
(25, 24, 8, 'En espera', 1, '2019-08-07 07:32:29', '2019-08-07 07:32:29'),
(26, 24, 6, 'En espera', 1, '2019-08-07 07:32:38', '2019-08-07 07:32:38'),
(27, 26, 6, 'En espera', 1, '2019-08-07 08:30:56', '2019-08-07 08:30:56'),
(28, 26, 3, 'En espera', 1, '2019-08-07 08:59:26', '2019-08-07 08:59:26'),
(29, 27, 3, 'En espera', 1, '2019-08-07 09:12:07', '2019-08-07 09:12:07'),
(30, 27, 5, 'En espera', 1, '2019-08-07 09:21:18', '2019-08-07 09:21:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `id_academia` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requiere_orientacion` int(11) DEFAULT NULL,
  `condicion` int(11) NOT NULL,
  `encurso` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id`, `id_academia`, `nombre`, `apellido`, `correo`, `requiere_orientacion`, `condicion`, `encurso`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fernanda', 'Baez', '1652@upv.edu.mx', 0, 0, 0, NULL, NULL),
(2, 2, 'Linda ', 'Rdz', '4714@upv.edu', 1, 1, 1, NULL, '2019-08-01 16:34:42'),
(3, 3, 'Neydelin', 'Gonzales', 'erty8@gmail.com', 0, 1, 1, '2019-08-03 03:30:07', '2019-08-03 03:30:07'),
(4, 10, 'Mario', 'Rodriguez', 'mhrodriguez@docentes.uat.edu.mx', 1, 1, 1, '2019-08-05 13:27:36', '2019-08-05 13:27:36'),
(5, 4, 'Luis', 'Hernandez', 'luish@gmail.com', 0, 1, 1, NULL, '2019-08-07 06:49:02'),
(6, 4, 'we', 'wer', 'wer@gmail.com', 0, 1, 1, NULL, '2019-08-07 07:32:38'),
(7, 5, 'luis', 'rocha', 'sasda@upv.edu', 0, 1, NULL, '2019-08-07 07:08:40', '2019-08-07 07:08:40'),
(8, 2, 'dfsd', 'sdfs', 'sdf', 0, 1, 1, '2019-08-07 07:16:19', '2019-08-07 07:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `msj` varchar(300) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `id_ticket`, `msj`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hola como estas', '2019-07-11', NULL, NULL),
(2, 2, 'qe onda', '2019-07-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL,
  `asunto` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `id_contacto`, `asunto`, `created_at`, `updated_at`) VALUES
(1, 3, 'Reprobado', '2019-08-07 06:12:00', '2019-08-07 06:12:00'),
(2, 5, 'Hola', '2019-08-07 06:21:32', '2019-08-07 06:21:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_contacto` int(10) DEFAULT NULL,
  `condicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `tipo`, `id_contacto`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$A4O/FAE5DfiywlSB5cjm2edhzFiJrDC8SGQ/UPberEBCGlsuKg/Sy', 1, NULL, 1, NULL, '2019-08-01 14:43:26'),
(2, 'fer', '123', 2, NULL, 1, NULL, NULL),
(3, 'linda', '123', 2, NULL, 1, NULL, NULL),
(4, '123', '1234', 2, NULL, 1, '2019-08-01 01:17:04', '2019-08-01 01:50:04'),
(5, 'contacto1', '$2y$10$wZNFI55KT2FBwoJ6WtX28.tgySN6ZDVwToaA5G5c2vzPwHkqcm9Sm', 2, NULL, 1, '2019-08-01 02:01:02', '2019-08-07 08:34:15'),
(6, 'adminn', '$2y$10$eS/0iSwNQ99ozByBPectEOHmoCDU5LpyiLFkFwKNj6Hbl1LBf.SwO', 2, 1, 1, '2019-08-01 13:21:44', '2019-08-01 14:40:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_academia` (`id_academia`);

--
-- Indices de la tabla `Cursos`
--
ALTER TABLE `Cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academia` (`id_academia`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instructor` (`id_grupo`),
  ADD KEY `id_curso` (`id_instructor`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academia` (`id_academia`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexcontacto` (`id_contacto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academia`
--
ALTER TABLE `academia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Cursos`
--
ALTER TABLE `Cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_academiacont` FOREIGN KEY (`id_academia`) REFERENCES `academia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Grupos`
--
ALTER TABLE `Grupos`
  ADD CONSTRAINT `fk_academiaa` FOREIGN KEY (`id_academia`) REFERENCES `academia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkfkf_curss` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
  ADD CONSTRAINT `fk_grupop` FOREIGN KEY (`id_grupo`) REFERENCES `Grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_instructir` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fkacademia` FOREIGN KEY (`id_academia`) REFERENCES `academia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contacto` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contacto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
