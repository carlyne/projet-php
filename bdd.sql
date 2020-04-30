USE gamelife;


-- CREATE TABLE competence (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     name VARCHAR(150),
--     content VARCHAR(200),
--     evol_state int
-- );

-- CREATE TABLE objectif (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     name VARCHAR(150),
--     content VARCHAR(200),
--     evol_state int
-- );

-- CREATE TABLE image (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     name VARCHAR(150),
--     type VARCHAR(10),
--     category VARCHAR(150)
-- );


-- CREATE TABLE profil (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     profil_image int,
--     competences int,
--     objectifs int,
-- 	FOREIGN KEY(competences) REFERENCES competence(id),
--     FOREIGN KEY(objectifs) REFERENCES objectif(id),
--     FOREIGN KEY(profil_image) REFERENCES image(id)
-- );

-- ALTER TABLE profil
-- ADD pseudo varchar(150);

-- CREATE TABLE user (
-- 	id INT PRIMARY KEY NOT NULL auto_increment,
--     email VARCHAR(70),
-- 	password VARCHAR(150),
--     profil int,
--     FOREIGN KEY(profil) REFERENCES profil(id)
-- );

-- INSERT INTO user (email, password) VALUES('test_user@mail.com', '123456');
-- SELECT * FROM profil;

-- INSERT INTO competence (name, content) VALUES ('nageur hors pair', "peut nager n'importe où, même si c'est pas de l'eau");
-- INSERT INTO competence (name, content) VALUES ('delicate eloquence', "doté d'un sens du dialecte qui ferait passer Maupassant pour un analphabète");

-- ALTER TABLE profil
-- ADD user_id INT REFERENCES user(id);

-- UPDATE profil
-- SET profil.competences = 1
-- FROM profil
-- LEFT JOIN user 
-- 	ON profil.user_id = user.id 
-- WHERE user.id = 1;

-- SELECT * FROM user
-- INNER JOIN profil
-- 	ON profil.user_id = user.id;

-- INSERT INTO profil (user_id) VALUES(2);

DELETE FROM profil WHERE id > 2;
DELETE FROM user WHERE id > 2;
