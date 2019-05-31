<?php 
	error_reporting(0);
	$controlador = new ControladorPensador();

	//si no recibe nada por post inicializa variables llama funcion para generar el primer numero
	if(!isset($_POST['darPistas'])){
		$_SESSION['indice']=0;
		$_SESSION['indiceRandNumDetalle']=0;
		$controlador->random();
		echo "<h1><center>";
		$controlador->mostrarRandom();
		echo "</center></h1>";
		$adivinado=0;

	}else{
		//si recibe por post ejecuta el codigo
		if(isset($_POST["darPistas"])){
			$_SESSION['aDatos']['numeroBien']=$_POST['txt_num_bien'];
			$_SESSION['aDatos']['numeroRegular']=$_POST['txt_num_regular'];

			//si recibe los 4 numeros bien significa que acerto el numero completo
			if($_SESSION['aDatos']['numeroBien']==4 and $_SESSION['aDatos']['numeroRegular']==0){
				$adivinado=1;
				echo'<div class="alert alert-success fade in container">
						<strong>LO LOGRE!!</strong>  <br>	Jugemos Otra Vez.
					</div>';	

			}else{

				$numeroRandom=$_SESSION['nuevoNumero'];

					//genera array con el numero randon y la cantidad de numeros bien y mal para comparar
					$_SESSION['randNumDetalle'][$_SESSION['indiceRandNumDetalle']][0]=$numeroRandom;
					$_SESSION['randNumDetalle'][$_SESSION['indiceRandNumDetalle']][1]=$_SESSION['aDatos']['numeroBien'];
					$_SESSION['randNumDetalle'][$_SESSION['indiceRandNumDetalle']][2]=$_SESSION['aDatos']['numeroRegular'];
			

				$resultado=$controlador->adivinarNumero();
				$_SESSION['indice']=$_SESSION['indice']+1;
				
			}
					
		}
		
	}
 

 ?>


<div class="container">
	<center>
		<h1><?php  echo $resultado;?></h1>
		<h3><?php echo"intentos:  ";
		echo $_SESSION['indice']; ?></h3>
	</center>
	
	<?php if($adivinado==0){ ?>
		<form action="" method="POST">
			<input  class="form-control" type="text" name="txt_num_bien" placeholder="Cantidad de numeros bien" pattern="[0-4]*" maxlength="1" title="Solo numeros del 0 al 4" required autofocus>
			<br>
			<input class="form-control" type="text" name="txt_num_regular" placeholder="Cantidad de numeros regulares" pattern="[0-4]*" maxlength="1" title="Solo numeros del 0 al 4" required></input>
			<br><br>
			<button  class="btn btn-success" type="submit" name="darPistas">DAR PISTAS</button>
		</form>
	<?php }else{?>
			<div class="container">
				<a class="btn btn-success" href="?cargar=pensar" title="">NUEVO JUEGO</a>
			</div>
		<?php } ?>
</div>