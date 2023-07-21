DROP SCHEMA IF EXISTS EXAMPLE;
DROP DATABASE IF EXISTS EXAMPLE;

CREATE SCHEMA EXAMPLE;

USE EXAMPLE;

CREATE TABLE BOH(
ID INTEGER NOT NULL AUTO_INCREMENT,
MATRICOLA INTEGER NOT NULL,
NOME VARCHAR(50) NOT NULL,
COGNOME VARCHAR(50) NOT NULL,
DIPARTIMENTO VARCHAR(50) NOT NULL,
CONTEGGIO INTEGER NOT NULL,
PRIMARY KEY (ID),
UNIQUE (ID)
);

INSERT INTO BOH (MATRICOLA, DIPARTIMENTO, CONTEGGIO, NOME, COGNOME)
VALUES
  (1, 'Fisica e Scienze della Terra', 2, 'Mario', 'Rossi'),
  (2, 'Economia e management', 1, 'Laura', 'Bianchi'),
  (3, 'Economia e management', 1, 'Luigi', 'Verdi'),
  (4, 'Fisica e Scienze della Terra', 1, 'Giovanni', 'Ferrari'),
  (5, 'Matematica e informatica', 1, 'Giulia', 'Russo'),
  (6, 'Architettura', 2, 'Antonio', 'Esposito'),
  (7, 'Scienze chimiche e farmaceutiche', 1, 'Francesca', 'Romano'),
  (8, 'Fisica e Scienze della Terra', 2, 'Sara', 'Galli'),
  (9, 'Fisica e Scienze della Terra', 1, 'Marco', 'Conti'),
  (10, 'Fisica e Scienze della Terra', 1, 'Martina', 'Leone'),
  (11, 'Morfologia chirurgia e medicina sperimentale', 1, 'Simone', 'Marini'),
  (12, 'Scienze chimiche e farmaceutiche', 2, 'Alessia', 'Cattaneo'),
  (13, 'Ingegneria', 1, 'Lorenzo', 'Rizzo'),
  (14, 'Morfologia chirurgia e medicina sperimentale', 1, 'Valentina', 'Ferri'),
  (15, 'Scienze della vita e biotecnologie', 1, 'Elisa', 'Martini'),
  (16, 'Scienze della vita e biotecnologie', 1, 'Roberto', 'Rossini'),
  (17, 'Economia e management', 1, 'Chiara', 'De Luca'),
  (1, 'Scienze chimiche e farmaceutiche', 1, 'Mario', 'Rossi'),
  (2, 'Architettura', 1, 'Laura', 'Bianchi'),
  (3, 'Giurisprudenza', 1, 'Luigi', 'Verdi'),
  (4, 'Scienze chimiche e farmaceutiche', 1, 'Giovanni', 'Ferrari'),
  (5, 'Economia e management', 1, 'Giulia', 'Russo'),
  (7, 'Scienze biomediche e chirurgico specialistiche', 1, 'Francesca', 'Romano'),
  (9, 'Scienze biomediche e chirurgico specialistiche', 1, 'Marco', 'Conti'),
  (10, 'Ingegneria', 1, 'Martina', 'Leone'),
  (11, 'Fisica e Scienze della Terra', 1, 'Simone', 'Marini');

SELECT MATRICOLA
FROM BOH
GROUP BY MATRICOLA;