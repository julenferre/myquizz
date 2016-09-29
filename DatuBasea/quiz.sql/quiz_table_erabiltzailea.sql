
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzailea`
--

CREATE TABLE `erabiltzailea` (
  `Izena` varchar(25) NOT NULL,
  `Abizenak` varchar(80) NOT NULL,
  `Eposta` varchar(100) NOT NULL,
  `Pasahitza` varchar(30) NOT NULL,
  `Telefonoa` int(9) NOT NULL,
  `Espezialitatea` varchar(100) NOT NULL,
  `Interesak` varchar(100) DEFAULT NULL,
  `Argazkia` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
