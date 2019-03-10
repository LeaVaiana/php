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
			<table border='2'>
				<tr><th>Título</th><th>Precio</th></tr>
				<tr>
				<td><input type='text' size='50' maxlenght='100' name='titulo' /></td>
				<td><input type='number' maxlenght='5' name='precio' /></td>
				</tr>
			</table><br>
			<input type='submit' name='alta' value='Alta' >
			<input type='submit' name='baja' value='Baja' >
			<input type='submit' name='modi' value='Modificar' >
		</form><br>
		
		<div>
			<table>
							</table>
		</div>
	</div>
</body>
</html>