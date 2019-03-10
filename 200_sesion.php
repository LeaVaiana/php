<?php
    
    session_start();

    $a=3;
    $b=5;


   $_SESSION['sesion'] = compact('a','b');

    /*if(isset($_SESSION['sesion'])){
        extract($_SESSION['sesion']);
        echo "$a $b";
    }else{
        echo 'sesion no iniciada';
    }*/

?>