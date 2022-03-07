USE libreriaFilm;

CREATE TABLE FILM(
  idFilm int NOT NULL AUTO_INCREMENT,
  titolo varchar(255),
  trama varchar(255),
  durata varchar(255),
  anno date,
  rating int,
  PRIMARY KEY (idFilm),
  FOREIGN KEY (rating) REFERENCES RATINGS(idRating)
)

CREATE TABLE PERSONE(
  idPersona int NOT NULL AUTO_INCREMENT,
  nome varchar(255),
  cognome varchar(255),
  data_nascita date,
  data_morte date,
  PRIMARY KEY (idPersona)
)

CREATE TABLE GENERI(
  idGenere int NOT NULL AUTO_INCREMENT,
  nome varchar(255),
  PRIMARY KEY (idGenere)
)

CREATE TABLE SERIE(
  idSerie int NOT NULL AUTO_INCREMENT,
  nome varchar(255),
  PRIMARY KEY (idSerie)
)

CREATE TABLE RUOLO(
  idFilm,
  idPersona,
  ruolo
)

CREATE TABLE GENEREFILM(
  idFilm,
  idGenere
)

CREATE TABLE SERIEFILM(
  idSerie,
  idFilm,
  tipo,
  sequenza
)
