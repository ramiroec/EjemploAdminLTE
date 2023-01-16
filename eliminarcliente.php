<?php
include "conexion.php";
$sql="delete from clientes where Id=$_REQUEST[Id]";
$db->query($sql);
header ("Location: clientes.php");
exit;
?>
