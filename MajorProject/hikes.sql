CREATE TABLE `hikes` (
  `hikeid` int(11) NOT NULL AUTO_INCREMENT,
  `hikename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `distance` double NOT NULL,
  `location` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `username` varchar(255),
  PRIMARY KEY(`hikeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table users
(
  userID serial primary key,
  username varchar(30),
  password char(40),
  reg_date datetime
);
