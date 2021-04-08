

-- PROCESO PARA LOCALIZAR EL CORREO DEL SOLCITANTE ESTUDIANTE O EMPLEADO --
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





drop procedure register_request;
<-- REGISTRO DE SOLCITUD -->
DELIMITER //
 CREATE PROCEDURE register_request(in _TypeSer varchar(25), in  _Correo varchar(30))
 BEGIN
 INSERT INTO Registro2 (CorreoSolic,TipoS,FechaR) values (_Correo,_TypeSer ,now());
 END //
DELIMITER ;











-- BUSCAR SOLICTUDES EN ESPERA PARA PODER BUSCAR UN TECNICO--
DELIMITER //
CREATE PROCEDURE UPDATETECNICO()
BEGIN 
SET @ID=(SELECT max(idRegistro) from registro2 where activacion=1 and statusS="Espera" order by idregistro asc ); /*buscar idregistro que este en espera*/

if @ID>0 then
	SET @tipo=(SELECT tipoS   from registro2  where idRegistro=@ID limit 1)  ;
	SET @correo=(SELECT correoSolic  from registro2  where idRegistro=@ID limit 1);
	SET @Area=(SELECT em.adscripcion from Empleado em WHERE Correo=@correo
	union
	SELECT es.Area  from Estudiante es WHERE Correo=@correo limit 1);

	SET @IDT=(select tec.idtecnico  from tecnico tec inner join habilidad hab on tec.idtecnico=hab.idtecnico WHERE Habilidad=@tipo
		and tec.idTecnico not in(select idTecnico from registro2 where statusS="Asignado" and tipoS=@tipo
		group by  idTecnico ) and   departamento in (@Area )
		order by Prioridad desc limit 1);

			if @IDT>0 then
		UPDATE REGISTRO2 SET idtecnico=@IDT, statusS="Asignado" where idRegistro=@ID ;    
        select "Asignacion correcta";
			else
           select "Tecnicos no Escontrados";
        end if;
        
	else 
     select "solicitudes no pendientes";
	end if;
END //
DELIMITER ;
call UPDATETECNICO();



drop procedure VereficacionTec;
/* VEREICAR TENICO*/
DELIMITER &&
CREATE PROCEDURE VereficacionTec(in _Correo varchar(30))
BEGIN 
	SET @PEOPLE_TEC=(SELECT Correo from tecnico WHERE Correo=_Correo);
      
	IF  ISNULL(@PEOPLE_TEC) then
		select 0 as pos,"no" as nombre;
	ELSE 
    set @Nombre =(SELECT concat(Nombre," ",ApellidoP," ",ApellidoM)  from tecnico WHERE Correo=_Correo);
		select 1 as pos,@Nombre as nombre; /*si esta regitrado*/	
    END IF;
END &&
DELIMITER ;
call VereficacionTec('carlosflores@hotmail.com');

select @Nombre;


