CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) NOT NULL,
  `company_location` varchar(150) NOT NULL,
  `comapny_address` varchar(150) NOT NULL,
  `company_pnumber` int(11) NOT NULL,
  `comapny_email` varchar(150) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1