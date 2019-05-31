<?php 
	
	class Enrutador{

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

		public function validarGet($variable){
			if(empty($variable)){
				include_once("vista/adivinar.php");
			}else{
				return true;
			}

		}
	}

 ?>