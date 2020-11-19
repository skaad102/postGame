-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2020 a las 22:09:32
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `game`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_user` int(3) NOT NULL,
  `nickname_user` varchar(35) NOT NULL,
  `nombre_user` varchar(35) NOT NULL,
  `correo_user` varchar(50) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `avatar_user` text NOT NULL,
  `sobre_user` text NOT NULL,
  `fb_user` varchar(50) NOT NULL,
  `tw_user` varchar(50) NOT NULL,
  `in_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_user`, `nickname_user`, `nombre_user`, `correo_user`, `pass_user`, `avatar_user`, `sobre_user`, `fb_user`, `tw_user`, `in_user`) VALUES
(2, 'alo1', 'sebas', 'alo@correo', '$2y$05$0t50rk4uky3hrmunvj8x8etuF4YuuVlH9ka3UkT6fJdbYSAKEW.8S', '2.png', '', '', '', ''),
(3, 'alo2', 'camilo', 'alo2@correo', '$2y$05$2wofl8z2qzm4itphhqvi5eGJv4y2APr0eSjxd0/EW9PoVL6EfBMU6', '', '', '', '', ''),
(4, 'sam', 'samantha', 'sam@correo', '$2y$05$wqjhnno2f1f450yx486klu9r48WFG/SPAb2YYc/KFScYsAGxmS/0a', '4.png', '', '', '', ''),
(6, 'pepe', 'pepe2', 'pepe<qcorreo', 'pass', 'img', '<l>alks', '', '', ''),
(18, 'skaad', 'daniel', 'skaad@corre', '$2y$05$v46mwstx76ku7t8x058x9u83k/YKyC8IPN0SyXivW9Xi6yCUdf3Oy', '1', '', '', '', ''),
(20, 'skaad102', 'emson daniel', 'skaad102@gmail.com', '$2y$05$l2uq2o6mu5g62kwg24jnnulGRXgxx6CGbewEq53WTcNHN5qxln/ny', './assets/img/avatar/skaad102.png', '<p><em>estudiante sistemas :D</em></p>', '', '', 'skaad102/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_user`),
  ADD UNIQUE KEY `nickname_user` (`nickname_user`),
  ADD UNIQUE KEY `correo_user` (`correo_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
