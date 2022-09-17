-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 12:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE IF NOT EXISTS `admin_panel` (
`id` int(10) NOT NULL,
  `datetime` varchar(44) NOT NULL,
  `title` varchar(111) NOT NULL,
  `category` varchar(222) NOT NULL,
  `author` varchar(111) NOT NULL,
  `file` varchar(222) NOT NULL,
  `post` varchar(9999) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `file`, `post`) VALUES
(27, '21-Mar-20, 15:43:38', 'Lorem ipsum 1', 'Notice Board', 'Nafiz Kamal', '1948824_4d6c_4.jpg', '																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero porro neque placeat explicabo dolore suscipit sapiente saepe non harum. Quod neque ipsum veniam autem tempora laboriosam, asperiores quasi rem amet!\r\n														'),
(29, '21-Mar-20, 15:44:06', 'Lorem ipsum 2', 'Notice Board', 'Nafiz Kamal', 'htmlcourse.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero porro neque placeat explicabo dolore suscipit sapiente saepe non harum. Quod neque ipsum veniam autem tempora laboriosam, asperiores quasi rem amet!\r\n							'),
(30, '21-Mar-20, 15:50:14', 'Lorem ipsum 3', '4th Year', 'Md. Farukuzzaman Khan', '_102968357_diverse_politics.jpg', '																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero porro neque placeat explicabo dolore suscipit sapiente saepe non harum. Quod neque ipsum veniam autem tempora laboriosam, asperiores quasi rem amet!\r\n														'),
(31, '21-Mar-20, 15:58:16', 'Lorem ipsum 4', '3rd Year', 'Dr. Ahsan-Ul-Ambia', 'unnamed.jpg', '																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.														'),
(33, '21-Mar-20, 16:54:41', 'Lorem ipsum 5', '2nd Year', 'Sujit Kumar Mondal', 'shutterstock_341707151.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(34, '21-Mar-20, 16:55:16', 'Lorem ipsum 6', '2nd Year', 'A.O.M Asaduzzaman', '650222_0738_12.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(35, '21-Mar-20, 16:55:42', 'Lorem ipsum 7', '2nd Year', 'Md. Nazrul Islam', 'HTML5 CSS3.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(36, '21-Mar-20, 16:55:55', 'Lorem ipsum 8', '4th Year', 'Dr. Md Aktaruzzaman', 'aa.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(37, '21-Mar-20, 16:56:26', 'Lorem ipsum 9', '3rd Year', 'Dr. Md. Robiul Hoque', 'dd.jpg', '																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.														'),
(38, '21-Mar-20, 16:57:15', 'Lorem ipsum 10', '1st Year', 'Md. Mojahidul Islam', 'Tesla-Model-X-Silver.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(39, '21-Mar-20, 16:57:36', 'Lorem ipsum 11', '3rd Year', 'Dr. M. Muntasir Rahman', 'ss.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(40, '21-Mar-20, 16:57:57', 'Lorem ipsum 12', '1st Year', 'Md. Shamim Hossain', 'travelBlogger.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(41, '21-Mar-20, 16:58:19', 'Lorem ipsum 13', 'Notice Board', 'Joyassree Sen', 'food.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(42, '21-Mar-20, 16:58:35', 'Lorem ipsum 14', '1st Year', 'Md. Shohidul Islam', 'ss.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(43, '21-Mar-20, 16:59:03', 'Lorem ipsum 15', '2nd Year', 'Md. Atiqur Rahman', 'Animation.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(44, '21-Mar-20, 16:59:16', 'Lorem ipsum 16', '1st Year', 'Mohammad Alamgir Hossain', '650222_0738_12.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(45, '21-Mar-20, 16:59:48', 'Lorem ipsum 17', '4th Year', 'Bappa Sarkar', 'htmlcourse.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							'),
(46, '21-Mar-20, 17:00:23', 'Lorem ipsum 18', 'Notice Board', 'Md. Habibur Rahman', 'unnamed.jpg', '								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem, perspiciatis cum tempora commodi nostrum officia pariatur ipsa aliquid doloremque, eligendi sapiente esse quos iusto? Excepturi, tempora vel animi itaque.							');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `datetime` varchar(55) NOT NULL,
  `name` varchar(111) NOT NULL,
  `creatorname` varchar(222) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatorname`) VALUES
(11, '21-March-2020, 14:49:12', 'Notice Board', 'Nafiz'),
(12, '21-March-2020, 15:11:09', '1st Year', 'Nafiz'),
(13, '21-March-2020, 15:11:32', '2nd Year', 'Nafiz'),
(14, '21-March-2020, 15:11:54', '3rd Year', 'Nafiz'),
(15, '21-March-2020, 15:12:07', '4th Year', 'Nafiz');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `cname` varchar(222) NOT NULL,
  `cemail` varchar(222) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(111) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `cname`, `cemail`, `comment`, `approvedby`, `status`, `admin_panel_id`) VALUES
(12, '21-Mar-20, 16:24:38', 'Milon Hossain', 'e@mail.com', 'Comment form milon', 'Nafiz', 'ON', 46),
(13, '22-Aug-20, 04:41:13', 'Rosul Ahmed', 'e@mail.com', 'Comment Comment Comment...........................', 'pending', 'OFF', 45);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`id` int(10) NOT NULL,
  `datetime` varchar(55) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(222) NOT NULL,
  `addedby` varchar(111) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `username`, `password`, `addedby`) VALUES
(1, '18-March-2020, 21:47:14', 'Nafiz', 'Kamal', 'Nafiz Kamal'),
(4, '19-March-2020, 06:11:44', 'Rosul', 'Ahmed', 'Kamal'),
(5, '21-March-2020, 15:28:26', 'Md. Farukuzzaman Khan', 'Password', 'Nafiz'),
(6, '21-March-2020, 15:29:24', 'Dr. Ahsan-Ul-Ambia', 'Password', 'Nafiz'),
(7, '21-March-2020, 15:29:44', 'Md. Ibrahim Abdullah', 'Password', 'Nafiz'),
(8, '21-March-2020, 15:30:06', 'Sujit Kumar Mondal', 'Password', 'Nafiz'),
(9, '21-March-2020, 15:30:37', 'A.O.M Asaduzzaman', 'Password', 'Nafiz'),
(10, '21-March-2020, 15:30:57', 'Md. Nazrul Islam', 'Password', 'Nafiz'),
(11, '21-March-2020, 15:31:16', 'Dr. Md Aktaruzzaman', 'Password', 'Nafiz'),
(12, '21-March-2020, 15:31:29', 'Dr. Md. Robiul Hoque', 'Password', 'Nafiz'),
(13, '21-March-2020, 15:34:57', 'Md. Mojahidul Islam', 'Password', 'Nafiz'),
(14, '21-March-2020, 15:35:16', 'Dr. M. Muntasir Rahman', 'Password', 'Nafiz'),
(15, '21-March-2020, 15:35:44', 'Md. Shamim Hossain', 'Password', 'Nafiz'),
(16, '21-March-2020, 15:36:01', 'Joyassree Sen', 'Password', 'Nafiz'),
(17, '21-March-2020, 15:36:20', 'Md. Shohidul Islam', 'Password', 'Nafiz'),
(18, '21-March-2020, 15:36:32', 'Md. Atiqur Rahman', 'Password', 'Nafiz'),
(19, '21-March-2020, 15:36:57', 'Mohammad Alamgir Hossain', 'Password', 'Nafiz'),
(20, '21-March-2020, 15:37:10', 'Bappa Sarkar', 'Password', 'Nafiz'),
(21, '21-March-2020, 15:37:30', 'Md. Habibur Rahman', 'Password', 'Nafiz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
