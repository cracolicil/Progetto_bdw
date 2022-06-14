CREATE DATABASE libreriaFilm;

USE libreriaFilm;

CREATE TABLE FILM(
  idFilm int NOT NULL AUTO_INCREMENT,
  titolo varchar(255),
  trama varchar(255),
  durata varchar(255),
  anno date,
  PRIMARY KEY (idFilm)
);

CREATE TABLE PERSONE(
  idPersona int NOT NULL AUTO_INCREMENT,
  nome varchar(255),
  cognome varchar(255),
  data_nascita date,
  data_morte date,
  PRIMARY KEY (idPersona)
);

CREATE TABLE GENERI(
  idGenere int NOT NULL AUTO_INCREMENT,
  nome varchar(255),
  PRIMARY KEY (idGenere)
);

CREATE TABLE RUOLO(
  idRuolo int NOT NULL AUTO_INCREMENT,
  idFilm int,
  idPersona int,
  ruolo varchar(255),
  PRIMARY KEY (idRuolo),
  FOREIGN KEY (idFilm) REFERENCES FILM(idFilm),
  FOREIGN KEY (idPersona) REFERENCES PERSONE(idPersona)
);

CREATE TABLE GENEREFILM(
  idGenereFilm int NOT NULL AUTO_INCREMENT,
  idFilm int,
  idGenere int,
  PRIMARY KEY (idGenereFilm),
  FOREIGN KEY (idFilm) REFERENCES FILM(idFilm),
  FOREIGN KEY (idGenere) REFERENCES GENERI(idGenere)
);