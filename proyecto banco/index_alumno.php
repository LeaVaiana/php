<?php
//per lavorare con le variabili di sessioni dichiarare il session start;
session_start();



	//array titulares 
	$titulares = 
	array('40000001A' => 'Vizenzo Paganini', '40000002B' => 'Pau Pep Pou', '40000003C' => 'Catalina la Grande', '40000004D' => 'Elisabeth Iturribegorrietxea', '40000005E' => 'Joseph Scarface', '40000006F' => 'Filemón Pi', '40000007G' => 'Petra Pedrusco', '40000008H' => 'Ganimedes Stanton', '40000009I' => 'Tuco Beneditto Pacifico Ramirez', '40000010J' => 'Johny Mentero');

	//inicializar variables che hay en el html

	$nombre='';
	$nif='';

	//preguntar si llega informado un nif por post;
	if(isset($_POST['nif'])){
		$nif = $_POST['nif'];
		//echo $nif;//para comprobar que cuando el cursor sale del campo del nif....scrivo un numero nel campo e le doy al boton;
		//recuperar el nombre de la persona del array;
		if(array_key_exists($nif,$titulares)){
			$nombre = $titulares[$nif];//si existe el nombre, lo enviamos al campo del formulario
		//si existe el nif, guardar el nif y el nombre en variables de sesión
		$_SESSION['nif']=$nif;
		$_SESSION['nombre']=$nombre;
		} else {//se non esiste limpiamos la ultima variable de sesion, altrimenti andiamo a la cuenta punto con l ultimo nif valido introdotto;
			unset($_SESSION['nif']);
			unset($_SESSION['nombre']);
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chungo Bank</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cb.css">
	<script type="text/javascript" src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
	<script type="text/javascript">
		
	</script>
</head>
<body>
	<div class='contenedor'>
		<header>
			<img src="img/chungobank.png">
			<h4>Gestió comercial Cta Punts</h4>
		</header>
		<section>
			<form method='post' action='#'><!--se va a procesar en la misma pagina-->
				<label>Nº Ident. Fiscal</label><br>
				<input type="text" name="nif" required onblur='this.form.submit()' value='<?=$nif;?>'>
				<input type="text" name="nombre" id='nombre' value='<?=$nombre;?>' disabled><!--facciamo l echo del value-->
				<br><br>
			</form>
			<form method='post' action='alta_alumno.php'><!--nos vamos a la pantalla de alta alumno-->
				<input type="submit" name="alta" value='Alta cta Punts'>
			</form>
		</section>
	</div>
</body>
</html>