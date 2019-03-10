<?php
/*EJERCICIO
Utilizar un formulario para introducir la nota de un examen (de 0 a 10). con un input e boton inviar
Al pulsar enviar se llamará a un fichero php con GET que realizará las siguientes validaciones: action# para que se procese en la misma pagina
Si la nota es mayor que 5 mostrar el texto “Aprobado”
Si la nota es menor que 5 mostrar “Suspenso”
SI la nota es igual a 5 mostrar “Por los pelos”
Si la nota es igual a 10 mostrar el texto 'Matrícula de Honor'
Si la nota no es numerica mostrar el texto "Nota no numerica"
Si la nota es mayor de 10 "nota non valida"*/

//usiamo post e non get, perche con get non funziona a causa della cache se torno a scrivere la stessa nota

//inizializar la variable que se utiliza en el documento, para Javascript
$resultado="";

//COMPROBAR SI SE HA PULSADO ENVIAR
if (isset($_POST['botonEnviar'])){
	//crear una variable para informar la nota
	$nota = $_POST['nota'];
	
	//evaluar la nota teniendo en cuanta las condiciones más restrictivas
	if (!is_numeric($nota)) {
		$resultado = "nota non numerica"; //potrei fare direttamente echo, esempio: echo "nota non valida"; al contrario di conservare il risultato in una variabile 
	} else if ($nota > 10 || $nota < 0) {
		$resultado = "nota non valida"; 
	} else if ($nota == 10){
		$resultado = "matricula de honor"; 
	} else if ($nota >5){
		$resultado = "aprobado";
	} else if ($nota ==5){
		$resultado = "Por los pelos"; 
	} else {
		$resultado = "Suspenso";
	} 
	
	//mostrar resultado con un echo
	echo $resultado;
}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<!--mettiamo il php dentro il JS-->
	<script type="text/javascript">
		var mostrar = "<?=$resultado;?>"
        if(mostrar!=''){
            alert(mostrar)
        }
    </script>
</head>
<body>
	<form method="post" action="#"> 
		<input type="number" name="nota">
	 	<input type="submit" name="botonEnviar" value="enviar"> 
	</form>
</body>
</html>