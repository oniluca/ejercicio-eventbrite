<?php 

class Pensador{

	//genera numero aleatoriamente 
	public function random(){
		$num= mt_rand(0000,9999);
		$_SESSION['nuevoNumero']=$num;
	}

	//muestra el numero randon generado
	public function mostrarRandom(){
		echo $_SESSION['nuevoNumero'];
	}

	//recibe el valor del numero generado aleatoreamente y genera nuevo numero a partir de ese
	public function nuevoNumero($variable){
		$_SESSION['nuevoNumero']=$variable+1;
		if($variable>9999){
			$this->random();
		}
	}

	//divide un numero cadena en numeros individuales
	public function parser($valor){
		$parseado=str_split($valor);		
		return $parseado;
	}

//compara numero viejo con el nuevo numero para adivinar el numero pensado
	public function adivinarNumero(){
		$x=0;
		$this->nuevoNumero($_SESSION['nuevoNumero']);

		while($x==0){
			$nuevo=$this->parser($_SESSION['nuevoNumero']);
			$viejo=$this->parser($_SESSION['randNumDetalle'][$_SESSION['indiceRandNumDetalle']][0]);

			$bien=0;
			$regular=0;

			for($i=0;$i<4;$i++){
				if($nuevo[$i] == $viejo[$i]){
					$bien++;
				}else{
					if($nuevo[$i] == $viejo[0] or $nuevo[$i] == $viejo[1] or $nuevo[$i] == $viejo[2] or $nuevo[$i] == $viejo[3]){
						$regular++;
					}
				}

			}
			
			if($_SESSION['randNumDetalle'][$_SESSION['indiceRandNumDetalle']][1]==$bien and $_SESSION['randNumDetalle'][$_SESSION['indiceRandNumDetalle']][2]==$regular){
				$x=1;
			}else{
				$this->nuevoNumero($_SESSION['nuevoNumero']);
			}
		}

		return $_SESSION['nuevoNumero'];
	}
}

?>
