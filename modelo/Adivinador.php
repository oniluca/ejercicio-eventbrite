<?php 

class Adivinador{
	

	private $numero;
	private $random;

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;
	}
	
	public function parser(){

		$parseado=str_split($_SESSION['aDatos']['numero']);
		return $parseado;
	}

	public function random(){

		$num1=0;
		$num2=0;
		$num3=0;
		$num4=0;
		$i=1;

		while ( $i<= 4) {
			$x=0;
			while ($x == 0) {
				$num= mt_rand(0,9);
				if($num !=$num1 and $num !=$num2 and $num !=$num3 and$num !=$num4 ){
					${"num".$i}=$num;
					$q=$i-1;
					$this->random[$q]=$num;
					$x=1;
					$_SESSION['aDatos']['random'][$q]=$num;

				}
			}
			$i++;
		}

	}
	
	public function comparar ($parseado){
		$bien=0;
		$regular=0;

		for($i=0;$i<4;$i++){
			if($parseado[$i] == $_SESSION['aDatos']['random'][$i]){
				$bien++;
			}else{
				if($parseado[$i] == $_SESSION['aDatos']['random'][0] or $parseado[$i] == $_SESSION['aDatos']['random'][1] or $parseado[$i] == $_SESSION['aDatos']['random'][2] or $parseado[$i] == $_SESSION['aDatos']['random'][3]){
					$regular++;
				}
			}

		}

		if($bien==4){
			$_SESSION['aDatos']['estadoJuego']=1;
		}else{
			$resultado="cantidad de numeros bien: ".$bien."   cantidad de numeros regular: ".$regular;
			return $resultado;

		}

	} 

}

?>


