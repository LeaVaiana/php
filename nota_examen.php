
<?php
/*EJERCICIO
Utilizar un formulario para introducir la nota de un examen (de 0 a 10). con un input e boton inviar
Al pulsar enviar se llamará a un fichero php con GET que realizará las siguientes validaciones: action# para que se procese en la misma pagina
Si la nota es mayor que 5 mostrar el texto “Aprobado”
Si la nota es menor que 5 mostrar “Suspenso”
SI la nota es igual a 5 mostrar “Por los pelos”
Si la nota es igual a 10 mostrar el texto 'Matrícula de Honor'
Si la nota no es numerica mostrar el texto "Nota no numerica"
Si la nota es mayor de 10 "nota non valida"*/

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


