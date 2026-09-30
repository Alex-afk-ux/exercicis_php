<?php

// Deinicion de una funcion,function nomFuncion($arg1,$arg2){ codigo de la funcion
//  return valor o no
// }

function funcionTest(){
    $var = 10;
    return $var;
}
// Como la funcion funciontest tiene un return,tengo que igualarla a una variable para recoger el valor del return

$var_fun = funcionTest();
echo "La variable igualada a la funcion: <br>" . $var_fun;

// Funcion sin return
function funcionTestSin(){
    $var = 20;
    echo "<br>La variable dentro de la funcion vale: <br>" . $var;
}
// LLada de funcion
funcionTestSin();

// Como podemos utilizar dentro d elas funciones variables globales
$var2 = 50;
function funcionConGlobal(){
    // Para poder utilizar una variable de fuera del ambito de la funcion se utiliza la palabra reservada global
    global $var2;
    echo "<br>La variable var2 de fuera d ela funcion vale: <br>". $var2;
}
funcionConGlobal();

// Recursividad --> una funcion se puede llamar a si mismo
function factorial($numero){
    // Factorial de 5 es 5*4*3*2*1
    if($numero == 1){
        return $numero;
    }else{
        return $numero * factorial($numero -1);
    }
}

echo "<br>El factorial de 7 es: " .factorial(7). "<br>";
?>