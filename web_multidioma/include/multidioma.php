<?php
	//creamos un array con los idiomas permitidos
	$idiomasPermitidos = array('es','ca');

	//recuperar el idioma del navegador
	$idiomaNavegador = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	//compromabos si el idioma del navegador está dentro del array de idiomas permitidos
	if(in_array($idiomaNavegador,$idiomasPermitidos)){
		$idioma = $idiomaNavegador;
	}else{
		$idioma = "es";//si el'idioma del navegador no está entre los idiomas permitidos asignamos idioma por defecto. 
		}


	//recoger el idioma que selecciona el usuario
	if (isset($_GET['idioma'])){
		//comprobar que el idioma está permitido
		if(in_array($_GET['idioma'],$idiomasPermitidos)){// si el idioma que llega existe en el array idiomas Permitidos:
			$idioma = $_GET['idioma'];
			setcookie('idioma',$idioma,time()+3600*24*365,'/');//nombre cookie, variable, tiempo.
		}
	} else {
		//verificar si hay un idioma guardado en la cookie.
		if(isset($_COOKIE['idioma'])){
			$idioma = $_COOKIE['idioma'];
			}
    }
    //informar la variable con la pagina donde nos encontremos
    $pagina = '';
	
	//incorporar archivo de traducciones, chiamo la variabile definita sopra
	include("include/idioma_$idioma.php");
?>