CREATE DATABASE hikesvictoria;

USE hikesvictoria;

CREATE TABLE hikes (
    hikeid INT AUTO_INCREMENT PRIMARY KEY,
    hikename VARCHAR(255),
    description TEXT,
    caption VARCHAR(255),
    distance float(53),
    level VARCHAR(50),
    location VARCHAR(255),
    image TEXT DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;