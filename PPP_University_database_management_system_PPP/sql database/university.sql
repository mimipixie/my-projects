-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 04:13 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `validity` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `validity`, `level`) VALUES
(1, 'mim', 'mim', 0, 1, 1),
(2, 'm', 'm', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aid`
--

CREATE TABLE `aid` (
  `aid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `rsn_of_aid` varchar(250) NOT NULL,
  `approval` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aid`
--

INSERT INTO `aid` (`aid`, `sid`, `rsn_of_aid`, `approval`) VALUES
(9, 101, 'my financial condition is not so good', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `aid1`
--

CREATE TABLE `aid1` (
  `aidid_1` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `rsn_of_aid` varchar(250) NOT NULL,
  `approval` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aid1`
--

INSERT INTO `aid1` (`aidid_1`, `sid`, `rsn_of_aid`, `approval`) VALUES
(9, 102, 'my financial condition is not so good', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookkey` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `writer` varchar(100) DEFAULT NULL,
  `borrow` int(11) DEFAULT NULL,
  `student` varchar(100) DEFAULT NULL,
  `shelfId` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `borrowed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookkey`, `name`, `writer`, `borrow`, `student`, `shelfId`, `place`, `category`, `borrowed`) VALUES
(36, 'aaa', 'bbb', 11, 'N/A', 101, 1, 'ddd', 0),
(37, 'aaa', 'bbb', 11, 'r', 101, 2, 'ddd', 1),
(38, 'aaa', 'bbb', 11, 'N/A', 101, 3, 'ddd', 0),
(39, 'aaa', 'bbb', 11, 'N/A', 101, 4, 'ddd', 0),
(40, 'aaa', 'bbb', 11, 'N/A', 101, 5, 'ddd', 0),
(41, 'baa', 'aaa', 11, 'N/A', 101, 6, 'action', 0),
(42, 'baa', 'aaa', 11, 'N/A', 101, 7, 'action', 0),
(43, 'baa', 'aaa', 11, 'N/A', 101, 8, 'action', 0),
(44, 'baa', 'aaa', 11, 'N/A', 101, 9, 'action', 0),
(45, 'baa', 'aaa', 11, 'N/A', 101, 10, 'action', 0),
(46, 'baa', 'aaa', 11, 'r', 101, 11, 'action', 1),
(47, 'baa', 'aaa', 11, 'N/A', 101, 12, 'action', 0),
(48, 'baa', 'aaa', 11, 'N/A', 101, 13, 'action', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `sid1` varchar(11) DEFAULT NULL,
  `sid2` varchar(11) DEFAULT NULL,
  `sid3` varchar(11) DEFAULT NULL,
  `sid4` varchar(11) DEFAULT NULL,
  `dept` varchar(10) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `username`, `sid1`, `sid2`, `sid3`, `sid4`, `dept`, `password`, `status`, `validity`) VALUES
(1, 'sh', '2017', '1', '60', '01', 'CSE', 'm', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grdsub`
--

CREATE TABLE `grdsub` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `grade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupsec`
--

CREATE TABLE `groupsec` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `file` blob NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listcrs`
--

CREATE TABLE `listcrs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `credits` int(11) NOT NULL,
  `dept` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listcrs`
--

INSERT INTO `listcrs` (`id`, `name`, `code`, `credits`, `dept`) VALUES
(1, 'Networking', 'CSE405', 4, '60');

-- --------------------------------------------------------

--
-- Table structure for table `listdep`
--

CREATE TABLE `listdep` (
  `id` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listdep`
--

INSERT INTO `listdep` (`id`, `did`, `name`, `code`) VALUES
(1, 60, 'Co Sci Engi.', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `listfac`
--

CREATE TABLE `listfac` (
  `id` int(11) NOT NULL,
  `sid1` varchar(11) DEFAULT NULL,
  `sid2` varchar(11) DEFAULT NULL,
  `sid3` varchar(11) DEFAULT NULL,
  `sid4` varchar(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `addr` varchar(50) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listfac`
--

INSERT INTO `listfac` (`id`, `sid1`, `sid2`, `sid3`, `sid4`, `name`, `email`, `designation`, `addr`, `gender`, `validity`) VALUES
(1, '2017', '1', '60', '01', 'shakila', 'm@gmail.com', 'lecturer', '1, AB, Dhaka', 'female', 1);

-- --------------------------------------------------------

--
-- Table structure for table `listroom`
--

CREATE TABLE `listroom` (
  `id` int(11) NOT NULL,
  `rid` varchar(30) NOT NULL,
  `seats` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listroom`
--

INSERT INTO `listroom` (`id`, `rid`, `seats`, `type`) VALUES
(1, '101', 30, 'lecture'),
(2, '501', 40, 'lab'),
(3, '102', 40, 'lecture');

-- --------------------------------------------------------

--
-- Table structure for table `listsec`
--

CREATE TABLE `listsec` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `credits` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `dcode` varchar(5) NOT NULL,
  `seats` int(11) NOT NULL,
  `numstd` int(11) NOT NULL,
  `sem1` varchar(10) NOT NULL,
  `sem2` varchar(10) NOT NULL,
  `rid1` varchar(10) NOT NULL,
  `slot1` varchar(10) NOT NULL,
  `rid2` varchar(10) NOT NULL,
  `slot2` varchar(10) NOT NULL,
  `lid` varchar(10) NOT NULL,
  `slot3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listsec`
--

INSERT INTO `listsec` (`id`, `sid`, `code`, `credits`, `dept`, `dcode`, `seats`, `numstd`, `sem1`, `sem2`, `rid1`, `slot1`, `rid2`, `slot2`, `lid`, `slot3`) VALUES
(1, '1', 'CSE405', 4, 60, 'CSE', 30, 1, 'unknown', '2018', '101', 'M3', '101', 'W3', '501', 'T3'),
(2, '2', 'CSE405', 4, 60, 'CSE', 0, 0, 'unknown', '2018', '', '', '', '', '', ''),
(3, '3', 'CSE405', 4, 60, 'CSE', 0, 0, 'unknown', '2018', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `listslot`
--

CREATE TABLE `listslot` (
  `id` int(11) NOT NULL,
  `tid` varchar(30) NOT NULL,
  `day` varchar(30) NOT NULL,
  `tfrom` varchar(30) NOT NULL,
  `tto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listslot`
--

INSERT INTO `listslot` (`id`, `tid`, `day`, `tfrom`, `tto`) VALUES
(1, 'M3', 'Mon', '3.00', '5.00'),
(2, 'W3', 'Wed', '3.00', '5.00'),
(3, 'T3', 'Tues', '3.00', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `liststd`
--

CREATE TABLE `liststd` (
  `id` int(11) NOT NULL,
  `sid1` varchar(11) DEFAULT NULL,
  `sid2` varchar(11) DEFAULT NULL,
  `sid3` varchar(11) DEFAULT NULL,
  `sid4` varchar(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `addr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liststd`
--

INSERT INTO `liststd` (`id`, `sid1`, `sid2`, `sid3`, `sid4`, `name`, `email`, `gender`, `validity`, `addr`) VALUES
(1, '2017', '1', '60', '001', 'Rohan R', 'm@gmail.com', 'male', 1, '1, AB, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `regfac`
--

CREATE TABLE `regfac` (
  `id` int(11) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `fid` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `rid` varchar(30) NOT NULL,
  `numstd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regfac`
--

INSERT INTO `regfac` (`id`, `cid`, `fid`, `sid`, `rid`, `numstd`) VALUES
(1, 'CSE405', 'sh', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regstd`
--

CREATE TABLE `regstd` (
  `id` int(11) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `stid` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `rid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regstd`
--

INSERT INTO `regstd` (`id`, `cid`, `stid`, `sid`, `rid`) VALUES
(1, 'CSE405', 'r', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `scid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `scholarship_typ` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelfKey` int(11) NOT NULL,
  `shelfId` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `filled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelfKey`, `shelfId`, `size`, `filled`) VALUES
(5, 101, 50, 13),
(6, 102, 50, 0),
(7, 103, 100, 0),
(8, 104, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `sid1` varchar(11) DEFAULT NULL,
  `sid2` varchar(11) DEFAULT NULL,
  `sid3` varchar(11) DEFAULT NULL,
  `sid4` varchar(11) DEFAULT NULL,
  `dept` varchar(10) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `sid1`, `sid2`, `sid3`, `sid4`, `dept`, `password`, `status`, `validity`) VALUES
(1, 'r', '2017', '1', '60', '001', 'CSE', 'r', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aid`
--
ALTER TABLE `aid`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `aid1`
--
ALTER TABLE `aid1`
  ADD PRIMARY KEY (`aidid_1`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookkey`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grdsub`
--
ALTER TABLE `grdsub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listcrs`
--
ALTER TABLE `listcrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listdep`
--
ALTER TABLE `listdep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listfac`
--
ALTER TABLE `listfac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listroom`
--
ALTER TABLE `listroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listsec`
--
ALTER TABLE `listsec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listslot`
--
ALTER TABLE `listslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liststd`
--
ALTER TABLE `liststd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regfac`
--
ALTER TABLE `regfac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regstd`
--
ALTER TABLE `regstd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelfKey`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aid`
--
ALTER TABLE `aid`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `aid1`
--
ALTER TABLE `aid1`
  MODIFY `aidid_1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grdsub`
--
ALTER TABLE `grdsub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listcrs`
--
ALTER TABLE `listcrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listdep`
--
ALTER TABLE `listdep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listfac`
--
ALTER TABLE `listfac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listroom`
--
ALTER TABLE `listroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listsec`
--
ALTER TABLE `listsec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listslot`
--
ALTER TABLE `listslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `liststd`
--
ALTER TABLE `liststd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regfac`
--
ALTER TABLE `regfac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regstd`
--
ALTER TABLE `regstd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelfKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
