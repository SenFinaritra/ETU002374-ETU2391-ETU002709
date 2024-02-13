DROP DATABASE The;

CREATE DATABASE The;

USE The;

CREATE TABLE Tclients(
   id INT auto_increment,
   nom VARCHAR(50)  NOT NULL,
   email VARCHAR(100)  NOT NULL,
   fonction INT,
   password VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(email)
);

CREATE TABLE TvarieteThe(
   id INT auto_increment,
   nom VARCHAR(50)  NOT NULL,
   occupation DECIMAL(15,2)   NOT NULL,
   rendement DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Tparcelles(
   id INT auto_increment,
   numero VARCHAR(50)  NOT NULL,
   surface DECIMAL(15,2)   NOT NULL,
   idVariete INT,
   quantitedisponible DECIMAL(15,2) NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(numero)
);

CREATE TABLE Tceuilleurs(
   id INT auto_increment,
   nom VARCHAR(50)  NOT NULL,
   genre VARCHAR(50)  NOT NULL,
   dateNaissance DATE NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE TcategorieDepense(
   id INT auto_increment,
   nomdepense VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Tsalaire(
   id INT auto_increment,
   idThe int,
   salaire DECIMAL(15,2) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Tceuillettes(
   id INT auto_increment,
   dateCeuillette date,
   idCeuilleur INT,
   idParcelle INT,
   poids DECIMAL(15,2) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Tdepenses(
   id INT auto_increment,
   dateDepense date,
   idCategorieDepense INT,
   montant DECIMAL(15,2) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Tsaison(
   mois INT ,
   PRIMARY KEY(mois)
);

CREATE TABLE TcontrainteJournaliere(
   poidsMinimal DECIMAL(15,2) NOT NULL,
   bonus DECIMAL(15,2) NOT NULL,
   mallus DECIMAL(15,2) NOT NULL
);

CREATE TABLE TprixVente(
   id int auto_increment,
   idThe int,
   prix DECIMAL(15,2) NOT NULL,
   PRIMARY KEY(id)
);