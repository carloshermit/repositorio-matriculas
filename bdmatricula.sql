CREATE TABLE ALUMNO
( 
	codEducando          Serial primary key,
	nroMatricula         varchar(10)  NULL ,
	codModular           varchar(10)  NULL ,
	fechaBautizo         date  NULL ,
	parroquiaBautizo     varchar(40)  NULL ,
	colegioProcedencia   varchar(40)  NULL ,
	codLengua            varchar(08)  NULL ,
	codReligion          varchar(08)  NULL ,
	DNI                  varchar(08)  NULL ,
	apellidoPaterno      varchar(40)  NULL ,
	apellidoMaterno      varchar(40)  NULL ,
	PrimerNombre         varchar(40)  NULL ,
	OtrosNombres         varchar(40)  NULL ,
	sexo                 varchar(40)  NULL ,
	estadoCivil          varchar(40)  NULL ,
	fechaNacimiento      date  NULL ,
	fechaIngreso         date  NULL,
	codDistrito 	     int  NULL ,
	estado 				 int       Null
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

CREATE TABLE PAIS
( 
	codPais              varchar(08)  Primary Key NOT NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE DEPARTAMENTO
( 
	codDepartamento      varchar(08)  Primary Key  NOT NULL ,
	codPais              varchar(08)  NOT NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE PROVINCIA
( 
	codProvincia         varchar(08)  Primary Key  NOT NULL ,
	codDepartamento      varchar(08)  NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE DISTRITO
( 
	codDistrito          varchar(08) Primary Key NOT NULL ,
	codProvincia         varchar(08)  NULL ,
	descripcion          varchar(40)  NULL
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

CREATE TABLE LENGUA_MATERNA
( 
	codLengua            varchar(08)  Primary Key NOT NULL ,
	descripcion          varchar(40)  NULL 
)

CREATE TABLE RELIGION
( 
	codReligion          varchar(08)  Primary Key NOT NULL ,
	descripcion          varchar(40)  NULL 
)

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
	codNivel             varchar(08)  Primary Key NOT NULL ,
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

