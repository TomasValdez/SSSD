 Create database solicitud;

 use solicitud;


CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` INT NOT NULL,
  `idTecnico`int ,
  `Apellido1` VARCHAR(15) NOT NULL,
  `Apellido2` VARCHAR(15) NOT NULL,
  `Nombre1` VARCHAR(15) NOT NULL,
  `Nombre2` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(30) NOT NULL,
  `Puesto` VARCHAR(50) NOT NULL,
  `Adscripcion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idEmpleado`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `estudiante` (
  `idEstudiante` INT NOT NULL,
  `Nombre` VARCHAR(40) NOT NULL,
  `Area` VARCHAR(25) NOT NULL,
  `Correo` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idEstudiante`))
ENGINE = InnoDB;






CREATE TABLE IF NOT EXISTS `Registro2` (
  `idRegistro` INT auto_increment,
  `CorreoSolic` varchar(30),
  `idTecnico` INT NULL,
  `TipoS` VARCHAR(30) NULL,
  `statusS` VARCHAR(10) NULL default 'Espera',
  `FechaR` DATETIME NULL,
  `FechaL` DATETIME NULL,
  `Valoracion` INT NULL,
  `Comentario` VARCHAR(200) NULL,
  `Activacion` INT default 0,
  PRIMARY KEY (`idRegistro`),
  foreign key(idTecnico) references Tecnico(idTecnico))
ENGINE = InnoDB;




 
CREATE TABLE IF NOT EXISTS `Tecnico` (
  `idTecnico` INT auto_increment,
  
  `Nombre` VARCHAR(45) NULL,
  `ApellidoP` VARCHAR(45) NULL,
  `ApellidoM` VARCHAR(45) NULL,
  `Prioridad` INT  NULL,
  PRIMARY KEY (`idTecnico`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `Habilidad` (
  `idTecnico` INT NOT NULL,
  `Departamento` VARCHAR(45) NOT NULL,
  `Habilidad` VARCHAR(30) NOT NULL
  ,primary key(idTecnico,Departamento,Habilidad)
  ,foreign key (idTecnico) references Tecnico(idTecnico))
ENGINE = InnoDB