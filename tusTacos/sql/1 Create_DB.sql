-- Database: Rotonda Virtual
CREATE DATABASE rrotonda;

-- Tables Create

CREATE TABLE rrotonda.clientes (
    id varchar(30) NOT NULL,
    nombre varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rrotonda.pedidos (
    id integer NOT NULL AUTO_INCREMENT,
    estado varchar(20) NOT NULL,
    cliente varchar(30) NOT NULL,
    fecha datetime NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rrotonda.estados (
    tipo varchar(20) NOT NULL,
    PRIMARY KEY (tipo)
);

CREATE TABLE rrotonda.menus (
    id integer NOT NULL AUTO_INCREMENT,
    precio integer NOT NULL,
    nombre varchar(90) NOT NULL,
    personalizado boolean NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rrotonda.pedidos_menus (
    pedido integer NOT NULL,
    menu integer NOT NULL,
    cantidad integer NOT NULL,
    PRIMARY KEY (pedido, menu)
);

CREATE TABLE rrotonda.productos (
    id integer NOT NULL AUTO_INCREMENT,
    nombre varchar(90) NOT NULL,
    categoria varchar(90) NOT NULL,
    precio integer NOT NULL,
    foto varchar(200),
    descripcion varchar(150),
    personalizado boolean NOT NULL,
    existencias integer NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rrotonda.categorias_productos (
    nombre varchar(90) NOT NULL,
    PRIMARY KEY (nombre)
);

CREATE TABLE rrotonda.alternativas_productos (
    producto integer NOT NULL,
    alternativa integer NOT NULL,
    PRIMARY KEY (producto, alternativa)
);

CREATE TABLE rrotonda.ingredientes (
    id integer NOT NULL AUTO_INCREMENT,
    nombre varchar(90) NOT NULL,
    existencias integer NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rrotonda.alternativas_ingredientes (
    ingrediente integer NOT NULL,
    alternativa integer NOT NULL,
    PRIMARY KEY (ingrediente, alternativa)
);

CREATE TABLE rrotonda.pedidos_productos (
    pedido integer NOT NULL,
    producto integer NOT NULL,
    cantidad integer NOT NULL,
    PRIMARY KEY (pedido, producto)
);

CREATE TABLE rrotonda.menus_productos (
    menu integer NOT NULL,
    producto integer NOT NULL,
    PRIMARY KEY (menu, producto)
);

CREATE TABLE rrotonda.productos_ingredientes (
    producto integer NOT NULL,
    ingrediente integer NOT NULL,
    PRIMARY KEY (producto, ingrediente)
);

CREATE TABLE rrotonda.usuarios (
    nombre varchar(30) NOT NULL,
    clave varchar(30) NOT NULL,
    PRIMARY KEY (nombre)
);

CREATE TABLE rrotonda.roles (
    rol varchar(30) NOT NULL,
    PRIMARY KEY (rol)
);

CREATE TABLE rrotonda.usuarios_roles (
    usuario varchar(30) NOT NULL,
    rol varchar(30) NOT NULL
);

-- Tables Alter, Foreing Key

ALTER TABLE rrotonda.pedidos
    ADD CONSTRAINT FK_pedidos__estado FOREIGN KEY (estado) REFERENCES rrotonda.estados(tipo);
ALTER TABLE rrotonda.pedidos
    ADD CONSTRAINT FK_pedidos__cliente FOREIGN KEY (cliente) REFERENCES rrotonda.clientes(id);
CREATE INDEX IN_pedidos__estado ON rrotonda.pedidos
    (estado);
CREATE INDEX IN_pedidos__cliente ON rrotonda.pedidos
    (cliente);

ALTER TABLE rrotonda.pedidos_menus
    ADD CONSTRAINT FK_pedidos_menus__pedido FOREIGN KEY (pedido) REFERENCES rrotonda.pedidos(id);
ALTER TABLE rrotonda.pedidos_menus
    ADD CONSTRAINT FK_pedidos_menus__menu FOREIGN KEY (menu) REFERENCES rrotonda.menus(id);

ALTER TABLE rrotonda.productos
    ADD CONSTRAINT FK_productos__categoria FOREIGN KEY (categoria) REFERENCES rrotonda.categorias_productos(nombre);
CREATE INDEX IN_productos__categoria ON rrotonda.productos
    (categoria);

ALTER TABLE rrotonda.alternativas_productos
    ADD CONSTRAINT FK_alternativas_productos__producto FOREIGN KEY (producto) REFERENCES rrotonda.productos(id);
ALTER TABLE rrotonda.alternativas_productos
    ADD CONSTRAINT FK_alternativas_productos__alternativa FOREIGN KEY (alternativa) REFERENCES rrotonda.productos(id);

ALTER TABLE rrotonda.alternativas_ingredientes
    ADD CONSTRAINT FK_alternativas_ingredientes__ingrediente FOREIGN KEY (ingrediente) REFERENCES rrotonda.ingredientes(id);
ALTER TABLE rrotonda.alternativas_ingredientes
    ADD CONSTRAINT FK_alternativas_ingredientes__alternativa FOREIGN KEY (alternativa) REFERENCES rrotonda.ingredientes(id);

ALTER TABLE rrotonda.pedidos_productos
    ADD CONSTRAINT FK_pedidos_productos__pedido FOREIGN KEY (pedido) REFERENCES rrotonda.pedidos(id);
ALTER TABLE rrotonda.pedidos_productos
    ADD CONSTRAINT FK_pedidos_productos__producto FOREIGN KEY (producto) REFERENCES rrotonda.productos(id);

ALTER TABLE rrotonda.menus_productos
    ADD CONSTRAINT FK_menus_productos__menu FOREIGN KEY (menu) REFERENCES rrotonda.menus(id);
ALTER TABLE rrotonda.menus_productos
    ADD CONSTRAINT FK_menus_productos__producto FOREIGN KEY (producto) REFERENCES rrotonda.productos(id);

ALTER TABLE rrotonda.productos_ingredientes
    ADD CONSTRAINT FK_productos_ingredientes__producto FOREIGN KEY (producto) REFERENCES rrotonda.productos(id);
ALTER TABLE rrotonda.productos_ingredientes
    ADD CONSTRAINT FK_productos_ingredientes__ingrediente FOREIGN KEY (ingrediente) REFERENCES rrotonda.ingredientes(id);

ALTER TABLE rrotonda.usuarios_roles
    ADD UNIQUE (usuario, rol);
