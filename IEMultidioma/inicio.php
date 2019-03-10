<?php
	include('include/multidioma.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/page.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/page.js" type="text/javascript"></script>
</head>
<body>	
	
		<!--header.php-->
<?php include('include/header.php');?>

	<div class="wraper">
		<!--nav.php-->
	<?php include('include/nav.php');?>

		<div class="content">
			<div class="slider">
				<img src="img/iem_1.jpg" /><img src="img/iem_2.jpg" />
			</div>
		<!--contenido.html-->
		<?php readfile("include/contenido_$idioma.html");?>
		
		    <br><br>
		</div>
		<!--footer.php-->
		<?php include('include/footer.php');?>
	</div>
</body>
</html> 
