CREATE DATABASE youdemy ;

use youdemy;


CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    roleName VARCHAR(25)UNIQUE,
    roleDescription TEXT
);



CREATE TABLE utilisateurs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    role_id INT ,
    Foreign Key (role_id) REFERENCES roles(id)
);

CREATE TABLE categories 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    catgorieName varchar(50),
    categorieDescription Text 
    
);
CREATE TABLE cours 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    titre varchar(50),
    photo varchar(255),
    description varchar (255),
    contenu varchar (255),
    id_categorie int ,
    id_enseignant int ,
    FOREIGN KEY (id_categorie) REFERENCES categories(id),
    FOREIGN KEY (id_enseignant) REFERENCES utilisateurs(id)
    
    
)ENGINE=INNODB;


CREATE Table tag
(
    id int primary key AUTO_INCREMENT,
    nom varchar(50),
    description  TEXT,
    logo varchar(255)

)ENGINE=INNODB;

CREATE TABLE courstags
(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_tags int ,
    id_cours int ,
    FOREIGN  key (id_tags) REFERENCES tag(id),
    FOREIGN  key (id_cours) REFERENCES cours (id) 
);
