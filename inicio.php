<?php 
include "menu.php";
?>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
<?php
$sql = "select * from clientes";
$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
print "<h3>$cantidad</h3>";
?>
              <p>Clientes Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="clientes.php" class="small-box-footer">Listar Clientes<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
 <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
<h3>100</h3><p>Prendas en Stock</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="listar.php?tabla=Prendas" class="small-box-footer">Listar Prendas<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
<h3>5</h3><p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="listar.php?tabla=Usuarios" class="small-box-footer">Listar Usuarios<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<h3>7</h3><p>Ventas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="listar.php?tabla=Alquileres" class="small-box-footer">Listar Alquileres<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
<?php
include "pie.php";
?>