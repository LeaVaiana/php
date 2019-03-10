<?php

//inicializar variables que se utilicen nella parte di html, js o css, inizializzo a 0px
$ancho=0;
$alto=0;


//COMPROBAR SI SE HA PULSADO SUBMIT
if (isset($_GET['enviar'])){

	//recuperar ancho i alto que llegaron por get;
	$ancho = $_GET['ancho'];
	$alto = $_GET['alto'];
	

	//llamar a la funcion que calcula el perimetro y recoger el resultado en una variable
	$perimetro=calculaPerimetro($ancho, $alto);//passiamo i valori delle due variabili

	//mostrar el resultado en pantalla
	echo "Il perimetro è :$perimetro";

	
	}

	//definir la funcion con dos parametros de entrada (si define fuori dalla funzione e si chiama dentro)
	function calculaPerimetro($an,$al){//raccogliamo i due valori nei parametri al e an
		//realizar el calculo del perimetro
		$resultado= $an*2 + $al*2; 
		//retornar el resultado fuera de la funcion;
		return $resultado;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	div{
		background-color:blue;
		width:<?=$ancho;?>px;
		height: <?=$alto;?>px;
	}
		
	</style>
</head>
<body>
	<form method="get" action="#">
		<label>ancho</label>
		<input type="number" name="ancho">
		<label>alto</label>
		<input type="number" name="alto">
		<input type="submit" name="enviar" />
	</form><br>
	<div></div>
</body>
</html> 
