<?php
	session_start(); //metterlo in tutte le pagine dove utilizeremo variables de sesion;
	
	//inicializar variables
	$nif=$nombre=$error=$codigo=$description=$extracto=$renuncia=$entidad=$oficina=$dc=$cuenta=$alerta='';

	//(2)
	$modo='alta';

	//recuperar datos de la página index.php
	//verificamos si existe la  variable de session, si existe recuperamos nif y nombre. Si no existe es q no han pasado por la pantalla anterior
	
	if(isset($_SESSION['nif'])){
		$nif = $_SESSION['nif'];
		$nombre = $_SESSION['nombre'];

		//(2)comprobar si existe una cuenta previamente dada de alta:
		if(isset($_SESSION['cuentas'][$nif])){
			//(2)mover los datos de la cuenta al formulario :
				$entidad=$_SESSION['cuentas'][$nif]['entidad']; 
				$oficina=$_SESSION['cuentas'][$nif]['oficina'];
				$cuenta=$_SESSION['cuentas'][$nif]['cuenta'];
				$dc=$_SESSION['cuentas'][$nif]['dc'];
				$codigo=$_SESSION['cuentas'][$nif]['codigo'];
				$description=$_SESSION['cuentas'][$nif]['description'];
				$extracto=$_SESSION['cuentas'][$nif]['extracto'];
				$renuncia=$_SESSION['cuentas'][$nif]['renuncia'];


			//(2)mostrar un aviso;
			$alerta="alert('nif con cuenta asociada')";

			//(2)modalidad modificacion
			$modo = 'modificacion';

		}
	}else{//si no hemos pasado por la pantalla anterior, que lo detecte el programa;
		//si el titular llega sin informar retornar a la pantalla index.php
		header("Location: index_alumno.php");
	}
	
	//comprobar si se ha pulsado el botón de alta cuenta
	if(isset($_POST["altapuntos"])){
//recuperar datos
		//echo $_POST["nif"]; quando le doy al boton alta vedo il numero nell'echo, recupero i name
		$nif=$_POST["nif"];//input nif e nombre li abbiamo mq gia recuperati
		$nombre=$_POST["titular"];//input
		if(isset($_POST['codigo'])){
			$codigo=$_POST["codigo"];//combo
			$description=$_POST["descripcion"];//input
		}else{
			$error = "alert('codigo obligatorio')";
		}
		//si no los hemos marcado nos da error, para evitarlo:
		if(isset($_POST['extracto'])){
			$extracto=$_POST["extracto"][0];//checkbox, se abbiamo un solo checkbox e ne vogliamo recuperare il valore, scriviamo [] e usiamo un echo
			//echo $extracto;
		}

		if(isset($_POST['renuncia'])){
			$renuncia=$_POST["renuncia"][0];//checkbox
			//echo $renuncia;
		}

//per evitare gli errori di combo e checkbox, dobbiamo selezionarli e dargli al botton alta.
		//validar codigo informado

		//confeccionar cuenta formato 0000 0000 00 0000000000
		$entidad = '2100';
		$oficina = '0990';
		$cuenta = 4090000000 + rand(1,999999);//sommiamo a questa cuenta un valore entre 1 y 999999 che vamos a sumar, siempre va a tener 10 digitos
		$dc = calculodigito($entidad,$oficina,$cuenta);//chiamo la funzione per calcolarmi i due digiti dc;
		

		//dar de alta la cuenta con sus datos asociados en una variable de sesion:
		$_SESSION['cuentas'][$nif]['entidad'] = $entidad; //nombre de la tabal donde guardaremos todos los valores de nuestra base de datos, cada fila pertenece a una persona mediante su clave (nif). Nombre tabla/clave/columna, relleno las celdas de cada excell:
		$_SESSION['cuentas'][$nif]['oficina'] = $oficina;
		$_SESSION['cuentas'][$nif]['cuenta'] = $cuenta;
		$_SESSION['cuentas'][$nif]['dc'] = $dc;
		$_SESSION['cuentas'][$nif]['codigo'] = $codigo;
		$_SESSION['cuentas'][$nif]['description'] = $description;
		$_SESSION['cuentas'][$nif]['extracto'] = $extracto;
		$_SESSION['cuentas'][$nif]['renuncia'] = $renuncia;

		//print_r($_SESSION["cuentas"]);

		$modo='modificacion';

		//(2) comprobar si se ha pulsado modificar
		if(isset($_POST['codigo'])){
			$codigo=$_POST["codigo"];//combo
			$description=$_POST["descripcion"];//input
		}else{
			$error = "alert('codigo obligatorio')";
		}
		//si no los hemos marcado nos da error, para evitarlo:
		if(isset($_POST['extracto'])){
			$extracto=$_POST["extracto"][0];//checkbox, se abbiamo un solo checkbox e ne vogliamo recuperare il valore, scriviamo [] e usiamo un echo
			//echo $extracto;
		}

		if(isset($_POST['renuncia'])){
			$renuncia=$_POST["renuncia"][0];//checkbox
			//echo $renuncia;
		}
		//actualizar la variable de sesion
		$_SESSION['cuentas'][$nif]['codigo'] = $codigo;
		$_SESSION['cuentas'][$nif]['description'] = $description;
		$_SESSION['cuentas'][$nif]['extracto'] = $extracto;
		$_SESSION['cuentas'][$nif]['renuncia'] = $renuncia;

		$alerta="alert('modificacion efectuada')";
	
	
	
	
	
	}

	//comprobar si se ha pulsado modificar
	if (isset($_POST['modifpuntos'])){
		//recuperar codigo, descripcion y checkboxes
		//validar codigo informado
		$codigo=$_POST["codigo"];//combo
			$description=$_POST["descripcion"];//input
		}else{
			$error = "alert('codigo obligatorio')";
		}







	}


		
		

		

	//comprobar si se ha pulsado salir
	
	//funzione per calcolare i due numeri a soli in un IBAN
	function calculodigito($e, $o, $c) {
		$resto_eo = (substr($e,0,1)*4+substr($e,1,1)*8+substr($e,2,1)*5+substr($e,3,1)*10+substr($o,0,1)*9+substr($o,1,1)*7+substr($o,2,1)*3+substr($o,3,1)*6)%11;

		$resto_c = (substr($c,0,1)*1+substr($c,1,1)*2+substr($c,2,1)*4+substr($c,3,1)*8+substr($c,4,1)*5+substr($c,5,1)*10+substr($c,6,1)*9+substr($c,7,1)*7+substr($c,8,1)*3+substr($c,9,1)*6)%11;

		$d = ((11-$resto_eo == 10)?1:(11-$resto_eo == 11)?0:11-$resto_eo).((11-$resto_c == 10)?1:(11-$resto_c == 11)?0:11-$resto_c);

		return $d;
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
		
		var codigos = new Array('PBS', 'PAV', 'PPR');

		var descripcion = new Array('Programa Puntos Básico','Programa Puntos Avanzado','Programa Puntos Premium');

		$(inicio)

		function inicio() {
			<?=$error;?>;
			$('#codigo').on('change', consultaPrograma)
		}

		function consultaPrograma() {
			var codigo = $('#codigo').val()

			var indice = codigos.indexOf(codigo)

			if (indice==-1) {
				alert('código programa inexistente')
				$('#descripcion').val('')
			} else {
				$('#descripcion').val(descripcion[indice])
			}
		}
	</script>
</head>
<body>
	<div class='contenedor'>
		<header>
			<img src="img/chungobank.png">
			<h4>Alta Manual Cta Punts</h4>
		</header>
		<section>
			<form method='post' action='#'>
				<label>CONTRATO PUNTOS:</label>
				<input type="text" name="entidad" disabled value = '<?=$entidad;?>'>
				<input type="text" name="oficina" disabled value = '<?=$oficina;?>'>
				<input type="text" name="dc" disabled value = '<?=$dc;?>'>
				<input type="text" name="cuenta" disabled value = '<?=$cuenta;?>'>
				<br><br>
				<label>TITULAR:</label>
				<input type="text" name="nif" value='<?=$nif?>' readonly><!--echo para visualizar el nif, uso readonly e non disabled, il disabled non mi invia i dati al servidor-->
				<input type="text" name="titular" value='<?=$nombre?>' readonly><!--echo para visualizar el titular, recupero l'attributo name-->
				<br><br><hr><br><br>
				<label>CÓDIGO PROGRAMA:</label>
				<select name='codigo' id='codigo' value='<?=$codigo?>'>
					<option disabled selected>Seleccione código</option>
					<option <?php if($codigo =='PBS'){echo 'selected';}?>>PBS</option>
					<option <?php if($codigo =='PAV'){echo 'selected';}?>>PAV</option>
					<option <?php if($codigo =='PPR'){echo 'selected';}?>>PPR</option>
				</select>
				<br><br>
				<label>DESCRIPCIÓN PROGRANA:</label>
				<input type="text" name="descripcion" id='descripcion' value='<?=$description?>'>
				<br><br>
				<label>RENUNCIA EXTRACTO:</label>
				<input type="checkbox" name="extracto[]" value='no' value='<?=$extracto?>'>
				<br><br>
				<label>RENUNCIA OBTENCIÓN PUNTOS:</label>
				<input type="checkbox" name="renuncia[]" value='si' value='<?=$renuncia?>'>
				<br><br><br>


				<?php if ($modo=='alta') { ?>
                <input type="submit" name="altapuntos" value='Alta'>
                <?php } else { ?>
                <input type="submit" name="modifpuntos" value='Modificar'>
                <?php } ?>
                <input type="submit" name="salir" value='Abandonar'>




			</form>
		</section>
	</div>
</body>
</html>

