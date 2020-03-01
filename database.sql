/* Create Database and Table */


use minersdb;


CREATE TABLE IF NOT EXISTS `miners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `minerIp` varchar(15) NOT NULL,
  `macAddress` varchar(17) NOT NULL,
  `minerType` varchar(30) NOT NULL,
  `plocation` varchar(7) NOT NULL,
  `hashrate` varchar(8) NOT NULL,
  `maxTemp` varchar(8) NOT NULL,
  `farmName` varchar(30) NOT NULL,
  `numCards` varchar(8) NOT NULL,
  `uptime` varchar(6) NOT NULL,
  `poolUser` varchar(30) NOT NULL,
  `comments` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `miners`
--

INSERT INTO `miners` (`id`, `minerIp`, `macAddress`, `minerType`, `plocation`, `hashrate`, `maxTemp`, `farmName`, `numCards`, `uptime`, `poolUser`, `comments`) VALUES
(1, '10.1.2.3', 'aa:bb:cc:dd:ee:ff', 'Antminer S9', '1-1-1-1', '13.50', '70', 'Quincy-Division', '3', '120', 'BTC.Zoomhash', 'empty'),
(2, '10.2.3.4', 'aa:bb:cc:aa:bb:cc', 'Antminer L3', '1-1-1-2', '11.27', '70', 'Quincy-Division', '3', '120', 'BTC.Zoomhash', 'empty');
