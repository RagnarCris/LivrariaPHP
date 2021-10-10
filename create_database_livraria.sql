CREATE DATABASE livraria;

USE livraria;

CREATE TABLE editora(
	id INT NOT NULL AUTO_INCREMENT,
   	nome VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE acervo (
    id INT NOT NULL AUTO_INCREMENT,
    id_editora INT DEFAULT NULL,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(60) NOT NULL,
    ano INT DEFAULT NULL,
    preco DOUBLE(11,2) NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    tipo INT DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_editora) REFERENCES editora(id)
);

INSERT INTO editora (nome) VALUES ('Para Todos');
INSERT INTO editora (nome) VALUES ('Abril');
INSERT INTO editora (nome) VALUES ('Comuna');
INSERT INTO editora (nome) VALUES ('Open Wide');
INSERT INTO editora (nome) VALUES ('Health & Science');