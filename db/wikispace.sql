-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2022 a las 19:04:42
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wikispace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `commentdate` datetime NOT NULL,
  `creatoruser` int(4) NOT NULL,
  `editoruser` int(4) DEFAULT NULL,
  `idnew` int(4) DEFAULT NULL,
  `idevent` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `title`, `text`, `commentdate`, `creatoruser`, `editoruser`, `idnew`, `idevent`) VALUES
(7, 'Hola', 'hola', '2021-06-16 01:25:31', 8, NULL, NULL, 1),
(8, 'holii', 'hl', '2021-06-16 01:27:14', 8, NULL, NULL, 1),
(9, 'Cometa Halley', '¡Qué pasada!', '2021-06-16 02:05:33', 6, NULL, NULL, 2),
(18, 'esto es una prueba', 'deun pedazo de comentario', '2021-07-30 05:01:22', 9, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editevent`
--

CREATE TABLE `editevent` (
  `ideditevent` int(4) NOT NULL,
  `idevent` int(4) NOT NULL,
  `iduser` int(4) NOT NULL,
  `editdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editevent`
--

INSERT INTO `editevent` (`ideditevent`, `idevent`, `iduser`, `editdate`) VALUES
(4, 2, 7, '2021-06-16 04:08:21'),
(5, 2, 7, '2021-06-16 04:08:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editnew`
--

CREATE TABLE `editnew` (
  `ideditnew` int(4) NOT NULL,
  `idnew` int(4) NOT NULL,
  `iduser` int(4) NOT NULL,
  `editdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `idevent` int(4) NOT NULL,
  `idpublisher` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `publishmentdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`idevent`, `idpublisher`, `title`, `content`, `publishmentdate`) VALUES
(1, 7, '¡Avistamiento de una nueva estrella!', 'Ah no, que es nuestra profesora María Jesús :D', '2021-05-03 00:00:00'),
(2, 6, 'Cometa Halley vuelve a pasar mañana', 'El cometa Halley ha pasado hoy a tan solo 2700 kilómetros de la tierra, como ya sabemos, cada año se acerca un poco más ¿Podría llegar a ser peligroso? Pues nunca lo sabremos', '2021-06-16 16:05:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new`
--

CREATE TABLE `new` (
  `idnew` int(4) NOT NULL,
  `idpublisher` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `publishmentdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`idnew`, `idpublisher`, `title`, `content`, `publishmentdate`) VALUES
(3, 7, 'Plutón, ¿Planeta enano,puede ser, hoy si?', 'A partir de ahora, Plutón dejará de ser considerado un planeta principal del sistema solar y pasará a ser considerado un planeta enano.', '2021-06-16 17:48:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetosastronomicos`
--

CREATE TABLE `objetosastronomicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nombreFrances` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `objetosastronomicos`
--

INSERT INTO `objetosastronomicos` (`id`, `nombre`, `nombreFrances`) VALUES
(529, 'Luna', 'lune'),
(530, 'phobos', 'phobos'),
(531, 'Deimos', 'deimos'),
(532, 'io', 'io'),
(533, 'Europa', 'europe'),
(534, 'ganymede', 'ganymede'),
(535, 'callisto', 'callisto'),
(536, 'Amalthée', 'amalthee'),
(537, 'Himalia', 'himalia'),
(538, 'elara', 'elara'),
(539, 'pasiphae', 'pasiphae'),
(540, 'sinope', 'sinope'),
(541, 'Lysithea', 'lysithea'),
(542, 'carmelita', 'carme'),
(543, 'ananke', 'ananke'),
(544, 'leda', 'leda'),
(545, 'el ser', 'thebe'),
(546, 'Adrastea', 'adrastee'),
(547, 'Metis', 'metis'),
(548, 'Callirrhoe', 'callirrhoe'),
(549, 'Themisto', 'themisto'),
(550, 'megaclite', 'megaclite'),
(551, 'Táigete', 'taygete'),
(552, 'Caldona', 'chaldene'),
(553, 'harpálice', 'harpalyke'),
(554, 'kalyke', 'kalyke'),
(555, 'Yocasta', 'iocaste'),
(556, 'erínome', 'erinome'),
(557, 'isonoe', 'isonoe'),
(558, 'praxidike', 'praxidike'),
(559, 'Autónoe', 'autonoe'),
(560, 'Thyone', 'thyone'),
(561, 'Hermipo', 'hermippe'),
(562, 'aitné', 'aitne'),
(563, 'Eurídome', 'eurydome'),
(564, 'Euanthe', 'euanthe'),
(565, 'Euporie', 'euporie'),
(566, 'ortosia', 'orthosie'),
(567, 'Sponde', 'sponde'),
(568, 'mantener', 'cale'),
(569, 'Pasithea', 'pasithee'),
(570, 'Hegemone', 'hegemone'),
(571, 'mneme', 'mneme'),
(572, 'Aoede', 'aoede'),
(573, 'thelxinoe', 'thelxinoe'),
(574, 'arca', 'arche'),
(575, 'kallichore', 'callichore'),
(576, 'hélice', 'helice'),
(577, 'carpo', 'carpo'),
(578, 'eukélade', 'eukelade'),
(579, 'Cilene', 'cyllene'),
(580, 'centro', 'core'),
(581, 'grada', 'herse'),
(582, 's2003j2', 's2003j2'),
(583, 'Eupheme', 'eupheme'),
(584, 's2003j4', 's2003j4'),
(585, 'eirene', 'eirene'),
(586, 's2003j9', 's2003j9'),
(587, 's2003j10', 's2003j10'),
(588, 's2003j12', 's2003j12'),
(589, 'filofrósine', 'philophrosyne'),
(590, 's2003j16', 's2003j16'),
(591, 's2003j18', 's2003j18'),
(592, 's2003j19', 's2003j19'),
(593, 's2003j23', 's2003j23'),
(594, 'mimas', 'mimas'),
(595, 'Enkelados', 'encelade'),
(596, 'tethys', 'tethys'),
(597, 'diona', 'dione'),
(598, 'ñandú', 'rhea'),
(599, 'Titán', 'titan'),
(600, 'Hyperion', 'hyperion'),
(601, 'iapetus', 'japet'),
(602, 'Phoebe', 'phoebe'),
(603, 'Janus', 'janus'),
(604, 'Epimeteo', 'epimethee'),
(605, 'Helene', 'helene'),
(606, 'Telesto', 'telesto'),
(607, 'Calipso', 'calypso'),
(608, 'atlas', 'atlas'),
(609, 'Prometeo', 'promethee'),
(610, 'Pandora', 'pandore'),
(611, 'pliegue', 'pan'),
(612, 'ymir', 'ymir'),
(613, 'Paaliaq', 'paaliaq'),
(614, 'Tarvos', 'tarvos'),
(615, 'ijiraq', 'ijiraq'),
(616, 'suttungr', 'suttungr'),
(617, 'Kiviuq', 'kiviuq'),
(618, 'Mundilfari', 'mundilfari'),
(619, 'Albiorix', 'albiorix'),
(620, 'Skathi', 'skathi'),
(621, 'erriapo', 'erriapo'),
(622, 'Siarnaq', 'siarnaq'),
(623, 'Þrymr', 'thrymr'),
(624, 'Narvi', 'narvi'),
(625, 'Metona', 'methone'),
(626, 'Palene', 'pallene'),
(627, 'Pólux', 'pollux'),
(628, 'daphnis', 'daphnis'),
(629, 'aegir', 'aegir'),
(630, 'bebhionn', 'bebhionn'),
(631, 'Bergelmir', 'bergelmir'),
(632, 'Bestla', 'bestla'),
(633, 'Farbauti', 'farbauti'),
(634, 'Fenrir', 'fenrir'),
(635, 'Fornjot', 'fornjot'),
(636, 'hati', 'hati'),
(637, 'Hyrrokkin', 'hyrrokkin'),
(638, 'Kari', 'kari'),
(639, 'caja', 'loge'),
(640, 'skoll', 'skoll'),
(641, 'Surtur', 'surtur'),
(642, 'anthe', 'anthe'),
(643, 'Jarnsaxa', 'jarnsaxa'),
(644, 'Greip', 'greip'),
(645, 'tarqeq', 'tarqeq'),
(646, 'Egeon', 'egeon'),
(647, 's2004s7', 's2004s7'),
(648, 's2004s12', 's2004s12'),
(649, 's2004s13', 's2004s13'),
(650, 's2004s17', 's2004s17'),
(651, 's2006s1', 's2006s1'),
(652, 's2006s3', 's2006s3'),
(653, 's2007s2', 's2007s2'),
(654, 's2007s3', 's2007s3'),
(655, 's2009s1', 's2009s1'),
(656, 'Ariel', 'ariel'),
(657, 'umbriel', 'umbriel'),
(658, 'óxido de titanio', 'titania'),
(659, 'Oberon', 'oberon'),
(660, 'miranda', 'miranda'),
(661, 'Cordelia', 'cordelia'),
(662, 'ofelia', 'ophelia'),
(663, 'bianca', 'bianca'),
(664, 'Cressida', 'cressida'),
(665, 'desdemona', 'desdemona'),
(666, 'juliet', 'juliet'),
(667, 'portia', 'portia'),
(668, 'rosalind', 'rosalind'),
(669, 'belinda', 'belinda'),
(670, 'disco', 'puck'),
(671, 'monstruo', 'caliban'),
(672, 'Sycorax', 'sycorax'),
(673, 'Prospero', 'prospero'),
(674, 'Setebos', 'setebos'),
(675, 'stephano', 'stephano'),
(676, 'Trínculo', 'trinculo'),
(677, 'Francisco', 'francisco'),
(678, 'Margaret', 'margaret'),
(679, 'Ferdinand', 'ferdinand'),
(680, 'perdita', 'perdita'),
(681, 'MAB', 'mab'),
(682, 'Cupido', 'cupid'),
(683, 'tritón', 'triton'),
(684, 'nereida', 'nereide'),
(685, 'náyade', 'naiade'),
(686, 'Thalassa', 'thalassa'),
(687, 'despina', 'despina'),
(688, 'GALATEE', 'galatee'),
(689, 'Larissa', 'larissa'),
(690, 'ProTee', 'protee'),
(691, 'Halimede', 'halimede'),
(692, 'Psámate', 'psamathee'),
(693, 'Sao', 'sao'),
(694, 'laomedeia', 'laomedie'),
(695, 'neso', 'neso'),
(696, 'charon', 'charon'),
(697, 'nada', 'nix'),
(698, 'hidra', 'hydra'),
(699, 'Namaka', 'namaka'),
(700, 'Hiiaka', 'hiiaka'),
(701, 'Norte Riffleshell', 'dysnomie'),
(702, 'Dia', 'dia'),
(703, 's2004s3', 's2004s3'),
(704, 's2004s4', 's2004s4'),
(705, 's2004s6', 's2004s6'),
(706, 's2010j1', 's2010j1'),
(707, 's2010j2', 's2010j2'),
(708, 'Ceres', 'ceres'),
(709, 'Hebe', 'hebe'),
(710, 'Lempo', 'lempo'),
(711, 'Principito', 'petitprince'),
(712, 'Pulcova', 'pulcova'),
(713, 'Toutatis', 'toutatis'),
(714, 'Quaoar', 'quaoar'),
(715, 'steins', 'steins'),
(716, 'eris', 'eris'),
(717, 'Astrée', 'astree'),
(718, 'Pholus', 'pholus'),
(719, 'Castalia', 'castalia'),
(720, 'Remus', 'remus'),
(721, 'Héctor', 'hector'),
(722, 'kleopatra', 'kleopatra'),
(723, 'Cruithne', 'cruithne'),
(724, 'Junon', 'junon'),
(725, 'hygeia', 'hygie'),
(726, 'Lutetia', 'lutetia'),
(727, 'Mathilde', 'mathilde'),
(728, 'Urano', 'uranus'),
(729, 'iris', 'iris'),
(730, 'Eros', 'eros'),
(731, 'vanth', 'vanth'),
(732, 'sedna', 'sedna'),
(733, 'Chariklo', 'chariklo'),
(734, 'sylvia', 'sylvia'),
(735, 'dáctilo', 'dactyl'),
(736, 'orcus', 'orcus'),
(737, 'Plutón', 'pluton'),
(738, 'Damocles', 'damocles'),
(739, 'Rómulo', 'romulus'),
(740, 'alexhelios', 'alexhelios'),
(741, 'cleoselene', 'cleoselene'),
(742, 'flora', 'flore'),
(743, 'Chiron', 'chiron'),
(744, 'Eureka', 'eureka'),
(745, 'Achille', 'achille'),
(746, 'Weywot', 'weywot'),
(747, 'ixion', 'ixion'),
(748, 'Neptuno', 'neptune'),
(749, 'SL9', 'sl9'),
(750, '9metis', '9metis'),
(751, 'Haumea', 'haumea'),
(752, 'nessus', 'nessus'),
(753, 'Itokawa', 'itokawa'),
(754, 'Hylonome', 'hylonome'),
(755, 'Eugenia', 'eugenia'),
(756, '2006SQ372', '2006SQ372'),
(757, 'Palas', 'pallas'),
(758, 'Asbolo', 'asbolus'),
(759, 'varuna', 'varuna'),
(760, 'Vesta', 'vesta'),
(761, 'ida', 'ida'),
(762, 'Hyakutake', 'hyakutake'),
(763, 'Gaspra', 'gaspra'),
(764, 'Albión', 'albion'),
(765, 'makemake', 'makemake'),
(766, 'Halley', 'halley'),
(767, 'Júpiter', 'jupiter'),
(768, 'marzo', 'mars'),
(769, 'mercurio', 'mercure'),
(770, 'Saturno', 'saturne'),
(771, 'sol', 'soleil'),
(772, 'tierra', 'terre'),
(773, 'Venus', 'venus'),
(774, 'Kerberos', 'kerberos'),
(775, 's2011j1', 's2011j1'),
(776, 's2011j2', 's2011j2'),
(777, 'Estigio', 'styx'),
(778, 'caballito de mar', 'hippocampe'),
(779, 'mk2', 'mk2'),
(780, 's2017j1', 's2017j1'),
(781, 's2016j1', 's2016j1'),
(782, 'valetudo', 'valetudo'),
(783, 's2017j2', 's2017j2'),
(784, 's2017j3', 's2017j3'),
(785, 'Pandia', 'pandia'),
(786, 's2017j5', 's2017j5'),
(787, 's2017j6', 's2017j6'),
(788, 's2017j7', 's2017j7'),
(789, 's2017j8', 's2017j8'),
(790, 's2017j9', 's2017j9'),
(791, 'ERSA', 'ersa'),
(792, 'arrokoth', 'arrokoth'),
(793, 'Benou', 'benou'),
(794, 's2004s22', 's2004s22'),
(795, 's2004s21', 's2004s21'),
(796, 's2004s20', 's2004s20'),
(797, 's2004s23', 's2004s23'),
(798, 's2004s24', 's2004s24'),
(799, 's2004s25', 's2004s25'),
(800, 's2004s26', 's2004s26'),
(801, 's2004s27', 's2004s27'),
(802, 's2004s28', 's2004s28'),
(803, 's2004s29', 's2004s29'),
(804, 's2004s30', 's2004s30'),
(805, 's2004s31', 's2004s31'),
(806, 's2004s32', 's2004s32'),
(807, 's2004s33', 's2004s33'),
(808, 's2004s34', 's2004s34'),
(809, 's2004s35', 's2004s35'),
(810, 's2004s36', 's2004s36'),
(811, 's2004s37', 's2004s37'),
(812, 's2004s38', 's2004s38'),
(813, 's2004s39', 's2004s39'),
(814, 'c2020f3-NEOWISE', 'c2020f3-neowise'),
(815, 'Luna', 'lune'),
(816, 'phobos', 'phobos'),
(817, 'Deimos', 'deimos'),
(818, 'io', 'io'),
(819, 'Europa', 'europe'),
(820, 'ganymede', 'ganymede'),
(821, 'callisto', 'callisto'),
(822, 'Amalthée', 'amalthee'),
(823, 'Himalia', 'himalia'),
(824, 'elara', 'elara'),
(825, 'pasiphae', 'pasiphae'),
(826, 'sinope', 'sinope'),
(827, 'Lysithea', 'lysithea'),
(828, 'carmelita', 'carme'),
(829, 'ananke', 'ananke'),
(830, 'leda', 'leda'),
(831, 'el ser', 'thebe'),
(832, 'Adrastea', 'adrastee'),
(833, 'Metis', 'metis'),
(834, 'Callirrhoe', 'callirrhoe'),
(835, 'Themisto', 'themisto'),
(836, 'megaclite', 'megaclite'),
(837, 'Táigete', 'taygete'),
(838, 'Caldona', 'chaldene'),
(839, 'harpálice', 'harpalyke'),
(840, 'kalyke', 'kalyke'),
(841, 'Yocasta', 'iocaste'),
(842, 'erínome', 'erinome'),
(843, 'isonoe', 'isonoe'),
(844, 'praxidike', 'praxidike'),
(845, 'Autónoe', 'autonoe'),
(846, 'Thyone', 'thyone'),
(847, 'Hermipo', 'hermippe'),
(848, 'aitné', 'aitne'),
(849, 'Eurídome', 'eurydome'),
(850, 'Euanthe', 'euanthe'),
(851, 'Euporie', 'euporie'),
(852, 'ortosia', 'orthosie'),
(853, 'Sponde', 'sponde'),
(854, 'mantener', 'cale'),
(855, 'Pasithea', 'pasithee'),
(856, 'Hegemone', 'hegemone'),
(857, 'mneme', 'mneme'),
(858, 'Aoede', 'aoede'),
(859, 'thelxinoe', 'thelxinoe'),
(860, 'arca', 'arche'),
(861, 'kallichore', 'callichore'),
(862, 'hélice', 'helice'),
(863, 'carpo', 'carpo'),
(864, 'eukélade', 'eukelade'),
(865, 'Cilene', 'cyllene'),
(866, 'centro', 'core'),
(867, 'grada', 'herse'),
(868, 's2003j2', 's2003j2'),
(869, 'Eupheme', 'eupheme'),
(870, 's2003j4', 's2003j4'),
(871, 'eirene', 'eirene'),
(872, 's2003j9', 's2003j9'),
(873, 's2003j10', 's2003j10'),
(874, 's2003j12', 's2003j12'),
(875, 'filofrósine', 'philophrosyne'),
(876, 's2003j16', 's2003j16'),
(877, 's2003j18', 's2003j18'),
(878, 's2003j19', 's2003j19'),
(879, 's2003j23', 's2003j23'),
(880, 'mimas', 'mimas'),
(881, 'Enkelados', 'encelade'),
(882, 'tethys', 'tethys'),
(883, 'diona', 'dione'),
(884, 'ñandú', 'rhea'),
(885, 'Titán', 'titan'),
(886, 'Hyperion', 'hyperion'),
(887, 'iapetus', 'japet'),
(888, 'Phoebe', 'phoebe'),
(889, 'Janus', 'janus'),
(890, 'Epimeteo', 'epimethee'),
(891, 'Helene', 'helene'),
(892, 'Telesto', 'telesto'),
(893, 'Calipso', 'calypso'),
(894, 'atlas', 'atlas'),
(895, 'Prometeo', 'promethee'),
(896, 'Pandora', 'pandore'),
(897, 'pliegue', 'pan'),
(898, 'ymir', 'ymir'),
(899, 'Paaliaq', 'paaliaq'),
(900, 'Tarvos', 'tarvos'),
(901, 'ijiraq', 'ijiraq'),
(902, 'suttungr', 'suttungr'),
(903, 'Kiviuq', 'kiviuq'),
(904, 'Mundilfari', 'mundilfari'),
(905, 'Albiorix', 'albiorix'),
(906, 'Skathi', 'skathi'),
(907, 'erriapo', 'erriapo'),
(908, 'Siarnaq', 'siarnaq'),
(909, 'Þrymr', 'thrymr'),
(910, 'Narvi', 'narvi'),
(911, 'Metona', 'methone'),
(912, 'Palene', 'pallene'),
(913, 'Pólux', 'pollux'),
(914, 'daphnis', 'daphnis'),
(915, 'aegir', 'aegir'),
(916, 'bebhionn', 'bebhionn'),
(917, 'Bergelmir', 'bergelmir'),
(918, 'Bestla', 'bestla'),
(919, 'Farbauti', 'farbauti'),
(920, 'Fenrir', 'fenrir'),
(921, 'Fornjot', 'fornjot'),
(922, 'hati', 'hati'),
(923, 'Hyrrokkin', 'hyrrokkin'),
(924, 'Kari', 'kari'),
(925, 'caja', 'loge'),
(926, 'skoll', 'skoll'),
(927, 'Surtur', 'surtur'),
(928, 'anthe', 'anthe'),
(929, 'Jarnsaxa', 'jarnsaxa'),
(930, 'Greip', 'greip'),
(931, 'tarqeq', 'tarqeq'),
(932, 'Egeon', 'egeon'),
(933, 's2004s7', 's2004s7'),
(934, 's2004s12', 's2004s12'),
(935, 's2004s13', 's2004s13'),
(936, 's2004s17', 's2004s17'),
(937, 's2006s1', 's2006s1'),
(938, 's2006s3', 's2006s3'),
(939, 's2007s2', 's2007s2'),
(940, 's2007s3', 's2007s3'),
(941, 's2009s1', 's2009s1'),
(942, 'Ariel', 'ariel'),
(943, 'umbriel', 'umbriel'),
(944, 'óxido de titanio', 'titania'),
(945, 'Oberon', 'oberon'),
(946, 'miranda', 'miranda'),
(947, 'Cordelia', 'cordelia'),
(948, 'ofelia', 'ophelia'),
(949, 'bianca', 'bianca'),
(950, 'Cressida', 'cressida'),
(951, 'desdemona', 'desdemona'),
(952, 'juliet', 'juliet'),
(953, 'portia', 'portia'),
(954, 'rosalind', 'rosalind'),
(955, 'belinda', 'belinda'),
(956, 'disco', 'puck'),
(957, 'monstruo', 'caliban'),
(958, 'Sycorax', 'sycorax'),
(959, 'Prospero', 'prospero'),
(960, 'Setebos', 'setebos'),
(961, 'stephano', 'stephano'),
(962, 'Trínculo', 'trinculo'),
(963, 'Francisco', 'francisco'),
(964, 'Margaret', 'margaret'),
(965, 'Ferdinand', 'ferdinand'),
(966, 'perdita', 'perdita'),
(967, 'MAB', 'mab'),
(968, 'Cupido', 'cupid'),
(969, 'tritón', 'triton'),
(970, 'nereida', 'nereide'),
(971, 'náyade', 'naiade'),
(972, 'Thalassa', 'thalassa'),
(973, 'despina', 'despina'),
(974, 'GALATEE', 'galatee'),
(975, 'Larissa', 'larissa'),
(976, 'ProTee', 'protee'),
(977, 'Halimede', 'halimede'),
(978, 'Psámate', 'psamathee'),
(979, 'Sao', 'sao'),
(980, 'laomedeia', 'laomedie'),
(981, 'neso', 'neso'),
(982, 'charon', 'charon'),
(983, 'nada', 'nix'),
(984, 'hidra', 'hydra'),
(985, 'Namaka', 'namaka'),
(986, 'Hiiaka', 'hiiaka'),
(987, 'Norte Riffleshell', 'dysnomie'),
(988, 'Dia', 'dia'),
(989, 's2004s3', 's2004s3'),
(990, 's2004s4', 's2004s4'),
(991, 's2004s6', 's2004s6'),
(992, 's2010j1', 's2010j1'),
(993, 's2010j2', 's2010j2'),
(994, 'Ceres', 'ceres'),
(995, 'Hebe', 'hebe'),
(996, 'Lempo', 'lempo'),
(997, 'Principito', 'petitprince'),
(998, 'Pulcova', 'pulcova'),
(999, 'Toutatis', 'toutatis'),
(1000, 'Quaoar', 'quaoar'),
(1001, 'steins', 'steins'),
(1002, 'eris', 'eris'),
(1003, 'Astrée', 'astree'),
(1004, 'Pholus', 'pholus'),
(1005, 'Castalia', 'castalia'),
(1006, 'Remus', 'remus'),
(1007, 'Héctor', 'hector'),
(1008, 'kleopatra', 'kleopatra'),
(1009, 'Cruithne', 'cruithne'),
(1010, 'Junon', 'junon'),
(1011, 'hygeia', 'hygie'),
(1012, 'Lutetia', 'lutetia'),
(1013, 'Mathilde', 'mathilde'),
(1014, 'Urano', 'uranus'),
(1015, 'iris', 'iris'),
(1016, 'Eros', 'eros'),
(1017, 'vanth', 'vanth'),
(1018, 'sedna', 'sedna'),
(1019, 'Chariklo', 'chariklo'),
(1020, 'sylvia', 'sylvia'),
(1021, 'dáctilo', 'dactyl'),
(1022, 'orcus', 'orcus'),
(1023, 'Plutón', 'pluton'),
(1024, 'Damocles', 'damocles'),
(1025, 'Rómulo', 'romulus'),
(1026, 'alexhelios', 'alexhelios'),
(1027, 'cleoselene', 'cleoselene'),
(1028, 'flora', 'flore'),
(1029, 'Chiron', 'chiron'),
(1030, 'Eureka', 'eureka'),
(1031, 'Achille', 'achille'),
(1032, 'Weywot', 'weywot'),
(1033, 'ixion', 'ixion'),
(1034, 'Neptuno', 'neptune'),
(1035, 'SL9', 'sl9'),
(1036, '9metis', '9metis'),
(1037, 'Haumea', 'haumea'),
(1038, 'nessus', 'nessus'),
(1039, 'Itokawa', 'itokawa'),
(1040, 'Hylonome', 'hylonome'),
(1041, 'Eugenia', 'eugenia'),
(1042, '2006SQ372', '2006SQ372'),
(1043, 'Palas', 'pallas'),
(1044, 'Asbolo', 'asbolus'),
(1045, 'varuna', 'varuna'),
(1046, 'Vesta', 'vesta'),
(1047, 'ida', 'ida'),
(1048, 'Hyakutake', 'hyakutake'),
(1049, 'Gaspra', 'gaspra'),
(1050, 'Albión', 'albion'),
(1051, 'makemake', 'makemake'),
(1052, 'Halley', 'halley'),
(1053, 'Júpiter', 'jupiter'),
(1054, 'marzo', 'mars'),
(1055, 'mercurio', 'mercure'),
(1056, 'Saturno', 'saturne'),
(1057, 'sol', 'soleil'),
(1058, 'tierra', 'terre'),
(1059, 'Venus', 'venus'),
(1060, 'Kerberos', 'kerberos'),
(1061, 's2011j1', 's2011j1'),
(1062, 's2011j2', 's2011j2'),
(1063, 'Estigio', 'styx'),
(1064, 'caballito de mar', 'hippocampe'),
(1065, 'mk2', 'mk2'),
(1066, 's2017j1', 's2017j1'),
(1067, 's2016j1', 's2016j1'),
(1068, 'valetudo', 'valetudo'),
(1069, 's2017j2', 's2017j2'),
(1070, 's2017j3', 's2017j3'),
(1071, 'Pandia', 'pandia'),
(1072, 's2017j5', 's2017j5'),
(1073, 's2017j6', 's2017j6'),
(1074, 's2017j7', 's2017j7'),
(1075, 's2017j8', 's2017j8'),
(1076, 's2017j9', 's2017j9'),
(1077, 'ERSA', 'ersa'),
(1078, 'arrokoth', 'arrokoth'),
(1079, 'Benou', 'benou'),
(1080, 's2004s22', 's2004s22'),
(1081, 's2004s21', 's2004s21'),
(1082, 's2004s20', 's2004s20'),
(1083, 's2004s23', 's2004s23'),
(1084, 's2004s24', 's2004s24'),
(1085, 's2004s25', 's2004s25'),
(1086, 's2004s26', 's2004s26'),
(1087, 's2004s27', 's2004s27'),
(1088, 's2004s28', 's2004s28'),
(1089, 's2004s29', 's2004s29'),
(1090, 's2004s30', 's2004s30'),
(1091, 's2004s31', 's2004s31'),
(1092, 's2004s32', 's2004s32'),
(1093, 's2004s33', 's2004s33'),
(1094, 's2004s34', 's2004s34'),
(1095, 's2004s35', 's2004s35'),
(1096, 's2004s36', 's2004s36'),
(1097, 's2004s37', 's2004s37'),
(1098, 's2004s38', 's2004s38'),
(1099, 's2004s39', 's2004s39'),
(1100, 'c2020f3-NEOWISE', 'c2020f3-neowise');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerdate` datetime NOT NULL,
  `erasuredate` datetime DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `username`, `name`, `lastname`, `birthdate`, `email`, `password`, `registerdate`, `erasuredate`, `admin`) VALUES
(6, 'username', 'username', 'user name', '2000-02-10', 'username@username', '1ca833a6a6502b042c19d6cae31d51f7559886fb', '2021-06-16 03:15:58', NULL, 0),
(7, 'root', 'root', 'root', '0001-01-01', 'root@wikispace', 'e1dca78bcc4794c11e5f24e8c8898103b777ea8b', '2021-06-16 03:16:49', NULL, 1),
(8, 'Jerreramarcia', 'juan manuel ', 'herrera', '2000-08-06', 'juanma23@correo.ugr.es', '00ed27c006f61c558239411a5df02c51f292f682', '2021-06-16 03:20:09', NULL, 0),
(9, 'juanma', 'Herrera', 'Garcia', '2020-06-29', 'nerfitero@gmail.com', '8680a502ef5babdd1dbc9997fb8c5771ce034208', '2021-07-30 04:36:00', NULL, 0),
(10, 'NeoJ', 'juanma', 'herrera', '2021-07-20', 'jota', '00b44f3104f4bb8a688bd606882e6d2a50f82232', '2022-08-21 18:56:00', NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKcreator` (`creatoruser`),
  ADD KEY `FKeditor` (`editoruser`),
  ADD KEY `FKcommentnew` (`idnew`),
  ADD KEY `FKcommentevent` (`idevent`);

--
-- Indices de la tabla `editevent`
--
ALTER TABLE `editevent`
  ADD PRIMARY KEY (`ideditevent`),
  ADD KEY `FKediteventuser` (`iduser`),
  ADD KEY `FKevent` (`idevent`);

--
-- Indices de la tabla `editnew`
--
ALTER TABLE `editnew`
  ADD PRIMARY KEY (`ideditnew`),
  ADD KEY `FKeditnewuser` (`iduser`),
  ADD KEY `FKnew` (`idnew`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`),
  ADD KEY `FKuserevent` (`idpublisher`);

--
-- Indices de la tabla `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`idnew`),
  ADD KEY `FKusernew` (`idpublisher`);

--
-- Indices de la tabla `objetosastronomicos`
--
ALTER TABLE `objetosastronomicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `editevent`
--
ALTER TABLE `editevent`
  MODIFY `ideditevent` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `editnew`
--
ALTER TABLE `editnew`
  MODIFY `ideditnew` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `new`
--
ALTER TABLE `new`
  MODIFY `idnew` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `objetosastronomicos`
--
ALTER TABLE `objetosastronomicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FKcommentevent` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKcommentnew` FOREIGN KEY (`idnew`) REFERENCES `new` (`idnew`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKcreator` FOREIGN KEY (`creatoruser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKeditor` FOREIGN KEY (`editoruser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `editevent`
--
ALTER TABLE `editevent`
  ADD CONSTRAINT `FKediteventuser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKevent` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `editnew`
--
ALTER TABLE `editnew`
  ADD CONSTRAINT `FKeditnewuser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKnew` FOREIGN KEY (`idnew`) REFERENCES `new` (`idnew`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FKuserevent` FOREIGN KEY (`idpublisher`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `new`
--
ALTER TABLE `new`
  ADD CONSTRAINT `FKusernew` FOREIGN KEY (`idpublisher`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
