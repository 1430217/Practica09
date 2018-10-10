<?php
    require_once "controllers/controller.php";
    require_once "models/model.php";
    require_once "models/crud.php";
    
    $template = new MvcController();
    $template->pagina();
?>