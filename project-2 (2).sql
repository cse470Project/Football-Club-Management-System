-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 06:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned_user`
--

CREATE TABLE `banned_user` (
  `account_no` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banned_user`
--

INSERT INTO `banned_user` (`account_no`, `username`) VALUES
(2, 'Angon'),
(4, 'Asif'),
(6, 'Ahib');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(100) DEFAULT NULL,
  `club_president` varchar(100) DEFAULT NULL,
  `vice_president` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `club_president`, `vice_president`) VALUES
(1, 'Barcelona', 'Joan Laporta', 'Rafeal '),
(2, 'Real Madrid', 'FLORENTINO PÉREZ RODRÍGUEZ', 'FERNANDO FERNÁNDEZ TAPIAS'),
(3, 'Paris Saint German', 'Nasser Al-Khelaifi', 'Brett Pardu'),
(4, 'Manchester united', 'Richard Arnold', 'N/A'),
(5, 'Manchester City', 'Mansour bin Zayed Al Nahyan', 'N/A'),
(6, 'Arsenal', 'Vinai Venkatesham', 'Tim Lewis'),
(7, 'Chelsea', 'Todd Boehly', 'N/A'),
(8, 'Aston Villa', 'Nassef Sawiris', 'Unai Emery'),
(9, 'Malorca', 'Francina Armengal', 'N/A'),
(10, 'Atletico Madrid', 'Enrique Cerezo', 'N/A'),
(11, 'Villarreal', 'Fernando Roig Alphonso', 'N/A'),
(12, 'Lens', 'Stade Bollaerd', 'Josephoughourliam');

-- --------------------------------------------------------

--
-- Table structure for table `english_league`
--

CREATE TABLE `english_league` (
  `english_league_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `english_league`
--

INSERT INTO `english_league` (`english_league_id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `follows_club`
--

CREATE TABLE `follows_club` (
  `account_no` int(11) NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follows_player`
--

CREATE TABLE `follows_player` (
  `account_no` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follows_player`
--

INSERT INTO `follows_player` (`account_no`, `player_id`) VALUES
(1, 1),
(1, 25),
(2, 5),
(2, 6),
(8, 1),
(8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

CREATE TABLE `league` (
  `league_id` int(11) NOT NULL,
  `division` varchar(20) DEFAULT NULL,
  `league_sponsor` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `league_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `league`
--

INSERT INTO `league` (`league_id`, `division`, `league_sponsor`, `start_date`, `league_name`) VALUES
(1, '', 'Adidas', '2023-08-12', 'Laliga'),
(2, '', 'Uber Eats', '2023-08-12', 'Ligue 1'),
(3, '', 'PlayStation', '2022-06-21', 'UEFA Champions League'),
(4, '', 'EA', '2023-08-06', 'English Premier League');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `middle_initial` varchar(1) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `speciality` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `middle_initial`, `last_name`, `speciality`, `age`, `club_id`) VALUES
(1, 'Xavier Hernández', 'H', '', 'Tactical', 43, 1),
(2, 'Pep', '', 'Hernández', 'tactical', 52, 5),
(3, 'Carlo', '', 'Carlo', 'Counter', 63, 2),
(4, 'Erik ten Hag', 't', 'Hag', 'Counter', 53, 4),
(5, 'Mikel Arteta', '', 'Arteta', 'Possession', 41, 6),
(6, 'Christophe', '', 'Galtier', 'Counter', 56, 3),
(7, 'Unai', '', 'Emery', 'Counter', 54, 7),
(8, 'Javier', '', 'Aguirre', 'Possession', 64, 8),
(9, 'Diego', '', 'Simeone', 'Long Ball Counter', 53, 9),
(10, 'Quique', '', 'Setien', 'Counter', 52, 11),
(11, 'Franck', '', 'Haise', 'Possession', 52, 12);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `nationality` varchar(20) NOT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nationality`, `manager_id`) VALUES
(' Spanish', 8),
('Argentina', 9),
('Dutch', 4),
('French', 6),
('French', 11),
('Italian', 3),
('Mexican', 8),
('Spanish', 1),
('Spanish', 2),
('Spanish', 5),
('Spanish', 7),
('Spanish', 10);

-- --------------------------------------------------------

--
-- Table structure for table `participates_in`
--

CREATE TABLE `participates_in` (
  `club_id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `league_point` int(11) DEFAULT NULL,
  `schedule` date DEFAULT NULL,
  `possession` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participates_in`
--

INSERT INTO `participates_in` (`club_id`, `league_id`, `league_point`, `schedule`, `possession`) VALUES
(1, 1, 23, NULL, 54),
(1, 3, 14, NULL, 60),
(2, 1, 24, NULL, 60),
(2, 3, 14, NULL, 51),
(3, 2, 5, NULL, 40),
(3, 3, 21, NULL, 62),
(4, 3, 17, NULL, 62),
(4, 4, 22, NULL, 55),
(5, 3, 18, NULL, 66),
(5, 4, 19, NULL, 54),
(6, 4, 23, NULL, 50),
(7, 4, 16, NULL, 51),
(8, 4, 19, NULL, 56),
(9, 3, 12, NULL, 52),
(10, 4, 15, NULL, 45),
(11, 1, 5, NULL, 40),
(12, 1, 16, NULL, 54);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `middle_initial` varchar(1) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dominenet_leg` varchar(5) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `captain_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `first_name`, `middle_initial`, `last_name`, `age`, `dominenet_leg`, `height`, `club_id`, `captain_id`) VALUES
(1, 'Robert', '', 'Lewandoski', 34, 'Right', 176, 1, NULL),
(2, 'Páez Gavira', '', 'Gavira', 18, 'Right', 2, 1, NULL),
(3, 'Pedro González López', 'G', 'López', 20, 'right', 2, 1, NULL),
(4, 'Karim', '', 'Benzema', 35, 'Right', 2, 2, NULL),
(5, 'Luka', '', 'Modric', 37, 'Right', 2, 2, NULL),
(6, 'Vinicius', '', 'Jr', 22, 'Right', 2, 2, NULL),
(7, 'Lionel', '', 'Messi', 35, 'Left', 2, 3, NULL),
(8, 'Kylien ', '', 'Mbappe', 24, 'Right', 2, 3, NULL),
(9, 'Neymer', '', 'Jr', 31, 'Right', 2, 3, NULL),
(10, 'Carlos Henrique Casi', 'H', 'Casimiro', 31, 'Right', 2, 4, NULL),
(11, 'Antony Matheus dos S', 'M', 'dos Santos', 23, 'Right', 2, 4, NULL),
(12, 'Lisandro Martínez', '', 'Martínez', 25, 'Left', 2, 4, NULL),
(13, 'Erling Haaland', '', 'Haaland', 22, 'Left', 2, 5, NULL),
(14, 'Julien', '', 'Alvarez', 23, 'Right', 2, 5, NULL),
(15, 'Rodrigo', 'H', 'Cascante', 26, 'Right', 2, 5, NULL),
(16, 'Gabriel Teodoro Mart', 'T', 'Martinelli', 21, 'Left', 2, 6, NULL),
(17, 'Gabriel Fernando', 'F', 'Jesus', 26, 'Right', 2, 6, NULL),
(18, 'Bukayo', '', 'Saka', 21, 'Right', 2, 6, NULL),
(19, 'Enzo', '', 'Fernandez', 34, 'Right', 175, 7, NULL),
(20, 'Joao', '', 'Felix', 27, 'Left', 170, 7, NULL),
(21, 'Noni', '', 'Madueke', 37, 'Right', 185, 7, NULL),
(22, 'Emiliano', '', 'Martinez', 31, 'Right', 190, 8, NULL),
(23, 'Alex', '', 'Moreno', 29, 'Right', 179, 8, NULL),
(24, 'Fillipe', '', 'Courtinho', 30, 'Left', 170, 8, NULL),
(25, 'Vedat', '', 'Muriki', 28, 'Right', 194, 9, NULL),
(26, 'Dani', '', 'Rodriguez', 34, 'Left', 179, 9, NULL),
(27, 'Martin', '', 'Valgent', 27, 'Right', 187, 9, NULL),
(28, 'Jan', '', 'Oblak', 30, '', 192, 10, NULL),
(29, 'Marcos', '', 'Lorente', 31, 'Left', 0, 10, NULL),
(30, 'Thomas', '', 'Lemar', 27, 'Right', 171, 10, NULL),
(31, 'Pepe', '', 'Reina', 40, 'Right', 194, 11, NULL),
(32, 'Gerard', '', 'Moreno', 34, 'Left', 179, 11, NULL),
(33, 'Seko', '', 'Fofana', 27, 'Right', 170, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plays_in`
--

CREATE TABLE `plays_in` (
  `player_id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `match_played` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `assist` int(11) DEFAULT NULL,
  `card` int(11) DEFAULT NULL,
  `pass_accuracy` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plays_in`
--

INSERT INTO `plays_in` (`player_id`, `league_id`, `match_played`, `goal`, `assist`, `card`, `pass_accuracy`) VALUES
(1, 1, 5, 5, 5, 0, 79),
(2, 3, 5, 0, 0, 2, 86),
(3, 3, 5, 0, 0, 0, 89),
(4, 3, 7, 4, 1, 0, 87),
(5, 3, 7, 2, 1, 0, 91),
(6, 3, 9, 6, 4, 1, 86),
(7, 3, 7, 4, 4, 0, 87),
(8, 3, 8, 7, 3, 0, 80),
(9, 3, 6, 2, 2, 4, 86),
(10, 4, 19, 2, 3, 7, 78),
(11, 4, 17, 3, 0, 4, 82),
(12, 3, 27, 1, 0, 6, 87),
(13, 3, 7, 11, 1, 0, 76),
(13, 4, 27, 32, 5, 5, 76),
(14, 3, 8, 2, 2, 1, 85),
(16, 4, 30, 14, 4, 3, 83),
(17, 4, 18, 8, 5, 4, 81),
(18, 4, 30, 12, 10, 6, 82);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position` varchar(10) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position`, `player_id`) VALUES
(' RWF', 20),
('AMF', 9),
('AMF', 24),
('AMF', 29),
('AMF', 32),
('CB', 27),
('Center Bac', 12),
('CF', 21),
('CF', 25),
('CMF', 2),
('CMF', 3),
('CMF', 5),
('CMF', 26),
('DMF', 10),
('DMF', 26),
('Forward', 7),
('Forward', 8),
('Forward', 9),
('Forward', 13),
('Forward', 14),
('Forward', 15),
('Forward', 17),
('GK', 22),
('GK', 28),
('GK', 31),
('LB', 23),
('LWF', 20),
('MF', 19),
('MF', 30),
('MF', 33),
('RWF', 25),
('Striker', 1),
('Striker', 4),
('WF', 6),
('WF', 16),
('Winger', 11),
('Winger', 18);

-- --------------------------------------------------------

--
-- Table structure for table `spanish_league`
--

CREATE TABLE `spanish_league` (
  `spanish_league_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spanish_league`
--

INSERT INTO `spanish_league` (`spanish_league_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_name` varchar(100) NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_name`, `club_id`) VALUES
(' Congnizant', 8),
(' EA Sports', 7),
(' Go Market', 7),
(' Joma', 11),
(' McDonalds', 12),
(' Nike', 10),
('Adidas', 2),
('Autohero', 3),
('BMW', 2),
('Cadbury', 7),
('Chevrolet', 4),
('Color Star', 11),
('Emirates Airline', 6),
('Ettihad', 5),
('Gorillas', 3),
('Hackett London', 8),
('Konami', 1),
('Nike', 1),
('Pepsi', 9),
('Qatar Airways', 3),
('Whale Fin', 10),
('Winamax', 12);

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `stadium_id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `stadium_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `establish_date` date DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`stadium_id`, `capacity`, `stadium_name`, `address`, `establish_date`, `club_id`) VALUES
(1, 99354, 'Camp Nou', 'C. Arístides Maillol, 12, 08028 Barcelona, Spain', '1957-06-04', 1),
(2, 81044, 'Santiago Beurnabue', 'Av. de Concha Espina, 1, 28036 Madrid, Spain', '1982-07-07', 2),
(3, 47929, ' Le Parc des Princes', '24 Rue du Commandant Guilbaud, 75016 Paris, France', '1972-09-03', 3),
(4, 74310, 'Old Trafford', 'Sir Matt Busby Way, Old Trafford, Stretford, Manchester M16 0RA, United Kingdom', '1909-07-24', 4),
(5, 53400, 'Etihad Stadium', 'Ashton New Rd, Manchester M11 3FF, United Kingdom', '1999-09-19', 5),
(6, 60704, 'Emirates Stadium', 'Hornsey Rd, London N7 7AJ, United Kingdom', '2004-02-08', 6),
(7, 40343, 'Stamford Bridge', 'Fulham Rd., London SW6 1HS, United Kingdom', '1877-09-16', 7),
(8, 42657, 'Villa Park', 'Trinity Rd, Birmingham B6 6HE, United Kingdom', '1897-09-13', 8),
(9, 42123, 'Stadium Malorca ', 'Camí dels Reis, s/n, 07011 Palma, Illes Balears, Spain', '1999-06-22', 9),
(10, 68456, 'Civitas Metropolitan Stadium', 'Av. de Luis Aragones, 4, 28022 Madrid, Spain', '2017-09-11', 10),
(11, 47231, 'Estadi de la Ceràmica', 'Carrer Blasco Ibanez, 2, 12540 Vila-real, Castello, Spain', '1923-01-01', 11),
(12, 53133, 'Estadio Bollaert-Delelis', 'Av. Alfred Maes, 62300 Lens, France', '1933-08-18', 12);

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `title` varchar(100) DEFAULT NULL,
  `link` varchar(1000) NOT NULL,
  `stream_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`title`, `link`, `stream_id`) VALUES
('Barcelona VS Real Madrid (spanish super cup 2017)', 'https://www.youtube.com/embed/Z6VWDRIzvuM', 1),
('FC Barcelona vs Real Madrid (0-4) 2022/23', 'https://www.youtube.com/watch?v=jNCGYs-VXKY', 2),
('Man City vs Bayern Munich 3-0', 'https://www.youtube.com/watch?v=bFPY3vHvSj8', 3),
('Manchester City vs Paris Saint-Germain', 'https://www.youtube.com/watch?v=zH8tpZTW9_4', 4),
('Real Madrid vs PSG', 'https://www.youtube.com/watch?v=t0sB_zfEwVc', 5),
('Real Madrid 3-3 Bayern Múnich', 'https://www.youtube.com/watch?v=L6IWtgmSt2A', 6),
('Barcelona vs PSG', 'https://www.youtube.com/watch?v=Tb7lD-ExUrg', 7),
('Real Madrid-Juventus', 'https://www.youtube.com/watch?v=4gFnqv5g_CI', 8),
('Chelsea vs Barcelona', 'https://www.youtube.com/watch?v=vNKIE3zwLCE', 9),
('Real Madrid -Atletico Madrid', 'https://www.youtube.com/watch?v=oo2EKw7sLaI', 10),
('AC Milan - Bayern München', 'https://www.youtube.com/watch?v=oXw0iHhwuYA', 11),
('AC Milan vs Bayern Munich', 'https://www.youtube.com/watch?v=C3Ls7Ey2Y1E', 12),
('Manchester United vs AC Milan', 'https://www.youtube.com/watch?v=8icn5o0HlbQ', 13),
('Juventus - Atletico Madrid', 'https://www.youtube.com/watch?v=_3n-KD7kbbc', 14);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `Transfer_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `from_club` varchar(100) DEFAULT NULL,
  `to_club` varchar(100) DEFAULT NULL,
  `season` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`Transfer_id`, `player_id`, `amount`, `transfer_date`, `from_club`, `to_club`, `season`, `duration`) VALUES
(1, 27, 20, '2022-07-17', 'Malorca', 'Manchester United', 'Winter', 24),
(2, 20, 80, '2022-11-11', 'Chelsea', 'Paris Saint Germain', 'Summer', 36),
(3, 33, 23, '2022-12-17', 'Lens', 'Malorca', 'Winter', 36),
(4, 22, 2, '2023-01-20', 'Aston Villa', 'Barcelona', 'Winter', 36),
(5, 32, 35, '2023-04-14', 'Villareal', 'Lens', 'Fall', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `account_no` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account_no`, `email`, `full_name`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'pass'),
(2, 'angon@gmail.com', 'Argha Protim Angon', 'Angon', 'angon'),
(3, 'rafsan@gmail.com', 'Rafsan Munnaf', 'Rafsan', 'rafsan'),
(4, 'asif@gmail.com', 'Asif Iqbal Nuhash', 'Asif', 'asif'),
(5, 'rubaiya@gmail.com', 'Rubaiya Islam', 'rubaiya', 'rubaiya'),
(6, 'ahib@gmail.com', 'Ahib Afnan', 'Ahib', 'ahib'),
(7, 'arian@gmail.com', 'Arian Nuhan', 'Arian', 'arian'),
(8, 'tamim@gmail.com', 'Tamim Iqbal', 'Tamim', 'tamim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned_user`
--
ALTER TABLE `banned_user`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `english_league`
--
ALTER TABLE `english_league`
  ADD PRIMARY KEY (`english_league_id`);

--
-- Indexes for table `follows_club`
--
ALTER TABLE `follows_club`
  ADD PRIMARY KEY (`account_no`,`club_id`),
  ADD KEY `fc_club` (`club_id`);

--
-- Indexes for table `follows_player`
--
ALTER TABLE `follows_player`
  ADD PRIMARY KEY (`account_no`,`player_id`),
  ADD KEY `fp_player` (`player_id`);

--
-- Indexes for table `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`league_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nationality`,`manager_id`);

--
-- Indexes for table `participates_in`
--
ALTER TABLE `participates_in`
  ADD PRIMARY KEY (`club_id`,`league_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `captain_id` (`captain_id`),
  ADD KEY `player_club` (`club_id`);

--
-- Indexes for table `plays_in`
--
ALTER TABLE `plays_in`
  ADD PRIMARY KEY (`player_id`,`league_id`),
  ADD KEY `playsIN_league` (`league_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position`,`player_id`),
  ADD KEY `pos_player` (`player_id`);

--
-- Indexes for table `spanish_league`
--
ALTER TABLE `spanish_league`
  ADD PRIMARY KEY (`spanish_league_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_name`,`club_id`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`stadium_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`stream_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`Transfer_id`),
  ADD KEY `transfer_player` (`player_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`account_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `league`
--
ALTER TABLE `league`
  MODIFY `league_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stadium`
--
ALTER TABLE `stadium`
  MODIFY `stadium_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `stream_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `Transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `account_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banned_user`
--
ALTER TABLE `banned_user`
  ADD CONSTRAINT `banned_user_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `user` (`account_no`);

--
-- Constraints for table `follows_club`
--
ALTER TABLE `follows_club`
  ADD CONSTRAINT `fc_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `fc_user` FOREIGN KEY (`account_no`) REFERENCES `user` (`account_no`);

--
-- Constraints for table `follows_player`
--
ALTER TABLE `follows_player`
  ADD CONSTRAINT `fp_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`),
  ADD CONSTRAINT `fp_user` FOREIGN KEY (`account_no`) REFERENCES `user` (`account_no`);

--
-- Constraints for table `participates_in`
--
ALTER TABLE `participates_in`
  ADD CONSTRAINT `par_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`captain_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `plays_in`
--
ALTER TABLE `plays_in`
  ADD CONSTRAINT `playsIN_league` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`),
  ADD CONSTRAINT `playsIN_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `pos_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
