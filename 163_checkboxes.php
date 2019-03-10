<?php
//inicializar un array vacio de $numeros y añadir el php de numeros en el formulario html, para que se recuerde la selección;
$numeros= array();

//comprobar si hemos pulsado submit;
if(isset($_POST['enviar'])){
    if(isset($_POST['numero'])){ //se non metto questa linea quando non seleziono niente mi da errore, compruebo che si è selezionato alemno un radio button;
        $numeros = $_POST['numero'];
        foreach ($numeros as $valor){
            echo "$valor <br>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="#" method="post">
    <input type="checkbox" name="numero[]" value="1" <?php if (in_array('1',$numeros)){echo 'checked';}?>/> 1 <br/> <!--bisogna aggiungere l attributo name per i checkbox-->
    <input type="checkbox" name="numero[]" value="2" <?php if (in_array('2',$numeros)){echo 'checked';}?>/> 2 <br/> 
    <input type="checkbox" name="numero[]" value="3" <?php if (in_array('3',$numeros)){echo 'checked';}?>/> 3 <br/> 
    <input type="checkbox" name="numero[]" value="4" <?php if (in_array('4',$numeros)){echo 'checked';}?>/> 4 <br/> 
    <input type="submit" name='enviar'>
</form>
    
</body>
</html>
