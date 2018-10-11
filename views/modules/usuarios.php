<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
	<div class="page-header">
        <h1>listado de alumnos</h1>
    </div>

	<div class="box-body no-padding">
        <table class="table table-striped">
            <tr>
	          	<th style="width: 10px">#</th>
              	<th>Nombre</th>
              	<th>Matricula</th>
              	<th>Tutor</th>
			  	<th>Carrera</th>
			  	<th>Situación</th>
				<th>Email</th>
				<th>Foto</th>
				<th>Editar</th>
				<th>Eliminar</th>
            </tr>
			<tbody>
				<?php 
					$listaAlumnos = new MvcController();
					$listaAlumnos->getAlumnosController();
					$listaAlumnos->borrarAlumnoController()
				?>
			</tbody>
        </table>
    </div>

	<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'cambio')
			echo 'Ha actualizado los datos del usuario';
	}
?>