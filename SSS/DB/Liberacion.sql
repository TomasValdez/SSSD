
<-- REGISTRO DE SOLCITUD LIBERADO-->
DELIMITER //
CREATE PROCEDURE liberation(in  _id int,in _valoration  int ,in _comentario varchar (250))
BEGIN 
UPDATE Registro SET  statusS="Liberado" , FechaL=date(now()) , valoracion=_valoration , Comentario=_comentario where idRegistro=_id;
END //
DELIMITER ;
