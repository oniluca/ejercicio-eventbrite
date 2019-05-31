<?php 
	include_once('modelo/adivinador.php');
	include_once("modelo/pensador.php");

 class controladorAdivinador{

 	private $numero;
	private $adivinador;

	public function __construct(){
		$this->adivinador = new Adivinador();
	}

	public function randomActivo(){
		if($_SESSION['aDatos']['randomActivo']==0){
			$random=$this->adivinador->random();
		}
	}

	public function comparar ($numero){
		$this->adivinador->set("numero",$numero);
		$parseado=$this->adivinador->parser();

		$resultado=$this->adivinador->comparar($parseado);
		return $resultado;
	}

 }




 class controladorPensador{

 	private $pensador;

 	public function __construct(){
 		$this->pensador = new Pensador();

 	}

 	public function random(){
 		$random=$this->pensador->random();
 	}

 	public function mostrarRandom(){
 		$mostrarRandom=$this->pensador->mostrarRandom();
 	}

 	public function nuevoNumero($numero,$aSumar){
 		$this->pensador->nuevoNumero($numero,$aSumar);
 	}

 	public function adivinarNumero(){
 		$resultado=$this->pensador->adivinarNumero();
 		return $resultado;
 	}

 }
  	
 ?>