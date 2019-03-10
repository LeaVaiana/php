<?php

	//A)
	session_start();
	//session_destroy();

	//B) si no existe la variable de sesion, la creamos vacia (creo el array)
	if(!isset($_SESSION['articulos'])){
	$_SESSION['articulos']=array();
}

	//c)array de categoria
	$listaCategorias=array('relojes', 'anillos', 'pulseras', 'collares');

	//D)inicializar variables del html:
	$resultado=$descripcion=$precio=$id='';


//e) COMBO!!!
	//montar la combo de categorias del formulario de alta;
	$comboCategorias='';

	foreach($listaCategorias as $categoria){
		$comboCategorias.="<option>$categoria</option>";
	}


//F) ALTA ARTICULO

	//comprobrar si se ha pulsado 'agregar';
	if(isset($_POST['alta'])){		
		//recuperar campos del formulario de alta;
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$categoria=$_POST['categoria'];
		//validar descripcion y precio informado
		if(trim($descripcion)==''||trim($precio)==0){//zero perchè è type number
			$resultado= 'description y precio son obligatorios';//variabile che usero sempre per comunicar con l usuario e la metto dentro lo span del formulario dove appariranno i messaggi per lo user
		} else {
			//generar una clave unica
			$id=uniqid();
			//guardar articulo en variable de session(nombre array dove guardo i dati, clave de cada fila, clave de cada columna). Array articulos declarado sopra nell'isset
			$_SESSION['articulos'][$id]['descripcion']=$descripcion;
			$_SESSION['articulos'][$id]['precio']=$precio;
			$_SESSION['articulos'][$id]['categoria']=$categoria;
			//mensaje de alta efectuada
			$resultado = 'alta efectuada';
		}
//recogo el valor della funcion tabla
		$articulo = tabla();//articulo deve coincidere con l'echo, posso anche usare articulos dato che la variabile articulos la vedo solo dentro la funcion tabla
	}
	print_r ($_SESSION['articulos']);//per verificare che recupero i 3 dati.




	
//G) CONSULTA DE ARTICULOS (alta, modificacion, baja)
function tabla(){

	$articulos="";
	global $listaCategorias;//este array no se vee dentro la funcion, si no pongo global

	//recorrer variable de sesion con los articulos para mostrarlos en pantalla al entrar en la pagina.
	foreach($_SESSION['articulos'] as $id => $articulo){//cerco nell'array articulos, $id è l'indice, $articulos sono le tre colonne descripcion, precio, categoria. //.= èr per andare aggiungendo le file senza cancellarle
		
		//montar la combo para cada articulo con la opcion de la categoria del articulo seleccionada
			$combo="";
			//recorrer el array e mettere etichetta selected
			foreach($listaCategorias as $categoria){
				if($articulo['categoria']==$categoria){
					$combo .="<option selected>$categoria</option>";
				}else{
					$combo .="<option>$categoria</option>";
				}
			}



		//montar la tabla de articulos
		$articulos.="<tr>";
		$articulos.="<td class='id'>$id</td>";
		$articulos.="<td><select class='categoria'>$combo</select></td>";
		$articulos.="<td class='descripcion' contenteditable>$articulo[descripcion]</td>";//la description è dentro l'array categoria
		$articulos.="<td class='precio' contenteditable>$articulo[precio]</td>";
		//boton de baja y modificar
		//añado dentro de cada celda de cada fila un boton baja, necesito method y action para despues enviar los valores al server, type hidden.
		$articulos.="<td>";
		//boton baja
		$articulos.="<form method='post' action='#'><input type='hidden' name='idbaja' value=$id><input type='submit' name='baja' value='Baja'></form>";//button para asociar un evento JS mediante la class
		//boton modificar con funcione js per recuperare formulario oculto
		$articulos.="<input type='button' value='Modificar' class='modificar'>";//recupera id, categoria, description, precio
		$articulos.="</td>";
		
		//cierre etiqueta tr
		$articulos.="</tr>";
	}
	return $articulos;
}

//H) BAJA ARTICULO
//comprobar si se ha pulsado baja
if(isset($_POST['baja'])){	

		//recuperar id del articulo
		$id=$_POST['idbaja'];

		//borrar la fila de la variable de sesion
		unset($_SESSION['articulos'][$id]);

		//mensaje de baja efectuada
		$resultado = 'baja efectuada';
		
		//llamar la funcion para volver a crear la tabla
		$articulo = tabla();

}

//dopo aver fatto il js, MODIFICAR ARTICULO

		//comprobar si se ha puslado modificar
		if(isset($_POST['modificar'])){
		//recupera el id y los datos del articulo
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$categoria=$_POST['categoria'];
		$id=$_POST['id'];

		//validar que el precio y descripcion estén informados
		if(trim($descripcion)==''||trim($precio)==0){//zero perchè è type number
			$resultado= 'description y precio son obligatorios';//variabile che usero sempre per comunicar con l usuario e la metto dentro lo span del formulario dove appariranno i messaggi per lo user
		} else {
			//modificar el articulo en la variable de sesion
			$_SESSION['articulos'][$id]['descripcion']=$descripcion;
			$_SESSION['articulos'][$id]['precio']=$precio;
			$_SESSION['articulos'][$id]['categoria']=$categoria;
			//mensaje de modificacion efectuada
			$resultado = 'modificacion efectuada';
		}

		//llamar la funcion tabla
		$articulo = tabla();


		}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		div.container {
			margin: auto; width:920px; text-align: center;
		}
		table {
			border: 5px ridge blue;
			width: 900px;
		}
		th, td {
			background:white; width:auto; border: 2px solid green; text-align: left;
		}
		input[type=text] {width: 330px;}
	</style>
	<script type="text/javascript" src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
	<!--boton modificar-->
	<script type="text/javascript">
	$(inicio)

	function inicio(){
		//activar listener boton modificar
		$('input.modificar').on('click', enviarDatos)
	}

	function enviarDatos(){
		//recuperar los datos de la fila sobre la que se ha pulsado el boton de modificar
		var id = $(this).closest('tr').find('td.id').text();
		var categoria = $(this).closest('tr').find('select.categoria').val();
		var descripcion = $(this).closest('tr').find('td.descripcion').text();
		var precio = $(this).closest('tr').find('td.precio').text();

		//alert(id + '' + categoria + '' + descripcion + '' + precio + '');


		//enviar los datos al formulario oculto
		$('#id').val(id);
		$('#categoria').val(categoria);
		$('#descripcion').val(descripcion);
		$('#precio').val(precio);

		//hacer el submit del formulario oculto, de forma que los datos pueden llegar al servidor
		$('form#formulario')[0].submit(); //etichetta form, audio e video, bisogna specificare il primo formulario con indice 0)
	}

	</script>
</head>
<body>
	<div class="container">
		<h2 style="text-align:center">EJERCICIO ARTICULOS</h2>
		<span><?=$resultado?></span><br><br>
		<form name="formularioalta" method="post" action="#">
			<table border='2'>
				<tr><th>Categoría</th><th>Descripción</th><th>Precio</th><th colspan='2' style='width:150px'>Opción</th></tr>
				<tr>
				<td><select name='categoria'><?=$comboCategorias?></select></td><!--echo per far apparire la combo-->
				<td><input type='text' size='50' maxlenght='100' name='descripcion' /></td>
				<td><input type='number' maxlenght='5' name='precio' /></td>
				<td colspan='2'><input type='submit' name='alta' value='Agregar' /></td>
				</tr>
			</table>
		</form><br>
		<!--formulario oculto con js-->
		<form name="formulario" id="formulario" method="post" action="#"> 
			<input type="hidden" name="id" id="id">
			<input type="hidden" name="categoria" id="categoria">
			<input type="hidden" name="descripcion" id="descripcion">
			<input type="hidden" name="precio" id="precio">
			<input type="hidden" name="modificar">
		
		</form>
		<div>
			<table>
			<?=$articulo?><!--echo per vedere la tabla-->
			</table>
		</div>
	</div>
</body>
</html>