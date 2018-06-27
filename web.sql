-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2018 a las 16:05:48
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `fecharealizacion` date DEFAULT NULL,
  `estudiante` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `comentario`, `fecharealizacion`, `estudiante`, `tipo`) VALUES
(1, 'Me sirvió mucho, Gracias ', '2018-06-19', 1, 'Ocupacional'),
(2, 'Faltan Perfiles', '2018-06-20', 1, 'Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `documento` varchar(10) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombres`, `apellidos`, `documento`, `correo`, `telefono`, `contraseña`, `foto`) VALUES
(1, 'Alexander', 'Peñaloza', '1090494143', 'luisalexanderpr@ufps.edu.co', '3213568479', 'alexander1994', 'perfil.jpg'),
(2, 'Monica', 'Ovallos', '1090498367', 'monicaalejandraod@ufps.edu.co', '3212118813', 'monica', '2057823ba160707.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudianteocupacional`
--

CREATE TABLE `estudianteocupacional` (
  `id` int(11) NOT NULL,
  `estudiante` int(11) NOT NULL,
  `ocupacional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudianteocupacional`
--

INSERT INTO `estudianteocupacional` (`id`, `estudiante`, `ocupacional`) VALUES
(2, 2, 1),
(11, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacional`
--

CREATE TABLE `ocupacional` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` longtext,
  `video` varchar(100) DEFAULT NULL,
  `portada` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ocupacional`
--

INSERT INTO `ocupacional` (`id`, `nombre`, `descripcion`, `video`, `portada`) VALUES
(1, 'Desarrollador Web', '<div style=\"text-align: justify;\"><span style=\"text-align: start;\">Un&nbsp;</span><span style=\"text-align: start;\">desarrollador web&nbsp;es un&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Programador\" title=\"Programador\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">programador</a><span style=\"text-align: start;\">&nbsp;especializado, o dedicado de forma específica, en desarrollar aplicaciones de la&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/World_Wide_Web\" title=\"World Wide Web\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">World Wide Web</a><span style=\"text-align: start;\">&nbsp;o aplicaciones distribuidas en red que se ejecutan mediante&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/HTTP\" class=\"mw-redirect\" title=\"HTTP\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">HTTP</a><span style=\"text-align: start;\">&nbsp;desde un&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Servidor_web\" title=\"Servidor web\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">servidor web</a><span style=\"text-align: start;\">&nbsp;a un&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Navegador_web\" title=\"Navegador web\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">navegador web</a><span style=\"text-align: start;\">.</span></div><div style=\"text-align: justify;\"><span style=\"text-align: start;\">Los desarrolladores web pueden trabajar en todo tipo de organismos, como grandes empresas, gobiernos, y pequeñas y medianas empresas, o por cuenta propia como&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Freelance\" title=\"Freelance\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">autónomos</a><span style=\"text-align: start;\">. Algunos desarrolladores web trabajan para organismos como empleados fijos a tiempo completo, mientras que otros probablemente prestan sus servicios como&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Consultores\" class=\"mw-redirect\" title=\"Consultores\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">consultores</a>&nbsp;<span style=\"text-align: start;\">independientes o en calidad de contratistas en agencias de colocación.</span></div>', 'https://www.youtube.com/embed/nl2rusv9i8Q', 'desarrollador_web.png'),
(2, 'Director de Proyecto', '<p style=\"text-align: justify; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 16px 1.1em; line-height: 1.4em;\">Los directores de proyectos son personas organizadas, apasionadas y orientadas a las metas, que además entienden lo que los proyectos tienen en común, y su rol estratégico para que una organización aprenda, cambie, y tenga éxito.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 16px 1.1em; line-height: 1.4em;\">Los directores de proyectos son&nbsp;agentes de cambio: ellos toman las metas del proyecto como metas propias y utilizan sus habilidades y experiencia para inspirar en el equipo del proyecto un sentido de propósito compartido. Ellos disfrutan la adrenalina de los nuevos desafíos y la responsabilidad de entregar resultados en el negocio.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 16px 1.1em; line-height: 1.4em;\">Ellos trabajan bajo presión y se sienten&nbsp;cómodos con el cambio y la complejidad de los ambientes dinámicos. Ellos pueden pasar rápidamente desde una visión general a los pequeños detalles que son cruciales, y saben cuándo concentrarse en cada uno de ellos.</p>', 'https://www.youtube.com/embed/uP2ouqUCUo8', 'Diseño.png'),
(3, 'Arquitecto', '<div style=\"text-align: justify;\"><span style=\"text-align: start;\">En los inicios de la informática, la&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Programaci%C3%B3n\" title=\"Programación\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: start;\">programación</a><span style=\"text-align: start;\">&nbsp;se consideraba un arte y se desarrollaba como tal debido a la dificultad que entrañaba para la mayoría de las personas, pero con el tiempo se han ido descubriendo y desarrollando formas y guías generales, con base a las cuales se puedan resolver los problemas. A estas, se les ha denominado&nbsp;</span><span style=\"text-align: start;\">arquitectura de software</span><span style=\"text-align: start;\">, porque, a semejanza de los planos de un edificio o construcción, estas indican la estructura, funcionamiento e interacción entre las partes del software. En el libro \"An introduction to Software Architecture\", David Garlan y Mary Shaw definen que la arquitectura es un nivel de diseño que hace foco en aspectos \"más allá de los algoritmos y estructuras de datos de la computación; el diseño y especificación de la estructura global del sistema es un nuevo tipo de problema\".</span></div>', 'https://www.youtube.com/embed/PHgc59WfnK0', 'diseno.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` longtext,
  `video` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`id`, `nombre`, `descripcion`, `video`) VALUES
(1, 'CEO', '<p style=\"margin: 0.5em 0px; line-height: inherit; color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px; text-align: start;\">El término&nbsp;<b>director ejecutivo</b>&nbsp;o también&nbsp;<b><a href=\"https://es.wikipedia.org/wiki/Director_general\" title=\"Director general\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">director general</a></b>,&nbsp;<b>director gerente</b>,&nbsp;<b>ejecutivo delegado</b>,&nbsp;<b>jefe ejecutivo</b>,&nbsp;<b>presidente ejecutivo</b>,&nbsp;<b>principal oficial ejecutivo</b>,&nbsp;<b>consejero delegado</b>&nbsp;o&nbsp;<b>primer ejecutivo</b>, suelen usarse indistintamente para hacer referencia a la persona encargada de máxima autoridad de la llamada&nbsp;<a href=\"https://es.wikipedia.org/wiki/Gesti%C3%B3n\" title=\"Gestión\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">gestión</a>&nbsp;y dirección&nbsp;<a href=\"https://es.wikipedia.org/wiki/Administraci%C3%B3n\" title=\"Administración\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">administrativa</a>&nbsp;en una&nbsp;<a href=\"https://es.wikipedia.org/wiki/Organizaci%C3%B3n\" title=\"Organización\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">organización</a>&nbsp;o&nbsp;<a href=\"https://es.wikipedia.org/wiki/Instituci%C3%B3n\" title=\"Institución\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">institución</a>.</p><p style=\"margin: 0.5em 0px; line-height: inherit; color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px; text-align: start;\">Aunque en las empresas pequeñas es habitual que el puesto de presidente y de director ejecutivo recaiga en la misma persona, no siempre es de esta manera, y suele ser el presidente quien encabeza el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Gobierno_corporativo\" title=\"\" style=\"text-decoration-line: underline; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">gobierno corporativo</a>&nbsp;(estrategias generales), y el director ejecutivo quien representa la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Administraci%C3%B3n_de_Empresas\" class=\"mw-redirect\" title=\"Administración de Empresas\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">administración de la empresa</a>&nbsp;(la fase operativa de las estrategias).</p><p style=\"margin: 0.5em 0px; line-height: inherit; color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px; text-align: start;\">En empresas grandes, el director ejecutivo puede contar con una serie de directores para cada una de las responsabilidades de la compañía, como es el caso del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Director_general_de_operaciones\" class=\"mw-redirect\" title=\"Director general de operaciones\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">director de operaciones</a>, el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Director_general_de_finanzas\" class=\"mw-redirect\" title=\"Director general de finanzas\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">director de finanzas</a>&nbsp;y el director de información.</p>', 'https://www.youtube.com/embed/GTGNuoMLaCE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(200) DEFAULT NULL,
  `fecharealizacion` date DEFAULT NULL,
  `estudiante` int(11) NOT NULL,
  `comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `respuesta`, `fecharealizacion`, `estudiante`, `comentario`) VALUES
(1, 'si faltan muchos', '2018-06-20', 1, 2),
(2, 'ya existe el ceo', '2018-06-20', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`,`estudiante`),
  ADD KEY `fk_comentario_estudiante_idx` (`estudiante`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudianteocupacional`
--
ALTER TABLE `estudianteocupacional`
  ADD PRIMARY KEY (`id`,`estudiante`,`ocupacional`),
  ADD KEY `fk_estudiante_has_ocupacional_ocupacional1_idx` (`ocupacional`),
  ADD KEY `fk_estudiante_has_ocupacional_estudiante1_idx` (`estudiante`);

--
-- Indices de la tabla `ocupacional`
--
ALTER TABLE `ocupacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`,`estudiante`,`comentario`),
  ADD KEY `fk_respuesta_estudiante1_idx` (`estudiante`),
  ADD KEY `fk_respuesta_comentario1_idx` (`comentario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudianteocupacional`
--
ALTER TABLE `estudianteocupacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ocupacional`
--
ALTER TABLE `ocupacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_estudiante` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudianteocupacional`
--
ALTER TABLE `estudianteocupacional`
  ADD CONSTRAINT `fk_estudiante_has_ocupacional_estudiante1` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_has_ocupacional_ocupacional1` FOREIGN KEY (`ocupacional`) REFERENCES `ocupacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_comentario1` FOREIGN KEY (`comentario`) REFERENCES `comentario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respuesta_estudiante1` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
