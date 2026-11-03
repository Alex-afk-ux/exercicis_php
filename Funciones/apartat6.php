<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 6</title>
</head>
<body>

<!-- EXERCICI 1 -->
<?php
echo "<h2>Exercici 1</h2>";

$botiga = "Botiga de roba";

/**
 * Intenta mostrar una variable global sense rebre-la per paràmetre.
 *
 * @return void
 */
function mostrarBotiga(): void {
    // WARNING esperat: Undefined variable $botiga
    echo $botiga;
}

mostrarBotiga();
echo "<br>";

/**
 * Mostra el nom de la botiga rebut per paràmetre.
 *
 * @param string $botiga Nom de la botiga
 * @return string Nom de la botiga
 */
function mostrarBotigaCorrecte(string $botiga): string {
    return $botiga;
}

echo mostrarBotigaCorrecte($botiga);
?>

<!-- EXERCICI 2 -->
<?php
echo "<h2>Exercici 2</h2>";

/**
 * Compta amb una variable local que es reinicia a cada crida.
 *
 * @return int Valor del comptador
 */
function comptaLocal(): int {
    $contador = 0;
    $contador++;
    return $contador;
}

/**
 * Compta amb una variable static que conserva el valor entre crides.
 *
 * @return int Valor del comptador
 */
function comptaStatic(): int {
    static $contador = 0;
    $contador++;
    return $contador;
}

echo "Compta local:<br>";
echo comptaLocal() . "<br>";
echo comptaLocal() . "<br>";
echo comptaLocal() . "<br>";

echo "Compta static:<br>";
echo comptaStatic() . "<br>";
echo comptaStatic() . "<br>";
echo comptaStatic() . "<br>";

// La variable local torna a començar de zero a cada crida.
// La variable static conserva el valor entre les diferents crides.
?>

</body>
</html>
