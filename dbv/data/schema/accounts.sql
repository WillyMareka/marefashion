CREATE TABLE `accounts` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `residence` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1