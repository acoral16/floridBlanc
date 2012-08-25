use florida;

CREATE TABLE rols (
rols_id INTEGER NOT NULL AUTO_INCREMENT,
rols_name VARCHAR(100) NOT NULL UNIQUE,
rols_description VARCHAR(100) NOT NULL,
CONSTRAINT PK_rols PRIMARY KEY (rols_id)
) ENGINE=INNODB;

CREATE TABLE users (
users_id INTEGER NOT NULL AUTO_INCREMENT,
users_name VARCHAR(100) NOT NULL,
users_username VARCHAR(100) NOT NULL UNIQUE,
users_password VARCHAR(100) NOT NULL,
users_mail VARCHAR(100) NOT NULL,
rols_id INTEGER NOT NULL,
CONSTRAINT PK_users PRIMARY KEY (users_id)
) ENGINE=INNODB;

insert into rols (rols_name, rols_description) values ('admin', 'System admin');
insert into rols (rols_name, rols_description) values ('user', 'System users');

insert into users (users_name, users_username, users_password, users_mail, rols_id) values ('System admin', 'admin', md5('macl123456'), 'acoral16@gmail.com', 1);
insert into users (users_name, users_username, users_password, users_mail, rols_id) values ('User 1', 'user1', md5('user1'), 'temp@gmail.com', 2);

ALTER TABLE users ADD CONSTRAINT rols_users
FOREIGN KEY (rols_id) REFERENCES rols (rols_id);

CREATE TABLE meta (
meta_id INTEGER NOT NULL AUTO_INCREMENT,
meta_control VARCHAR(50),
meta_codigo VARCHAR(50) NOT NULL,
meta_fuente VARCHAR(50),
meta_detalle VARCHAR(500),
CONSTRAINT PK_meta PRIMARY KEY (meta_id)
) ENGINE=INNODB;

LOAD DATA LOCAL INFILE 'C:/metas.csv'
INTO TABLE meta
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
(meta_control, meta_codigo, meta_fuente, meta_detalle);

CREATE TABLE dptos (
dptos_id INTEGER NOT NULL AUTO_INCREMENT,
dptos_name VARCHAR(50) NOT NULL,
dptos_code INTEGER NOT NULL UNIQUE,
CONSTRAINT PK_dptos PRIMARY KEY (dptos_id)
) ENGINE=INNODB;

CREATE TABLE municipios (
municipios_id INTEGER NOT NULL AUTO_INCREMENT,
municipios_name VARCHAR(50) NOT NULL,
municipios_dptos_code INTEGER NOT NULL,
municipios_code INTEGER NOT NULL,
CONSTRAINT PK_municipios PRIMARY KEY (municipios_id)
) ENGINE=INNODB;

ALTER TABLE municipios ADD CONSTRAINT municipios_dptos
FOREIGN KEY (municipios_dptos_code) REFERENCES dptos (dptos_code);

LOAD DATA LOCAL INFILE 'C:/dptos.csv'
INTO TABLE dptos
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
(dptos_code, dptos_name);



LOAD DATA LOCAL INFILE 'C:/muni.csv'
INTO TABLE municipios
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
(municipios_code, municipios_name, municipios_dptos_code);


CREATE TABLE project (
project_id INTEGER NOT NULL AUTO_INCREMENT,
project_nombre VARCHAR(500) NOT NULL,
project_ejeTematico VARCHAR(1000) NOT NULL,
project_lineaTematico VARCHAR(1000) NOT NULL,
project_metaResultado VARCHAR(30) NOT NULL,
project_nombrePrograma VARCHAR(1000) NOT NULL,
project_metaProducto VARCHAR(30) NOT NULL,
project_condicionesActuales VARCHAR(1000) NOT NULL,
project_descripcionSituacion VARCHAR(1000) NOT NULL,
project_descripcionProducto VARCHAR(1000) NOT NULL,
project_causasDirectas VARCHAR(1000) NOT NULL,
project_causasIndirectas VARCHAR(1000) NOT NULL,
project_efectosDirectos VARCHAR(1000) NOT NULL,
project_efectosIndirectos VARCHAR(1000) NOT NULL,
project_region VARCHAR(1000) NOT NULL,
project_departamento INTEGER NOT NULL,
project_municipio INTEGER NOT NULL,
project_clasePoblado VARCHAR(1000) NOT NULL,
project_localizacion VARCHAR(1000) NOT NULL,
project_descripcion VARCHAR(1000) NOT NULL,
project_objetivoGeneral VARCHAR(1000) NOT NULL,
project_objetivoEspecifico VARCHAR(1000) NOT NULL,
project_metaObjetivoEspecifico VARCHAR(30) NOT NULL,
project_objetivoEspecifico2 VARCHAR(1000) NOT NULL,
project_metaObjetivoEspecifico2 VARCHAR(30) NOT NULL,
project_justificacionYantecedentes VARCHAR(5000) NOT NULL,
project_valor INTEGER NOT NULL,
project_fuenteFinanciacion VARCHAR(45) NOT NULL,
project_saldo INTEGER NOT NULL,
project_ssepi VARCHAR(45) NOT NULL,
project_createdBy INTEGER NOT NULL,
project_avanceFisico INTEGER NOT NULL,
project_avanceFinanciero INTEGER NOT NULL,
project_fechaCreacion DATETIME NOT NULL,
project_activo TINYINT(1) NOT NULL,
CONSTRAINT PK_project PRIMARY KEY (project_id)
) ENGINE=INNODB;


ALTER TABLE project ADD CONSTRAINT project_users
FOREIGN KEY (project_createdBy) REFERENCES users (users_id);

ALTER TABLE project ADD CONSTRAINT project_municipio
FOREIGN KEY (project_municipio) REFERENCES municipios (municipios_code);

ALTER TABLE project ADD CONSTRAINT project_dptos
FOREIGN KEY (project_departamento) REFERENCES dptos (dptos_code);


CREATE TABLE contract (
contract_id INTEGER NOT NULL AUTO_INCREMENT,
contract_numero INTEGER NOT NULL UNIQUE,
contract_objeto VARCHAR(150) NOT NULL,
contract_fechaRegistroContrato DATETIME NOT NULL,
contract_fechaActualizacion DATETIME NOT NULL,
contract_oficinaGestora VARCHAR(50) NOT NULL,
contract_observaciones VARCHAR(1000),
contract_valorContrato INTEGER NOT NULL,
contract_codigoPresupuesto VARCHAR(45) NOT NULL,
contract_valorCodigo VARCHAR(45) NOT NULL,
contract_porcentajeRespectoValorProyecto DOUBLE NOT NULL,
contract_proyectoId INTEGER NOT NULL,
contract_createdBy INTEGER NOT NULL,
contract_avanceFisico INTEGER NOT NULL,
contract_avanceFinanciero INTEGER NOT NULL,
CONSTRAINT PK_contract PRIMARY KEY (contract_id)
) ENGINE=INNODB;

ALTER TABLE contract ADD CONSTRAINT contract_project
FOREIGN KEY (contract_proyectoId) REFERENCES project (project_id);

ALTER TABLE contract ADD CONSTRAINT contract_user
FOREIGN KEY (contract_createdBy) REFERENCES users (users_id);


CREATE TABLE acta (
acta_id INTEGER NOT NULL AUTO_INCREMENT,
acta_name VARCHAR(100) NOT NULL,
acta_path VARCHAR(100) NOT NULL,
acta_createdBy INTEGER NOT NULL,
acta_projectId INTEGER NOT NULL,
acta_contractId INTEGER NOT NULL,
acta_avanceFisico INTEGER NOT NULL,
acta_avanceFinanciero INTEGER NOT NULL,
acta_fechaCargue DATETIME NOT NULL,
acta_pagada VARCHAR(1) NOT NULL,
CONSTRAINT PK_acta PRIMARY KEY (acta_id)
) ENGINE=INNODB;

ALTER TABLE acta ADD CONSTRAINT acta_creator
FOREIGN KEY (acta_createdBy) REFERENCES users (users_id);

ALTER TABLE acta ADD CONSTRAINT acta_project
FOREIGN KEY (acta_projectId) REFERENCES project (project_id);

ALTER TABLE acta ADD CONSTRAINT acta_contract
FOREIGN KEY (acta_contractId) REFERENCES contract (contract_id);

DELIMITER //
DROP TRIGGER IF EXISTS updateContractOnCreate //
DROP TRIGGER IF EXISTS updateContractOnUpdate //

CREATE TRIGGER updateContractOnCreate AFTER INSERT ON contract
FOR EACH ROW BEGIN
  DECLARE avanceFinanciero INT;
  DECLARE avanceFisico INT;
  DECLARE idProject INT;
  DECLARE porcentaje DOUBLE;
  SET porcentaje = new.contract_porcentajeRespectoValorProyecto;
  SET idProject = new.contract_proyectoId;
  SET avanceFinanciero = (SELECT SUM(contract_avancefisico) FROM contract where contract_proyectoId = idProject)*(porcentaje/100);
  SET avanceFisico = (SELECT SUM(contract_avancefinanciero) FROM contract where contract_proyectoId = idProject)*(porcentaje/100);
  UPDATE project SET project_avanceFinanciero = avanceFinanciero WHERE project_id = idProject;
  UPDATE project SET project_avanceFisico = avanceFisico WHERE project_id = idProject;
END//

CREATE TRIGGER updateContractOnUpdate AFTER UPDATE ON contract
FOR EACH ROW BEGIN
  DECLARE avanceFinanciero INT;
  DECLARE avanceFisico INT;
  DECLARE idProject INT;
  DECLARE porcentaje DOUBLE;
  SET porcentaje = new.contract_porcentajeRespectoValorProyecto;
  SET idProject = new.contract_proyectoId;
  SET avanceFinanciero = (SELECT SUM(contract_avancefisico) FROM contract where contract_proyectoId = idProject)*(porcentaje/100);
  SET avanceFisico = (SELECT SUM(contract_avancefinanciero) FROM contract where contract_proyectoId = idProject)*(porcentaje/100);
  UPDATE project SET project_avanceFinanciero = avanceFinanciero WHERE project_id = idProject;
  UPDATE project SET project_avanceFisico = avanceFisico WHERE project_id = idProject;
END//

 