<?php
if ($_REQUEST['nombre'])
{
include "conexion.php";
$sql="update productos set nombre='$_REQUEST[Nombre]',precio='$_REQUEST[precio]',stock='$_REQUEST[stock]',imagen='$_REQUEST[Telefono]' where id=$_REQUEST[id]";
$columna=$fila1['column_name'];

//print $sql;
$db->query($sql);
header ("Location: clientes.php");
exit;
}
include "menu.php";
$sql1 = "select * from productos where id=$_REQUEST[id]";
$resultado1 = $db->query($sql1);
$fila1 = $resultado1->fetch_assoc();

print "<h4 align=left>Editar: Productos</h4>
<div class=col-md-6><br>
<form method='post' enctype='multipart/form-data'>
<label>Nombre:</label><input class=form-control type=text name=nombre required value='$fila1[nombre]'><br>
<label>Precio:</label><input class=form-control type=text name=precio value='$fila1[precio]' required><br>
<label>Stock:</label><input class=form-control type=text name=stock value='$fila1[stock]' required><br>";

print "<label>Imagen:</label><input class=form-control type=file name=imagen>"; 
print "<img class='img-responsive' src=" . '"' . "data:image/jpeg;base64," .base64_encode($fila1['imagen']) . '"' . "/>";


print "<br><input type=hidden name=Id value=$fila1[Id]><br>
<input type=submit class='btn btn-primary'>
</form>
</div>";
include "pie.php";
?>
