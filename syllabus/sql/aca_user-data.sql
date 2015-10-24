LOCK TABLES `aca_user` WRITE;

INSERT INTO `aca_user` (`user_id`, `name`, `username`, `password`, `shipping_address_id`, `billing_address_id`, `last_login`)
VALUES
	(1,'Pha Row','pha','row',1,1,'2014-10-30 20:38:32'),
	(2,'Skid Row','skid','row',2,3,'2014-10-30 20:39:02'),
	(3,'Scare K. Row','scare','row',5,5,'2014-10-30 20:39:32');

UNLOCK TABLES;