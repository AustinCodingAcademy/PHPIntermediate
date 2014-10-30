/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table aca_product
# ------------------------------------------------------------

LOCK TABLES `aca_product` WRITE;
/*!40000 ALTER TABLE `aca_product` DISABLE KEYS */;

INSERT INTO `aca_product` (`product_id`, `name`, `description`, `image`, `category`, `price`, `date_added`)
VALUES
	(1,'Tibetan Painting','Reproduced here are exquisite paintings of the historical Buddha, bodhisattvas, historical and mythological figures, protectors of the Buddhist law, tutelary deities, as well as rare bardo paintings, black background scrolls, and mandalas. The selection of these sacred paintings which date from the late twelfth to the early twentieth centuries, was made on the basis of their stylistic or iconographic rarity—and their sheer beauty. Very few reproductions of these masterpieces have been published before.','http://ecx.images-amazon.com/images/I/51YS791RQHL.jpg','Books',53.93,'2014-10-30 20:41:38'),
	(2,'Pale Blue Dot: A Vision of the Human Future in Space','In Cosmos, the late astronomer Carl Sagan cast his gaze over the magnificent mystery of the Universe and made it accessible to millions of people around the world. Now in this stunning sequel, Carl Sagan completes his revolutionary journey through space and time.\n\nFuture generations will look back on our epoch as the time when the human race finally broke into a radically new frontier--space. In Pale Blue Dot Sagan traces the spellbinding history of our launch into the cosmos and assesses the future that looms before us as we move out into our own solar system and on to distant galaxies beyond. The exploration and eventual settlement of other worlds is neither a fantasy nor luxury, insists Sagan, but rather a necessary condition for the survival of the human race.\n\n\"TAKES READERS FAR BEYOND Cosmos . . . Sagan sees humanity\'s future in the stars.\"\n--Chicago Tribune','http://ecx.images-amazon.com/images/I/518xPlisLzL.jpg','Books',9.95,'2014-10-30 20:43:12'),
	(3,'The Complete Book of Sushi','The Complete Book of Sushi is the definitive collection of traditional, contemporary and innovative recipes for lovers of this Japanese cuisine. Fresh and delicious, sushi is one of the healthiest foods you can eat, as it\'s low in fat and high in essential vitamins and minerals. Aesthetically pleasing, sushi is also surprisingly simple to make. This practical book will show you how to create beautiful and elegant sushi dishes with ease.\n\nFeaturing a wide variety of recipes for:\nPlanning and preparing a sushi meal\nSushi rolls\nNigiri-sushi\nMolded sushi\nHand-Rolled sushi\nVegetarian sushi\nChirashi-sushi\nWrapped sushi\nSushi rice in fried tofu bags\nSushi in a bowl\nNew sushi\nDrinks, sauces and side dishes','http://ecx.images-amazon.com/images/I/71v02Tdg3NL.jpg','Books',19.86,'2014-10-30 20:44:42'),
	(4,'Apple MacBook Pro MGXA2LL/A 15.4-Inch Laptop with Retina Display','2.2 GHz Quad-Core Intel Core i7 Processor (Turbo Boost up to 3.4 GHz, 6 MB shared L3 cache)\n16 GB 1600 MHz DDR3L RAM; 256 GB PCIe-based Flash Storage\n15.4-inch IPS Retina Display, 2880-by-1800 resolution\nIntel Iris Pro Graphics\nOS X Mavericks, Up to 8 Hours of Battery Life\n','http://ecx.images-amazon.com/images/I/81q3rm8EjhL._SL1500_.jpg','Tech',1899.23,'2014-10-30 20:48:48'),
	(5,'Apple MacBook Air MD711LL/B 11.6-Inch Laptop','1.4 GHz Dual-Core Intel Core i5 (Turbo Boost up to 2.7GHz) with 3MB shared L3 cache\n4 GB of 1600 MHz LPDDR3 onboard memory\n128 GB PCIe-based flash storage\n11.6-inch LED-backlit glossy widescreen display; Intel HD Graphics 5000\nOS X Mavericks; Up to 9 hours of battery life\n','http://ecx.images-amazon.com/images/I/71pqjnfzgkL._SL1500_.jpg','Tech',839.00,'2014-10-30 20:50:29');

/*!40000 ALTER TABLE `aca_product` ENABLE KEYS */;
UNLOCK TABLES;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;