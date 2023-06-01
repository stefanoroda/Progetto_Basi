DROP SCHEMA IF EXISTS BIBLIOTECA;
DROP DATABASE IF EXISTS BIBLIOTECA;

CREATE SCHEMA BIBLIOTECA;


USE BIBLIOTECA;

CREATE TABLE UTENTE(
MATRICOLA INTEGER NOT NULL,
NUMERO_TEL VARCHAR(30) NOT NULL,
CAP INTEGER NOT NULL,
NUMERO VARCHAR(30) NOT NULL,
VIA VARCHAR(50) NOT NULL,
CITTA VARCHAR(50) NOT NULL,
COGNOME VARCHAR(50) NOT NULL,
NOME VARCHAR(50) NOT NULL,
PRIMARY KEY (MATRICOLA),
UNIQUE (MATRICOLA)
);


CREATE TABLE SUCCURSALE(
COD_SUC INTEGER NOT NULL,
DIPARTIMENTO VARCHAR(50) NOT NULL,
VIA VARCHAR(50) NOT NULL,
NUMERO VARCHAR(10) NOT NULL,
CAP INTEGER NOT NULL,
CITTA VARCHAR(50) NOT NULL,
PRIMARY KEY (COD_SUC),
UNIQUE (COD_SUC)
);

CREATE TABLE LIBRO(
COD_LIBRO INTEGER NOT NULL,
TITOLO VARCHAR(100),
ISBN VARCHAR(100) NOT NULL,
LINGUA VARCHAR(100) NOT NULL,
ANNO_PUB INTEGER NOT NULL,
COD_SUC INTEGER NOT NULL,
PRIMARY KEY (COD_LIBRO),
UNIQUE (COD_LIBRO),
FOREIGN KEY (COD_SUC) REFERENCES SUCCURSALE(COD_SUC)
);

CREATE TABLE PRESTITO(
COD_PRESTITO INTEGER NOT NULL,
DATA_PRESTITO DATE NOT NULL,
MATRICOLA INTEGER NOT NULL,
COD_LIBRO INTEGER NOT NULL,
PRIMARY KEY (COD_PRESTITO),
UNIQUE (COD_PRESTITO),
FOREIGN KEY (MATRICOLA) REFERENCES UTENTE(MATRICOLA),
FOREIGN KEY (COD_LIBRO) REFERENCES LIBRO(COD_LIBRO)
);

CREATE TABLE AUTORE(
COD_AUTORE INTEGER NOT NULL,
NOME VARCHAR(50) NOT NULL,
COGNOME VARCHAR(50) NOT NULL,
DATA_NASCITA DATE NOT NULL,
LUOGO_NASCITA VARCHAR(50) NOT NULL,
PRIMARY KEY (COD_AUTORE),
UNIQUE (COD_AUTORE)
);

CREATE TABLE BOOK_AUTHORS(
COD_BOOK_AUTHORS INTEGER NOT NULL,
COD_LIBRO INTEGER NOT NULL,
COD_AUTORE INTEGER NOT NULL,
PRIMARY KEY (COD_BOOK_AUTHORS),
UNIQUE (COD_BOOK_AUTHORS),
FOREIGN KEY (COD_LIBRO) REFERENCES LIBRO(COD_LIBRO),
FOREIGN KEY (COD_AUTORE) REFERENCES AUTORE(COD_AUTORE)
);