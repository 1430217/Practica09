<?php
    class MvcController{

        public function pagina(){
            include "views/template.php";
        }

        public function enlacesPaginasController(){

			if(isset( $_GET['action']))
				$enlaces = $_GET['action'];

			else
				$enlaces = "index";

			$respuesta = EnlacesPaginas::enlacesPaginasModel($enlaces);
			include $respuesta;
        }
        
        public function registrarAlumnoController(){

			if (isset($_POST['nombre'])) {
				//En $nombreimagen se guarda el nombre de la imagen
				$nombreimagen = $_FILES['fotoPerfil']['name'];

				//Recibe los datos
				$data = $_FILES['fotoPerfil']['tmp_name'];			

				//Ruta donde se van a guardar las imagenes	
				$ruta = "images";

				//Esto quedará así /imagenes/nombreImagen.jpg
				$ruta = $ruta."/".$nombreimagen;

				//Mueve la imagen a la carpeta que especificamos en la variable ruta
				move_uploaded_file($data, $ruta);

				$alumno = array('nombre' => $_POST['nombre'],
								'matricula' => $_POST['matricula'],
								'tutor' => $_POST['tutor'],
								'carrera' => $_POST['carrera'],
								'situacion' => $_POST['situacion'],
								'correo' => $_POST['correo'],
								'fotoPerfil' => $ruta
				);

				//print_r($alumno);
				//Recibe el usuario como un array y el nombre de la tabla
				$stmt = Datos::registrarAlumnoModel($alumno, 'alumnos'); 

				//Si el registro es exitoso regresa al formulario si no al index
				if($stmt == "success")
					header("location:index.php?action=ok");
				else 
					header("location:index.php");
			}
		}

		//Controller para imprimir los usuarios de la base de datos en una tabla
		public function getAlumnosController(){
			$stmt = Datos::getAlumnos('alumnos');

			//For each para recorrer la tabla de los usuarios y poder imprimirlos
			foreach ($stmt as $alumno => $r) {
				//Echo para imprimir los datos en la tabla del listado de usuarios
				echo 
					'<tr>
						<td>'.$r["id"].'</td>
						<td>'.$r["nombre"].'</td>
						<td>'.$r["matricula"].'</td>
						<td>'.$r["tutor"].'</td>
						<td>'.$r["carrera"].'</td>
						<td>'.$r["situacion"].'</td>
						<td>'.$r["correo"].'</td>
						<td> <img src= '.$r["fotoPerfil"] .' width="100"></td> 
						<td><a href="index.php?action=editar&id='.$r["id"].'"><button class="btn btn-warning">Editar</button></a></td>
						<td><a href="index.php?action=usuarios&id='.$r["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
					</tr>'
				;
			}		
		}

		//Controller para borrar un usuario
		public function borrarAlumnoController(){
			if (isset($_GET['id'])) {

				$stmt = Datos::deleteAlumno($_GET['id'], 'alumnos');
	
				//Si la acion se realizó con exito se regresa al listado de los alumnos
				if($stmt == "success"){
					/*Tengo un error en esta parte, los headers ya se han definido y hace referencia a la linea 77 de este archivo
					Elimina pero hay que hacer un refresh a la pagina de usuarios para que se vean los cambios*/
					header("location:index.php?action=usuarios");
				}
				else{
					echo 'Error al eliminar usuario';
				}	
			}	
		}	


		public function actualizarAlumnoController(){

			if (isset($_POST['id'])) {
				//En $nombreimagen se guarda el nombre de la imagen
				$nombreimagen = $_FILES['fotoPerfil']['name'];

				//Recibe los datos
				$data = $_FILES['fotoPerfil']['tmp_name'];			

				//Ruta donde se van a guardar las imagenes	
				$ruta = "images";

				//Esto quedará así /imagenes/nombreImagen.jpg
				$ruta = $ruta."/".$nombreimagen;

				//Mueve la imagen a la carpeta que especificamos en la variable ruta
				move_uploaded_file($data, $ruta);

				$alumno = array('id' => $_POST['id'],
							'nombre' => $_POST['nombre'],
							'matricula' => $_POST['matricula'],
							'tutor' => $_POST['tutor'],
							'carrera' => $_POST['carrera'],
							'situacion' => $_POST['situacion'],
							'correo' => $_POST['correo'],
							'fotoPerfil' => $ruta
				);
				//Recibe el usuario como un array y el nombre de la tabla
				$stmt = Datos::actualizarAlumnoModel($alumno, 'alumnos');

				if($stmt == "success")
					header("Location: index.php?action=cambio");
				else
					echo 'Error al actualizar';		
			}
		}

		public function buscarAlumnoController(){

			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				//Recibe el id del usuario y el nombre de la tabla
				$stmt = Datos::buscarAlumno($id, 'alumnos');

				//Echo que imprime los datos en el formulario del usuario que se buscó en la base de datos
				echo '
					<div class="form-group has-feedback">
						<input type="text" class="form-control" value="'.$stmt["nombre"].'"" name="nombre" required>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<input type="text" class="form-control" value="'.$stmt["matricula"].'" name="matricula" required>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<input type="text" class="form-control" value="'.$stmt["tutor"].'" name="tutor" required>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<input type="text" class="form-control" value="'.$stmt["carrera"].'" name="carrera" required>
						<span class="glyphicon glyphicon-tower form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<input type="text" class="form-control" value="'.$stmt["situacion"].'" name="situacion" required>
						<span class="glyphicon glyphicon-baby-formula form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<input type="email" class="form-control" value="'.$stmt["correo"].'" name="correo" required>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<label for="fotoPerfil">Imagen de perfil</label>
						<input type="file" class="form-control" value="'.$stmt["fotoPerfil"].'" name="fotoPerfil">
						<span class="glyphicon glyphicon-file form-control-feedback"></span>
					</div>

					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
					</div>'
				;
			}
		}
		
    }
?>


