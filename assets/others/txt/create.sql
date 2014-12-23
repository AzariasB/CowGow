-- Table qui comprends toutes les activitées possibles
DROP TABLE IF EXISTS activites;
CREATE TABLE activites(
idAct int(32) AUTO_INCREMENT,
saison varchar(32),
nomA varchar(128),
PRIMARY KEY(idAct)
);


-- Table qui comprends tout les emplois (ou plutôt les types d'emplois)
DROP TABLE IF EXISTS emplois;
CREATE TABLE emplois(
nomE varchar(255) NOT NULL,
echelon int(1) NOT NULL,
PRIMARY KEY(nomE)
);


-- Table qui comprends TOUTES les stations de ski en France
DROP TABLE IF EXISTS stations;
CREATE TABLE stations(
idSta int(32) AUTO_INCREMENT NOT NULL,
massif varchar(32) NOT NULL,
nomS varchar(255) NOT NULL,
PRIMARY KEY(idSta)
);



-- Table qui fait le lien entre les stations et les préférences des utilisateurs
DROP TABLE IF EXISTS stations_favorites;
CREATE TABLE stations_favorites(
pseudo varchar(20) NOT NULL,
id_station int(20) UNSIGNED NOT NULL,
PRIMARY KEY(pseudo,id_station),
CONSTRAINT fk_usr FOREIGN KEY (pseudo)
REFERENCES utilisateur(pseudo),
CONSTRAINT fk_station FOREIGN KEY (id_station)
REFERENCES stations(idSta)
);


-- Table qui fait le lien entre les activite et les préférences des utilisateurs.
DROP TABLE IF EXISTS activite_favorites;
CREATE TABLE activite_favorites(
pseudo VARCHAR(20) NOT NULL,
activite varchar(30) NOT NULL,
PRIMARY KEY(pseudo,activite),
CONSTRAINT fk_usr2 FOREIGN KEY (pseudo)
REFERENCES utilisateur(pseudo),
CONSTRAINT fk_activite FOREIGN KEY(activite)
REFERENCES activites(nomA)
);