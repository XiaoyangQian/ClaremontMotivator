DROP DATABASE IF EXISTS MOTIVATOR;

CREATE DATABASE MOTIVATOR;

USE MOTIVATOR;

CREATE TABLE Users (
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(256) NOT NULL,
	lastname VARCHAR(256) NOT NULL,
	school VARCHAR(256) NOT NULL,
	partner_id INT UNSIGNED,
	FOREIGN KEY (partner_id) REFERENCES Users(user_id)
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
	user_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (user_id) REFERENCES Users(user_id),
	task VARCHAR(1000) ,
	task_check BOOLEAN NOT NULL DEFAULT 0
);

INSERT INTO USERS (firstname, lastname, school) VALUES ('xiaoyang', 'qian', 'CMC');
INSERT INTO USERS (firstname, lastname, school) VALUES ('xiangyu', 'fu', 'CMC');
UPDATE USERS SET partner_id = 2 WHERE user_id = 1;
UPDATE USERS SET partner_id = 1 WHERE user_id = 2;
INSERT INTO Pairs (user_id1, user_id2) VALUES (1,2);
INSERT INTO Tasks (week, weekday, user_id, task) VALUES (2017-04-09, 'Sun.', 1, 'read');
INSERT INTO Tasks (week, weekday, user_id, task) VALUES (2017-04-09, 'Sun.', 2, 'i-festival');
INSERT INTO Tasks (week, weekday, user_id, task) VALUES (2017-04-09, 'Mon.', 1, 'underwater basket weaving');
INSERT INTO Tasks (week, weekday, user_id, task) VALUES (2017-04-09, 'Mon.', 2, 'procrastinating');
INSERT INTO Tasks (week, weekday, user_id, task) VALUES (2017-04-09, 'Wed.', 1, 'rehersal');
INSERT INTO Tasks (week, weekday, user_id, task) VALUES (2017-04-09, 'Wed.', 2, 'sky-diving');


