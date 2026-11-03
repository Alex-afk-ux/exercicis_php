<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 7</title>
</head>
<body>

<?php
// Catàleg de productes
$productes = [
    ["nom" => "Portatil", "preu" => 800, "unitats" => 5],
    ["nom" => "Ratoli", "preu" => 20, "unitats" => 10],
    ["nom" => "Teclat", "preu" => 50, "unitats" => 0],
    ["nom" => "Monitor", "preu" => 200, "unitats" => 3],
    ["nom" => "Auriculars", "preu" => 60, "unitats" => 0]
];

echo "<h2>Exercici 1</h2>";

/**
 * Calcula el valor total de l'estoc.
 *
 * @param array $productes Catàleg de productes
 * @return float Valor total de l'estoc
 */
function valorEstoc(array $productes): float {
    $total = 0;

    foreach ($productes as $producte) {
        $total += $producte["preu"] * $producte["unitats"];
    }

    return (float) $total;
}

/**
 * Compta quants productes tenen l'estoc a zero.
 *
 * @param array $productes Catàleg de productes
 * @return int Nombre de productes esgotats
 */
function quantsEsgotats(array $productes): int {
    $total = 0;

    foreach ($productes as $producte) {
        if ($producte["unitats"] == 0) {
            $total++;
        }
    }

    return $total;
}

/**
 * Calcula el preu mitjà dels productes.
 *
 * @param array $productes Catàleg de productes
 * @return float Preu mitjà amb dos decimals
 */
function preuMitja(array $productes): float {
    if (count($productes) == 0) {
        return 0.0;
    }

    $total = 0;

    foreach ($productes as $producte) {
        $total += $producte["preu"];
    }

    return round($total / count($productes), 2);
}

echo "Valor de l'estoc: " . valorEstoc($productes) . " EUR<br>";
echo "Productes esgotats: " . quantsEsgotats($productes) . "<br>";
echo "Preu mitjà: " . preuMitja($productes) . " EUR<br>";
echo "Preu mitjà amb array buit: " . preuMitja([]) . " EUR<br>";

echo "<h2>Exercici 2</h2>";

/**
 * Retorna només els productes que tenen estoc.
 *
 * @param array $productes Catàleg de productes
 * @return array Productes disponibles
 */
function nomesDisponibles(array $productes): array {
    $disponibles = [];

    foreach ($productes as $producte) {
        if ($producte["unitats"] > 0) {
            $disponibles[] = $producte;
        }
    }

    return $disponibles;
}

/**
 * Retorna el producte amb el preu més alt.
 *
 * @param array $productes Catàleg de productes
 * @return array Producte més car, o array buit si no n'hi ha
 */
function elMesCar(array $productes): array {
    if (count($productes) == 0) {
        return [];
    }

    $mesCar = $productes[0];

    foreach ($productes as $producte) {
        if ($producte["preu"] > $mesCar["preu"]) {
            $mesCar = $producte;
        }
    }

    return $mesCar;
}

/**
 * Crea un resum associatiu del catàleg.
 *
 * @param array $productes Catàleg de productes
 * @return array Resum amb total, disponibles i producte més car
 */
function resumCataleg(array $productes): array {
    $mesCar = elMesCar($productes);

    return [
        "total" => count($productes),
        "disponibles" => count(nomesDisponibles($productes)),
        "mes_car" => $mesCar
    ];
}

echo "<h3>Productes disponibles</h3>";
foreach (nomesDisponibles($productes) as $producte) {
    echo htmlspecialchars($producte["nom"]) . " - " . $producte["preu"] . " EUR<br>";
}

echo "<h3>Producte més car</h3>";
$car = elMesCar($productes);
if (!empty($car)) {
    echo htmlspecialchars($car["nom"]) . " - " . $car["preu"] . " EUR<br>";
}

echo "<h3>Resum del catàleg</h3>";
$resum = resumCataleg($productes);

foreach ($resum as $clau => $valor) {
    if (is_array($valor)) {
        echo htmlspecialchars((string) $clau) . ": " .
            (isset($valor["nom"]) ? htmlspecialchars($valor["nom"]) : "Cap producte") . "<br>";
    } else {
        echo htmlspecialchars((string) $clau) . ": " . $valor . "<br>";
    }
}
?>

</body>
</html>
