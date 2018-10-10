<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <!-- Estilos de Bootstrap de la plantilla ADMIN LTE-->
    <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <div>
        <div class="page-header">
            <h1>Registro de alumnos</h1>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Matricula" name="matricula" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Tutor" name="tutor" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Carrera" name="carrera" required>
                <span class="glyphicon glyphicon-tower form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Situación Académica" name="situacion" required>
                <span class="glyphicon glyphicon-baby-formula form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Correo" name="correo" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="fotoPerfil">Imagen de perfil</label>
                <input type="file" class="form-control" placeholder="Imagen de perfil" name="fotoPerfil">
                <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
            </div>
        </form>
       
        
    </div>
    <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    $registro = new MvcController();
    $res = $registro->registrarAlumnoController();
    
    if($res === 'success')
        echo 'Registro Exitoso';
?>