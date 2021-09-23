--
-- Database: `made4you`
--

-- --------------------------------------------------------
CREATE TABLE `Service` (
  `Service_ID` int(2) NOT NULL PRIMARY KEY,
  `Service_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `ContactUs` (
  `ContactUs_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Service_ID` int(2) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Contact_Number` bigint(10) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Message` varchar(1000) NOT NULL,
  `Creation_Date` date NOT NULL DEFAULT current_timestamp(),
  CONSTRAINT fk_service FOREIGN KEY (Service_ID) REFERENCES Service(Service_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Insert Data into Service Table
--

-- --------------------------------------------------------

INSERT INTO `Service` (`Service_ID`, `Service_Name`) VALUES(1, 'Consultancy');
INSERT INTO `Service` (`Service_ID`, `Service_Name`) VALUES(2, 'Development');
INSERT INTO `Service` (`Service_ID`, `Service_Name`) VALUES(3, 'Videos');
