<?php 
include "conexion.php";
session_start(); 
if (empty($_SESSION['Usuario'])) 
{
header ("Location: login.php");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="logo.png">
  <title><?php print $titulo?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body background="logo.png" class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="inicio.php?tabla=Menu Principal" class="logo">
     <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php print $titulo?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="logo.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php print $_SESSION['Usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="logo.png" class="img-circle" alt="User Image">

                <p>
                 <?php print $_SESSION['Usuario']; ?> 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">                
                <div class="pull-right">
                  <a href="login.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print $_SESSION['Usuario'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU DE NAVEGACION</li>
<li class="treeview <?php if($_REQUEST['modulo']=='clientes') print "active";?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="insertarcliente.php?modulo=clientes"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="clientes.php?modulo=clientes"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['modulo']=='paises') print " active";?>">
          <a href="#">
            <i class="fa fa-pinterest-p"></i>
            <span>Paises</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="insertarpais.php?modulo=paises"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="paises.php?modulo=paises"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>

        <li class="treeview <?php if($_REQUEST['modulo']=='ciudades') print " active";?>">
          <a href="#">
            <i class="fa fa-pinterest-p"></i>
            <span>Ciudades</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="insertarciudad.php?modulo=ciudades"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="ciudades.php?modulo=ciudades"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>

        

        
        <li class="treeview <?php if($_REQUEST['modulo']=='usuarios') print "active";?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="insertarusuario.php"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="usuarios.php"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>

<?php
if ($_SESSION["Rol"]=='1')
{
?>
<li class="treeview <?php if($_REQUEST['tabla']=='Roles') print " active";?>">
          <a href="#">
            <i class="fa fa-registered"></i>
            <span>Roles</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Roles"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Roles"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<?php
}
?>
<?php
if ($_SESSION["Rol"]=='1')
{
?>
<li class="treeview <?php if($_REQUEST['tabla']=='Usuarios') print " active";?>">
          <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Usuarios"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Usuarios"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<?php
}
?>
<li class="treeview <?php if($_REQUEST['tabla']=='Colores' || $_REQUEST['tabla']=='Tallas' ) print " active";?>">
          <a href="#">
            <i class="fa fa-amazon"></i>
            <span>Tablas Auxiliares</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="listar.php?tabla=Colores"><i class="fa fa-contao"></i> Colores</a></li>
            <li><a href="listar.php?tabla=Tallas"><i class="fa fa-tumblr"></i> Tallas</a></li>
          </ul>
        </li>        
        <li class="header">FIN DEL MENU</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php print $titulo;?> 
        <small>Sistema de gestion</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio.php?tabla=Tablero"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Modulos</li>
        <li class="active"><?php print $_REQUEST['modulo'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">