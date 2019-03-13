<?php
//para trabajar con variables de sesion:
session_start();
//session_destroy();

//inicializar variables utilizadas en el html:
$_Nom=$_email=$_mensaje=$mensajes=$tabla='';

//crear array vacio para guardar las filas
$mensajes= array();

//multidioma
include('include/multidioma.php');

//correo
if(isset($_POST['enviar'])){
    //recuperar datos del formulario
    $nombre=$_POST['nombre'];
    $mensaje=$_POST['mensaje'];
    $remitente=$_POST['correo'];

    //validar nombre y remitente
    if(trim($nombre)==''||trim($remitente)==''){
        //echo 'nombre y email son obligatorios';
        echo $error;
    }

    //enviar mensaje
    $destinatario='correo@mail.com';
    $asunto='Correo web dinamicas'; 
    $cabeceras = 'From: '.$remitente."\r\n" . 
                    'Reply-To: '.$remitente."\r\n".
                    'Cc:$remitenter'."\r\n" .
                    'MIME-Version: 1.0' ."\r\n" .
                    'Content-Type: text/html; charset=UTF-8';
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) { 
        echo " mail enviado correctamente";
    }else{
        echo " mail no enviado";
    }

    //recuperar contenido del fichero solo si el fichero ya existe:
	if(file_exists('files/mensaje.txt')){
		$contenido = file_get_contents('files/mensaje.txt');
	}else{
		$contenido = '';
    }
    
    //abrir el fichero en modo escritura:
    $fichero = fopen('files/mensaje.txt', 'w');
    
    //escribir el nuevo comentario:
    $comentario = "$nombre; $remitente; $mensaje;\n";
    
    //escribir el comentario en el fichero
    fwrite($fichero, $comentario);
    
    //escribir el resto de comentarios que haya recuperado antes:
    fwrite($fichero, $contenido);

    
    //abrir el fichero txt:
    $fichero = fopen('files/mensaje.txt', 'r');

    //recorrer el fichero mientras haya filas;
    while(!feof($fichero)){
        //leer el fichero fila a fila:
        $fila = fgets($fichero);

        //convertir cada fila en un array;
        if($fila !=null){
            $mensaje = explode(';',$fila);

            //insertar cada fila all'array mensajes vacio inicial
            array_push($mensajes, $mensaje);
        }     
    }

    
    //cerrar el fichero:
    fclose($fichero);
}

//PARA IMPRIMIR EN HTML LA TABLA

        //leer fila a fila el array de mensajes
        $filas = '';
        foreach ($mensajes as $mensaje) {
            //cada fila del array es una etiqueta <tr> de la tabla:
            $filas.="<tr>";
            foreach ($mensaje as $dato){//$dato es cada una de las columnas
            //cada elemento del subarray è una etichetta td;
            $filas.="<td>$dato</td>";
        }
        $filas.="</tr>";
     } 


?>
<!DOCTYPE html>
<html>
<head>
    <!--sostituyo todos los textos a traducir con variables que guardo en un fichero externo (idioma_ca.php)-->
	<title></title>
	<meta charset="UTF-8">
	<style type="text/css">
		.contenedor {
            width: 805px;
            margin: auto;
        }
        header, footer {
            width: 800px;
            height: 100px;
            border: 5px ridge blue;
            margin: auto;
            border-radius: 10px;
            box-sizing:border-box;
            text-align: center;
        }
        nav {
            width: 800px;
            height: 40px;
            border: 5px ridge blue;
            margin: auto;
            padding: 2px;
            border-radius: 10px;
            box-sizing:border-box;
            text-align: center;
        }
        section {
            width: 800px;
            border: 5px ridge blue;
            background: white;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-sizing:border-box;
            text-align: justify;
        }
        img {
            float: left;
            margin: 0px 10px 0px 0px;
            width: 160px;
        }
        article {
        	width: 330px;
        	padding: 10px;
        	display: inline-block;
        	vertical-align: top;
        }
        h1 {
        	margin-top: 0px;
        }
        form {
            width: 330px;
            padding: 10px;
            display: inline-block;
            vertical-align: top;
        }
        label {
            width: 120px;
            display: inline-block;
            vertical-align: top;
        }
        input {width: 175px;}
        nav a {
            display: inline-block;
            text-decoration: none;
            width: 250px;
            height: 25px;
            border: 1px solid blue;
            border-radius: 3px;
            background-color: silver;
            color: black;
        }
        table, td, th {
        	border: 1px solid silver;
        }

        #rem {width: 120px;}
        #cor {width: 120px;}
        #msg {width: 300px;}
	</style>
</head>
<body>
	<div class="contenedor">
    <!--incorporo file php esternos para nav y header-->
    <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
	<section>
		<form name='formulario' method='post' action='#'>
			<label><?=$_Nom;?></label>
			<input type='text' name='nombre'><br><br><br>
			<label><?=$_email;?></label>
            <input type='email' name='correo'><br><br><br>
            <label><?=$_message;?></label>
			<textarea name='mensaje'></textarea><br><br><br>
			<center>
				<input type='submit' value='Enviar' name='enviar'><br><br>
			</center><br><br>
		</form>
  		<article>
  			<!--el contenido se encuentra en contenido_es.html y contenido_ca.html, la variable idioma en el multidioma.php-->
		<?php readfile("include/contenido_$idioma.html");?>
  		</article>
	</section>
	<section>
		<table>
			<tr><th id='rem'><?=$_Remitent;?></th><th id='cor'><?=$_email;?></th><th id='msg'><?=$_message;?></th><tr>
                <!--confeccionar la tabla-->
                <?=$filas?>    
		</table>
	</section>
	</div>
</body>
</html>
