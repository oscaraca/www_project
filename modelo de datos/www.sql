DROP SEQUENCE tenant_seq CASCADE;
CREATE SEQUENCE tenant_seq
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 10;
DROP TABLE IF EXISTS tenant CASCADE;
CREATE TABLE tenant (
	TID INTEGER DEFAULT nextval('tenant_seq'::regclass) NOT NULL,
	nombre VARCHAR(100), --adsagasdgasdgasdgadgasgasdgadgad
	logo VARCHAR(100), --asldkajsldaglakjs QUITAR!!!!!
	url VARCHAR(200), 
	direccion VARCHAR(100), 
	PRIMARY KEY (TID)
);

DROP TABLE IF EXISTS usuario CASCADE;
CREATE TABLE usuario (
	TID INTEGER,
	usuario_id VARCHAR(20),
	nombre VARCHAR(100),
	apellido VARCHAR(100),
	direccion VARCHAR(100),
	telefono VARCHAR(15),
	tipo_usuario VARCHAR(20), --CAMBIAR LSAJAÑLDJFALÑSJDFLASKDFÑALD
	PRIMARY KEY (TID, usuario_id),
	FOREIGN KEY (TID) REFERENCES tenant(TID)
);