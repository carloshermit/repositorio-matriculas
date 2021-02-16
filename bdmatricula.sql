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
)


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
)

create table pais(
	codpais serial primary key not null,
	descripcion varchar(40)
);
create table departamento(
	coddepartamento serial primary key not null,
	codpais int,
	descripcion varchar(40)
)
create table provincia(
	codprovincia serial primary key not null,
	coddepartamento int,
	descripcion varchar(40)
)

create TABLE distrito(
	coddistrito SERIAL PRIMARY KEY,
	codprovincia int,
	descripcion VARCHAR(40)
)


CREATE TABLE FAMILIAR
( 
	codFamiliar          Serial  Primary Key ,
	apellidoPaterno      varchar(40)  NULL ,
	apellidoMaterno      varchar(40)  NULL ,
	nombrePrimero        varchar(40)  NULL ,
	nombreOtros          varchar(40)  NULL ,
	celular              varchar(09)  NULL ,
	CodAlumno            int  NOT NULL ,
	estado				 int
)

CREATE TABLE LENGUA_MATERNA(
	CODLENGUA SERIAL PRIMARY KEY,
	DESCRIPCION VARCHAR(40)
)
INSERT INTO LENGUA_MATERNA("descripcion")
VALUES('CASTELLANO');
INSERT INTO LENGUA_MATERNA("descripcion")
VALUES('QUECHUA');
INSERT INTO LENGUA_MATERNA("descripcion")
VALUES('AIMARA');

create table religion(
	codreligion serial primary key,
	descripcion varchar(40)
)

insert into religion("descripcion")
values('Catolico');
insert into religion("descripcion")
values('Cristiano');


CREATE TABLE PERSONAL
( 
	codPersonal          Serial Primary Key ,
	codDepartamentoA     varchar(08) ,
	ApellidosNombres     varchar(40)  NULL ,
	telefono             varchar(09)  NULL ,
	nroSeguro            varchar(11)  NULL ,
	direccion            varchar(40)  NULL ,
	DNI                  varchar(08)  NULL ,
	estadocivil          varchar(40)  NULL ,
	fechaIngreso         date  NULL ,
	estado				 int
)

CREATE TABLE DEPARTAMENTO_ACADEMICO
( 
	codDepartamentoA     varchar(08)  Primary Key NOT NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE COLEGIO
( 
	codColegio           Serial Primary Key ,
	descripcion          char(40)  NULL,
	codDistrito			 varchar(08) 
)

CREATE TABLE NIVEL
( 
	codNivel             serial Primary Key NOT NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE GRADO
	( 
	codGrado             varchar(08)   Primary Key NOT NULL ,
	codNivel             varchar(08)  NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE GRADO_COLEGIO
( 
	codGradoColegio      varchar(08)   Primary Key NOT NULL ,
	codColegio           varchar(08)  NULL ,
	codGrado             varchar(08)  NULL 
)

CREATE TABLE SECCION
( 
	codSeccion           Serial  Primary Key ,
	codGradoColegio      varchar(08)  NOT NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE ALUMNO_SECCION
( 
	codAlumnoSeccion     Serial  Primary Key ,
	codSeccion           int  NOT NULL ,
	codEducando          int  NOT NULL 
)


CREATE TABLE CURSO
( 
	codCurso             Serial  Primary Key,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE CURSO_GRADO
( 
	codCursoGrado        Serial  Primary Key ,
	codCurso             int  NOT NULL ,
	codGradoColegio      varchar(08)  NOT NULL 
)

CREATE TABLE CATEDRA
( 
	codCatedra           Serial  Primary Key ,
	codSeccion           int  NOT NULL ,
	codCursoGrado        int  NOT NULL ,
	CodPersonal          int  NOT NULL 
)


INSERT INTO public.alumno(
	nromatricula, codmodular, fechabautizo, parroquiabautizo, colegioprocedencia, codlengua, codreligion, dni, apellidopaterno, apellidomaterno, primernombre, otrosnombres, sexo, estadocivil, fechanacimiento, fechaingreso, coddistrito, estado)
	VALUES ('123', '123', '12-10-2006', 'yo q se', 'onrreifni', '1', '1', '12345678', 'valderrama', 'quino', 'steven', 'papi riqui', 'aun no', 'solito', '12-12-1212', '12-12-1212', '1', '1');

INSERT INTO public.religion(
	codreligion, descripcion)
	VALUES ('1', 'budista');

SELECT al.dni, al.apellidopaterno, al.apellidomaterno, al.primernombre, al.otrosnombres, al.sexo, re.descripcion
	FROM public.alumno al inner join public.religion re on al.codReligion=re.codReligion;

INSERT INTO public.personal(
	coddepartamentoa, apellidosnombres, telefono, nroseguro, direccion, dni, estadocivil, fechaingreso, estado)
	VALUES ('1', 'Benito Camela', '123456789', '10101010101', 'av ee', '12345678', 'casado', '12-07-1999', '1');

INSERT INTO public.departamento_academico(
	coddepartamentoa, descripcion)
	VALUES ('1', 'Personal docente primaria');

SELECT  pe.apellidosnombres, pe.telefono, pe.nroseguro, pe.direccion, pe.dni, da.descripcion
	FROM public.personal pe inner join public.departamento_academico da on pe.codDepartamentoA=da.codDepartamentoA;

INSERT INTO public.colegio(
	descripcion, coddistrito)
	VALUES ('san juan', '1');
insert into grado(codNivel,descripcion)
values(2,'3 Años');
insert into grado(codNivel,descripcion)
values(2,'4 Años');
insert into grado(codNivel,descripcion)
values(2,'5 Años');
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

insert into pais("descripcion")
	values('Peru')
insert into departamento("codpais","descripcion")
	values(1,'La Libertad')
insert into provincia("coddepartamento","descripcion")
	values(1,'Trujillo')


INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Trujillo');
INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Provenir');
INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Esperanza');
INSERT INTO distrito("codprovincia","descripcion")
VALUES(1,'Victor Larco Herrera');


insert into alumno("codeducando","codmodular","dni","apellidopaterno","apellidomaterno","primernombre","otrosnombres","sexo","fechanacimiento","coddistrito","fechaingreso","escala","codlengua","estadocivil","codreligion","fechabautizo","parroquiabautizo","colegioprocedencia")
values('12345678912345','1234567','76174081','Alcantara','Ninatanta','Luis','Fernando','masculino','1996-10-20',4,'2010','C',1,'Soltero',1,'2008-12-10','Parroquia','VRHT')

