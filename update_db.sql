CREATE DATABASE rush_MVC;
USE rush_MVC;

CREATE TABLE `users` (
	id BIGINT UNSIGNED AUTO_INCREMENT,
	username varchar(255) DEFAULT NULL,
	password varchar(255) DEFAULT NULL,
	email varchar(50) DEFAULT NULL,
	group tinyint DEFAULT 0,
	status bool default false,
	creation_date datetime,
	modif_date datetime,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
