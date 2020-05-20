CREATE DATABASE prueba_x;
USE prueba_x;
CREATE TABLE categorias(id_cat INTEGER PRIMARY KEY, nombre VARCHAR(40), estado INTEGER DEFAULT 1);

insert into categorias (id_cat,nombre) values(1,'exportacion');
insert into categorias (id_cat,nombre) values(2,'local');

create table productos(id_prod integer, nombre varchar(40), precio numeric (9,2), id_cat integer references categorias, estado integer default 1);

insert into productos (id_prod, nombre, precio, id_cat) values(1,'coca-cola',12.00,1);
insert into productos (id_prod, nombre, precio, id_cat) values(2,'sabritas',10.00,2);

create table roles(id_rol integer primary key,nombre varchar(40));

insert into roles values(1,'administrador');
insert into roles values(2,'sistemas');

create table usuarios(id integer primary key,nombre varchar(40),apellidos varchar(40),username varchar(40),password varchar(40),telefono varchar(40),id_rol integer references roles);


insert into usuarios(id,nombre,apellidos,username,password,telefono,id_rol) values(1,'victor','perez','admin','12345',9625481890,1);
insert into usuarios(id,nombre,apellidos,username,password,telefono,id_rol) values(2,'sandra','lopez','sistem','abcd',9622660175,2);