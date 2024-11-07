-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 05, 2021 at 05:44 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesscode`
--

CREATE TABLE `accesscode` (
  `access_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesscode`
--

INSERT INTO `accesscode` (`access_code`) VALUES
(12345);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminEmail` varchar(60) DEFAULT NULL,
  `adminPassword` varchar(50) DEFAULT NULL,
  `adminType` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminEmail`, `adminPassword`, `adminType`) VALUES
(1, 'admin@gmail.com', 'admin123', 'master'),
(2, 'zane@gmail.com', 'bqW1E2QRkf', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorId` int(11) NOT NULL,
  `authorName` varchar(50) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `authorBiography` varchar(255) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `authorimg` varchar(50) COLLATE utf8_myanmar_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorId`, `authorName`, `authorBiography`, `authorimg`) VALUES
(1, 'Patric', 'He is a scientist, he wrote many books about science and technology Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagitti', 'authorimg/1.jpg'),
(3, 'Smith', '                                                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.Praesent ma', 'authorimg/_gal_gadot.jpg'),
(4, 'Min Thiha Naing', 'He is a gamer. He is interested in mobile games such as pubg, mobile lengend. He prefers to write gaming books.', 'authorimg/_download.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `bookName` varchar(80) CHARACTER SET utf8 COLLATE utf8_myanmar_ci DEFAULT NULL,
  `bookType` varchar(15) DEFAULT NULL,
  `bookcategoryId` int(11) DEFAULT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_myanmar_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `ratingstar` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
  `bookcoverimg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookName`, `bookType`, `bookcategoryId`, `author`, `price`, `quantity`, `ratingstar`, `description`, `bookcoverimg`) VALUES
(1, 'Elon Musk: Tesla, SpaceX, and the Quest for a Fantastic Future', 'International', 9, 'Vance, Ashlee', 50000, 15, 3, 'In the spirit of Steve Jobs and Moneyball, Elon Musk is both an illuminating and authorized look at the extraordinary life of one of Silicon Valley most exciting, unpredictable, and ambitious entrepreneurs a real-life Tony Stark and a fascinating exploration of the renewal of American invention and its new makers. Elon Musk spotlights the technology and vision of Elon Musk, the renowned entrepreneur and innovator behind SpaceX, Tesla, and SolarCity, who sold one of his Internet companies, PayPal, for $1.5 billion. Ashlee Vance captures the full spectacle and arc of the genius life and work, from his tumultuous upbringing in South Africa.', 'bookcover/c1.jpg'),
(3, 'á€‚á€›á€¯á€™á€…á€­á€¯á€€á€ºá€á€¼á€„á€ºá€¸á€¡á€”á€¯á€•á€Šá€¬', 'Myanmar', 10, 'á€á€»á€™á€ºá€¸á€™á€¼á€±á€·á€á€„á€º', 5000, 30, 5, 'á€’á€®á€…á€¬á€¡á€¯á€•á€ºá€€á€á€±á€¬á€· á€”á€¬á€™á€Šá€ºá€€á€¼á€®á€¸ á€˜á€œá€±á€¬á€·á€‚á€«á€á€…á€ºá€¦á€¸á€–á€¼á€…á€ºá€žá€° Mark Manson á€›á€±á€¸á€žá€¬á€¸á€á€²á€·á€á€²á€· á€†á€­á€¯á€á€²á€· á€…á€¬á€¡á€¯á€•á€ºá€€á€­á€¯ á€˜á€¬á€žá€¬á€•á€¼á€”á€ºá€†á€­á€¯á€‘á€¬á€¸á€á€¬á€•á€² á€–á€¼á€…á€ºá€•á€«á€á€šá€ºá‹ á€…á€á€„á€ºá€‘á€¯á€á€ºá€á€±á€•á€¼á€®á€¸á€á€»á€­á€”á€ºá€€á€”á€± á€¡á€á€¯á€¡á€á€»á€­á€”á€ºá€¡á€‘á€­ á€¡á€€á€¼á€­á€™á€ºá€€á€¼á€­á€™á€º á€•á€¼á€”á€ºá€œá€Šá€ºá€•á€¯á€¶á€”á€¾á€­á€•á€ºá€‘á€¯á€á€ºá€á€±á€á€²á€·á€›á€á€²á€· á€¡á€›á€±á€¬á€„á€ºá€¸á€›á€†á€¯á€¶á€¸ á€…á€¬á€¡á€¯á€•á€ºá€á€…á€ºá€¡á€¯á€•á€ºá€œá€Šá€ºá€¸á€–á€¼á€…á€ºá€•á€¼á€®á€¸ á€œá€°á€™á€¾á€¯á€€á€½á€”á€ºá€šá€€á€ºá€…á€¬á€™á€»á€€á€ºá€”á€¾á€¬á€á€½á€±á€•á€±á€«á€ºá€™á€¾á€¬á€œá€Šá€ºá€¸ á€¡á€±á€¬á€„á€ºá€™á€¼á€„á€ºá€á€²á€·á€á€²á€· á€…á€¬á€¡á€¯á€•á€ºá€á€…á€ºá€¡á€¯á€•á€ºá€•á€² á€–á€¼á€…á€ºá€•á€«á€á€šá€ºá‹ á€˜á€¬á€žá€¬á€•á€¼á€”á€ºá€†á€­á€¯á€žá€° á€á€»á€™á€ºá€¸á€™á€¼á€±á€·á€á€„á€ºá€¸á€€á€á€±á€¬á€· á€˜á€¬á€žá€¬á€•á€¼á€”á€ºá€žá€°á€›á€²á€· á€¡á€™á€¾á€¬á€…á€¬á€™á€¾á€¬ â€œá‚á€áá‡ á€”á€¾á€…á€ºá€€á€¯á€”á€ºá€•á€­á€¯á€„á€ºá€¸ á€¡á€á€»á€­á€”á€ºá€á€½á€±á€Ÿá€¬ á€€á€»á€½á€”á€ºá€á€±á€¬á€·á€ºá€¡á€á€½á€€á€º á€¡á€™á€¾á€±á€¬á€„á€ºá€™á€­á€¯á€€á€ºá€†á€¯á€¶á€¸ á€¡á€á€»á€­á€”á€ºá€á€½á€±á‹ á€¡á€žá€€á€ºá€€ á€žá€¯á€¶á€¸á€†á€šá€ºá€…á€½á€”á€ºá€¸á€…á€½á€”á€ºá€¸áŠ á€˜á€á€€á€­á€¯ á€¡á€¬á€¸á€”á€²á€·á€™á€¬á€”á€ºá€”á€²á€· á€›á€„á€ºá€†á€­á€¯á€„á€ºá€–á€­á€¯á€· á€•á€¼á€„á€ºá€†á€„á€ºá€”á€±á€á€»á€­á€”á€ºáŠ á€™á€‘á€„á€ºá€™á€¾á€á€ºá€‘á€¬á€¸á€á€²á€· á€†á€¯á€¶á€¸á€›á€¾á€¯á€¶á€¸á€™á€¾á€¯ á€á€…á€ºá€á€¯á€€á€¼á€±á€¬á€„á€·á€º á€™á€±á€¬á€„á€ºá€¸á€á€„á€ºá€‘á€¬á€¸á€žá€™á€»á€¾á€á€½á€± á€¡á€€á€¯á€”á€º á€•á€¼á€á€ºá€‘á€½á€€á€ºá€€á€¯á€”á€ºá€á€šá€ºá‹ á€•á€¼á€„á€ºá€†á€„á€ºá€‘á€¬á€¸á€á€²á€·á€¡á€›á€¬ á€¡á€á€±á€¬á€ºá€™á€»á€¬á€¸á€™á€»á€¬á€¸á€€á€œá€Šá€ºá€¸ á€šá€­á€¯á€„á€ºá€”á€²á€·á€”á€²á€· á€–á€¼á€…á€ºá€€á€¯á€”á€ºá€á€šá€ºá‹ á€¡á€›á€¾á€±á€·á€€á€­á€¯ á€†á€€á€ºá€–á€­á€¯á€·á€†á€­á€¯á€á€¬á€œá€Šá€ºá€¸ á€á€±á€á€«á€¸á€á€«á€¸á€›á€šá€ºá‹ á€¡á€²á€’á€®á€¡á€á€»á€­á€”á€ºá€™á€¾á€¬ Mark Manson á€›á€²á€· á€…á€¬á€¡á€¯á€•á€ºá€€á€­á€¯ á€–á€á€ºá€™á€­á€á€šá€ºá‹ á€žá€°á€·á€…á€¬á€¡á€¯á€•á€ºá€€ á€›á€¾á€„á€ºá€¸á€á€šá€ºáŠ á€›á€­á€¯á€¸á€á€šá€ºáŠ á€›á€­á€¯á€„á€ºá€¸á€á€šá€ºá‹              ', 'bookcover/_book2.jpg'),
(4, 'Breach of Peace', 'International', 14, ' Greene', 9000, 18, 5, 'An imperial family is found butchered. Officers of God are called to investigate. Evidence points to a rebel group trying to seed fear into the very heart of the empire itself. Inspector Khlid takes the case and begins a harrowing hunt for those responsible. But when a larger conspiracy comes to light, will Inspector Khlid be able to trust those working within her own precinct?        ', 'bookcover/_c2.jpg'),
(5, 'Boba: Classic, Fun, Refreshing - Bubble Teas to Make at Home', 'International', 12, 'Kwong, Stacey', 10000, 20, 5, 'In Boba , the founders of MILK+T show you how to make classic, fun, and refreshing bubble teas at home, using all-natural ingredients. No matter if you call it boba or bubble tea , this addictive drink that originated in Taiwan in the 1980s has taken the world by storm, with shops popping up on every corner and lines out all their doors. Boba covers all the basics, from brewing tea and making homemade tapioca balls (aka boba) to handcrafting sweeteners , syrups , toppings , and more. Learn how to make: ul li Milk Teas (Thai, black milk, and green milk teas) li li Fruit Teas (strawberry, mango, watermelon, kiwi, pineapple, pomelo, and cucumber teas)', 'bookcover/_c3.jpg'),
(6, 'My Hero Academia, Vol. 4, 4', 'International', 15, ' Horikoshi, Kohei', 10000, 30, 4, 'Midoriya inherits the superpower of the world greatest hero, but greatness won come easy. What would the world be like if 80 percent of the population manifested superpowers called Quirks? Heroes and villains would be battling it out everywhere Being a hero would mean learning to use your power, but where would you go to study? The Hero Academy of course But what would you do if you were one of the 20 percent who were born Quirkless? The U.A. High sports festival is a chance for the budding heroes to show their stuff and find a superhero mentor. The students have already struggled through a grueling preliminary round, but now they have to team up to pr', 'bookcover/_c4.jpg'),
(7, 'Doom: The Politics of Catastrophe', 'International', 1, 'Ferguson, Niall', 6000, 40, 5, 'All disasters are in some sense man-made. Setting the annus horribilis of 2020 in historical perspective, Niall Ferguson explains why we are getting worse, not better, at handling disasters. Disasters are inherently hard to predict. Pandemics, like earthquakes, wildfires, financial crises. and wars, are not normally distributed; there is no cycle of history to help us anticipate the next catastrophe. But when disaster strikes, we ought to be better prepared than the Romans were when Vesuvius erupted, or medieval Italians when the Black Death struck. We have science on our side, after all. Yet in 2020 the responses of many developed countries, including the U                                 	\r\n                                                ', 'bookcover/_c5.jpg'),
(8, 'Magic: A History: From Alchemy to Witchcraft, from the Ice Age to the ', 'International', 1, 'Gosden, Chris', 8000, 15, 3, 'An Oxford professor of archaeology explores the unique history of magic--the oldest and most neglected strand of human behavior and its resurgence today Three great strands of belief run through human history: Religion is the relationship with one god or many gods, masters of our lives and destinies. Science distances us from the world, turning us into observers and collectors of knowledge. And magic is direct human participation in the universe: we have influence on the world around us, and the world has influence on us. Over the last few centuries, magic has developed a bad reputation--thanks to the unsavory tactics of shady practitioners, and to a succeed    	\r\n                                                ', 'bookcover/_c6.jpg'),
(9, 'á€…á€€á€¼á€á€ á€¬á€¡á€›á€¾á€„á€º á€žá€­á€¯á€„á€ºá€¸á€˜á€¯á€›á€„á€º', 'Myanmar', 10, 'á€€á€»á€”á€ºá€¸á€á€°á€€á€»á€­(á€›á€²á€›á€¾á€®á€á', 3000, 20, 3, 'Self-help á€œá€­á€¯á€· á€á€±á€«á€ºá€á€²á€· á€…á€­á€á€ºá€“á€¬á€á€ºá€™á€¼á€¾á€„á€·á€ºá€á€„á€ºá€›á€±á€¸ á€…á€¬á€¡á€¯á€•á€ºá€á€½á€±á€€á€¼á€¬á€¸á€™á€¾á€¬ á€žá€°á€·á€…á€¬á€¡á€¯á€•á€ºá€€ á€‘á€„á€ºá€¸á€‘á€„á€ºá€¸á€€á€¼á€®á€¸ á€–á€¼á€…á€ºá€”á€±á€á€šá€ºá‹ á€žá€°á€·á€…á€¬á€¡á€¯á€•á€ºá€€á€­á€¯ á€–á€á€ºá€•á€¼á€®á€¸á€á€²á€· á€¡á€á€»á€­á€”á€ºá€™á€¾á€¬ á€…á€­á€á€ºá€á€»á€™á€ºá€¸á€žá€¬á€žá€½á€¬á€¸á€á€¬á€á€±á€¬á€· á€™á€Ÿá€¯á€á€ºá€˜á€°á€¸á‹ á€’á€«á€•á€±á€™á€²á€· á€…á€­á€á€ºá€†á€„á€ºá€¸á€›á€²á€™á€¾á€¯á€á€½á€±á€€á€­á€¯ á€•á€­á€¯á€•á€¼á€®á€¸ á€”á€¬á€¸á€œá€Šá€ºá€œá€¬á€á€šá€ºá‹ á€’á€¯á€€á€¹á€á€†á€­á€¯á€á€²á€· á€…á€€á€ºá€šá€”á€¹á€á€›á€¬á€¸á€›á€²á€· á€¡á€žá€±á€¸á€…á€­á€á€ºá€œá€Šá€ºá€•á€á€ºá€•á€¯á€¶á€á€½á€±á€€á€­á€¯ á€žá€˜á€±á€¬á€•á€±á€«á€€á€ºá€œá€¬á€á€šá€ºá‹ á€•á€¼á€¿á€”á€¬á€á€½á€±á€€á€­á€¯ á€…á€”á€…á€ºá€€á€»á€€á€» á€›á€„á€ºá€†á€­á€¯á€„á€ºá€–á€­á€¯á€· á€•á€­á€¯á€žá€­á€œá€¬á€á€šá€ºâ€ á€œá€­á€¯á€· á€›á€±á€¸á€žá€¬á€¸á€‘á€¬á€¸á€á€²á€· á€…á€¬á€¡á€¯á€•á€º á€á€…á€ºá€¡á€¯á€•á€ºá€œá€Šá€ºá€¸ á€–á€¼á€…á€ºá€•á€«á€á€šá€ºá‹ á€†á€¯á€¶á€¸á€›á€¾á€¯á€¶á€¸á€™á€¾á€¯á€á€½á€±á€€á€­á€¯á€†á€­á€¯á€á€¬ á€’á€®á€”á€±á€·á€á€±á€á€º á€€á€¬á€œá€€á€¼á€®á€¸á€™á€¾á€¬ á€œá€°á€„á€šá€ºá€á€½á€± á€›á€¾á€±á€¬á€„á€ºá€™á€›á€á€²á€· á€¡á€›á€¬á€á€…á€ºá€á€¯á€œá€­á€¯ á€›á€¾á€­á€”á€±á€á€²á€·á€•á€¼á€®á€™á€­á€¯á€· á€¡á€²á€’á€® á€†á€¯á€¶á€¸á€›á€¾á€¯á€¶á€¸á€™á€¾á€¯á€á€½á€±á€€á€­á€¯ á€‚á€›á€¯á€™á€…á€­á€¯á€€á€ºá€˜á€² á€œá€€á€ºá€á€½á€±á€·á€€á€»á€€á€» á€›á€„á€ºá€†á€­á€¯á€„á€ºá€”á€­á€¯á€„á€ºá€–á€­á€¯á€· á€…á€­á€á€ºá€“á€¬á€á€ºá€™á€¬á€€á€¼á€±á€¬á€™á€¾á€¯á€™á€»á€­á€¯á€¸ á€›á€›á€¾á€­á€¡á€±á€¬á€„á€º á€™á€½á€±á€¸á€™á€¼á€°á€–á€­á€¯á€· á€œá€­á€¯á€¡á€•á€ºá€á€²á€· á€…á€­á€á€ºá€á€½á€”á€ºá€¡á€¬á€¸á€€á€­á€¯ á€•á€±á€¸á€…á€½á€™á€ºá€¸á€”á€­á€¯á€„á€ºá€™á€šá€·á€º á€…á€¬á€¡á€¯á€•á€ºá€€á€±á€¬á€„á€ºá€¸á€á€…á€ºá€¡á€¯á€•á€ºá€•á€² á€–á€¼á€…á€ºá€•á€«á€á€šá€ºá‹     ', 'bookcover/_c7.jpg'),
(10, 'á€œá€°á€„á€šá€ºá€¡á€™á€±á€¸ á€€á€±á€¬á€„á€ºá€¸á€žá€”á€º á€·á€¡á€–á€¼á€', 'Myanmar', 17, 'á€€á€±á€¬á€„á€ºá€¸á€žá€”á€·á€º', 2000, 20, 5, 'á€†á€›á€¬á€€á€±á€¬á€„á€ºá€¸á€žá€”á€·á€ºá€†á€­á€¯á€›á€„á€º á€œá€°á€„á€šá€ºá€á€½á€±á€¡á€á€½á€€á€º á€˜á€á€¡á€±á€¬á€„á€ºá€™á€¼á€„á€ºá€›á€±á€¸á€”á€²á€· á€•á€á€ºá€žá€€á€ºá€•á€¼á€®á€¸ á€†á€­á€¯á€†á€¯á€¶á€¸á€™á€Ÿá€”á€º á€…á€¬á€™á€»á€­á€¯á€¸á€á€½á€±á€€á€­á€¯ á€¡á€™á€»á€¬á€¸á€†á€¯á€¶á€¸ á€›á€±á€¸á€œá€±á€·á€›á€¾á€­á€á€²á€· á€…á€¬á€›á€±á€¸á€†á€›á€¬á€á€…á€ºá€¦á€¸á€›á€šá€ºá€œá€­á€¯á€· á€á€”á€ºá€‡á€„á€ºá€¸á€…á€¬á€á€»á€…á€ºá€žá€°á€á€­á€¯á€· á€žá€­á€€á€¼á€™á€¾á€¬á€•á€«á‹ á€¡á€á€¯ á€’á€®á€…á€¬á€¡á€¯á€•á€ºá€€á€á€±á€¬á€· á€†á€›á€¬á€·á€€á€­á€¯ á€œá€°á€„á€šá€ºá€á€½á€±á€€ á€žá€°á€á€­á€¯á€· á€žá€­á€á€»á€„á€ºá€á€²á€· á€™á€±á€¸á€á€½á€”á€ºá€¸á€á€½á€±á€™á€±á€¸ áŠ á€†á€›á€¬á€€ á€•á€¼á€”á€ºá€–á€¼á€±á€á€²á€· á€¡á€„á€ºá€á€¬á€—á€»á€°á€¸ á€¡á€™á€±á€¸á€¡á€–á€¼á€±á€á€½á€±á€€á€­á€¯ á€–á€á€ºá€›á€¾á€¯á€›á€•á€«á€œá€­á€™á€·á€ºá€™á€šá€ºá‹ á€á€­á€¯á€á€­á€¯á€›á€¾á€„á€ºá€¸á€›á€¾á€„á€ºá€¸á€”á€²á€· á€‘á€­á€›á€±á€¬á€€á€ºá€á€²á€· á€†á€›á€¬á€·á€›á€²á€· á€¡á€–á€¼á€±á€á€½á€±á€Ÿá€¬ á€…á€¬á€–á€á€ºá€žá€°á€¡á€á€½á€€á€º á€€á€»á€±á€”á€•á€ºá€žá€˜á€±á€¬á€€á€»á€…á€›á€¬á€•á€«á€•á€²á‹ á€˜á€á€™á€¾á€¬ á€˜á€¬á€¡á€›á€±á€¸á€€á€¼á€®á€¸á€†á€¯á€¶á€¸á€œá€²áŠ á€…á€­á€á€ºá€“á€¬á€á€ºá€€á€»á€…á€›á€¬ á€á€½á€±á€·á€€á€¼á€¯á€¶á€œá€¬á€á€²á€·á€¡á€á€«áŠ á€¡á€á€»á€…á€ºá€†á€­á€¯á€á€¬á€˜á€¬á€œá€²áŠ á€á€™á€ºá€”á€Šá€ºá€¸á€™á€¾á€¯ á€•á€°á€†á€½á€±á€¸á€œá€½á€™á€ºá€¸á€†á€½á€á€ºá€™á€¾á€¯á€á€½á€± á€á€¶á€…á€¬á€¸á€›á€á€²á€·á€¡á€á€« á€˜á€šá€ºá€¡á€›á€¬á€”á€²á€· á€€á€¯á€…á€¬á€¸á€žá€„á€·á€ºá€•á€«á€žá€œá€²áŠ á€¡á€±á€¬á€„á€ºá€™á€¼á€„á€ºá€™á€¾á€¯á€Ÿá€¬ á€˜á€á€›á€²á€· á€á€€á€šá€º á€¡á€›á€±á€¸á€•á€«á€á€²á€·á€¡á€›á€¬á€œá€¬á€¸áŠ á€¡á€á€½á€±á€¸á€¡á€á€±á€«á€ºá€™á€¼á€„á€·á€ºá€™á€¬á€¸á€–á€­á€¯á€· á€˜á€¬á€á€½á€±á€œá€¯á€•á€ºá€›á€™á€œá€²áŠ á€œá€°á€á€…á€ºá€šá€±á€¬á€€á€ºá€›á€²á€·á€˜á€ á€¡á€±á€¬á€„á€ºá€™á€¼á€„á€ºá€–á€­á€¯á€·á€¡á€á€½á€€á€º á€˜á€¬á€¡á€›á€±á€¸á€€á€¼á€®á€¸á€†á€¯á€¶á€¸á€œá€²áŠ á€…á€¬á€–á€á€ºá€•á€¯á€¶ á€…á€¬á€–á€á€ºá€”á€Šá€ºá€¸ á€›á€¾á€­á€•á€«á€žá€œá€¬á€¸ á€˜á€šá€ºá€œá€­á€¯á€™á€»á€­á€¯á€¸ á€–á€á€ºá€›á€™á€œá€²áŠ á€¡á€„á€ºá€¹á€‚á€œá€­á€•á€ºá€…á€¬ á€á€±á€¬á€ºá€á€»á€„á€ºá€á€á€ºá€á€»á€„á€ºá€á€šá€º á€˜á€šá€ºá€œá€­á€¯á€œá€¯á€•á€ºá€›á€™á€œá€²áŠ á€›á€­á€¯á€¸á€žá€¬á€¸á€™á€¾á€¯á€Ÿá€¬ á€”á€±á€›á€¬á€á€­á€¯á€„á€ºá€¸ á€¡á€žá€¯á€¶á€¸á€á€Šá€·á€ºá€•á€«á€žá€œá€¬á€¸ â€¦                        ', 'bookcover/_c8.jpg'),
(11, 'á€™á€¼á€”á€ºá€™á€¬á€·á€€á€¶á€€á€¼á€™á€¹á€™á€¬ á€”á€¾á€…á€ºá€á€…á€ºá€›', 'Myanmar', 19, 'á€”á€»á€°á€™á€¬á€”á€º(MOTAA)', 5000, 40, 5, 'á€”á€€á€¹á€á€á€¹á€á€á€±á€’á€€á€­á€¯ á€œá€±á€·á€œá€¬á€”á€±á€žá€°á€á€­á€¯á€„á€ºá€¸á€”á€²á€· á€™á€¼á€”á€ºá€™á€¬á€”á€­á€¯á€„á€ºá€„á€¶ á€€á€¶á€€á€¼á€™á€¹á€™á€¬á€€á€­á€¯ á€”á€€á€¹á€á€á€ºá€—á€±á€’á€„á€º á€›á€¾á€¯á€‘á€±á€¬á€„á€·á€ºá€€á€”á€± á€žá€¯á€¶á€¸á€žá€•á€º á€á€½á€€á€ºá€‘á€¯á€á€º á€€á€±á€¬á€€á€ºá€á€»á€€á€ºá€á€»á€‘á€¬á€¸á€á€²á€· á€¡á€›á€±á€¸á€á€€á€¼á€®á€¸ á€€á€­á€…á€¹á€…á€›á€•á€ºá€á€½á€±á€€á€­á€¯ á€žá€­á€á€»á€„á€ºá€žá€°á€á€­á€¯á€„á€ºá€¸ á€™á€–á€¼á€…á€ºá€™á€”á€± á€–á€á€ºá€›á€¾á€¯á€‘á€¬á€¸á€žá€„á€·á€ºá€•á€«á€á€šá€ºá‹ á€’á€®á€…á€¬á€¡á€¯á€•á€ºá€›á€²á€· á€‘á€°á€¸á€á€¼á€¬á€¸á€á€»á€€á€ºá€á€½á€±á€€ - á€€á€»á€™á€ºá€¸á€†á€”á€ºá€†á€”á€º á€…á€¬á€¡á€á€”á€·á€ºá€á€½á€± á€™á€žá€¯á€¶á€¸á€‘á€¬á€¸á€˜á€°á€¸á‹ á€—á€±á€’á€„á€ºá€á€±á€«á€Ÿá€¬á€›á€”á€²á€· á€¡á€€á€»á€½á€™á€ºá€¸á€™á€á€„á€ºá€žá€°á€á€½á€±á€á€±á€¬á€„á€º á€–á€á€ºá€€á€¼á€Šá€·á€ºá€›á€¯á€¶á€”á€²á€· á€¡á€œá€½á€šá€ºá€á€€á€° á€”á€¬á€¸á€œá€Šá€ºá€”á€­á€¯á€„á€ºá€á€šá€ºá‹ á€…á€¬á€¡á€¯á€•á€º á€†á€¯á€¶á€¸á€á€²á€· á€¡á€‘á€­ á€–á€á€ºá€•á€¼á€®á€¸á€á€»á€­á€”á€ºá€™á€¾á€¬á€á€±á€¬á€· á€…á€¬á€–á€á€ºá€žá€°á€Ÿá€¬ á€—á€±á€’á€„á€ºá€•á€Šá€¬á€›á€²á€· á€¡á€”á€¾á€…á€ºá€žá€¬á€› á€žá€˜á€±á€¬á€”á€²á€· á€›á€¾á€±á€¸á€á€±á€«á€Ÿá€¬á€›á€á€½á€±á€€á€­á€¯á€•á€« á€—á€Ÿá€¯á€žá€¯á€á€¡á€”á€±á€”á€²á€· á€”á€¬á€¸á€œá€Šá€ºá€žá€½á€¬á€¸á€™á€šá€ºá‹ á€™á€¼á€”á€ºá€™á€¬á€”á€­á€¯á€„á€ºá€„á€¶ á€á€±á€á€ºá€¡á€†á€€á€ºá€†á€€á€ºá€™á€¾á€¬ á€–á€¼á€á€ºá€€á€»á€±á€¬á€ºá€œá€¬á€á€²á€·á€›á€á€²á€· á€žá€™á€­á€¯á€„á€ºá€¸á€á€„á€º á€¡á€á€€á€ºá€¡á€á€²á€á€½á€±á€”á€²á€·áŠ á€”á€±á€¬á€€á€ºá€•á€­á€¯á€„á€ºá€¸ á€–á€¼á€…á€ºá€œá€¬á€”á€­á€¯á€„á€ºá€á€»á€±á€›á€¾á€­á€á€²á€· á€žá€™á€­á€¯á€„á€ºá€¸ á€›á€¾á€±á€·á€•á€¼á€±á€¸ á€Ÿá€±á€¬á€á€»á€€á€ºá€á€½á€±á€€á€­á€¯ á€•á€¯á€‚á€¹á€‚á€­á€¯á€œá€ºá€…á€½á€²áŠ á€˜á€¬á€…á€½á€²á€Šá€¬á€…á€½á€² á€™á€•á€«á€˜á€² á€”á€€á€¹á€á€á€¹á€á€—á€±á€’ á€•á€Šá€¬á€›á€•á€ºáŠ á€•á€Šá€¬á€›á€¾á€„á€º á€…á€Šá€ºá€¸á€˜á€±á€¬á€„á€ºá€¡á€á€½á€„á€ºá€¸á€€á€”á€± á€á€­á€á€­á€€á€»á€€á€» á€–á€±á€¬á€ºá€•á€¼á€‘á€¬á€¸á€á€²á€· â€˜á€™á€¼á€”á€ºá€™á€¬á€·á€€á€¶á€€á€¼á€™á€¹á€™á€¬ á€”á€¾á€…á€ºá€á€›á€¬â€™ á€†á€±á€¬á€„á€ºá€¸á€•á€«á€¸á€€á€¼á€®á€¸ á€•á€«á€á€„á€ºá€á€šá€ºá‹ á€œá€°á€¡á€™á€»á€¬á€¸á€…á€¯á€¡á€á€½á€€á€º á€”á€¬á€¸á€œá€Šá€ºá€™á€¾á€¯ á€›á€¾á€¯á€•á€ºá€‘á€½á€±á€¸á€á€á€ºá€á€²á€· á€šá€¯á€‚á€ºá€á€½á€±á€€á€­á€¯ á€¡á€žá€±á€¸á€…á€­á€á€º á€›á€¾á€„á€ºá€¸á€•á€¼á€á€»á€€á€ºá€á€½á€±áŠ á€™á€­á€˜á€”á€²á€· á€žá€¬á€¸á€žá€™á€®á€¸áŠ á€‡á€”á€®á€¸á€™á€šá€¬á€¸áŠ á€žá€™á€®á€¸á€žá€¬á€¸á€á€­á€¯á€·á€¡á€€á€¼á€¬á€¸ á€á€¦á€¸á€”á€²á€·á€á€¦á€¸ á€•á€á€ºá€žá€€á€ºá€”á€±á€€á€¼á€›á€á€²á€· á€žá€¶á€žá€›á€¬á€¡á€á€»á€…á€ºá€€á€¼á€½á€±á€¸ á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€á€½á€±á€€á€­á€¯ á€–á€á€ºá€›á€™á€šá€º       ', 'bookcover/_c9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `bookcategoryId` int(11) NOT NULL,
  `bookcategoryName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`bookcategoryId`, `bookcategoryName`) VALUES
(1, 'History'),
(3, 'Horror'),
(5, 'Language book'),
(7, 'Comic'),
(9, 'Science'),
(10, 'Novel'),
(11, 'science and technology'),
(12, 'Cooking'),
(13, 'Biography'),
(14, 'Fiction'),
(15, 'Manga'),
(16, 'Magazine'),
(17, 'Education'),
(18, 'Life'),
(19, 'Political');

-- --------------------------------------------------------

--
-- Table structure for table `bookreview`
--

CREATE TABLE `bookreview` (
  `bookreviewId` int(11) NOT NULL,
  `bookName` varchar(80) CHARACTER SET utf8 COLLATE utf8_myanmar_ci DEFAULT NULL,
  `bookreview` text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
  `bookreviewimg` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookreview`
--

INSERT INTO `bookreview` (`bookreviewId`, `bookName`, `bookreview`, `bookreviewimg`) VALUES
(1, 'Podcasting for Dummies', 'ul li Understand the dos and donts of podcasting li li Produce unique content that attracts listeners li li Build a studio that rivals pro podcasters li ul How to talk your way to the top As more and more people turn to podcasts for entertainment, information, and education, the market for new players has never been bigger--or more competitive. And with corporations and A-list celebs moving in on the action, its more important than ever to know how to stand out from the crowd. Written by two podcasting veterans, this book gives you everything you need to launch a podcast. Get the insider info on how to produce quality audio (and even video)', 'bookcover/just.jpg'),
(3, 'á€›á€á€²á€·á€žá€™á€»á€¾á€¡á€›á€¬á€›á€¬', 'á€žá€¼á€žá€¯á€á€”á€²á€· á€¡á€žá€Šá€ºá€¸á€á€­á€¯á€·á€€ á€žá€°á€„á€šá€ºá€á€»á€„á€ºá€¸á€˜á€á€€á€”á€± á€á€»á€…á€ºá€žá€°á€–á€¼á€…á€ºá€á€²á€·á€€á€¼á€á€šá€º á€†á€­á€¯á€•á€±á€™á€²á€· á€«á€¡á€›á€½á€šá€ºá€œá€½á€”á€ºá€á€»á€…á€ºá€žá€°á€á€½á€±á€œá€­á€¯á€· á€†á€­á€¯á€›á€™á€šá€ºá‹ á€á€€á€šá€ºá€á€±á€¬á€· á€¡á€žá€Šá€ºá€¸á€†á€­á€¯á€á€²á€· á€™á€­á€”á€ºá€¸á€€á€œá€±á€¸á€€ á€¡á€•á€»á€­á€¯á€…á€„á€ºá€á€…á€ºá€šá€±á€¬á€€á€º á€™á€Ÿá€¯á€á€ºá€á€±á€¬á€·á€•á€«á€˜á€°á€¸á‹ á€¡á€žá€€á€º (áá†) á€”á€¾á€…á€ºá€™á€¾á€¬ á€™á€‘á€„á€ºá€™á€¾á€á€ºá€˜á€² á€¡á€­á€™á€ºá€‘á€±á€¬á€„á€ºá€€á€»á€á€²á€·á€•á€¼á€®á€¸ á€€á€œá€±á€¸á€á€…á€ºá€šá€±á€¬á€€á€º á€›á€•á€¼á€®á€¸á€á€»á€­á€”á€ºá€™á€¾ á€á€„á€ºá€•á€½á€”á€ºá€¸á€žá€Šá€º á€€á€½á€šá€ºá€œá€½á€”á€ºá€á€²á€·á€›á€¾á€¬á€•á€¼á€®á€¸ á€™á€¯á€†á€­á€¯á€¸á€™á€„á€šá€ºá€„á€šá€ºá€œá€±á€¸ á€–á€¼á€…á€ºá€á€²á€·á€›á€á€¬á‹ á€žá€™á€®á€¸á€œá€±á€¸ á€¡á€•á€»á€­á€¯á€–á€¼á€”á€ºá€¸á€¡á€›á€½á€šá€ºá€™á€¾á€¬ á€žá€°á€„á€šá€ºá€á€»á€„á€ºá€¸á€–á€¼á€…á€ºá€á€²á€· á€žá€¼á€žá€¯á€á€”á€²á€· á€”á€¬á€¸á€œá€Šá€ºá€™á€¾á€¯á€á€½á€±á€›á€¾á€­á€•á€¼á€®á€¸ á€á€»á€…á€ºá€žá€°á€–á€¼á€…á€ºá€á€²á€·á€á€šá€ºá‹ á€œá€€á€ºá€‘á€•á€ºá€–á€­á€¯á€· á€á€­á€¯á€„á€ºá€•á€„á€ºá€€á€¼á€á€šá€ºá‹ á€’á€«á€•á€±á€™á€²á€· á€žá€°á€á€­á€¯á€·á€¡á€á€»á€…á€ºá€›á€±á€¸á€€ á€‘á€„á€ºá€žá€œá€±á€¬á€€á€º á€™á€œá€½á€šá€ºá€”á€­á€¯á€„á€ºá€•á€«á€˜á€°á€¸á‹ á€¡á€žá€Šá€ºá€¸á€›á€²á€· á€¡á€á€­á€á€ºá€á€½á€±áŠ á€¡á€žá€Šá€ºá€¸á€›á€²á€· á€á€¶á€…á€¬á€¸á€™á€¾á€¯á€á€½á€±áŠ á€¡á€žá€Šá€ºá€¸á€›á€²á€· á€¡á€á€¼á€±á€¡á€”á€±á€á€½á€±á€€ á€žá€¼á€žá€¯á€á€›á€²á€· á€™á€­á€žá€¬á€¸á€…á€¯ á€¡á€žá€­á€¯á€„á€ºá€¸á€¡á€á€­á€¯á€„á€ºá€¸á€¡á€€á€¼á€¬á€¸á€™á€¾á€¬ á€˜á€šá€ºá€œá€±á€¬á€€á€ºá€¡á€‘á€­ á€¡á€”á€¾á€±á€¬á€€á€ºá€¡á€šá€¾á€€á€ºá€•á€±á€¸á€”á€­á€¯á€„á€ºá€™á€œá€²á‹ á€†á€›á€¬á€™ á€œá€™á€„á€ºá€¸á€™á€­á€¯á€™á€­á€¯á€›á€²á€· á€œá€€á€ºá€›á€¬á€€á€±á€¬á€„á€ºá€¸á€á€½á€±á€‘á€²á€€ á€á€…á€ºá€•á€¯á€’á€ºá€–á€¼á€…á€ºá€á€²á€· á€’á€®á€‡á€¬á€á€ºá€œá€™á€ºá€¸á€€ á€€á€¼á€Šá€ºá€”á€°á€¸á€…á€›á€¬áŠ á€œá€½á€™á€ºá€¸á€†á€½á€á€ºá€…á€›á€¬áŠ á€”á€¬á€€á€»á€„á€ºá€…á€›á€¬á€á€½á€± á€¡á€•á€¼á€Šá€·á€ºá€•á€«á€•á€²á‹ á€…á€¬á€á€»á€…á€ºá€žá€°á€á€­á€¯á€·á€¡á€á€½á€€á€ºá€á€±á€¬á€· á€œá€€á€ºá€€á€™á€á€»á€”á€­á€¯á€„á€ºá€œá€±á€¬á€€á€ºá€¡á€±á€¬á€„á€º á€†á€½á€²á€†á€±á€¬á€„á€ºá€¡á€¬á€¸á€•á€¼á€„á€ºá€¸á€…á€±á€™á€šá€·á€º á€…á€¬á€¡á€¯á€•á€ºá€á€…á€ºá€¡á€¯á€•á€ºá€†á€­á€¯á€á€¬á€á€±á€¬á€· á€¡á€¬á€™á€á€¶á€”á€­á€¯á€„á€ºá€•á€«á€á€šá€ºá‹á€žá€¼á€žá€¯á€á€”á€²á€· á€¡á€žá€Šá€ºá€¸á€á€­á€¯á€·á€€ á€žá€°á€„á€šá€ºá€á€»á€„á€ºá€¸á€˜á€á€€á€”á€± á€á€»á€…á€ºá€žá€°á€–á€¼á€…á€ºá€á€²á€·á€€á€¼á€á€šá€º á€†á€­á€¯á€•á€±á€™á€²á€· á€«á€¡á€›á€½á€šá€ºá€œá€½á€”á€ºá€á€»á€…á€ºá€žá€°á€á€½á€±á€œá€­á€¯á€· á€†á€­á€¯á€›á€™á€šá€ºá‹ á€á€€á€šá€ºá€á€±á€¬á€· á€¡á€žá€Šá€ºá€¸á€†á€­á€¯á€á€²á€· á€™á€­á€”á€ºá€¸á€€á€œá€±á€¸á€€ á€¡á€•á€»á€­á€¯á€…á€„á€ºá€á€…á€ºá€šá€±á€¬á€€á€º á€™á€Ÿá€¯á€á€ºá€á€±á€¬á€·á€•á€«á€˜á€°á€¸á‹ á€¡á€žá€€á€º (áá†) á€”á€¾á€…á€ºá€™á€¾á€¬ á€™á€‘á€„á€ºá€™á€¾á€á€ºá€˜á€² á€¡á€­á€™á€ºá€‘á€±á€¬á€„á€ºá€€á€»á€á€²á€·á€•á€¼á€®á€¸ á€€á€œá€±á€¸á€á€…á€ºá€šá€±á€¬á€€á€º á€›á€•á€¼á€®á€¸á€á€»á€­á€”á€ºá€™á€¾ á€á€„á€ºá€•á€½á€”á€ºá€¸á€žá€Šá€º á€€á€½á€šá€ºá€œá€½á€”á€ºá€á€²á€·á€›á€¾á€¬á€•á€¼á€®á€¸ á€™á€¯á€†á€­á€¯á€¸á€™á€„á€šá€ºá€„á€šá€ºá€œá€±á€¸ á€–á€¼á€…á€ºá€á€²á€·á€›á€á€¬á‹ á€žá€™á€®á€¸á€œá€±á€¸ á€¡á€•á€»á€­á€¯á€–á€¼á€”á€ºá€¸á€¡á€›á€½á€šá€ºá€™á€¾á€¬ á€žá€°á€„á€šá€ºá€á€»á€„á€ºá€¸á€–á€¼á€…á€ºá€á€²á€· á€žá€¼á€žá€¯á€á€”á€²á€· á€”á€¬á€¸á€œá€Šá€ºá€™á€¾á€¯á€á€½á€±á€›á€¾á€­á€•á€¼á€®á€¸ á€á€»á€…á€ºá€žá€°á€–á€¼á€…á€ºá€á€²á€·á€á€šá€ºá‹ á€œá€€á€ºá€‘á€•á€ºá€–á€­á€¯á€· á€á€­á€¯á€„á€ºá€•á€„á€ºá€€á€¼á€á€šá€ºá‹ á€’á€«á€•á€±á€™á€²á€· á€žá€°á€á€­á€¯á€·á€¡á€á€»á€…á€ºá€›á€±á€¸á€€ á€‘á€„á€ºá€žá€œá€±á€¬á€€á€º á€™á€œá€½á€šá€ºá€”á€­á€¯á€„á€ºá€•á€«á€˜á€°á€¸á‹ á€¡á€žá€Šá€ºá€¸á€›á€²á€· á€¡á€á€­á€á€ºá€á€½á€±áŠ á€¡á€žá€Šá€ºá€¸á€›á€²á€· á€á€¶á€…á€¬á€¸á€™á€¾á€¯á€á€½á€±áŠ á€¡á€žá€Šá€ºá€¸á€›á€²á€· á€¡á€á€¼á€±á€¡á€”á€±á€á€½á€±á€€ á€žá€¼á€žá€¯á€á€›á€²á€· á€™á€­á€žá€¬á€¸á€…á€¯ á€¡á€žá€­á€¯á€„á€ºá€¸á€¡á€á€­á€¯á€„á€ºá€¸á€¡á€€á€¼á€¬á€¸á€™á€¾á€¬ á€˜á€šá€ºá€œá€±á€¬á€€á€ºá€¡á€‘á€­ á€¡á€”á€¾á€±á€¬á€€á€ºá€¡á€šá€¾á€€á€ºá€•á€±á€¸á€”á€­á€¯á€„á€ºá€™á€œá€²á‹ á€†á€›á€¬á€™ á€œá€™á€„á€ºá€¸á€™á€­á€¯á€™á€­á€¯á€›á€²á€· á€œá€€á€ºá€›á€¬á€€á€±á€¬á€„á€ºá€¸á€á€½á€±á€‘á€²á€€ á€á€…á€ºá€•á€¯á€’á€ºá€–á€¼á€…á€ºá€á€²á€· á€’á€®á€‡á€¬á€á€ºá€œá€™á€ºá€¸á€€ á€€á€¼á€Šá€ºá€”á€°á€¸á€…á€›á€¬áŠ á€œá€½á€™á€ºá€¸á€†á€½á€á€ºá€…á€›á€¬áŠ á€”á€¬á€€á€»á€„á€ºá€…á€›á€¬á€á€½á€± á€¡á€•á€¼á€Šá€·á€ºá€•á€«á€•á€²á‹ á€…á€¬á€á€»á€…á€ºá€žá€°á€á€­á€¯á€·á€¡á€á€½á€€á€ºá€á€±á€¬á€· á€œá€€á€ºá€€á€™á€á€»á€”á€­á€¯á€„á€ºá€œá€±á€¬á€€á€ºá€¡á€±á€¬á€„á€º á€†á€½á€²á€†á€±á€¬á€„á€ºá€¡á€¬á€¸á€•á€¼á€„á€ºá€¸á€…á€±á€™á€šá€·á€º á€…á€¬á€¡á€¯á€•á€ºá€á€…á€ºá€¡á€¯á€•á€ºá€†á€­á€¯á€á€¬á€á€±á€¬á€· á€¡á€¬á€™á€á€¶á€”á€­á€¯á€„á€ºá€•á€«á€á€šá€ºá‹', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
  `userId` int(11) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL,
  `commentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `comment`, `userId`, `bookId`, `commentDate`) VALUES
(2, 'I bought this book. Eventually i knew that this book is really good. ðŸ˜', 1, 1, '2021-07-03'),
(6, 'So goodðŸ¤©', 2, 1, '2021-07-03'),
(7, 'á€¡á€›á€™á€ºá€¸á€™á€­á€¯á€€á€ºá€á€šá€º ðŸ˜Ž', 2, 3, '2021-07-03'),
(8, 'wow wow wow', 1, 1, '2021-07-03'),
(9, 'I prefer this bookðŸ™„', 1, 3, '2021-07-03'),
(11, 'That is cool', 1, 3, '2021-07-03'),
(12, 'blah blah', 1, 9, '2021-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_myanmar_ci DEFAULT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_myanmar_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqId`, `userId`, `question`, `answer`) VALUES
(1, 1, 'What is major process of readers paradise?', '                                                	                                                	Hi, Thank you for asking us. Yah, we mainly serve for book sale.Customers like u can buy books online and after order, we deliver this product to in front of your house.                                                                                                '),
(4, 2, 'How can i find phone number and mail of office?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_myanmar_ci DEFAULT NULL,
  `news` longtext CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
  `uploadedDate` date DEFAULT NULL,
  `newsimg` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `newsTitle`, `news`, `uploadedDate`, `newsimg`) VALUES
(1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-03', 'newsimage/n1.jpg'),
(2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as ', '2021-07-03', 'newsimage/_download.jpg'),
(4, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.                                 ', '2021-07-03', 'newsimage/_bd1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ordercart`
--

CREATE TABLE `ordercart` (
  `orderId` int(11) NOT NULL,
  `orderNo` varchar(50) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
  `phone` varchar(15) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `deliveryType` varchar(10) DEFAULT NULL,
  `paymentType` varchar(10) DEFAULT NULL,
  `bookIds` varchar(225) DEFAULT NULL,
  `quantities` varchar(225) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordercart`
--

INSERT INTO `ordercart` (`orderId`, `orderNo`, `userId`, `address`, `phone`, `orderDate`, `deliveryType`, `paymentType`, `bookIds`, `quantities`, `total`, `status`) VALUES
(2, '20210705-O-kpTm1', 2, 'No.(170), Padamyar road, Hlaing Township, Yangon', '09333343434', '2021-07-05', 'normal', 'online', '9|1', '2|1', 57000, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userNrc` varchar(30) DEFAULT NULL,
  `userDob` date DEFAULT NULL,
  `userGender` varchar(7) DEFAULT NULL,
  `userPhone` varchar(22) DEFAULT NULL,
  `userSocial` text,
  `userPostalcode` varchar(30) DEFAULT NULL,
  `userAddress` text,
  `userProfileimg` varchar(50) DEFAULT NULL,
  `userInterestcat` text,
  `userEmail` varchar(60) DEFAULT NULL,
  `userPassword` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `userNrc`, `userDob`, `userGender`, `userPhone`, `userSocial`, `userPostalcode`, `userAddress`, `userProfileimg`, `userInterestcat`, `userEmail`, `userPassword`) VALUES
(1, 'Mg Mg', '11/GaTaNa(N)111111', '2002-03-23', 'male', '09254325731', 'https://www.facebook.com/steven.linn.3760/', '123456', 'No.16(A) Nawaday road, Dagon, Yangon', 'userprofileimg/1.jpg', 'History and Science Fiction', 'mgmg@gmail.com', 'mgmg123'),
(2, 'Su Su', 'susu@gmail.com', '1997-02-04', 'female', '09333343434', 'www.facebook.com', '432156', 'No.(170), Padamyar road, Hlaing Township, Yangon', 'userprofileimg/_alpha-woman-1024x768.jpeg', 'science fiction, horror,  comic, manga', 'susu@gmail.com', 'susu123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `bookcategoryId` (`bookcategoryId`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`bookcategoryId`);

--
-- Indexes for table `bookreview`
--
ALTER TABLE `bookreview`
  ADD PRIMARY KEY (`bookreviewId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `bookcategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bookreview`
--
ALTER TABLE `bookreview`
  MODIFY `bookreviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordercart`
--
ALTER TABLE `ordercart`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`bookcategoryId`) REFERENCES `bookcategory` (`bookcategoryId`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD CONSTRAINT `ordercart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
