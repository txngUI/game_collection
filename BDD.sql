CREATE DATABASE IF NOT EXISTS game_collection;  
USE game_collection;

DROP TABLE IF EXISTS BILIOTEQUE;
DROP TABLE IF EXISTS JEUX;
DROP TABLE IF EXISTS UTILISATEUR;


CREATE TABLE UTILISATEUR(
   id_user VARCHAR(50),
   pren_user VARCHAR(50) NOT NULL,
   mail_user VARCHAR(150) CHECK (mail_user LIKE '%@%.%'),
   mdp_user VARCHAR(100) NOT NULL,
   nom_user VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_user)
);

CREATE TABLE JEUX(
   id_jeux VARCHAR(50),
   nom_jeux VARCHAR(50) NOT NULL,
   editeur_jeux VARCHAR(50) NOT NULL,
   date_sorite DATE NOT NULL,
   nom_plateformes VARCHAR(50) NOT NULL,
   img_jeux VARCHAR(200),
   desc_jeux VARCHAR(500) NOT NULL,
   url_site_jeux VARCHAR(200),
   PRIMARY KEY(id_jeux)
);

CREATE TABLE BILIOTEQUE(
   id_user VARCHAR(50),
   id_jeux VARCHAR(50),
   temp_jeux INT CHECK (temp_jeux >= 0),
   PRIMARY KEY(id_user, id_jeux),
   FOREIGN KEY(id_user) REFERENCES UTILISATEUR(id_user),
   FOREIGN KEY(id_jeux) REFERENCES JEUX(id_jeux)
);