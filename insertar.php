<?php 
include "conexion.php";
$contador=1;
$sql = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";

$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
$insert = "insert into $_REQUEST[tabla] (";

while($fila = $resultado->fetch_assoc())
{ 
if ($fila["column_name"]!="Id" && $contador!=$cantidad) 
$insert = $insert . $fila['column_name'] . ",";
if ($contador==$cantidad)
$insert = $insert . $fila['column_name'] . ")";
$contador++;
}

$sql = "select column_name, data_type from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado = $db->query($sql);
$contador=1;

$insert=$insert . " values (";

while($fila = $resultado->fetch_assoc())
{  
if ($fila["column_name"]!="Id" && $fila["data_type"]!='mediumblob')
$insert = $insert . "'" . $_REQUEST[$fila['column_name']] . "'";
if ($fila["data_type"]=='mediumblob')
{
$img =addslashes(file_get_contents ($_FILES[$fila['column_name']]['tmp_name']));
$insert = $insert . "'" . $img . "'";
}
if ($contador!=1 && $contador!=$cantidad)
$insert = $insert . ",";
elseif ($contador==$cantidad) 
$insert = $insert . ")";

$contador++;
}
if ($db->query($insert) === TRUE) {
header ("Location: listar.php?tabla=$_REQUEST[tabla]&accion=insertado");
} else {
header ("Location: crear.php?tabla=$_REQUEST[tabla]&error=$db->error");    
}
?>

<?php 
include "menu.php";
function endsWith($haystack, $needle) {
	//Permite identificar si el campo de la tabla termina con "_Id" 
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
if (isset($_REQUEST['error']))
print "<div class='alert alert-danger'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Error:!</strong> $_REQUEST[error]</div>";

$fecha=date("Y-m-d");
$hora=date("h:i:s");
$sql1 = "select column_name, data_type from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado1 = $db->query($sql1);

print "<div align=left><h3 class='box-title'>Agregar: $_REQUEST[tabla]</h3></div>";
print "<div class=col-md-6><br><form method='post' enctype='multipart/form-data' action=insertar.php>";
while($fila1 = $resultado1->fetch_assoc())
{ 
if ($fila1['column_name']=='Email') 
print "<label>$fila1[column_name]:</label><input class=form-control type=email name=$fila1[column_name] required><br>";
if ($fila1["data_type"] == "varchar" && $fila1['column_name']!='Email')
print "<label>$fila1[column_name]:</label><input class=form-control type=text name=$fila1[column_name] required><br>";
if ($fila1["data_type"]=="int" && $fila1["column_name"]!="Id" && endsWith($fila1["column_name"], '_Id') != "true") 
print "<label>$fila1[column_name]:</label><input class=form-control type=number name=$fila1[column_name] required><br>";
if ($fila1["data_type"] == "date") 
print "<label>$fila1[column_name]:</label><input class=form-control type=date name=$fila1[column_name] value=$fecha required><br>";
if ($fila1["data_type"]=="time")
print "<label>$fila1[column_name]:</label><input class=form-control type=time name=$fila1[column_name] value=$hora required><br>";
if ($fila1["data_type"]=="mediumblob")
print "<label>$fila1[column_name]:</label><input class=form-control type=file name=$fila1[column_name]><br>";
if (endsWith($fila1["column_name"], '_Id') == "true")
{
$sql2 = "select * from " . substr($fila1["column_name"], 0, -3);
$resultado2 = $db->query($sql2);
print "<label>$fila1[column_name]:</label><br><select class=form-control name=$fila1[column_name]>";

while($fila2 = $resultado2->fetch_assoc())
{
print "<option value=$fila2[Id]>$fila2[Nombre] ";
if (isset($fila2['Apellido']))
print $fila2['Apellido'];
if (isset($fila2['Precio']))
{
print " Gs." . $fila2['Precio'];
}
if (isset($fila2['Tallas_Id']))
{
	if($fila2['Tallas_Id']==1)
	print " Talla:Pequeño";
        if($fila2['Tallas_Id']==2)
        print " Talla:Mediano";
        if($fila2['Tallas_Id']==3)
        print " Talla:Largo";
        if($fila2['Tallas_Id']==4)
        print " Talla:Extra Largo";
}
 
    if (isset($fila2['Stock']))
{
    print " Stock Actual:" . $fila2['Stock'];
}
print "</option>";
}
print "</select><br>";
}
}
print "<input type=hidden name=tabla value=$_REQUEST[tabla]><br>";
print "<a href=listar.php?tabla=$_REQUEST[tabla] class='btn btn-warning'>Cancelar</a>";
print "<input type=submit value=Aceptar class='btn btn-primary'></form></div>";
include "pie.php"
?>
