
<-- Activacion de Solicitud  -->
DELIMITER //
CREATE PROCEDURE Activacion2(_token varchar(25))
BEGIN 
 declare idReg int;
 declare Mensseger varchar(20);
 SELECT  idRegistro into idReg FROM TOKEN where token=_token;
 
IF idReg>0 THEN   /*si esta regitrado*/
 SELECT  idRegistro into idReg FROM Registro where token=_token;
 SELECT Activacion FROM registro WHERE idRegistro=idReg;

	IF Activacion=1 THEN
		SELECT "Ya esta Activado" INTO Mensseger;
    ELSEIF Activacion=0 THEN
		UPDATE Registro SET Activacion=1 WHERE idRegistro=idReg;	
		SELECT "Registro Exitoso" INTO Mensseger;
	END IF;
ELSEIF idReg<0 THEN
	SELECT "Token No Registrado" INTO Mensseger;
END IF;
END //
DELIMITER ;