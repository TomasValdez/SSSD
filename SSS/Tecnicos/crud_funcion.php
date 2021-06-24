<?php
require'../Conexion/Conexion.php';



if(isset($_POST["btnLogin"])){
  include("global/Conexion.php");

  $txtEmail=($_POST['txtEmail']);
  $txtPassword=($_POST['txtPassword']);

  $sentencia=$pdo->prepare("SELECT * FROM crud_login WHERE correo_Admin=:correo_Admin 
  AND contraseña_Admin=:contraseña_Admin");

  $sentencia->bindParam("correo_Admin",$txtEmail,pdo::PARAM_STR);
  $sentencia->bindParam("contraseña_Admin",$txtPassword,pdo::PARAM_STR);
  $sentencia->execute();

  $numeroRegistros=$sentencia->rowCount();

  if($numeroRegistros>=1){
    echo" Bienvenido";
  }else{
    echo"No se encontraron registros";
  }
}
?>