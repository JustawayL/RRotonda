-- Data database

-- Data delete
DELETE FROM rrotonda.pedidos_menus;
DELETE FROM rrotonda.pedidos_productos;
DELETE FROM rrotonda.pedidos;
DELETE FROM rrotonda.estados;
DELETE FROM rrotonda.menus_productos;
DELETE FROM rrotonda.menus;
DELETE FROM rrotonda.productos_ingredientes;
DELETE FROM rrotonda.alternativas_productos;
DELETE FROM rrotonda.productos;
DELETE FROM rrotonda.categorias_productos;
DELETE FROM rrotonda.alternativas_ingredientes;
DELETE FROM rrotonda.ingredientes;
DELETE FROM rrotonda.clientes;
DELETE FROM rrotonda.usuarios_roles;
DELETE FROM rrotonda.usuarios;
DELETE FROM rrotonda.roles;

-- roles
INSERT INTO rrotonda.roles (rol)
VALUES ('Cliente');
INSERT INTO rrotonda.roles (rol)
VALUES ('Funcionario');

-- usuarios
INSERT INTO rrotonda.usuarios (nombre,clave)
VALUES ('admin','admin');
INSERT INTO rrotonda.usuarios (nombre,clave)
VALUES ('Jeisson','ramirez');
INSERT INTO rrotonda.usuarios (nombre,clave)
VALUES ('Leonardo','alarcon');
INSERT INTO rrotonda.usuarios (nombre,clave)
VALUES ('Ruben','pulido');

-- usuarios_Roles
INSERT INTO rrotonda.usuarios_roles (usuario,rol)
VALUES ('admin','Funcionario');
INSERT INTO rrotonda.usuarios_roles (usuario,rol)
VALUES ('Jeisson','Cliente');
INSERT INTO rrotonda.usuarios_roles (usuario,rol)
VALUES ('Jeisson','Funcionario');
INSERT INTO rrotonda.usuarios_roles (usuario,rol)
VALUES ('Leonardo','Cliente');
INSERT INTO rrotonda.usuarios_roles (usuario,rol)
VALUES ('Leonardo','Funcionario');
INSERT INTO rrotonda.usuarios_roles (usuario,rol)
VALUES ('Ruben','Cliente');

-- clientes
INSERT INTO rrotonda.clientes (id,nombre)
VALUES ('Jeisson','Jeisson Rodrigo Piñeros Ramirez');
INSERT INTO rrotonda.clientes (id,nombre)
VALUES ('Leonardo','Leonardo Andrés Alarcón Forero');
INSERT INTO rrotonda.clientes (id,nombre)
VALUES ('Ruben','Ruben Dario Pulido Castellanos');

-- ingredientes
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Masa Taco',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Masa Taco integral',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Carne res 100gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Carne pollo 100gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Carne cerdo 100gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Salchicha 100gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Champiñon 30gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Salsa Barbiquiu 15gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Salsa de tomate 15gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Salsa tartara 15gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Papas 100gr',5);
INSERT INTO rrotonda.ingredientes (nombre,existencias)
VALUES ('Papa criolla 100gr',5);

-- alternativas_ingredientes
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (1,2);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (2,1);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (3,4);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (3,5);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (4,3);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (4,5);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (5,3);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (5,4);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (8,9);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (8,10);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (9,8);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (9,10);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (10,8);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (10,9);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (11,12);
INSERT INTO rrotonda.alternativas_ingredientes (ingrediente,alternativa)
VALUES (12,11);

-- categorias_productos
INSERT INTO rrotonda.categorias_productos (nombre)
VALUES ('Entrada');
INSERT INTO rrotonda.categorias_productos (nombre)
VALUES ('Plato Fuerte');
INSERT INTO rrotonda.categorias_productos (nombre)
VALUES ('Postre');
INSERT INTO rrotonda.categorias_productos (nombre)
VALUES ('Bebida');
INSERT INTO rrotonda.categorias_productos (nombre)
VALUES ('Acompañamiento');

-- productos
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('Taco Carne','Plato Fuerte',4500,'productosImg/1.jpg',NULL,FALSE,0);
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('Taco Salchicha','Plato Fuerte',4500,'productosImg/2.jpg',NULL,FALSE,0);
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('Taco Champiñon','Plato Fuerte',3000,'productosImg/3.jpg',NULL,FALSE,0);
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('Coca-Cola 500ml','Bebida',1000,'productosImg/4.jpg',NULL,FALSE,5);
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('Postobon manzana 500ml','Bebida',1000,'productosImg/5.jpg',NULL,FALSE,5);
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('7up 500ml','Bebida',1000,'productosImg/6.jpg',NULL,FALSE,5);
INSERT INTO rrotonda.productos (nombre,categoria,precio,foto,descripcion,personalizado,existencias)
VALUES ('Papas 100gr','Acompañamiento',1000,'productosImg/7.jpg',NULL,FALSE,0);


-- alternativas_productos
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (1,2);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (2,1);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (4,5);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (4,6);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (5,4);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (5,6);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (6,4);
INSERT INTO rrotonda.alternativas_productos (producto,alternativa)
VALUES (6,5);

-- productos_ingredientes
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (1,1);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (1,3);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (1,9);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (2,1);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (2,6);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (2,8);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (3,1);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (3,4);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (3,7);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (3,10);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (7,11);
INSERT INTO rrotonda.productos_ingredientes (producto,ingrediente)
VALUES (7,9);

-- menus
INSERT INTO rrotonda.menus (precio,nombre,personalizado)
VALUES (5000,'Combo tu taco',FALSE);
INSERT INTO rrotonda.menus (precio,nombre,personalizado)
VALUES (6000,'Combo Ranchero',FALSE);
INSERT INTO rrotonda.menus (precio,nombre,personalizado)
VALUES (4000,'Combo Champiñon',FALSE);

-- menus_productos
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (1,1);
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (1,4);
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (2,2);
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (2,4);
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (2,7);
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (3,3);
INSERT INTO rrotonda.menus_productos (menu,producto)
VALUES (3,4);

-- estados
INSERT INTO rrotonda.estados (tipo)
VALUES ('Pedido');
INSERT INTO rrotonda.estados (tipo)
VALUES ('Recibido');
INSERT INTO rrotonda.estados (tipo)
VALUES ('Despachado');
INSERT INTO rrotonda.estados (tipo)
VALUES ('Entregado');

-- pedidos
INSERT INTO rrotonda.pedidos (estado,cliente,fecha)
VALUES ('Pedido','Jeisson','2017-04-13 19:25:03');
INSERT INTO rrotonda.pedidos (estado,cliente,fecha)
VALUES ('Pedido','Jeisson','2017-04-13 19:25:03');

-- pedidos_productos
INSERT INTO rrotonda.pedidos_productos (pedido,producto,cantidad)
VALUES (2,7,3);

-- pedidos_menus
INSERT INTO rrotonda.pedidos_menus (pedido,menu,cantidad)
VALUES (1,1,2);