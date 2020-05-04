USE gamelife;

-- CREATE TABLE competence (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     name VARCHAR(150),
--     content VARCHAR(200)
-- );

-- CREATE TABLE objectif (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     name VARCHAR(150),
--     content VARCHAR(200)
-- );

-- CREATE TABLE image (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     name VARCHAR(150),
--     type VARCHAR(10),
--     category VARCHAR(150)
-- );

-- CREATE TABLE profil (
-- 	id INT PRIMARY KEY NOT NULL auto_increment UNIQUE,
--     profil_image int,
--     competences_amount int,
--     objectifs int,
--     pseudo VARCHAR(150),
--     FOREIGN KEY(objectifs) REFERENCES objectif(id),
--     FOREIGN KEY(profil_image) REFERENCES image(id)
-- );

-- CREATE TABLE user (
-- 	id INT PRIMARY KEY NOT NULL auto_increment UNIQUE,
--     email VARCHAR(70),
-- 	password VARCHAR(150),
--     profil int,
--     FOREIGN KEY(profil) REFERENCES profil(id)
-- );

-- ALTER TABLE profil
-- ADD user_id INT REFERENCES user(id);


-- CREATE TABLE competence_profil (
-- id INT NOT NULL auto_increment UNIQUE,
-- competence_id INT REFERENCES competence_list(id),
-- profil_id INT REFERENCES profil(id),
-- state_evol INT
-- )

-- alter TABLE profil
-- drop FOREIGN key profil_ibfk_3 ;

-- ALTER TABLE profil
-- MODIFY profil_image VARCHAR(150);

-- SELECT * FROM profil;

-- UPDATE profil
-- SET profil_image = 'man-modifier-5ead940d9881e.png'
-- WHERE user_id = 5;

-- CREATE USER 'guest'@'localhost' IDENTIFIED BY 'guest123';
-- GRANT ALL PRIVILEGES ON gamelife.* TO 'guest'@'localhost';

-- ALTER TABLE objectif
-- ADD CONSTRAINT fk_profil_obj_id FOREIGN KEY (profil_id) REFERENCES profil(id);

SELECT * FROM user;
