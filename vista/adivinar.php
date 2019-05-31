<?php 
	$controlador= new controladorAdivinador();

if(!isset($_POST["adivinar"])){
	$_SESSION['aDatos'] = array();
	$_SESSION['aDatos']['randomActivo']=0;
	$_SESSION['aDatos']['contadorIntentos']=0;
	$_SESSION['aDatos']['estadoJuego']=0;	

}else{

}

	if($_SESSION['aDatos']['contadorIntentos']<=3 or $_SESSION['aDatos']['estadoJuego']=0){
		if(isset($_POST["adivinar"])){
			$_SESSION['aDatos']['numero']= $_POST["txt_num"];

			if($_SESSION['aDatos']['randomActivo']==0){									
				$_SESSION['aDatos']['randomActivo']=1;
			}

			$comparar=$controlador->comparar($_POST["txt_num"]);
			echo'<div class="alert alert-success fade in container">
				<strong>'. $comparar.'</strong>  <br>	Ingresa Otro Numero.
			</div>';	
								
			
			if($_SESSION['aDatos']['estadoJuego']==1){
				echo'<div class="alert alert-success fade in container">
						<strong>FELICIDADES GANASTE</strong>  <br>	Ingresa Otro Numero.
					</div>';	

			}else{ if($_SESSION['aDatos']['contadorIntentos']==3){
					echo'<div class="alert alert-danger fade in container">
						<strong>JUEGO TERMINADO</strong>  <br>	Jugar Otra Vez.
					</div>';	
					}
				}
				$_SESSION['aDatos']['contadorIntentos']++;
		}else{
			$controlador->randomActivo();	
		}
	}
	
 ?>


<?php if($_SESSION['aDatos']['contadorIntentos']<=3 and $_SESSION['aDatos']['estadoJuego']==0) {?>
<div class="container">
	<form action="" method="POST">
			
			<input  class="form-control" type="text" name="txt_num" placeholder="Ingrese un numero de 4 cifras" pattern="[0-9]*" title="Solo numeros" required></input>
			<br><br>
			<button  class="btn btn-success" type="submit" name="adivinar">Adivinar</button>
			
	</form>
	<?php }else{ ?>
			<div class="container">
			<a class="btn btn-success" href="index.php" title="">NUEVO JUEGO</a>
			</div>
			<?php } ?>
</div>