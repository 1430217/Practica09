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
					return $stmt;
				else 
					return 'Error al insertar';
			}
		}

		//Controller para imprimir los usuarios de la base de datos en una tabla
		public function getAlumnosController(){
			$stmt = Datos::getAlumnos('alumnos');

			//For each para recorrer la tabla de los usuarios y poder imprimirlos
			foreach ($stmt as $usuario => $r) {
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
						<td><a href="index.php?action=editar&id='.$r["id"].'"><button>Editar</button></a></td>
						<td><a href="index.php?action=usuarios&id='.$r["id"].'"><button>Borrar</button></a></td>
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
		
    }
?>


