<?php
if ($_REQUEST['Nombre'])
{
include "conexion.php";
$sql="insert into Paises(Nombre) values ('$_REQUEST[Nombre]')";

$db->query($sql);
header ("Location: paises.php?accion=Insertado");
exit;
}
include "menu.php";
print "<h4 align=left>Agregar: Paises</h4>
<div class=col-md-6><br>
<form>
<label>Nombre:</label><input class=form-control type=text name=Nombre required><br>
<input type=submit class='btn btn-primary'>
</form>
</div>";
include "pie.php";
?>

