<?php

//COMPROBAR SI SE HA PULSADO SUBMIT
if (isset($_POST['enviar'])){
	//recuperar el numero que nos llegará por GET o POST;
	$numero = $_POST['numero'];
		//inicializar la variable resultado
		$resultado=1;
		//calcular el factorial (for loop)
		/*for($i=$numero; $i>=1; $i--){
			$resultado = $resultado * $i;
			};
			echo $resultado;
		}*/

		//2 opzione
		for($i=2; $i<=$numero; $i++){
			$resultado = $resultado * $i;
			};
			echo $resultado;
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="post" action="#"> 
		<input type="number" name="numero" />
		<input type="submit" name="enviar" />
	</form><br>
</body>
</html> 
