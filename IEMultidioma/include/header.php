<header>
    <img src="img/IEM_logo.png">
    <h1><?=$_header_h1;?></h1>
    <!--peticion get para dirigersi verso un idioma o l'altro-->
    <!--valido solo per una pagina: a href="pagina_1.php?idioma=it">IT</a> | <a href="pagina_1.php?idioma=es">ES</a>, ma vogliamo un link dinamico-->
    <a href="<?=$pagina?>?idioma=it">IT</a> | <a href="<?=$pagina?>?idioma=es">ES</a> | <a href="<?=$pagina?>?idioma=en">EN</a>
</header>	