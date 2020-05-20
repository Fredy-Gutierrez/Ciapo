
-- -----------------------------------------------------
-- Table `cat_tipoEmpleado`                                     1
-- -----------------------------------------------------
--drop table cat_tipoEmpleado;

create table cat_tipoEmpleado(
   id_tipo serial primary key,
   descripcion varchar(64),
   estado boolean default true
);

insert into cat_tipoEmpleado values ('Medico' ,true);
insert into cat_tipoEmpleado values ('Enfermero(a)',true);
insert into cat_tipoEmpleado values ('Administrativo',true);
insert into cat_tipoEmpleado values ('Quimico',true);

-- -----------------------------------------------------
-- Table `cat_empleados`                                        2
-- -----------------------------------------------------
--drop table cat_empleados;

create table cat_empleados(
   id_emp serial primary key,
   nombre varchar(64),
   ape_pat varchar(64),
   ape_mat varchar(64),
   nip varchar(10),
   rfc varchar(15),
   curp varchar(20),
   direccion varchar(64),
   id_tipoEmp integer references cat_tipoEmpleado,
   estado boolean default true
);
insert into cat_empleados values('JOSE','ESCOBAR','LOPEZ','2081','LOEJ','LOEJ','CENTRO, TAPACHULA',3,true);
insert into cat_empleados values('MARIA','JUAREZ','MARTINEZ','2031','JUMM','JUMM270781','CENTRO, TAPACHULA',3,true);
insert into cat_empleados values ('Alejandro', 'Santillan', 'Montelongo','2088','MOSA','MOSA','LAURELES',1,true);
insert into cat_empleados values ('Juan','Maldonado', 'Perez','2007','MAPJ', 'MAPJ','PUERTO MADERO',1,true);
insert into cat_empleados values ('Pedro', 'López', 'Sanchez','3109','PESP', 'PESP','5 DE FEBRERO',3,true);
insert into cat_empleados values ('Erwin', 'Bermudez', 'Casillas','1009','BECE', 'BECE','GALAXIAS',4,true);
insert into cat_empleados values ('Vanessa','Benavides','Garcia','2077','BEGV', 'BEGV','BUENOS AIRES',3,true);
insert into cat_empleados values ('Jordy', 'Armento','Vazquez','2081','ARVJ', 'ARVJ','TULIPANES',4,true);

-- -----------------------------------------------------
-- Table `Cat_Religion`                                         3
-- -----------------------------------------------------
--drop table cat_Religion;
CREATE TABLE cat_Religion (
  id_religion serial primary key,
  descripcion VARCHAR(45),
  estado boolean default true
  );
  
insert into cat_Religion values('NINGUNA',true);
insert into cat_Religion values('CATOLICO',true);
insert into cat_Religion values('PENTECOSTES',true);
-- -----------------------------------------------------
-- Table `Cat_Discapacidades`                                   4
-- -----------------------------------------------------
--drop table cat_Discapacidades;
CREATE TABLE cat_Discapacidades (
  id_discapacidad serial primary key,
  descripcion VARCHAR(45),
  estado boolean default true
  );
  
insert into cat_Discapacidades values('NINGUNA',true);  
insert into cat_Discapacidades values('CIEGO',true);
insert into cat_Discapacidades values('SORDO',true);
insert into cat_Discapacidades values('SORDO MUDO',true);

-- -----------------------------------------------------
-- Table `Cat_TipoSangre`                                       5
-- -----------------------------------------------------
--drop table cat_TipoSangre;
CREATE TABLE cat_TipoSangre (
  id_sangre serial primary key,
  descripcion VARCHAR(45),
  estado boolean default true);
insert into cat_TipoSangre values('RH O+', true);
insert into cat_TipoSangre values('RH O-', true);
insert into cat_TipoSangre values('RH A+', true);
-- -----------------------------------------------------
-- Table `cat_gposEtnicos`                                      6
-- -----------------------------------------------------
--drop table cat_gposEtnicos;
CREATE TABLE cat_gposEtnicos (
  id_etnicos serial primary key,
  descripcion VARCHAR(45));

insert into cat_gposEtnicos values(0, 'NINGUNO');  
insert into cat_gposEtnicos values(934, 'ZOTZIL');
insert into cat_gposEtnicos values(45, 'MIXTECO');
insert into cat_gposEtnicos values(82, 'ZOQUE');

-- -----------------------------------------------------
-- Table `cat_Niveles`                                          7
-- -----------------------------------------------------
--drop table cat_NivelSocioEco;
create table cat_NivelSocioEco(
   idnse serial primary key,
   descripcion varchar(64),
   estado boolean default true
);

insert into cat_NivelSocioEco values('Nivel 1x');
insert into cat_NivelSocioEco values('Nivel 1');
insert into cat_NivelSocioEco values('Nivel 2');
insert into cat_NivelSocioEco values('Nivel 3');
insert into cat_NivelSocioEco values('Nivel 4');
insert into cat_NivelSocioEco values('Nivel 5');

-- -----------------------------------------------------
-- Table `cat_Niveles`                                          8
-- -----------------------------------------------------
--drop table cat_Vivienda;
create table cat_Vivienda(
   id_vivienda serial primary key,
   descripcion varchar(64),
   estado boolean default true
);
insert into cat_Vivienda values('CASA INDEPENDIENTE', true);
insert into cat_Vivienda values('DEPARTAMENTO EN EDIFICIO', true);
insert into cat_Vivienda values('CASA/CUARTO EN VECINDAD', true);
insert into cat_Vivienda values('CAURTO EN AZOTEA', true);
insert into cat_Vivienda values('CASA MOVIL', true);

-- -----------------------------------------------------
-- Table `cat_estados`                                          9
-- -----------------------------------------------------
--drop table cat_estados;

-- -----------------------------------------------------
-- Table `Paciente`                                             11
-- -----------------------------------------------------
--drop table Paciente;
CREATE TABLE Paciente (
  id_pac int primary key,
  curp VARCHAR(45),
  nombrePx VARCHAR(45) ,
  ape_pat VARCHAR(45) ,
  ape_mat VARCHAR(45) ,
  no_exp varchar(10),
  fecha_ingr date,
  fecha_nac date,
  sexo varchar(64),
  telefono varchar(64),
  domicilio varchar(64),
  estado boolean default true,
  consentimiento boolean default false,
  id_niv integer references cat_NivelSocioEco,
  id_vivienda integer references cat_Vivienda,
  id_tipoSangre integer references cat_TipoSangre,
  id_discapacidad integer references cat_Discapacidades,
  id_gpoEtnico integer references cat_gposEtnicos,
  id_Religion integer references cat_Religion,
  id_nacionalidad integer references nacionalidades,
  id_estado integer references estados,
  id_municipio integer references municipios,
  id_localidad integer  references localidades,
  no_poliza varchar(40),
  inicio_poliza date,
  fin_poliza date,
  fecha_defuncion date,
  supervivencia varchar(20),
  diagnostico int references cat_Diagnostico,
  cobertura varchar(20),
  estado_enfermedad varchar(40),
  etapa_enfermedad int,
  tiempo_libre_enfermedad text,
  derecho_habiencia varchar(50),
  );

alter table paciente add column derecho_habiencia varchar(50)

create sequence s_paciente
start with 36847
increment by 1
minvalue 36847;

alter table paciente alter column id_pac set default nextval('s_paciente'); 






--insert into paciente values('PESM810701','Maria','Selvas','Perez','258764','2018-01-01','1981-07-01','femenino','9625440761','tapachula',true,3,1,1,1,0,1);
--insert into paciente values('MARR','ROBERTO','MARTINEZ','RODAS','12345','2019-02-01','1979-04-01','MASCULINO','9621547869','MOTOZINTLA',true,2,2,2,1,0,2);
--insert into paciente values('ORLR','RENATA','ORTIZ','LOPEZ','565758','2019-01-01','1987-03-17','femenino','9621478976','TUXTLA GUTIERREZ',true,4,3,3,1,0,2);
-- -----------------------------------------------------
-- Table `cat_Especialidades`                                   12
-- -----------------------------------------------------
--drop table cat_Especialidades;
create table cat_Especialidades(
   idEsp int primary key,
   NombreEsp varchar(64),
   estado boolean default true
);

create sequence s_especialidades
start with 48
increment by 1
minvalue 48;

alter table CAT_ESPECIALIDADES alter column idesp set default nextval('s_especialidades');

insert into cat_Especialidades values('Ginecologia');
insert into cat_Especialidades values('Oncologia');
insert into cat_Especialidades values('Neurologia');
insert into cat_Especialidades values('Cardiologia');
insert into cat_Especialidades values('Traumatologia');
insert into cat_Especialidades values('Nefrologia');
insert into cat_Especialidades values('Urologia');
insert into cat_Especialidades values('Oftalmologia');
insert into cat_Especialidades values('Medicina Interna');
insert into cat_Especialidades values('Gastroenterologia');
insert into cat_Especialidades values('Otorrinolaringología');



-- -----------------------------------------------------
-- Table ``Medicos`                                             13
-- -----------------------------------------------------
--drop table Medicos;
CREATE TABLE Medicos (
  id_Med integer primary key, 
  id_emp integer references cat_empleados,
  cedula varchar(15),
  clues varchar(30),
  id_especialidad integer references cat_Especialidades,
  estado boolean default true
  );

insert into Medicos values (1010, 3, '12345','CSSSA008882',1,true);
insert into Medicos values (1020, 4,'54321','CSSSA008882', 2,true);
insert into Medicos values (1030, 5,'67890','CSSSA008882', 3,true);
insert into Medicos values (1040, 6,'09876','CSSSA008882', 4,true);
insert into Medicos values (1050, 7,'11111','CSSSA008882', 5,true);
insert into Medicos values (1060, 8,'22222','CSSSA008882', 6,true);

-- -----------------------------------------------------
-- Table `CatTabulador`                                         17
-- -----------------------------------------------------
--drop table cat_Tabulador;
create table cat_Tabulador(
   id_tab   serial primary key,
   DescTab varchar(64),
   estado boolean default true
);
insert into cat_Tabulador values('Medicamento',true);
insert into cat_Tabulador values('Material de curación',true);
insert into cat_Tabulador values('Procedimiento',true);

-- -----------------------------------------------------
-- Table `cat_Procedimiento`                                    18
-- -----------------------------------------------------
--drop table cat_Procedimiento;
create table cat_Procedimiento(
   id_proc integer primary key,
   desProc varchar(64),
   id_tab integer references cat_Tabulador,
   estado boolean default true
); 
insert into cat_Procedimiento values (201, 'Apendicectomía', 3,true);
insert into cat_Procedimiento values (202, 'Endoarteriectomía de la carótida', 3,true);
insert into cat_Procedimiento values (203, 'Cirugía de cataratas', 3,true);
insert into cat_Procedimiento values (204, 'Colecistectomía', 3,true);

-- -----------------------------------------------------
-- Table `cat_servicios`                                        19
-- -----------------------------------------------------
--drop table cat_Servicios;
create table cat_Servicios(
   id_catSer serial primary key,
   DesSer varchar(64),
   estado boolean default true
);

insert into cat_Servicios values ('Laboratorio',true);
insert into cat_Servicios values ('Imagenologia',true);
insert into cat_Servicios values ('Patologia',true);
insert into cat_Servicios values ('Farmacia',true);

-- -----------------------------------------------------
-- Table `cat_Diagnostico`                                      20
-- -----------------------------------------------------
--drop table cat_Diagnostico;
create table cat_Diagnostico(
   id_Diag serial primary key,
   DesDiag varchar(64),
   idEsp integer,
   foreign key(idEsp) references cat_Especialidades(idEsp),
   estado boolean default true
);

insert into cat_Diagnostico values ('Cancer Cervicouterino',2,true);
insert into cat_Diagnostico values ('Cancer de Colon y Recto',2,true);
insert into cat_Diagnostico values ('Cancer de Prostata',2,true);
insert into cat_Diagnostico values ('CANCER DE MAMA',2,true);
insert into cat_Diagnostico values ('CANCER DE ENDOMETRIO',2,true);
insert into cat_Diagnostico values ('CANCER DE OVARIO EPITELIAL',2,true);

-- -----------------------------------------------------
-- Table `Cat_Rol`                                              21
-- -----------------------------------------------------
--drop table cat_rol;

create table cat_rol(
   id_tipo serial primary key,
   descripcion varchar(64),
   estado boolean default true
);
insert into cat_rol values ('Administrador' ,true);
insert into cat_rol values ('Limitado',true);
insert into cat_rol(descripcion) values ('Trabajo Social');
insert into cat_rol(descripcion) values ('Enfermeria de Consulta Externa');
insert into cat_rol(descripcion) values ('Medico');
insert into cat_rol(descripcion) values ('Gastos Catastroficos');
insert into cat_rol(descripcion) values ('Enfermeria de Quimioterapia Ambulatoria/Piso');
insert into cat_rol(descripcion) values ('Farmacia Hospitalaria');

-- -----------------------------------------------------
-- Table `cat_Uscuario`                                         22
-- -----------------------------------------------------
--drop table cat_Usuario;

create table cat_Usuario(
   id_usuario serial primary key,
   id_emp integer references cat_empleados,
   usuario  varchar(64),
   pass  varchar(64),
   id_rol integer references cat_rol,
   estado boolean default true
);

insert into cat_Usuario values (2,'MJUAREZ','TUpVQVJFWg==',2,true);
insert into cat_Usuario values (4, 'JMALDONADO','JMALDONADO',1,true);
insert into cat_Usuario values (6,'EBERMUDEZ','EBERMUDEZ',2,true);
insert into cat_Usuario values (8, 'JARMENTO','JARMENTO',1,true);

-- -----------------------------------------------------
-- Table `cat_Medicamentos`                                         23
-- -----------------------------------------------------
--drop table cat_Medicamentos;

--EL QUE CREO LA TABLA MEDICAMENTOS QUE LA ACTUALICE CON EL NOMBRE QUE LE PUSO, Y EL NOMBRE DE LOS CAMPOS.
create table cat_Medicamentos(
   idMed int primary key,
   clave varchar(64),
   NombreGen varchar(64),
   presentacion varchar(100),
   idTab integer,
   estado boolean default true,
    foreign key(idTab) references Cat_Tabulador(id_Tab)
);
create sequence s_medicamentos
start with 631
increment by 1
minvalue 631;


alter table CAT_MEDICAMENTOS alter column idmed set default nextval('s_medicamentos');

insert into cat_Medicamentos values('20191910', 'Acetaminofen', 1,true);
insert into cat_Medicamentos values('10101010', 'Paracetamol', 1,true);
insert into cat_Medicamentos values('30102100', 'Naproxeno Sodico', 1,true);
insert into cat_Medicamentos values('40140120', 'Amoxicilina', 1,true);
insert into cat_Medicamentos values('12450160', 'Penprocilina 400', 1,true);
insert into cat_Medicamentos values('45678215', 'Ampicilina', 1,true);
insert into cat_Medicamentos values('89798765', 'Penprocilina 800', 1,true);
insert into cat_Medicamentos values('54896478', 'Acido Acetilsalicilico', 1,true);
insert into cat_Medicamentos values('78241656', 'Aciclovir', 1,true);
insert into cat_Medicamentos values('14785236', 'Alopurinol', 1,true);
insert into cat_Medicamentos values('96325874', 'Alprostadil', 1,true);
insert into cat_Medicamentos values('85214789', 'Amlodipina', 1,true);
insert into cat_Medicamentos values('78945612', 'Anastrozol', 1,true);
insert into cat_Medicamentos values('98765432', 'Baclofeno', 1,true);
insert into cat_Medicamentos values('32145698', 'Benazepril', 1,true);
insert into cat_Medicamentos values('58746984', 'Benzotropina', 1,true);
insert into cat_Medicamentos values('21456398', 'Bisacodilo', 1,true);
insert into cat_Medicamentos values('87978978', 'Calcitonina', 1,true);
insert into cat_Medicamentos values('21323232', 'Capsaicina', 1,true);
insert into cat_Medicamentos values('25454654', 'Carteolol', 1,true);


-- -----------------------------------------------------
-- Table `signosVitales`                                         23
-- -----------------------------------------------------
--drop table signosVitales;

create table signosVitales(
   cns serial primary key,
   id_pac integer,
    foreign key(id_pac) references paciente(id_pac),
   peso float,
   estatura float,
   imc  float,
   temperatura float,
   fc varchar(64),
   fr varchar(30),
   ta varchar(30),
   fecha date,
   turno varchar(30),
   derecho_habiencia varchar(150),
   tipo_consulta varchar(100),
   id_emp int references cat_empleados,
   id_med int references medicos,
   pago_consulta varchar(100),
   paciente_agendado varchar(10),
   hora_cita time,
   hora_solicitud time,
   hora_salida time,
   folio_curacion varchar(100)
);

-- -----------------------------------------------------
-- Table Consulta
-- -----------------------------------------------------
--DROP TABLE IF EXISTS Consulta ;

CREATE TABLE Consulta (
  idConsulta serial PRIMARY KEY,
  id_med INT references medicos,
  id_pac INT references paciente,
  fecha_hr DATE 
  );

-- -----------------------------------------------------
-- Table Nota_Medica
-- -----------------------------------------------------
--DROP TABLE Nota_Medica;

CREATE TABLE Nota_Medica (
   id_nota serial primary key,
   id_med INT references medicos,
   id_pac INT references paciente,
   id_consulta INT references consulta,
   id_signosvitales int references signosvitales,
  diagnostico int references cat_Diagnostico,
  etapa varchar(100),
   fecha DATE,
   antecedentes_heredados text,
   antecedentes_personales text,
   antecedentes_no_personales text,
   antecedentes_padecimiento text,
   laboratorios text,
   evolucion text,
   toxicidad text,
   sintomas text,
   plan text,
   observacion text,
    estado_enfermedad varchar(40),
    etapa_enfermedad int,
    tiempo_libre_enfermedad text,
    exploracion text,
    analisis text,
    pronostico text,
    histopatologia text
  ); 

-- -----------------------------------------------------
-- Table det_NotaMedica`
-- -----------------------------------------------------
--DROP TABLE det_NotaMedica ;

CREATE TABLE det_NotaMedica (
   id_pac int references paciente,
   id_nota INT references Nota_Medica,
   laboratorios text,
   estudios_ext text,
   historial_tx text,
  PRIMARY KEY (id_pac, id_nota));
  
-- -----------------------------------------------------
-- Table Receta`
-- -----------------------------------------------------
--DROP TABLE Receta` ;

CREATE TABLE Receta (
  idReceta serial PRIMARY KEY,
  id_medico INT references medicos,
  id_pac int references paciente,
  fecha DATE,
  id_notamedica int references Nota_Medica,
  usuario_valid varchar (64) default '',
  fecha_valid date,
  verificado boolean default false,
  observacion text default ''
  );
  
-- -----------------------------------------------------
-- Table det_Receta`
-- -----------------------------------------------------
--DROP TABLE det_Receta ;

CREATE TABLE det_Receta (
  idReceta INT references receta,
  id_detReceta serial,
  id_medicamento INT references cat_Medicamentos,
  dosis VARCHAR(45),
  frecuencia VARCHAR(45),
  dilucion VARCHAR(45),
  via_administracion VARCHAR(45) ,
  fecha_aplicacion text,
  validacion boolean default false,
  descripcion VARCHAR(255) NULL,
  justif varchar(50) default '',
  PRIMARY KEY (idReceta, id_detReceta)
);

CREATE TABLE medicamento_extra (
  idReceta INT references receta,
  id_detReceta serial,
  medicamento varchar(100),
  dosis VARCHAR(45),
  frecuencia VARCHAR(45),
  via_administracion VARCHAR(45) ,
  fecha_aplicacion text,
  validacion boolean default false,
  descripcion VARCHAR(255) NULL,
  justif varchar(50) default '',
  dilucion VARCHAR(45),
  PRIMARY KEY (idReceta, id_detReceta)
);

--nueva
CREATE TABLE alternativa_medicamentos (
  idReceta INT references receta,
  id_alternativa serial,
  medicamento varchar(100),
  dosis VARCHAR(45),
  frecuencia VARCHAR(45),
  via_administracion VARCHAR(45) ,
  fecha_aplicacion text,
  validacion boolean default false,
  descripcion VARCHAR(255) NULL,
  dilucion VARCHAR(45),
  justif varchar(50) default '',
  PRIMARY KEY (idReceta, id_detReceta)
);

CREATE TABLE historial_tx(
  id_historial serial primary key,
  id_nota INT references Nota_Medica,
  id_notaactual INT references Nota_Medica,
  descripcion text
);

CREATE TABLE estudios_ext(
  id_estudio serial primary key,
  id_nota INT references Nota_Medica,
  id_notaactual INT references Nota_Medica,
  descripcion text
);

--drop table agenda
CREATE TABLE agenda (
  --Necesarios para inicializar eventos
  id serial primary key,
  title varchar(100) not null,
  start varchar(25) not null,
  
  expediente varchar(100) not null,
  programado varchar(5) not null,
    paciente varchar(64) not null,
  observaciones text not null,
  fecha_nac date not null,
  cama varchar(30) not null,
    cdgc varchar(64) not null,
    medic_onco text not null,
  medic_onco_noval text not null,
  medic_alter text not null,
  medic_alter_noval text not null,
  pre_medic text not null,
  frec_ciclo varchar(100) not null,
  medico varchar(64) not null,
  enfermera varchar(64) not null,
  fecha date not null,
  hora varchar(25) not null,
  estado text not null
);

CREATE TABLE cat_cama_onco(
  id_cama serial primary key,
  descripcion varchar(30) not null,
  tipo int not null
);
insert into cat_cama_oncocat_cama_oncocat_cama_onco (descripcion,tipo) values('CAMA 1 PISO',0 );
insert into cat_cama_oncocat_cama_onco (descripcion,tipo) values('CAMA 2 PISO',0 ) ;
insert into cat_cama_onco (descripcion,tipo) values('CAMA 1 ALBULATORIA',1 );



--ALTERS ACUALES

alter table historial_tx add column id_notaactual INT references Nota_Medica

alter table estudios_ext add column id_notaactual INT references Nota_Medica


--MEJORAS DE 02-11-19

alter table paciente add column estado_enfermedad varchar(40);
alter table paciente add column etapa_enfermedad int;
alter table paciente add column tiempo_libre_enfermedad text;

alter table signosvitales add column hora_solicitud time;
alter table signosvitales add column fecha date;


alter table signosvitales add column turno varchar(30);
alter table signosvitales add column derecho_habiencia varchar(150);
alter table signosvitales add column tipo_consulta varchar(100);
alter table signosvitales add column id_emp int references cat_empleados;
alter table signosvitales add column pago_consulta varchar(100);
alter table signosvitales add column paciente_agendado varchar(10);
alter table signosvitales add column hora_cita time;

alter table signosvitales add column hora_salida time;
alter table signosvitales add column folio_curacion varchar(100);
alter table signosvitales add id_med int references medicos;



alter table medicos add column foto varchar(255);


