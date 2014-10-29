CREATE TABLE `aca_address` (
  `address_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('BILLING','SHIPPING') DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(5) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8