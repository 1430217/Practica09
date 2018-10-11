<?php
    require_once "conexion.php";

    class Datos extends Conexion{

        public function registrarAlumnoModel($alumno, $tabla){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, matricula, tutor, carrera, situacion, correo, fotoPerfil) 
            VALUES (:nombre, :matricula, :tutor, :carrera, :situacion, :correo, :fotoPerfil)");


            $stmt->bindParam(':nombre', $alumno['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':matricula', $alumno['matricula'], PDO::PARAM_STR);
            $stmt->bindParam(':tutor', $alumno['tutor'], PDO::PARAM_STR);
            $stmt->bindParam(':carrera', $alumno['carrera'], PDO::PARAM_STR);
            $stmt->bindParam(':situacion', $alumno['situacion'], PDO::PARAM_STR);
            $stmt->bindParam(':correo', $alumno['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':fotoPerfil', $alumno['fotoPerfil']);
    
            if ($stmt->execute()) 
                return 'success';
            else 
                return 'error';	
            $stmt->close();
        }

        public function getAlumnos($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
    
            $stmt->close();
        }

        //Funcion para actualizar al alumno
        public function actualizarAlumnoModel($alumno, $tabla){

            $stmt = Conexion::conectar()->prepare
                ("UPDATE $tabla SET nombre = :nombre, matricula = :matricula, tutor = :tutor, carrera = :carrera, situacion = :situacion
                correo = :correo, fotoPerfil = :fotoPerfil WHERE id = :id")
            ;		
            $stmt->bindParam(':nombre', $alumno['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':matricula', $alumno['matricula'], PDO::PARAM_STR);
            $stmt->bindParam(':tutor', $alumno['tutor'], PDO::PARAM_STR);
            $stmt->bindParam(':carrera', $alumno['carrera'], PDO::PARAM_STR);
            $stmt->bindParam(':situacion', $alumno['situacion'], PDO::PARAM_STR);
            $stmt->bindParam(':correo', $alumno['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':fotoPerfil', $alumno['fotoPerfil']);
            $stmt->bindParam(':id', $alumno['id'], PDO::PARAM_INT);
            

            if ($stmt->execute()) 
                return 'success';
            else 
                return 'error';

            $stmt->close();
        }

        //Funcion para hacer una busqueda por el id del alumno
        public function buscarAlumno($id, $tabla){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();

            $stmt->close();
        }

        //Funcion para borrar un alumno de la tabla
        public function deleteAlumno($id, $tabla){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->execute()) 
                return 'success';
            else 
                return 'error';

            $stmt->close();
        }

    }
?>