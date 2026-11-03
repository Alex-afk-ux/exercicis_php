<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 4</title>
</head>
<body>

<!-- EXERCICI 1 -->
<?php
echo "<h2>Exercici 1</h2>";

/**
 * Calcula el preu amb IVA.
 *
 * @param float $base Preu sense IVA
 * @param float $iva Tipus d'IVA (per defecte, 21%)
 * @return float Preu amb IVA
 */
function preuAmbIva(float $base, float $iva = 0.21): float {
    return $base * (1 + $iva);
}

$base = 100;

echo "Base $base EUR amb IVA per defecte (21%): " .
    number_format(preuAmbIva($base), 2, ',', '.') . " EUR<br>";

echo "Base $base EUR amb IVA del 10%: " .
    number_format(preuAmbIva($base, 0.10), 2, ',', '.') . " EUR<br>";

echo "Base $base EUR amb IVA del 4%: " .
    number_format(preuAmbIva($base, 0.04), 2, ',', '.') . " EUR<br>";
?>

<!-- EXERCICI 2 -->
<?php
echo "<h2>Exercici 2</h2>";

/**
 * Aplica un descompte al preu.
 *
 * @param float $preu Preu original
 * @param int $percentatge Percentatge de descompte (per defecte, 10)
 * @return float Preu amb el descompte aplicat
 */
function aplicaDescompte(float $preu, int $percentatge = 10): float {
    return $preu * (1 - ($percentatge / 100));
}

$preuOriginal = 200;

echo "Preu original: $preuOriginal EUR<br>";
echo "Amb descompte per defecte (10%): " .
    number_format(aplicaDescompte($preuOriginal), 2, ',', '.') . " EUR<br>";

echo "Amb descompte del 25%: " .
    number_format(aplicaDescompte($preuOriginal, 25), 2, ',', '.') . " EUR<br>";
?>

<!-- EXERCICI 3 -->
<?php
echo "<h2>Exercici 3</h2>";

/*
 * PROVA INCORRECTA (comentada perquè no s'ha d'executar):
 *
 * function benvinguda(string $salutacio = 'Hola', string $nom): string {
 *     return "$salutacio, $nom!";
 * }
 *
 * Els paràmetres obligatoris han d'anar abans dels opcionals.
 * Si un paràmetre té un valor per defecte, és opcional.
 */

/**
 * Retorna una salutació amb el nom indicat.
 *
 * @param string $nom Nom de la persona
 * @param string $salutacio Salutació (per defecte, Hola)
 * @return string Salutació completa
 */
function benvinguda(string $nom, string $salutacio = 'Hola'): string {
    return "$salutacio, $nom!";
}

echo benvinguda("Anna") . "<br>";
echo benvinguda("Marc", "Bon dia") . "<br>";
?>

</body>
</html>
