<?php
include "menu.php";

if ($_REQUEST['accion']=='Insertado')
{
print "<div class='alert alert-success'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Registro Insertado!</strong></div>";
}

print "<h3 class='box-title'>Ciudades</h3>
<table id='example1' class='table table-bordered table-striped'>
<thead>";
$sql1 = "select * from Ciudades;";
$resultado1 = $db->query($sql1);
print "<tr><th>Nombre:</th>
<th>Acción:</th></tr></thead><tbody>";
while($fila1 = $resultado1->fetch_assoc())
{
print "<tr><td>$fila1[Nombre]</td><td><a href=editarciudad.php?Id=$fila1[Id] 
class='fa fa-fw fa-edit'><a href=eliminarciudad.php?Id=$fila1[Id] 
class='fa fa-fw fa-remove'></td></tr>";
}
print "</tbody></table>";

print "<a class='btn btn-info' href=insertarciudad.php>Insertar</a>";

include "pie.php";
?>