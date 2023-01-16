<?php
include "menu.php";

if ($_REQUEST['accion']=='Insertado')
{
print "<div class='alert alert-success'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Registro Insertado!</strong></div>";
}

print "<h3 class='box-title'>Clientes</h3>
<table id='example1' class='table table-bordered table-striped'>
<thead>";
$sql1 = "select clientes.*, Paises.Nombre as Pais from clientes,Paises where clientes.Pais=Paises.Id";
$resultado1 = $db->query($sql1);
print "<tr><th>Nombre:</th><th>Apellido:</th><th>Direccion:</th><th>Telefono:</th><th>Pais:</th>
<th>Acción:</th></tr></thead><tbody>";
while($fila1 = $resultado1->fetch_assoc())
{
print "<tr><td>$fila1[Nombre]</td><td>$fila1[Apellido]</td><td>$fila1[Direccion]</td>
<td>$fila1[Telefono]</td><td>$fila1[Pais]</td><td><a href=editarcliente.php?Id=$fila1[Id] 
class='fa fa-fw fa-edit'><a href=eliminarcliente.php?Id=$fila1[Id] 
class='fa fa-fw fa-remove'></td></tr>";
}
print "</tbody></table>";

print "<a class='btn btn-info' href=insertarcliente.php>Insertar</a>";

include "pie.php";
?>
