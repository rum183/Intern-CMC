
CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullName` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `monney` int(20) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '0',
  `VIP` boolean  NOT NULL DEFAULT '0',
  `timevip` int(20) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '0'
);

CREATE TABLE IF NOT EXISTS `carts` (
`cart_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `code` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `monney` int(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
);



INSERT INTO carts (`code`,`monney`) VALUES ('2222222222','200000');
INSERT INTO carts (`code`,`monney`) VALUES ('3333333333','200000');
INSERT INTO carts (`code`,`monney`) VALUES ('4444444444','500000');
INSERT INTO carts (`code`,`monney`) VALUES ('5555555555','500000');
INSERT INTO carts (`code`,`monney`) VALUES ('6666666666','100000');
INSERT INTO carts (`code`,`monney`) VALUES ('7777777777','100000');
INSERT INTO carts (`code`,`monney`) VALUES ('8888888888','100000');
INSERT INTO carts (`code`,`monney`) VALUES ('9999999999','50000');
INSERT INTO carts (`code`,`monney`) VALUES ('1122334455','50000');
INSERT INTO carts (`code`,`monney`) VALUES ('2233445566','50000');
INSERT INTO carts (`code`,`monney`) VALUES ('3344556677','50000');
INSERT INTO carts (`code`,`monney`) VALUES ('4455667788','100000');
INSERT INTO carts (`code`,`monney`) VALUES ('5566778899','100000');
INSERT INTO carts (`code`,`monney`) VALUES ('1111222233','100000');
INSERT INTO carts (`code`,`monney`) VALUES ('4444555566','100000');

