--:::::::::::::::::::::::::ENTIDADES:::::::::::::::::::::::::::::::::::::::::::::::::::::::
DROP SEQUENCE IF EXISTS tenant_seq CASCADE;
CREATE SEQUENCE tenant_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 10;
DROP TABLE IF EXISTS tenant CASCADE;
CREATE TABLE tenant (
	TID INTEGER DEFAULT nextval('tenant_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD AL INSERTAR
	nombre VARCHAR(100),
	--EL LOGO SERA EL "TID".PNG GUARDADO EN LA CARPETA LOGOS
	url VARCHAR(200), 
	direccion VARCHAR(100),
	telefonos VARCHAR(100), --SENCILLAMENTE UNA CADENA CON LOS TELEFONOS. EJEMPLO(213241-21543113-2153234)
	logo BYTEA,
	PRIMARY KEY (TID)
);

DROP TABLE IF EXISTS usuario CASCADE;
CREATE TABLE usuario (
	usuario_id VARCHAR(20) UNIQUE, --CC
	TID INTEGER, --ID DE LA EMPRESA A LA CUAL PERTENECE EL USUARIO
	nombre VARCHAR(100), 
	apellido VARCHAR(100),
	direccion VARCHAR(100),
	telefono VARCHAR(15),
	tipo_usuario VARCHAR(20), --VALORES("administrador", "cajero", "admin") NOTA: "administrador" PARA EL ADMINISTRADOR DE CADA EMPRESA, "admin" PARA EL ADMINISTRADOR DE TODA LA APLICACION
	password VARCHAR(100),
	email VARCHAR(100),
	identificacion VARCHAR(20),
	PRIMARY KEY (usuario_id, TID),
	FOREIGN KEY (TID) REFERENCES tenant(TID)
);

DROP SEQUENCE IF EXISTS pedido_seq CASCADE;
CREATE SEQUENCE pedido_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 50;
DROP TABLE IF EXISTS pedido CASCADE;
CREATE TABLE pedido (
	consecutivo INTEGER DEFAULT nextval('pedido_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD AL INSERTAR
	TID INTEGER, --ID DEL TENANT QUE ESTA USANDO LA APLICACION
	usuario_id VARCHAR(20), --ID DEL USUARIO QUE ESTA SOLICITANDO EL PEDIDO (CAJERO)
	fecha TIMESTAMP, --FECHA Y HORA EN LA QUE SE HACE EL PEDIDO
	estado VARCHAR(20), --VALORES("activo", "cancelado", "terminado") SI SE DEBE ENTREGAR EL PEDIDO, HA SIDO CANCELADO O YA SE ENTREGO
	pagado BOOLEAN, --TRUE SI YA HA SIDO PAGADO EL PEDIDO, FALSE SI NO
	modo_de_pago VARCHAR(100), --VALORES (efectivo, t_debito, t_credito) 
	costo REAL, --COSTO CALCULADO POR EL SISTEMA DE ACUERDO A LOS PLATOS Y ADICIONALES SOLICITADOS
	PRIMARY KEY (consecutivo),
	FOREIGN KEY (TID) REFERENCES tenant(TID),
	FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);

DROP SEQUENCE IF EXISTS plato_seq CASCADE;
CREATE SEQUENCE plato_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 10;
DROP TABLE IF EXISTS plato CASCADE;
CREATE TABLE plato (
	plato_id INTEGER DEFAULT nextval('plato_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD AL INSERTAR
	TID INTEGER, --LA EMPRESA A LA CUAL PERTENECE EL PLATO
	nombre VARCHAR(100),
	ingredientes VARCHAR(200), --SENCILLAMENTE UNA CADENA CON TODOS LOS INGREDIENTES. EJEMPLO "pollo-champiñones-harina"
	estado VARCHAR(20), --VALORES ("activo", "inactivo") SI SE ESTA VENDIENDO O NO EL PLATO
	fecha DATE, --FECHA DE LA CREACION DEL PLATO
	--LA IMAGEN SERA CON EL ID DEL PLATO "plato_id".PNG GUARDADO EN LA CARPETA IMG_PLATO
	costo REAL, --COSTO DEL PLATO
	logo BYTEA,
	PRIMARY KEY (plato_id),
	FOREIGN KEY (TID) REFERENCES tenant(TID)
);

DROP SEQUENCE IF EXISTS adicional_seq CASCADE;
CREATE SEQUENCE adicional_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 10;
DROP TABLE IF EXISTS adicional CASCADE;
CREATE TABLE adicional (
	adicional_id INTEGER DEFAULT nextval('adicional_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD AL INSERTAR
	plato_id INTEGER, --EL PLATO AL CUAL PERTENECE EL ADICIONAL
	nombre VARCHAR(30), --NOMBRE DEL ADICIONAL (EL QUE SALDRA EN LA FACTURA)
	descripcion VARCHAR(200), --DESCRIPCION DETALLADA DEL ADICIONAL
	costo REAL, --COSTO DEL ADICIONAL
	PRIMARY KEY (adicional_id),
	FOREIGN KEY (plato_id) REFERENCES plato(plato_id)
);

--::::::::::::::::::::::::::::::::RELACIONES MXN::::::::::::::::::::::::::::::::
DROP TABLE IF EXISTS pedido_tiene_plato CASCADE;
CREATE TABLE pedido_tiene_plato (
	pedido_consecutivo INTEGER, --ID DEL PEDIDO
	plato_id INTEGER, --ID DEL PLATO AGREGADO AL PEDIDO
	cantidad INTEGER, --CANTIDAD DE ESE PLATO EN ESE PEDIDO
	PRIMARY KEY (pedido_consecutivo, plato_id)
);

DROP TABLE IF EXISTS pedido_tiene_adicional CASCADE;
CREATE TABLE pedido_tiene_adicional (
	pedido_consecutivo INTEGER, --ID DEL PEDIDO
	adicional_id INTEGER, --ID DEL PLATO AGREGADO AL PEDIDO
	cantidad INTEGER, --CANTIDAD DE ESE ADICIONAL EN ESE PEDIDO
	PRIMARY KEY (pedido_consecutivo, adicional_id)
);

--Insertando tenants
INSERT INTO tenant (nombre, url, direccion, telefonos) VALUES ('Sandwich Qbano', 'www.sandwichqbano.com', 'calle 13 # 100 - unicentro - local 134', '3352530-3352532');
INSERT INTO tenant (nombre, url, direccion, telefonos) VALUES ('Mr wok', 'www.mrwok.com', 'calle 13 # 100 - unicentro - local 135', '3352534-3352536');
INSERT INTO tenant (nombre, url, direccion, telefonos) VALUES ('Kokoriko', 'www.kokoriko.com', 'Cll. 24F No. 94', '4453625');
INSERT INTO tenant (nombre, url, direccion, telefonos) VALUES ('La Areperia', 'www.laareperia.com', 'Av 3IN # 51N-47', '4855448');
INSERT INTO tenant (nombre, url, direccion, telefonos) VALUES ('El Corral', 'www.elcorral.com', 'Calle 9 # 65A-45', '3245465');


--Insertando usuarios
INSERT INTO usuario VALUES ('pepitoperez', 4, 'Pepito', 'Perez', 'Calle 2C # 24-15', '7764930', 'cajero', '12345', 'pepito.perez@gmail.com', '823748201');
INSERT INTO usuario VALUES ('juanitosuarez', 4, 'Juanito', 'Suarez', 'Calle 2C # 24-15', '7764930', 'cajero', '12345', 'juanito.suarez@gmail.com', '823748201');
INSERT INTO usuario VALUES ('juanospina', 4, 'Juan', 'Ospina', 'Calle 2C # 24-15', '7764930', 'cajero', '12345', 'juan.ospina@correounivalle.edu.co', '823748201');
INSERT INTO usuario VALUES ('camiloaqm', 3, 'Camilo', 'Quintero', 'Calle 2C # 24-15', '7764930', 'administrador', '12345', 'camilo.quintero@correounivalle.edu.co', '823748201');
INSERT INTO usuario VALUES ('oscaraca', 4, 'Oscar', 'Chavarriaga', 'Cra 29A2 # 12B-60', '3104495059', 'administrador', '12345', 'oscar.chavarriaga@correounivalle.edu.co', '1107063417');


--Insertando pedidos
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 75000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 25000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 45000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 't_credito', 37800);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 132500);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 56300);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 70000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 15400);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 12400);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'pepitoperez', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);
--12
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 75000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 25000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 45000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 37800);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 132500);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 56300);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanitosuarez', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);

INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 75000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 25000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 45000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 't_credito', 37800);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 132500);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 56300);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 70000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 15400);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 12400);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 25000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 't_credito', 45000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 37800);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 132500);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 56300);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 70000);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 't_debito', 15400);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'terminado', true, 'efectivo', 12400);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);
INSERT INTO pedido (TID, usuario_id, fecha, estado, pagado, modo_de_pago, costo) VALUES (4, 'juanospina', CURRENT_TIMESTAMP, 'cancelado', false, 'none', 0);

--Insertando platos
INSERT INTO plato (TID, nombre, ingredientes, estado, fecha, costo) VALUES (4, 'Arepa sencilla', 'queso-mantequilla', 'activo', CURRENT_TIMESTAMP, 2500);
INSERT INTO plato (TID, nombre, ingredientes, estado, fecha, costo) VALUES (4, 'Arepa Jamon y Queso', 'queso-mantequilla-jamon', 'activo', CURRENT_TIMESTAMP, 3500);
INSERT INTO plato (TID, nombre, ingredientes, estado, fecha, costo) VALUES (4, 'Arepa con todo', 'queso-mantequilla-jamon-carne-pollo-chicharron-lechuga-tomate', 'activo', CURRENT_TIMESTAMP, 8500);
INSERT INTO plato (TID, nombre, ingredientes, estado, fecha, costo) VALUES (4, 'Arepa carnivora', 'jamon-carne-pollo-chicharron', 'activo', CURRENT_TIMESTAMP, 7000);
INSERT INTO plato (TID, nombre, ingredientes, estado, fecha, costo) VALUES (4, 'Arepa vegetariana', 'queso-mantequilla-lechuga-tomate', 'activo', CURRENT_TIMESTAMP, 4000);

--Insertando platos en pedidos
INSERT INTO pedido_tiene_plato VALUES (1, 1, 1);
INSERT INTO pedido_tiene_plato VALUES (1, 2, 1);
INSERT INTO pedido_tiene_plato VALUES (1, 3, 1);
INSERT INTO pedido_tiene_plato VALUES (2, 1, 3);
INSERT INTO pedido_tiene_plato VALUES (2, 4, 1);
INSERT INTO pedido_tiene_plato VALUES (3, 3, 1);
INSERT INTO pedido_tiene_plato VALUES (3, 4, 1);
INSERT INTO pedido_tiene_plato VALUES (3, 5, 2);
INSERT INTO pedido_tiene_plato VALUES (3, 1, 1);
INSERT INTO pedido_tiene_plato VALUES (4, 3, 5);
INSERT INTO pedido_tiene_plato VALUES (4, 2, 1);
INSERT INTO pedido_tiene_plato VALUES (4, 4, 1);
INSERT INTO pedido_tiene_plato VALUES (4, 1, 1);
INSERT INTO pedido_tiene_plato VALUES (5, 3, 6);
INSERT INTO pedido_tiene_plato VALUES (5, 1, 2);
INSERT INTO pedido_tiene_plato VALUES (6, 1, 1);
INSERT INTO pedido_tiene_plato VALUES (6, 2, 1);
INSERT INTO pedido_tiene_plato VALUES (6, 3, 4);
INSERT INTO pedido_tiene_plato VALUES (6, 4, 2);
INSERT INTO pedido_tiene_plato VALUES (6, 5, 1);
INSERT INTO pedido_tiene_plato VALUES (7, 1, 1);
INSERT INTO pedido_tiene_plato VALUES (7, 2, 1);
INSERT INTO pedido_tiene_plato VALUES (7, 3, 3);
INSERT INTO pedido_tiene_plato VALUES (7, 4, 3);
INSERT INTO pedido_tiene_plato VALUES (7, 5, 1);
