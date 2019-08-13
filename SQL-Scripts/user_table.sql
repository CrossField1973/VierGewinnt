-- phpMyAdmin
-- version 4.8.5

-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `user_table` (
  `name` varchar(20) COLLATE latin1_german1_ci DEFAULT NULL,
  `first_name` varchar(20) COLLATE latin1_german1_ci DEFAULT NULL,
  `nickname` varchar(20) COLLATE latin1_german1_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_german1_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) COLLATE latin1_german1_ci DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;


ALTER TABLE `user_table`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
