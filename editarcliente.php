<?php
if ($_REQUEST['Nombre'])
{
include "conexion.php";
$sql="update clientes set Nombre='$_REQUEST[Nombre]',Apellido='$_REQUEST[Apellido]',Direccion='$_REQUEST[Direccion]',Telefono='$_REQUEST[Telefono]' where Id=$_REQUEST[Id]";
//print $sql;
$db->query($sql);
header ("Location: clientes.php");
exit;
}
include "menu.php";
$sql1 = "select * from clientes where Id=$_REQUEST[Id]";
$resultado1 = $db->query($sql1);
$fila1 = $resultado1->fetch_assoc();

print "<h4 align=left>Editar: Clientes</h4>
<div class=col-md-6><br>
<form>
<label>Nombre:</label><input class=form-control type=text name=Nombre required value='$fila1[Nombre]'><br>
<label>Apellido:</label><input class=form-control type=text name=Apellido value='$fila1[Apellido]' required><br>
<label>Direccion:</label><input class=form-control type=text name=Direccion value='$fila1[Direccion]' required><br>
<label>Telefono:</label><input class=form-control type=tel name=Telefono value='$fila1[Telefono]' required><br>

<label>Pais:</label><select name=Pais class=form-control>";
$sql2="select * from Paises";
$resultado2 = $db->query($sql2);
while($fila2 = $resultado2->fetch_assoc())
{
    print "<option value=$fila1[Id]>$fila1[Nombre]</option>";
}
print "</select><br><input type=hidden name=Id value=$fila1[Id]><br>
<input type=submit class='btn btn-primary'>
</form>
</div>";
include "pie.php";
?>
