-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2023 a las 20:12:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistemawissenlp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumons`
--

CREATE TABLE `alumons` (
  `id` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `nombre_alumno` varchar(200) NOT NULL,
  `informacion_alumno` text NOT NULL,
  `genero` varchar(50) NOT NULL,
  `fecha_nacimiento` varchar(100) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `url_foto_principal` varchar(200) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `dia_clases` varchar(100) NOT NULL,
  `fecha_inicio` varchar(100) NOT NULL,
  `fecha_fin` varchar(100) NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `numero_cuotas` varchar(100) NOT NULL,
  `fecha_pago` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumons`
--

INSERT INTO `alumons` (`id`, `fecha_alta`, `nombre_alumno`, `informacion_alumno`, `genero`, `fecha_nacimiento`, `dni`, `direccion`, `correo`, `telefono`, `url_foto_principal`, `curso`, `precio`, `horario`, `dia_clases`, `fecha_inicio`, `fecha_fin`, `forma_pago`, `numero_cuotas`, `fecha_pago`) VALUES
(16, '2023-06-28', 'Megan', 'Soy muy inteligente', 'Femenino', '01/05/2000', '72211102', 'pasaje lopez', 'luis.tataje.espinoza@gmail.com', '9502571883', 'fotos/16/h.jpg', 'PHP', 100, '10 pm', 'lunes', '01/05/2000', '01/05/2000', 'Contado', '0', '01/05/2000'),
(17, '2023-06-28', 'Luis Hernando Tataje Espinoza', 'Estudiante de ingenieria en computacion y sistemas, conocimientos en androi studio', 'Maculino', '04/07/2002', '72211102', 'san carlos', 'davis_anderson_87@hotmail.com', '990477074', 'fotos/17/734703_466857143350881_1763696833_n.jpg', 'HTML y CSS', 300, '10 pm - 12pm', 'lunes - jueves', '28/06/2023', '30/12/2023', 'Cuotas', '3', '01/07/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `propiedad1` int(11) DEFAULT NULL,
  `propiedad2` int(11) DEFAULT NULL,
  `propiedad3` int(11) DEFAULT NULL,
  `propiedad4` int(11) DEFAULT NULL,
  `propiedad5` int(11) DEFAULT NULL,
  `propiedad6` int(11) DEFAULT NULL,
  `oficina_central` varchar(400) DEFAULT NULL,
  `telefono1` varchar(100) DEFAULT NULL,
  `telefono2` varchar(100) DEFAULT NULL,
  `email_contacto` varchar(100) DEFAULT NULL,
  `horarios` varchar(200) DEFAULT NULL,
  `mapa` varchar(300) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `tipo_visualizacion_propiedades` varchar(1) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email_administrador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `propiedad1`, `propiedad2`, `propiedad3`, `propiedad4`, `propiedad5`, `propiedad6`, `oficina_central`, `telefono1`, `telefono2`, `email_contacto`, `horarios`, `mapa`, `facebook`, `twitter`, `tipo_visualizacion_propiedades`, `user`, `password`, `email_administrador`) VALUES
(1, 0, 0, 0, 0, 0, 0, 'Calle piura 329 - Plazuela Bolognesi', '985 926 007', '', 'wissenlp@gmail.com', 'De 12h a 12h', 'mapa', 'https://www.facebook.com/WissenLP/', '', 'f', 'admin', '1234', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre_del_curso` varchar(50) NOT NULL,
  `precio_del_curso` int(11) NOT NULL,
  `info_curso` text NOT NULL,
  `introducion_curso` text NOT NULL,
  `requisitos_curso` text NOT NULL,
  `programa_curso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre_del_curso`, `precio_del_curso`, `info_curso`, `introducion_curso`, `requisitos_curso`, `programa_curso`) VALUES
(1, 'Desarrollo Web', 500, 'Duración: 10 semanas', 'En este curso aprenderás a crear tu sitio web partiendo del prototipo en papel. Te sumergirás en las mejores prácticas del desarrollo web, trabajando con HTML y CSS. Conocerás herramientas para optimizar al máximo tu sitio web, implementando prácticas de versionado de código con GIT, y preprocesadores como SASS. Al finalizar, sabrás cómo aplicar Bootstrap a tus proyectos, y comprenderás lo importante del SEO en tus desarrollos. Subirás tu sitio a un servidor, y aprenderás a interactuar con este servicio. También sabrás cómo presentar un presupuesto y atender a tu cliente final.', 'Para este curso no es necesario tener conocimientos previos. Para mejorar tu experiencia de cursada, te aconsejamos tener una computadora con 2 GB de memoria RAM, procesador de dos núcleos y GPU de 2 GB de RAM.', 'Clase 1Prototipado y conceptos básicos de HTMLClase 2Primeros pasos con HTMLClase 3Incluyendo CSS a nuestro proyectoClase 4CSS + Box ModelingClase 5FlexboxClase 6GRIDSClase 7GRIDS IIClase 8Pseudoclases y BEMClase 9Frameworks CSS + BootstrapClase 10GITClase 11GITHUBClase 12SASS IClase 13SASS IIClase 14AnimacionesClase 15SEO y buenas prácticasClase 16Servidores: tu sitio en líneaClase 17Conociendo a nuestro clienteClase 18Proyecto final'),
(2, 'Java', 200, 'Duración: 8 semanas', 'En este curso aprenderás las nociones centrales del lenguaje Java, así como las virtudes del paradigma de programacion orientada a objetos.', 'Para este curso es importante que hayas cursado Desarrollo Web o Javascript y que tengas conocimientos en lenguajes de programación. Para mejorar tu experiencia de cursada, te aconsejamos contar con: - PC con 8 GB de memoria RAM, procesador de cuatro núcleos y GPU de 2 GB de RAM - Algún editor de texto para escribir código, puede ser IntelliJ edición community,Eclipse o JRE', 'Conceptos generales de Java Inicial Paradigma orientado a objetos Repositorio de datos y código Spring Boot'),
(3, 'Programación Backend', 100, 'Duración: 24 semanas', 'En este curso aprenderás a desarrollar aplicaciones modernas con Node.js y MongoDB. Programarás en Javascript del lado del servidor aplicando técnicas asincrónicas. Aprenderás a trabajar con Bases de datos SQL y NoSQL dominando la gestión de los datos en forma eficiente, ágil y con una gran facilidad de escalabilidad. Al finalizar el curso serás capaz de diseñar complejas aplicaciones backend robustas, rápidas y escalables, dominando diferentes técnicas de comunicación, manejo de procesos distribuidos, control de grandes volúmenes de datos y despliegue a distintas plataformas web.', 'Para este curso es importante haber hecho el curso de React JS o tener conocimiento avanzado de Javascript y básico de programación en ES6. Para mejorar tu experiencia de cursada, te aconsejamos contar con: - PC con 8 GB de memoria RAM, procesador de cuatro núcleos y GPU de 2 GB de RAM (aunque recomendamos 16 GB de memoria RAM, procesador de ocho núcleos, GPU de 4 GB de RAM, considerando que se ejecutan emuladores junto al IDE) - Sistema operativo: OSx o Windows 7/superior - Algún editor de texto para escribir código, puede ser Sublime Text, Atom o https://code.visualstudio.com/download” target=”_blank”>Visual Studio Code', 'Clase 1 Principios básicos de JavaScript Clase 2 Nuevas funcionalidades de los lenguajes ECMAScritpt Clase 3 Programación sincrónica y asincrónica Clase 4 Manejo de archivos en JavaScript Clase 5 Administrador de paquetes NPM Clase 6 Servidores web Clase 7 Express avanzado Clase 8 Router y Multer Clase 9 Motores de plantillas Clase 10 Websockets Clase 11 Aplicación chat con Websockets Clase 12 MongoDB Clase 13 CRUD en MongoDB Clase 14 Mongoose Clase 15 Primera práctica integradora Clase 16 Mongo Avanzado (Parte I) Clase 17 Mongo Avanzado (Parte II) Clase 18 Cookies, Sessions & Storages Clase 19 Cookies, Session & Storage II Clase 20 Autorización y autenticación Clase 21 Estrategia de autenticación por terceros + JWT Clase 22 Passport Avanzado Clase 23 Ruteo avanzado y estrategias avanzadas de autorización Clase 24 Segunda práctica integradora Clase 25 Proceso principal del servidor + Global & Child Process Clase 26 Arquitectura por capas Clase 27 Arquitectura del servidor: Diseño Clase 28 Arquitectura del servidor: Persistencia Clase 29 Desarrollo de un servidor web basado en capas completo Clase 30 Mailing y mensajería Clase 31 Testing Mocks Clase 32 Optimización Clase 33 Versiones y paquetes Clase 34 Logging y performance Clase 35 Clusters y escalabilidad Clase 36 Orquestación de contenedores Clase 37 Tercera práctica integradora Clase 38 Configuración y seguridad Clase 39 Documentación en API REST Clase 40 Test unitarios Clase 41 Testing Avanzado Clase 42 Frameworks de desarrollo: NEST I Clase 43 Frameworks de desarrollo: NEST II Clase 44 Cuarta práctica integradora Clase 45 Product Cloud: despliegue de nuestro aplicativo Clase 46 Pasarelas de pago'),
(4, 'Marketing de contenidos', 50, 'Duración: 8 semanas', 'En este curso aprenderás las nociones centrales del marketing de contenidos y la creación de una estrategia práctica para la adquisición de potenciales clientes. Crearás un plan de contenidos para aplicar en redes sociales, blogs, newsletters y otros canales', 'Para este curso es necesario tener conocimientos de Community Management o haber hecho el curso de Community Manager & Publicidad. Para mejorar tu experiencia de cursada, te aconsejamos contar con buena conexión a internet y celular/computadora para poder asistir a las clases, tener acceso a: - AnswerThePublic - SpaceGram - Tokboard', 'No estamos solos ¿De qué hablamos cuando hablamos de contenido? ¿Cómo generar historias que atrapen? Cada cosa en su lugar Planificación y medición Proyecto Final'),
(5, 'SQL', 400, 'Duración: 13 semanas', 'En este curso aprenderás las nociones centrales de las bases de datos relacionales, las cuales son implementadas por todas las organizaciones para poder tomar decisiones con base en la información que generan en su modelo de negocio. Crearás una base de datos relacional desde cero, iniciando con la generación de la estructura hasta la inserción de la información, e implementación de procesos de automatización para el mantenimiento de la base. Implementarás consultas SQL avanzadas para generar reportes e informes para la toma decisiones. Al terminar el curso estarás listo para analizar bases de datos e información de cualquier modelo de negocio.', 'Para este curso te aconsejamos tener conocimientos sobre otros lenguajes de programación y se profundizan temáticas del curso de Data Analytics. Para mejorar tu experiencia de cursada, te aconsejamos contar con: - PC con 4 GB de memoria RAM, procesador de cuatro núcleos y GPU de 2 GB de RAM - Sistema operativo: macOS X 10.10 o superior o Windows 7 o superior - MySQL Server y MySQL Workbench', 'Clase 1 Introducción a base de datos Clase 2 Introducción a bases de datos relacionales Clase 3 El lenguaje SQL Clase 4 Sublenguajes SQL Clase 5 Consultas y subconsultas SQL Clase 6 Sublenguaje DDL Clase 7 Objetos de una base de datos Clase 8 Tablas SQL Clase 9 Vistas Clase 10 Workshop DDL Clase 11 Sublenguaje DML 1 Clase 12 Sublenguaje DML 2 Clase 13 Inserción con importación Clase 14 Actualización y eliminación de datos Clase 15 Funciones Clase 16 Stored procedures Clase 17 Triggers Clase 18 Workshop DML Clase 19 Sublenguaje DCL Clase 20 Sublenguaje TCL Clase 21 Backup y restauración Clase 22 Workshop DCL y TCL Clase 23 Datawarehouse en el Business Intelligence Clase 24 Visita de especialista Clase 25 Proyecto final'),
(6, 'html y css', 350, 'sdfsd', 'sdf', 'sdf', 'sdf'),
(7, 'dfg', 100, 'Duración: 13 semanas', 'En este curso aprenderás ', 'sa', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `nombre_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumons`
--
ALTER TABLE `alumons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumons`
--
ALTER TABLE `alumons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
