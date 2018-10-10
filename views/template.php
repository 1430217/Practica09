<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Practica 09 - Sistema Alumnos</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="views/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P9</b>TAW</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Practica09 </b>TAW</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <!-- Barra de navegacion de arriba 
          aqui va el nombre del usuario logeado y para salir de la cuenta-->
        </div>
      </nav>
    </header>
    
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <section class="sidebar">

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
        /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menu principal</li>
          <li><a href="index.php"><i class="fa fa-link"></i> <span>Registro</span></a></li>
          <li><a href="index.php?action=usuarios"><i class="fa fa-link"></i> <span>listado de Alumnos</span></a></li>
        </ul>
      </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content container-fluid">

      <?php 
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
      ?>
      </section>
    
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Universidad Politecnica de Victoria
      </div>
      <!-- Default to the left -->
      <strong>Aplicaciones y tecnologias web 2018, <a href="http://www.upvictoria.edu.mx/">Universidad</a>.</strong>
    </footer>
    
  </div>
  
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="views/dist/js/adminlte.min.js"></script>
</body>
</html>