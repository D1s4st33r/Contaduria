-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2018 a las 07:42:29
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contaduria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_categorias_preguntas`
--

CREATE TABLE `cat_categorias_preguntas` (
  `id` int(11) NOT NULL,
  `categoria` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_categorias_preguntas`
--

INSERT INTO `cat_categorias_preguntas` (`id`, `categoria`) VALUES
(1, 'contable'),
(2, 'fiscal'),
(3, 'laboral'),
(4, 'legal'),
(5, 'seguridad social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_input_preguntas`
--

CREATE TABLE `cat_input_preguntas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_input_preguntas`
--

INSERT INTO `cat_input_preguntas` (`id`, `tipo`) VALUES
(1, 'checkbox'),
(2, 'radius'),
(3, 'textbox'),
(4, 'combobox');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_secciones_preguntas`
--

CREATE TABLE `cat_secciones_preguntas` (
  `id` int(11) NOT NULL,
  `seccion` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_secciones_preguntas`
--

INSERT INTO `cat_secciones_preguntas` (`id`, `seccion`, `categoria`) VALUES
(1, 'BANCOS', 'CONTABLE'),
(2, 'CAJA CHICA', 'CONTABLE'),
(5, 'COEFICIENTE DE UTILIDAD', 'FISCAL'),
(6, 'PERDIDAS FISCALES ACUMULAS', 'FISCAL'),
(7, 'PAGOS PROVISIONALES', 'FISCAL'),
(8, 'IMPUESTOS SOBRE LA RENTA', 'FISCAL'),
(9, 'CONCILIACION CONTABLE Y FISCAL DEL ISR', 'FISCAL'),
(10, 'DESCANSOS SEMANALES Y OBLIGATORIOS', 'LABORAL'),
(11, 'VACACIONES', 'LABORAL'),
(12, 'AGUINALDO', 'LABORAL'),
(13, 'REPARTO DE UTILIDAD', 'LABORAL'),
(14, 'CONSTANCIA DE RETENCION', 'LABORAL'),
(15, 'PREFERENCIA Y ANTIGUEDAD', 'LABORAL'),
(16, 'PRIMA DE ANTIGUEDAD', 'LABORAL'),
(17, 'PRIMA DE ANTIGUEDADR', 'LABORAL'),
(18, 'CAPACITACION Y ADIESTRAMIENTO', 'LABORAL'),
(19, 'SEGURIDAD E HIGIENE', 'LABORAL'),
(20, 'CONSERVACION DEL DOC', 'LABORAL'),
(21, 'GENERALES', 'LABORAL'),
(22, 'GENERALESR', 'LABORAL'),
(23, 'GENERAL', 'LEGAL'),
(24, 'R IMSS INFONAVIT', 'SEGURIDAD SOCIAL'),
(25, 'MODIFICACION SALARIOS', 'SEGURIDAD SOCIAL'),
(26, 'LLEVAR Y CONSERVAR', 'SEGURIDAD SOCIAL'),
(27, 'DETERMINAR Y ENTRAR', 'SEGURIDAD SOCIAL'),
(28, 'CAPITALES CONSTITUTIVOS', 'SEGURIDAD SOCIAL'),
(29, 'INF IMSS INFONAVIT', 'SEGURIDAD SOCIAL'),
(30, 'INSPECCIONES Y VISITAS', 'SEGURIDAD SOCIAL'),
(31, 'COMUNICAR AL IMSS', 'SEGURIDAD SOCIAL'),
(32, 'OTROS', 'SEGURIDAD SOCIAL'),
(33, 'PRESENTACION DICTAMEN', 'SEGURIDAD SOCIAL'),
(34, 'CONSIDERACION', 'SEGURIDAD SOCIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_preguntas`
--

CREATE TABLE `detalles_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `obligatorio` int(1) NOT NULL,
  `soliarchivo` int(1) NOT NULL,
  `preguntaOpcional` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles_preguntas`
--

INSERT INTO `detalles_preguntas` (`id_pregunta`, `tipo`, `obligatorio`, `soliarchivo`, `preguntaOpcional`) VALUES
(129, 'defaulth', 0, 0, 'pregunta opcional'),
(470, 'default', 0, 0, 'pregunta opcional'),
(545, 'defaulth', 0, 0, 'pregunta opcional'),
(546, 'defaulth', 0, 0, 'pregunta opcional'),
(547, 'defaulth', 0, 0, 'pregunta opcional'),
(548, 'defaulth', 0, 0, 'pregunta opcional'),
(549, 'defaulth', 0, 0, 'pregunta opcional'),
(551, 'defaulth', 0, 0, 'pregunta opcional'),
(552, 'defaulth', 0, 0, 'pregunta opcional'),
(559, 'defaulth', 0, 0, 'pregunta opcional'),
(560, 'defaulth', 0, 0, 'pregunta opcional'),
(561, 'defaulth', 0, 0, 'pregunta opcional'),
(565, 'defaulth', 0, 0, 'pregunta opcional'),
(566, 'defaulth', 0, 0, 'pregunta opcional'),
(569, 'defaulth', 0, 0, 'pregunta opcional'),
(570, 'defaulth', 0, 0, 'pregunta opcional'),
(573, 'defaulth', 0, 0, 'pregunta opcional'),
(576, 'defaulth', 0, 0, 'pregunta opcional'),
(580, 'RADIUS', 0, 1, 'nuevaaa'),
(581, 'defaulth', 0, 0, 'pregunta opcional'),
(582, 'defaulth', 0, 0, 'pregunta opcional'),
(583, 'defaulth', 0, 0, 'pregunta opcional'),
(584, 'RADIUS', 0, 1, 'pregunta opcional'),
(585, 'CHECKBOX', 0, 0, 'pregunta opcional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `rfc` varchar(60) NOT NULL,
  `razonSocial` varchar(150) NOT NULL,
  `domicilio` varchar(120) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `archivos` varchar(200) DEFAULT NULL,
  `id_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(4) NOT NULL,
  `id_pregunta` int(4) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `categoria`, `seccion`, `texto`) VALUES
(1, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se otorga un día de descanso obligatorio por cada 6 días de trabajo, según lo estipula la LFT vigente?'),
(2, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', 'La empresa, ¿tiene algún día de descanso en especial como política o producto del contrato colectivo de trabajo? (proporcionar copia)'),
(3, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se tiene una revisión periódica de los procesos de trabajo con el fin de dictaminar que en los casos correspondientes ha sido *obligatorio* que se trabaje en día de descanso ?'),
(4, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se ha efectuado un analisis con el objeto de conocer lo que financieramente afecta el laborar el dia de descanso obligatorio, así como cuestionar la productividad del empleado ? (Exhibir) '),
(5, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se sabe que en caso de incumplimiento para el otorgamiento del dia de descanso obligatorio al trabajador, puede ser objeto de multa de 3 a 155 SMG, así como una pena de pago doble adicional al ordinario ?'),
(6, 'LABORAL', 'VACACIONES', '¿ Se conoce que obligatoriamente se deben de otorgar un periodo anual de descanso según la antigüedad que tenga, con goce de salario integro ? (Verificar base de pago)'),
(7, 'LABORAL', 'VACACIONES', '¿ Se concede invariablemente dentro de los 6 meses siguientes al cumplimiento del año de servicio ? (Verificar muestreo)'),
(8, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"de autotransporte\" ?, Si es así, se determina el promedio de percepciones de los último 30 días efectivamente laborados antes de generar el derecho para efecto de salario base de vacaciones ? (En su caso, verificar)'),
(9, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"comisionistas\" ?, Si es así, se determina el promedio de percepciones del último año antes de generar el derecho para efecto de salario base de vacaciones ?'),
(10, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"de semana reducida\" ?, Si es así, se determina la proporción al número de días trabajados durante el año antes de generar el derecho para efecto de otorgar el número de dias que le corresponde de vacaciones ?'),
(11, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"menores de 16 años\" ?, Si es así, sabe que debe de otorgarsele como mínimo 18 dias al año de vacaciones ?'),
(12, 'LABORAL', 'VACACIONES', '¿ Durante el ejercicio, se tienen o tuvieron contratos por obra o tiempo determinado ?, si es así, al momento de que se le remunere el finiquito le corresponde la parte proporcional de vacaciones de acuerdo al tiempo laborado ?'),
(13, 'LABORAL', 'VACACIONES', '¿ Conoce de que las vacaciones, son obligatorias que se gocen y que por ningún motivo pueden ser compensadas mediante remuneración ?'),
(14, 'LABORAL', 'VACACIONES', '¿ Conoce de que el salario por cuota diaria que esté percibiendo el trabajador al momento en que inicie el derecho al goce de vacaciones, será la base para su remuneración ?'),
(15, 'LABORAL', 'VACACIONES', '¿ Se le paga como mínimo la prima vacacional del 25% como mínimo ?, en que momento ? Previamente al periodo de descanso o simultáneamente ?'),
(16, 'LABORAL', 'VACACIONES', '¿ Conoce que para el computo de servicios prestados se consideran como tiempo efectivamente laborado únicamente las incapacidades temporales por maternidad, riesgos de trabajo y los permisos con goce de salario ?'),
(17, 'LABORAL', 'VACACIONES', '¿ Cual es el número de días de vacaciones que se le otorga a los empleados en base a la antigüedad que tengan, es en base a un contrato colectivo de trabajo o la LFT ?'),
(18, 'LABORAL', 'VACACIONES', '¿ Se sabe que en caso de incumplimiento para el otorgamiento de las vacaciones que correspondan, puede ser objeto de multa de 3 a 315 SMG ?'),
(19, 'LABORAL', 'AGUINALDO', '¿ Conoce qué se tiene que pagar antes del día 20 de diciembre de cada año ?'),
(20, 'LABORAL', 'AGUINALDO', '¿ Conoce qué debe ser como mínimo el equivalente a 15 días de salario según lo pactado en el contrato individual o colectivo ?'),
(21, 'LABORAL', 'AGUINALDO', '¿ No se está computando para el pago del aguinaldo los periodos de incapacidad por enfermedad general, así como las faltas injustificadas ?'),
(22, 'LABORAL', 'AGUINALDO', '¿ Conoce que esta prestación puede otorgarse en forma prorrateada durante el año ?'),
(23, 'LABORAL', 'AGUINALDO', '¿ Se sabe que en caso de incumplimiento de otorgar el  aguinaldo que corresponda, puede ser objeto de multa de 3 a 315 SMG ?'),
(24, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ De generarse una utilidad fiscal base de PTU, se conoce que se tiene la obligación de repartir entre los empleados el 10% de dicho importe ?'),
(25, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Conoce que se debe de distribuir a los empleados en un 50% según el tiempo efectivamente laborado en forma y el otro 50% según los ingresos totales del trabajador durante el año en que se generá la utilidad base ?'),
(26, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Ante la eventualidad de no generarse durante el ejercicio una utilidad fiscal base, se tiene como política o como materia colectiva el de otorgar gratificaciones sustitutivas a sus trabajadores ?'),
(27, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Se conoce que en el supuesto de repartir PTU anticipadamente en exceso, es suceptible de descontar sobre las mismas bases que los salarios ?'),
(28, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ En el supuesto de existir trabajadores que ya no se encuentren laborando para la empresa en el momento de la distribución y que hubiesen generado ese derecho, éste se les \"deberá\" comunicar por cualquier medio ? (Publicación periodico - proporcionar)'),
(29, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Al presentar la declaración anual, conoce que debe entregarse a la representatividad laboral o a los colaboradores copia de la misma dentro de los 10 días siguientes a este hecho ?, así mismo tener a su disposición en un término de 30 días los anexos correspondientes ?, Existe evidencia formal de ésta entrega ? (Proporcionar copia)'),
(30, 'LABORAL', 'CONSTANCIA DE RETENCION', '¿ Se le hace entrega dentro del plazo que disponen las leyes una constancia de retenciones por los sueldos y salarios percibidos duratne el año, así como del ISR Retenido o en su caso del Crédito al Salario entregado ?'),
(31, 'LABORAL', 'CONSTANCIA DE RETENCION', '¿ Al momento de hacer la entrega se conserva un tanto de la constancia entregada en donde se reconoce mediante la firma autografa del empleado ?'),
(32, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ Se tiene elaborado el cuadro general de antigüedades por categorías, profesión u oficio de cada uno de los empleados ?'),
(33, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ La comisión mixta que debe de estar integrada, y que se debe de encargar de dicha elaboración al inicio del año, lo coloca en lugar visible del centro de trabajo ?'),
(34, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ En caso de tener contrato colectivo, sabe que dicho cuadro general de antigüedades se conoce como \"sistema de escalafón de puestos\" en los que se reconoce la calificación aunada a la antigüedad ?'),
(35, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ Conoce incluso, que éste cuadro general de antigüedades, es la base para efectos del otorgamiento de las vacaciones ?'),
(36, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ Se sabe que en caso de incumplimiento en la elaboraciön del cuadro, así como el de no hacerlo público,  puede ser objeto de multa de 3 a 315 SMG ?'),
(37, 'LABORAL', 'PRIMA DE ANTIGUEDAD', '¿ En el caso de separación laboral por parte del trabajador, se cubren los 12 días de salario por cada año de servicio en los siguientes casos ?'),
(38, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Por renuncia voluntaria cuando haya cumplido 15 años de servicio '),
(39, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Separación por invalidez'),
(40, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Separación por incapacidad permanente'),
(41, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Terminación laboral por muerte del trabajador'),
(42, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Rescisión Justificada o injustificada del contrato de trabajo'),
(43, 'LABORAL', 'PRIMA DE ANTIGUEDAD', '¿ Conoce que el salario base para el pago de esta prestación no debe de exceder del doble del salario mínimo general o profesional ?'),
(44, 'LABORAL', 'PRIMA DE ANTIGUEDAD', '¿ Se sabe que en caso de incumplimiento en la omisión del pago de dicha prima,  puede ser objeto de multa de 3 a 315 SMG ?'),
(45, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Conoce que se tiene la obligación de capacitar y adiestrar al personal de la empresa al momento de su contratación o a apartir del inicio de actividades ?'),
(46, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se tiene integrada la comisión mixta de capacitación y adiestramiento ? (Proporcionar documentacion)'),
(47, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se tiene formulado y registrado los planes y programas de capacitación y adiestramiento ?'),
(48, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Están presentados ante la STyPS, para su registro y aprobación ?'),
(49, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Si se tiene contrato colectivo de trabajo, se señala en el mismo en que consistirá la capacitación y el adiestramiento inicial a los de nuevo ingreso y la correspondiente para el resto del personal ?'),
(50, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se hace un seguimiento de que se está cumpliento con el programa de capacitación y adiestramiento ? (Proporcionar informe)'),
(51, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se sabe que en caso de incumplimiento en la omisión de esta obligación, puede ser objeto de multa de 3 a 315 SMG ?'),
(52, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ De igual forma, conoce que en caso de no subsanar dentro del término otorgado por la autoridad laboral, la omisión de esta obligación la multa citada se duplica en su monto, ademas de posibles medidas adicionales para forzar a su cumplimiento ?'),
(53, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Al elaborar los planes y programas de capacitación, se busca cuidadosamente lograr el objetivo de legal de esta obligación, que se centra en \"incrementar las habilidades de trabajador y evitar los riesgos de trabajo\" ?'),
(54, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Se tiene integrada la comisión mixta de seguridad e higiene ? (Proporcionar documentacion)'),
(55, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Conoce que esta comisión, se crea con el proposito de investigar lo que ocasiona los accidentes y enfermedades de trabajo, asi como el de proponer medidas preventivas buscando abatir incidencias ?'),
(56, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Se tiene algún programa dentro de la empresa que fomente la seguridad e higiene en el area de trabajo, buscando con ello abaratar el costo que implica trabajar con % altos de riesgos de trabajo ?'),
(57, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Se sabe que en caso de incumplimiento en la omisión de esta obligación, puede ser objeto de multa de 3 a 315 SMG ?'),
(58, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ De igual forma, conoce que en caso de no subsanar dentro del término otorgado por la autoridad laboral, la omisión de esta obligación la multa citada se duplica en su monto, ademas de posibles medidas adicionales para forzar a su cumplimiento ?'),
(59, 'LABORAL', 'CONSERVACION DE DOC', '¿ Conoce que la conservación de documentación relacionada con contratos individuales de trabajo, listas de raya, nóminas, recibos de pago de salarios, controles de asistencia, comprobantes de pago de prestaciones, según la LFT, se tiene la obligación de conservarlos un año después de concluida el ejercicio o concluida la relación laboral ?'),
(60, 'LABORAL', 'CONSERVACION DE DOC', '¿ Se sabe que en caso de incumplimiento en la omisión de esta obligación, puede ser objeto de multa de 3 a 315 SMG ?'),
(61, 'LABORAL', 'CONSERVACION DE DOC', '¿ Conoce que independientemente de lo que dispone la Legislación Laboral, las leyes fiscales obligan por ser parte de la documentación fuente soporte de la contabilidad, se tiene la obligación de conservar dicha documentación mínimo 5 años por una posible facultad de comprobación de la autoridad fiscal ?'),
(62, 'LABORAL', 'GENERALES', '¿ Conoce que en caso de ventilarse un juicio ante el tribunal federal de conciliación y arbitraje, el 5 de abril de cada año se establece como suspensión de labores por ser el día del trabajador y en consecuencia no correrán términos legales ?'),
(63, 'LABORAL', 'GENERALES', '¿ En caso de estar ventilando un juicio ante el tribunal federal de conciliación y arbitraje, existe un calendario de suspensión de labores y que por lo mismo no correrán términos legales, ademas de los días sabados y domingos ?'),
(64, 'LABORAL', 'GENERALESR', '1-enero,5-febrero,21-marzo,1-mayo,5-mayo,16 a 31- julio,16-septiembre,20-noviembre,16 a 31-diciembre'),
(65, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se otorga un día de descanso obligatorio por cada 6 días de trabajo, según lo estipula la LFT vigente?'),
(66, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', 'La empresa, ¿tiene algún día de descanso en especial como política o producto del contrato colectivo de trabajo? (proporcionar copia)'),
(67, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se tiene una revisión periódica de los procesos de trabajo con el fin de dictaminar que en los casos correspondientes ha sido *obligatorio* que se trabaje en día de descanso ?'),
(68, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se ha efectuado un analisis con el objeto de conocer lo que financieramente afecta el laborar el dia de descanso obligatorio, así como cuestionar la productividad del empleado ? (Exhibir) '),
(69, 'LABORAL', 'DESCANSOS SEMANALES Y OBLIGATORIOS', '¿ Se sabe que en caso de incumplimiento para el otorgamiento del dia de descanso obligatorio al trabajador, puede ser objeto de multa de 3 a 155 SMG, así como una pena de pago doble adicional al ordinario ?'),
(70, 'LABORAL', 'VACACIONES', '¿ Se conoce que obligatoriamente se deben de otorgar un periodo anual de descanso según la antigüedad que tenga, con goce de salario integro ? (Verificar base de pago)'),
(71, 'LABORAL', 'VACACIONES', '¿ Se concede invariablemente dentro de los 6 meses siguientes al cumplimiento del año de servicio ? (Verificar muestreo)'),
(72, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"de autotransporte\" ?, Si es así, se determina el promedio de percepciones de los último 30 días efectivamente laborados antes de generar el derecho para efecto de salario base de vacaciones ? (En su caso, verificar)'),
(73, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"comisionistas\" ?, Si es así, se determina el promedio de percepciones del último año antes de generar el derecho para efecto de salario base de vacaciones ?'),
(74, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"de semana reducida\" ?, Si es así, se determina la proporción al número de días trabajados durante el año antes de generar el derecho para efecto de otorgar el número de dias que le corresponde de vacaciones ?'),
(75, 'LABORAL', 'VACACIONES', '¿ Se tienen dentro de la plantilla, trabajadores \"menores de 16 años\" ?, Si es así, sabe que debe de otorgarsele como mínimo 18 dias al año de vacaciones ?'),
(76, 'LABORAL', 'VACACIONES', '¿ Durante el ejercicio, se tienen o tuvieron contratos por obra o tiempo determinado ?, si es así, al momento de que se le remunere el finiquito le corresponde la parte proporcional de vacaciones de acuerdo al tiempo laborado ?'),
(77, 'LABORAL', 'VACACIONES', '¿ Conoce de que las vacaciones, son obligatorias que se gocen y que por ningún motivo pueden ser compensadas mediante remuneración ?'),
(78, 'LABORAL', 'VACACIONES', '¿ Conoce de que el salario por cuota diaria que esté percibiendo el trabajador al momento en que inicie el derecho al goce de vacaciones, será la base para su remuneración ?'),
(79, 'LABORAL', 'VACACIONES', '¿ Se le paga como mínimo la prima vacacional del 25% como mínimo ?, en que momento ? Previamente al periodo de descanso o simultáneamente ?'),
(80, 'LABORAL', 'VACACIONES', '¿ Conoce que para el computo de servicios prestados se consideran como tiempo efectivamente laborado únicamente las incapacidades temporales por maternidad, riesgos de trabajo y los permisos con goce de salario ?'),
(81, 'LABORAL', 'VACACIONES', '¿ Cual es el número de días de vacaciones que se le otorga a los empleados en base a la antigüedad que tengan, es en base a un contrato colectivo de trabajo o la LFT ?'),
(82, 'LABORAL', 'VACACIONES', '¿ Se sabe que en caso de incumplimiento para el otorgamiento de las vacaciones que correspondan, puede ser objeto de multa de 3 a 315 SMG ?'),
(83, 'LABORAL', 'AGUINALDO', '¿ Conoce qué se tiene que pagar antes del día 20 de diciembre de cada año ?'),
(84, 'LABORAL', 'AGUINALDO', '¿ Conoce qué debe ser como mínimo el equivalente a 15 días de salario según lo pactado en el contrato individual o colectivo ?'),
(85, 'LABORAL', 'AGUINALDO', '¿ No se está computando para el pago del aguinaldo los periodos de incapacidad por enfermedad general, así como las faltas injustificadas ?'),
(86, 'LABORAL', 'AGUINALDO', '¿ Conoce que esta prestación puede otorgarse en forma prorrateada durante el año ?'),
(87, 'LABORAL', 'AGUINALDO', '¿ Se sabe que en caso de incumplimiento de otorgar el  aguinaldo que corresponda, puede ser objeto de multa de 3 a 315 SMG ?'),
(88, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ De generarse una utilidad fiscal base de PTU, se conoce que se tiene la obligación de repartir entre los empleados el 10% de dicho importe ?'),
(89, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Conoce que se debe de distribuir a los empleados en un 50% según el tiempo efectivamente laborado en forma y el otro 50% según los ingresos totales del trabajador durante el año en que se generá la utilidad base ?'),
(90, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Ante la eventualidad de no generarse durante el ejercicio una utilidad fiscal base, se tiene como política o como materia colectiva el de otorgar gratificaciones sustitutivas a sus trabajadores ?'),
(91, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Se conoce que en el supuesto de repartir PTU anticipadamente en exceso, es suceptible de descontar sobre las mismas bases que los salarios ?'),
(92, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ En el supuesto de existir trabajadores que ya no se encuentren laborando para la empresa en el momento de la distribución y que hubiesen generado ese derecho, éste se les \"deberá\" comunicar por cualquier medio ? (Publicación periodico - proporcionar)'),
(93, 'LABORAL', 'REPARTO DE UTILIDAD', '¿ Al presentar la declaración anual, conoce que debe entregarse a la representatividad laboral o a los colaboradores copia de la misma dentro de los 10 días siguientes a este hecho ?, así mismo tener a su disposición en un término de 30 días los anexos correspondientes ?, Existe evidencia formal de ésta entrega ? (Proporcionar copia)'),
(94, 'LABORAL', 'CONSTANCIA DE RETENCION', '¿ Se le hace entrega dentro del plazo que disponen las leyes una constancia de retenciones por los sueldos y salarios percibidos duratne el año, así como del ISR Retenido o en su caso del Crédito al Salario entregado ?'),
(95, 'LABORAL', 'CONSTANCIA DE RETENCION', '¿ Al momento de hacer la entrega se conserva un tanto de la constancia entregada en donde se reconoce mediante la firma autografa del empleado ?'),
(96, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ Se tiene elaborado el cuadro general de antigüedades por categorías, profesión u oficio de cada uno de los empleados ?'),
(97, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ La comisión mixta que debe de estar integrada, y que se debe de encargar de dicha elaboración al inicio del año, lo coloca en lugar visible del centro de trabajo ?'),
(98, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ En caso de tener contrato colectivo, sabe que dicho cuadro general de antigüedades se conoce como \"sistema de escalafón de puestos\" en los que se reconoce la calificación aunada a la antigüedad ?'),
(99, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ Conoce incluso, que éste cuadro general de antigüedades, es la base para efectos del otorgamiento de las vacaciones ?'),
(100, 'LABORAL', 'PREFERENCIA Y ANTIGUEDAD', '¿ Se sabe que en caso de incumplimiento en la elaboraciön del cuadro, así como el de no hacerlo público,  puede ser objeto de multa de 3 a 315 SMG ?'),
(101, 'LABORAL', 'PRIMA DE ANTIGUEDAD', '¿ En el caso de separación laboral por parte del trabajador, se cubren los 12 días de salario por cada año de servicio en los siguientes casos ?'),
(102, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Por renuncia voluntaria cuando haya cumplido 15 años de servicio '),
(103, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Separación por invalidez'),
(104, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Separación por incapacidad permanente'),
(105, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Terminación laboral por muerte del trabajador'),
(106, 'LABORAL', 'PRIMA DE ANTIGUEDADR', 'Rescisión Justificada o injustificada del contrato de trabajo'),
(107, 'LABORAL', 'PRIMA DE ANTIGUEDAD', '¿ Conoce que el salario base para el pago de esta prestación no debe de exceder del doble del salario mínimo general o profesional ?'),
(108, 'LABORAL', 'PRIMA DE ANTIGUEDAD', '¿ Se sabe que en caso de incumplimiento en la omisión del pago de dicha prima,  puede ser objeto de multa de 3 a 315 SMG ?'),
(109, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Conoce que se tiene la obligación de capacitar y adiestrar al personal de la empresa al momento de su contratación o a apartir del inicio de actividades ?'),
(110, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se tiene integrada la comisión mixta de capacitación y adiestramiento ? (Proporcionar documentacion)'),
(111, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se tiene formulado y registrado los planes y programas de capacitación y adiestramiento ?'),
(112, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Están presentados ante la STyPS, para su registro y aprobación ?'),
(113, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Si se tiene contrato colectivo de trabajo, se señala en el mismo en que consistirá la capacitación y el adiestramiento inicial a los de nuevo ingreso y la correspondiente para el resto del personal ?'),
(114, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se hace un seguimiento de que se está cumpliento con el programa de capacitación y adiestramiento ? (Proporcionar informe)'),
(115, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Se sabe que en caso de incumplimiento en la omisión de esta obligación, puede ser objeto de multa de 3 a 315 SMG ?'),
(116, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ De igual forma, conoce que en caso de no subsanar dentro del término otorgado por la autoridad laboral, la omisión de esta obligación la multa citada se duplica en su monto, ademas de posibles medidas adicionales para forzar a su cumplimiento ?'),
(117, 'LABORAL', 'CAPACITACION Y ADIESTRAMIENTO', '¿ Al elaborar los planes y programas de capacitación, se busca cuidadosamente lograr el objetivo de legal de esta obligación, que se centra en \"incrementar las habilidades de trabajador y evitar los riesgos de trabajo\" ?'),
(118, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Se tiene integrada la comisión mixta de seguridad e higiene ? (Proporcionar documentacion)'),
(119, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Conoce que esta comisión, se crea con el proposito de investigar lo que ocasiona los accidentes y enfermedades de trabajo, asi como el de proponer medidas preventivas buscando abatir incidencias ?'),
(120, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Se tiene algún programa dentro de la empresa que fomente la seguridad e higiene en el area de trabajo, buscando con ello abaratar el costo que implica trabajar con % altos de riesgos de trabajo ?'),
(121, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ Se sabe que en caso de incumplimiento en la omisión de esta obligación, puede ser objeto de multa de 3 a 315 SMG ?'),
(122, 'LABORAL', 'SEGURIDAD E HIGIENE', '¿ De igual forma, conoce que en caso de no subsanar dentro del término otorgado por la autoridad laboral, la omisión de esta obligación la multa citada se duplica en su monto, ademas de posibles medidas adicionales para forzar a su cumplimiento ?'),
(123, 'LABORAL', 'CONSERVACION DE DOC', '¿ Conoce que la conservación de documentación relacionada con contratos individuales de trabajo, listas de raya, nóminas, recibos de pago de salarios, controles de asistencia, comprobantes de pago de prestaciones, según la LFT, se tiene la obligación de conservarlos un año después de concluida el ejercicio o concluida la relación laboral ?'),
(124, 'LABORAL', 'CONSERVACION DE DOC', '¿ Se sabe que en caso de incumplimiento en la omisión de esta obligación, puede ser objeto de multa de 3 a 315 SMG ?'),
(125, 'LABORAL', 'CONSERVACION DE DOC', '¿ Conoce que independientemente de lo que dispone la Legislación Laboral, las leyes fiscales obligan por ser parte de la documentación fuente soporte de la contabilidad, se tiene la obligación de conservar dicha documentación mínimo 5 años por una posible facultad de comprobación de la autoridad fiscal ?'),
(126, 'LABORAL', 'GENERALES', '¿ Conoce que en caso de ventilarse un juicio ante el tribunal federal de conciliación y arbitraje, el 5 de abril de cada año se establece como suspensión de labores por ser el día del trabajador y en consecuencia no correrán términos legales ?'),
(127, 'LABORAL', 'GENERALES', '¿ En caso de estar ventilando un juicio ante el tribunal federal de conciliación y arbitraje, existe un calendario de suspensión de labores y que por lo mismo no correrán términos legales, ademas de los días sabados y domingos ?'),
(128, 'LABORAL', 'GENERALESR', '1-enero,5-febrero,21-marzo,1-mayo,5-mayo,16 a 31- julio,16-septiembre,20-noviembre,16 a 31-diciembre'),
(129, 'FISCAL', 'COEFICIENTE DE UTILIDAD', '¿ Se tiene calculado para el ejercicio actual ?'),
(130, 'FISCAL', 'COEFICIENTE DE UTILIDAD', '¿ A que ejercicio corresponde ?, (proporcionar papel de trabajo)'),
(131, 'FISCAL', 'PERDIDAS FISCALES ACUMULADAS', '¿ Se tienen perdidas fiscales de ejercicios anteriores ?'),
(132, 'FISCAL', 'PERDIDAS FISCALES ACUMULADAS', '¿ Están integradas por su origen ?'),
(133, 'FISCAL', 'PERDIDAS FISCALES ACUMULADAS', '¿ Conoce la mecánica actual de actualización fiscal ?'),
(134, 'FISCAL', 'PERDIDAS FISCALES ACUMULADAS', '¿ Están actualizadas y amortizadas en su caso, en el ejercicio que les corresponde ?'),
(135, 'FISCAL', 'PAGOS PROVISIONALES', '¿ Tiene la compañía un listado (concentrado) de todos los impuestos pagados ?'),
(136, 'FISCAL', 'PAGOS PROVISIONALES', '¿ Esta al corriente en los pagos provisionales de impuestos ? (proporcionar comprobantes)'),
(137, 'FISCAL', 'PAGOS PROVISIONALES', '¿ Se tiene actualmente elaborado un calendario de todas las obligaciones al que esta afecto la compañía ?'),
(138, 'FISCAL', 'PAGOS PROVISIONALES', '¿ Tiene la compañía un listado (concentrado)de todos los impuestos pagados ?'),
(139, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Se tiene un cálculo para el ISR del ejercicio a esta fecha ?'),
(140, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Se tiene presentada la última declaración anual de ISR ?'),
(141, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Se han hecho durante el ejercicio pagos provisionales de ISR?'),
(142, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Se tienen saldos a favor de este impuesto ?'),
(143, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Durante el ejercicio se han compensado saldos a favor de este impuesto contra otras contribuciones ? (Proporcionar avisos)'),
(144, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Durante el ejercicio se han solicitado devoluciones de saldos a favor de este impuesto ? (Proporcionar avisos)'),
(145, 'FISCAL', 'IMPUESTO SOBRE LA RENTA', '¿ Conoce el comportamiento fiscal de este impuesto durante el ejercicio en forma mensual y por los ultimos cinco años ?'),
(146, 'FISCAL', 'CONCILIACION CONTABLE Y FISCAL DEL ISR', '¿ Se tiene elaborada a la fecha con cifras reales una conciliación entre el resultado contable y el resultado fiscal en materia de ISR ?'),
(147, 'FISCAL', 'CONCILIACION CONTABLE Y FISCAL DEL ISR', '¿ Se tiene elaborada a la fecha una proyecciÓn de la conciliación entre el resultado contable y el resultado fiscal en materia de ISR, así como un presupuesto proyectado ? (Proporcionar copia)'),
(148, 'FISCAL', 'CONCILIACION CONTABLE Y FISCAL DEL ISR', '¿ Se tiene alguna duda respecto de algun rubro o cuenta contable o fiscal para definir si participa o no en la conciliación contable fiscal del ISR ? (Checar)'),
(149, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Conoce la mecánica actual para determinar el impuesto al valor agregado ?'),
(150, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Si tiene saldos a favor mensuales de este impuesto, como los maneja contablemente y como los aplica fiscalmente ?'),
(151, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Tiene saldos a favor de ejercicios anteriores ?'),
(152, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Durante el ejercicio no se han compensado saldos a favor de este impuesto contra otras contribuciones ? (Proporcionar avisos)'),
(153, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Durante el ejercicio no se han solicitado devoluciones de saldos a favor de este impuesto ? (proporcionar avisos)'),
(154, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Se tiene elaborada una conciliación de los ingresos nominales mensuales para efectos del ISR e IVA, en base a los registros contables ? '),
(155, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Conoce el comportamiento fiscal de este impuesto durante el ejercicio en forma mensual y por los ultimos cinco años ?'),
(156, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ Qué ingresos (valor de actos o actividades) percibe la compañía, como los identifica contablemente y a que tasa de impuesto al valor agregado estan afectos ?'),
(157, 'FISCAL', 'IMPUESTO AL VALOR AGREGADO', '¿ En el supuesto de tener ingresos (valor de actos o actividades) gravadas a tasa 0%, exentos o no afectos a este impuesto, cual es el fundamento legal aplicable ? (Verificar)'),
(158, 'FISCAL', 'OTRAS CONTRIBUCIONES: (RETENCION ISR, IVA, IEPS)', '¿ Se tienen otras contribuciones fiscales por las que este obligado a su pago en su calidad de contribuyente directo o como retenedor responsable solidario ?'),
(159, 'FISCAL', 'OTRAS CONTRIBUCIONES: (RETENCION ISR, IVA, IEPS)', 'Se hace la expedición de constancias de retenciones de ISR , por salarios, honorarios, arrendamiento, intereses, etc. ¿ A que se esta obligado ?'),
(160, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por salarios y demas prestaciones derivado de una relacion laboral '),
(161, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', '¿ Por ingresos asimilados a salarios ?, ¿ Se tienen contratos ?, ¿ Se puede demostrar convincentemente que no es empleado ?'),
(162, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por prestación de servicios profesionales'),
(163, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por arrendamiento y en general por otorgar el uso o goce temporal de inmuebles'),
(164, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por intereses (Titulo IV Capitulo VI LISR)'),
(165, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por premios por loterias, rifas, sorteos, juegos con apuestas y concursos.'),
(166, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por otros ingresos a personas fisicas (Titulo IV Capitulo IX LISR)'),
(167, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL PAIS', 'Por adquisiciones comprobadas mediante autofacturación por CFDI'),
(168, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', '¿ Realiza algun pago al extranjero ?'),
(169, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', '¿ Realiza alguna retención sobre dichos pagos ? (Citar el fundamento legal aplicable'),
(170, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Regalias (extranjero)'),
(171, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Asistencia técnica (extranjero)'),
(172, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Mediaciones mercantiles (extranjero)'),
(173, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Intercambio de deuda publica por capital (extranjero)'),
(174, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Arrendamiento financiero (extranjero)'),
(175, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Servicios turístico de tiempo compartido (extranjero)'),
(176, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Intereses (extranjero)'),
(177, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Enajenación de inmuebles (extranjero)'),
(178, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Enajenación de acciones (extranjero)'),
(179, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Espectáculos públicos, artísticos y deportivos (extranjero)'),
(180, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Si se tiene algun supuesto de los mencionados, citar el % de retención y el fundamento legal aplicable.'),
(181, 'FISCAL', 'RETENCION IMPUESTO SOBRE LA RENTA: (ISR) RESIDENTES EN EL EXTRANJERO', 'Se tiene el amarre por cada concepto y por porcentaje de retencion de la base que se afecta a resultados contra lo efectivamente retenido y pagado ? (proporcionar papeles trabajo)'),
(182, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Servicios personales independientes prestados por personas físicas'),
(183, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Uso o goce temporal de bienes prestados u otorgados por personas físicas'),
(184, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Adquisición de desperdicios'),
(185, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Servicios de autotransporte terrestre de bienes prestados por PF o PM'),
(186, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Servicios prestados por comisionistas personas fisicas'),
(187, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Adquisición o uso o goce temporal de bienes tangibles que enajenen u otorguen residentes en el extranjero sin establecimiento en el país.'),
(188, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Si se tiene algun supuesto de los mencionados, citar el % de retencion y el fundamento legal aplicable.'),
(189, 'FISCAL', 'RETENCION DEL IMPUESTO AL VALOR AGREGADO: (IVA)', 'Se tiene el amarre por cada concepto y por porcentaje de retencion de la base que se afecta a resultados contra lo efectivamente retenido y pagado ? (proporcionar papeles trabajo)'),
(190, 'FISCAL', 'CONCILIACION CONTABLE Y FISCAL DEL ISR:', 'De las siguientes partidas que participan entre otras en la \'conconfis\' se tienen a la fecha determinadas e integradas cada una de ellas mediante el papel de trabajo correspondiente ?, y según sea el caso se tiene su amarre con registros contables ?.'),
(191, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Ajuste anual por inflación acumulable'),
(192, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Utilidad cambiaria fiscal'),
(193, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Utilidad fiscal en venta de acciones'),
(194, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Utilidad fiscal en venta de activos fijos'),
(195, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Utilidad fiscal en venta de terrenos'),
(196, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Anticipos de clientes'),
(197, 'FISCAL', 'INGRESOS FISCALES NO CONTABLES:', 'Otros ingresos fiscales'),
(198, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Multas'),
(199, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Gastos no deducibles'),
(200, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Depreciación contable de activos fijos'),
(201, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Provisiones contables'),
(202, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Estimaciones contables'),
(203, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Perdida contable en enajenación de acciones'),
(204, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Costo de ventas'),
(205, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Perdida cambiaria'),
(206, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Amortización contable (gastos y cargos diferidos)'),
(207, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Costo contable en venta de activo'),
(208, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Perdida contable en venta de activo'),
(209, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Honorarios, rentas e intereses no pagados al cierre del ejercicio'),
(210, 'FISCAL', 'DEDUCCIONES CONTABLES NO FISCALES:', 'Otras deducciones contables'),
(211, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Costo de venta fiscal'),
(212, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Mano de obra'),
(213, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Gastos de fabricación'),
(214, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Depreciación fiscal de activos fijos'),
(215, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Amortización fiscal (gastos y cargos diferidos)'),
(216, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Costo fiscal en venta de activo'),
(217, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Perdida fiscal en venta de activo'),
(218, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Ajuste anual por inflación deducible'),
(219, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Perdida cambiaria fiscal'),
(220, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Cargos a provisiones,¿Se tiene integrado el expediente ? (Analizar)'),
(221, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Cargos a estimaciones'),
(222, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Honorarios, rentas e intereses pagados al cierre del ejercicio'),
(223, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Anticipos de clientes del ejercicio anterior'),
(224, 'FISCAL', 'DEDUCCIONES FISCALES NO CONTABLES:', 'Otras deducciones fiscales'),
(225, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Utilidad cambiaria'),
(226, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Utilidad contable en venta de acciones'),
(227, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Utilidad contable en venta de activos'),
(228, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Utilidad contable en venta de terrenos'),
(229, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Ventas anticipadas acumuladas en el ejercicio anterior y devengados en este'),
(230, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Cancelación de estimaciones'),
(231, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Cancelación de provisiones'),
(232, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Ingresos por dividendos'),
(233, 'FISCAL', 'INGRESOS CONTABLES NO FISCALES', 'Otros ingresos contables'),
(234, 'FISCAL', 'DEDUCCION DE INVERSIONES CONTABLE Y FISCAL:', '¿ Con respecto a los activos fijos, se tiene la integración y el amarre al inicio y al cierre del ejercicio, asi como las bajas, altas y traspasos durante el ejercicio ?'),
(235, 'FISCAL', 'DEDUCCION DE INVERSIONES CONTABLE Y FISCAL:', '¿ Se tiene identificada los porcentajes de depreciación y amortización de activos fijos, gastos y cargos diferidos ?,¿ asi como su fundamento legal ?'),
(236, 'FISCAL', 'DEDUCCION DE INVERSIONES CONTABLE Y FISCAL:', 'Se tienen los cálculos correspondientes a la depreciación y amortización contable y fiscal de activos fijos, gastos y cargos diferidos ?'),
(237, 'FISCAL', 'DEDUCCION DE INVERSIONES CONTABLE Y FISCAL:', '¿ Durante el ejercicio o ejercicios pasados, se tuvo deducción inmediata de activos fijos ?, ¿ Se tiene integrado por Separado ?'),
(238, 'FISCAL', 'DEDUCCION DE INVERSIONES CONTABLE Y FISCAL:', '¿ Se ha optado por algun decreto o estimulo respecto a los activos fijos, gastos o cargos diferidos, diferentes a los establecidos en ley ?'),
(239, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '¿ La empresa actualmente se dictamina para efectos fiscales ? (SHCP-SAT)'),
(240, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '¿ La empresa actualmente se dictamina para efectos del IMSS ? (IMSS)'),
(241, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '¿ La empresa actualmente se dictamina para efectos del INFONAVIT ? (INFONAVIT)'),
(242, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '¿ La empresa actualmente se dictamina por contribuciones estatales ? (SHE)'),
(243, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '¿ Se han determinado diferencias por pagar de Contribuciones de parte del CPR ?, cuales ?'),
(244, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Impuesto Sobre la Renta'),
(245, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Impuesto al Valor Agregado'),
(246, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Impuesto Especifal Sobre Producción y Servicios'),
(247, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Impuesto al Comercio Exterior (IAI)'),
(248, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Impuesto al Comercio Exterior (IAE)'),
(249, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'ISR Sobre dividendos distribuidos no provenientes de Cufin'),
(250, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención por salarios pagados'),
(251, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención por honorarios pagados'),
(252, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención por regalias y asistencia tecnica pagados'),
(253, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención por arrendamiento pagados'),
(254, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención por enajenación de acciones'),
(255, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención de IVA prestación de servicios de PF'),
(256, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención de IVA arrendamiento de bienes de PF'),
(257, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención de IVA adquisición de desperdicio'),
(258, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Retención de IVA servicio de autotransporte terrestre de bienes de PF o PM'),
(259, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '2% sobre nominas'),
(260, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Cuotas Patronales IMSS'),
(261, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Aportaciones Infonavit'),
(262, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Cuotas Obreras IMSS x responsabilidad solidaria'),
(263, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Aportaciones SAR'),
(264, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', 'Otros impuestos pendientes de pago'),
(265, 'FISCAL', 'DIFERENCIAS DE IMPUESTOS POR PAGAR DETERMINADAS POR EL CPR:', '* Estas diferencias, fueron pagadas dentro de los plazos que las disposiciones fiscales contemplan, para efectos de considerarse espontanea dichos pagos, e incluso la autoridad respetar la revisión secuencial del dictamen ? '),
(266, 'FISCAL', '3% SOBRE NOMINAS:', '* Se tiene la obligación del pago del 3% de Impuesto Sobre Nóminas ?'),
(267, 'FISCAL', '3% SOBRE NOMINAS:', '*Tiene la empresa la obligacion de retener el 3% sobre nominas en servicios de outsourcing? Esta al corriente con el entero de las retenciones?'),
(268, 'FISCAL', '3% SOBRE NOMINAS:', '* Cuales son los conceptos que la compañía considera como objetos de impuesto ?'),
(269, 'FISCAL', '3% SOBRE NOMINAS:', '* Cuales son los conceptos que la compañía considera como exento y cual es el fundamento legal correspondiente ?'),
(270, 'FISCAL', '3% SOBRE NOMINAS:', '* Durante el ejercicio se han realizado pagos provisionales de este impuesto ? (Proporcionar papeles de trabajo)'),
(271, 'FISCAL', '3% SOBRE NOMINAS:', '* Se tiene el Registro Estatal de Contribuyentes (REC) ? (Proporcionar o exhibir documentación oficial correspondiente)'),
(272, 'FISCAL', '3% SOBRE NOMINAS:', '* Se tiene presentada la declaración anual del 3% sobre nóminas ?'),
(273, 'FISCAL', '3% SOBRE NOMINAS:', '* Conoce el comportamiento fiscal de este impuesto durante el ejercicio en forma mensual y por los ultimos cinco años ?'),
(274, 'FISCAL', 'OTRAS CONSIDERACIONES:', '* Durante el ejercicio se ha presentado ante las autoridades fiscales solicitud para disminución del pago provisional de ISR ? (Proporcionar Aviso y papeles de trabajo)'),
(275, 'FISCAL', 'CUENTA DE CAPITAL DE APORTACION (CUCA):', '* Se tiene determinada a la fecha la CUCA ?'),
(276, 'FISCAL', 'CUENTA DE CAPITAL DE APORTACION (CUCA):', '* Durante la vida de la empresa ha sido objeto de fusión o escisión ?, y en su caso, en que ejercicio ?'),
(277, 'FISCAL', 'CUENTA DE CAPITAL DE APORTACION (CUCA):', '* En su caso, que tratamiento fiscal se le dio a la CUCA, por este evento ?'),
(278, 'FISCAL', 'CUENTA DE CAPITAL DE APORTACION (CUCA):', '* Se tienen todos y cada uno de los instrumentos legales (Actas) que ampare o soporte cada una de las aportaciones que constituyen la CUCA ?'),
(279, 'FISCAL', 'CUENTA DE CAPITAL DE APORTACION (CUCA):', '* La empresa a la fecha, ha efectuado algún reembolso o reducción de capital ?'),
(280, 'FISCAL', 'CUENTA DE CAPITAL DE APORTACION (CUCA):', '* Proporcionar papel de trabajo de la CUCA, del Reembolso o reducción de capital '),
(281, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '* Se tiene determinada a la fecha la CUFIN ?'),
(282, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '* Durante la vida de la empresa ha sido objeto de fusión o escisión ?, y en su caso, en que ejercicio ?'),
(283, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '* En su caso, que tratamiento fiscal se le dio a la CUFIN, por este evento ?'),
(284, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '* Se tienen todos y cada uno de los documentos legales que ampare o soporte la determinación de la CUFIN ? (Última Declaración Anual Complementaria o por Dictamen, y el Dictamen Fiscal)'),
(285, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '* La empresa a la fecha, ha decretado y en su caso, pagado dividendos a los socios o accionistas ?'),
(286, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '* Proporcionar papel de trabajo de la CUFIN, así como de la determinación o no de la retención del ISR que corresponda.'),
(287, 'FISCAL', 'CUENTA DE UTILIDAD FISCAL NETA (CUFIN)', '*Se tiene por separado la CUFIN que se genera a partir del 2014 del resto de la CUFIN?'),
(288, 'FISCAL', 'PAGOS AL EXTRANJERO Y TRATADO DE DOBLE TRIBUTACION:', '* Durante el ejercicio efectuó pagos al extranjero ?'),
(289, 'FISCAL', 'PAGOS AL EXTRANJERO Y TRATADO DE DOBLE TRIBUTACION:', '* En su caso, se están haciendo la retención correspondiente del ISR invocando los beneficios del tratado para evitar la doble tributación ?'),
(290, 'FISCAL', 'PAGOS AL EXTRANJERO Y TRATADO DE DOBLE TRIBUTACION:', '* Están expedidas las constancias de retención correspondiente ?'),
(291, 'FISCAL', 'PAGOS AL EXTRANJERO Y TRATADO DE DOBLE TRIBUTACION:', '* Para invocar beneficios del tratado, se tienen las constancias de residencia fiscal y la declaración de impuestos en su pais de residencia ?'),
(292, 'FISCAL', 'PAGOS AL EXTRANJERO Y TRATADO DE DOBLE TRIBUTACION:', '* Por los pagos que está realizando al extranjero, tiene la fundamentación fiscal aplicable así como el soporte legal ? (Proporcionar copia)'),
(293, 'FISCAL', 'CHECK LIST FISCAL 2017:', '* Existe una persona encargada de recepcionar, verificar y validar que cada uno de los comprobantes fiscales que pretenden deducir fiscalmente, cumplen con todos los requisitos de Ley ? '),
(294, 'FISCAL', 'CHECK LIST FISCAL 2017:', '* Cual es su nombre, tiene algún manual o procedimiento implementado ? (proporcionar copia):'),
(295, 'FISCAL', 'CHECK LIST FISCAL 2017:', '* Conoce que existe la obligación de expedir con cheque nominativos por importes superiores a $2,000.00 para que proceda la deducción ?'),
(296, 'FISCAL', 'CHECK LIST FISCAL 2017:', '* Conoce además las otras opciones de pago contempladas en Ley ? Ha utilizado alguno de estos ?, cual con mas frecuencia ? (Proporcionar 1 copia)'),
(297, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'a) Pago con tarjeta de crédito del contribuyente y pago posterior al banco emisor de la tarjeta'),
(298, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'b) Tarjeta de Débito'),
(299, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'c) Tarjeta de Servicio'),
(300, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'd) Monederos Electrónicos'),
(301, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'A utilizado alguno de estos últimos ?, cite cual.'),
(302, 'FISCAL', 'CHECK LIST FISCAL 2017:', '* Conoce los requisitos que deben de contener los cheques ? Son de la cuenta del contribuyente ?, Contienen el RFC del contribuyente ?, al emitirse se anota la leyenda en el anverso Para abono en cuenta del beneficiario ? (Verificar muestreo)'),
(303, 'FISCAL', 'CHECK LIST FISCAL 2017:', '* Conoce que la deducción de Compras relacionadas con bebidas alcohólicas para su posterior venta y consumo al público en general y en el mismo establecimiento, se tiene que cumplir con ciertos requisitos ?');
INSERT INTO `preguntas` (`id`, `categoria`, `seccion`, `texto`) VALUES
(304, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'a) Son destruidos los envases una vez agotados el contenido ?'),
(305, 'FISCAL', 'CHECK LIST FISCAL 2017:', 'b) En que momento ?, al final del día o al día siguiente ?'),
(306, 'FISCAL', 'PRESTAMOS E INTERESES:', '* Se recibieron préstamos y por los cuales se pagan intereses ?, y a su vez se concedieron créditos a:'),
(307, 'FISCAL', 'PRESTAMOS E INTERESES:', 'a) Trabajadores o funcionarios'),
(308, 'FISCAL', 'PRESTAMOS E INTERESES:', 'b) Socios o Accionistas'),
(309, 'FISCAL', 'PRESTAMOS E INTERESES:', 'c) Terceros'),
(310, 'FISCAL', 'PRESTAMOS E INTERESES:', 'y por ello se cobran o no intereses a tasas menores a los pactados por el crédito recibido?, se está conciente de que habrá una porción de \'deducción de intereses no deducibles\' ?'),
(311, 'FISCAL', 'PRESTAMOS E INTERESES:', '* En el supuesto de otorgar prestamos a terceros a tasas inferiores o nulas que las contratadas con acreedores, se está realizando el cálculo del Art. 38 del RLISR Nuevo Vigente ?'),
(312, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', '* Durante el ejercicio se han efectuado la totalidad de los pagos efectivamente erogados a favor de personas físicas que se detallan a continuación ?:'),
(313, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'A) Por Salarios (Deben de estar pagados a mas tardar al 31 Dic 2006)'),
(314, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'B) Por Honorarios'),
(315, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'C) Por Arrendamiento'),
(316, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'D) Por Actividad Empresarial'),
(317, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'E) Por Intereses'),
(318, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'F) Por Derechos de Autor (Honorarios)'),
(319, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'G) Por Donativos'),
(320, 'FISCAL', 'DEDUCCION DE PAGOS A PERSONAS FISICAS EFECTIVAMENTE EROGADOS ', 'H) Otros pagos a Personas Fisicas'),
(321, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', '* Durante el ejercicio se otorgaron prestaciones de previsión social ?'),
(322, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', '* Se tiene contrato colectivo de trabajo o contrato ley ?'),
(323, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', '* Con cuantos sindicatos se tiene contrato colectivo de trabajo o contrato ley ?, (Proporcionar copias)'),
(324, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', '* Que prestación de previsión social se otorgan ? y cuales son los porcentajes o importes otorgados en cada uno de ellos ? (Proporcionar copia del plan)'),
(325, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', '* Que requisitos en lo particular se está cumpliendo por cada una de la prestación de previsión social que se está otorgando ? mencionar (En su caso, proporcionar copia del manual que se tenga)'),
(326, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', 'a) Las prestaciones otorgadas a los trabajadores sindicalizados fueron de manera general y en estricto apego al contrato colectivo o contrato ley ?'),
(327, 'FISCAL', 'DEDUCCION DE PREVISION SOCIAL', 'b) Las prestaciones otorgadas a los trabajadores \'no sindicalizados\' cumplen con el requisito de generalidad al efectuar el calculo del promedio aritmetico menor o igual a las prestaciones deducibles otorgadas a los trabajadores \'sindicalizados\' ? (Proporcionar papel de trabajo )'),
(328, 'FISCAL', 'DEDUCCION DE FONDO DE AHORRO', '* Durante el ejercicio en la empresa establecieron planes de fondo de ahorro ?'),
(329, 'FISCAL', 'DEDUCCION DE FONDO DE AHORRO', '* Se cumplen con los requisitos establecidos en el Art. 49 del RLISR Vigente en el ejercicio ?'),
(330, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION O INTERESES A PRECIO DE MERCADO: PARTES RELACIONADAS NACIONALES', '* Durante el ejercicio se realizaron operaciones con partes relacionadas residentes en el país ?'),
(331, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION O INTERESES A PRECIO DE MERCADO: PARTES RELACIONADAS NACIONALES', '* Las operaciones realizadas con partes relacionadas residentes en el país, se celebraron a precios de mercado? Adquisición de bienes o servicios, Intereses derivado de Préstamos?'),
(332, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION O INTERESES A PRECIO DE MERCADO: PARTES RELACIONADAS NACIONALES', '* Se tienen las pruebas documentales para demostrar a la SHCP (SAT) que se usaron valores de mercado ?'),
(333, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION O INTERESES A PRECIO DE MERCADO: PARTES RELACIONADAS NACIONALES', '* Se conoce de la contingencia fiscal que se tiene según el Art. 91 y 92 Fracc II de la LISR, por no cumplir o no tener la documentación soporte que demuestre que se pactaron valores de mercado ?'),
(334, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION A PRECIO DE MERCADO: PARTES RELACIONADAS EXTRANJERAS', '* Durante el ejercicio se realizaron operaciones con partes relacionadas residentes en el extranjero ?'),
(335, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION A PRECIO DE MERCADO: PARTES RELACIONADAS EXTRANJERAS', '* Las operaciones realizadas con partes relacionadas residentes en el país, se celebraron a precios de mercado ?'),
(336, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION A PRECIO DE MERCADO: PARTES RELACIONADAS EXTRANJERAS', '* Se tienen las pruebas documentales para demostrar a la SHCP (SAT) que se usaron precios de mercado ?'),
(337, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION A PRECIO DE MERCADO: PARTES RELACIONADAS EXTRANJERAS', '* Se conoce de la contingencia fiscal que se tiene según el Art. 91, 92 Fracc II y 215 Segundo Párrafo de la LISR, por no cumplir o no tener la documentación soporte que demuestre que se pactaron a  valor de mercado y caer en la determinación presuntiva de los precios de transferencia por parte de la SHCP (SAT) ?'),
(338, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION A PRECIO DE MERCADO: PARTES RELACIONADAS EXTRANJERAS', '* En el supuesto de la realización de un estudio de precios de transferencia mediante un método determinado sin tener la seguridad plena de su correcta aplicación, se ha formulado la Resolución Anticipada (APA´S) ante la SHCP (SAT) ?, Y cual es su situación a la fecha ?'),
(339, 'FISCAL', 'DEDUCCION DEL COSTO DE ADQUISICION A PRECIO DE MERCADO: PARTES RELACIONADAS EXTRANJERAS', '* Se realiza el estudio de precios de transferencia cada ejercicio ?, Se tiene a disposición de la SHCP (SAT) ?.'),
(340, 'FISCAL', 'DEDUCCION DE CREDITOS INCOBRABLES', '* Durante el ejercicio fiscal, se está considerando alguna deducción fiscal no contable por concepto de crédito incobrable ?, a cuanto asciende ?'),
(341, 'FISCAL', 'DEDUCCION DE CREDITOS INCOBRABLES', '* En ejercicios anteriores, se tuvo crédito incobrable alguno ?, se identifica con registros contables actualmente ?'),
(342, 'FISCAL', 'DEDUCCION DE CREDITOS INCOBRABLES', '* Se tiene plenamente el soporte documental de la consumación del plazo de prescripción o de la notoria imposibilidad práctica de cobro ?'),
(343, 'FISCAL', 'DEDUCCION DE CONSUMOS EN RESTAURANTE AL 12.5%', '* Durante el ejercicio fiscal, se tiene deducciones por concepto de consumos en restaurantes ?'),
(344, 'FISCAL', 'DEDUCCION DE CONSUMOS EN RESTAURANTE AL 12.5%', '* Conoce de que \'Invariablemente\' para ser deducible tuvo que haber realizado el pago mediante:'),
(345, 'FISCAL', 'DEDUCCION DE CONSUMOS EN RESTAURANTE AL 12.5%', 'a) Tarjeta de Crédito'),
(346, 'FISCAL', 'DEDUCCION DE CONSUMOS EN RESTAURANTE AL 12.5%', 'b) Tarjeta de Débito'),
(347, 'FISCAL', 'DEDUCCION DE CONSUMOS EN RESTAURANTE AL 12.5%', 'c) Tarjeta de Servicios'),
(348, 'FISCAL', 'DEDUCCION DE CONSUMOS EN RESTAURANTE AL 12.5%', 'd) Monederos Electrónicos'),
(349, 'FISCAL', 'DEDUCCION DE SUELDOS Y SALARIOS', 'Conoce cuales son los requisitos para que proceda la deducción de salarios y salarios ? '),
(350, 'FISCAL', 'DEDUCCION DE SUELDOS Y SALARIOS', 'Se estan emitiendo recibos electronicos con la version 1.2 de cfdi de nominas?'),
(351, 'FISCAL', 'DEDUCCION DE SUELDOS Y SALARIOS', 'a) Se está reteniendo y enterando el ISR por sueldos y salarios \'en plazo\', independientemente de lo contenido en el articulo 4º del Decreto del 31 de mayo de 2002 de acuerdo al sexto digito numerico del RFC ?'),
(352, 'FISCAL', 'DEDUCCION DE SUELDOS Y SALARIOS', 'b) Se está determinando y entregandose efectivamente el Subsidio al Empleo \'en plazo\' a los trabajadores ?'),
(353, 'FISCAL', 'DEDUCCION DE SUELDOS Y SALARIOS', 'c) Para acreditar el subsidio al empleo, conoce de que se debe tener un acumulado de salarios, así como los pagos que le correspondan hacerse al IMSS e INFONAVIT ?'),
(354, 'FISCAL', 'DEDUCCION DE SUELDOS Y SALARIOS', 'd) Conoce de que \'obligatoriamente\' los salarios, deberán estar efectivamente pagados en el ejercicio y a mas tardar al 31-Diciembre del año en curso ?'),
(355, 'FISCAL', 'DEDUCCION DE CUOTA OBRERA AL IMSS PAGADA POR EL PATRON', 'Durante el ejercicio, el patrón pago a su costa la correspondiente Cuota Obrera IMSS de los trabajadores ?, Conoce que es perfectamente deducible ?'),
(356, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', '* Conoce que el plazo para reunir los requisitos que para cada deducción en particular establece la ley es al realizar la operación o a más tardar el último día del ejercicio ?, y que en todo caso la deducción fiscal no procede ?'),
(357, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', 'a) Se tiene un manual de los requisitos específicos que se deben de reunir para cada uno de las deducciones en lo particular ?'),
(358, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', 'b) Se tiene un manual de los requisitos generales para cada uno de las deducciones que se deben de reunir ?'),
(359, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', 'c) Se tiene la consistencia en: '),
(360, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', '* La fecha de los gastos que se pretende deducir corresponden a la del ejercicio ?, salvo lo establecido en el Art. 46 del nuevo RISR ? (Fondo de ahorro)'),
(361, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', '* La retención o traslado de impuestos se efectúa dentro de los plazos establecidos ?'),
(362, 'FISCAL', 'REQUISITOS DE LAS DEDUCCIONES, PLAZO PARA REUNIRLOS:', '* En el supuesto de haber retenido o trasladado impuestos, para efectos de la deducibilidad del gasto, se tiene conocimiento del plazo citado en lel decreto del 31 de mayo de 2002 de acuerdo al sexto digito numerico del RFC ? '),
(363, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', '* Conoce que la deducibilidad de los gastos u otras erogaciones, dependiendo del tipo de deduccion, está condicionada a la presentacion de la declaracion informativa respectiva cumpliendo en \'tiempo y en forma\' según los plazos establecidos en ley ?'),
(364, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', '* Conoce que las declaraciones informativas que se deben de cumplir dentro de los plazos establecidos en ley, entre otras son las siguientes ?'),
(365, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'A) Declaracion informativa de operaciónes con terceros (DIOT)'),
(366, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'B) Informativa de Retenciones de ISR - (15 Feb del año siguiente)'),
(367, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'C) Informativa de Préstamos obtenidos de residentes en el extranjero - (15 Feb del año siguiente?'),
(368, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'D) Informativa de Clientes y Proveedores (si no se tiene la obligacion de DIOT)'),
(369, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'E) Informativa de Retenciones de ISR a residentes en el extranjero - (15 Feb del año siguiente)'),
(370, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'G) Informativa de ISR Retenido a Salarios - (15 Feb del año siguiente)'),
(371, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'H) Informativa de operaciones con partes relacionadas residentes en el extranjero - (Conjuntamente con la declaración del ejercicio)'),
(372, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'I) Informativa de dividendos (remanente) pagado - (15 Feb del año siguiente)'),
(373, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'J) Informativa de operaciones mediante fideicomiso - (15 Feb del año siguiente)'),
(374, 'FISCAL', 'PRESENTACION DE DECLARACIONES INFORMATIVAS', 'K) Informativa de donativos - (15 Feb del año siguiente)'),
(375, 'FISCAL', 'SALARIOS CON DERECHO A DEVOLUCION DE SUBSIDIO AL EMPLEO', '* En el ejercicio, efectivamente se entrego a los trabajadores \'Subsidio al Empleo\' ?; Se cumplió con los siguientes requisitos ?'),
(376, 'FISCAL', 'SALARIOS CON DERECHO A DEVOLUCION DE SUBSIDIO AL EMPLEO', 'a) Se tiene un registro individualizado de las nóminas'),
(377, 'FISCAL', 'SALARIOS CON DERECHO A DEVOLUCION DE SUBSIDIO AL EMPLEO', 'b) Se cuenta con el comprobante de pago del salario, del ISR Retenido y del Crédito al Salario Devuelto'),
(378, 'FISCAL', 'SALARIOS CON DERECHO A DEVOLUCION DE SUBSIDIO AL EMPLEO', 'c) Se cumplió con el Art. 118: (Calculo Anual, Informativa de Salarios y Subsidio al Empleo, Etc.)'),
(379, 'FISCAL', 'SALARIOS CON DERECHO A DEVOLUCION DE SUBSIDIO AL EMPLEO', 'd) Los Trabajadores cuentan con RFC y CURP ?'),
(380, 'FISCAL', 'SALARIOS CON DERECHO A DEVOLUCION DE SUBSIDIO AL EMPLEO', 'e) Estan pagadas cuotas obrero patronales IMSS, SAR e Infonavit ?'),
(381, 'FISCAL', 'TRATAMIENTO FISCAL DE LA PERDIDA CAMBIARIA / UTILIDAD CAMBIARIA', '* Conoce de que la Perdida Cambiaria / Utilidad Cambiaria se asimilan a \'Intereses\' y que tendrán el mismo efecto fiscal para efectos de ISR ?, '),
(382, 'FISCAL', 'TRATAMIENTO FISCAL DE LA PERDIDA CAMBIARIA / UTILIDAD CAMBIARIA', '* Conoce que tiene un tope respecto a su deducción (Como \'Interés\'), que no podrá exceder de la que resultaría de aplicar el tipo de cambio publicado en el DOF ?'),
(383, 'FISCAL', 'DEDUCCION DE GASTOS DE VIAJE', '* Durante el ejercicio, se está deduciendo Gastos de Viaje ?, Conoce las Limitaciones en materia de deducibilidad ?'),
(384, 'FISCAL', 'DEDUCCION DE GASTOS DE VIAJE', 'a) Las personas que hacen las erogaciones son trabajadores \'subordinados\' o profesionistas independientes ? (Ver nombre y relación laboral o profesional con la empresa)'),
(385, 'FISCAL', 'DEDUCCION DE GASTOS DE VIAJE', 'b) La Alimentación relacionada con el viaje, sabe de que \'debe\' de estar pagada con \'tarjeta de crédito\' ? (Ver gasto y forma de pago)'),
(386, 'FISCAL', 'DEDUCCION DE GASTOS DE VIAJE', 'c) La documentación de alimentación, está acompañada con la correspondiente a \'Hospedaje o transporte\' ? (Ver gasto de viaje y relativos)'),
(387, 'FISCAL', 'DEDUCCION DE GASTOS DE VIAJE', 'd) Conoce de que para los trabajadores subordinados o profesionistas deben considerarlos como \'Ingresos Exentos\' en su declaración anual ?'),
(388, 'FISCAL', 'DEDUCCION DE GASTOS DE VIAJE', '* Existe un manual mediante el cual se den o hayan dado a conocer el manejo adecuados de los gastos de viaje ? (Proporcionar)'),
(389, 'FISCAL', 'GASTOS DE VIAJE: TOPES DIARIO POR CONCEPTO Y POR BENEFICIARIO', '* Alimentación en Territorio Nacional  ($750.00)'),
(390, 'FISCAL', 'GASTOS DE VIAJE: TOPES DIARIO POR CONCEPTO Y POR BENEFICIARIO', '* Alimentación en el Extranjero ($1,500.00)'),
(391, 'FISCAL', 'GASTOS DE VIAJE: TOPES DIARIO POR CONCEPTO Y POR BENEFICIARIO', '* Uso o Goce de Automóviles en Territorio Nacional o en el Extranjero ($850.00)'),
(392, 'FISCAL', 'GASTOS DE VIAJE: TOPES DIARIO POR CONCEPTO Y POR BENEFICIARIO', '* Hospedaje en el Extranjero ($3,850.00)'),
(393, 'FISCAL', 'GASTOS DE VIAJE: TOPES DIARIO POR CONCEPTO Y POR BENEFICIARIO', '* Uso o Goce de Aviones (X Avión) - Ningún gasto adicional deducible, y la deducción permitida será proporcional al MOI del Avión que no rebase de $8,600,000  ($7,600.00)'),
(394, 'FISCAL', 'GASTOS DE VIAJE: TOPES DIARIO POR CONCEPTO Y POR BENEFICIARIO', '* Uso o Goce Temporal de Automóviles (Renta Local) y la deducción permitida procederá solo si el MOI del Automóvil No excede d $175,000 (Art. 32 Fracc XIII LISR) ($165.00) o bien 250 pesos diarios según Decreto del 23 de abril de 2003'),
(395, 'FISCAL', 'REQUISITOS ADICIONALES DE LOS COMPROBANTES FISCALES', '* Conoce los requisitos que deben de contener los comprobantes fiscales para efectos de proceder su deducción ?'),
(396, 'FISCAL', 'REQUISITOS ADICIONALES DE LOS COMPROBANTES FISCALES', '* Conoce el metodo de verificacion de comprobantes por las erogaciones que pretende deducir ?'),
(397, 'FISCAL', 'REQUISITOS ADICIONALES DE LOS COMPROBANTES FISCALES', 'c) Los CFDI  que amparan sus deducciones se validan?'),
(398, 'FISCAL', 'REQUISITOS ADICIONALES DE LOS COMPROBANTES FISCALES', 'd) Los archivos xml por los comprobantes que aparan las deducciones se estan solicitando al emisor de dichos comprobantes ?'),
(399, 'SEGURIDAD SOCIAL', 'R IMSS INFONAVIT', 'Conoce que al inicio de la primera relación laboral, se tiene la obligación de presentarla inscripción ante el IMSS e Infonavit ?'),
(400, 'SEGURIDAD SOCIAL', 'R IMSS INFONAVIT', 'Conoce que tiene 5 días hábiles para presentar el \'Aviso de Inscripción Patronal o de Modificación en su registro (Afil-01) e Inscripción de las Empresas en el Seguro Social de Riesgos de '),
(401, 'SEGURIDAD SOCIAL', 'R IMSS INFONAVIT', 'Sabe que en caso de incumplimiento de registro ante el IMSS, puede ser objeto de multa de 20 a 350 VSMGDF, Asi como para efectos del INFONAVIT la multa es de 301 a 350 VSMGDF ?'),
(402, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Conoce que conforme a la ley del LSS y su nuevo reglamento, para los avisos de ALTA, BAJA o MODIFICACION DE SALARIO a un trabajador, se tienen ciertos plazos ?'),
(403, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Para dar de ALTA a un trabajador, se tiene un plazo de 5 días hábiles a partir de la fecha de inicio de la relación laboral mediante la presentación del formato (Afil-02) \'Aviso de inscripción del trabajador\'  ?'),
(404, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Sabe que en caso de incumplimiento para registro el ALTA de un trabajador ante el IMSS, puede ser objeto de multa de 20 a 350 VSMGDF, Asi como para efectos del INFONAVIT la multa es de 301 a 350 VSMGDF ?'),
(405, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Para dar de BAJA a un trabajador, se tiene un plazo de 5 días hábiles a partir de la fecha de terminación de la relación laboral mediante la presentación del formato (Afil-04) \'Aviso de baja del trabajador o asegurado\'  ?'),
(406, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', ' Sabe que en caso de incumplimiento para dar de BAJA un trabajador ante el IMSS, se tiene la obligación de seguir cubriendo la cuota hasta el día siguiente a la presentación del Aviso. ?'),
(407, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Para presentar MODIFICACIÓN de salario de un trabajador, se tiene un plazo cierto dependiendo si la modificación es: Salario Fijo, Salario Variable o Salario Mixto ?, presentando el formato AFIL-03 \'Aviso de Modificación de Salario del Trabajador ?'),
(408, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Salario Fijo: Dentro de los 5 días hábiles siguientes a la fecha en que se realiza la modificación ?'),
(409, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Salario Variable: Dentro de los 5 días hábiles siguientes de los meses de Enero, Marzo, Mayo, Julio, Septiembre y Noviembre ?'),
(410, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Salario Mixto: Se aplica la regla correspondiente dependiendo si la modificación es al \'fijo\' o al \'variable\' ?'),
(411, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Sabe que en caso de incumplimiento para registrar la MODIFICACION salarial del trabajador ante el IMSS, puede ser objeto de multa de 20 a 125 VSMGDF, y para efectos del INFONAVIT la multa es de 251 a 300 VSMGDF ?'),
(412, 'SEGURIDAD SOCIAL', 'MODIFICACION SALARIOS', 'Conoce, que si se presentan mas de 5 avisos en la misma fecha, deberá hacerse mediante el dispositivo magnético, vía electrónica, óptica o de cualquier otra naturaleza aceptada por el Instituto ?'),
(413, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Conoce que independientemente de lo que dispone la Legislación Laboral, la Ley del Seguro Social, estable que se tiene la obligación de conservar dicha documentación durante 5 años y que deberán contener los requisitos legales establecidos ?'),
(414, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Conoce cuales son los requisitos mínimos legales que deben de contener la nómina y listas de raya ?, los cumple ? (Cotejar)'),
(415, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Nombre, denominación o razón social del patron'),
(416, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Número de registro patronal'),
(417, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Número del RFC del Patrón'),
(418, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Nombre del trabajador'),
(419, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Número de seguridad social'),
(420, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'RFC del trabajador'),
(421, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'CURP del trabajador'),
(422, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Lapso que comprende, así como la periodicidad del pago'),
(423, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Duración de la jornada de trabajo'),
(424, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Fecha de ingreso al trabajo'),
(425, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Tipo de salario que percibe (Fijo, Varible, Mixto)'),
(426, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Importe del salario y cada una de las percepciones devengadas por el trabajador'),
(427, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Cuotas IMSS retenidas'),
(428, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Importe total de los salarios y percepciones devengados'),
(429, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Retenciones y deducciones legales'),
(430, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Firma o huella digital de los trabajadores'),
(431, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Conoce que la importancia de señalar los días laborados en el recibo de nómina es esencial y se cumple con una obligación de hacer constar los dichos dias laborados por el trabajador ? Y que su incumplimiento puede ser sancionado con multas del 20 a 75 VSMGDF (IMSS) ?'),
(432, 'SEGURIDAD SOCIAL', 'LLEVAR Y CONSERVAR', 'Sabe que en caso de incumplimiento para conservar la documentación (NOMINAS y LISTAS DE RAYA)  puede ser objeto de multa de 20 a 75 VSMGDF,  además de la contingencia de no poder comprobar el haber efectuado efectivamente el gasto de sueldos y salarios para efectos de considerarse un gastos contable y fiscal ?'),
(433, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Conoce que se tiene que determinar y enterar las cuotas obrero patronales dentro de los 17 primeros días de cada mes ?'),
(434, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Conoce que se tiene que determinar y enterar las amortizaciones de crédito de los trabajadores, estos se deberán enterar bimestralmente dentro de los meses de Enero, Marzo, Mayo, Julio, Septiembre y Noviembre ?'),
(435, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', '* Conoce que dependiendo del número de trabajadores, el cumplimiento de pago será por medio magnético (SUA) ? Se tiene el programa o se hace por medio de internet ?'),
(436, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', '* Conoce que aplicando supletoriamente el Art. 12 del CFF, para efectos del pago, cuando dicho plazo (Dia 17) venza en día inhábil, sabado, domingo e incluso viernes, puede hacerse el pago en siguiente dia hábil ?'),
(437, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Conoce que si la determinación y entero en forma erronea o la omisión de las cuotas obrero patronales y aportaciones de vivienda según el Art. 119 Fracc. IV en correlación con el Art. 31 Fracc V segundo párrafo ambos de la LISR, los sueldos y salarios son no deducibles ?'),
(438, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Sabe que en caso de incumplimiento para determinar y enterar las cuotas obrero patronales  puede ser objeto de multa de 20 a 75 VSMGDF, y para Aportaciones de Vivienda, la multa es de 301 a 350 VSMGDF ?'),
(439, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Conoce que tiene la obligación de conservarse durante un plazo de 5 años para efectos de solventar en su caso, el requerimiento por parte de las autoridades fiscales, toda vez que se presumirá el incumplimiento de pago si no se exhibe ?'),
(440, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Conoce que aun y cuando no se haga el pago, se tiene la obligación de hacer la determinación de las cuotas obrero patronales ?, y que su inclumplimiento puede ser multado de 20 a 75 VSMGDF ?'),
(441, 'SEGURIDAD SOCIAL', 'DETERMINAR Y ENTRAR', 'Conoce que si el pago omitido es requerido por las Autoridades fiscales, implica el pago de las cuotas, mas actualización y recargos, y adicionalmente una sanción por omisión o cumplimiento extemporaneo con multa del 40% al 100% del concepto omitido, dependiendo de la naturaleza de la infracción ?'),
(442, 'SEGURIDAD SOCIAL', 'CAPITALES CONSTITUTIVOS', '* La empresa recientemente le ha sido determinado un \'Capital constitutivo\' por parte del IMSS y a quedado firme ?'),
(443, 'SEGURIDAD SOCIAL', 'CAPITALES CONSTITUTIVOS', '* Sabe que tiene 15 días hábiles siguientes para su pago a partir de que surta efectos su notificación ?'),
(444, 'SEGURIDAD SOCIAL', 'CAPITALES CONSTITUTIVOS', '* Conoce que la omisión del pago, se sanciona con multa del 40% al 100% del concepto omitido, dependiendo de la naturaleza de la infracción ?'),
(445, 'SEGURIDAD SOCIAL', 'INF IMSS INFONAVIT', '* Ha sido requerido alguna información por el IMSS e INFONAVIT, relativa a documentación contable, contratos de trabajo y de cualquier naturaleza que les permita verificar el adecuado cumplimiento de obligaciones ?'),
(446, 'SEGURIDAD SOCIAL', 'INF IMSS INFONAVIT', '* Se ha atendido ?, Se ha hecho con fundamento en el Art. 15 Fracc IV de la LSS o Art. 29 Fracc IV de la Ley de Infonavit ?'),
(447, 'SEGURIDAD SOCIAL', 'INF IMSS INFONAVIT', '* Si se ha hecho en base a derecho dichos requerimiento, conoce que la sanción por omisión o incumplimiento extemporáneo con lleva a una multa de 20 a 210 VSMGDF (IMSS) o de 251 a 300 VSMGDF (Infonavit) ?'),
(448, 'SEGURIDAD SOCIAL', 'INSPECCIONES Y VISITAS', '* Conoce la fundamentación legal al que se deben de apegar las autoridades tanto del IMSS como del INFONAVIT para efectos de poder llevar a cabo y desarrollar inspecciones o visitas domiciliarias ?'),
(449, 'SEGURIDAD SOCIAL', 'INSPECCIONES Y VISITAS', '* Conoce que supletoriamente, deben de apegarse obligatoriamente al procedimiento establecido en el Código Fiscal de la Federación ?,'),
(450, 'SEGURIDAD SOCIAL', 'INSPECCIONES Y VISITAS', '* Conoce que si el desarrollo en en base a derecho, dicha autoridad puede sancionar con multas por omisión, oposición o cumplimiento extemporaneo de hasta 20 a 125 VSMGDF (IMSS) o de 301 a 350 VSMGDF (INFONAVIT) ?'),
(451, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que se tiene un plazo de 24 horas siguientes a la fecha del siniestro si se sucitó en la empresa, o de que se tenga conocimiento del mismo, si ocurrió fuera del centro de trabajo, para comunicar al IMSS los riesgos de trabajo sufridos por sus trabajadores ?'),
(452, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que en caso de omisión o cumplimiento extemporáneo, se puede sancionar con multas de 20 a 350 VSMGDF ?'),
(453, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que la empresa, tiene la obligación de que durante todo el ejercicio debe de llevarse un registro pormenorizado y actualizado de los riesgos de trabajo sufridos por sus trabajadores ?'),
(454, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que en caso de omisión o cumplimiento extemporáneo, se puede sancionar con multas de 20 a 350 VSMGDF ?'),
(455, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce, ademas de que llevar dicho registro actualizado servirá de fuente de información para efectos de dictaminar la posible nueva prima de clase de riesgo del año entrante ?'),
(456, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que anualmente se tiene la obligación de revisar la siniestralidad ocurrida en la empresa ?'),
(457, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que durante el mes de febrero, mediante el formato Clem-22 \'Declaración Anual de la Prima de Riesgos de Trabajo\', se tiene la obligación de presentarse ante el IMSS ?'),
(458, 'SEGURIDAD SOCIAL', 'COMUNICAR AL IMSS', '* Conoce que en caso de omisión o cumplimiento extemporáneo, se puede sancionar con multas de 20 a 210 VSMGDF ?'),
(459, 'SEGURIDAD SOCIAL', 'OTROS', '* Conoce que se tiene la obligación de comunicar al IMSS cualquier cambio sobre la situación jurídica de la empresa ?, se ha hecho algun comunicado recientemente al IMSS al respecto ?'),
(460, 'SEGURIDAD SOCIAL', 'OTROS', '* Que tiene un plazo de 5 días hábiles contados a partir de que ocurra el hecho ?, Que se tiene que utilizar el formato AFIL-01 o en su defecto escrito libre ?'),
(461, 'SEGURIDAD SOCIAL', 'OTROS', '* Que la sanción por omisión o cumplimiento extemporáneo en materia del IMSS puede ser con multas de 20 a 75 SMGDF o de 251 o 300 VSMGDF por el INFONAVIT ?'),
(462, 'SEGURIDAD SOCIAL', 'OTROS', '* Conoce que en caso de \'Estallamiento de Huelga y su Terminación\', se tiene la obligación de avisar al IMSS el hecho ?'),
(463, 'SEGURIDAD SOCIAL', 'OTROS', '* Que tiene un plazo de 8 días hábiles contados a partir de que ocurra el hecho para hacerlo ?, '),
(464, 'SEGURIDAD SOCIAL', 'OTROS', '* Que la sanción por omisión o cumplimiento extemporáneo en materia del IMSS puede ser con multas de 20 a 125 SMGDF o de 251 a 300 VSMGDF por el INFONAVIT ?'),
(465, 'SEGURIDAD SOCIAL', 'OTROS', '* Conoce que se tiene la obligación de comunicar al trabajador en forma bimestral sobre las aportaciones del SAR hechas a su favor ? (Proporcionar copia de comunicación)'),
(466, 'SEGURIDAD SOCIAL', 'OTROS', '* Conoce que la entrega en bimestral y puede hacerse por medio de la impresión de la cédula generada por el SUA ?'),
(467, 'SEGURIDAD SOCIAL', 'OTROS', '* Conoce que en caso de omisión o cumplimiento extemporáneo, se puede sancionar con multas de 20 a 75 VSMGDF ?'),
(468, 'SEGURIDAD SOCIAL', 'PRESENTACION DICTAMEN', '* Conoce que atendiendo al número de trabajadores que se tenga, existe la obligación de dictamar las cuotas obrero patronales enteradas por la empresa, a traves de CPR con registro ante el IMSS ?'),
(469, 'SEGURIDAD SOCIAL', 'PRESENTACION DICTAMEN', '* Que con base al nuevo reglamento vigente (RLSSACERF), se tiene a mas tardar el 30 de septiembre siguiente al ejercicio fiscal inmediato anterior para efectos del IMSS ?'),
(470, 'SEGURIDAD SOCIAL', 'PRESENTACION DICTAMEN', '* Que se tiene a mas tardar dentro de los 6 meses siguientes contados a partir de la fecha de presentación del aviso para efectos del INFONAVIT ?'),
(471, 'SEGURIDAD SOCIAL', 'PRESENTACION DICTAMEN', '* Que para efectos de que sea recepcionado el dictamen en materia de cuotas obrero patronales, las diferencias determinadas por el CPR, deben de estar presentadas, liquidadas y anexarse al cuerpo del dictamen ?'),
(472, 'SEGURIDAD SOCIAL', 'PRESENTACION DICTAMEN', '* Que si no se tiene la obligación de dictaminarse, se puede optar por dictaminar las cuotas obrero patronales a traves de CPR con registro ante el Instituto ?'),
(473, 'SEGURIDAD SOCIAL', 'PRESENTACION DICTAMEN', '* Que en caso de omisión o cumplimiento extemporáneo en materia de IMSS, se puede sancionar con multa de 20 a 75 VSMGDF (Optativos) y de 20 a 350 VSMGDF (Obligadas) ?'),
(474, 'SEGURIDAD SOCIAL', 'CONSIDERACION', '* Están alimentadas correctamente los parametros en materia de porcentajes vigentes de las ramas de seguro para el IMSS, SAR e INFONAVIT ? (Verificar y hacer muestreos)'),
(475, 'SEGURIDAD SOCIAL', 'CONSIDERACION', '* Las cuotas obrero de trabajadores con percepciones de mas de 1 SMG, son absorbidas por la empresa ?'),
(476, 'LEGAL', 'GENERAL', '* A que camara pertece, esta vigente su afiliación ?'),
(477, 'LEGAL', 'GENERAL', '* Está inscrito ante el SIEM ?,  tiene que inscribirse dentro de los dos meses a la constitución y actualizar la información proporcionada dentro del primer bimestre de cada año ? (Proporcionar refrendo)'),
(478, 'LEGAL', 'GENERAL', '* Tiene la Licencia de funcionamiento estatal actualizada ? (Proporcionar)'),
(479, 'LEGAL', 'GENERAL', '* Tiene la Licencia de funcionamiento municipal actualizada ? (Proporcionar)'),
(480, 'LEGAL', 'GENERAL', '* Tiene en su caso, la Licencia de salubridad vigente ? (Proporcionar)'),
(481, 'LEGAL', 'GENERAL', '* Tiene la Tarjeta de salud del personal, debidamente actualizada ? (De alimentos renovación Semestral) (Realizar muestreo)'),
(482, 'LEGAL', 'GENERAL', '* Exhibir Aviso de Inscripción al RFC (Proporcionar)'),
(483, 'LEGAL', 'GENERAL', '* Exhibir Cedula de Identificación Fiscal, así como la constancia de Inscripción '),
(484, 'LEGAL', 'GENERAL', '* La empresa ha realizado algun cambio de domicilio fiscal federal ?, A efectuado los cambios inherentes al mismo, como puede ser: Cambio de dicho domicilio en las facturas, En la documentación comprobatoria de Adquisición de Bienes, Inversiones o Gastos, etc. ?'),
(485, 'LEGAL', 'GENERAL', '* La empresa que ha presentado cambio de domicilio fiscal ante el RFC, tambien ha efectuado los movimientos correspondientes ante IMSS, INFONAVIT, Secretaria de Hacienda del Estado y Otras dependencias ? (Exhibir comprobantes)'),
(486, 'LEGAL', 'GENERAL', '* La empresa, durante el ejercicio ha presentado alguna Apertura del establecimiento, Sucursal, Bodega ante el RFC. ?'),
(487, 'LEGAL', 'GENERAL', '* La empresa, se ha asegurado que cada uno de los socios o accionistas que la integran, estén registrado ante la SHCP (SAT), al menos con la obligación de \'Socios o accionistas\' ? (Exhibir constancias de socios)'),
(488, 'LEGAL', 'GENERAL', '* La empresa, tiene socios o accionistas extranjeros ?, Se ha presentado el Aviso de socios extranjeros ante la ALAC ?,  (Art. 27  CFF)'),
(489, 'LEGAL', 'GENERAL', '*Sabe que tiene como plazo los 3 primeros meses para presentar dicho aviso ?, Que se debe mencionar Domicilio, Residencia Fiscal y número de identificación ? (Proporcionar aviso)'),
(490, 'LEGAL', 'GENERAL', '* Durante el ejercicio, la empresa ha presentado Aviso de aumento y disminución de obligaciones fiscales ?, Por que obligaciones en especifico y el motivo que lo origino. (Exhibir)'),
(491, 'LEGAL', 'GENERAL', '*Tienen debidamente elaborados, firmados y archivados en el expediente personal que corresponda cada uno de los \'Contrato individual del trabajador\' ?, Estan Actualizados ? (Realizar muestreo)'),
(492, 'LEGAL', 'GENERAL', '* Dentro de la empresa, se tiene algún Reglamento interior de trabajo ?, Está aplicándose actualmente ?, Se exhibe en algún sitio público para conocimiento general ?, Como se le hace del conocimiento al empleado ?'),
(493, 'LEGAL', 'GENERAL', '* Conoce que se tiene la obligación de celebrar asamblea general ordinaria de accionistas ? (Art. 181 LSGM)'),
(494, 'LEGAL', 'GENERAL', '* Conoce que tiene como plazo del 1o de enero al 30 de abril de cada año para llevarla a cabo ?, (Proporcionar la última acta celebrada)'),
(495, 'LEGAL', 'GENERAL', '* Conoce que tiene la obligación de discutir los siguientes puntos como mínimo:'),
(496, 'LEGAL', 'GENERAL', 'a).- Discutir, aprobar o modificar el informe anual de los administradores'),
(497, 'LEGAL', 'GENERAL', 'b).- Nombrar el administrador o consejo de administración y a los comisarios'),
(498, 'LEGAL', 'GENERAL', 'c).- Determinar los emolumentos correspondientes a los administradores y comisarios cuando no hayan sido fijados en los estatutos ?'),
(499, 'LEGAL', 'GENERAL', 'd).- Dar a conocer en la Asamblea General Ordinaria de Accionistas un reporte sobre el cumplimiento de las obligaciones fiscales del ejercicio al que corresponde la Asamblea.'),
(500, 'LEGAL', 'GENERAL', '* Conoce que las sociedades anonimas, bajo la responsabilidad de su administrador deben de presentar en la asamblea general ordinaria de accionistas, un \'informe  del administrador sobre la marcha de la empresa\' ? (Art. 172 LGSM) (Exhibir último informe presentado)'),
(501, 'LEGAL', 'GENERAL', '* Conoce que dentro de las facultades y obligaciones de los comisarios, está la de rendir a la asamblea general ordinaria de accionistas un \'dictamen e informe\' respecto a la veracidad, suficiencia y razonabilidad de la información presentada por el consejo de administración ? (Art. 166 Fracción IV LGSM) (Exhibir último informe presentado)'),
(502, 'LEGAL', 'GENERAL', '* Conoce que los estados financieros de la compañía, las notas y dictamen del comisiario, se tienen que \'publicar en el periodico oficial de la entidad\' ? (Art. 177 LGSM), (Proporcionar última publicación realizada)'),
(503, 'LEGAL', 'GENERAL', '* Conoce que se tiene un plazo de 15 días para su publicación después de aprobado el informe anual por la Asamblea General de Accionistas ?, y que es el supuesto de tener oficinas o dependencias en varias entidades, dicha publicación debe de hacerse en el D.O.F. ?, se ha respetado el plazo en el supuesto de haberse publicado ? (Cotejar)'),
(504, 'LEGAL', 'GENERAL', '* Conoce que en el supuesto de tener utilidades netas contables, anualmente se tiene la obligación de hacer la separación de la reserva legal ?  (Art. 20 LGSM)'),
(505, 'LEGAL', 'GENERAL', '* Conoce anualmente, se tiene la obligación de hacer la separación de la reserva legal ?, que consiste en separar el 5% como mínimo, para formar el fondo hasta que importe la quinta parte (20%) del capital social ?, y que en caso de disminución por cualquier motivo, éste tiene que ser reconstruido ? (Proporcionar datos de los últimos 3 años)'),
(506, 'LEGAL', 'GENERAL', '* De acuerdo al Art. 194 de la LGSM, se tiene debidamente actualizado el \'Libro de Actas\' en las que estén debidamente plasmadas cada una de las actas de las asambleas generales de accionistas ?, Constan debidamente plasmadas las firmas del Presidente, del secretario de la asamblea así como del comisario respectivo ? (Exhibir libro)'),
(507, 'LEGAL', 'GENERAL', '* De acuerdo al Art. 128 de la LGSM, se tiene debidamente actualizado el \'Libro de registro de acciones\', se identifican por nombre, nacionalidad, domicilio, número de acciones suscritas, acciones pagadas, importe aportado, tipo de acción, serie, clase, transmisión que de estas se haga, ? (Exhibir libro)'),
(508, 'LEGAL', 'GENERAL', '* La sociedad es de \'Capital Variable ?, De acuerdo al Art. 219 de la LGSM, se tiene debidamente actualizado el \'Libro de variaciones en el capital social\' y en el cual se registren todo aumento o disminución al mismo ?(Exhibir libro)'),
(509, 'LEGAL', 'GENERAL', '* La empresa actualmente que tipo de contrato maneja, podrian citarse y en su caso proporcionar para su estudio ?'),
(510, 'LEGAL', 'GENERAL', '* Contrato a consignación'),
(511, 'LEGAL', 'GENERAL', '* Contrato de Arrendamiento'),
(512, 'LEGAL', 'GENERAL', '* Contrato de Arrendamiento para local comercial'),
(513, 'LEGAL', 'GENERAL', '* Contrato de Subarrendamiento de bienes'),
(514, 'LEGAL', 'GENERAL', '* Contrato de Asociación en Participación de Inmuebles'),
(515, 'LEGAL', 'GENERAL', '* Contrato de Asociación en Participación de Servicios'),
(516, 'LEGAL', 'GENERAL', '* Contrato de Cesión de Derechos'),
(517, 'LEGAL', 'GENERAL', '* Contrato de Comisión Mercantil'),
(518, 'LEGAL', 'GENERAL', '* Contrato de Comodato'),
(519, 'LEGAL', 'GENERAL', '* Contrato de Compra Venta Mercantil'),
(520, 'LEGAL', 'GENERAL', '* Contrato de Donación de Acciones'),
(521, 'LEGAL', 'GENERAL', '* Contrato de Mutuo con Interés'),
(522, 'LEGAL', 'GENERAL', '* Contrato de Mutuo con Interés y Garantía Hipotecaria'),
(523, 'LEGAL', 'GENERAL', '* Contrato de Prenda Mercantil'),
(524, 'LEGAL', 'GENERAL', '* Contrato de Prestación de Servicios Profesionales'),
(525, 'LEGAL', 'GENERAL', '* Contrato de Prestación de Servicios Administrativos'),
(526, 'LEGAL', 'GENERAL', '* Contrato de Préstamo Mercantil con Garantía'),
(527, 'LEGAL', 'GENERAL', '* Contrato de Manejo de Inventarios de Terceros'),
(528, 'LEGAL', 'GENERAL', '* Contrato de Manejo por terceros de Inventarios Nuestros'),
(529, 'LEGAL', 'GENERAL', '* Otros (Mencionar)'),
(530, 'LEGAL', 'GENERAL', '* La empresa, es sociedad mexicana en la que participa la inversión extranjera, mexicanos que posean o adquieran otra nacionalidad y tengan su domicilio fuera del territorio nacional o tengan inversión neutra (Ley de inversión extranjera) ?, Tiene su constancia de Inscripción al Registro Nacional de Inversiones Extranjeras ? (Exhibir constancia)'),
(531, 'LEGAL', 'GENERAL', '* En el supuesto anterior, conoce de que debe \'renovar su constancia de inscripción al Registro Nacional de Inversiones Extranjeras\' en form anual ?'),
(532, 'LEGAL', 'GENERAL', '* En el supuesto anterior, conoce de que tiene la obligación de \'presentar informes trimestrales de inversión extranjera\' ? (Art. 38 Fracc II RLIE y RNIE) (Exhibir Informe)'),
(533, 'LEGAL', 'GENERAL', '* En el supuesto anterior, conoce que tiene un plazo dentro de los 20 días hábiles siguientes al cierre de cada trimestre, para presentar el citado informe ?, Citar datos por nuevas aportaciones, retención de utilidades, disposición de utilidades retenidas, préstamos por pagar o cobrar a subsidiarias residentes en el extranjero, Etc. ?'),
(534, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada alguna Patente o Invención de acuerdo al Art. 23 LPI ?, Sabe que tiene una vigencia de 20 años improrrogables, contada a partir de la fecha de presentación de la solicitud de registro de la invención ?'),
(535, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada algún Modelo de Utilidad de acuerdo al Art. 27 LPI ?, Sabe que tiene una vigencia de 10 años improrrogables, contada a partir de la fecha de presentación de la solicitud de registro del modelo ?'),
(536, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada algún Diseño Industrial de acuerdo al Art. 36 LPI ?, Sabe que tiene una vigencia de 15 años improrrogables, contada a partir de la fecha de presentación de la solicitud de registro del diseño ?'),
(537, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada algún \'Marca\' de acuerdo al Art. 95 LPI ?, Sabe que tiene una vigencia de 10 años, contada a partir de la fecha de presentación de la solicitud de registro de la marca, y que puede renovarse por períodos de la misma duración ?'),
(538, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada algún \'Aviso Comercial\' de acuerdo al Art. 103 LPI ?, Sabe que tiene una vigencia de 10 años, contada a partir de la fecha de presentación de la solicitud de registro del aviso, y que puede renovarse por períodos de la misma duración ?'),
(539, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada algún \'Nombre Comercial\' de acuerdo al Art. 110 LPI ?, Sabe que tiene una vigencia de 10 años, contada a partir de la fecha de presentación de la solicitud de registro del nombre, y que puede renovarse por períodos de la misma duración ?'),
(540, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada alguna \'Denominación de Origen\' de acuerdo al Art. 165 LPI ?, Sabe la subsistencia se dará, en tanto las condiciones que la motivaron se mantenga y sólo dejará de surtir efectos por otra declaración del IMPI ?'),
(541, 'LEGAL', 'GENERAL', '* La empresa, tiene registrada algun \'Derecho Reservado por Títulos de Publicaciones o Difusiones Periódicas\' de acuerdo al Art. 189 LFDA ?, Sabe la subsistencia se dará, en tanto las condiciones que la motivaron se mantenga y sólo dejará de surtir efectos por otra declaración del IMPI ?, Que será renovable en forma Anual ?'),
(542, 'LEGAL', 'GENERAL', '* La empresa, opera directamente alguna concesión de \'Autotransporte Federal\'  ?, la renovación de Licencia Federal de los conductores están vigentes ?, Sabe que tienen una vigencia de 10 años y que tienen que refrendarse cada 2 ?'),
(545, 'CONTABLE', 'BANCOS', '¿Se tienen conciliadas las cuentas con bancos e inversiones depuradas?'),
(546, 'CONTABLE', 'BANCOS', 'Clientes.- ¿tienen arqueos y resumen de antiguedad de saldos conciliados con registros?'),
(547, 'CONTABLE', 'BANCOS', 'Otros activos.- ¿tienen integración y fecha de origen. Lo integran gastos pagados por anticipado, y depósitos en garantía. Amarre a resultados?'),
(548, 'CONTABLE', 'BANCOS', 'Impuestos anticipados.- ¿esta integrado y depurado su saldo y conciliado con los impuestos pagados?'),
(549, 'CONTABLE', 'BANCOS', 'Impuesto al valor agregado acreditable.- ¿conciliado separado el de compras de importación?'),
(550, 'CONTABLE', 'BANCOS', 'Compañias afiliadas e intercompañias cuenta por cobrar.- ¿conciliada, se tiene acumulado el monto de operaciones celebradas con partes relacionadas?'),
(551, 'CONTABLE', 'BANCOS', 'Activos fijos.- ¿esta el archivo con las facturas originales por la compra de activos fijos?'),
(552, 'CONTABLE', 'BANCOS', 'Depreciacion contable.- ¿esta registrada contablemente en base al calculo , tanto del ejerc. Como acumulada. Se tiene el amarre a resultados?'),
(553, 'CONTABLE', 'BANCOS', 'Gastos de instalacion y cargos diferidos.- ¿estan integrados?'),
(554, 'CONTABLE', 'BANCOS', 'Amortización acumulada.- ¿esta conciliada con el calculo contable se tiene el amarre a resultados?'),
(555, 'CONTABLE', 'BANCOS', 'Proveedores.- ¿esta depurada la cuenta y con saldos recientes?'),
(556, 'CONTABLE', 'BANCOS', 'Acreedores diversos.- ¿esta depurada la cuenta y con saldos recientes?'),
(557, 'CONTABLE', 'BANCOS', 'Préstamo bancario e interés.- integración (nac. y ext.) Capital e interés. Se tienen amarrados los intereses contra resultados?'),
(558, 'CONTABLE', 'BANCOS', 'Intereses por pagar.- ¿se tienen los papeles de trabajo de los cálculos fiscales actualizados con amarre según registros contables?'),
(559, 'CONTABLE', 'BANCOS', 'Impuestos por pagar.- ¿esta integrado y depurado su saldo, se tiene amarres a resultados y reconocidos los pasivos suficientes?'),
(560, 'CONTABLE', 'BANCOS', 'Compañias afiliadas e intercompañias cuenta por pagar.- ¿conciliada?'),
(561, 'CONTABLE', 'BANCOS', 'Otras cuentas por pagar.- ¿tienen su integración y fecha de origen?'),
(562, 'CONTABLE', 'BANCOS', 'Capital social.- ¿esta integrado con acta constitutiva y actas compl. Identificado por fecha de aportaciones y/o capitalización?'),
(563, 'CONTABLE', 'BANCOS', 'Reserva legal.- ¿se ha incrementado con el 5% la utilidad neta del año hasta el tope del 20% del capital social se tiene identificada por fecha de constitución?'),
(564, 'CONTABLE', 'BANCOS', 'Utilidades acumuladas.- ¿están integradas por año de origen?'),
(565, 'CONTABLE', 'BANCOS', 'Otras cuentas complementarias de capital.- ¿tiene soporte su origen y aplicación?'),
(566, 'CONTABLE', 'BANCOS', 'Ventas y/o ingresos.- ¿validados con la emisión de CFDIS del mes con publico en general y personalizada al contribuyente, ademas llevar el archivo consecutivo fiscal de facturas, notas de cargo y notas de crédito?'),
(567, 'CONTABLE', 'BANCOS', '¿Se hace una facturación global por las ventas diarias con el público en general?,¿Se expiden CFDIS por dichas ventas?'),
(568, 'CONTABLE', 'BANCOS', 'Que programa contable, tesorería, nomina, inventarios, cuentas por pagar, por cobrar, facturación, etc. Maneja la cia.?,¿Están vinculados para trabajar en modulos? '),
(569, 'CONTABLE', 'BANCOS', 'En el supuesto de alguna contingencia (eléctrica, virus, accidente o siniestro, etc.),¿se cuenta con un respaldo de toda la información?'),
(570, 'CONTABLE', 'BANCOS', '¿Esta cerrada la balanza de comprobación definitiva del ejercicio inmediato anterior ?,¿amarra con cifras dictaminadas? (en caso de ser dictaminada)'),
(571, 'CONTABLE', 'BANCOS', '¿Se cuenta con registros contable en cuentas de orden de los cálculos para efectos fiscales?'),
(573, 'CONTABLE', 'CAJA CHICA', '¿Arqueos de caja?'),
(574, 'CONTABLE', 'CAJA CHICA', '¿Resguardos actualizados?'),
(575, 'CONTABLE', 'BANCOS', 'Libros diario, mayor y auxiliares.- ¿se maneja un sistema electrónico para el registro de las operaciones contables?,¿Están debidamente empastados?, ¿Resguardados? (Verificar) '),
(576, 'CONTABLE', 'BANCOS', '¿Se tiene la  integración  de las cuentas de aportación de capital?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(4) NOT NULL,
  `id_pregunta` int(4) NOT NULL,
  `respuesta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones`
--

CREATE TABLE `sessiones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `direccionIP` text,
  `expira` varchar(20) NOT NULL,
  `ultimaSession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sessiones`
--

INSERT INTO `sessiones` (`id`, `usuario_id`, `token`, `direccionIP`, `expira`, `ultimaSession`) VALUES
(72, 1, 'ac0f3ac71058ce82ff6154bd', '::1', '1531895925', 'Martes 17 de Julio 2018 10:09:23 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(15) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `roll` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `telefono`, `clave`, `roll`) VALUES
(1, 'ISAAC', 'MONTIEL', 'isaac.montiels@hotmail.com', 2147483646, '123456789', 0),
(2, 'salvador', 'miron', 'masterchif57@gmail.com', 2147483647, '123456789', 1),
(3, 'dante', 'auditore', 'strokescode@gmail.com', 2147483647, '123456789', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_categorias_preguntas`
--
ALTER TABLE `cat_categorias_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_input_preguntas`
--
ALTER TABLE `cat_input_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_secciones_preguntas`
--
ALTER TABLE `cat_secciones_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_preguntas`
--
ALTER TABLE `detalles_preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rfc`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessiones`
--
ALTER TABLE `sessiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_categorias_preguntas`
--
ALTER TABLE `cat_categorias_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cat_input_preguntas`
--
ALTER TABLE `cat_input_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cat_secciones_preguntas`
--
ALTER TABLE `cat_secciones_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=587;

--
-- AUTO_INCREMENT de la tabla `sessiones`
--
ALTER TABLE `sessiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
