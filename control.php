<?php
include "conexion.php";
$sql = "select * from Usuarios where Usuario='$_REQUEST[Usuario]' and Clave='$_REQUEST[Clave]'";
$resultado = $db->query($sql);
$fila = $resultado->fetch_assoc();
$cantidad = $resultado->num_rows;
if ($cantidad==1)
{
session_start(); 
$_SESSION["Usuario"]=$_REQUEST['Usuario'];
$_SESSION["Nivel"]=$fila['Nivel'];
header ("Location: inicio.php");    
exit;
}
else
{
header ("Location: login.php?accion=ERROR");    
}
?>
