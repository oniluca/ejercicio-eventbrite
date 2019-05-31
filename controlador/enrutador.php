<?php 
	
	class Enrutador{
//depende la opcion que recibe de la eleccion en el menu carga una vista u otra
		public function cargarVista($vista){
			switch ($vista) {
				case 'adivinar':
					include_once("vista/".$vista.".php");
					break;
				case 'pensar':
					include_once("vista/".$vista.".php");
					break;
			}
		}
//si no recibe nada carga por default la vista "adivinar"
		public function validarGet($variable){
			if(empty($variable)){
				include_once("vista/adivinar.php");
			}else{
				return true;
			}

		}
	}

 ?>