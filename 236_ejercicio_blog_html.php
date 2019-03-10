<?php
session_start();
//comprobar si la peticion post es la misma que la peticion anterior
if(isset($_POST) && isset($_SESSION['peticion_anterior']) && $_POST==$_SESSION['peticion_anterior']){
	unset($_POST);
}

//comprobar si se ha pulsado el boton enviar:
if (isset($_POST['enviar'])) {
	//recuperar los datos del formulario
	$nombre = $_POST['nombre'];
	$comentarios = $_POST['comentarios'];

	//recuperar contenido del fichero solo si el fichero ya existe:
	if(file_exists('blog.html')){
		$contenido = file_get_contents('blog.html');
	}else{
		$contenido = '';
	}
	
	//abrir el fichero en modo escritura:
	$fichero = fopen('blog.html', 'w');


	//escribir el nuevo comentario:
	$comentario = "$nombre escribió el ".date('j-n-y')."<br> $comentarios <br><br>";

	//escribir el comentario en el fichero
	fwrite($fichero, $comentario);


	//escribir el resto de comentarios que haya recuperado antes:
	fwrite($fichero, $contenido);


	//cerrar el fichero:
	fclose($fichero);

	//guarda la peticion en una variable de sesion:
	$_SESSION['peticion_anterior']= $_POST;

}

?>



<html>
<head>
	<title>foro</title>
	<meta charset='UTF-8'>
</head>
<body>
	<center><h3>Escritura en ficheros</h3></center>
	<div style="width:700px; background: white; margin:auto; border:1px solid black; padding:20px; border-radius:10px;">
		<form method="post" action="#">
			<input type="text" name="nombre" placeholder="nombre" required /><br><br>
			<textarea style="width:300px; height:100px" name="comentarios"></textarea><br><br>
			
			<input type="submit" name="enviar" value="Enviar" />
		</form>
		<span>
		<?php readfile('blog.html');?>; 
		</span>
			
	</div>	
</body>
</html>