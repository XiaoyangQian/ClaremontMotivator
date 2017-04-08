DROP DATABASE IF EXISTS MOTIVATOR;

CREATE DATABASE MOTIVATOR;

USE MOTIVATOR;

CREATE TABLE Users (
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(256) NOT NULL,
	lastname VARCHAR(256) NOT NULL,
	school VARCHAR(256) NOT NULL
);

CREATE TABLE Pairs (
	pair_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id1 INT UNSIGNED NOT NULL,
	user_id2 INT UNSIGNED NOT NULL,
	FOREIGN KEY (user_id1) REFERENCES Users(user_id),
	FOREIGN KEY (user_id2) REFERENCES Users(user_id)
);

CREATE TABLE Tasks (
	week DATE NOT NULL,
	weekday VARCHAR (256) NOT NULL,
	pair_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (pair_id) REFERENCES Pairs(pair_id),
	task1 VARCHAR(1000) ,
	task2 VARCHAR(1000) ,
	task1_check BOOLEAN NOT NULL DEFAULT 0,
	task2_check BOOLEAN NOT NULL DEFAULT 0
);

INSERT INTO USERS (firstname, lastname, school) VALUES ('xiaoyang', 'qian', 'CMC');
INSERT INTO USERS (firstname, lastname, school) VALUES ('xiangyu', 'fu', 'CMC');
INSERT INTO Pairs (user_id1, user_id2) VALUES (1,2);
INSERT INTO Tasks (week, weekday, pair_id, task1, task2) VALUES (2017-04-09, 'Sun.', 1, 'read', 'homework');



