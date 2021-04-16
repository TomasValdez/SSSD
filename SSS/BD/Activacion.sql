<-- VEREFICAR Solicitud  por correo-->
DELIMITER //
CREATE PROCEDURE Activacion(in  _Correo varchar(30))
BEGIN 
declare Correo int default 0;

SELECT max(reg.idRegistro) into Correo from Registro2 reg where reg.CorreoSolic=_Correo;
if Correo>0 THEN 
UPDATE Registro2  SET Activacion=1 WHERE  idRegistro=Correo ;
     call UPDATETECNICO();
END IF;
END //
DELIMITER ;