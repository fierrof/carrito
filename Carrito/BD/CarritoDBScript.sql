Drop Database CarritoDB

CREATE DATABASE CarritoDB;
USE CarritoDB;

CREATE TABLE tipo_usuario (
  id_tipo_usuario INT NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  PRIMARY KEY (id_tipo_usuario)
);
CREATE TABLE usuario
(
id_usuario INT NOT NULL AUTO_INCREMENT,
nombre NVARCHAR(50),
apellido NVARCHAR(50),
email NVARCHAR(50),
pass NVARCHAR(50) NOT NULL,
id_tipo_usuario INT NOT NULL,
PRIMARY KEY (id_usuario),
FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id_tipo_usuario)
);
CREATE TABLE producto
(
id_producto INT NOT NULL AUTO_INCREMENT,
nombre NVARCHAR(50) NOT NULL,
cantidad INT NOT NULL,
precio DOUBLE NOT NULL,
descripcion NVARCHAR(512),
image NVARCHAR(255),
id_usuario INT NOT NULL,
PRIMARY KEY (id_producto),
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);


INSERT INTO tipo_usuario (nombre) VALUES ('Admin');
INSERT INTO tipo_usuario (nombre) VALUES ('User');

INSERT INTO usuario (nombre,apellido,email,pass,id_tipo_usuario) VALUES ('Admin','Admin','admin','admin',1);
INSERT INTO usuario (nombre,apellido,email,pass,id_tipo_usuario) VALUES ('test','test','test@gmail.com','123',2);
INSERT INTO producto (nombre, cantidad, precio, descripcion, image, id_usuario) VALUES ('prod1', 50,25,'','images/prod1.jpg',2);
INSERT INTO producto (nombre, cantidad, precio, descripcion, image, id_usuario) VALUES ('prod2', 4,100,'','images/prod2.jpg',2);
INSERT INTO producto (nombre, cantidad, precio, descripcion, image, id_usuario) VALUES ('prod3', 200,15,'','images/prod3.jpg',2);
INSERT INTO producto (nombre, cantidad, precio, descripcion, image, id_usuario) VALUES ('prod4', 25,300,'','images/prod4.jpg',1);

select*from usuario

select*from producto

SELECT * FROM producto WHERE id_usuario = 1