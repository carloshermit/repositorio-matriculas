create database bdmatricula;
use database bdmatricula;
create table alumno(
	codalumno serial primary key not null,
	codeducando varchar(14),
	codmodular varchar(7),
	dni varchar(8),
	apellidopaterno varchar(40),
	apellidomaterno varchar(40),
	primernombre varchar (40),
	otrosnombres varchar(40),
	sexo varchar(40),
	fechanacimiento date,
	coddistrito int,
	fechaingreso char(4),
	escala char(1),
	codlengua int,
	estadocivil varchar(40),
	codreligion int,
	fechabautizo date,
	parroquiabautizo varchar(40),
	colegioprocedencia varchar(40)
);

CREATE TABLE DETALLE_DOMICILIO
( 
	CodAlumno            int  NOT NULL, 
	codDistrito          int  NULL ,
	descripcionDireccion varchar(40)  NULL ,
	telefono             varchar(09)  NULL ,
	medioTransporte      varchar(40)  NULL ,
	demoraTranscurso     int  NULL ,
	materialDomicilio    varchar(40)  NULL ,
	energiaDomicilio     varchar(40)  NULL ,
	aguaDomicilio        varchar(40)  NULL ,
	desagueDomicilio     varchar(40)  NULL ,
	serviciosDomicilio   varchar(40)  NULL ,
	nroHabitaciones      varchar(40)  NULL ,
	nroHabitantes        varchar(40)  NULL ,
	situacion            varchar(40)  NULL 
);

create table pais(
	codpais serial primary key not null,
	descripcion varchar(40)
);
create table departamento(
	coddepartamento serial primary key not null,
	codpais int,
	descripcion varchar(40)
);
create table provincia(
	codprovincia serial primary key not null,
	coddepartamento int,
	descripcion varchar(40)
);

create TABLE distrito(
	coddistrito SERIAL PRIMARY KEY not null,
	codprovincia int,
	descripcion VARCHAR(40)
);

CREATE TABLE FAMILIAR
( 
	codFamiliar          Serial  Primary Key ,
	apellidoPaterno      varchar(40)  NULL ,
	apellidoMaterno      varchar(40)  NULL ,
	nombrePrimero        varchar(40)  NULL ,
	nombreOtros          varchar(40)  NULL ,
	celular              varchar(09)  NULL ,
	relacion              varchar(40)  NULL ,
	DNI            varchar(08)  NULL ,
	CodAlumno            int  NOT NULL ,
	estado				 int
);

CREATE TABLE LENGUA_MATERNA(
	CODLENGUA SERIAL PRIMARY KEY,
	DESCRIPCION VARCHAR(40)
);

create table religion(
	codreligion serial primary key,
	descripcion varchar(40)
);

CREATE TABLE PERSONAL
( 
	codPersonal          Serial Primary Key ,
	codDepartamentoA     int ,
	ApellidosNombres     varchar(40)  NULL ,
	telefono             varchar(09)  NULL ,
	nroSeguro            varchar(11)  NULL ,
	direccion            varchar(40)  NULL ,
	DNI                  varchar(08)  NULL ,
	estadocivil          varchar(40)  NULL ,
	fechaIngreso         date  NULL ,
	estado				 int
);

CREATE TABLE DEPARTAMENTO_ACADEMICO
( 
	codDepartamentoA     serial primary key ,
	descripcion          varchar(40)  NULL 
);

CREATE TABLE COLEGIO
( 
	codColegio           Serial Primary Key ,
	descripcion          char(40)  NULL,
	codDistrito			 varchar(08) 
);

CREATE TABLE NIVEL
( 
	codNivel             serial primary key ,
	descripcion          varchar(40)  NULL 
);

CREATE TABLE GRADO
	( 
	codGrado             serial primary key ,
	codNivel             int  NULL ,
	descripcion          varchar(40)  NULL 
);

CREATE TABLE GRADO_COLEGIO
( 
	codGradoColegio      serial primary key ,
	codColegio           int  NULL ,
	codGrado             int  NULL 
);

CREATE TABLE seccion
( 
	codseccion           Serial  Primary Key ,
	codgrado      int,
	descripcion          varchar(40)  NULL 
);

create table matricula(
	codmatricula serial primary key not null,
	codalumno int not null,
	codseccion int not null,
	fecha date,
	escala char(1),
	añoingreso char(4),
	nromatricula varchar(5)
);


CREATE TABLE CURSO
( 
	codCurso             Serial  Primary Key,
	descripcion          varchar(40)  NULL 
);

CREATE TABLE CURSO_GRADO
( 
	codCursoGrado        Serial  Primary Key ,
	codCurso             int  NOT NULL ,
	codGradoColegio      int  NOT NULL 
);

CREATE TABLE CATEDRA
( 
	codCatedra           Serial  Primary Key ,
	codSeccion           int  NOT NULL ,
	codcurso        int  NOT NULL ,
	CodPersonal          int  NOT NULL 
);

CREATE TABLE USERS
( 
	id           Serial  Primary Key ,
	name           varchar(255) ,
	email        varchar(190) ,
	password          varchar(255) 
);

insert into religion("descripcion")
values('Catolico');
insert into religion("descripcion")
values('Cristiano');

INSERT INTO public.colegio(
	descripcion, coddistrito)
	VALUES ('san juan', '1');
insert into nivel(descripcion) values('INICIAL');
insert into nivel(descripcion) values('PRIMARIA');
insert into nivel(descripcion) values('SECUNDARIA');
values(1,'3 Años');
insert into grado(codNivel,descripcion)
values(1,'3 Años');
insert into grado(codNivel,descripcion)
values(1,'4 Años');
insert into grado(codNivel,descripcion)
values(1,'5 Años');
insert into grado(codNivel,descripcion)
values(2,'Primero');
insert into grado(codNivel,descripcion)
values(2,'Segundo');
insert into grado(codNivel,descripcion)
values(2,'Tercero');
insert into grado(codNivel,descripcion)
values(2,'Cuarto');
insert into grado(codNivel,descripcion)
values(2,'Quinto');
insert into grado(codNivel,descripcion)
values(2,'Sexto');
insert into grado(codNivel,descripcion)
values(3,'Primero');
insert into grado(codNivel,descripcion)
values(3,'Segundo');
insert into grado(codNivel,descripcion)
values(3,'Tercero');
insert into grado(codNivel,descripcion)
values(3,'Cuarto');
insert into grado(codNivel,descripcion)
values(3,'Quinto');
insert into seccion("codgrado","descripcion")
values ('4','A');
insert into seccion("codgrado","descripcion")
values ('5','A');
insert into seccion("codgrado","descripcion")
values ('6','A');
insert into pais("descripcion")
	values('Peru');
insert into departamento("codpais","descripcion")
	values(1,'La Libertad');
insert into provincia("coddepartamento","descripcion")
	values(1,'Trujillo');

INSERT INTO LENGUA_MATERNA("descripcion")
VALUES('CASTELLANO');
INSERT INTO LENGUA_MATERNA("descripcion")
VALUES('QUECHUA');
INSERT INTO LENGUA_MATERNA("descripcion")
VALUES('AIMARA');

INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Trujillo');
INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'El Porvenir');
INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Esperanza');
INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Victor Larco Herrera');

INSERT INTO public.users(name, email, password)
	VALUES ('admin', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

