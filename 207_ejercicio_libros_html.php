<?php
//A)
session_start();
//session_destroy();


//B) si no existe la variable de sesion, la creamos vacia (creo el array)
if(!isset($_SESSION['libros'])){
	$_SESSION['libros']=array();
}

//H.2) llamar la funcion tabla para mostrar la tabla de libros que se han dado de alta
$libros = tabla();

//C) inicializar variables utilizadas en html (titulo precio si fa l echo nell html nel value per non perdere i dati poco a poco che vado riempendo il formulario):
	$mensaje=$titulo=$precio=$id='';



//D) recuperar los datos del formulario cuando damos al boton ALTA (detectar cuando se pulsa boton de ALTA)
if(isset($_POST['alta'])){		//alta è il name del boton subimit, non il value
	//recuperar datos:
	$id=uniqid();				//uso la funzione php uniqid para crear un numero id aleatorio. $ id será la clave del array bidimensionale
	$titulo=$_POST['titulo'];
	$precio=$_POST['precio'];



	//D.1 validar datos (per essere sicuri che titulo e precio sono stati inseriti). La funcion trim elimina los espacios en blanco al principio o al final:
		if(trim($titulo)==''||trim($precio)==''){
			$mensaje= 'titulo y precio son obligatorios';//variabile che useró sempre per comunicar con l usuario e la metto dentro lo span del formulario dove appariranno i messaggi per lo user
		} else {//L) chiamo la funzione para validar si el libro ya existe o no, mi ritorna un tre o false;
			$existe = validarLibro($titulo, $id);
			
			if(!$existe){
				//E) guardar los datos en la variable de sesión (estamos declarando el array libros)
				$_SESSION['libros'][$id]['titulo']=$titulo;
				$_SESSION['libros'][$id]['precio']=$precio;

				
				//L per ordenar el array cada vez que incorporo un nuevo libro, metterlo prima di chiamare la funzione tabla:
				asort($_SESSION['libros']);
				
				//H) llamas la funcion para refrescar el mensaje de alta
				$libros = tabla();

				//F) mensaje de aviso
				$mensaje = 'alta efectuada';
				//print_r($_SESSION['libros']);

			}else{
				$mensaje = 'libro ya existe';
			}
	}
}




//BOTON MODIFICAR
if(isset($_POST['modi'])){		//alta è il name del boton subimit, non il value
	//recuperar datos:
	$id=$_POST['id'];			//adesso l id ce l ho gia, non uso la funzione per creare un numero aleatorio	
	$titulo=$_POST['titulo'];
	$precio=$_POST['precio'];



	//D.1 validar datos (per essere sicuri che titulo e precio sono stati inseriti). La funcion trim elimina los espacios en blanco al principio o al final:
		if(trim($titulo)==''||trim($precio)==''){
			$mensaje= 'titulo y precio son obligatorios';//variabile che useró sempre per comunicar con l usuario e la metto dentro lo span del formulario dove appariranno i messaggi per lo user
		} else {//L) chiamo la funzione para validar si el libro ya existe o no, mi ritorna un tre o false;
			$existe = validarLibro($titulo, $id);
			
			if(!$existe){
				//E) guardar los datos en la variable de sesión
				$_SESSION['libros'][$id]['titulo']=$titulo;
				$_SESSION['libros'][$id]['precio']=$precio;

				
				//L per ordenar el array cada vez que incorporo un nuevo libro, metterlo prima di chiamare la funzione tabla:
				asort($_SESSION['libros']);
				
				//H) llamas la funcion para refrescar el mensaje de alta
				$libros = tabla();

				//F) mensaje de aviso
				$mensaje = 'modificado';
				//print_r($_SESSION['libros']);

			}else{
				$mensaje = 'libro ya existe';
			}
	}
}


//(I) consulta del libro seleccionado, quando pigi il bottone "selecciona"
if(isset($_POST['consultar'])){
	$id = $_POST['id'];

	$titulo = $_SESSION['libros'][$id]['titulo'];
	$precio = $_SESSION['libros'][$id]['precio'];
	//fare l'echo nel value del formulario delle 3 variabili, e fare un campo hidden per recuperare l'id del formulario
	//echo $titulo;
}

//G) CONSULTA DE TODOS LOS LIBROS, scrivo la funzione che chiameró nell'isset di alta
function tabla(){
	
	$tabla='';



	foreach ($_SESSION['libros'] as $id => $valor){//cerco nell'array libros, $id è l indice, $valor sono le due colonne titulo y precio. //.= èr per andare aggiungendo le file senza cancellarle
		$tabla.="<tr>";
		$tabla.="<td>$id</td>";
		$tabla.="<td>$valor[titulo]</td>";//indice dell'array sin comillas, en un echo tenemos que poner comillas. 
		$tabla.="<td>$valor[precio]</td>";
		//añado dentro de cada celda de cada fila un boton de consulta dentro de un form, necesito method y action para despues enviar los valores al server
		$tabla.="<td><form method='post' action='#'><input type='hidden' value='$id' name='id'><input type='submit' name='consultar' value='Seleccionar'></form></td>";//button para asociar un evento JS mediante la class
		$tabla.="</tr>";
	}
	return $tabla;
}

//M defino la funcione
function validarLibro($t,$i){
	foreach($_SESSION['libros'] as $id => $valor){
		if($t == $valor['titulo']&& $id!=[$i]){//se il titolo $t inserito dallo user giá esiste, se inoltre ha lo stesso id;
			return true;
		}
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		div.container {
			margin: auto; width:920px; text-align: justify;
		}
		table {
			border: 5px ridge blue;
			width: 800px;
		}
		th, td {
			background:white; width:auto; border: 2px solid green; text-align: left;
		}
		input[type=text] {width: 330px;}
	</style>
	<script type="text/javascript" src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
	<script type="text/javascript">

		
	</script>
</head>
<body>
	<div class="container">
		<h2 style="text-align:center">EJERCICIO LIBRERIA</h2>
		<span></span><br><br>
		<form name="formularioalta" method="post" action="#">
		<input type="hidden" name="id" value='<?=$id?>'><!--2: pongo un input invisible para recuperar el id del libro-->
			<table border='2'>
				<tr><th>Título</th><th>Precio</th></tr>
				<tr>
				<td><input type='text' size='50' maxlenght='100' name='titulo' value='<?=$titulo?>'/></td>
				<td><input type='number' maxlenght='5' name='precio' value='<?=$precio?>'/></td>
				</tr>
			</table><br>
			<input type='submit' name='alta' value='Alta' >
			<input type='submit' name='baja' value='Baja' >
			<input type='submit' name='modi' value='Modificar' >
			<span><?php echo $mensaje;?></span><!--para que salga el mensaje-->
		</form><br>
		
		<div>
			<table>
			<?php echo $libros ?>
			</table>
		</div>
	</div>
</body>
</html> 
