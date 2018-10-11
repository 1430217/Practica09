<h1>Editar usuario</h1>

<form method="POST" enctype="multipart/form-data">
	<?php
		$editar = new MvcController();
		$editar->buscarAlumnoController(); //Se llama la funcion del controller para buscar un usuario
		$editar->actualizarAlumnoController(); //Funcion para actualizar el usuario
	?>
</form>