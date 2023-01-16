<?php
if (isset($_REQUEST['Nombre'])) //Si recibió algo del formulario Actualizar
{
include "conexion.php";
$sql="update Paises set Nombre='$_REQUEST[Nombre]' where Id=$_REQUEST[Id]";
$db->query($sql);
header ("Location: paises.php?modulo=paises");
exit;
}
include "menu.php";
$sql1 = "select * from Paises where Id=$_REQUEST[Id]";
$resultado1 = $db->query($sql1);
$fila1 = $resultado1->fetch_assoc();

print "<h4 align=left>Editar: Paises</h4>
<div class=col-md-6><br>
<form>
<input type=hidden name=Id value=$fila1[Id]>
<label>Nombre:</label><input class=form-control type=text name=Nombre required value='$fila1[Nombre]'><br>
<input type=submit class='btn btn-primary'>
</form>
</div>";
include "pie.php";
?>
