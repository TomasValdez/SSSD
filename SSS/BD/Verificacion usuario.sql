-- PROCESO PARA LOCALIZAR EL CORREO --
DELIMITER &&
CREATE PROCEDURE Vereficacion(in _Correo varchar(30))
BEGIN 
	SET @PEOPLE_EST=(SELECT Correo from Empleado WHERE Correo=_Correo);
	SET @PEOPLE_DOC=(SELECT Correo from Estudiante WHERE Correo=_Correo);
	IF  ISNULL(@PEOPLE_EST AND @PEOPLE_DOC) then
		select 0;
	ELSE 
		select 1 ; /*si esta regitrado*/	
    END IF;
END &&
DELIMITER ;



-- ---------------------------------------------------------------------------------------------------------

drop  procedure Tecnico;
/* MOSTRAR LOS TECNCOS LIBERADOS o que no tengan asigancion*/
DELIMITER &&
CREATE procedure Tecnico(in _TipoS varchar(30),in _Correo varchar(30))
BEGIN
SET @tecnico=(
select * from tecnico tec inner join habilidad hab on tec.idtecnico=hab.idtecnico WHERE Habilidad="SOFTWARE"
 and tec.idTecnico not in (select max(idTecnico) from registro2 where statusS="Asignado" and tipoS="SOFTWARE" group by  idTecnico) and  
 departamento="M-Electrónica"
 order by Prioridad desc);


END &&
DELIMITER ;
-- call Tecnico("SOFTWARE","CARLOS@HOTMAIL.COM");
call Tecnico("SII","CARLOS@HOTMAIL.COM");


-- 2.- fullscess 
select * from tecnico tec inner join habilidad hab on tec.idtecnico=hab.idtecnico WHERE Habilidad="SOFTWARE"
 and tec.idTecnico not in (select max(idTecnico) from registro2 where statusS="Asignado" and tipoS="SOFTWARE"
 group by  idTecnico) and   departamento="M-Electrónica"
 order by Prioridad desc limit 1;



/* 
1.- metodo  en la activacion de la solitud para la Asigancion de un tecnico
2.- quien deberia poner la liberacion en base de datos
 el estudiante o el docente para que se busque otra solicitud pendiente
*/


drop table registro;











INSERT INTO REGISTRO2(CorreoSolic,
 TipoS    ,
 FechaR) VALUES("Leticia@hotmail.com","SII",now());

SELECT distinct(AREA) FROM
 ESTUDIANTE order by AREA ASC;
SELECT distinct(ADSCRIPCION) FROM EMPLEADO order by ADSCRIPCION ASC;