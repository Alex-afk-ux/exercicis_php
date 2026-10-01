<?php
// Funciones con cadenas de texto(String)


$cadena = "Hola";
$cadena[0] = "C";

echo "Ahora cadena es :" . $cadena; // Saldra cola (H por C)

// Funciones prestablecidas de PHP

// strlen --> Medir la longitud de la cadena
$cadena ="Aquesta cadena te moltes lletres <br>";
$num_caracters = strlen($cadena);

echo "<br>El total de caracters es :" .$num_caracters. "<br>";

// strpos --> retorna la casella on troba la subcadena dins de la cadena pasada
// Sempre retorna la primera ocurrencia

$email = "hola@email.com";
echo "poscio@: " .strpos($email, "@") . "<br>";

// strcmp --> string compare,compara dos cadena si retorna 0 es igual
// si retorna <0 la primera cadena es mas pequeña,si retorna >0 laa primera cadena es mas grande
// strcmp($cad1,$cad2);

echo "Utilizamos strcmp: " .strcmp("Alejandra" , "Pepe"). "<br>";

// substr: reorna una subcadena de caracters d'una cadena a partir
// d'una posicio especificada fins al final o del tamany especificat
// La cadena original no pateix cap modificacio

$cadena ="PHP es un llenguatge facil";
echo "El substr de 0 a 3 es: ".substr($cadena,0,3). "<br>"; // Saldra PHP
echo "El substr de 21" .substr($cadena,21). "<br>";

// trim: eliminar los espacios en blanco y saltos de linea que hay al principio y al final de una cadena

echo "Ejemplo con trim" .trim("     hola que      tal      "). "<br>";
// ltrim:elimina los espacios que hay en blanco al principio de la cadena
echo "Ejemplo de ltrim: " .ltrim. "<br>"
// str_replace($antiga,$nova,$cadena): substitueix la cadena $antiga per la cadena $nova dins de $cadena
$cadena = "PHP es facil";
$antiga ="Es mes";
$nova ="Ejemplo str_replace : " .str_replace($antiga,$nova,$cadena). "<br>";

// ereg_replace /eregi_replace()
// strtolower($cadena): passa la cadena minusculas
// strtoupper($cadena): passa la cadena a majusculas
// explode: permet dividir una cadena segons un caracter o patro

// EXERCICI 1: BUSCA EN PHP.NET LA FUNCIO str_word_count() Y PON UN EJEMPLO
// EXERCICI 2: BUSCA EN PHP.NET LA FUNCIO: levenshtein()  Y PON UN EJEMPLO
// EXERCICI 3: BUSCA QUE ES EL OPERADOR TERNARIO Y PON UN EJEMPLO
// EXERCICI 4: EXPLICAR QUE  HACE ESTA FUNCION:
function funcionMultipleReturns($v1,$v2,$v3){
    $v1 = "variable1";
    $v2 = "variable2";
    $v3 = "variable3";

    return array($v1,$v2,$v3);
}

// EXERCICI 5: CREAR UNA FUNCION COMPROVA_EMAIL(...)
// QUE RECIBE UNA CADENA DE CARACTERISTICAS COMO PARAMETRO
// QUE CONTIENE UN EMAIL Y HACE LAS SIGUIENTES COMPROBACIONES:

// - CONVERTIR A MINUSCULAS
// - ELIMINAR TODO LOS ESPACIOS EN BLANCO
// - COMPROBAR SI TIENE EL CARACTER @
// - CONTAR EL NUMERO DE CARACTERES

?>