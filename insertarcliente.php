<?php
if ($_REQUEST['Nombre'])
{
include "conexion.php";
$sql="insert into clientes(Nombre,Apellido,Direccion,Telefono,Pais) values ('$_REQUEST[Nombre]','$_REQUEST[Apellido]','$_REQUEST[Direccion]','$_REQUEST[Telefono]','$_REQUEST[Pais]')";
//print $sql;
$db->query($sql);
header ("Location: clientes.php?accion=Insertado");
exit;
}
include "menu.php";
print "<h4 align=left>Agregar: Clientes</h4>
<div class=col-md-6><br>
<form>
<label>Nombre:</label><input class=form-control type=text name=Nombre required><br>
<label>Apellido:</label><input class=form-control type=text name=Apellido required><br>
<label>Direccion:</label><input class=form-control type=text name=Direccion required><br>
<label>Telefono:</label><input class=form-control type=tel name=Telefono required><br>

<label>Pais:</label><select name=Pais class=form-control>";
$sql1="select * from Paises";
$resultado1 = $db->query($sql1);
while($fila1 = $resultado1->fetch_assoc())
{
    print "<option value=$fila1[Id]>$fila1[Nombre]</option>";
}
print "</select><br><input type=submit class='btn btn-primary'>
</form>
</div>";
include "pie.php";
?>

