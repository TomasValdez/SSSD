					/* como saber que departemento es */
insert into tecnico (Nombre,ApellidoP,ApellidoM,Prioridad) VALUES ('Carlos','Rodriguez','Hernandez',5,'arlosH@gmail.com');
insert into tecnico (Nombre,ApellidoP,ApellidoM,Prioridad) VALUES ('Saul','Mendez','Galileo',4,'SaulM@gmail.com');
insert into tecnico (Nombre,ApellidoP,ApellidoM,Prioridad) VALUES ('jonathan','cruz','flores',4,'JonathanC@gmail.com');
insert into tecnico (Nombre,ApellidoP,ApellidoM,Prioridad) VALUES ('Angela','Lopez','Lopez',4,'AngelaL@gmail.com');

insert into Habilidad values(1,'M-Computación',"SII");
insert into Habilidad values(1,"M-Electrónica","SOFTWARE");
insert into Habilidad values(2,'D-Computación',"SII");
insert into Habilidad values(3,'M-Computación',"SII");

insert into Habilidad values(2,'DEPTO. DE INGENIERÍA  ELECTRÓNICA',"SII");

insert into Habilidad values(2,'DEPTO. DE INGENIERÍA  ELECTRÓNICA',"SII");

select distinct(Adscripcion) from empleado   order by Adscripcion;

select now()