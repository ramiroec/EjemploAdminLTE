<?php
include "menu.php";
$archivo = file_get_contents('https://dolar.melizeche.com/api/1.0/');
$lista = json_decode($archivo);
print "<strong>Amambay:<br>Compra:</strong>";
print $lista->dolarpy->amambay->compra;
print "<br>Venta:";
print $lista->dolarpy->amambay->venta;
print "<hr>";
print "Maxicambios:<br>Compra:";
print $lista->dolarpy->maxicambios->compra;
print "<br>Venta:";
print $lista->dolarpy->maxicambios->venta;
include "pie.php";
?>