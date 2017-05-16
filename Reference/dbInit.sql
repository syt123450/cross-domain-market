CREATE DATABASE nebula;
CREATE USER 'nebula'@'localhost' IDENTIFIED BY 'nebulapw';
GRANT ALL ON nebula.* TO 'nebula'@'localhost';


DROP TABLE IF EXISTS `Product`;
CREATE TABLE `Product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `priceOrig` float DEFAULT NULL,
  `priceNew` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `smallPicUrl` varchar(100) DEFAULT NULL,
  `largePicUrl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`productID`)
);



LOCK TABLES `Product` WRITE;
INSERT INTO `Product` (productName, description, priceOrig, priceNew, quantity, smallPicUrl, largePicUrl) VALUES
('C/C++ 101','&*&Quick C/C++ introduction from zero C/C++ knowledge base',29.99,19.99,999,'/Pic/small/cpp.png','/Pic/large/cpp.png'),
('Java 101','&*&Quick Java introduction from zero Java knowledge base',29.99,19.99,999,'/Pic/small/java.png','/Pic/large/java.png'),
('Python 101','&*&Quick Python introduction from zero Python knowledge base',29.99,19.99,999,'/Pic/small/python.png','/Pic/large/python.png'),
('PHP 101','&*&Quick PHP introduction from zero PHP knowledge base',29.99,19.99,999,'/Pic/small/php.png','/Pic/large/php.png'),
('MySQL 101','&*&Quick MySQL introduction from zero MySQL knowledge base',49.99,29.99,999,'/Pic/small/mysql.png','/Pic/large/mysql.png'),
('MongoDB 101','&*&Quick MongoDB introduction from zero MongoDB knowledge base',49.99,29.99,999,'/Pic/small/mongodb.png','/Pic/large/mongodb.png'),
('Redis 101','&*&Quick Redis introduction from zero Redis knowledge base',49.99,29.99,999,'/Pic/small/redis.png','/Pic/large/redis.png'),
('Oracle Database 101','&*&Quick Oracle Database introduction from zero Oracle Database knowledge base',49.99,29.99,999,'/Pic/small/oracle.jpg','/Pic/large/oracle.jpg'),
('SQL Server 101','&*&Quick SQL Server introduction from zero SQL Server knowledge base',49.99,29.99,999,'/Pic/small/sqlserver.png','/Pic/large/sqlserver.png'),
('PHP+MySQL','&*&Combination PHP and MySQL professional Course. &*&Include how to use each techniques, how to apply proper PHP together with MySQL and the advatages of the combination',49.99,29.99,999,'/Pic/small/php_mysql.png','/Pic/large/php_mysql.png');
UNLOCK TABLES;
