-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2020 a las 06:56:23
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos_monitoreocovi19`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'LLAMADA TELEFÓNICA ', '2020-03-18 17:37:21'),
(6, 'DERIVACIÓN DEL MINSA', '2020-03-18 17:50:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(3, 'Juan Villegas', 2147483647, 'juan@hotmail.com', '(300) 341-2345', 'Calle 23 # 45 - 56', '1980-11-02', 5, '2017-12-23 20:11:04', '2017-12-24 01:11:04'),
(4, 'Pedro Pérez', 2147483647, 'pedro@gmail.com', '(399) 876-5432', 'Calle 34 N33 -56', '1970-08-07', 0, '0000-00-00 00:00:00', '2017-12-23 23:26:28'),
(5, 'Miguel Murillo', 325235235, 'miguel@hotmail.com', '(254) 545-3446', 'calle 34 # 34 - 23', '1976-03-04', 0, '0000-00-00 00:00:00', '2017-12-23 23:25:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `distrito` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `distrito`, `fecha`) VALUES
(5, 'Chorrillos', '2020-03-20 04:20:07'),
(6, '\0Villa Maria', '2020-03-20 04:20:07'),
(7, 'Villa el Salvador', '2020-03-20 05:29:02'),
(8, 'Barranco', '2020-03-20 04:20:07'),
(9, 'Miraflores', '2020-03-20 04:20:07'),
(10, '\0Surco', '2020-03-20 04:20:07'),
(11, '\0San Borja', '2020-03-20 04:20:07'),
(12, '\0Surquillo', '2020-03-20 04:20:07'),
(13, 'San Isidro', '2020-03-20 04:20:07'),
(14, 'Pta. Hermosa', '2020-03-20 04:20:08'),
(15, 'Pucusana', '2020-03-20 04:20:08'),
(16, 'Pta. Negra', '2020-03-20 04:20:08'),
(17, '\0San Bartolo', '2020-03-20 04:20:08'),
(18, 'Sta. Maria', '2020-03-20 04:51:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estado` text CHARACTER SET latin1 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`, `fecha`) VALUES
(1, 'POR VISITAR', '2020-03-18 19:13:21'),
(4, 'VISITADO', '2020-03-18 19:13:37'),
(5, 'OBSERVADO', '2020-03-18 22:26:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `soporte` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`id`, `soporte`, `fecha`) VALUES
(16, 'TOMO MUESTRA', '2020-03-18 20:24:38'),
(17, 'NO TOMO MUESTRA', '2020-03-18 20:24:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `edad_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `distrito_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `id_distrito` int(11) NOT NULL,
  `telefono_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `comoAB_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `muestra_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `FechaSintomas` text COLLATE utf8_spanish_ci,
  `Sintomas` text COLLATE utf8_spanish_ci,
  `Enfermedad` text COLLATE utf8_spanish_ci NOT NULL,
  `Tos` text COLLATE utf8_spanish_ci,
  `DolorGarganta` text COLLATE utf8_spanish_ci,
  `Fiebre` text COLLATE utf8_spanish_ci,
  `SecrecionNasal` text COLLATE utf8_spanish_ci,
  `OtroSintomas` text COLLATE utf8_spanish_ci,
  `Viaje` text COLLATE utf8_spanish_ci,
  `NumeroViaje` text COLLATE utf8_spanish_ci,
  `ContactoPersonaSospechosa` text COLLATE utf8_spanish_ci,
  `DatosPersonaSospechosa` text COLLATE utf8_spanish_ci,
  `CelPersonaSospechosa` text COLLATE utf8_spanish_ci,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `oficina` text COLLATE utf8_spanish_ci NOT NULL,
  `area` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` text COLLATE utf8_spanish_ci NOT NULL,
  `cel` text COLLATE utf8_spanish_ci NOT NULL,
  `sede` text COLLATE utf8_spanish_ci NOT NULL,
  `piso` text COLLATE utf8_spanish_ci NOT NULL,
  `id_estado` int(11) NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `id_categoria`, `codigo`, `descripcion_paciente`, `dni`, `nombre_paciente`, `edad_paciente`, `direccion_paciente`, `distrito_paciente`, `id_distrito`, `telefono_paciente`, `comoAB_paciente`, `muestra_paciente`, `FechaSintomas`, `Sintomas`, `Enfermedad`, `Tos`, `DolorGarganta`, `Fiebre`, `SecrecionNasal`, `OtroSintomas`, `Viaje`, `NumeroViaje`, `ContactoPersonaSospechosa`, `DatosPersonaSospechosa`, `CelPersonaSospechosa`, `nombre`, `oficina`, `area`, `cargo`, `cel`, `sede`, `piso`, `id_estado`, `imagen`, `fecha`) VALUES
(127, 1, '10002', 'PRUEBAasd', '76244566', 'YOSSHI SALVADOR CONDORI MENDIETA', '60', 'PEDRO LAOS HURTADO MZ C LT 8asads', 'SAN JUAN DE MIRAFLORESasd', 7, '917023454asd', 'LE DUELE EL PECHOasd', 'TOMO MUESTRA', '', '', '', '', '', 'SI', '', '', '', '', '', '', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-18 15:20:42'),
(128, 1, '10003', 'PRUEBA', '76244589', 'ZUMEL HECTOR DE LA O SOTO', '26', 'PEDRO LAOS HURTADO MZ C LT 8', 'SAN JUAN DE MIRAFLORES', 5, '917023454', 'LE DUELE EL PECHO', 'TOMO MUESTRA', '', '', '', '', '', 'SI', '', '', '', '', '', '', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 1, 'vistas/img/productos/default/anonymous.png', '2020-03-18 16:54:34'),
(129, 6, '60001', 'PRUEBAas', '76245285', 'ALEXANDRA MARGARET OLIVARES VELA', '30', 'PEDRO LAOS HURTADO MZ C LT 8as', 'SAN JUAN DE MIRAFLORESas', 7, '91700000', 'LE DUELE EL PECHOas', 'NO TOMO MUESTRA', '06/06/2020', 'NO', '', 'NO', 'NO', 'SI', 'NO', 'DOLOR DEL PECHOasas', 'SI', '121', 'SI', 'UN AMIGO EN ESPAÑAasd', 'UN AMIGO EN ESPAÑAasd', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 5, 'vistas/img/productos/default/anonymous.png', '2020-03-18 17:11:35'),
(130, 1, '10004', 'REUNION DE EQUALI', '76244568', 'MARIA FERNANDA ORTEGA CONTRERAS', '26', 'PEDRO LAOS HURTADO MZ C LT 8', 'SAN JUAN DE MIRAFLORES', 7, '917023454', 'LE DUELE EL PECHO', 'TOMO MUESTRA', '03/02/2020', 'SI', '', 'SI', 'SI', 'SI', 'SI', 'DOLOR EN LA ESPALDA', 'SI', '13', 'SI', 'MENDEZ', '917023454', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 1, 'vistas/img/productos/default/anonymous.png', '2020-03-19 22:13:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `oficina` text COLLATE utf8_spanish_ci NOT NULL,
  `area` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` text COLLATE utf8_spanish_ci NOT NULL,
  `cel` text COLLATE utf8_spanish_ci NOT NULL,
  `sede` text COLLATE utf8_spanish_ci NOT NULL,
  `piso` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `oficina`, `area`, `cargo`, `cel`, `sede`, `piso`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, '76244561', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/674.jpg', 1, '2020-03-19 22:02:43', '2020-03-20 03:02:43'),
(70, '76244566', 'YOSSHI SALVADOR CONDORI MENDIETA', 'TECNOLOGIA DE LA INFORMACION', 'PROGRAMACIÓN Y DESARROLLO INFORMÁTICO', 'DESARROLLADOR JUNIOR', '91702454', 'Pinillos', '2', 'ycondori', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', 'vistas/img/usuarios/ycondori/298.jpg', 1, '2020-03-18 15:04:37', '2020-03-18 20:04:37'),
(71, '76244577', 'ERNESTO ALEJANDRO LA TORRE CRUZ', 'PRUEBA', 'PRUEBA', 'PRUEBA', '917023452', 'Pinillos', '1', 'elatorre', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Usuario', 'vistas/img/usuarios/elatorre/125.png', 1, '2020-03-18 15:04:49', '2020-03-18 20:04:49'),
(73, '10634035', 'RUBEN PORFIRIO SALAS MENDOZA', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '923723422', 'Pinillos', '2', 'rsalas', '$2a$07$asxx54ahjppf45sd87a5auKv9R1Tr8EhdTiX.zKyAymV3nZQpgP36', 'Informatico', '', 1, '2020-01-07 08:06:14', '2020-01-07 13:06:14'),
(74, '47685177', 'DIEGO FER CHAVEZ HINOJOSA', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '917023454', 'Pinillos', '2', 'dchavez', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-01-07 09:47:01', '2020-01-07 14:47:01'),
(76, '40463112', 'JACK PAUL LAZARO GOMEZ', 'TECNOLOGIA DE LA INFORMACION', 'JEFATURA', 'JEFE', '942820939', 'Pinillos', '2', 'jlazaro', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', '', 1, '2019-12-16 10:18:33', '2019-12-16 15:18:33'),
(77, '43800035', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 'eochoa', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', '', 1, '2020-01-07 09:24:10', '2020-01-07 14:24:10'),
(78, '10216202', 'EDDIE SALGADO LOPEZ', 'TECNOLOGIA DE LA INFORMACION', 'REDES Y TELECOMUNICACIONES', 'COORDINADOR ', '924695698', 'Pinillos', '2', 'esalgado', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-01-03 08:47:09', '2020-01-03 13:47:09'),
(79, '41738608', 'JAVIER GERMAN RODRIGUEZ CONDORI', 'TECNOLOGIA DE LA INFORMACION', 'REDES Y TELECOMUNICACIONES', 'SOPORTE', '987245469', 'Pinillos', '2', 'jrodriguez', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-01-07 08:34:56', '2020-01-07 13:34:56'),
(80, '09934648', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 'lgiudiche', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', '', 1, '2020-01-02 12:16:49', '2020-01-02 17:16:49'),
(81, '70132691', 'CARLOS LUIS GONZAGA ARIAS CONDE', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '927055190', 'Pinillos', '2', 'carias', '$2a$07$asxx54ahjppf45sd87a5audzrTwIEyHvKoJU8D99USUdFgXv1O98.', 'Informatico', 'vistas/img/usuarios/carias/287.jpg', 1, '2019-12-31 10:42:31', '2019-12-31 15:42:31'),
(82, '46563517', 'JULIO CESAR GUARDIA VILCA', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '992972257', 'Pinillos', '2', 'jguardia', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-01-07 09:38:13', '2020-01-07 14:38:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(17, 10001, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Aspiradora Industrial \",\"cantidad\":\"2\",\"stock\":\"13\",\"precio\":\"1200\",\"total\":\"2400\"},{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"2\",\"stock\":\"7\",\"precio\":\"6300\",\"total\":\"12600\"},{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"4200\",\"total\":\"4200\"}]', 3648, 19200, 22848, 'Efectivo', '2017-12-24 01:11:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
