<?php
//usiamo post e non get, perche con get non funziona a causa della cache se torno a scrivere la stessa nota

//inicializar variables que se utilicen en el documento web (anche $num=$den=$oper=$resultado=""; )
$num="";
$den="";
$oper="";

$resultado="";
//COMPROBAR SI SE HA PULSADO SUBMIT
if (isset($_POST['enviar'])){

	//recuperar los datos y la operacion que nos llegarán por GET o POST;
	$num = $_POST['num'];
	$den = $_POST['den'];
	$oper = $_POST["oper"];

		//(1)evaluar la operación con switch
		/*switch ($oper) {
			case '+':
				$resultado = $num+$den;
				break;
			case '-':
				$resultado = $num-$den;
				break;
			case '*':
				$resultado = $num*$den;
				break;
			case '/':
				$resultado = $num/$den;
				break;
		}*/

		//(2)calcular el resultado en funcion de la operación
			//$resultado = eval("return ".$num.$oper.$den.";");
			$resultado = eval("return $num $oper $den;");

	//el resultado aparecerá en el formulario
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div> 
		<form method="post" action="#"> 
			<!--ponemos php en el value perche cosí quando rinfresco non si cancellano i campi-->
			<input type="number" name="num" value='<?=$num;?>'/>
			<select name="oper"><!--perche rimanga la operazione selezionata inserisco php dentro ogni operazione-->
				<option value="+" <?php if($oper=="+"){echo 'selected';}?>>+</option>
				<option value="-" <?php if($oper=="-"){echo 'selected';}?>>-</option>
				<option value="*" <?php if($oper=="*"){echo 'selected';}?>>x</option>
				<option value="/" <?php if($oper=="/"){echo 'selected';}?>>/</option>
			</select>
			<input type="number" name="den" value='<?=$den;?>'/>

			<input type="submit" name="enviar" />

			<input type="text" value='<?=$resultado?>'>
		</form>
	</div>
</body>
</html>