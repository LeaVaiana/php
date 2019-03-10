<?php
    
    session_start();//esta variable de sesion ha sido creada en el ejercicio anterior, para ver que la variable de sesion se puede leer en otra pagina siembre y cuando esté en el mismo servidor


    if(isset($_SESSION['sesion'])){
        extract($_SESSION['sesion']);
        echo "$a $b";
    }else{
        echo 'sesion no iniciada';
    }

?>