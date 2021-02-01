-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2020 a las 22:39:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `egel_tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5000) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `codigo`, `estado`, `f_registro`, `id_usuario`, `id_alta`, `id_examen`, `comentario`) VALUES
(1, 'Selección de sistemas computacionales para aplicaciones específicas', 'ICOMPU-1', 1, '2020-03-03 14:09:28', 2, 4, 1, NULL),
(2, 'Nuevas tecnologías para la implementación de sistemas de cómputo', 'ICOMPU-2', 1, '2020-03-03 14:09:28', 3, 4, 1, NULL),
(3, 'Desarrollo de hardware y su software asociado para aplicaciones específicas', 'ICOMPU-3', 0, '2020-03-03 14:09:28', 3, 4, 1, NULL),
(4, 'Adaptación de hardware y/o software para aplicaciones específicas', 'ICOMPU-4', 0, '2020-03-03 14:09:28', 2, NULL, 1, NULL),
(5, 'Redes de cómputo para necesidades específicas', 'ICOMPU-5', 1, '2020-03-03 14:09:28', 2, 4, 1, NULL),
(6, 'Análisis de sistemas de información', 'ISOFT-1', 1, '2020-03-03 14:09:28', 2, 4, 2, NULL),
(7, 'Desarrollo e implantación de aplicaciones computacionales', 'ISOFT-2', 1, '2020-03-03 14:09:28', 3, 4, 2, NULL),
(8, 'Gestión de proyectos de tecnologías de información ', 'ISOFT-3', 0, '2020-03-03 14:09:28', 2, 4, 2, NULL),
(9, 'Implementación de redes, bases de datos, sistemas operativos y lenguaje de desarrollo', 'ISOFT-4', 0, '2020-03-03 14:09:28', 2, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id`, `nombre`, `codigo`, `estado`, `f_registro`, `id_usuario`, `id_alta`, `comentario`) VALUES
(1, 'Ingeniería Computacional', 'EGEL-ICOMPU', 1, '2020-03-03 14:09:28', 2, 4, NULL),
(2, ' Ingeniería de Software', 'EGEL-ISOFT', 0, '2020-03-03 14:09:28', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `tipo`, `contenido`, `alias`, `id_usuario`) VALUES
(1, 1, 'test_foro_tipo_1', '', 2),
(2, 2, 'test_foro_tipo_2', 'noelialml', NULL),
(3, 3, 'test_foro_tipo_3', 'usuario_anomimo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(10) UNSIGNED NOT NULL,
  `tiempo_puesto` decimal(10,2) DEFAULT NULL,
  `tiempo_real` decimal(10,2) DEFAULT NULL,
  `no_preguntas` int(10) DEFAULT NULL,
  `resultado` int(10) DEFAULT NULL,
  `hora_inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_final` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `subareas` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `tiempo_puesto`, `tiempo_real`, `no_preguntas`, `resultado`, `hora_inicio`, `hora_final`, `id_usuario`, `id_examen`, `id_area`, `subareas`) VALUES
(1, '30.00', '20.33', 40, 20, '2020-03-03 14:09:28', '2020-03-03 14:09:28', 1, 1, 3, '8, 9, 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_areas`
--

CREATE TABLE `h_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5000) NOT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_examen`
--

CREATE TABLE `h_examen` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_preguntas`
--

CREATE TABLE `h_preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pregunta` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5000) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `tipo` int(10) NOT NULL,
  `justificacion` varchar(5000) DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `id_subarea` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_respuestas`
--

CREATE TABLE `h_respuestas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_respuesta` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(1000) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `estado` int(10) NOT NULL,
  `justificacion` varchar(5000) DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor` int(10) UNSIGNED NOT NULL,
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `id_subarea` int(10) UNSIGNED NOT NULL,
  `id_pregunta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_subareas`
--

CREATE TABLE `h_subareas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_subarea` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5000) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `tipo` int(10) NOT NULL,
  `justificacion` varchar(5000) DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `id_subarea` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `nombre`, `imagen`, `tipo`, `justificacion`, `comentario`, `estado`, `f_registro`, `id_usuario`, `id_alta`, `id_examen`, `id_area`, `id_subarea`) VALUES
(1, 'De los datos de la figura, ¿qué dirección de IP es válida para asignarse a cualquier máquina de la subred?', NULL, 1, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 5, 14),
(2, 'Una empresa está analizando si el sistema que va a adquirir es capaz de realizar todas las tareas deseadas. Seleccione la fase a la que corresponde dicho análisis.', NULL, 1, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 1, 1),
(3, 'Un diseñador de software debe adaptar un sistema de información utilizando un diseño estructurado con diagramas de flujo de datos. ¿Qué notación debe de utilizar?', NULL, 1, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 2, 4),
(4, 'Ordene las fases de un compilador.\r\n1. Optimizador de código\r\n2. Analizador léxico\r\n3. Generador de código\r\n4. Analizador semántico\r\n5. Analizador sintáctico\r\n6. Generador de código intermedio', NULL, 2, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 1, 1, 2),
(5, 'Se requiere evaluar los procesos del software existente. Elija los criterios de evaluación pertinentes para llevar a cabo la tarea encomendada.\r\n1. Fiabilidad\r\n2. Factibilidad\r\n3. Eficiencia\r\n4. Costo\r\n5. Productividad\r\n6. Funcionalidad', NULL, 3, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 4, 11),
(6, 'Un circuito integrado recibe el nombre de microprocesador cuando tiene en una misma pastilla al menos:\r\n1. Unidad de control\r\n2. Registros internos\r\n3. Puertos\r\n4. Unidad aritmética/lógica\r\n5. Memoria de datos\r\n6. Memoria de programas', NULL, 3, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 5, 15),
(7, 'Seleccione los elementos que se encuentran en la cara de un plato de un disco duro.\r\n1. Cabezas\r\n2. Cilindros\r\n3. Pistas\r\n4. Sectores', NULL, 3, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 1, 3, 8),
(8, 'Una librería de ventas por internet quiere construir un sistema inteligente capaz de descubrir y aprovechar el comportamiento de compras de sus clientes. ¿Qué herramientas recomendaría y por qué?\r\nRelacione ambas columnas.\r\nHerramientas\r\n1.Sistema basado en conocimiento \r\n2.Red neuronal\r\n3.Algoritmo genético simple\r\n4.Árbol de decisión\r\n\r\nFuncionalidad\r\na) Por su capacidad para reconocer patrones\r\nb) Por su capacidad para optimizar la búsqueda\r\nc) Por su capacidad para representar jerarquía y causalidad', NULL, 4, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 1, 1, 3),
(9, 'Considere la siguiente tabla que muestra un conjunto de procesos para ser ejecutados en un procesador, el tiempo (en segundos) que requieren de servicio del procesador y el momento en que cada uno de ellos llega a la cola de ejecución.\r\nSiguiendo la política FCFS (First Come, First Served) de planificación de procesos, ¿cuál es el tiempo promedio que requieren todos los procesos para ser asignados por primera vez al procesador?', NULL, 5, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 1, 3),
(10, 'Considere la siguiente tabla que muestra un conjunto de procesos para ser ejecutados en un procesador, el tiempo (en segundos) que requieren de servicio del procesador y el momento en que cada uno de ellos llega a la cola de ejecución.\r\nSiguiendo la política FCFS (First Come - First Served) de planificación de procesos, ¿cuál es el tiempo promedio que requieren todos los procesos para ser concluidos a\r\npartir de su llegada a la cola de ejecución?', NULL, 5, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 1, 1, 3),
(11, 'El área de desarrollo de sistemas de una empresa requiere implementar un sistema de información en todas sus sucursales. Se están evaluando las siguientes alternativas para resolver ese requerimiento:\r\n1. El costo del desarrollo externo es en promedio de $1,300,000.00 y cubre el 100% de los requerimientos.\r\n2. El desarrollo interno para cubrir el 100% de los requerimientos implica 6 meses de trabajo y el sistema resultante puede ser vendido\r\n3. Adquirir un software comercial cuyo costo es de $700,000.00 y cubre el 80% de los requerimientos\r\n4. Continuar con el uso de los sistemas de información ocasiona costos de operación y mantenimiento de $1,000,000\r\n¿Cuál de las siguientes metodologías se aplica para evaluar la factibilidad de las\r\npropuestas?', NULL, 1, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 2, 1, 17),
(12, 'Una incubadora de negocios está organizando un proyecto para producir un videojuego de caracteres que se desarrollará en varias fases. El cliente especifica los requerimientos en etapas posteriores a cada demostración del producto. Las primeras versiones tienen propósitos académicos y se espera que las últimas sean productos comerciales. ¿Qué modelo del proceso se utiliza para desarrollar este proyecto?', NULL, 1, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 2, 2, 19),
(13, 'Ordene secuencialmente los pasos necesarios para preparar una entrevista para la obtención de los requerimientos de una aplicación computacional.\r\n1. Decidir el tipo de preguntas y la estructura\r\n2. Conocer los antecedentes de la organización\r\n3. Decidir a quién entrevistar\r\n4. Establecer los objetivos de la entrevista', NULL, 2, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 2, 1, 18),
(14, 'Ordene los pasos que se requieren para elaborar el diagrama relacional a partir de un diagrama entidad relación de un modelo de datos.\r\n1. Elaborar por cada una de las relaciones con cardinalidad muchos a muchos una\r\n relación asociativa\r\n2. Elaborar por cada una de la entidades del diagrama ER una relación en el diagrama\r\n relacional\r\n3. Reducción de las relaciones muchos a uno con el paso de llaves\r\n4. Fusionar las entidades con relaciones de cardinalidad uno a uno', NULL, 2, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 2, 2, 20),
(15, 'De los siguientes protocolos, ¿cuáles corresponden a la capa de red en el modelo OSI?\r\n1. HDLC\r\n2. IP\r\n3. TCP\r\n4. RIP', NULL, 3, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 2, 4, 25),
(16, 'El departamento de tecnologías de la información de una empresa está a punto de iniciar el desarrollo de una aplicación, considerando los siguientes lenguajes de programación. Seleccione los que sean orientados a objetos.\r\n1. LISP\r\n2. JAVA\r\n3. FORTRAN\r\n4. DELPHI\r\n5. PHP', NULL, 3, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 3, 4, 2, 2, 19),
(17, 'Un equipo de desarrollo tiene alojado el sistema de control de versiones en una carpeta compartida en un servidor de la empresa. Para su operación, esta carpeta tiene asignados diferentes permisos para diferentes usuarios, de acuerdo con el uso que hace cada uno. Así, un desarrollador baja versiones nuevas y sube actualizaciones; el personal de soporte técnico utiliza controladores y actualizaciones del sistema; mientras que el líder de proyecto controla y gestiona el sistema de control de versiones, además de participar como desarrollador. Relacione los perfiles de usuario con sus respectivos permisos de acceso.\r\nPerfil de usuario\r\n1. Desarrollador\r\n2. Líder de proyecto\r\n3. Personal de soporte técnico\r\n                                                                                                                    \r\nPermisos de acceso\r\na) Creación, eliminación\r\nb) Lectura\r\nc) Lectura, creación, eliminación\r\nd) Lectura, escritura\r\ne) Lectura, escritura, creación\r\nf) Lectura, escritura, creación, eliminación', NULL, 4, NULL, 'comentario_test', 1, '2020-03-03 14:09:28', 2, 4, 2, 4, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(1000) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `estado` int(10) NOT NULL,
  `justificacion` varchar(5000) DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `id_subarea` int(10) UNSIGNED NOT NULL,
  `id_pregunta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `nombre`, `imagen`, `estado`, `justificacion`, `comentario`, `f_registro`, `valor`, `id_usuario`, `id_alta`, `id_examen`, `id_area`, `id_subarea`, `id_pregunta`) VALUES
(1, '192.168.0.10', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 5, 14, 1),
(2, '192.168.10.10', NULL, 1, 'Las otras opciones son incorrectas porque no se percatan de que el tercer número es\r\nØ y no tiene el mismo Network ID que la red especificada. Además, no es la dirección\r\nválida por el 255 que está reservada para mensajes broadcast y el 292 no es un número\r\nválido de host, ya que excede de 254.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 5, 14, 1),
(3, '192.168.10.255', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 5, 14, 1),
(4, '192.168.10.292', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 5, 14, 1),
(5, 'Evaluar la calidad de documentación', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 1, 2),
(6, 'Evaluar el soporte del fabricante', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 1, 2),
(7, 'Valorar la efectividad del desempeño', NULL, 1, 'Es una de las características que forman parte de la fase de valoración de la efectividad del desempeño, al igual que observar si tiene la capacidad adecuada, etc.\r\nLas otras opciones son incorrectas porque no analizan si el sistema realiza lo que\r\nrequiere la empresa.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 1, 1, 2),
(8, 'Observar la facilidad de uso', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 1, 2),
(9, 'ANSI', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 2, 4, 3),
(10, 'Yourdon-DeMarco', NULL, 1, 'Se emplea para construir diagramas de flujo o diagramas de contexto en el modelo\r\nestructurado.\r\nLas otras opciones son incorrectas porque el modelo ANSI no se utiliza en un modelo\r\nestructurado, el modelo UML es la herramienta principal para modelar desde el punto de\r\nvista del proceso unificado y el modelo Warnier-Orr generalmente se utiliza en una\r\nrepresentación semejante a la de cuadros sinópticos para mostrar el funcionamiento y\r\norganización de los elementos a utilizar.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 2, 4, 3),
(11, 'UML', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 2, 4, 3),
(12, 'Warnier-Orr', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 2, 4, 3),
(13, '2, 4, 5, 1, 6, 3', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 1, 1, 2, 4),
(14, '2, 5, 4, 6, 1, 3', NULL, 1, 'Conceptualmente un compilador opera en fases,\r\ncada una de las cuales transforma el programa fuente de una representación de otra en\r\nel siguiente orden: \r\n- Analizador léxico\r\n- Analizador sintáctico\r\n- Analizador semántico\r\n- Generador de código intermedio\r\n- Optimizador de código\r\n- Generador de código.\r\nLas otras opciones son incorrectas, porque los analizadores están en desorden y el\r\noptimizador de código no va al final ni antes del código intermedio', 'comentario_test', '2020-03-03 14:09:28', 1, 3, 4, 1, 1, 2, 4),
(15, '4, 2, 5, 6, 3, 1', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 1, 1, 2, 4),
(16, '5, 2, 6, 4, 3, 1', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 1, 1, 2, 4),
(17, '1, 3, 6', NULL, 1, ' La fiabilidad, la eficiencia y la funcionalidad son 3 de los criterios indispensables para la evaluación de los procesos de un software\r\nexistente.\r\nLas otras opciones son incorrectas porque la productividad, la factibilidad y el costo no son criterios principales para la evaluación de un software existente.', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 4, 11, 5),
(18, '1, 5, 6', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 4, 11, 5),
(19, '2, 3, 4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 4, 11, 5),
(20, '2, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 4, 11, 5),
(21, '1, 2, 3', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 5, 15, 6),
(22, '1, 2, 4', NULL, 1, 'Poe que éstas son la unidad de control, los registros internos\r\ny la unidad aritmética/lógica, son 3 de los elementos de un microprocesador.\r\nLas otras opciones son incorrectas porque los puertos, la memoria de datos y la memoria\r\nde programas no son elementos de un microprocesador.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 5, 15, 6),
(23, '1, 3, 6', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 5, 15, 6),
(24, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 5, 15, 6),
(25, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 3, 8, 7),
(26, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 3, 8, 7),
(27, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 3, 8, 7),
(28, '1, 4, 5', NULL, 1, 'Dentro de la superficie de un disco se aprecian sólo pistas y sectores dentro de su organización. Ya que son dispositivos de almacenamiento\r\nde acceso directo.\r\nLas otras opciones son incorrectas porque contienen las cabezas y los cilindros que no\r\nestán dentro de la superficie de un disco.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 3, 8, 7),
(29, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 1, 1, 3, 8),
(30, '1, 4, 5', NULL, 1, 'La red neuronal que tiene la capacidad de reconocer patrones.\r\nLas otras opciones son incorrectas porque no se requiere la capacidad para manejar\r\nincertidumbre, para optimizar la búsqueda o para representar jerarquía y causalidad.', 'comentario_test', '2020-03-03 14:09:28', 1, 3, 4, 1, 1, 3, 8),
(31, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 1, 1, 3, 8),
(32, '1, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 1, 1, 3, 8),
(33, '7/4', NULL, 1, 'Las otras opciones son incorrectas porque:\r\nSe puede considerar sólo la suma de los tiempos de los procesos 4 + 2 + 3 + 1 = 10→10/4.\r\nSe puede confundir con la política de round robin 8 + 5 + 7 + 2 = 22→22/4.\r\nPuede hacerse el cómputo considerando el tiempo (t0) como inicio de todos los procesos:\r\n4 + 6 + 9 + 10 = 29 →29/4.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 1, 3, 9),
(34, '10/4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 3, 9),
(35, '22/4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 3, 9),
(36, '29/4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 3, 9),
(37, '10/4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 3, 10),
(38, '17/4', NULL, 1, 'Se puede considerar sólo la suma de los tiempos de los procesos 4 + 2 + 3 + 1 = 10→10/4.\r\nSe puede confundir con la política round robin 8+5+7+2=22→22/4.\r\nPuede hacerse el cómputo considerando el tiempo como inicio de todos los procesos\r\n4 + 6 + 9 + 10 = 29→29/4.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 1, 1, 3, 10),
(39, '22/4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 3, 10),
(40, '29/4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 1, 1, 3, 10),
(41, 'Benchmarking', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 2, 1, 17, 11),
(42, 'Costo – beneficio', NULL, 1, 'Porque la información proporcionada está asociada al costo\r\nde las propuestas.\r\nLas otras opciones son incorrectas porque la información proporcionada no refleja el\r\ndesempeño de las propuestas, no da elementos para establecer la factibilidad operativa\r\ndel sistema y no es de tipo técnica.', 'comentario_test', '2020-03-03 14:09:28', 1, 3, 4, 2, 1, 17, 11),
(43, 'Análisis operativo', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 2, 1, 17, 11),
(44, 'Análisis técnico', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 3, 4, 2, 1, 17, 11),
(45, 'Lineal', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 19, 12),
(46, 'En espiral', NULL, 1, 'Se evalúan los riesgos, propios de una aplicación\r\ncomercial, a la vez que se van verificando las iteraciones correspondientes a cada\r\nversión.\r\nLas otras opciones son incorrectas porque las revisiones de proyectos de gran\r\ncomplejidad son muy difíciles, es difícil de aplicar a sistemas transaccionales que\r\ntienden a ser integrados y a operar como un todo, y porque exige disponer de las\r\nherramientas adecuadas y no presenta calidad ni robustez', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 2, 2, 19, 12),
(47, 'Incremental', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 19, 12),
(48, 'De prototipos', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 19, 12),
(49, '2, 3, 1, 4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 1, 18, 13),
(50, '2, 4, 3, 1', NULL, 1, 'Porque la secuencia de pasos adecuada para preparar una\r\nentrevista es; conocer antecedentes de la organización, establecer objetivos, decidir a\r\nquién entrevistar y decidir el tipo de preguntas y su estructura. El producto de cada paso\r\nes un insumo necesario para el siguiente.\r\nLas otras opciones son incorrectas porque no cumplen con el orden adecuado.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 2, 1, 18, 13),
(51, '3, 4, 2, 1', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 1, 18, 13),
(52, '3, 2, 1, 4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 1, 18, 13),
(53, '2, 1, 3, 4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 20, 14),
(54, '2, 3, 4, 1', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 20, 14),
(55, '4, 3, 1, 2', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 20, 14),
(56, '4, 2, 1, 3', NULL, 1, 'Son los pasos que se requieren para elaborar el diagrama relacional a partir de un diagrama entidad relación de un modelo de datos.\r\nLas otras opciones son incorrectas porque no cumplen con el orden adecuado.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 2, 2, 20, 14),
(57, '1, 2', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 4, 25, 15),
(58, '1, 3', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 4, 25, 15),
(59, '2, 4', NULL, 1, 'Porque ambos protocolos pertenecen a la capa de red.\r\nLas otras opciones son incorrectas porque HDLC es un protocolo de la capa de enlace\r\nde datos y TCP es un protocolo de la capa de transporte.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 2, 4, 25, 15),
(60, '3, 4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 4, 25, 15),
(61, '1, 2, 3', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 19, 16),
(62, '1, 3, 4', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 19, 16),
(63, '2, 4, 5', NULL, 1, 'Porque los tres son lenguajes orientados a objetos.\r\nLas otras opciones son incorrectas porque LISP y Fortran son lenguajes de alto nivel,\r\npero no orientados a objetos.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 2, 2, 19, 16),
(64, '3, 4, 5', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 2, 19, 16),
(65, '1a, 2c, 3e ', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 4, 26, 17),
(66, '1b, 2d, 3e', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 4, 26, 17),
(67, '1d, 2b, 3a', NULL, 1, 'justificacion_test', 'comentario_test', '2020-03-03 14:09:28', 0, 2, 4, 2, 4, 26, 17),
(68, '1e, 2f, 3b', NULL, 1, 'Porque todos los perfiles tienen asignados los permisos apropiados a su función.\r\nLas otras opciones son incorrectas porque el desarrollador debe poder leer y escribir,\r\nademás de que no es conveniente que pueda eliminar y el líder de proyecto debe tener\r\ntodos los permisos.', 'comentario_test', '2020-03-03 14:09:28', 1, 2, 4, 2, 4, 26, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subareas`
--

CREATE TABLE `subareas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5000) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `estado` int(10) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_alta` int(10) UNSIGNED DEFAULT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subareas`
--

INSERT INTO `subareas` (`id`, `nombre`, `codigo`, `estado`, `f_registro`, `id_usuario`, `id_alta`, `id_examen`, `id_area`, `comentario`) VALUES
(1, 'Investigación de los sistemas computacionales disponibles', 'ICOMPU-1-1', 1, '2020-03-03 14:09:28', 2, 4, 1, 1, NULL),
(2, 'Análisis cualitativo y cuantitativo de los sistemas computacionales seleccionados', 'ICOMPU-1-2', 1, '2020-03-03 14:09:28', 3, 4, 1, 1, NULL),
(3, 'Propuesta de la solución para la aplicación específica', 'ICOMPU-1-3', 0, '2020-03-03 14:09:28', 3, NULL, 1, 1, NULL),
(4, 'Evaluación de las limitaciones de las tecnologías de los sistemas de\r\ncómputo existentes', 'ICOMPU-2-1', 1, '2020-03-03 14:09:28', 2, 4, 1, 2, NULL),
(5, 'Desarrollo de nuevas aplicaciones tecnológicas de sistemas de cómputo', 'ICOMPU-2-2', 0, '2020-03-03 14:09:28', 3, 4, 1, 2, NULL),
(6, 'Evaluación de la funcionalidad de la nueva aplicación tecnológica', 'ICOMPU-2-3', 1, '2020-03-03 14:09:28', 2, 4, 1, 2, NULL),
(7, 'Implementación de la aplicación tecnológica del sistema de cómputo', 'ICOMPU-2-4', 1, '2020-03-03 14:09:28', 2, 4, 1, 2, NULL),
(8, 'Análisis de la problemática con base en una metodología', 'ICOMPU-3-1', 1, '2020-03-03 14:09:28', 2, 4, 1, 3, NULL),
(9, 'Desarrollo del modelo de hardware y su software para la aplicación específica', 'ICOMPU-3-2', 1, '2020-03-03 14:09:28', 3, 4, 1, 3, NULL),
(10, 'Evaluación del modelo de hardware y su software asociado para la aplicación específica', 'ICOMPU-3-3', 0, '2020-03-03 14:09:28', 3, 4, 1, 3, NULL),
(11, 'Análisis de la funcionalidad del sistema', 'ICOMPU-4-1', 1, '2020-03-03 14:09:28', 2, 4, 1, 4, NULL),
(12, 'Solución y evaluación de la adaptación del sistema de hardware y/o softwar', 'ICOMPU-4-2', 1, '2020-03-03 14:09:28', 2, 4, 1, 4, NULL),
(13, 'Implementación de la modificaciones en la aplicación específica', 'ICOMPU-4-3', 1, '2020-03-03 14:09:28', 2, 4, 1, 4, NULL),
(14, 'Análisis de las tecnologías que integran una red de cómputo', 'ICOMPU-5-1', 1, '2020-03-03 14:09:28', 3, 4, 1, 5, NULL),
(15, 'Propuesta de soluciones de las redes de cómputo para necesidades específicas', 'ICOMPU-5-2', 1, '2020-03-03 14:09:28', 3, 4, 1, 5, NULL),
(16, 'Evaluación del desempeño de la red de cómputo', 'ICOMPU-5-3', 1, '2020-03-03 14:09:28', 3, 4, 1, 5, NULL),
(17, 'Diagnóstico del problema y valoración de la factibilidad para el desarrollo de sistemas de información', 'ISOFT-1-1', 1, '2020-03-03 14:09:28', 2, 4, 2, 6, NULL),
(18, 'Modelado de los requerimientos de un sistema de información', 'ISOFT-1-2', 1, '2020-03-03 14:09:28', 2, 4, 2, 6, NULL),
(19, 'Diseño de la solución del problema de tecnología de información', 'ISOFT-2-1', 0, '2020-03-03 14:09:28', 2, 4, 2, 7, NULL),
(20, 'Desarrollo de sistemas', 'ISOFT-2-2', 1, '2020-03-03 14:09:28', 3, 4, 2, 7, NULL),
(21, 'Implantación de sistemas', 'ISOFT-2-3', 1, '2020-03-03 14:09:28', 3, 4, 2, 7, NULL),
(22, 'Aplicación de modelos matemáticos', 'ISOFT-2-4', 1, '2020-03-03 14:09:28', 3, 4, 2, 7, NULL),
(23, 'Administración de proyectos de tecnologías de información', 'ISOFT-3-1', 1, '2020-03-03 14:09:28', 3, 4, 2, 8, NULL),
(24, 'Control de calidad de proyectos de tecnologías de información', 'ISOFT-3-2', 0, '2020-03-03 14:09:28', 2, NULL, 2, 8, NULL),
(25, 'Gestión de redes de datos', 'ISOFT-4-1', 0, '2020-03-03 14:09:28', 2, 4, 2, 9, NULL),
(26, 'Gestión de bases de datos', 'ISOFT-4-2', 1, '2020-03-03 14:09:28', 3, 4, 2, 9, NULL),
(27, 'Gestión de sistemas operativos o lenguajes de desarrollo', 'ISOFT-4-3', 1, '2020-03-03 14:09:28', 2, 4, 2, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `facultad` varchar(600) DEFAULT NULL,
  `carrera` varchar(300) DEFAULT NULL,
  `semestre` varchar(30) DEFAULT NULL,
  `no_cuenta` int(10) UNSIGNED DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo` int(10) UNSIGNED NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `f_nacimiento`, `facultad`, `carrera`, `semestre`, `no_cuenta`, `correo`, `f_registro`, `tipo`, `pass`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'admin@admin.mx', '2020-03-03 14:09:27', 0, '1234'),
(2, 'Angélica Noelia', 'Amador Méndez', '1998-09-22', 'Facultad de Ingeniería Electromecánica', 'Ingeniería en Sistemas Computacionales', '8vo semestre', 20130814, 'aamador0@ucol.mx', '2020-03-03 14:09:27', 1, '1234'),
(3, 'Enrique Carlos', 'Rosales Busquets', '1960-10-20', NULL, NULL, NULL, 1234, 'erosales@ucol.mx', '2020-03-03 14:09:27', 2, '1234'),
(4, 'Ernesto', 'Navarro Alvarez', '1950-12-20', NULL, NULL, NULL, 1233, 'enavarro5@ucol.mx', '2020-03-03 14:09:27', 2, '1234'),
(5, 'Juan Pablo', 'Martinez Vargas', '1970-11-20', NULL, NULL, NULL, 1555, 'jpablomv@ucol.mx', '2020-03-03 14:09:27', 3, '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_alta` (`id_alta`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `h_areas`
--
ALTER TABLE `h_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indices de la tabla `h_examen`
--
ALTER TABLE `h_examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_alta` (`id_alta`);

--
-- Indices de la tabla `h_preguntas`
--
ALTER TABLE `h_preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indices de la tabla `h_respuestas`
--
ALTER TABLE `h_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_respuesta` (`id_respuesta`);

--
-- Indices de la tabla `h_subareas`
--
ALTER TABLE `h_subareas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `subareas`
--
ALTER TABLE `subareas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_alta` (`id_alta`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_cuenta` (`no_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `h_areas`
--
ALTER TABLE `h_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `h_examen`
--
ALTER TABLE `h_examen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `h_preguntas`
--
ALTER TABLE `h_preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `h_respuestas`
--
ALTER TABLE `h_respuestas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `h_subareas`
--
ALTER TABLE `h_subareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `subareas`
--
ALTER TABLE `subareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `areas_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `areas_ibfk_3` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`);

--
-- Filtros para la tabla `h_areas`
--
ALTER TABLE `h_areas`
  ADD CONSTRAINT `h_areas_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `h_areas_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `h_areas_ibfk_3` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`);

--
-- Filtros para la tabla `h_examen`
--
ALTER TABLE `h_examen`
  ADD CONSTRAINT `h_examen_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `h_examen_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `h_preguntas`
--
ALTER TABLE `h_preguntas`
  ADD CONSTRAINT `h_preguntas_ibfk_1` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `h_preguntas_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `h_preguntas_ibfk_3` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `h_preguntas_ibfk_4` FOREIGN KEY (`id_subarea`) REFERENCES `subareas` (`id`);

--
-- Filtros para la tabla `h_respuestas`
--
ALTER TABLE `h_respuestas`
  ADD CONSTRAINT `h_respuestas_ibfk_1` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `h_respuestas_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `h_respuestas_ibfk_3` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `h_respuestas_ibfk_4` FOREIGN KEY (`id_subarea`) REFERENCES `subareas` (`id`),
  ADD CONSTRAINT `h_respuestas_ibfk_5` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `h_respuestas_ibfk_6` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id`);

--
-- Filtros para la tabla `h_subareas`
--
ALTER TABLE `h_subareas`
  ADD CONSTRAINT `h_subareas_ibfk_1` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `h_subareas_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `h_subareas_ibfk_3` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `h_subareas_ibfk_4` FOREIGN KEY (`id_subarea`) REFERENCES `subareas` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `preguntas_ibfk_3` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `preguntas_ibfk_4` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `preguntas_ibfk_5` FOREIGN KEY (`id_subarea`) REFERENCES `subareas` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_4` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_5` FOREIGN KEY (`id_subarea`) REFERENCES `subareas` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_6` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `subareas`
--
ALTER TABLE `subareas`
  ADD CONSTRAINT `subareas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `subareas_ibfk_2` FOREIGN KEY (`id_alta`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `subareas_ibfk_3` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `subareas_ibfk_4` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
