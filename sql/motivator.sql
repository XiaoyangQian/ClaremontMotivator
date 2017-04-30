DROP DATABASE IF EXISTS MOTIVATOR;

CREATE DATABASE MOTIVATOR;

USE MOTIVATOR;

CREATE TABLE Users (
  user_id     INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname   VARCHAR(256) NOT NULL,
  lastname    VARCHAR(256) NOT NULL,
  password    VARCHAR(256) NOT NULL,
  email       VARCHAR(256) NOT NULL,
  ready_state INT                   DEFAULT 0 # 0 - not paired yet, 1 - paired but hasn't filled in the tasks for each day, 2 - paired and filled in the tasks, waiting for partner 3 - program has started
);

# user_id1 is always smaller than user_id2
CREATE TABLE Programs (
  program_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id1   INT UNSIGNED NOT NULL,
  user_id2   INT UNSIGNED NOT NULL,
  start_date DATE         NOT NULL,
  FOREIGN KEY (user_id1) REFERENCES Users (user_id),
  FOREIGN KEY (user_id2) REFERENCES Users (user_id)
);

CREATE TABLE ProgramSegments (
  program_segment_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  program_id         INT UNSIGNED NOT NULL,
  day_id             INT          NOT NULL,
  user_id            INT          NOT NULL,
  finished           BOOL,
  title              VARCHAR(1000),
  FOREIGN KEY (program_id) REFERENCES Programs (program_id)
);


INSERT INTO USERS (firstname, lastname, password, email, ready_state)
VALUES ('xiaoyang', 'qian', '$2y$10$Ss490pDsKeaisXz.FClQxOWhLa7ZEzSybtDEJbBVePsaSyTqzNo1a', 'qian@cmc.edu', 2);
INSERT INTO USERS (firstname, lastname, password, email, ready_state)
VALUES ('xiangyu', 'fu', '$2y$10$Ss490pDsKeaisXz.FClQxOWhLa7ZEzSybtDEJbBVePsaSyTqzNo1a', 'fu@cmc.edu', 2);

INSERT INTO Programs (user_id1, user_id2, start_date) VALUES (1, 2, "2017-04-09");

INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 1, 1, FALSE, 'read');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 1, 2, FALSE, 'i-festival');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title)
VALUES (1, 1, 3, FALSE, 'underwater basket weaving');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 1, 4, FALSE, 'procrastinating');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 1, 5, FALSE, 'rehersal');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 1, 6, FALSE, 'sky-diving');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 2, 1, FALSE, 'rehersal');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 2, 2, FALSE, 'sky-diving');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 2, 3, FALSE, 'homework');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 2, 4, FALSE, 'CS');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 2, 5, FALSE, 'be productive');
INSERT INTO ProgramSegments (program_id, user_id, day_id, finished, title) VALUES (1, 2, 6, FALSE, 'not be productive');
