LOCK TABLES `aca_address` WRITE;

INSERT INTO `aca_address` (`address_id`, `street`, `city`, `state`, `zip`, `date_added`)
VALUES
	(1,'123 Main Street','Austin','TX',78744,'2014-10-30 20:34:49'),
	(2,'456 Kane Street','Austin','TX',73442,'2014-10-30 20:35:08'),
	(3,'1600 Pleasant Valley','Austin','TX',78756,'2014-10-30 20:35:55'),
	(5,'1100 Congress','Austin','TX',78234,'2014-10-30 20:39:18');

UNLOCK TABLES;