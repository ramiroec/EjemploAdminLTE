<?php
if ($_REQUEST['nombre'])
{
include "conexion.php";
$imagen =addslashes(file_get_contents ($_FILES['imagen']['tmp_name']));
$sql="insert into productos(nombre,precio,stock,imagen) values ('$_REQUEST[nombre]','$_REQUEST[precio]','$_REQUEST[stock]','$imagen')";
//print $sql;
$db->query($sql);
header ("Location: productos.php?accion=Insertado");
exit;
}
include "menu.php";
print "<h4 align=left>Agregar: Productos</h4>
<div class=col-md-6><br>
<form method='post' enctype='multipart/form-data'>
<label>Nombre:</label><input class=form-control type=text name=nombre required><br>
<label>Precio:</label><input class=form-control type=number name=precio required><br>
<label>Stock:</label><input class=form-control type=number name=stock required><br>
<label>Imagen:</label><input class=form-control type=file name=imagen><br>
<br><input type=submit class='btn btn-primary'>
</form>
</div>";
include "pie.php";
?>

