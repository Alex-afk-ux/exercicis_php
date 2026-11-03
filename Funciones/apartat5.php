<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 5</title>
</head>
<body>

<!-- EXERCICI 1 -->
<?php
echo "<h2>Exercici 1</h2>";

/**
 * Calcula l'àrea d'un rectangle.
 *
 * @param float $base Base del rectangle
 * @param float $altura Altura del rectangle
 * @return float Àrea del rectangle
 */
function area(float $base, float $altura): float {
    return $base * $altura;
}

/**
 * Comprova si les unitats d'un producte s'han esgotat.
 *
 * @param int $unitats Nombre d'unitats disponibles
 * @return bool True si no queden unitats
 */
function esgotat(int $unitats): bool {
    return $unitats <= 0;
}

// 1. Crida amb dos decimals
echo "Area amb decimals: " . area(3.0, 4.0) . "<br>";

// 2. Crida amb dos enters
echo "Area amb enters: " . area(3, 4) . "<br>";

// 3. Crida amb text: provoca un TypeError amb strict_types activat
try {
    echo area('3', 4.0);
} catch (TypeError $e) {
    echo "Error: " . htmlspecialchars($e->getMessage()) . "<br>";
}

// 4. Convertim el text a float abans de passar-lo a la funció
echo "Area corregida: " . area((float) '3', 4.0) . "<br>";

// És millor que PHP avisi dels errors perquè podem detectar dades
// incorrectes i decidir explícitament com convertir-les.
?>

</body>
</html>
