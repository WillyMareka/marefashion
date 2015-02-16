CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(150) NOT NULL,
  `prod_type` varchar(45) NOT NULL,
  `prod_cat` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `picture` text NOT NULL,
  `comp_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1