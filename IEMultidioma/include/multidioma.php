<?php
	//creamos un array con los idiomas permitidos, asi no pueden cambiar el idioma en la barra superior
	$idiomasPermitidos = array('es','it','en');

	//recuperar el idioma del navegador
	$idiomaNavegador = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	//compromabos si el idioma del navegador está dentro del array de idiomas permitidos
	if(in_array($idiomaNavegador,$idiomasPermitidos)){
		$idioma = $idiomaNavegador;
	}else{
		$idioma = 'it';//se l'idioma del navegador non è tra le lingue permesse, assegniamo alla web un idioma por defecto
	}


	//recoger el idioma que selecciona el usuario
	if (isset($_GET['idioma'])){
		//comprobar que el idioma está permitido
		if(in_array($_GET['idioma'],$idiomasPermitidos)){// se l'idioma che ci arriva con il get esiste nell'array idiomas Permitidos:
			$idioma = $_GET['idioma'];//idioma es el parametro que encontramos en el enlace php?idioma=es dell header
			//creiamo una cookie per ricordare l'idioma selezionato
			setcookie('idioma',$idioma,time()+3600*24*365,'/');//nome cookie, variabile, tempo, accessibile in tutto il dominio.
		}
	} else {
		//verificar si hay un idioma guardado en la cookie, else es necesario porque si no no leo la cookie, y me quedo con el idioma por defecto.
		if(isset($_COOKIE['idioma'])){
			$idioma = $_COOKIE['idioma'];
		}
    }
    //informar la variable con la pagina donde nos encontremos (vedi l header)
    $pagina = basename($_SERVER['PHP_SELF']);//essenziale per cambiare l'idioma anche alla pagina 2, altrimenti dalla pagina 2 mi passerebbe alla pagina 1 quando cambio idioma
	
	//incorporar archivo de traducciones, chiamo la variabile definita sopra
	include("include/idioma_$idioma.php");
?>