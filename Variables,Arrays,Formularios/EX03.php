<?php

$nom = "Pepito";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tres formas</title>
</head>
<body>
    <h1>Tres formas y ek mismo resultado</h1>
    <!-- FORMA 1: php escribe toda la etiqueta  -->
    <?php echo "<p>Hola $nom</p>";?>
    <!-- FORMA 2: html esta fuera,php solo pone el valor  -->
    <p>Hola<?= $nom ?></p>
    <!-- FORMA 3: El de todo la vida  -->
     <p>Hola Pepito</p>
</body>
</html>