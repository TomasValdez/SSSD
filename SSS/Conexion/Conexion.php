<?php

$servidor ="mysql:dbname=SSD;host=127.0.0.1";
$usuario="root";
$password="";

try{
        $pdo= new PDO($servidor,$usuario,$password);
        echo"Conectado..";


}catch(PDOException $e){

        echo "Conexion fallida".$e->getMessage();
}
?>