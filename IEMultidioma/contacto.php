<?php
	include('include/multidioma.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/page.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/page.js" type="text/javascript"></script>

<!--il documento form.js ha funzionalitá, prima del suo script, scrivo un altro script con le variabili-->
<script type="text/javascript">
//opz 1: inserisco gli echo delle variabili js e assegno alla variabile php con il testo che era nel documento js.
		//var nombre = '<?=$js_nombre;?>';
		//var correo = '<?=$js_correo;?>';
//opz2: creo file variables_js e faccio l'include:
		<?php include "include/variables_js_$idioma.js";?>
	</script>
	<script src="js/form.js" type="text/javascript"></script>
</head>
<body>

	<!--header.php-->
<?php include('include/header.php');?>

	
	<div class="wraper">
		<!--nav.php-->
	<?php include('include/nav.php');?>

		<div class="content">
			<div class="slider" >
				<img src="img/iem_3.jpg" /><img src="img/iem_4.jpg" />
		    </div>

		    <div class="sections">
		    	<h1 style="text-align:center"><?php echo $h1_contacto;?></h1><br><br>
					<!--js-->
					<div class="contacto">
					<h2>CONTACTO</h2>
					<p>Los campos marcados con * son obligatorios.</p><br>
					<form id="form" name="form" method="get" action='#'>
						<label for="nombre">Nombre: * </label><input type="text" name="nombre" autofocus id="nombre" /><br><br>
						<label for="email">Email: * </label><input type="email" name="email" id="email" placeholder="nom@mail.com" /><br><br>
						<label for="telefono">Teléfono: </label><input type="tel" name="telefono" id="telefono"><br><br>
						<label>Mensaje: *</label><br><br>
						<textarea id="mensaje" name="mensaje" placeholder="Introduzca aquí su pregunta o comentario" ></textarea><br><br>
						<span>He leido y acepto la política de privacidad:</span><br><br>
						<input id="privacidad" type="checkbox" name="privacidad">&nbsp&nbsp
						<span id='ver' onclick="muestraAlert()">Ver aquí</span><br><br>
						<!--chiamo la funzione validaFormulario-->
						<input id="enviar" type="button" name="enviar" value="Enviar" onclick="validaFormulario()"/><br>
					</form>
					
					<div id="alerta">
						<span id="alertatext">En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), le informamos que los datos de carácter personal que usted nos comunique mediante este formulario de contacto serán confidenciales y, bajo ningún concepto, serán transmitidos a terceras personas.<br><br>
						<input type="button" onclick="ocultaAlert()"/>
					</div>
				</div>
		    </div>
		    <br><br>
		</div>
	
		<!--footer.php-->
		<?php include('include/footer.php');?>
	</div>
</body>
</html> 
