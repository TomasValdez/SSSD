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