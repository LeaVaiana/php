<?php
	include('include/multidioma.php');
?>


<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='css/estilos.css'>
	
	<script type="text/javascript">
		var error = '<?=$js_error;?>';//para enlazar a los documentos de los varios idiomas
	</script>
	
	<script type="text/javascript" src='js/pagina.js'></script><!--para enlazar al documento js-->

</head>
<body>
	<!--incorporo file php esterni con include (o require) e sostituisco tutti i testi fissi con variabili-->
	<?php include('include/header.php');?>
	<?php include('include/nav.php');?>
	<section>
		<h2><?php echo $p2_section_h2;?></h2><img src="http://www.lorempixel.com/250/250/nature">
		<input type="text" id="texto">
		<input type="button" value="validar" onclick="validar()">
	</section>
	
	<?php include('include/footer.php');?>		
	
</body>
</html>