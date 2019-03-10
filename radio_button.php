<?php
//INIZIALIZIAMO LE VARIBILI
    $nombre="";
    $edad="";
    $radio="1"; //scelgo il radio button che voglio selezionato



//tenemos que preguntar si se ha pulsado al boton enviar del formulario (equivalente al listener de JS);
if (isset($_POST['enviar'])){//isset serve per chiedere se qualcosa esiste, usiamo il metodo usato (get o post) e il name del submit
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $radio = $_POST['radio'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <!--adesso il formulario avrá estensione php, perche verrá processato al servidor e la risposta la otteniamo nella stessa pagina che tornerá a caricarsi-->
</head>
<body>
    <form method="post" action="#">
        <input type="text" name="nombre" required value="<?=$nombre?>">
        <input type="edad" name="edad">
        1 <input type="radio" name="radio" value="1" <?php if ($radio == 1){echo "checked";}?> >
        2 <input type="radio" name="radio" value="2" <?php if ($radio == 2){echo "checked";}?> >

        <input type="submit" name="enviar">
    <!--aggiungo il campo per la risposta che ci torna php-->
    </form><br><br>
    <textarea><?php echo "$nombre $edad $radio";?></textarea>
    
</body>
</html>