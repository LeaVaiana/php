<?php
	include('include/multidioma.php');
?>


<html>
<head>
<!--sostituisco i testi da tradurre con variabili e faccio un file esterno con tutte le variabili con contenido tradotto (idioma_es.php)-->
	<title><?php echo $title;?></title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='css/estilos.css'>
</head>
<body>
<!--incorporo file php esterni con include (o require)-->
	<?php include('include/header.php');?>
	<?php include('include/nav.php');?>
	
	<!--per il contenuto non lo conserviamo in una variabile-->
	<section>
		<!--il contenuto si trova nel documento contenido_es.html, la variable idioma la trovo nel multidioma.php per sapere que lingua sto usando, posso anche fare un include al posto del readfile-->
		<?php readfile("include/contenido_$idioma.html");?>

	</section>
	<?php include('include/footer.php');?>	
	
</body>
</html>