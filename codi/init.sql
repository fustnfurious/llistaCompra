
CREATE USER 'compres'@'localhost' IDENTIFIED BY 'compres';
CREATE DATABASE llistaCompra;
ALTER DATABASE llistaCompra CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
GRANT ALL PRIVILEGES ON llistaCompra . * TO 'compres'@'localhost';
USE llistaCompra;
CREATE TABLE persones (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    persona varchar(30) NOT NULL
);
CREATE TABLE productes (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    producte varchar(40) NOT NULL
);
CREATE TABLE compres (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    producte varchar(40) NOT NULL,
    persona varchar(40),
    data date,
    idProd int NOT NULL
);
SELECT * FROM persones;
SELECT * FROM productes;
