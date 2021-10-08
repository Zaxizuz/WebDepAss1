SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS CMS;
CREATE DATABASE CMS;

USE CMS;

CREATE TABLE User(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(100),
    role varchar(100),
    active boolean NOT NULL DEFAULT 1
) AUTO_INCREMENT = 1;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON CMS.User TO dbadmin@localhost;

INSERT INTO User(username,role) VALUES('david_abbott','administrator');
INSERT INTO User(username,role) VALUES('marian_tilly','manager');
INSERT INTO User(username,role) VALUES('jessica_abbott','administrator');
INSERT INTO User(username,role) VALUES('tom_lee','manager');
INSERT INTO User(username,role) VALUES('bob_kaur','manager');
INSERT INTO User(username,role) VALUES('tony_tran','manager');
INSERT INTO User(username,role) VALUES('kate_ren','manager');
INSERT INTO User(username,role) VALUES('lucas_ali','manager');
INSERT INTO User(username,role) VALUES('shane_johnson','manager');
INSERT INTO User(username,role) VALUES('jane_ortiz','manager');




/*updaed timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP*/
