<?php
//Inicializar la variable valor
    $valor="";


//tenemos que preguntar si se ha cambiado el valor de la combo
if(isset($_GET["combo"])){//isset serve per chiedere se qualcosa esiste, usiamo il metodo usato (get o post) e il name del submit
    $valor = $_GET["combo"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <!--adesso il formulario avrá estensione php, perche verrá processato al servidor e la risposta la otteniamo nella stessa pagina che tornerá a caricarsi-->
</head>
<body>
    <form method="get" action="#">
        <select name="combo" onchange="this.form.submit()">
            <option>A</option>
            <option>B</option>
            <option>C</option>
        </select>
    <!--aggiungo il campo per la risposta che ci torna php-->
    </form><br><br>
    <textarea>
        <?php echo "$valor";?>
    </textarea>
</body>
</html>