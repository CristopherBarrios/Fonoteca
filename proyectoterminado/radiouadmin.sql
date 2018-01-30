-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2017 a las 20:58:43
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `radiouadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentales`
--

CREATE TABLE `documentales` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `path` longblob NOT NULL,
  `audio` longblob NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentales`
--

INSERT INTO `documentales` (`id`, `name`, `path`, `audio`, `fecha`) VALUES
(1, '[kdpwk]:   dwd', 0x73756269646f732f446f63756d656e74616c65732f6b6470776b2f494d475f32303136303132395f3139323035343531322e6a7067, 0x73756269646f732f446f63756d656e74616c65732f6b6470776b2f3133202d204661616970204465204f6961642e6d7033, '2017-09-19'),
(2, '[Pene]:   David', 0x73756269646f732f446f63756d656e74616c65732f50656e652f313530353834323638363731353237383735313934342e6a7067, 0x73756269646f732f446f63756d656e74616c65732f50656e652f566f7a203031362e6d3461, '2017-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevistas`
--

CREATE TABLE `entrevistas` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `path` longblob NOT NULL,
  `audio` longblob NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `entrevistas`
--

INSERT INTO `entrevistas` (`id`, `name`, `path`, `audio`, `fecha`) VALUES
(1, '[google]:   FfF', 0x73756269646f732f456e7472657669737461732f676f6f676c652f6565776d37687172766b646f66336775676a73732e676966, 0x73756269646f732f456e7472657669737461732f676f6f676c652f3032202d20456f6e20426c75652041706f63616c797073652e6d7033, '2017-09-19'),
(2, '[Al oido]:   David', 0x73756269646f732f456e7472657669737461732f416c206f69646f2f, 0x73756269646f732f456e7472657669737461732f416c206f69646f2f566f7a203031342e6d3461, '2017-09-19'),
(3, '[Al oido]:   David', 0x73756269646f732f456e7472657669737461732f416c206f69646f2f, 0x73756269646f732f456e7472657669737461732f416c206f69646f2f, '2017-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pasadmin` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`) VALUES
(1, 'Melgar', '12345', 'jorlim98@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

CREATE TABLE `musica` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `path` longblob NOT NULL,
  `audio` longblob NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`id`, `name`, `path`, `audio`, `fecha`) VALUES
(1, '[musica]:   ff', 0x73756269646f732f4d75736963612f6d75736963612f323031372d30322d30352031352e33342e31302e6a7067, 0x73756269646f732f4d75736963612f6d75736963612f3034202d204d616e7472612e6d7033, '2017-09-19'),
(2, '[musica]:   David', 0x73756269646f732f4d75736963612f6d75736963612f313530353834323532343334382d3534353039323032392e6a7067, 0x73756269646f732f4d75736963612f6d75736963612f566f7a203031352e6d3461, '2017-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progra`
--

CREATE TABLE `progra` (
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `progra`
--

INSERT INTO `progra` (`nombre`) VALUES
('Al Oído'),
('Prueba_Pro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progra1`
--

CREATE TABLE `progra1` (
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `progra1`
--

INSERT INTO `progra1` (`nombre`) VALUES
('Al oido'),
('google');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progra2`
--

CREATE TABLE `progra2` (
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `progra2`
--

INSERT INTO `progra2` (`nombre`) VALUES
('musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progra3`
--

CREATE TABLE `progra3` (
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `progra3`
--

INSERT INTO `progra3` (`nombre`) VALUES
('kdpwk'),
('Pene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `path` longblob NOT NULL,
  `audio` longblob NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `name`, `path`, `audio`, `fecha`) VALUES
(1, '[Al Oído]:   asd', 0x73756269646f732f50726f6772616d61732f416c204fc3ad646f2f37316361363631666361336463323432336331343937303938366138383261395f677265656e2d6c616e7465726e732d6c616e7465726e732d616e642d677265656e2d6c616e7465726e2d6c6f676f2d636c69706172745f323935332d323935332e6a706567, 0x73756269646f732f50726f6772616d61732f416c204fc3ad646f2f3130202d20446973706f736974696f6e2e6d7033, '2017-09-19'),
(2, '[Prueba_Pro]:   Prueba_Pro', 0x73756269646f732f50726f6772616d61732f5072756562615f50726f2f32303239323435395f31303135353534303332373230373736365f3637393436343537325f6e2e6a7067, 0x73756269646f732f50726f6772616d61732f5072756562615f50726f2f50726f6d6f2041737475726961732e6d7033, '2017-09-19'),
(3, '[Al Oído]:   David', 0x73756269646f732f50726f6772616d61732f416c204fc3ad646f2f313530353834323430343438322d313031313832353631322e6a7067, 0x73756269646f732f50726f6772616d61732f416c204fc3ad646f2f566f7a203031332e6d3461, '2017-09-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentales`
--
ALTER TABLE `documentales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `progra`
--
ALTER TABLE `progra`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `progra1`
--
ALTER TABLE `progra1`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `progra2`
--
ALTER TABLE `progra2`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `progra3`
--
ALTER TABLE `progra3`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentales`
--
ALTER TABLE `documentales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
