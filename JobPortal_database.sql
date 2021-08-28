-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2021 at 02:52 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JobPortal_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` text DEFAULT NULL,
  `profile_pic` text DEFAULT 'user.png',
  `email` text NOT NULL,
  `createdat` date NOT NULL,
  `hash` text DEFAULT NULL,
  `active` int(2) DEFAULT 0,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `contactno` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `password`, `fullname`, `profile_pic`, `email`, `createdat`, `hash`, `active`, `gender`, `dob`, `address`, `role_id`, `contactno`) VALUES
(1, '$2y$10$Z5kxROaqnbO3JB0oDA28Y.wKO3ocIHvkpcN.gmzYMGmjruesse3yO', 'Joe De Martinez', NULL, 'joshuaagyemang1@gmail.com', '0000-00-00', NULL, 1, NULL, NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobposts`
--

CREATE TABLE `applied_jobposts` (
  `id_applied` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_jobposts`
--

INSERT INTO `applied_jobposts` (`id_applied`, `id_jobpost`, `id_user`, `id_company`, `status`, `createdat`) VALUES
(1, 17, 4, 2, NULL, '2021-08-01 09:57:55'),
(2, 19, 4, 2, NULL, '2021-08-06 12:17:18'),
(7, 8, 4, 5, NULL, '2021-08-17 01:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog` text NOT NULL,
  `industry_id` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog`, `industry_id`, `createdby`, `createdat`) VALUES
(1, 'Hey Job Seeker, It\'s Time To Get Up And Get Hired.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 4, '2021-07-21 02:15:00'),
(2, '11 Tips to Help You Get New Clients Through Cold Calling.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 5, '2021-07-21 02:15:00'),
(3, 'Hey Job Seeker, It\'s Time To Get Up And Get Hired.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 4, '2021-07-21 02:15:00'),
(4, '11 Tips to Help You Get New Clients Through Cold Calling.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 5, '2021-07-21 02:15:00'),
(5, 'Hey Job Seeker, It\'s Time To Get Up And Get Hired.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 4, '2021-07-21 02:15:00'),
(6, '11 Tips to Help You Get New Clients Through Cold Calling.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 5, '2021-07-21 02:15:00'),
(7, 'Hey Job Seeker, It\'s Time To Get Up And Get Hired.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 4, '2021-07-21 02:15:00'),
(8, '11 Tips to Help You Get New Clients Through Cold Calling.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nLorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages.', 1, 5, '2021-07-21 02:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `comment`, `createdby`, `createdat`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', 4, '2021-07-15 00:00:00'),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.', 5, '2021-07-15 00:00:00'),
(3, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.', 5, '2021-07-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `name`) VALUES
(1, 'High School Student'),
(2, 'Undergraduate'),
(3, 'Graduate'),
(4, 'Senior Executive(President, CFO, etc)'),
(5, 'Manager/Supervisor of Staff'),
(6, 'Executive(SVP, VP, Department Head, etc)');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(7, 'Agogo', 1),
(48, 'Bekwai', 1),
(49, 'Konongo', 1),
(50, 'Kumasi', 1),
(51, 'Mampong', 1),
(52, 'Mankranso', 1),
(53, 'Obuasi', 1),
(54, 'Ofinso', 1),
(55, 'Tafo', 1),
(56, 'Bechem', 2),
(57, 'Berekum', 2),
(58, 'Duayaw Nkwanta', 2),
(59, 'Kintampo', 2),
(60, 'Sunyani', 2),
(61, 'Techiman', 2),
(62, 'Wenchi', 2),
(63, 'Apam', 3),
(64, 'Cape Coast', 3),
(65, 'Dunkwa', 3),
(66, '	\r\nElmina', 3),
(67, 'Foso', 3),
(68, 'Komenda', 3),
(69, 'Mauri', 3),
(70, 'Mumford', 3),
(71, 'Nyakrom', 3),
(72, 'Okitsiu', 3),
(73, 'Saltpond', 3),
(74, 'Swedru', 3),
(75, 'Winneba', 3),
(76, 'Aburi', 5),
(77, 'Ada', 5),
(78, 'Akim Swedru', 5),
(79, 'Akropong', 5),
(80, 'Asamankese', 5),
(81, 'Begoro', 5),
(82, 'Kade', 5),
(83, 'Kibi', 5),
(84, 'Koforidua', 5),
(85, 'Mpraeso', 5),
(86, 'Nkawkaw', 5),
(87, 'Nsawam', 5),
(88, 'Oda', 5),
(89, 'Somanya', 5),
(90, 'Suhum', 5),
(91, 'Kpandae', 7),
(92, 'Salaga', 7),
(93, 'Savelugu', 7),
(94, 'Tamale', 7),
(95, 'Yendi', 7),
(96, 'Aflao', 10),
(97, 'Anloga', 10),
(98, 'Ho', 10),
(99, 'Hohoe', 10),
(100, 'Keta', 10),
(101, 'Kete-Krachi', 10),
(102, 'Kpandu', 10),
(103, '	\r\nAboso', 4),
(104, 'Anomabu', 4),
(105, 'Axim', 4),
(106, 'Bibiani', 4),
(107, 'Prestea', 4),
(108, 'Sekondi-Takoradi', 4),
(109, 'Shama', 4),
(110, 'Tarkwa', 4),
(111, 'Ejura', 1),
(112, 'Kumawu', 1),
(113, 'Nsuta', 1),
(114, 'Agona', 1),
(115, 'Tepa', 1),
(116, '	\r\nMamponteng', 1),
(117, 'Asokwa', 1),
(119, 'Accra', 6),
(120, 'Tema', 6),
(121, 'Ashaiman', 6),
(122, 'Madina', 6),
(123, 'Teshie', 6),
(124, 'East Legon', 6),
(125, 'Achimota', 6),
(126, 'Dansoman', 6),
(127, 'Adenta', 6),
(128, '	\r\nBolgatanga', 8),
(129, 'Bawku', 8),
(130, 'navrongo', 8),
(131, 'Paga', 8),
(132, 'Zebilla', 8),
(133, 'Sandema', 8),
(134, 'Garu', 8),
(135, 'Binaba', 8),
(136, 'Wiaga', 8),
(137, 'Telania', 8),
(138, 'Sirigu', 8),
(139, 'Tongo', 8),
(140, 'Wa', 9),
(141, 'Tumu', 9),
(142, 'Funsi', 9),
(143, 'Jirapa', 9),
(144, 'Lambussie', 9),
(145, 'Lawra', 9),
(146, 'Kaleo', 9),
(147, 'Pudo', 9),
(148, 'Charia', 9);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `companyname` text NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `address` text DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `contactno` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `createdAt` date NOT NULL,
  `active` int(3) DEFAULT 0,
  `esta_date` date DEFAULT NULL,
  `empno` int(11) DEFAULT NULL,
  `profile_pic` text DEFAULT 'placeholder_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `industry_id`, `companyname`, `role_id`, `address`, `state_id`, `city_id`, `contactno`, `website`, `email`, `password`, `aboutme`, `hash`, `createdAt`, `active`, `esta_date`, `empno`, `profile_pic`) VALUES
(2, 5, 'KGB Limited', 2, 'Kenyase', 3, 112, '0293485439', 'http://hello.com', 'joshuaagyemang1@gmail.com', '$2y$10$eM49mcPlLsLSjtQcRqWQRuW.RDWcCK6Eiyx832hChgRkrhKgqCLmK', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '119024cb6f2ab1b04d4679deb07425ed', '2018-02-28', 1, '2000-12-12', 15, 'ae8224cf835484d83e107c219b3fa019jobsLogo.jpg'),
(4, 6, 'RamSys', 2, 'Kenyase', 6, 49, '0293485439', 'http://hello.com', 'joshuaagyemang@gmail.com', '$2y$10$eM49mcPlLsLSjtQcRqWQRuW.RDWcCK6Eiyx832hChgRkrhKgqCLmK', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '119024cb6f2ab1b04d4679deb07425ed', '2018-02-28', 1, '2000-12-12', 25, 'jobsLogo.jpg'),
(5, 11, 'EOCO', 2, 'Kenyase', 4, 106, '0293485439', 'http://hello.com', 'joshuaagyeman@gmail.com', '$2y$10$eM49mcPlLsLSjtQcRqWQRuW.RDWcCK6Eiyx832hChgRkrhKgqCLmK', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '119024cb6f2ab1b04d4679deb07425ed', '2018-02-28', 1, '2000-12-12', 121, 'jobsLogo.jpg'),
(19, NULL, 'Tom', 2, NULL, NULL, NULL, NULL, NULL, 'tomcruz@gm.co', '$2y$10$bXUYOEIIua1WT/BQ/BEpUOEMPOVKL.YowzGzS1gEzyluPqvPjGbrG', NULL, 'ceedfe0fc2e0d87c84d1cb4ed68f23ea', '2021-08-03', 0, NULL, NULL, 'placeholder_image.png'),
(20, NULL, 'idk', 2, NULL, NULL, NULL, NULL, NULL, 'idk@gh.com', '$2y$10$OPKbxJwuzkSJ8MN.pyyaYeHGsUaZ6VicxclxvnBzv01jU9YGjT3jG', NULL, '47752c3a4108d37ae4ee5dee926626e9', '2021-08-06', 0, NULL, NULL, 'placeholder_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_reviews`
--

CREATE TABLE `company_reviews` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `review` text NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_reviews`
--

INSERT INTO `company_reviews` (`id`, `company_id`, `createdby`, `review`, `createdat`) VALUES
(1, 2, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14'),
(2, 2, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14'),
(3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '2021-07-12 03:07:14'),
(4, 5, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14'),
(5, 4, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14'),
(6, 5, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14'),
(7, 19, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14'),
(8, 19, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt Aliquam erat volutpat.\r\n<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>', '2021-07-12 03:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`) VALUES
(1, 'Associate\'s Degree'),
(2, 'Bachelor\'s Degree'),
(3, 'Master\'s Degree'),
(4, 'Professional Degree'),
(5, 'Doctoral Degree'),
(6, 'High School Student'),
(7, 'Undergraduate');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'Banking Industry'),
(2, 'Pharmaceutical industry'),
(3, 'Construction industry'),
(4, 'Fishing industry'),
(5, 'Timber industry'),
(6, 'Education industry'),
(7, 'Petroleum industry'),
(8, 'Entertainment industry'),
(9, 'Insurance industry'),
(10, 'Food industry'),
(11, 'Health care industry'),
(12, 'Electronics industry'),
(13, 'Film industry'),
(14, 'Broadcasting'),
(15, 'Telecommunications industry'),
(16, 'Transport industry'),
(17, 'Water industry'),
(18, 'Mining and Quarrying'),
(19, '	\r\nComputer and Electronics'),
(20, 'Automobiles, Boats and Motor Vehicle'),
(21, 'Furniture Manufacturing'),
(22, 'Textiles, Apparel and Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` text NOT NULL,
  `industry_id` int(11) NOT NULL,
  `job_status` int(11) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` decimal(10,2) NOT NULL,
  `maximumsalary` decimal(10,2) NOT NULL,
  `state_id` int(3) NOT NULL,
  `city_id` int(3) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `experience` int(2) NOT NULL,
  `edu_qualification` text NOT NULL,
  `skills_ability` text NOT NULL,
  `responsibility` text NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `industry_id`, `job_status`, `description`, `minimumsalary`, `maximumsalary`, `state_id`, `city_id`, `createdat`, `experience`, `edu_qualification`, `skills_ability`, `responsibility`, `deadline`) VALUES
(1, 2, 'Web Designer', 1, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-30'),
(2, 2, 'Nurse', 2, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 55, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(3, 2, 'Web Designer', 3, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 55, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(4, 2, 'Nurse', 4, 3, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 56, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-30'),
(5, 2, 'Web Designer', 5, 3, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 67, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(6, 2, 'Nurse', 6, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 77, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(7, 2, 'Web Designer', 7, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 66, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-30'),
(8, 5, 'Nurse', 12, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-30'),
(9, 2, 'Web Designer', 13, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 63, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(10, 4, 'Nurse', 9, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 48, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-09-01'),
(11, 4, 'Web Designer', 15, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 7, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(12, 5, 'Nurse', 17, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 61, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(13, 5, 'Web Designer', 19, 3, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 52, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(14, 5, 'Nurse', 8, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 98, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(15, 4, 'Web Designer', 16, 3, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 112, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-30');
INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `industry_id`, `job_status`, `description`, `minimumsalary`, `maximumsalary`, `state_id`, `city_id`, `createdat`, `experience`, `edu_qualification`, `skills_ability`, `responsibility`, `deadline`) VALUES
(16, 2, 'Nurse', 11, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 102, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(17, 2, 'Web Designer', 1, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 88, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(18, 2, 'Nurse', 2, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 82, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(19, 2, 'Web Designer', 3, 3, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 122, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(20, 2, 'Nurse', 4, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 113, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-15'),
(21, 2, 'Web Designer', 5, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 109, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(22, 2, 'Nurse', 6, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 95, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(23, 2, 'Web Designer', 7, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(24, 5, 'Nurse', 12, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 66, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(25, 2, 'Web Designer', 13, 3, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 67, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(26, 4, 'Nurse', 9, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(27, 4, 'Web Designer', 15, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(28, 4, 'Nurse', 17, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(29, 5, 'Web Designer', 19, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(30, 4, 'Nurse', 8, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18');
INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `industry_id`, `job_status`, `description`, `minimumsalary`, `maximumsalary`, `state_id`, `city_id`, `createdat`, `experience`, `edu_qualification`, `skills_ability`, `responsibility`, `deadline`) VALUES
(31, 5, 'Web Designer', 16, 2, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18'),
(32, 2, 'Nurse', 11, 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nCapitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '670.00', '23333.00', 3, 70, '2018-02-28 11:41:59', 2, 'Masters Degree', 'Commitment – understanding the price and having the willingness to pay that price Taking action – practice Ready, Fire, Aim… You will drift aimlessly until you arrive back at the original dock. You will run aground and become hopelessly stuck in the mud. Belief – believing in yourself and those around you.', 'Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.', '2021-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `type`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Internship');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobposts`
--

CREATE TABLE `saved_jobposts` (
  `id_saved` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_jobposts`
--

INSERT INTO `saved_jobposts` (`id_saved`, `id_jobpost`, `id_user`, `status`, `createdat`) VALUES
(2, 19, 4, 0, '2021-08-01 09:30:12'),
(3, 2, 4, NULL, '2021-08-17 12:54:41'),
(4, 8, 4, NULL, '2021-08-17 01:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Ashanti Region'),
(2, 'Brong-Ahafo Region'),
(3, 'Central Region'),
(4, 'Western Region'),
(5, 'Eastern Region'),
(6, 'Greater Accra Region'),
(7, 'Northern Region'),
(8, 'Upper East Region'),
(9, 'Upper West Region'),
(10, 'Volta Region');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` text DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `city_id` int(3) DEFAULT NULL,
  `state_id` int(3) DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `career_id` int(3) DEFAULT 0,
  `education_id` int(3) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `active` int(3) DEFAULT 0,
  `aboutme` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `profile_pic` text DEFAULT 'user.png',
  `createdat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `email`, `password`, `address`, `headline`, `role_id`, `city_id`, `state_id`, `contactno`, `career_id`, `education_id`, `dob`, `age`, `resume`, `hash`, `active`, `aboutme`, `skills`, `gender`, `profile_pic`, `createdat`) VALUES
(4, 'Joshua Appiah Dadzie', 'joshuaagyemang1@gmail.com', '$2y$10$Z5kxROaqnbO3JB0oDA28Y.wKO3ocIHvkpcN.gmzYMGmjruesse3yO', 'Kenyase', 'System Admin', 1, 49, 1, '0987654321', 4, 3, '1992-12-12', 25, 'ae8224cf835484d83e107c219b3fa019dummy.pdf', '9dcbde588267e43d35c835c1b89c7134', 1, 'Lorem Ipsum is simply dummy text of printing and type setting industry Lorem Ipsum been industry standard', 'Skill 1, Skill 2, Skill 3', 'Male', 'ae8224cf835484d83e107c219b3fa019male6.jpg', '0000-00-00'),
(5, 'Joshua', 'joshuaagyemang@gmail.com', '$2y$10$eM49mcPlLsLSjtQcRqWQRuW.RDWcCK6Eiyx832hChgRkrhKgqCLmK', 'Kenyase', 'Banker', 1, 50, 1, '0554252698', 3, 2, '1992-12-22', 25, 'sample.pdf', 'c5e8fafe2c0ef7307b76c3b40c1e15d4', 1, 'DeveloperLorem Ipsum is simply dummy text of printing and type setting industry Lorem Ipsum been industry standard dummy text ever since.', 'Communication skills, Multi-tasking, Typist, Advising', 'Male', 'user.png', '0000-00-00'),
(6, 'Joshua', 'joshuaagyeman@gmail.com', '$2y$10$eM49mcPlLsLSjtQcRqWQRuW.RDWcCK6Eiyx832hChgRkrhKgqCLmK', 'Kenyase', 'Nurse', 1, 50, 1, '0554252698', 3, 2, '1992-12-22', 25, 'sample.pdf', 'c5e8fafe2c0ef7307b76c3b40c1e15d4', 1, 'DeveloperLorem Ipsum is simply dummy text of printing and type setting industry Lorem Ipsum been industry standard dummy text ever since.', 'Communication skills, Multi-tasking, Typist, Advising', 'Male', 'male6.jpg', '0000-00-00'),
(13, 'Tom', 'tomcruz@gm.co', '$2y$10$HaslSwqAuZAFrKfOkJs0KOSbCtI3sjYNjNCtiYz.vkWv3MvgvMiWi', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sample.pdf', 'f33a8f2f7da7008ebdba96998e1cfa1f', 1, NULL, NULL, NULL, 'fddca542341fdbf0811aa127521d046cuser.png', '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'jobseeker'),
(2, 'recruiter'),
(3, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `applied_jobposts`
--
ALTER TABLE `applied_jobposts`
  ADD PRIMARY KEY (`id_applied`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `industry_id` (`industry_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `state_id_2` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `company_reviews`
--
ALTER TABLE `company_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobposts`
--
ALTER TABLE `saved_jobposts`
  ADD PRIMARY KEY (`id_saved`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_jobposts`
--
ALTER TABLE `applied_jobposts`
  MODIFY `id_applied` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `company_reviews`
--
ALTER TABLE `company_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saved_jobposts`
--
ALTER TABLE `saved_jobposts`
  MODIFY `id_saved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
