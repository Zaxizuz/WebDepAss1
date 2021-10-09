SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS CMS;
CREATE DATABASE CMS;

USE CMS;

CREATE TABLE User(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(100),
    password varchar(100),
    role varchar(100),
    active boolean NOT NULL DEFAULT 1
) AUTO_INCREMENT = 1;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON CMS.User TO dbadmin@localhost;

INSERT INTO User(username,password,role) VALUES('david_abbott','password1','administrator');
INSERT INTO User(username,password,role) VALUES('marian_tilly','password2','manager');
INSERT INTO User(username,password,role) VALUES('jessica_packer','password3','administrator');
INSERT INTO User(username,password,role) VALUES('tom_lee','password4','manager');
INSERT INTO User(username,password,role) VALUES('bob_kaur','password5','manager');
INSERT INTO User(username,password,role) VALUES('tony_tran','password6','manager');
INSERT INTO User(username,password,role) VALUES('kate_ren','password7','manager');
INSERT INTO User(username,password,role) VALUES('lucas_ali','password8','manager');
INSERT INTO User(username,password,role) VALUES('shane_johnson','password9','manager');
INSERT INTO User(username,password,role) VALUES('jane_ortiz','password10','manager');


/*updaed timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP*/
/*select USER from mysql.user*/
