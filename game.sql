-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 03:01:47
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
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `ID` int(11) NOT NULL,
  `Contenido` text NOT NULL,
  `id_FK_juego` int(4) NOT NULL,
  `id_FK_user` int(3) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `juego_id` int(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `juegoEstado` varchar(10) NOT NULL,
  `fechaSalida` date NOT NULL,
  `fechaCracked` date NOT NULL,
  `nombreCrack` varchar(10) NOT NULL,
  `linkDescarga` text NOT NULL,
  `imagen` text NOT NULL,
  `id_FK_User` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`juego_id`, `nombre`, `juegoEstado`, `fechaSalida`, `fechaCracked`, `nombreCrack`, `linkDescarga`, `imagen`, `id_FK_User`) VALUES
(1, 'eFootball PES 2021', 'Cracked', '2020-09-24', '2020-10-14', 'CPY', 'https://www.skidrowreloaded.com/efootball-pes-2021-cpy/', 'https://i.imgur.com/iYOn0ns.jpg', 20),
(3, 'FIFA 19', 'Cracked', '2018-09-27', '2018-11-30', 'CPY', 'https://www.compucalitv.com/fifa-19-pc-full-espanol/', 'https://i.imgur.com/tau2xgH.jpg', 180),
(4, 'farcy 6', 'Cracked', '2020-02-05', '2020-02-08', 'billy', 'mega.com', 'https://static1-es.millenium.gg/articles/1/24/59/1/@/114524-fc6-portada-article_image_d-1.jpg', 21),
(5, 'Uncharted 4', 'Cracked', '2020-02-05', '2020-02-08', 'jhons', 'mega.com', 'https://i.blogs.es/09a281/uncharted400/2560_3000.jpg', 22),
(6, 'farcy 6', 'Uncracked', '2020-02-05', '2020-02-08', 'billy', 'mega.com', 'https://i.blogs.es/09a281/uncharted400/2560_3000.jpg', 21),
(7, 'assassins creed odyssey', 'Uncracked', '2020-02-05', '2020-02-08', 'vitolbll', 'mega.com', 'https://i.blogs.es/248355/1/2560_3000.jpg', 23),
(8, 'assassins creed unity', 'Cracked', '2020-02-05', '2020-02-08', 'vitolbll', 'mega.com', 'https://i.blogs.es/41c0c0/050814-assassins-creed-unity-tlqns/1366_2000.jpg', 23),
(9, 'mario cart', 'Cracked', '2020-02-05', '2020-02-08', 'billy', 'drive.google.com', 'https://media.metrolatam.com/2019/10/03/mariokarttour800-e1d9469db342332768b0ad8a59ff4869-1200x600.jpg', 21),
(10, 'mario 3', 'Cracked', '1998-02-05', '2020-02-08', 'billy', 'mega.com', 'https://www.pulsovideojuegos.com/wp-content/uploads/2020/01/super-mario-bros-3.jpg', 21),
(11, 'call of duty', 'Cracked', '2020-02-05', '2020-02-08', 'billy', 'drive.google.com', 'https://www.muycomputer.com/wp-content/uploads/2020/04/Call-of-Duty-Modern-Warfare-2-Remastered.jpg', 23);

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
(21, 'test', 'test', 'test@test', '$2y$05$40ihu7qsnug6s7zfozf39eL2roB4jKieby0ogYercTyHdBlYkr58C', './assets/img/avatar/test.png', '<p>desarrollador ..</p>', '', '', ''),
(22, 'test2', 'test', 'test2@corero', '$2y$05$tmosh535hfpgx9nwgml8ueNeIdkPWg0qmkW2bPHcoy.kzSrD4AHMG', './assets/img/avatar/test2.png', '', '', '', ''),
(23, 'skaad102', 'daniel adame coba', 'skaad102@gmail.com', '$2y$05$ok344rylth78w9lw1hk4puNwYrI/s.pg44N7FXY3NzQmHCLPCLvom', './assets/img/avatar/skaad102.png', '<p>prueba sobre mi</p>', 'skate.adame/', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_FK_juego` (`id_FK_juego`),
  ADD KEY `id_FK_user` (`id_FK_user`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`juego_id`),
  ADD KEY `id_FK_User` (`id_FK_User`);

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
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `juego_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_FK_juego`) REFERENCES `juego` (`juego_id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_FK_user`) REFERENCES `usuario` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
