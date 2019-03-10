<?php
//inizializo variable resultado
$numero=10;

//COMPROBAR SI SE HA PULSADO SUBMIT
//if (isset($_POST['enviar'])){

	//recuperar el numero que nos llegará por GET o POST;
	//$numero = $_POST['numero'];
	

        //mostrar por pantalla las tablas de multiplicar de los números del 1 al 10
        


		for($i=$numero; $i<=10; $i++){
			$resultado = $resultado * $i;
			};
			echo $resultado;
		}
?>
