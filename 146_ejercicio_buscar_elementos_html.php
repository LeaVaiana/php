<?php
 //inicializar variables que se utilicen en la parte html
 $pais="";


 //declarar el array de paises/capitales
 $paises = array('Francia' => 'París', 'Ecuador' => 'Quito', 'Gran Bretaña' => 'Londres', 'Alemania' => 'Berlin', 'Argentina' => 'Buenos Aires');

//preguntar si nos llega el valor de la combo por GET;
if(isset($_GET["capital"])){//name del submit
	//recuperar la capital de la combo;
	$capital = $_GET["capital"];
	//buscar la capital en el array paises;
	$pais = array_search($capital, $paises);
		//echo $pais;


	//mostrar el pais en el formulario: aggiungo il php nel value del formulario!!!

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="get" action="#">
		<select name="capital" onchange='this.form.submit()'><!--para enviar el formulario al servidor, al posto del button-->
			<option>Seleccione capital</option>
			<option <?php if ($capital=='París'){echo 'selected';}?>>París</option>
			<option <?php if ($capital=='Quito'){echo 'selected';}?>>Quito</option>
			<option <?php if ($capital=='Londres'){echo 'selected';}?>>Londres</option>
			<option <?php if ($capital=='Berlin'){echo 'selected';}?>>Berlin</option>
			<option <?php if ($capital=='Buenos Aires'){echo 'selected';}?>>Buenos Aires</option>
		</select>
		<input type="text" name="pais" value="<?=$pais?>"/>
	</form>
</body>
</html>