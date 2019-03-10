<?php

$contenido = 'contenido de la cookie';

//creo cookie
setcookie('cookie',$contenido,time() + 3600);

//para ver el contenido
echo $_COOKIE['cookie'];

//la cookie es visible la sesion siguiente (bisogna rinfrescare)


?>
