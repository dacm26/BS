CREATE DATABASE IF NOT EXISTS bookstore;
USE bookstore;

CREATE TABLE book
(idbook INT PRIMARY KEY AUTO_INCREMENT,
isbn INT NOT NULL,
namebook VARCHAR(100) NOT NULL,
year INT NOT NULL,
ideditorial INT NOT NULL);

CREATE TABLE author
(idauthor INT PRIMARY KEY AUTO_INCREMENT,
nameauthor VARCHAR(100) NOT NULL,
nationality VARCHAR(100) DEFAULT "UNKNOWN");

CREATE TABLE bookauthors
(idbook INT NOT NULL,
idauthor INT NOT NULL,
PRIMARY KEY (idbook, idauthor));

CREATE TABLE editorial
(ideditorial INT PRIMARY KEY AUTO_INCREMENT,
nameeditorial VARCHAR(100) NOT NULL,
address VARCHAR(100));
