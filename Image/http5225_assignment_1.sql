-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2024 at 05:24 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `http5225_assignment_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamedetails`
--

CREATE TABLE `gamedetails` (
  `game_id` int(11) NOT NULL,
  `description` varchar(81) DEFAULT NULL,
  `platform` varchar(11) DEFAULT NULL,
  `multiplayer` varchar(3) DEFAULT NULL,
  `age_rating` varchar(1) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gamedetails`
--

INSERT INTO `gamedetails` (`game_id`, `description`, `platform`, `multiplayer`, `age_rating`, `price`) VALUES
(1, 'A reimagined version of the classic 3D platformer with new levels and characters.', 'Nintendo DS', 'Yes', 'E', '29.99'),
(2, 'A fast-paced puzzle game combining music and lighting effects.', 'Nintendo DS', 'No', 'E', '19.99'),
(3, 'A collection of mini-games that utilize the touchscreen.', 'Nintendo DS', 'No', 'E', '24.99'),
(4, 'An arcade-style golf game with fun characters and courses.', 'PSP', 'Yes', 'E', '29.99'),
(5, 'An open-world action game based on the popular superhero movie.', 'Nintendo DS', 'No', 'T', '14.99'),
(6, 'An action-adventure game set in the Legend of Zelda universe.', 'Nintendo DS', 'Yes', 'E', '34.99'),
(7, 'A Pokémon RPG featuring new mechanics and a deeper story.', 'Nintendo DS', 'Yes', 'E', '34.99'),
(8, 'A tactical RPG with engaging battles and a gripping storyline.', 'Nintendo DS', 'Yes', 'E', '24.99'),
(9, 'A first-person shooter with a focus on multiplayer battles.', 'Nintendo DS', 'Yes', 'T', '19.99'),
(10, 'A fast-paced racing game featuring beloved Nintendo characters.', 'Nintendo DS', 'Yes', 'E', '29.99'),
(11, 'A strategy game with new mechanics and online play.', 'Nintendo DS', 'Yes', 'E', '24.99'),
(12, 'A 2D action game in the Castlevania series with RPG elements.', 'Nintendo DS', 'No', 'T', '29.99'),
(13, 'An action RPG with a unique combat system and stylish graphics.', 'Nintendo DS', 'Yes', 'T', '29.99'),
(14, 'An RPG that allows players to explore a vast world.', 'Nintendo DS', 'Yes', 'E', '39.99'),
(15, 'A puzzle game that challenges players with intricate brain teasers.', 'Nintendo DS', 'No', 'E', '19.99'),
(16, 'A pet simulation game where players can care for various dogs.', 'Nintendo DS', 'No', 'E', '29.99'),
(17, 'A classic 2D platformer featuring Mario and Luigi.', 'Nintendo DS', 'No', 'E', '24.99'),
(18, 'A simulation game that lets players build their own town.', 'Nintendo DS', 'Yes', 'E', '29.99'),
(19, 'An action RPG that features beloved characters from the Final Fantasy series.', 'Nintendo DS', 'Yes', 'T', '19.99'),
(20, 'An adventure game set in the Legend of Zelda universe.', 'Nintendo DS', 'Yes', 'E', '34.99'),
(21, 'A puzzle game where players must solve mysteries and save the world.', 'Nintendo DS', 'No', 'T', '29.99'),
(22, 'An action RPG where players can hunt monsters and collect items.', 'PSP', 'Yes', 'T', '39.99'),
(23, 'A party game featuring various mini-games.', 'Nintendo DS', 'Yes', 'E', '24.99'),
(24, 'An action-adventure game set in the Legend of Zelda universe.', 'Nintendo DS', 'Yes', 'E', '34.99'),
(25, 'A cooking simulation game where players can create various dishes.', 'Nintendo DS', 'No', 'E', '19.99'),
(26, 'An action game based on the popular series featuring a crime underworld.', 'Nintendo DS', 'Yes', 'M', '29.99'),
(27, 'A remastered version of a classic RPG with updated graphics.', 'Nintendo DS', 'Yes', 'E', '24.99'),
(28, 'A card game featuring characters from the Yu-Gi-Oh! series.', 'Nintendo DS', 'Yes', 'E', '19.99'),
(29, 'A 2D action game featuring Simon Belmont.', 'Nintendo DS', 'No', 'T', '24.99'),
(30, 'An action platformer featuring Sonic the Hedgehog.', 'Nintendo DS', 'No', 'E', '19.99'),
(31, 'A puzzle game where players must help Mario defeat Donkey Kong.', 'Nintendo DS', 'No', 'E', '19.99'),
(32, 'A Pokémon RPG that features new creatures and mechanics.', 'Nintendo DS', 'Yes', 'E', '34.99'),
(33, 'A soccer game that brings the FIFA franchise to handheld devices.', 'Nintendo DS', 'Yes', 'E', '29.99'),
(34, 'An action-adventure game featuring stealth mechanics.', 'Nintendo DS', 'No', 'M', '19.99'),
(35, 'A creative platformer where players can create and share levels.', 'PSP', 'No', 'E', '24.99'),
(36, 'A fast-paced action game featuring ninjas.', 'Nintendo DS', 'No', 'E', '29.99'),
(37, 'A rhythm game that challenges players with music and timing.', 'Nintendo DS', 'No', 'E', '19.99'),
(38, 'An adventure game set in a fantasy world with various challenges.', 'Nintendo DS', 'Yes', 'E', '34.99'),
(39, 'A classic puzzle game featuring falling blocks.', 'Nintendo DS', 'No', 'E', '19.99'),
(40, 'An action game featuring a fast-paced story and exploration.', 'Nintendo DS', 'No', 'E', '29.99'),
(41, 'A tactical RPG with a unique story and character progression.', 'Nintendo DS', 'Yes', 'T', '19.99'),
(42, 'An RPG featuring unique gameplay mechanics and storytelling.', 'Nintendo DS', 'Yes', 'T', '34.99'),
(43, 'A classic RPG with time travel and adventure elements.', 'Nintendo DS', 'Yes', 'T', '29.99'),
(44, 'An action RPG with a focus on exploration and combat.', 'Nintendo DS', 'Yes', 'T', '34.99'),
(45, 'A racing game that brings the thrill of racing to the handheld.', 'Nintendo DS', 'Yes', 'E', '29.99'),
(46, 'An educational game that helps players improve their brain function.', 'Nintendo DS', 'No', 'E', '19.99'),
(47, 'An RPG that immerses players in a captivating fantasy world.', 'Nintendo DS', 'Yes', 'T', '24.99'),
(48, 'A game that challenges players with various logic puzzles.', 'Nintendo DS', 'No', 'E', '19.99'),
(49, 'An open-world exploration game focusing on story and character interaction.', 'Nintendo DS', 'No', 'T', '34.99'),
(50, 'A fighting game featuring iconic characters in various battles.', 'Nintendo DS', 'Yes', 'T', '29.99'),
(51, 'An Action and adventure game', 'PS5', 'Yes', 'E', '43.00');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `title` varchar(46) DEFAULT NULL,
  `genre` varchar(12) DEFAULT NULL,
  `publisher` varchar(38) DEFAULT NULL,
  `review_score` int(11) DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `title`, `genre`, `publisher`, `review_score`, `release_year`) VALUES
(1, 'Super Mario 64 DS', 'Action', 'Nintendo', 85, 2004),
(2, 'Lumines: Puzzle Fusion', 'Strategy', 'Ubisoft', 89, 2004),
(3, 'WarioWare Touched!', 'Action', 'Nintendo', 81, 2005),
(4, 'Hot Shots Golf: Open Tee', 'Sports', 'Sony', 81, 2005),
(5, 'Spider-Man 2', 'Action', 'Activision', 61, 2004),
(6, 'The Legend of Zelda: Phantom Hourglass', 'Adventure', 'Nintendo', 91, 2007),
(7, 'Pokemon Diamond', 'Role-Playing', 'Nintendo', 90, 2007),
(8, 'Final Fantasy Tactics A2', 'Strategy', 'Square Enix', 80, 2008),
(9, 'Metroid Prime: Hunters', 'Action', 'Nintendo', 78, 2006),
(10, 'Mario Kart DS', 'Racing', 'Nintendo', 94, 2005),
(11, 'Advance Wars: Days of Ruin', 'Strategy', 'Nintendo', 84, 2008),
(12, 'Castlevania: Dawn of Sorrow', 'Action', 'Konami', 88, 2005),
(13, 'The World Ends with You', 'Role-Playing', 'Square Enix', 84, 2008),
(14, 'Dragon Quest IX: Sentinels of the Starry Skies', 'Role-Playing', 'Square Enix', 89, 2009),
(15, 'Professor Layton and the Curious Village', 'Puzzle', 'Level-5', 85, 2007),
(16, 'Nintendogs', 'Simulation', 'Nintendo', 89, 2005),
(17, 'New Super Mario Bros.', 'Platform', 'Nintendo', 88, 2006),
(18, 'Animal Crossing: Wild World', 'Simulation', 'Nintendo', 87, 2005),
(19, 'Kingdom Hearts: 358/2 Days', 'Action', 'Square Enix', 81, 2009),
(20, 'Zelda: Spirit Tracks', 'Adventure', 'Nintendo', 85, 2009),
(21, 'Ghost Trick: Phantom Detective', 'Puzzle', 'Capcom', 89, 2010),
(22, 'Monster Hunter Freedom Unite', 'Action', 'Capcom', 82, 2009),
(23, 'Mario Party DS', 'Party', 'Nintendo', 76, 2007),
(24, 'Cooking Mama', 'Simulation', 'Majesco Games', 77, 2006),
(25, 'Grand Theft Auto: Chinatown Wars', 'Action', 'Rockstar Games', 87, 2009),
(26, 'Final Fantasy IV', 'Role-Playing', 'Square Enix', 90, 2008),
(27, 'Yu-Gi-Oh! 5D\'s World Championship 2009', 'Card', 'Konami', 78, 2009),
(28, 'Castlevania: Portrait of Ruin', 'Action', 'Konami', 87, 2006),
(29, 'Sonic Rush', 'Platform', 'Sega', 84, 2005),
(30, 'Mario vs. Donkey Kong 2: March of the Minis', 'Puzzle', 'Nintendo', 81, 2006),
(31, 'Pokemon Platinum', 'Role-Playing', 'Nintendo', 87, 2009),
(32, 'Fifa 09', 'Sports', 'EA Sports', 80, 2008),
(33, 'Assassin\'s Creed: Altair\'s Chronicles', 'Action', 'Ubisoft', 76, 2008),
(34, 'Little Big Planet', 'Puzzle', 'Sony', 84, 2009),
(35, 'Ninja Gaiden: Dragon Sword', 'Action', 'Tecmo', 88, 2008),
(36, 'Rhythm Heaven', 'Music', 'Nintendo', 85, 2009),
(37, 'The Legend of Zelda: Four Swords Adventures', 'Adventure', 'Nintendo', 78, 2004),
(38, 'The Sims 2: Pets', 'Simulation', 'EA Games', 82, 2006),
(39, 'Harvest Moon: Island of Happiness', 'Simulation', 'Natsume', 80, 2008),
(40, 'Castlevania: Circle of the Moon', 'Action', 'Konami', 83, 2001),
(41, 'Inazuma Eleven', 'Role-Playing', 'Level-5', 75, 2008),
(42, 'Super Scribblenauts', 'Puzzle', 'Warner Bros. Interactive Entertainment', 83, 2009),
(43, 'Star Fox Command', 'Action', 'Nintendo', 76, 2006),
(44, 'The Legend of Zelda: Ocarina of Time 3D', 'Adventure', 'Nintendo', 95, 2011),
(45, 'Tetris DS', 'Puzzle', 'Nintendo', 80, 2006),
(46, 'Sonic Colors', 'Platform', 'Sega', 81, 2010),
(47, 'Final Fantasy XII: Revenant Wings', 'Role-Playing', 'Square Enix', 81, 2007),
(48, 'Persona Q: Shadow of the Labyrinth', 'Role-Playing', 'Atlus', 82, 2014),
(49, 'Tales of the Abyss', 'Role-Playing', 'Namco Bandai Games', 88, 2006),
(50, 'Bravely Default', 'Role-Playing', 'Square Enix', 89, 2014),
(51, 'GTA 5', 'Action', 'Rockstar Games', 98, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gamer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `gamer_name`, `password`, `role`) VALUES
(1, 'n01273481@humber.ca', '', 'e16b2ab8d12314bf4efbd6203906ea6c', 'user'),
(2, 'admin@humber.ca', '', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'abc@gmail.com', '', '$2y$10$8MQ43ehAvAenixT/6ZEohumyIRwb9Z/qFh7BN/sCKDVV9AOQUfeXS', 'user'),
(4, 'abcd@gmail.com', '', '$2y$10$DeOI/tOurkU6jEKp4ipzROXRNbQYOyTZVylRoM9H0ZTGptQIRuNTe', 'user'),
(7, 'abcde@gmail.com', '', '$2y$10$UY.iIap/Zl1YOM3CUt9IW.2Y8Ng8YG.UEaOGJYuUs3wU2zRn9KBHK', 'user'),
(8, 'qwert@gmail.com', 'Jupet', '$2y$10$DyHfhGIeMtwBY05j80VAAeYUH4Sb.EEHy5Bklxn8GB.GPh22JtgmK', 'admin'),
(9, 'anmol@gmail.com', 'Anmol', '$2y$10$ZHD3y4mQ7iexiwBNHD.yUOOsCopM1DyAVC2Ls9oot59JEprw8XliS', 'admin'),
(10, 'raman@gmail.com', 'Raman', '$2y$10$DJAWt0Lw/TZ3OnIasGVuEuGVK7LoooLLbF85QTdxdie6QEdem7MI6', 'admin'),
(11, 'gary@gmail.com', 'Gary', '$2y$10$Iprl6.rwatQh2FrjO7oGR.6EBuNxPh6mz.EL6vORVMm4IgyaOQ376', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamedetails`
--
ALTER TABLE `gamedetails`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamedetails`
--
ALTER TABLE `gamedetails`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
