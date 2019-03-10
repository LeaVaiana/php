<?php
	session_start();//se mantiene el contenido tb cuando renfrescamos la pagina:
	//session_destroy();
	//session_destroy(); la prima volta che entro ottengo un errore undefind index referente all'indice dell'array personas, perche ancora non esiste l'array, quindi creiamo un array persona vacio.
	//si no existe la variable de sesion, la creamos vacia
	if(!isset($_SESSION['personas'])){
		$_SESSION['personas']=array();
	}

	//(2) FUNCION PARA MOSTRAR LA TABLA/ACTUALIZAR LA TABLA:
//mostrar la tabla con las personas guardadas en la variable de sesion (chiamiamo una funzione che se encargue de mostrar esta tabla), el valor que nos devuelve va guardado en una variable
	$personas = informarPersonas();

	

	//inicializar variables utilizadas en html (nif, nombre direccion si fa l echo nell html nel value per non perdere i dati poco a poco che vado riempendo il formulario):
	$mensaje= $nif=$nombre=$direccion='';

//BOTON ALTA
	//recuperar los datos del formulario cuando damos al boton ALTA (detectar cuando se pulsa boton de ALTA)
	if(isset($_POST['alta'])){				//alta è il name del boton subimit
		//recuperar datos:
		$nif=$_POST['nif'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];

		//validar datos (per essere sicuri che nif e nombre sono stati inseriti). La funcion trim elimina los espacios en blanco al principio o al final:
		if(trim($nif)==''||trim($nombre)==''){
			$mensaje= 'nif y nombre son obligatorios';//variabile che usero sempre per comunicar con l usuario e la metto dentro lo span del formulario dove appariranno i messaggi per lo user
		} else {//se i dati ci sono:
			//validar que la persona no existe:
			if(array_key_exists($nif, $_SESSION['personas'])//cerco il nif nell'array personas
				){
					$mensaje='nif ya existe';
			}else{
				//guardar los datos en la variable de sesión (estamos declarando el array persona)
				$_SESSION['personas'][$nif]['nombre']=$nombre;
				$_SESSION['personas'][$nif]['direccion']=$direccion;

				//mensaje de aviso
				$mensaje = 'alta efectuada';
				//print_r($_SESSION['personas']);


				//(2) refrescar la tabla html llamando la funcion (así la tabla está siepre actualizada);
				$personas = informarPersonas();
			}
		}
	}

//BOTON DE BAJA de toda la tabla
//detectar cuando se pulsa baja personas (name="baja)
if(isset($_POST['baja'])){
	//borrar el array
	unset($_SESSION['personas']);//me cargo todo el array
	//borrar la tabla:
	$personas='';//me cargo toda la tabla;
}
//BOTON BAJA PERSONA de toda la tabla
//detectar cuando se pulsa baja de persona por nif:
	if(isset($_POST['bajapersona'])){
		//recuperar el nif de la persona
		$nifbaja = $_POST['nif'];
		//borrarla de la variable de sesion
		unset($_SESSION['personas'][$nifbaja]);
		//actualizar la tabla
		$personas=informarPersonas();

		//mensaje de baja
		$mensaje= 'usuario eliminado';
	}
//BOTON MODIFICAR
//(3) detectar cuando se envia el formulario de modificar, con name modificar
	if(isset($_POST['modificar'])){
		//recuperar los datos
		$nifmodi=$_POST['nif'];
		$nombremodi=$_POST['nombre'];
		$direccionmodi=$_POST['direccion'];

		//actualizar la variable de sesion
		$_SESSION['personas'][$nifmodi]['nombre']=$nombremodi;
		$_SESSION['personas'][$nifmodi]['direccion']=$direccionmodi;

		//mensaje de modificacion
		$mensaje= 'modificado';

		//actualizar la tabla
		$personas = informarPersonas();

	}

//FUNZIONE PER AGGIORNARE E COSTRUIRE LA TABLA
function informarPersonas(){
	$tabla='';

	foreach ($_SESSION['personas'] as $nif => $valor){//cerco nell'array personas, $nif è l indice, $valor sono le due colonne nombre y direccion. //.= èr per andare aggiungendo le file senza cancellarle
		$tabla.="<tr>";
		$tabla.="<td class='nif'>$nif</td>";
		$tabla.="<td><input class='nombre' type='text' value='$valor[nombre]'></td>";//indice dell'array sin comillas, en un echo tenemos que poner comillas. (3) aggiungo l etichetta input
		$tabla.="<td><input class='direccion' type='text' value='$valor[direccion]'></td>";
		//añado dentro de cada celda de cada fila añado un boton de baja dentro de un form, necesito method y action
		$tabla.="<td><form method='post' action='#'><input type='hidden' value='$nif' name='nif'><input type='submit' name='bajapersona' value='Baja persona'></form><input type='button' value='modificar' class='modificar'></td>";//button para asociar un evento JS mediante la class
		$tabla.="</tr>";
	}
	return $tabla;
}
?>



<html>
<head>
	<title></title>
	<meta charset='UTF-8'>
	<style type="text/css">
		label {width: 150px; display: inline-block;}
		table {border: 1px solid blue;}
		td, th {border: 1px solid blue; width: 250px;}
		.wraper {margin: auto; border: 3px ridge blue;width: 650px;padding: 15px;}
		form {margin: 0px; display: inline-block;}
	</style>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
	</script>
	<script type="text/javascript">
		
		$(inicio)

		function inicio(){
			//activar botones modificar
			$('input.modificar').on('click', trasladarDatos)	
		}

		function trasladarDatos(){
			//alert('hola');
			//trasladar los datos de la tabla al formulario oculto;
			//recoger los datos
			var nif = $(this).closest('tr').find('td.nif').text()
			var nombre = $(this).closest('tr').find('input.nombre').val()
			var direccion= $(this).closest('tr').find('input.direccion').val()
			//alert(nif+' '+nombre+' '+direccion);
			//trasladamos los datos
			$('#nif').val(nif);
			$('#nombre').val(nombre);
			$('#direccion').val(direccion);

			//submit del formulario con id form_modificar
			$('#form_modificar')[0].submit()//indica il primer formulario con id form_modificar
		}
	</script>

</head>
<body>
	<div class='wraper'>
		<form method='post' action='#'>
			<label>NIF</label><input type='text' name='nif' value='<?=$nif;?>'><br>
			<label>Nombre</label><input type='text' name='nombre' value='<?=$nombre;?>'><br>
			<label>Dirección</label><input type='text' name='direccion' value='<?=$direccion;?>'><br>
			<input type='submit' name='alta' value='alta persona'>
			<span><?php echo $mensaje;?></span><!--para que salga el mensaje-->
		</form><br><br>
		<table>
			<tr><th>NIF</th><th>Nombre</th><th>Dirección</th><th></th></tr>
			<?php echo $personas?><!--echo della tabla che montamos de forma dinamica-->
			</table>
			<br>
		<!--Boton de Baja-->
		<form method='post' action='#'>
			<input type='submit' name='baja' value='baja'>
		</form>
		<!--formulario oculto donde pondremos los datos de las modificacion-->
		<form id="form_modificar" action="#" method="post">
			<input type="hidden" name="nif" id="nif">
			<input type="hidden" name="nombre" id="nombre">
			<input type="hidden" name="direccion" id="direccion">
			<input type="hidden" name="modificar"><!--per il JS-->
		</form>
	</div>
</body>
</html>
