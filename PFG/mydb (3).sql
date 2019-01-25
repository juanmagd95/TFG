-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 22:33:21
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `ID_ALQUILER` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_ARRENDATARIO` int(11) NOT NULL,
  `ID_APARTMENT` int(11) NOT NULL,
  `STATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartments`
--

CREATE TABLE `apartments` (
  `ID_APARMENTS` int(11) NOT NULL,
  `LOCALITY` varchar(45) CHARACTER SET utf8 NOT NULL,
  `STREET` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `NUMBER` int(11) NOT NULL,
  `FLOOR` varchar(1) CHARACTER SET utf8 NOT NULL,
  `WORD` varchar(1) CHARACTER SET utf8 NOT NULL,
  `NUM_ROOMS` int(11) NOT NULL,
  `NUM_BATHROOMS` int(11) NOT NULL,
  `INTERNET` varchar(3) CHARACTER SET utf8 NOT NULL,
  `ELEVATOR` varchar(3) CHARACTER SET utf8 NOT NULL,
  `HEATING` varchar(3) CHARACTER SET utf8 NOT NULL,
  `PARKING` varchar(3) CHARACTER SET utf8 NOT NULL,
  `PROVINCE` varchar(45) CHARACTER SET utf8 NOT NULL,
  `PRICE` double NOT NULL,
  `ID_APARTMENT_TYPE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartment_types`
--

CREATE TABLE `apartment_types` (
  `ID_APARTMENT_TYPE` int(11) NOT NULL,
  `TYPE` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applications`
--

CREATE TABLE `applications` (
  `ID_APPLICATION` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_APARTMENT` int(11) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `ID_COUNTRY` int(11) NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`ID_COUNTRY`, `NAME`) VALUES
(3, 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_ROLE`, `ROLE`) VALUES
(1, 'administrador'),
(2, 'usuario'),
(3, 'arrendatario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universities`
--

CREATE TABLE `universities` (
  `ID_UNIVERSITY` int(11) NOT NULL,
  `ID_COUNTRY` int(11) NOT NULL,
  `UNIVERSITY_NAME` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `universities`
--

INSERT INTO `universities` (`ID_UNIVERSITY`, `ID_COUNTRY`, `UNIVERSITY_NAME`) VALUES
(4, 3, 'Carlos III');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID_USER` int(11) NOT NULL,
  `LOGIN` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FIRST_NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `SECOND_NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PHONE` int(11) NOT NULL,
  `MAIL` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `HOBBIES` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `CULTURE` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `AGE` int(11) NOT NULL,
  `ID_UNIVERSITY` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID_USER`, `LOGIN`, `PASSWORD`, `NAME`, `FIRST_NAME`, `SECOND_NAME`, `PHONE`, `MAIL`, `HOBBIES`, `CULTURE`, `AGE`, `ID_UNIVERSITY`, `ID_ROL`) VALUES
(10, 'administrador', 'administrador', 'pepe', 'rodríguez', 'lópez', 655434323, 'y@w.es', NULL, 'española', 32, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`ID_ALQUILER`);

--
-- Indices de la tabla `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`ID_APARMENTS`);

--
-- Indices de la tabla `apartment_types`
--
ALTER TABLE `apartment_types`
  ADD PRIMARY KEY (`ID_APARTMENT_TYPE`);

--
-- Indices de la tabla `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ID_APPLICATION`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID_COUNTRY`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indices de la tabla `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`ID_UNIVERSITY`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `ID_ALQUILER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `apartments`
--
ALTER TABLE `apartments`
  MODIFY `ID_APARMENTS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `apartment_types`
--
ALTER TABLE `apartment_types`
  MODIFY `ID_APARTMENT_TYPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `applications`
--
ALTER TABLE `applications`
  MODIFY `ID_APPLICATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `ID_COUNTRY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `universities`
--
ALTER TABLE `universities`
  MODIFY `ID_UNIVERSITY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
