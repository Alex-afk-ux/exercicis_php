<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 3</title>
</head>
<body>

<!-- EXERCICI 1 -->
<?php
echo "<h2>Exercici 1</h2>";

/**
 * Calcula l'IVA i mostra el resultat directament.
 *
 * @param float $base Preu sense IVA
 * @return void
 */
function preuAmbIvaEcho(float $base): void {
    echo $base * 1.21;
}

/**
 * Calcula i retorna el preu amb IVA del 21%.
 *
 * @param float $base Preu sense IVA
 * @return float Preu amb IVA
 */
function preuAmbIva(float $base): float {
    return $base * 1.21;
}

/**
 * Formata un preu amb el format català.
 *
 * @param float $preu Preu que s'ha de formatar
 * @return string Preu formatat
 */
function formatPreu(float $preu): string {
    return number_format($preu, 2, ',', '.') . " EUR";
}

preuAmbIvaEcho(50);
echo '<br>';
echo preuAmbIva(50);
echo '<br>';
echo formatPreu(100);
echo "<br>";
echo formatPreu(49.999);
echo "<br>";
echo formatPreu(1234.5);
?>

<?php
$preus = [
    50,
    100,
    150,
];

// 1. Calcular el total amb IVA sumant els resultats dins d'un foreach
$totalAmbIva = 0;
foreach ($preus as $preu) {
    $totalAmbIva += preuAmbIva((float) $preu);
}

// 2. Mostrar el total passant-lo per formatPreu()
echo "<p><strong>Total amb IVA:</strong> " . formatPreu((float) $totalAmbIva) . "</p>";

// 3. Mostrar el preu més car amb IVA
echo "<p><strong>Preu més car amb IVA:</strong> " .
    formatPreu(preuAmbIva((float) max($preus))) . "</p>";

// 4. No podem utilitzar preuAmbIvaEcho() per calcular una altra expressió
// perquè és una funció void: mostra el resultat, però no el retorna.

/*
 * La funció preuAmbIvaEcho() té un tipus de retorn void.
 * Això significa que no retorna cap valor amb return, sinó que
 * escriu el resultat directament a la pantalla amb echo.
 */
?>

</body>
</html>
