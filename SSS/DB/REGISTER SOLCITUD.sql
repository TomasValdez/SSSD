-- M20CE024@cenidet.tecnm.mx
SET @ID=(SELECT max(idRegistro) from registro2 where activacion=1 and statusS="Espera" order by idregistro desc ); /*buscar idregistro que este en espera*/

	SET @tipo=(SELECT tipoS   from registro2  where idRegistro=@ID limit 1)  ;
	SET @correo=(SELECT correoSolic  from registro2  where idRegistro=@ID limit 1);
    
	SET @Area=(SELECT em.adscripcion from Empleado em WHERE Correo=@correo
	union
	SELECT es.Area  from Estudiante es WHERE Correo=@correo limit 1);

	select tec.idtecnico  from tecnico tec inner join habilidad hab on tec.idtecnico=hab.idtecnico WHERE Habilidad=@tipo
		and tec.idTecnico not in(select idTecnico from registro2 where statusS="Asignado" and tipoS=@tipo group by  idTecnico ) 
        and   departamento = ('M-Electrónica' )
		order by Prioridad desc limit 1;
        
        
        select idTecnico from registro2 where statusS="Asignado" and tipoS="SOFTWARE" group by  idTecnico;