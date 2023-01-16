<?php
include "menu.php";

if ($_REQUEST['accion']=='Insertado')
{
print "<div class='alert alert-success'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Registro Insertado!</strong></div>";
}

print "<h3 class='box-title'>Productos</h3>
<table id='example1' class='table table-bordered table-striped'>
<thead>";
$sql1 = "select * from productos";
$resultado1 = $db->query($sql1);
print "<tr><th>Nombre:</th><th>Precio:</th><th>Stock:</th><th>Imagen:</th>
<th>Acción:</th></tr></thead><tbody>";
while($fila1 = $resultado1->fetch_assoc())
{
print "<tr><td>$fila1[nombre]</td><td>$fila1[precio]</td><td>$fila1[stock]</td>";

print '<td><img height="74" width="42" src="data:image/jpeg;base64,'.base64_encode( $fila1['imagen'] ).'"/></td>';

print "<td><a href=editarproducto.php?id=$fila1[id] 
class='fa fa-fw fa-edit'><a href=eliminarproducto.php?id=$fila1[id] 
class='fa fa-fw fa-remove'></td></tr>";
}
print "</tbody></table>";

print "<a class='btn btn-info' href=insertarproducto.php>Insertar</a>";

include "pie.php";
?>
