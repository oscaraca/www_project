﻿--:::::::::::::::::::::::::ENTIDADES:::::::::::::::::::::::::::::::::::::::::::::::::::::::
DROP SEQUENCE IF EXISTS tenant_seq CASCADE;
CREATE SEQUENCE tenant_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 10;
DROP TABLE IF EXISTS tenant CASCADE;
CREATE TABLE tenant (
	TID INTEGER DEFAULT nextval('tenant_seq'::regclass) NOT NULL,
	nombre VARCHAR(100), --XXXXXXXXXXXXXXXXXXXXXXXXXXXXXCAMBIAR ATRITUBO EN DIBUJO
	logo VARCHAR(100), --XXXXXXXXXXXXXXXXXXXXXXXXXX QUITAR!!!!! DEL PUTO DIBUJO
	url VARCHAR(200), 
	direccion VARCHAR(100),
	telefonos VARCHAR(100), --SENCILLAMENTE UNA CADENA CON LOS TELEFONOS. EJEMPLO(213241-21543113-2153234)
	PRIMARY KEY (TID)
);

DROP TABLE IF EXISTS usuario CASCADE;
CREATE TABLE usuario (
	usuario_id VARCHAR(20), --CC
	TID INTEGER, --ID DE LA EMPRESA A LA CUAL PERTENECE EL USUARIO
	nombre VARCHAR(100), 
	apellido VARCHAR(100),
	direccion VARCHAR(100),
	telefono VARCHAR(15),
	tipo_usuario VARCHAR(20), --SI ES ADMINISTRADOR, MESERO... CAMBIAR LSAJAÑLDJFALÑSJDFLASKDFÑALD
	PRIMARY KEY (TID, usuario_id),
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
	consecutivo INTEGER DEFAULT nextval('pedido_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD
	TID INTEGER, --ID DEL TENANT QUE ESTA USANDO LA APLICACION
	usuario_id VARCHAR(20), --ID DEL USUARIO QUE ESTA SOLICITANDO EL PEDIDO (MESERO)
	fecha TIMESTAMP, --FECHA Y HORA EN LA QUE SE HACE EL PEDIDO
	estado, --VALORES("activo", "cancelado", "terminado") SI SE DEBE ENTREGAR EL PEDIDO, HA SIDO CANCELADO O YA SE ENTREGO
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
	plato_id INTEGER DEFAULT nextval('plato_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD ASDADALFKJSLAJD CAMBIAR ETIQUETA EN EL PUTO DIBUJO
	TID INTEGER, --ID DEL TENANT QUE ESTA USANDO LA APLICACION
	nombre VARCHAR(100),
	ingredientes VARCHAR(200), --SENCILLAMENTE UNA CADENA CON TODOS LOS INGREDIENTES. EJEMPLO "pollo-champiñones-harina"
	estado VARCHAR(20), --VALORES (activo, inactivo) SI SE ESTA VENDIENDO O NO EL PLATO
	fecha DATE, --FECHA DE LA CREACION DEL PLATO
	--CAMBIAR EN EL DIBUJO, LA IMAGEN SERA CON EL ID DEL PLATO XXXX.PNG
	costo REAL, --COSTO DEL PLATO
	PRIMARY KEY (codigo),
	FOREIGN KEY (TID) REFERENCES tenant(TID)
);

DROP SEQUENCE IF EXISTS adicional_seq CASCADE;
CREATE SEQUENCE adicional_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 10;
DROP TABLE IF EXISTS adicional CASCADE;--CORREGIR RELACION 1-TO-M PLATO A ADICIONAL
CREATE TABLE adicional (
	adicional_id INTEGER DEFAULT nextval('adicional_seq'::regclass) NOT NULL, --VALOR AUTO-GENERADO POR LA BD
	plato_id INTEGER, --EL PLATO AL CUAL PERTENECE EL ADICIONAL
	nombre VARCHAR(30), --NOMBRE DEL ADICIONAL (EL QUE SALDRA EN LA FACTURA)
	descripcion VARCHAR(200), --DESCRIPCION DETALLADA DEL ADICIONAL ASLAJSLADFJSA AGREGAR AL PUTO DIBUJO
	costo REAL, --COSTO DEL ADICIONAL
	PRIMARY KEY (codigo),
	FOREIGN KEY (plato_id) REFERENCES plato(plato_id)
);

--::::::::::::::::::::::::::::::::RELACIONES MXN::::::::::::::::::::::::::::::::
DROP TABLE IF EXISTS pedido_tiene_plato CASCADE;
CREATE TABLE pedido_tiene_plato (
	pedido_consecutivo INTEGER, --ID DEL PEDIDO
	plato_id INTEGER, --ID DEL PLATO AGREGADO AL PEDIDO
);

DROP TABLE IF EXISTS pedido_tiene_adicional CASCADE;
CREATE TABLE pedido_tiene_adicional (
	pedido_consecutivo INTEGER, --ID DEL PEDIDO
	adicional_id INTEGER, --ID DEL PLATO AGREGADO AL PEDIDO
);