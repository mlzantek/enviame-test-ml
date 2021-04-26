--
-- Database: `enviame-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE IF NOT EXISTS `continents` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `anual_adjustment` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`id`, `name`, `anual_adjustment`) VALUES
(1, 'América', 4),
(2, 'Europa', 5),
(3, 'Asia', 6),
(4, 'Oceanía', 6),
(5, 'Africa', 5);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `continent_id` int NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `continent_id`, `name`) VALUES
(1, 1, 'Chile'),
(2, 1, 'Argentina'),
(3, 1, 'Canadá'),
(4, 1, 'Colombia'),
(5, 2, 'Alemania'),
(6, 2, 'Francia'),
(7, 2, 'España'),
(8, 2, 'Grecia'),
(9, 3, 'India'),
(10, 3, 'Japón'),
(11, 3, 'Corea del Sur'),
(12, 4, 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `salary` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `country_id`, `first_name`, `last_name`, `salary`) VALUES
(1, 1, 'Pedro', 'Rojas', 2000),
(2, 2, 'Luciano', 'Alessandri', 2100),
(3, 3, 'John', 'Carter', 3050),
(4, 4, 'Alejandra', 'Benavides', 2150),
(5, 5, 'Moritz', 'Baring', 6000),
(6, 6, 'Thierry', 'Henry', 5900),
(7, 7, 'Sergio', 'Ramos', 6200),
(8, 8, 'Nikoleta', 'Kyriakopulu', 7000),
(9, 9, 'Aamir', 'Khan', 2000),
(10, 10, 'Takumi', 'Fujiwara', 5000),
(11, 11, 'Heung-min', 'Son', 5100),
(12, 12, 'Peter', 'Johnson', 6100);
COMMIT;
