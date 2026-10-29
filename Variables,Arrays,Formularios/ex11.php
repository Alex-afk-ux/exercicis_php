<?php
// ============================================================
// FUNCIONES CON CADENAS DE TEXTO (STRING)
// ============================================================

// ------------------------------------------------------------
// 1. Acceso a un carácter de la cadena
// ------------------------------------------------------------
$cadena = "Hola";
$cadena[0] = "C";
echo "Ahora cadena es: " . $cadena . "<br>"; // Saldrá Cola (H por C)

// ------------------------------------------------------------
// 2. Funciones predefinidas de PHP
// ------------------------------------------------------------

// strlen --> mide la longitud de la cadena
$cadena = "Aquesta cadena te moltes lletres";
$num_caracters = strlen($cadena);
echo "<br>El total de caracters es: " . $num_caracters . "<br>";

// strpos --> retorna la casella on troba la subcadena dins de la cadena passada
// Sempre retorna la primera ocurrencia
$email = "hola@email.com";
echo "Posicio @: " . strpos($email, "@") . "<br>";

// strcmp --> string compare, compara dos cadenas. Si retorna 0 son iguales
// si retorna < 0 la primera cadena es mas pequeña, si retorna > 0 la primera es mas grande
echo "Utilizamos strcmp: " . strcmp("Alejandra", "Pepe") . "<br>";

// substr --> retorna una subcadena a partir d'una posicio especificada
// fins al final o del tamany especificat. La cadena original no es modifica
$cadena = "PHP es un llenguatge facil";
echo "El substr de 0 a 3 es: " . substr($cadena, 0, 3) . "<br>"; // Saldrá PHP
echo "El substr desde 21 es: " . substr($cadena, 21) . "<br>";

// trim --> elimina espacios en blanco y saltos de linea al principio y al final
echo "Ejemplo con trim: [" . trim("     hola que      tal      ") . "]<br>";

// ltrim --> elimina los espacios en blanco solo al principio de la cadena
echo "Ejemplo de ltrim: [" . ltrim("     hola que tal") . "]<br>";

// str_replace($antiga, $nova, $cadena) --> substituye $antiga por $nova dentro de $cadena
$cadena = "PHP es facil";
$antiga = "es";
$nova   = "es muy";
echo "Ejemplo str_replace: " . str_replace($antiga, $nova, $cadena) . "<br>";

// ereg_replace / eregi_replace --> OBSOLETAS (eliminadas en PHP 7), usar preg_replace

// strtolower($cadena) --> pasa la cadena a minusculas
echo "strtolower: " . strtolower("HOLA MUNDO") . "<br>";

// strtoupper($cadena) --> pasa la cadena a mayusculas
echo "strtoupper: " . strtoupper("hola mundo") . "<br>";

// explode --> permite dividir una cadena segun un caracter o patron
$partes = explode("@", "hola@email.com");
echo "explode: ";
print_r($partes);
echo "<br>";



// EXERCICI 1: str_word_count()
// Cuenta las palabras de una cadena (o las devuelve en un array)

echo "<h3>Ejercicio 1: str_word_count()</h3>";

$frase = "Hola mundo, esto es PHP";

echo "Numero de palabras: " . str_word_count($frase) . "<br>"; // 5 (formato 0)

echo "Formato 1 (array de palabras): ";
print_r(str_word_count($frase, 1));
echo "<br>";

echo "Formato 2 (posicion => palabra): ";
print_r(str_word_count($frase, 2));
echo "<br>";



// EXERCICI 2: levenshtein()
// Distancia minima (inserciones, sustituciones, borrados)
// para convertir una cadena en otra

echo "<h3>Ejercicio 2: levenshtein()</h3>";

echo "casa -> cosa: " . levenshtein("casa", "cosa") . "<br>";   // 1 (cambiar 'a' por 'o')
echo "gato -> gatos: " . levenshtein("gato", "gatos") . "<br>"; // 1 (añadir 's')
echo "hola -> adios: " . levenshtein("hola", "adios") . "<br>"; // distancia mayor

// Ejemplo de sugerencia "¿Quisiste decir...?"
$palabras = ["manzana", "naranja", "platano"];
$entrada  = "manzano";
$mejor    = null;
$menor    = PHP_INT_MAX;

foreach ($palabras as $p) {
    $d = levenshtein($entrada, $p);
    if ($d < $menor) {
        $menor = $d;
        $mejor = $p;
    }
}
echo "¿Quisiste decir $mejor?<br>";



// EXERCICI 3: OPERADOR TERNARIO
// Forma abreviada de if/else: condicion ? valor_si_true : valor_si_false

echo "<h3>Ejercicio 3: Operador ternario</h3>";

$edad = 20;

// Con if/else
if ($edad >= 18) {
    $estado = "mayor de edad";
} else {
    $estado = "menor de edad";
}
echo "Con if/else: $estado<br>";

// Con ternario (hace exactamente lo mismo)
$estado = ($edad >= 18) ? "mayor de edad" : "menor de edad";
echo "Con ternario: $estado<br>";

// Variante corta ?: --> devuelve el primer valor si es "truthy"
$nombre = "";
echo "Ternario corto: " . ($nombre ?: "Anonimo") . "<br>";

// Operador de fusion null ?? --> devuelve el valor si existe y no es null
echo "Fusion null: " . ($_GET['user'] ?? "invitado") . "<br>";



// EXERCICI 4: EXPLICAR QUE HACE ESTA FUNCION

echo "<h3>Ejercicio 4: funcionMultipleReturns()</h3>";

function funcionMultipleReturns($v1, $v2, $v3) {
    $v1 = "variable1";
    $v2 = "variable2";
    $v3 = "variable3";

    return array($v1, $v2, $v3);
}

/*
 EXPLICACION:
 - Recibe tres parametros ($v1, $v2, $v3), pero lo primero que hace es
   sobrescribirlos con "variable1", "variable2" y "variable3", asi que
   los valores recibidos se pierden (no sirven para nada).
 - Un return solo puede devolver UN valor, pero aqui se mete todo dentro
   de un array y se devuelve ese array. Es la forma de simular que una
   funcion devuelve multiples valores en PHP.
 - Quien llama a la funcion recibe el array y puede separarlo con list()
   o con la sintaxis corta [ ].
*/

$resultado = funcionMultipleReturns(1, 2, 3);
print_r($resultado);
echo "<br>";

// Desempaquetar el array en variables separadas
list($a, $b, $c) = funcionMultipleReturns(1, 2, 3);
// Equivalente moderno: [$a, $b, $c] = funcionMultipleReturns(1, 2, 3);
echo "$a, $b, $c<br>";



// EXERCICI 5: FUNCION comprova_email()
// - Convertir a minusculas
// - Eliminar todos los espacios en blanco
// - Comprobar si tiene el caracter @
// - Contar el numero de caracteres

echo "<h3>Ejercicio 5: comprova_email()</h3>";

function comprova_email($cadena) {
    // 1. Convertir a minusculas
    $cadena = strtolower($cadena);

    // 2. Eliminar todos los espacios en blanco
    // (preg_replace tambien quita tabuladores y saltos de linea)
    $cadena = preg_replace('/\s+/', '', $cadena);

    // 3. Comprobar si tiene el caracter @
    // Se usa !== porque strpos devuelve 0 si @ esta en la primera posicion
    $tiene_arroba = (strpos($cadena, "@") !== false);

    // 4. Contar el numero de caracteres
    $num_caracteres = strlen($cadena);

    echo "Email limpio: $cadena<br>";
    echo "Contiene @: " . ($tiene_arroba ? "Si" : "No") . "<br>";
    echo "Numero de caracteres: $num_caracteres<br>";

    return $cadena;
}

comprova_email("  Juan.Perez @Ejemplo.COM ");
// Email limpio: juan.perez@ejemplo.com
// Contiene @: Si
// Numero de caracteres: 22
?>