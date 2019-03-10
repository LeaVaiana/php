<?php
/*Realizar un contador de visitas que se incremente en uno cada vez que visitamos la página:
Iniciar la sesión
Comprobar si existe la cookie con isset
Si no existe crear una con el contador inicializado a cero Si existe, recuperar el valor del contador y sumarle uno Asignar el nuevo valor a la cookie*/


//si existe la cookie (la prima volta che entriamo non esiste la cookie):
    if(isset($_COOKIE['contador'])){
        //recuperar contador y sumar 1;
        $contador = $_COOKIE['contador']+1;
        //mostrar el contador;
        echo $contador;
        //volver a grabar la cookie;
        setcookie('contador', $contador, time()+3600);
    }else{
//si no existe:
    //mostrar contador a 1
    $contador=1;
    echo $contador;
    //grabar cookie con contador = 0
    setcookie('contador', $contador, time()+3600);
    }

?>
