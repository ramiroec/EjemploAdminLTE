<?php
include "conexion.php";
$sql="delete from Paises where Id=$_REQUEST[Id]";
$db->query($sql);
header ("Location: paises.php");
exit;
?>
