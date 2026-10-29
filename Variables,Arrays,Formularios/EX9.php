<?php

// Funciones prestablecidas de php
// isset()--> permite saber si una variable existe en nuestro programa


// unset() --> liberar espacio en memoria (destruir) de una variable

// $var = "10";

// if(isset($var)){
//     echo "La variable $var existe";
// }

// unset($var);
// if(isset($var)){
//     echo  "La variable $var existe";
// }else{
//     echo "La variable $var no existe";
// }

// gettype() --> nos retorna el tipo de variable que pasamos por parametro
// settype() --> asignamos un tipo de dato a la variable que pasamos por parametros
// empty() --> funcion que mira si una variable esta vacia,no existe o su valor es 0

// is_integer(var),is_double(var),is_array(var),is_string(var) -->
// para saber si una variable es integer,double,string,array,etc

// EX1: for para la tabla d emultiplicar del 5
// var exist?


// EX2: Mostrar los numeros pares del 1 al 1000

// EX3: Dibuja una tabla html donde salgan las faltas de multiplicar del 1 al 10
// ?>
// <?php
// for($i = 0; $i <= 10; $i++){
//     $a = $i * 5;
//     if(isset($a)){
//      echo "$a <br>";
//     }
// }
// ?>

// <?php
//    for($i = 0; $i <= 1000; $i++){
//     if($i % 2 == 0){
//      echo "$i <br>";
//     }
// } 
// ?>
<!-- <?php

// // Fila de cabecera
// echo "x";
// for ($c = 1; $c <= 10; $c++) {
//     echo "$c";
// }

// // Filas del 1 al 10
// for ($f = 1; $f <= 10; $f++) {
//     echo "$f";
//     for ($c = 1; $c <= 10; $c++) {
//         echo ($f * $c);
//     }
// }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIOS</title>
</head>
<body>
    <h2>EX1: Tabla del 5</h2>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "5 x $i = " . (5 * $i) . "<br>";
    }
    ?>

    <h2>EX2: Números pares del 1 al 1000</h2>
    <?php
    for ($i = 2; $i <= 1000; $i += 2) {
        echo "$i ";
    }
    ?>

    <h2>EX3: Tablas de multiplicar del 1 al 10</h2>
    <table border ="4">
        <tr>
            <th>x</th>
            <?php for ($c = 1; $c <= 10; $c++): ?>
                <th><?= $c ?></th>
            <?php endfor; ?>
        </tr>
        <?php for ($f = 1; $f <= 10; $f++): ?>
            <tr>
                <th><?= $f ?></th>
                <?php for ($c = 1; $c <= 10; $c++): ?>
                    <td><?= $f * $c ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>