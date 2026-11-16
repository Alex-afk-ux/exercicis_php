<?php
session_start();
 
$_SESSION = [];        // buidem les dades
session_destroy();     // destruïm la sessió al servidor
 
echo 'Sessió tancada. <a href="sessio.php">Torna al comptador</a>';
'Obrel i torna a sessio.php: el comptador està una altra vegada a 1. Mira la carpeta de sessions i comprova';
?>