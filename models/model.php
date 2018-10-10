<?php
    class EnlacesPaginas{
        
        public function enlacesPaginasModel($enlaces){

            if($enlaces == "usuarios" || $enlaces == "editar"){

                $module =  "views/modules/".$enlaces.".php";
            } 
            else if($enlaces == "index") {$module =  "views/modules/registro.php"; } 
            else if($enlaces == "ok") { $module =  "views/modules/registro.php"; } 
            else if($enlaces == "cambio") { $module =  "views/modules/usuarios.php"; } 
            else
                $module =  "views/modules/registro.php";
                    
            return $module;
        }
    }
?>