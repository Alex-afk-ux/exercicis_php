<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repte final - BitBazar</title>
    <link rel="stylesheet" href="estils.css">
</head>
<body>
<main class="contenidor">
<?php

// CATÀLEG DE L'APARTAT 7
$productes = [
    ["nom" => "Portatil", "preu" => 800, "unitats" => 5, "categoria" => "Informatica"],
    ["nom" => "Ratoli", "preu" => 20, "unitats" => 10, "categoria" => "Accessoris"],
    ["nom" => "Teclat", "preu" => 50, "unitats" => 0, "categoria" => "Accessoris"],
    ["nom" => "Monitor", "preu" => 200, "unitats" => 3, "categoria" => "Informatica"],
    ["nom" => "Auriculars", "preu" => 60, "unitats" => 0, "categoria" => "Accessoris"]
];

/**
 * Calcula el preu d'un producte amb IVA.
 *
 * @param float $preu Preu sense IVA
 * @param float $iva Tipus d'IVA (per defecte, 21%)
 * @return float Preu amb IVA
 */
function preuAmbIva(float $preu, float $iva = 0.21): float {
    return $preu * (1 + $iva);
}

/**
 * Formata un preu amb el format català.
 *
 * @param float $preu Preu que s'ha de formatar
 * @return string Preu formatat amb EUR
 */
function formatPreu(float $preu): string {
    return number_format($preu, 2, ',', '.') . " EUR";
}

/**
 * Indica l'estat de l'estoc d'un producte.
 *
 * @param int $unitats Unitats disponibles
 * @return string Estat de l'estoc
 */
function estatEstoc(int $unitats): string {
    if ($unitats === 0) {
        return "Esgotat";
    } elseif ($unitats <= 3) {
        return "Últimes unitats";
    }

    return "Disponible";
}

/**
 * Filtra els productes segons la categoria indicada.
 *
 * @param array $productes Catàleg de productes
 * @param string $categoria Categoria que es vol mostrar o 'totes'
 * @return array Productes de la categoria seleccionada
 */
function filtraCategoria(array $productes, string $categoria): array {
    if ($categoria === "totes") {
        return $productes;
    }

    $resultat = [];

    foreach ($productes as $producte) {
        if ($producte["categoria"] === $categoria) {
            $resultat[] = $producte;
        }
    }

    return $resultat;
}

/**
 * Calcula el resum del catàleg.
 *
 * @param array $productes Catàleg de productes
 * @return array Resum amb total, disponibles, esgotats i valor de l'estoc
 */
function resumCataleg(array $productes): array {
    $total = count($productes);
    $disponibles = 0;
    $esgotats = 0;
    $valorEstoc = 0.0;

    foreach ($productes as $producte) {
        if ($producte["unitats"] > 0) {
            $disponibles++;
        } else {
            $esgotats++;
        }

        $valorEstoc += $producte["preu"] * $producte["unitats"];
    }

    return [
        "total" => $total,
        "disponibles" => $disponibles,
        "esgotats" => $esgotats,
        "valor de l'estoc" => $valorEstoc
    ];
}

/**
 * Escriu l'HTML de la targeta d'un producte.
 *
 * @param array $producte Dades del producte
 * @return void
 */
function pintaTargeta(array $producte): void {
    echo "<article class='targeta'>";
    echo "<h3>" . htmlspecialchars((string) $producte["nom"]) . "</h3>";
    echo "<p class='categoria'>" . htmlspecialchars((string) $producte["categoria"]) . "</p>";
    echo "<p>Preu: <strong>" . formatPreu((float) $producte["preu"]) . "</strong></p>";
    echo "<p>Amb IVA: " . formatPreu(preuAmbIva((float) $producte["preu"])) . "</p>";
    echo "<p>Unitats: " . (int) $producte["unitats"] . "</p>";
    echo "<p class='estat'>" . htmlspecialchars(estatEstoc((int) $producte["unitats"])) . "</p>";
    echo "</article>";
}

/**
 * Escriu una graella amb les targetes dels productes rebuts.
 *
 * @param array $productes Productes que es mostraran
 * @return void
 */
function pintaGraella(array $productes): void {
    echo "<div class='graella'>";

    foreach ($productes as $producte) {
        pintaTargeta($producte);
    }

    echo "</div>";
}

// 1. RESUM DEL CATÀLEG
echo "<header class='capcalera'>";
echo "<p class='sobre-titol'>BOTIGA ONLINE</p>";
echo "<h1>BitBazar</h1>";
echo "<p>Catàleg de tecnologia i accessoris</p>";
echo "</header>";

echo "<section>";
echo "<h2>Resum del catàleg</h2>";

$resum = resumCataleg($productes);
echo "<div class='resum'>";

foreach ($resum as $clau => $valor) {
    echo "<div class='dada-resum'>";
    echo "<span>" . htmlspecialchars((string) $clau) . "</span>";

    if ($clau === "valor de l'estoc") {
        echo "<strong>" . formatPreu((float) $valor) . "</strong>";
    } else {
        echo "<strong>" . (int) $valor . "</strong>";
    }

    echo "</div>";
}

echo "</div>";
echo "</section>";

// 2. GRAELLA AMB TOTS ELS PRODUCTES
echo "<section>";
echo "<h2>Tots els productes</h2>";
pintaGraella(filtraCategoria($productes, "totes"));
echo "</section>";

// 3. GRAELLA D'UNA CATEGORIA
echo "<section>";
echo "<h2>Categoria: Accessoris</h2>";

$accessoris = filtraCategoria($productes, "Accessoris");

if (count($accessoris) > 0) {
    pintaGraella($accessoris);
} else {
    echo "<p class='missatge'>No hi ha productes en aquesta categoria.</p>";
}
echo "</section>";

// 4. CATEGORIA QUE NO EXISTEIX
echo "<section>";
echo "<h2>Categoria: Videojocs</h2>";

$videojocs = filtraCategoria($productes, "Videojocs");

if (count($videojocs) > 0) {
    pintaGraella($videojocs);
} else {
    echo "<p class='missatge'>No hi ha productes en aquesta categoria.</p>";
}
echo "</section>";

?>
<footer class="peu">
    <p>BitBazar · Catàleg de productes</p>
</footer>
</main>
</body>
</html>
