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


INSERT INTO JEUX(`id_jeux`, `nom_jeux`, `editeur_jeux`, `date_sorite`, `nom_plateformes`, `img_jeux`, `desc_jeux`, `url_site_jeux`)  VALUES
   ('0','Read Dead Redemption','Rockstar','2010-05-21','PlayStation 4, Nintendo Switch, PlayStation 3, Xbox 360','https://imgix.bustle.com/inverse/16/f3/df/c4/874e/4810/8715/d64ccb4a70da/ledejpg.jpeg?w=400&h=300&fit=crop&crop=faces&auto=format%2Ccompress','desc',NULL),
   ('1','Read Dead Redemption 2','Rockstar','2018-10-26','PlayStation 4, Xbox One, Google Stadia, Microsoft Windows','https://store-images.s-microsoft.com/image/apps.58752.13942869738016799.078aba97-2f28-440f-97b6-b852e1af307a.95fdf1a1-efd6-4938-8100-8abae91695d6?q=90&w=480&h=270','desc',NULL),
   ('2','Zelda BOTW','Nintendo','2017-04-03','Nintendo Switch, Wii U','https://zelda.nintendo.com/breath-of-the-wild/assets/icons/BOTW-Share_icon.jpg','best jeux ever',NULL),
   ('3','GTA 5','Rockstar','2013-09-17','PlayStation 4, Xbox One, PlayStation 3, Xbox 360, Xbox Series, PlayStation 5, Microsoft Windows, XCloud','https://cdn1.epicgames.com/0584d2013f0149a791e7b9bad0eec102/offer/GTAV_EGS_Artwork_2560x1440_Landscaped%20Store-2560x1440-79155f950f32c9790073feaccae570fb.jpg','desc',NULL)
;